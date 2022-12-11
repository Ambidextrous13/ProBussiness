<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInRight">
    <div class="dividerHeading">
        <h4><span>What Client's Say</span></h4>
    </div>
    <div id="testimonial-carousel" class="testimonial carousel slide">
        <div class="carousel-inner">
            <?php
            require_once dirname(__DIR__,2).'/private/definations/dbFunctions.php';
            $query = "SELECT `client_name`,`contact_person`,`client_says`,`contact_person_img` FROM `clients` WHERE `client_says` != ''  ORDER BY `client_id` DESC LIMIT 10";
            $pri = [];
            $sec = [];
            $results = runQuery($query, $pri, $sec);
            $class = "active";
            foreach ($results as $result) {
                echo '<div class="' . $class . ' item">
                    <div class="testimonial-item">
                        <div class="icon"><i class="fa fa-quote-right"></i></div>
                        <blockquote>
                            <p>' . $result['client_says'] . '</p>
                        </blockquote>
                        <div class="icon-tr"></div>
                        <div class="testimonial-review">
                            <img src="' . $result['contact_person_img'] . '" alt="testimoni">
                            <h1>' . $result['contact_person'] . ',<small>' . $result['client_name'] . '.</small></h1>
                        </div>
                    </div>
                </div>';
                $class = "";
            }

            ?>
            <div class="item">
                <div class="testimonial-item">
                    <div class="icon"><i class="fa fa-quote-right"></i></div>
                    <blockquote>
                        <p>Donec convallis, metus nec tempus aliquet, nunc metus adipiscing leo, a lobortis nisi dui ut odio. Nullam ultrices, eros accumsan vulputate faucibus, turpis tortor dictum phasellus ac libero. </p>
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
                        <p>Metus aliquet tincidunt metus, sit amet mattis lectus sodales ac. Suspendisse rhoncus dictum eros, ut egestas eros luctus eget. Nam nibh sem, mattis et feugiat ut, porttitor nec risus.</p>
                    </blockquote>
                    <div class="icon-tr"></div>
                    <div class="testimonial-review">
                        <img src="images/testimonials/2.png" alt="testimoni">
                        <h1>Jonathan Dower<small>Leopard</small></h1>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="testimonial-item">
                    <div class="icon"><i class="fa fa-quote-right"></i></div>
                    <blockquote>
                        <p>Donec convallis, metus nec tempus aliquet, nunc metus adipiscing leo, a lobortis nisi dui ut odio. Nullam ultrices, eros accumsan vulputate faucibus, turpis tortor dictum. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commo, magnase quis lacinia ornare, quam ante aliqua nisi, eu iaculis. </p>
                    </blockquote>
                    <div class="icon-tr"></div>
                    <div class="testimonial-review">
                        <img src="images/testimonials/3.png" alt="testimoni">
                        <h1>Jonathan Dower<small>Leopard</small></h1>
                    </div>
                </div>
            </div>

        </div>
        <div class="testimonial-buttons"><a href="#testimonial-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>&#32;
            <a href="#testimonial-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div><!-- TESTIMONIALS END -->