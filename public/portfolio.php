<?php
    require_once dirname(__DIR__).'/private/definations/dbFunctions.php';
    $rec_cat = 'all';
    $projects = '';
    $totalProjects = 0;
    $perPageLimit = 4;
    $pageNo = 1;

    // Local functions ////////////////////////////////

    function callAll($perPageLimit,$pageNo){
        $totalProjects = runQuery("SELECT COUNT(`project_id`) FROM `projects`",[],[])[0]['COUNT(`project_id`)'];
        $pageNo = pagePlz($perPageLimit,$totalProjects);
        $start = $perPageLimit*($pageNo-1);
        $projects = runQuery("SELECT * FROM `projects` LIMIT $start, $perPageLimit",[],[]);
            if(!$projects){
                header('Location: 404-page.php');
            }else {
                return [$totalProjects, $projects];
            }
    }

    function pagePlz($perPageLimit,$totalProjects){
        if (isset($_GET['page'])) {
            $pageNo = $_GET['page'];
            if ($pageNo  > ceil($totalProjects/$perPageLimit)) {
                $pageNo = 1;
            }
            return $pageNo;
        }else{
            return 1;
        }
    }


    $query = 'SELECT `category_id`,`category_name` FROM `categories_decode` WHERE `category_id` BETWEEN 100 AND 200';
    $cats = runQuery($query,[],[]);


    if (isset($_GET['cat'])) {
        $rec_cat = $_GET['cat'];
        $valid_cat = false;
        $valid_id = null;
        for ($i=0; $i < count($cats); $i++) { 
            if ($cats[$i]['category_name'] == $rec_cat) {
                $valid_cat = true;
                $valid_id = $cats[$i]['category_id'];
                break;
            }
        }
        if ($valid_cat) {
            $inserts = runQuery("SELECT `ids`,`count` FROM `categories_decode` WHERE `category_id` = $valid_id", [], [])[0];
            $totalProjects = $inserts['count'];
            $inserts = str_replace(' , ',' OR `project_id` = ',$inserts['ids']);
            $projects = '';
            if ($inserts == '') {
                $projects = 'NOTHING TO SHOW!!';
            }else {
                $pageNo = pagePlz($perPageLimit,$totalProjects);
                $start = $perPageLimit*($pageNo-1);
                $projects = runQuery("SELECT * FROM `projects` WHERE `project_id` = $inserts LIMIT $start , $perPageLimit",[],[]);
                if(!$projects){
                    header('Location: 404-page.php');
                }
            }
        }elseif($rec_cat == 'all'){
            [$totalProjects, $projects] = callAll($perPageLimit,$pageNo);
        }else {
            header('Location: 404-page.php');
        }
    }elseif ($rec_cat == 'all') {
        [$totalProjects, $projects] = callAll($perPageLimit,$pageNo);
        
    }else {
        header('Location: 404-page.php');
    }

    $pageNo = pagePlz($perPageLimit,$totalProjects);
   
?>




<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>ProBusiness Portfolio</title>
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
    echo $header;
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
                        <?php
                        $class = '';
                            if ($rec_cat == 'all') {
                                $class = 'class="selected"';
                            }
                            echo' <li '.$class.'><a href="portfolio.php">All</a></li>';
                            foreach ($cats as $cat) {
                                $class = '';
                                if ($rec_cat == $cat['category_name']) {
                                    $class = 'class="selected"';
                                }
                                echo<<<STR
                                    <li $class><a href="?cat={$cat['category_name']}">{$cat['category_name']}</a></li>
                                    STR;
                            }
                        ?>
                    </ul>
                    <!--end portfolio filter -->

                    <!--begin portfolio_masonry -->
                    <div class="mixed-container masonry_wrapper">

                        <?php
                            foreach ($projects as $project) {
                                $img = explode(' , ',$project['project_img']);
                                // $img = '';
                                // print_r($img);

                                if($img[0]==''){
                                    $rand = rand(1,4);
                                    $pair = [];
                                    switch ($rand) {
                                        case 1:
                                        $pair = ['images/portfolio/full/portfolio_7.png','images/portfolio/full/portfolio_7.png'];break;
                                        case 2:
                                        $pair = ['images/portfolio/portfolio_9.png','images/portfolio/full/portfolio_1.png'];break;
                                        case 3:
                                        $pair = ['images/portfolio/full/portfolio_4.png','images/portfolio/full/portfolio_4.png'];break;
                                        case 4:
                                        $pair = ['images/portfolio/portfolio_1_3.png','images/portfolio/full/portfolio_6.png'];break;
                                    }
                                }else {
                                    $pair = [$img[0],$img[0]];
                                }
                                
                                echo<<<STR
                                            <div id="{$project['project_id']}" class="item portfolio-jan">
                                                <figure class="touching effect-bubba">
                                                    <img src="{$pair[0]}" alt="" class="img-responsive">
                    
                                                    <div class="option">
                                                        <a href="portfolio_single.php?id={$project['project_id']}" class="fa fa-link"></a>
                                                        <a href="{$pair[1]}" class="fa fa-search mfp-image"></a>
                                                    </div>
                                                    <figcaption class="item-description">
                                                        <h5>{$project['project_name']}</h5>
                                                        <p>{$project['project_company']}</p>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                    STR;    
                            }
                        ?>
                    <!--end portfolio_masonry -->
                </div>
                <!--end isotope -->
                <div class="col-sm-12 text-center">
                    <ul class="pagination">
                        
                        <?php
                        $maxPages = ceil($totalProjects/$perPageLimit);
                        
                        if ($pageNo > 1) {
                            $URI = "portfolio.php?cat={$rec_cat}&page=".($pageNo-1);
                            echo '<li><a href="'.$URI.'">&laquo;</a></li>';
                        }else{
                            echo '<li style="cursor : not-allowed"><a>&laquo;</a></li>';
                        }

                        for ($i=1; $i <= $maxPages; $i++) { 
                            $URI = "portfolio.php?cat={$rec_cat}&page={$i}";
                            $class = '';
                            if($pageNo == $i){
                                $class = 'class="active"';
                            }
                            echo <<<STR
                                     <li $class><a href="{$URI}">$i</a></li>
                                STR;
                        } 

                        if ($pageNo < $maxPages) {
                            $URI = "portfolio.php?cat={$rec_cat}&page=".($pageNo+1);
                            echo '<li><a href="'.$URI.'">&raquo;</a></li>';
                        }else{
                            echo '<li style="cursor : not-allowed"><a>&raquo;</a></li>';
                        }
                        ?>
                        <!-- <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li> -->
                        <!-- <li><a href="#">&raquo;</a></li> -->
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
<script>
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