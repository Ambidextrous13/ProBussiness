<?php
    include_once __dir__."/info.php";
    require_once dirname(__DIR__,2).'/private/definations/dbFunctions.php';
    require_once dirname(__DIR__,2).'/private/definations/generalFunctions.php';
    $footer = '
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="widget_title">
                        <h4><span>About Us</span></h4>
                    </div>
                    <div class="widget_content">
                        <p>'.
                            $paraInfo.
                        '</p>
                        <ul class="contact-details-alt">
                            <li><i class="fa fa-map-marker"></i> <p><strong>Address</strong>: <a>'.
                            $address.'
                        </a></p></li>
                            <li><i class="fa fa-user"></i> <p><strong>Phone</strong>: <a href="tel:">'.
                            $phone.'
                        </a></p></li>
                            <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: <a href="mailto:">'.
                            $email.'
                        </a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="widget_title">
                        <h4><span>Recent Posts</span></h4>
                    </div>';
    $query = "SELECT `blog_id`,`blog_title`,`blog_create_date` FROM `blogs` ORDER BY `blog_id` DESC LIMIT 3";
    $inputs = [];
    $types = [];
    $articles = runQuery($query,$inputs,$types);

    $footer.='<div class="widget_content">'.
        '<ul class="links">';

    foreach ($articles as $article) {
        $date = explode(" ",$article['blog_create_date'])[0];
        [$Y,$M,$D] = explode("-",$date,3);
        $date = intToMonthName($M).' '.$D.', '.$Y;
        
        $footer.='<li><a href="blog-post.php?blog_id='.$article['blog_id'].'">'.$article['blog_title'].'<span>'.$date.'</span></a></li>';
    }
    $footer.='</ul>'.
    '</div>';

    $footer.='</div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="widget_title">
                        <h4><span>Twitter</span></h4>
                    </div>
                    <div class="widget_content">
                        <ul class="tweet_list">
                            <li class="tweet_content item">
                                <p class="tweet_link"><a href="https://twitter.com/JANAK84659489" target="_blank">@ProBussiness</a> Lorem ipsum dolor et, consectetur adipiscing eli</p>
                                <span class="time">29 September 2020</span>
                            </li>
                            <li class="tweet_content item">
                                <p class="tweet_link"><a href="https://twitter.com/JANAK84659489" target="_blank">@ProBussiness </a> Lorem ipsum dolor et, consectetur adipiscing eli</p>
                                <span class="time">29 September 2020</span>
                            </li>
                            <li class="tweet_content item">
                                <p class="tweet_link"><a href="https://twitter.com/JANAK84659489" target="_blank">@ProBussiness </a> Lorem ipsum dolor et, consectetur adipiscing eli</p>
                                <span class="time">29 September 2020</span>
                            </li>
                        </ul>
                    </div>
                    <div class="widget_content">
                        <div class="tweet_go"></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="widget_title">
                        <h4><span>Flickr Gallery</span></h4>
                    </div>
                    <div class="widget_content">
                        <div class="flickr">
                            <ul id="flickrFeed" class="flickr-feed"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<!--end footer-->
	
	<section class="footer_bottom">
		<div class="container">
			<div class="row">
            <div class="col-sm-6">
                <p class="copyright">&copy; Copyright 2020 ProBusiness | Powered by  <a href="#">Oreo</a></p>
            </div>

            <div class="col-sm-6 ">
                <div class="footer_social">
                    <ul class="footbot_social">
                        <li><a class="fb" href="'.$facebook.'" data-placement="top" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twtr" href="'.$twitterAccount.'" data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="'.$dribble.'" data-placement="top" data-toggle="tooltip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="skype" href="'.$skype.'" data-placement="top" data-toggle="tooltip" title="Skype"><i class="fa fa-skype"></i></a></li>
                        <li><a class="rss" href="'.$rss.'" data-placement="top" data-toggle="tooltip" title="RSS"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
		</div>
	</section>';
    ?>