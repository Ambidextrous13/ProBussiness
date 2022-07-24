<?php
  if(isset($_GET['blog_id'])){
    $blog_id = $_GET['blog_id'];
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
                                require dirname(__DIR__).'/private/definations/dbFunctions.php';
                                require dirname(__DIR__).'/private/definations/generalFunctions.php';
                
                                $query = "SELECT * FROM `blogs` WHERE `blog_id`=?";
                                $inputs = [$blog_id];
                                $types = [PDO::PARAM_STR];
                                $article = runQuery($query,$inputs,$types)[0];

                                $date = explode(" ",$article['blog_create_date'])[0];
                                [$Y,$M,$D] = explode("-",$date,3);
                                $commentCount = count(json_decode(($article['blog_comments']),true));
									
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
											<span><i class="fa fa-tag"></i><a href="#">'.$article['blog_catogories'].'</a> </span>
											<span><i class="fa fa-comments"></i> <a href="#">'. ++$commentCount.' Comments</a></span>
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
								<div class="author_bio">
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
                                    echo '<li id="'.$comment['id'].'" class="comment">
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
                                                <li class="comment">
                                                    <div class="avatar"><img alt="" src="images/blog/avatar_3.png" class="avatar"></div>
                                                    <div class="comment-container">
                                                        <h4 class="comment-author"><a >'.$reply['name'].'</a></span></h4>
                                                        <div class="comment-meta"><a  class="comment-date">'.$reply['date'].'</a><a class="comment-reply-link reply-js" style="cursor:pointer;">Reply &raquo;</a></div>
                                                        <div class="comment-body">
                                                            <p>'.$reply['comment'].'</p>
                                                        </div>
                                                    </div>';
                                            if(isset($comment['replies'])){
                                                $subReplies = $comment['replies'];
                                                foreach ($subReplies as $subReply) {
                                                    echo 
                                                    '<ul class="children">
                                                        <li class="comment">
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
                            <div class="dividerHeading">
                                <h4><span>Leave a comment</span></h4>
                                </div>

                            <div class="comment_form">
                               <div class="row">
                                   <div class="col-sm-4">
                                       <input class="col-lg-4 col-md-4 form-control" name="name" type="text" id="name" size="30"  onfocus="if(this.value == 'Name') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Name'; }" value="Name" placeholder="Name" >
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
                                        <textarea name="comments" class="form-control" rows="6" cols="40" id="comments" onfocus="if(this.value == 'Message') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Message'; }" placeholder="Message">Message</textarea>
                                    </p>
                                </div>
                            </div>

                            <a class="btn btn-lg btn-default" href="#">Post Comment</a>
                        </div>
				    </div>

					<!--Sidebar Widget-->
					<div class="col-xs-12 col-md-4 col-lg-4 col-sm-4">
						<div class="sidebar">
							<div class="widget widget_search">
								<div class="site-search-area">
									<form method="get" id="site-searchform" action="#">
										<div>
											<input class="input-text" name="s" id="s" placeholder="Enter Search keywords..." type="text" />
											<input id="searchsubmit" value="Search" type="submit" />
										</div>
									</form>
								</div><!-- end site search -->
							</div>
							
							<div class="widget widget_categories">
								<div class="widget_title">
									<h4><span>Categories</span></h4>
									</div>
								<ul class="arrows_list list_style">
									<li><a href="#"> Grapic Design (10)</a></li>
									<li><a href="#"> Web Design & Development (25)</a></li>
									<li><a href="#"> Photography (29)</a></li>
									<li><a href="#"> Custom Illustrations (19)</a></li>
									<li><a href="#"> Wordpress Themes(38)</a></li>
									<li><a href="#"> Videography (33)</a></li>
								</ul>
							</div>
							
							<div class="widget widget_about">
								<div class="widget_title">
									<h4><span>Basic Text Widget</span></h4>
									</div>
								<p>Lorem ipsum dolor sit amet, consectetur adip, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>

                            <div class="ProBusiness-tab sidebar-tab">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#Popular" data-toggle="tab">Popular</a></li>
                                    <li class=""><a href="#Recent" data-toggle="tab">Recent</a></li>
                                    <li class="last-tab"><a href="#Comment" data-toggle="tab"><i class="fa fa-comments-o"></i></a></li>
                                </ul>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane fade active in" id="Popular">
                                        <ul class="recent_tab_list">
                                            <li>
                                                <span><a href="#"><img src="images/content/recent_1.png" alt="" /></a></span>
                                                <a href="#">Publishing packag esanse web page editos</a>
                                                <i>October 09, 2015</i>
                                            </li>
                                            <li>
                                                <span><a href="#"><img src="images/content/recent_2.png" alt="" /></a></span>
                                                <a href="#">Sublishing packag esanse web page editos</a>
                                                <i>October 08, 2015</i>
                                            </li>
                                            <li class="last-tab">
                                                <span><a href="#"><img src="images/content/recent_3.png" alt="" /></a></span>
                                                <a href="#">Mublishing packag esanse web page editos</a>
                                                <i>October 07, 2015</i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="Recent">
                                        <ul class="recent_tab_list">
                                            <li>
                                                <span><a href="#"><img src="images/content/recent_4.png" alt="" /></a></span>
                                                <a href="#">Various versions has evolved over the years</a>
                                                <i>October 18, 2015</i>
                                            </li>
                                            <li>
                                                <span><a href="#"><img src="images/content/recent_5.png" alt="" /></a></span>
                                                <a href="#">Rarious versions has evolve over the years</a>
                                                <i>October 17, 2015</i>
                                            </li>
                                            <li class="last-tab">
                                                <span><a href="#"><img src="images/content/recent_6.png" alt="" /></a></span>
                                                <a href="#">Marious versions has evolven over the years</a>
                                                <i>October 16, 2015</i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade">
                                        <ul class="comments">
                                            <li class="comments_list clearfix">
                                                <a class="post-thumbnail" href="#"><img width="60" height="60" src="images/content/recent_3.png" alt="#"></a>
                                                <p><strong><a href="#">Prambose</a> <i>says: </i> </strong> Morbi augue velit, tempus mattis dignissim nec, porta sed risus. Donec eget magna eu lorem tristique pellentesque eget eu dui. Fusce lacinia tempor malesuada.</p>
                                            </li>
                                            <li class="comments_list clearfix">
                                                <a class="post-thumbnail" href="#"><img width="60" height="60" src="images/content/recent_1.png" alt="#"></a>
                                                <p><strong><a href="#">Makaroni</a> <i>says: </i> </strong> Tempus mattis dignissim nec, porta sed risus. Donec eget magna eu lorem tristique pellentesque eget eu dui. Fusce lacinia tempor malesuada.</p>
                                            </li>
                                            <li class="comments_list clearfix">
                                                <a class="post-thumbnail" href="#"><img width="60" height="60" src="images/content/recent_2.png" alt="#"></a>
                                                <p><strong><a href="#">Prambanan</a> <i>says: </i> </strong> Donec convallis, metus nec tempus aliquet, nunc metus adipiscing leo, a lobortis nisi dui ut odio. Nullam ultrices, eros accumsan vulputate faucibus, turpis tortor.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

							<div class="widget widget_tags">
								<div class="widget_title">
									<h4><span>Tags Widget</span></h4>
								</div>
								<ul class="tags">
									<li><a href="#"><b>business</b></a></li>
									<li><a href="#">corporate</a></li>
									<li><a href="#">css3</a></li>
									<li><a href="#"><b>html5</b></a></li>
									<li><a href="#">javascript</a></li>
									<li><a href="#"><b>jquery</b></a></li>
									<li><a href="#">multipurpose</a></li>
									<li><a href="#"><b>mysql</b></a></li>
									<li><a href="#">portfolio</a></li>
									<li><a href="#">premium</a></li>
									<li><a href="#">responsive</a></li>
									<li><a href="#"><b>theme</b></a></li>
									<li><a href="#"><b>Yahoo Baba</b></a></li>
								</ul>
							</div>
							
							<div class="widget widget_archives">
								<div class="widget_title">
									<h4><span>Archives</span></h4>
								</div>
								<ul class="archives_list list_style ">
									<li><a href="#"> November 2015</a></li>
									<li><a href="#"> October 2015</a></li>
									<li><a href="#"> September 2015</a></li>
									<li><a href="#"> August 2015</a></li>
									<li><a href="#"> July 2015</a></li>
									<li><a href="#"> June 2015</a></li>
									<li><a href="#"> May 2015</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div><!--/.row-->
			</div> <!--/.container-->
		</section>
		
	</section>
	<!--end wrapper-->
	
	<!--start footer-->
    <?php
    require __DIR__.'/util/footer.php';
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