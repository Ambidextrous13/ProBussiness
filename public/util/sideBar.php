<!--Sidebar Widget-->
<div class="col-xs-12 col-md-4 col-lg-4 col-sm-4">
    <div class="sidebar">
        <div class="widget widget_search">
            <div class="site-search-area">
                <form method="get" id="site-searchform" action="">
                    <div>
                        <input class="input-text" name="search" id="s" placeholder="Enter Search keywords..." type="text" />
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


                <?php
                // Category widget
                $query5 = "SELECT `category_id`,`category_name`,`count` FROM `categories_decode` ORDER BY `count` DESC LIMIT 6";
                foreach (runQuery($query5, [], []) as $category) {
                    echo '<li><a href="blogs.php?id=' . $category['category_id'] . '&name=' . $category['category_name'] . '">' . $category['category_name'] . ' (' . $category['count'] . ')</a></li>';
                }
                ?>


            </ul>
        </div>

        <div class="widget widget_about">
            <div class="widget_title">
                <h4><span>Text Widget</span></h4>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adip, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>


        <div class="ProBusiness-tab sidebar-tab">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#Popular" data-toggle="tab">Popular</a></li>
                <li class=""><a href="#Recent" data-toggle="tab">Recent</a></li>
            </ul>

            <div class="tab-content clearfix">
                <div class="tab-pane fade active in" id="Popular">
                    <ul class="recent_tab_list">
                    <?php
                        $query = "SELECT `blog_id`,`blog_title`,`blog_create_date`,`blog_img` FROM `blogs` ORDER BY `views` DESC LIMIT 3";
                        $inputs = [];
                        $types = [];
                        $articles = runQuery($query,$inputs,$types);

                        $counter = 1;
                        foreach ($articles as $article) {
                            $date = explode(" ",$article['blog_create_date'])[0];
                            [$Y,$M,$D] = explode("-",$date,3);
                            $date = intToMonthName($M).' '.$D.', '.$Y;
                            $class = '';
                            if (count($articles)==$counter) {
                                $class='class="last-tab"';
                            }
                            $t = <<<STR
                            <li $class>
                                <span><a href="blog-post.php?blog_id={$article['blog_id']}"><img src="{$article['blog_img']}" height="50px" alt="" /></a></span>
                                <a href="blog-post.php?blog_id={$article['blog_id']}">{$article['blog_title']}</a>
                                <i>$date</i>
                            </li>
                            STR;
                            echo $t;
                            $counter +=1;
                        }
                    ?>
                        <!-- <li>
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
                        </li> -->
                    </ul>
                </div>
                <div class="tab-pane fade" id="Recent">
                    <ul class="recent_tab_list">
                    <?php
                        $query = "SELECT `blog_id`,`blog_title`,`blog_create_date`,`blog_img` FROM `blogs` ORDER BY `blog_id` DESC LIMIT 3";
                        $inputs = [];
                        $types = [];
                        $articles = runQuery($query,$inputs,$types);

                        $counter = 1;
                        foreach ($articles as $article) {
                            $date = explode(" ",$article['blog_create_date'])[0];
                            [$Y,$M,$D] = explode("-",$date,3);
                            $date = intToMonthName($M).' '.$D.', '.$Y;
                            $class = '';
                            if (count($articles)==$counter) {
                                $class='class="last-tab"';
                            }
                            $t = <<<STR
                            <li $class>
                                <span><a href="blog-post.php?blog_id={$article['blog_id']}"><img src="{$article['blog_img']}" height="50px" alt="" /></a></span>
                                <a href="blog-post.php?blog_id={$article['blog_id']}">{$article['blog_title']}</a>
                                <i>$date</i>
                            </li>
                            STR;
                            echo $t;
                            $counter +=1;
                        }
                    ?>

                        <!-- <li>
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
                        </li> -->
                    </ul>
                </div>                
            </div>
        </div>

        <div class="widget widget_tags">
            <div class="widget_title">
                <h4><span>Blogs Speaks on</span></h4>
            </div>
            <ul class="tags">
                <?php
                $mixData = '';
                global $data, $isBlogs;
                if ($data) {

                    if ($isBlogs) {
                        foreach ($data as $individual) {

                            $mixData .= $individual['blog_title'] . ' ';
                            $mixData .= $individual['blog_desc'] . ' ';
                        }
                    } 
                    
                    else {
                        $mixData .= $data['blog_title'] . ' ';
                        $mixData .= $data['blog_desc'] . ' ';
                    }


                    $counter = [];
                    foreach (explode(' ', $mixData) as $word) {
                        $word = strtolower($word);
                        str_replace('.', '', $word);
                        if (strlen($word) > 5 && ctype_alnum($word)) {
                            if (isset($counter[$word])) {
                                $counter[$word] += 1;
                            } else {
                                $counter[$word] = 1;
                            }
                        }
                    }
                    arsort($counter);
                    $counter = array_slice($counter, 0, 13);
                    foreach ($counter as $word => $count) {
                        if (rand(0, 1)) {
                            echo "<li><a><b>$word</b></a></li>";
                        } else {
                            echo "<li><a>$word</a></li>";
                        }
                    }
                }
                ?>
                <!-- <li><a href="#"><b>business</b></a></li>
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
									<li><a href="#"><b>Yahoo Baba</b></a></li> -->
            </ul>
        </div>

        <div class="widget widget_archives">
            <div class="widget_title">
                <h4><span>Archives</span></h4>
            </div>
            <ul class="archives_list list_style">
                <?php
                    $query = 'SELECT count(`blog_id`) count,month(`blog_create_date`) M,year(`blog_create_date`) Y FROM `blogs` GROUP BY month(`blog_create_date`),year(`blog_create_date`) ORDER BY month(`blog_create_date`) DESC,year(`blog_create_date`) LIMIT 6';
                    $result = runQuery($query,[],[]);
                    foreach ($result as $row) {
                        require_once dirname(__DIR__,2).'/private/definations/generalFunctions.php';
                        $month = intToMonthName($row['M']);
                        echo <<<STR
                                <li><a href="blogs.php?m={$row['M']}&y={$row['Y']}"> $month {$row['Y']} ({$row['count']})</a></li>
                                STR;
                    }
                ?>
                
                <!-- <li><a href="#"> October 2015</a></li>
                <li><a href="#"> September 2015</a></li>
                <li><a href="#"> August 2015</a></li>
                <li><a href="#"> July 2015</a></li>
                <li><a href="#"> June 2015</a></li>
                <li><a href="#"> May 2015</a></li> -->
            </ul>
        </div>


    </div>
</div>