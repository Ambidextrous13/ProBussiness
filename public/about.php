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
</head>
<body>
<!--Start Header-->
<?php
    $pageName = 'About';
    require __DIR__.'/util/header.php'; 
    echo $header;
?>
<!--End Header-->
	
	<!--start wrapper-->
	<section class="wrapper">
		<section class="content about">
			<div class="container">
				<div class="row sub_content">
					<div class="who">
						<div class="col-lg-8 col-md-8 col-sm-8">
							<div class="dividerHeading">
								<h4><span>Who we are?</span></h4>
							</div>
								<img class="left_img img-thumbnail" src="images/about_1.png" alt="about img">
                            <p>Veos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum. </p>
							<p>Donec rutrum erat non arcu gravida porttitor. Nunc et magna nisi. Lore aliquam at erat in lorem purus aliquet mollis. Fusce elementum velit vel dolor iaculis egestas. Maecenas ut nulla quis eros scelerisque posuere vel vitae nibh eros scelerisque. </p>
							<p>Fusce lacinia tempor malesuada. Ut lacus sapien, placerat a ornare nec, elementum sit amet felis. Maecenas pretium lorem hendrerit eros sagittis fermentum. Donec in ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo ad gravida. Cras suscipit, quam vitae adipiscing faucibus, risus nibh laoreet odio, a porttitor metus.</p>
							
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="dividerHeading">
								<h4><span>Our Skills</span></h4>
							</div>
							<p>Nunc et magna nisi. lore Aliquam at erat in lorem purus aliquet mollis. Fusce elementum velit vel dolor iaculis. </p>
							<ul class="progress-skill-bar">
								<li>
									<span class="lable">70%</span>
									<div class="progress_skill">
										<div class="bar" data-value="70" role="progressbar" data-height="100">
											HTML
										</div>
									</div>
								</li>
								<li>
									<span class="lable">80%</span>
									<div class="progress_skill">
										<div class="bar" data-value="80" role="progressbar" data-height="100">
											CSS
										</div>
									</div>
								</li>
								<li>
									<span class="lable">90%</span>
									<div class="progress_skill">
										<div class="bar" data-value="90" role="progressbar" data-height="100">
											JavaScript
										</div>
									</div>
								</li>
								<li>
									<span class="lable">80%</span>
									<div class="progress_skill">
										<div class="bar" data-value="80" role="progressbar" data-height="100">
											MySQL
										</div>
									</div>
								</li>
								<li>
									<span class="lable">70%</span>
									<div class="progress_skill">
										<div class="bar" data-value="70" role="progressbar" data-height="100">
											PHP
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row sub_content">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="dividerHeading">
							<h4><span>Why Choose Us?</span></h4>

						</div>
						<ul class="list_style circle">
							<li><a href="#"> Donec convallis, metus nec tempus aliquet</a></li>
							<li><a href="#"> Aenean commodo ligula eget dolor</a></li>
							<li><a href="#"> Cum sociis natoque penatibus mag dis parturient</a></li>
							<li><a href="#"> Lorem ipsum dolor sit amet cons adipiscing</a></li>
							<li><a href="#"> Accumsan vulputate faucibus turpis tortor dictum</a></li>
							<li><a href="#"> Nullam ultrices eros accumsan vulputate faucibus</a></li>
							<li><a href="#"> Nunc aliquet tincidunt metus sit amet</a></li>
						</ul>
					</div>
					
					<!-- TESTIMONIALS -->
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="dividerHeading">
							<h4><span>What Client's Say</span></h4>

						</div>
						<div id="testimonial-carousel" class="testimonial carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<div class="testimonial-item">
										<div class="icon"><i class="fa fa-quote-right"></i></div>
										<blockquote>
											<p>Donec convallis, metus nec tempus aliquet, nunc metus adipiscing leo, a lobortis nisi dui ut odio. Nullam ultrices, eros accumsan vulputate faucibus, turpis tortor dictum.</p>
										</blockquote>
										<div class="icon-tr"></div>
										<div class="testimonial-review">
											<img src="images/testimonials/1.png" alt="testimoni">
											<h1>Jonathan Dower,<small>Company Inc.</small></h1>
										</div>
									</div>
								</div>
								
								<div class="item">
									<div class="testimonial-item">
										<div class="icon"><i class="fa fa-quote-right"></i></div>
										<blockquote>
											<p>Nunc aliquet tincidunt metus, sit amet mattis lectus sodales ac. Suspendisse rhoncus dictum eros, ut egestas eros luctus eget. Nam nibh sem, mattis et feugiat ut, porttitor nec risus.</p>
										</blockquote>
										<div class="icon-tr"></div>
										<div class="testimonial-review">
											<img src="images/testimonials/2.png" alt="testimoni">
											<h1>Jonathan Dower<small>Leopard</small></h1>
										</div>
									</div>
								</div>
								
							</div>
							<div class="testimonial-buttons"><a href="#testimonial-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>&#32;
							<a href="#testimonial-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a></div>
						</div>
					</div><!-- TESTIMONIALS END -->
				</div>
			
				<div class="row sub_content">
					<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="promo_box">
                            <div class="col-sm-9">
                                <div class="promo_content">
                                    <h3>ProBusiness is awesome responsive template, with refreshingly clean design.</h3>
                                    <p>Lorem ipsum dolor sit amet, cons adipiscing elit. Aenean commodo ligula eget dolor. </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="pb_action">
                                    <a href="#fakelink" class="btn btn-default btn-lg">
                                        <i class="fa fa-shopping-cart"></i>
                                        Download Now
                                    </a>
                                </div>
                            </div>
                        </div>
					</div>
				</div>

                <div class="row  sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dividerHeading">
                            <h4><span>Meet the Team</span></h4>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="team-item-content">
                            <img src="images/teams/1.png" alt="profile img">
                            <div class="team-info centered">
                                <h5>kristiana</h5>
                                <small>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat vehicula dolor. Sed in dictum justo. Ut arcu sem, cursus et nisl ac, euismod cursus erat. Curabitur ut orci porttitor ligula congue porttitor. Cras vitae justo vitae augue cursus bibendum.
                                </small>
                                <ul class="team-social">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="team-item-content">
                            <img src="images/teams/2.png" alt="profile img">
                            <div class="team-info centered">
                                <h5>williamson</h5>
                                <small>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat vehicula dolor. Sed in dictum justo. Ut arcu sem, cursus et nisl ac, euismod cursus erat. Curabitur ut orci porttitor ligula congue porttitor. Cras vitae justo vitae augue cursus bibendum.
                                </small>
                                <ul class="team-social">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="team-item-content">
                            <img src="images/teams/3.png" alt="profile img">
                            <div class="team-info centered">
                                <h5>miranda joy</h5>
                                <small>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat vehicula dolor. Sed in dictum justo. Ut arcu sem, cursus et nisl ac, euismod cursus erat. Curabitur ut orci porttitor ligula congue porttitor. Cras vitae justo vitae augue cursus bibendum.
                                </small>
                                <ul class="team-social">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="team-item-content">
                            <img src="images/teams/4.png" alt="profile img">
                            <div class="team-info centered">
                                <h5>steve thomas</h5>
                                <small>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat vehicula dolor. Sed in dictum justo. Ut arcu sem, cursus et nisl ac, euismod cursus erat. Curabitur ut orci porttitor ligula congue porttitor. Cras vitae justo vitae augue cursus bibendum.
                                </small>
                                <ul class="team-social">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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

    <script src="js/main.js"></script>

    <!-- Start Style Switcher -->
    <div class="switcher"></div>
    <!-- End Style Switcher -->


	
</body>
</html>
