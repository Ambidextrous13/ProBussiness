<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>ProBusiness Responsive Multipurpose Template</title>
	<meta name="description" content="">

	<!-- CSS FILES -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" data-name="skins">
	<link rel="stylesheet" href="css/layout/wide.css" data-name="layout">

	<link rel="stylesheet" type="text/css" href="css/switcher.css" media="screen" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<!--Start Header-->

<?php
require dirname(__DIR__) . '/private/definations/dbFunctions.php';
require dirname(__DIR__) . '/private/definations/generalFunctions.php';
// /////////////////////////////////////////////////////////////////////////////// Local Functions
	function data($query, $arguments, $types, $exclusive = false){
		global $page_rank,$blogs_per_page;
		$start_no = ($page_rank-1)*$blogs_per_page;
		$query .= " LIMIT $start_no,$blogs_per_page";
		return runQuery($query, $arguments, $types, $exclusive);
	} 


// //////////////////////////////////////////////////////////////////////////// Page rank and Page info
	$pageName = 'Blogs';
	$blogs_per_page = 2;
	$page_rank = 1;
	if (isset($_GET['page'])) {
		$page_rank = intval($_GET['page']);
	} else {
		$page_rank = 1;
	}
	$max_blogs = intval(runQuery("SELECT COUNT('blog_id') c FROM `blogs` ",[],[])[0]['c']);
// /////////////////////////////////////////////////////////////////////////////// Query Selection
	$search_id = 0;
	$query;
	$title = '';
	$data;
	if (isset($_GET['id']) && isset($_GET['name'])) {  ////////////////////////// category ID and category name
		$search_id = intval($_GET['id']);
		$title = $_GET['name'];
		$cats = implode(" OR `blog_id`= ",explode(' , ',runQuery("SELECT `ids` FROM `categories_decode` WHERE `category_id` = ?", [$search_id], [PDO::PARAM_STR])[0]['ids'])); // explode to save in array  and implode to covert array into string with glue resluts in a perfect query like `id` = 1 OR `id`=2 OR ..... this can also achieved by just using str_eplace , with OR `id` =
		if ($cats) {
			$query = "SELECT * FROM `blogs` where `blog_id` = ?";
			$data = data($query,[$cats],[PDO::PARAM_STR]);

			$query_for_max = "SELECT COUNT('blog_id') c FROM `blogs` where `blog_id` = ?";
			$max_blogs = intval(runQuery($query_for_max,[$cats],[PDO::PARAM_STR])[0]['c']);
		} else {
			$query = "SELECT * FROM `blogs`";
			$data = data($query,[],[]);
		}

	} elseif (isset($_GET['search'])) {
		$title = $_GET['search'];
		$query = "SELECT * FROM `blogs` where `blog_desc` LIKE :search1 OR `blog_title` LIKE :search2";
		$ref = "%$title%";
		$arg1 = [[':search1',':search2'],[$ref,$ref]];
		$arg2 = [PDO::PARAM_STR,PDO::PARAM_STR];
		$data = data($query,$arg1,$arg2,true);

		$query_for_max = "SELECT COUNT('blog_id') c FROM `blogs` where `blog_desc` LIKE :search1 OR `blog_title` LIKE :search2";
		$max_blogs = intval(runQuery($query_for_max,$arg1,$arg2,true)[0]['c']);

	} elseif(isset($_GET['m']) && isset($_GET['y'])){
		$y = $_GET['y'];
		$y = 1===strlen($_GET['y'])?'0'.$y:$y;
		$m = $_GET['m'];
		$m = 1===strlen($_GET['m'])?'0'.$m:$m;
		$m_ = $m+1;
		$m_ = 1===strlen($m_)?'0'.$m_:$m_;
		$d1 = $y.'-'.$m.'-'.'01  00:00:00';
		$d2 = $y.'-'.$m_.'-'.'01  00:00:00';
		$query = "SELECT * FROM `blogs` WHERE `blog_create_date` BETWEEN :date1 AND :date2";
		$data = data($query,[[':date1',':date2'],[$d1,$d2]],[PDO::PARAM_STR,PDO::PARAM_STR],true);

		$query_for_max = "SELECT COUNT('blog_id') c FROM `blogs` where `blog_create_date` BETWEEN :date1 AND :date2";
		$max_blogs = intval(runQuery($query_for_max,[[':date1',':date2'],[$d1,$d2]],[PDO::PARAM_STR,PDO::PARAM_STR],true)[0]['c']);

	}else {
		$query = "SELECT * FROM `blogs`";
		$data = data($query,[],[]);
	}
