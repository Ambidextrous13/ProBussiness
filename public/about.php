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
								<img class="left_img img-thumbnail" src="images\teams\totalTeam 380x228.jpg" alt="about img">
                                <p style="text-align : justify">For more than a decade, Probusiness has worked with a variety of foreign companies from sectors as diverse as retail, software development, health care, insurance and many others to help them expand globally. This means that whichever service you might possibly be looking for whether it’s customer support or creating a novel mobile app – the company offers the complete package including strategic planning, development, programming and much more so client satisfaction always remains at an all-time high.</p>
                                <br><p style="text-align : justify">Need a high-quality, reliable one-stop to deliver the project on time and within budget? Look no further as we at Probusiness are well-known for delivering consistently high-standard work. Whether it be creating your online presence from scratch or just adding that extra special something, our team hired from around the world will put you and your company in the spotlight!</p>
							
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="dividerHeading">
								<h4><span>Our Skills</span></h4>
							</div>
							<p>The technological world is moving at a very fast pace and we have always kept up with it. Our top-notch developers are philomaths and have proven their expertise in these technologies.</p>
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
							<li><a> The customer-first approach</a></li>
							<li><a> World-class solutions and services</a></li>
							<li><a> High Morals & Ethics</a></li>
							<li><a> Value idea over hierarchy</a></li>
							<li><a> Respect for individual</a></li>
							<li><a> Doing best in what we do</a></li>
							<li><a> Honoring every commitment</a></li>
						</ul>
					</div>
					
					<!-- TESTIMONIALS -->
                    <?php
                        require_once __dir__.'/util/testimonials.php';
                    ?>
				</div>

                <?php
                    require_once __DIR__.'/util/promo.php';
                ?>

        

                <div class="row  sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dividerHeading">
                            <h4><span>Meet the Team</span></h4>

                        </div>
                    </div>

                    <?php
                        $team = runQuery("SELECT * FROM `employes` LIMIT 4",[],[]);
                        foreach ($team as $row) {// image size 270 X 320
                            echo <<<STR
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="team-item-content">
                                        <img src="{$row['employee_img']}" alt="profile img" width="270" height="320">
                                        <div class="team-info centered">
                                            <h5>{$row['employee_name']}</h5>
                                            <small>
                                            {$row['employee_designation']}
                                            </small>
                                            <ul class="team-social">
                                                <li>
                                                    <a target="_blank"  href="{$row['employee_linkedin']}">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="{$row['employee_twitter']}">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="{$row['employee_instagram']}">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            STR;
                        }
                    ?>
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
