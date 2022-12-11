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
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/flexslider.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" href="css/layout/wide.css" data-name="layout">

    <link rel="stylesheet" href="css/animate.css" />

    <link rel="stylesheet" type="text/css" href="css/switcher.css" media="screen" />

</head>

<body class="home">
    <?php
    $pageName = 'Home';
    require __DIR__ . '/util/header.php';
    echo $header;
    require __DIR__ . '/util/info.php';
    ?>
    <!--start wrapper-->
    <section class="wrapper">
        <!--start info service-->
        <section class="info_service">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInDown">
                        <h1 class="intro text-center"><?php
                                                        echo $punchLine;
                                                        ?></h1>
                        <p class="lead text-center"><?php
                                                    echo $punchLineFollow
                                                    ?></p>
                    </div>
                </div>

                <div class="row sub_content">
                    <div class="rs_box  wow bounceInRight" data-wow-offset="200">
                        <h2 class="lead text-left"><strong>Services</strong></h2>
                        <div class="col-md-4">
                            <div class="serviceBox_4">
                                <div class="service-icon">
                                    <a href="query-check.php?query=Web Development Query">
                                        <span><i class="fa fa-globe"></i></span>
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3>Web Development</h3>
                                    <p>
                                        <?php
                                        echo str_split($webDev, 280)[0] . '...';
                                        ?> </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="serviceBox_4">
                                <div class="service-icon">
                                    <a href="query-check.php?query=Brand Building Query">
                                        <span><i class="fa fa-rocket"></i></span>
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3>Brand Building</h3>
                                    <p>
                                        <?php
                                        echo str_split($brandBuild, 280)[0] . '...';
                                        ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="serviceBox_4">
                                <div class="service-icon">
                                    <a href="query-check.php?query=Mobile Application Query">
                                        <span><i class="fa fa-mobile"></i></span>
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3>Application Development</h3>
                                    <p>
                                        <?php
                                        echo str_split($appDev, 280)[0] . '...';
                                        ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="row sub_content">
                    <div class="rs_box wow bounceInLeft" data-wow-offset="200">
                        <div class="col-sm-4">
                            <div class="serviceBox_4">
                                <div class="service-icon">
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Easy To Customize</h3>
                                    <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="serviceBox_4">
                                <div class="service-icon">
                                    <i class="fa fa-comment-o"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Multimedia Support</h3>
                                    <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="serviceBox_4">
                                <div class="service-icon">
                                    <i class="fa fa-bell-o"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Documentation</h3>
                                    <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->

            </div>
        </section>
        <!--end info service-->

        <section class="feature_bottom">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-8 col-md-8 col-sm-8 wow fadeInLeft">
                        <div class="dividerHeading">
                            <h4><span>Why Choose Us?</span></h4>
                        </div>
                        <div class="row">


                            <?php
                            require dirname(__DIR__) . '\private\definations\dbFunctions.php';
                            require dirname(__DIR__) . '\private\definations\generalFunctions.php';

                            $query = "SELECT `achievement`.*,`authors`.`author_name` FROM `achievement` JOIN `authors` ON `achievement`.`author_id` = `authors`.`author_id` ORDER BY `achievement`.`achievement_id` DESC LIMIT 2";
                            $inputs = [];
                            $types = [];
                            $articles = runQuery($query, $inputs, $types);

                            foreach ($articles as $article) {
                                $try = false;

                                echo '<div class="col-lg-6  rec_blog">
                                <div class="blogPic">';
                                $imgs = explode(",", $article["achievement_img"]);
                                if (count($imgs) > 1) {
                                    $try = true;
                                    echo '<div class="news-thumb">
                                    <div class="swipe" id="slider" style="visibility: visible;">
                                    <ul class="swipe-wrap" style="width: 904px;">
                                        <li><img alt="" src="' . $imgs[0] . '">
                                            <div class="blog-hover">
                                                <a href="achievement-post.php?achievement_id=' . $article["achievement_id"] . '">
                                                    <span class="icon">
                                                        <i class="fa fa-link"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                        <li><img alt="" src="' . $imgs[1] . '">
                                            <div class="blog-hover">
                                                <a href="achievement-post.php?achievement_id=' . $article["achievement_id"] . '">
                                                    <span class="icon">
                                                        <i class="fa fa-link"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                        <li><img alt="" src="' . $imgs[2] . '">
                                            <div class="blog-hover">
                                                <a href="achievement-post.php?achievement_id=' . $article["achievement_id"] . '">
                                                    <span class="icon">
                                                        <i class="fa fa-link"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="swipe-navi">
                                        <div onclick="mySwipe.prev()" class="swipe-left"><i class="fa fa-chevron-left"></i></div>
                                        <div onclick="mySwipe.next()" class="swipe-right"><i class="fa fa-chevron-right"></i></div>
                                    </div>
                                </div>
                                </div>';
                                } else {
                                    echo '<img alt="" src="' . $article["achievement_img"] . '">
                                    <div class="blog-hover">
                                        <a href="achievement-post.php?achievement_id=' . $article["achievement_id"] . '">
                                            <span class="icon">
                                                <i class="fa fa-link"></i>
                                            </span>
                                        </a>
                                    </div>';
                                }




                                echo '<div class="blogDetail">
                                    <div class="blogTitle">
                                        <a href="achievement-post.php?achievement_id=' . $article["achievement_id"] . '">
                                            <h2>' . $article["achievement_title"] . '</h2>
                                        </a>
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            30 June, 20:43 PM
                                        </span>
                                    </div>
                                    <div class="blogContent">
                                        <p>' . str_split($article["achievement_desc"], 100)[0] . '... </p>
                                        
                                    </div>
                                    <div class="blogMeta">
                                        <a href="########################################################">
                                            <i class="fa fa-user"></i>
                                            ' . $article["author_name"] . '
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>';
                            }
                            ?>
                            </div>
                        </div>
                    <!-- TESTIMONIALS -->
                    <?php
                        require_once __dir__.'/util/testimonials.php';
                    ?>
                </div>
            </div>
        </section>
        
        <?php
            $query = "SELECT count(`client_id`) FROM `clients`";
            $mt = [];
            $client_count = runQuery($query,$mt,$mt);
            $speed = 2500;                        
            echo '
        <section class="counter-parallax">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="count-box">
                            <span class="icon"><i class="fa fa-briefcase "></i></span>
                            <p><b class="timer" data-to="100" data-speed="'.$speed.'"></b>%</p>
                            <span class="title">completed</span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="count-box">
                            <span class="icon"><i class="fa fa-users"></i></span>
                            <p><b class="timer" data-to="'.$client_count[0]['count(`client_id`)'].'" data-speed="'.$speed.'"></b></p>
                            <span class="title">customers</span>
                        </div>
                    </div>';

                    $query = "SELECT count(`is_awarded`) FROM `achievement` WHERE `is_awarded` ='1'";
                    $awards_counts = runQuery($query,$mt,$mt)[0]['count(`is_awarded`)'];
                    echo'<div class="col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="count-box">
                            <span class="icon"><i class="fa fa-trophy"></i></span>
                            <p><b class="timer" data-to="'.$awards_counts.'" data-speed="'.$speed.'"></b></p>
                            <span class="title">Awards</span>
                        </div>
                    </div>';
                    
                    $query = "SELECT count(`client_says`) FROM `clients` WHERE `client_says` !=''";
                    $replies_counts = runQuery($query,$mt,$mt)[0]['count(`client_says`)'];

                    echo '<div class="col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="count-box">
                            <span class="icon"><i class="fa fa-life-ring"></i></span>
                            <p><b class="timer" data-to="'.$replies_counts.'" data-speed="'.$speed.'"></b></p>
                            <span class="title">replied</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
        ?>
        <section class="clients">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dividerHeading">
                            <h4><span>Our Clients</span></h4>
                        </div>

                        <div class="our_clients">
                            <ul class="client_items clearfix">
                                <?php
                                    $query = "SELECT `client_name`,`client_website`,`client_logo` FROM `clients` ORDER BY `client_id` DESC LIMIT 4";
                                    $clients = runQuery($query,$mt,$mt);
                                    foreach ($clients as $client) {
                                        echo '<li class="col-sm-3 col-md-3 col-lg-3"><a href="'.$client['client_website'].'" data-placement="bottom" data-toggle="tooltip" title="'.$client['client_name'].'"><img src="'.$client['client_logo'].'" alt="" /></a></li>';
                                    }
                                ?>
                                <li class="col-sm-3 col-md-3 col-lg-3"><a href="services.html" data-placement="bottom" data-toggle="tooltip" title="Client 1"><img src="images/clients/1.png" alt="" /></a></li>
                                <li class="col-sm-3 col-md-3 col-lg-3"><a href="services.html" data-placement="bottom" data-toggle="tooltip" title="Client 2"><img src="images/clients/2.png" alt="" /></a></li>
                            </ul>
                            <!--/ .client_items-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="promo_box wow bounceIn">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="promo_content">
                            <h3>ProBusiness </h3>
                            <p>The designers of awesome looking websites and moblie applications </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="pb_action">
                            <a class="btn btn-lg btn-default" href="contact.php">
                                <i class="fa fa-shopping-cart"></i>
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
    <!--
    <script src="js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
-->
    <script type="text/javascript" src="js/jquery.smartmenus.min.js"></script>
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jflickrfeed.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/swipe.js"></script>

    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>

    <script src="js/main.js"></script>

    <!-- Start Style Switcher -->
    <div class="switcher"></div>
    <!-- End Style Switcher -->



    <script>
        $('.flexslider.top_slider').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: true,
            prevText: "&larr;",
            nextText: "&rarr;"
        });
    </script>

    <!-- WARNING: Wow.js doesn't work in IE 9 or less -->
    <!--[if gte IE 9 | !IE ]><!-->
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>
        // WOW Animation
        new WOW().init();
    </script>
    <![endif]-->
</body>
</html>