// //////////////////////////////////////////////////////////////////////////////////////max pages calc
	$max_pages = ceil($max_blogs /$blogs_per_page);
	if ($page_rank < 1 || $page_rank > $max_pages) {
		header("location: blogs.php?page=1");
	}


	// $data = data($query,[],[]);
// //////////////////////////////////////////////////////////////////////////header
	require __DIR__ . '/util/header.php';
	echo $header;
	?>
	<!--End Header-->

	<!--start wrapper-->
	<section class="wrapper">
		<section class="content blog">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div class="blog_medium">

							<?php
							if ($title != '') {
								echo '<h2>
										<a class = "blog_medium post_meta h2">' . $title . ' Blogs</a>
										<br><br>
									</h2>';
							}
							if ($data) {
								foreach ($data as $article) {
									$date = explode(" ", $article['blog_create_date'])[0];
									[$Y, $M, $D] = explode("-", $date, 3);
									$commentCount = count(json_decode(($article['blog_comments']), true));
									$show = substr($article['blog_desc'], 0, 160);
									$show .= '...';
									$blogLink = 'blog-post.php?blog_id=' . $article['blog_id'];
									echo '<article class="post">
									<div class="post_date">
										<span class="day">' . $D . '</span>
										<span class="month">' . intToMonthName($M) . '</span>
									</div>
									<figure class="post_img">
										<a href="' . $blogLink . '">
											<img src="' . $article['blog_img'] . '" alt="blog post">
										</a>
									</figure>
									<div class="post_content">
										<div class="post_meta">
											<h2>
												<a href="' . $blogLink . '">' . $article['blog_title'] . '</a>
											</h2>
											<div class="metaInfo">
												<span><i class="fa fa-user"></i> By <a href="#">' . $article['blog_author'] . '</a> </span>
												<span><i class="fa fa-comments"></i> <a href="blog-post.php?blog_id=' . $article['blog_id'] . '#comment">' . $commentCount . ' Comments</a></span>
											</div>
										</div>
										<p>' . $show . '</p>
										<a class="btn btn-small btn-default" href="' . $blogLink . '">Read More</a>
										
									</div>
								</article>';
								}
							} else {
								noData();
							}
							?>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<ul class="pagination pull-left mrgt-0">
								<?php
								$href1 = '';
								$href2 = '';
								$prev = intval($page_rank) - 1;
								$next = intval($page_rank) + 1;
								
								if ($page_rank != 1 && $page_rank<= $max_pages && $page_rank >=1) {
									$prev = 1;
									$href1 = <<<STR
													href="blogs.php?page={$prev}"
													STR;
								}

								if (intval($page_rank) != $max_pages && $page_rank< $max_pages && $page_rank >=1) {
									$next = $max_pages;
									$href2 = <<<STR
													href="blogs.php?page={$next}"
													STR;
								}

								echo <<<STR
											<li><a $href1>&laquo;</a></li>
											STR;

								

								if ($max_pages == $page_rank) {
									$dis2 = "disable";
									$next = $max_pages;
								}
								for ($i = 1; $i <= $max_pages; $i++) {
									$class = '';
									if ($page_rank == $i) {
										$class = 'class="active"';
									}
									echo '<li ' . $class . '><a href="blogs.php?page=' . $i . '">' . $i . '</a></li>';
								}

								echo <<<STR
											<li><a $href2>&raquo;</a></li>
											STR;

								?>

							</ul>
						</div>

					</div>

					<!--Sidebar Widget-->
					<?php
					$isBlogs = true;
					require __DIR__ . '/util/sideBar.php';

					?>
				</div>
				<!--/.row-->
			</div>
			<!--/.container-->
		</section>

	</section>
	<!--end wrapper-->

	<!--start footer-->
	<?php
	require __DIR__ . '/util/footer.php';
	echo $footer;
	?>

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script> <!-- jQuery cookie -->
	<script type="text/javascript" src="js/styleswitch.js"></script> <!-- Style Colors Switcher -->
	<script type="text/javascript" src="js/jquery.smartmenus.min.js"></script>
	<script type="text/javascript" src="js/jquery.smartmenus.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jflickrfeed.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/swipe.js"></script>

	<script type="text/javascript" src="js/jquery.sticky.js"></script>

	<script src="js/main.js"></script>

	<!-- Start Style Switcher -->
	<div class="switcher"></div>
	<!-- End Style Switcher -->


</body>

</html>