<?php
	require_once dirname(__DIR__).'/private/definations/dbFunctions.php';

	if (isset($_GET['id'])) {
		$project_id = $_GET['id'];
		$project = runQuery("SELECT * FROM `projects` WHERE `project_id`=?",[$project_id],[PDO::PARAM_STR])[0];
	// print_r($project);
		if (!$project) {
			header('Location: 404-page.php');
		}
	}
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php
		echo $project['project_name'];
	?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
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
    $pageName = 'Portfolio';
    require __DIR__.'/util/header.php'; 
	echo $header;

	//preprocess
	require_once dirname(__DIR__).'/private/definations/generalFunctions.php';
	$_ = explode('-',$project['project_release_date']);
	$date = $_[2].' '.intToMonthName($_[1]).' '.$_[0];
	$cats = '';
	foreach (runQuery('SELECT `category_name` FROM `categories_decode` WHERE `category_id`='.str_replace(' , ' , ' OR `category_id`=',$project['project_category']),[],[]) as $row => $cat){
		$cats .= $cat['category_name'];
		$cats .= ', ';
	}
?>
<!--End Header-->
	
	<!--start wrapper-->
	<section class="wrapper">
		<section class="content portfolio_single">
			<div class="container">
				<div class="row sub_content">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<!--Project Details Page-->
						<div class="porDetCarousel">
							<div class="carousel-content">
								<?php
									$imgs = explode(' , ',$project['project_img']);
									foreach ($imgs as $img) {
										echo <<<STR
											<img class="carousel-item" src="$img" alt="">";
											STR; //img size = 700*476
									}
								?>
								
								<img class="carousel-item" src="images/portfolio/portfolio_slider2.png" alt=""> 
								<img class="carousel-item" src="images/portfolio/portfolio_slider3.png" alt="">
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="project_description">
							<div class="widget_title">
								<h4><span>Project Descriptions</span></h4>
							</div>
							<div style="text-align: justify;">
							<?php
								echo $project['project_desc'];
							?> 
							</div>
						</div>
						<div class="project_details">
							<div class="widget_title">
								<h4><span>Project Details</span></h4>
							</div>
							<ul class="details">
								<li><span>Client :</span> <?php echo $project['project_client']; ?> </li>
								<li><span>Company :</span><?php echo $project['project_client']; ?></li>
								<li><span>Category :</span><?php echo $cats ?></li>
								<li><span>Date :</span> <?php echo $date; ?></li>
								<li><span>Project URL :</span> <a href="#"><?php echo $project['project_url']; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
				
                <section class="latest_work">
                    <div class="container">
                        <div class="row sub_content">
                            <div class="col-md-12">
                                <div class="dividerHeading">
                                    <h4><span>Recent Work</span></h4>
                                </div>
                                <div id="recent-work-slider" class="owl-carousel">

									<?php
										$recentProjects = runQuery("SELECT * FROM `projects` ORDER BY `project_id` LIMIT 8",[],[]);
										foreach ($recentProjects as $row) {
											$img = explode(' , ',$row['project_img'])[0];
											if ($img=='') {
												$img = "images/portfolio/portfolio_2.png";
											}
											echo <<<STR
													<div  id="{$row['project_id']}" class="recent-item box portfolio-jan">
														<figure class="touching effect-bubba">
															<img src="$img" class="img-responsive" alt=""/>
															<div class="option">
																<a href="portfolio_single.php?id={$row['project_id']}" class="fa fa-link"></a>
																<a href="{$row['project_url']}" class="fa fa-search mfp-image"></a>
															</div>
															<figcaption class="item-description">
																<h5>{$row['project_name']}</h5>
																<p>{$row['project_company']}</p>
															</figcaption>
														</figure>
													</div>
												STR;
										}
									?>


                                    
                                    <!-- <div class="recent-item box">
                                        <figure class="touching effect-bubba">
                                            <img src="images/portfolio/portfolio_2.png" class="img-responsive" alt=""/>

                                            <div class="option">
                                                <a href="portfolio_single.html" class="fa fa-link"></a>
                                                <a href="images/portfolio/full/portfolio_2.png" class="fa fa-search mfp-image"></a>
                                            </div>
                                            <figcaption class="item-description">
                                                <h5>Touch and Swipe</h5>
                                                <p>Mobile</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="recent-item box">
                                        <figure class="touching effect-bubba">
                                            <img src="images/portfolio/portfolio_3.png" class="img-responsive" alt=""/>

                                            <div class="option">
                                                <a href="portfolio_single.html" class="fa fa-link"></a>
                                                <a href="images/portfolio/full/portfolio_3.png" class="fa fa-search mfp-image"></a>
                                            </div>
                                            <figcaption class="item-description">
                                                <h5>Touch and Swipe</h5>
                                                <p>Mobile</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="recent-item box">
                                        <figure class="touching effect-bubba">
                                            <img src="images/portfolio/portfolio_4.png" class="img-responsive" alt=""/>

                                            <div class="option">
                                                <a href="portfolio_single.html" class="fa fa-link"></a>
                                                <a href="images/portfolio/full/portfolio_4.png" class="fa fa-search mfp-image"></a>
                                            </div>
                                            <figcaption class="item-description">
                                                <h5>Touch and Swipe</h5>
                                                <p>Mobile</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="recent-item box">
                                        <figure class="touching effect-bubba">
                                            <img src="images/portfolio/portfolio_5.png" class="img-responsive" alt=""/>

                                            <div class="option">
                                                <a href="portfolio_single.html" class="fa fa-link"></a>
                                                <a href="images/portfolio/full/portfolio_5.png" class="fa fa-search mfp-image"></a>
                                            </div>
                                            <figcaption class="item-description">
                                                <h5>Touch and Swipe</h5>
                                                <p>Mobile</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="recent-item box">
                                        <figure class="touching effect-bubba">
                                            <img src="images/portfolio/portfolio_6.png" class="img-responsive" alt=""/>

                                            <div class="option">
                                                <a href="portfolio_single.html" class="fa fa-link"></a>
                                                <a href="images/portfolio/full/portfolio_6.png" class="fa fa-search mfp-image"></a>
                                            </div>
                                            <figcaption class="item-description">
                                                <h5>Touch and Swipe</h5>
                                                <p>Mobile</p>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="recent-item box">
                                        <figure class="touching effect-bubba">
                                            <img src="images/portfolio/portfolio_7.png" class="img-responsive" alt=""/>
                                            <div class="option">
                                                <a href="portfolio_single.html" class="fa fa-link"></a>
                                                <a href="images/portfolio/full/portfolio_7.png" class="fa fa-search mfp-image"></a>
                                            </div>
                                            <figcaption class="item-description">
                                                <h5>Touch and Swipe</h5>
                                                <p>Mobile</p>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="recent-item box">
                                        <figure class="touching effect-bubba">
                                            <img src="images/portfolio/portfolio_8.png" class="img-responsive" alt=""/>
                                            <div class="option">
                                                <a href="portfolio_single.html" class="fa fa-link"></a>
                                                <a href="images/portfolio/full/portfolio_8.png" class="fa fa-search mfp-image"></a>
                                            </div>
                                            <figcaption class="item-description">
                                                <h5>Touch and Swipe</h5>
                                                <p>Mobile</p>
                                            </figcaption>
                                        </figure>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
			</div>
		</section>
	</section>
	<!--end wrapper-->

	<!--start footer-->
    <?php
    require __DIR__.'/util/footer.php';
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


	<script type="text/javascript">
		const projects = document.querySelectorAll('.portfolio-jan');
		for(const project of projects){
			project.addEventListener('click',e=>{
				let target = e.target;
				let id = 0
				while (true) {
					if (target.classList.contains('portfolio-jan')) {
						id = target.id;
						break
					}
					target = target.parentElement;
				}
				window.location.href = 'portfolio_single.php?id='+id;
			})
		}

		$(document).ready(function() {
			$.fn.carousel = function(op) {
				var op, ui = {};
				op = $.extend({
					speed: 500,
					autoChange: false,
					interval: 5000
				}, op);
				ui.carousel = this;
				ui.items    = ui.carousel.find('.carousel-item');
				ui.itemsLen = ui.items.length;

				// CREATE CONTROLS
				ui.ctrl 	= $('<div />', {'class': 'carousel-control'});
				ui.prev 	= $('<div />', {'class': 'carousel-prev'});
				ui.next 	= $('<div />', {'class': 'carousel-next'});
				ui.pagList  = $('<ul />', {'class': 'carousel-pagination'});
				ui.pagItem  = $('<li></li>');
				for (var i = 0; i < ui.itemsLen; i++) {
					ui.pagItem.clone().appendTo(ui.pagList);
				}
				ui.prev.appendTo(ui.ctrl);
				ui.next.appendTo(ui.ctrl);
				ui.pagList.appendTo(ui.ctrl);
				ui.ctrl.appendTo(ui.carousel);
				ui.carousel.find('.carousel-pagination li').eq(0).addClass('active');
				ui.carousel.find('.carousel-item').each(function() {
					$(this).hide();
				});
				ui.carousel.find('.carousel-item').eq(0).show().addClass('active');
				
				
				// CHANGE ITEM
				var changeImage = function(direction, context) {
					var current = ui.carousel.find('.carousel-item.active');

					if (direction == 'index') {
						if(current.index() === context.index())
							return false;

						context.addClass('active').siblings().removeClass('active');

						ui.items.eq(context.index()).addClass('current').fadeIn(op.speed, function() {
							current.removeClass('active').hide();
							$(this).addClass('active').removeClass('current');
						});
					} 

					if (direction == 'prev') {
						if (current.index() == 0) {
							ui.carousel.find('.carousel-item:last').addClass('current').fadeIn(op.speed, function() {
								current.removeClass('active').hide();
								$(this).addClass('active').removeClass('current');
							});
						}
						else {
							current.prev().addClass('current').fadeIn(op.speed, function() {
								current.removeClass('active').hide();
								$(this).addClass('active').removeClass('current');
							});
						}
					}

					if (direction == undefined) {
						if (current.index() == ui.itemsLen - 1) {
							ui.carousel.find('.carousel-item:first').addClass('current').fadeIn(300, function() {
								current.removeClass('active').hide();
								$(this).addClass('active').removeClass('current');
							});
						}
						else {
							current.next().addClass('current').fadeIn(300, function() {
								current.removeClass('active').hide();
								$(this).addClass('active').removeClass('current');
							});
						}
					}
					ui.carousel.find('.carousel-pagination li').eq( ui.carousel.find('.carousel-item.current').index() ).addClass('active').siblings().removeClass('active');
				};

				ui.carousel
					.on('click', 'li', function() {
						changeImage('index', $(this));
					})
					.on('click', '.carousel-prev', function() {
						changeImage('prev');
					})
					.on('click', '.carousel-next', function() {
						changeImage();
					});
				
				// AUTO CHANGE
				if (op.autoChange) {
					var changeInterval = setInterval(changeImage, op.interval);
					ui.carousel
						.on('mouseenter', function() {
							clearInterval(changeInterval);
						})
						.on('mouseleave', function() {
							changeInterval = setInterval(changeImage, op.interval);
						});
				}
				return this;
			};
			
			$('.porDetCarousel').each(function() {
				$(this).carousel({
					autoChange: true
				});
			});
		});
	</script>
	<script src="js/main.js"></script>
	
	<!-- Start Style Switcher -->
	<div class="switcher"></div>
	<!-- End Style Switcher -->
</body>
</html>
