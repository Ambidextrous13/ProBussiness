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

        <!--End Header-->
            
            <!--start wrapper-->
            <?php
                $query = $_GET['query'];
                require __dir__.'/util/info.php';

                $pera = "";

                switch ($query) {
                    case 'Web Development Query':
                        $pera = $webDev;
                        break;
                    
                    case 'Brand Building Query':
                        $pera = $brandBuild;
                        break;
                    
                    case 'Mobile Application Query':
                        $pera = $appDev;
                        break;
                }
                $pageName = 'Query';
                require __DIR__.'/util/header.php'; 
                echo $header;
            ?>
            <section class="wrapper">
                <section class="content contact">
                    <div class="container">
                        <div class="row sub_content">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="dividerHeading">
                                    <h4><span><?php echo $query ?></span></h4>
                                </div>
                                <p> 
                                    <?php echo $query ?> 
                                </p>
                                    
                                <div class="alert alert-success hidden alert-dismissable" id="contactSuccess">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Success!</strong> Your message has been sent to us.
                                </div>
                                
                                <div class="alert alert-error hidden" id="contactError">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Error!</strong> There was an error sending your message.
                                </div>
                                
                                <form id="contactForm" action="" novalidate="novalidate">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-6 ">
                                                <input type="text" id="name" name="name" class="form-control" maxlength="100" data-msg-required="Please enter your name." value="" placeholder="Your Name*" >
                                            </div>
                                            <div class="col-lg-6 ">
                                                <input type="email" id="email" name="email" class="form-control" maxlength="100" data-msg-email="Please enter a valid email address." data-msg-required="Please enter your email address." value="" placeholder="Your E-mail*" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="<?php echo $query ?>" placeholder="Subject" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <textarea id="message" class="form-control" name="message" rows="10" cols="50" data-msg-required="Please enter your message." maxlength="5000" placeholder="Requirement*"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Send Message">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="sidebar">
                                    <div class="widget_info">
                                        <div class="dividerHeading">
                                            <h4><span>Contact Info</span></h4>
                                            </div>
                                        <p><?php echo $paraInfo ?></p>
                                        <ul class="widget_info_contact">
                                            <li><i class="fa fa-map-marker"></i> <p><strong>Address</strong>: <?php echo $address ?></p></li>
                                            <li><i class="fa fa-user"></i> <p><strong>Phone</strong><a href="tel:">:<?php echo $phone ?></p></li>
                                            <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: <a href="mailto:"><?php echo $email ?></a></p></li>
                                            <li><i class="fa fa-globe"></i> <p><strong>Web</strong>: <a href="index.php" data-placement="bottom" data-toggle="tooltip" title="'.$website.'"><?php echo $website?></a></p></li>
                                        </ul>
                                        
                                    </div>
                                    
                                    <div class="widget_social">
                                        <div class="dividerHeading">
                                            <h4><span>Get Social</span></h4>
                                        </div>
                                        <ul class="widget_social">
                                            <li><a class="fb" href="<?php echo $facebook?>" data-placement="bottom" data-toggle="tooltip" title="Facbook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twtr" href="<?php echo $twitterAccount?>" data-placement="bottom" data-toggle="tooltip" title="Twitter"  target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="gmail" href="<?php echo $gPlus?>" data-placement="bottom" data-toggle="tooltip" title="Google"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a class="dribbble" href="<?php echo $dribble?>" data-placement="bottom" data-toggle="tooltip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
                                            <li><a class="skype" href="<?php echo $skype?>" data-placement="bottom" data-toggle="tooltip" title="Skype"><i class="fa fa-skype"></i></a></li>
                                            <li><a class="pinterest" href="<?php echo $pinterest?>" data-placement="bottom" data-toggle="tooltip" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a class="instagram" href="<?php echo $insta?>" data-placement="bottom" data-toggle="tooltip" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                            <li><a class="youtube" href="<?php echo $youtube?>" data-placement="bottom" data-toggle="tooltip" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                            <li><a class="linkedin" href="<?php echo $linkedIn?>" data-placement="bottom" data-toggle="tooltip" title="Linkedin"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a class="flickrs" href="<?php echo $flickr?>" data-placement="bottom" data-toggle="tooltip" title="Flickr"><i class="fa fa-flickr"></i></a></li>
                                            <li><a class="rss" href="<?php echo $rss?>" data-placement="bottom" data-toggle="tooltip" title="RSS"><i class="fa fa-rss"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </section>
            <!--end wrapper-->

            <!--start footer-->';
            <?php
                require __DIR__.'/util/footer.php';
                echo $footer;
                
            ?>

            echo '
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

            <script type="text/javascript" src="js/jquery.validate.js"></script>
            <script type="text/javascript" src="js/view.contact.js"></script>
            <script type="text/javascript" src="js/jquery.gmap.js"></script>
            <script type="text/javascript" src="js/jquery.sticky.js"></script>

            <script src="js/main.js"></script>

            <!-- Start Style Switcher -->
            <div class="switcher"></div>
            <!-- End Style Switcher -->


        </body>
        </html>