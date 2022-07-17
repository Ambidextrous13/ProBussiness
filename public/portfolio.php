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
    $pageName = 'Portfolios';
    require __DIR__.'/util/header.php'; 
?>
<!--End Header-->

<!--start wrapper-->
<section class="wrapper">
    <section class="content portfolio large-images">
        <div class="container">
            <div class="row sub_content">
                <!--begin isotope -->
                <div class="col-lg-12 isotope">
                    <!--begin portfolio filter -->
                    <ul id="filter">
                        <li data-filter="*" class="selected"><a href="#">All</a></li>
                        <li data-filter=".responsive"><a href="#">Responsive</a></li>
                        <li data-filter=".mobile"><a href="#">Mobile</a></li>
                        <li data-filter=".branding"><a href="#">Branding</a></li>
                    </ul>
                    <!--end portfolio filter -->

                    <!--begin portfolio_masonry -->
                    <div class="mixed-container masonry_wrapper">
                        <div class="item mobile">
                            <figure class="touching effect-bubba">
                                <img src="images/portfolio/full/portfolio_7.png" alt="" class="img-responsive">

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

                        <div class="item branding">
                            <figure class="touching effect-bubba">
                                <img src="images/portfolio/portfolio_9.png" alt="" class="img-responsive">

                                <div class="option">
                                    <a href="portfolio_single.html" class="fa fa-link"></a>
                                    <a href="images/portfolio/full/portfolio_1.png" class="fa fa-search mfp-image"></a>
                                </div>
                                <figcaption class="item-description">
                                    <h5>Touch and Swipe</h5>
                                    <p>Branding</p>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="item branding">
                            <figure class="touching effect-bubba">
                                <img src="images/portfolio/full/portfolio_4.png" alt="" class="img-responsive">

                                <div class="option">
                                    <a href="portfolio_single.html" class="fa fa-link"></a>
                                    <a href="images/portfolio/full/portfolio_4.png" class="fa fa-search mfp-image"></a>
                                </div>
                                <figcaption class="item-description">
                                    <h5>Touch and Swipe</h5>
                                    <p>Branding</p>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="item responsive">
                            <figure class="touching effect-bubba">
                                <img src="images/portfolio/full/portfolio_8.png" alt="" class="img-responsive">

                                <div class="option">
                                    <a href="portfolio_single.html" class="fa fa-link"></a>
                                    <a href="images/portfolio/full/portfolio_8.png" class="fa fa-search mfp-image"></a>
                                </div>
                                <figcaption class="item-description">
                                    <h5>Touch and Swipe</h5>
                                    <p>Responsive</p>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="touching effect-bubba">
                                <img src="images/portfolio/portfolio_1_3.png" alt="" class="img-responsive">

                                <div class="option">
                                    <a href="portfolio_single.html" class="fa fa-link"></a>
                                    <a href="images/portfolio/full/portfolio_6.png" class="fa fa-search mfp-image"></a>
                                </div>
                                <figcaption class="item-description">
                                    <h5>Touch and Swipe</h5>
                                    <p>Technology</p>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="item responsive">
                            <figure class="touching effect-bubba">
                                <img src="images/portfolio/full/portfolio_2.png" alt="" class="img-responsive">

                                <div class="option">
                                    <a href="portfolio_single.html" class="fa fa-link"></a>
                                    <a href="images/portfolio/full/portfolio_2.png" class="fa fa-search mfp-image"></a>
                                </div>
                                <figcaption class="item-description">
                                    <h5>Touch and Swipe</h5>
                                    <p>Responsive</p>
                                </figcaption>
                            </figure>
                       </div>
                    </div>
                    <!--end portfolio_masonry -->
                </div>
                <!--end isotope -->
                <div class="col-sm-12 text-center">
                    <ul class="pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div> <!--./div-->
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
<script>
    (function ($) {
        var $container = $('.masonry_wrapper'),
                colWidth = function () {
                    var w = $container.width(),
                            columnNum = 1,
                            columnWidth = 0;
                    if (w > 1200) {
                        columnNum  = 2;
                    } else if (w > 900) {
                        columnNum  = 2;
                    } else if (w > 600) {
                        columnNum  = 2;
                    } else if (w > 300) {
                        columnNum  = 1;
                    }
                    columnWidth = Math.floor(w/columnNum);
                    $container.find('.item').each(function() {
                        var $item = $(this),
                                multiplier_w = $item.attr('class').match(/item-w(\d)/),
                                multiplier_h = $item.attr('class').match(/item-h(\d)/),
                                width = multiplier_w ? columnWidth*multiplier_w[1]-4 : columnWidth-4,
                                height = multiplier_h ? columnWidth*multiplier_h[1]*0.5-4 : columnWidth*0.5-4;
                        $item.css({
                            width: width,
                            height: height
                        });
                    });
                    return columnWidth;
                }

        function refreshWaypoints() {
            setTimeout(function() {
            }, 1000);
        }

        function setPortfolio() {
            setColumns();
            $container.isotope('reLayout');
        }

        isotope = function () {
            $container.isotope({
                resizable: true,
                itemSelector: '.item',
                masonry: {
                    columnWidth: colWidth(),
                    gutterWidth: 0
                }
            });
        };
        isotope();
        $(window).smartresize(isotope);
    }(jQuery));
</script>
<!-- Start Style Switcher -->
<div class="switcher"></div>
<!-- End Style Switcher -->
</body>
</html>