<?php
    if(isset($_GET['blog_id'])){
        $blog_id = $_GET['blog_id'];
    } 

    require dirname(__DIR__).'/private/definations/dbFunctions.php';
    require dirname(__DIR__).'/private/definations/generalFunctions.php';


    $query = "SELECT * FROM `blogs` WHERE `blog_id`=?";
    $inputs = [$blog_id];
    $types = [PDO::PARAM_STR];
    $article = runQuery($query,$inputs,$types)[0];
    if($article){
        $date = explode(" ",$article['blog_create_date'])[0];
        [$Y,$M,$D] = explode("-",$date,3);
        $commentCount = count(json_decode(($article['blog_comments']),true));
    }else {
        header('Location: 404-page.php');
    }
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>ProBusiness Responsive Multipurpose Template</title>
	<meta name="description" content="">

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
    <script src="js/01custom.js" defer></script>
</head>
<body>
<!--Start Header-->
<?php
    $pageName = 'Blog';
    require __DIR__.'/util/header.php';
    echo $header; 
?>
<!--End Header-->
	
	<!--start wrapper-->
	<section class="wrapper">
		<section class="content blog">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div class="blog_single">
                            <?php

                            $cats = str_replace(' , ',' OR category_id=',$article['blog_catogories']);
                            $cats_ = '';
                           foreach(runQuery('SELECT `category_id`,`category_name` FROM `categories_decode` WHERE `category_id` = '.$cats,[],[]) as $row){$cats_ .= '<span><i class="fa fa-tag"></i><a href="blogs.php?id='.$row['category_id'].'&name='.$row['category_name'].'">'.$row['category_name'].'</a> </span>';}
                            echo '<article class="post">
								<figure class="post_img">
									<a href="#">
										<img src="'.$article['blog_img'].'" alt="'.$article['blog_title'].'">
									</a>
								</figure>
								<div class="post_date">
									<span class="day">'.$D.'</span>
									<span class="month">'.intToMonthName($M).'</span>
								</div>
								<div class="post_content">
									<div class="post_meta">
										<h2>
											<a href="#">'.$article['blog_title'].'</a>
										</h2>
										<div class="metaInfo">
											<span><i class="fa fa-calendar"></i> <a href="#">'.intToMonthName($M).' '.$D.' '.$Y.'</a> </span>
											<span><i class="fa fa-user"></i> By <a href="#">'.$article['blog_author'].'</a> </span>
											<!--<span><i class="fa fa-tag"></i><a href="#">-->
                                            '.$cats_.'
                                            <!--</a> </span>-->
											<span><i class="fa fa-comments"></i> <a href="#pseudo-comment">'. $commentCount.' Comments</a></span>
										</div>
									</div>
									'.$article['blog_desc'].'
								</div>
								<ul class="shares">
									<li class="shareslabel"><h3>Share This Story</h3></li>
									<li><a class="twitter" href="#" data-placement="bottom" data-toggle="tooltip" title="Twitter"></a></li>
									<li><a class="facebook" href="#" data-placement="bottom" data-toggle="tooltip" title="Facebook"></a></li>
									<li><a class="gplus" href="#" data-placement="bottom" data-toggle="tooltip" title="Google Plus"></a></li>
									<li><a class="pinterest" href="#" data-placement="bottom" data-toggle="tooltip" title="Pinterest"></a></li>
									<li><a class="yahoo" href="#" data-placement="bottom" data-toggle="tooltip" title="Yahoo"></a></li>
									<li><a class="linkedin" href="#" data-placement="bottom" data-toggle="tooltip" title="LinkedIn"></a></li>
								</ul>
							</article>
							<div class="about_author">
								<div class="author_desc">
									<img src="images/blog/author.png" alt="about author">
									<ul class="author_social">
										<li><a class="fb" href="#." data-placement="top" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
										<li><a class="twtr" href="#." data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
										<li><a class="skype" href="#." data-placement="top" data-toggle="tooltip" title="Skype"><i class="fa fa-skype"></i></a></li>
									</ul>
								</div>
								<div id="pseudo-comment" class="author_bio">
									<h3 class="author_name"><a href="#">'.$article['blog_author'].'</a></h3>
									<h5>CEO at <a href="#">website</a></h5>
									<p class="author_det">
                                        Author\'s Details
                                    </p>
								</div>
							</div>
                            <!--News Comments-->
                            <div class="news_comments">
                            <div class="dividerHeading">
                            <h4><span>Comments ('.$commentCount.')</span></h4>
                            </div>
                            </div>';
                            ?>
                            <div id="comment">
                                <ul id="comment-list">



                            <?php
                            // Comment section//------------------------------------------------------------------------------------
                                $comments = json_decode($article['blog_comments'],true);
                                foreach($comments as $comment) {
                                    echo  '<li id="'.$comment['id'].'" class="comment">
                                        <div class="avatar"><img alt="" src="images/blog/avatar_1.png" class="avatar"></div>
                                        <div class="comment-container">
                                            <h4 class="comment-author"><a>'.$comment['name'].'</a></span></h4>
                                            <div class="comment-meta"><a class="comment-date">'.$comment['date'].'</a><a class="comment-reply-link reply-js" style="cursor:pointer;" >Reply &raquo;</a></div>
                                            <div class="comment-body">
                                                <p>'.$comment['comment'].'</p>
                                            </div>
                                        </div>';
                                    if(isset($comment['replies'])){
                                        $replies = $comment['replies'];
                                        
                                        foreach ($replies as $reply) {
                                            echo
                                            '<ul class="children">
                                                <li id="'.$reply['id'].'" class="comment">
                                                    <div class="avatar"><img alt="" src="images/blog/avatar_3.png" class="avatar"></div>
                                                    <div class="comment-container">
                                                        <h4 class="comment-author"><a >'.$reply['name'].'</a></span></h4>
                                                        <div class="comment-meta"><a  class="comment-date">'.$reply['date'].'</a><a class="comment-reply-link reply-js" style="cursor:pointer;">Reply &raquo;</a></div>
                                                        <div class="comment-body">
                                                            <p>'.$reply['comment'].'</p>
                                                        </div>
                                                    </div>';
                                            if(isset($reply['replies'])){
                                                $subReplies = $reply['replies'];
                                                foreach ($subReplies as $subReply) {
                                                    echo
                                                    '<ul class="children">
                                                        <li id="'.$subReply['id'].'"  class="comment">
                                                            <div class="avatar"><img alt="" src="images/blog/avatar_3.png" class="avatar"></div>
                                                            <div class="comment-container">
                                                                <h4 class="comment-author"><a >'.$subReply['name'].'</a></span></h4>
                                                                <div class="comment-meta"><a  class="comment-date">'.$subReply['date'].'</a></div>
                                                                <div class="comment-body">
                                                                    <p>'.$subReply['comment'].'</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>';
                                                }
                                            }
                                            echo '</li></ul>';
    
                                        }
                                    }
                                    echo '</li>';
                                }
                                echo '</ul>';
                            ?>
                                   
                            <!-- /#comments -->
                            <!-- <!-- <div class="dividerHeading"> -->
                                <h4><span>Leave a comment</span></h4>
                                </div>

                            <div class="comment_form">
                               <div class="row">
                                   <div class="col-sm-4">
                                       <input class="col-lg-4 col-md-4 form-control" name="name" type="text" id="c-name" size="30"  onfocus="if(this.value == 'Name') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Name'; }" value="Name" placeholder="Name" >
                                   </div>
                                   <div class="col-sm-4">
                                       <input class="col-lg-4 col-md-4 form-control" name="email" type="text" id="email" size="30" onfocus="if(this.value == 'E-mail') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'E-mail'; }" value="E-mail" placeholder="E-mail">
                                   </div>
                                   <div class="col-sm-4">
                                       <input class="col-lg-4 col-md-4 form-control" name="url" type="text" id="url" size="30" onfocus="if(this.value == 'Url') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Url'; }" value="Url" placeholder="Url">
                                   </div>
                               </div>
                            </div>
                            <div class="comment-box row">
                                <div class="col-sm-12">
                                    <p>
                                        <textarea name="comments" class="form-control" rows="6" cols="40" id="c-comments" onfocus="if(this.value == 'Message') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Message'; }" placeholder="Message">Message</textarea>
                                    </p>
                                </div>
                            </div>

                            <a id = "king" class="btn btn-lg btn-default">Post Comment</a>
                        </div>
				    </div>
					<!--Sidebar Widget-->
					<?php
                        $data = $article;
                        $isBlogs = false;
                        require __DIR__ .'/util/sideBar.php';
                    ?>

                    <?php
                        require dirname(__DIR__).'/private/viewCounter.php';
                        viewCounter();
                    ?>
				</div><!--/.row-->
			</div> <!--/.container-->
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

    <script src="js/main.js"></script>

    <!-- Start Style Switcher -->
    <div class="switcher"></div>
    <!-- End Style Switcher -->


</body>
</html>