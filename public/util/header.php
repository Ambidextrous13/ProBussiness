<header id="header">
    <div id="header-top">
        <div class="container">
            <div class="row">
                <div class="hidden-xs col-lg-7 col-sm-5 top-info">
                    <span><i class="fa fa-phone"></i>Phone: 0*10</span>
                    <span class="hidden-sm"><i class="fa fa-envelope"></i>Email: admin@gmail.com</span>
                </div>
                <div class="col-lg-5">
                    <ul class="dropdown-items clearfix">
                        <li>
                            <div class="site-language">
                                <div class="dropdown">
                                    <a class="language-dropdown" href="#" data-toggle="dropdown">
                                        <img alt="English (US)" src="images/flags/United-States.png">
                                        English (US)
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="#">
                                                <img alt="English (US)" src="images/flags/United-States.png">
                                                English (US)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img alt="English (UK)" src="images/flags/United-Kingdom.png">
                                                English (UK)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img alt="Spanish" src="images/flags/Spain.png">
                                                Spanish
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="my-account">
                                <div class="dropdown">
                                    <a class="account-dropdown" href="#" data-toggle="dropdown">
                                        Hi, <?php
                                        $userName = "Oreo";
                                            echo $userName;
                                        ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="#">My Account</a>
                                                </li>
                                                <li>
                                                    <a href="#">Checkout</a>
                                                </li>
                                                <li>
                                                    <a href="cart.php">Cart</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php">Shop</a>
                                                </li>
                                            </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="shope-cart">
                                <div class="dropdown">
                                    <a class="cart-dropdown" href="#" data-toggle="dropdown">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="cart-items">2</span>
                                    </a>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li class="cart-products">
                                            <ul style="overflow: hidden;" tabindex="5000">
                                                <li>
                                                    <div class="cart-product clearfix">
                                                        <div class="left-data">
                                                            <img alt="" src="images/cart-product.png">
                                                        </div>
                                                        <div class="right-data">
                                                            <strong>
                                                                <a href="#">Flying Ninja </a>
                                                            </strong>
                                                            <p>$45.00 x 1</p>
                                                            <a class="remove-item" href="#">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cart-product clearfix">
                                                        <div class="left-data">
                                                            <img alt="" src="images/cart-product2.png">
                                                        </div>
                                                        <div class="right-data">
                                                            <strong>
                                                                <a href="#">Flying Ninja </a>
                                                            </strong>
                                                            <p>$45.00 x 2</p>
                                                            <a class="remove-item" href="#">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="cart-subtotal">Subtotal: $135.00</li>
                                        <li class="cart-buttons clearfix">
                                            <a class="btn btn-default grey" href="#" role="button">View Cart</a>
                                            <a class="btn btn-default" href="#" role="button">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!--/.header-top -->
    <div id="menu-bar">
           <div class="container">
               <div class="row">
                   <div class="col-md-3 col-sm-3">
                       <div id="logo">
                           <h1><a href="index.php"><img src="images/logo.png"/></a></h1>
                       </div>
                   </div>
                   <!-- Navigation
                   ================================================== -->
                   <div class="col-lg-9 col-sm-9 navbar navbar-default navbar-static-top container" role="navigation">
                       <!--  <div class="container">-->
                       <div class="navbar-header">
                           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                               <span class="sr-only">Toggle navigation</span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                           </button>
                       </div>
                       <div class="navbar-collapse collapse">
                           <ul class="nav navbar-nav">
                               <li <?php if($pageName=="Home"){echo 'class="active"';}?>><a href="index.php"><span class="data-hover" data-hover="home">Home</span></a></li>
   
                               <li <?php if($pageName == "Shop"|| $pageName == "Cart"){echo 'class="active"';}?>><a href="#"><span class="data-hover"data-hover="shop">Shop</span></a>
                                   <ul class="dropdown-menu">
                                       <li><a href="shop.php">Shop</a></li>
                                       <li><a href="cart.php">Cart</a></li>
                                   </ul>
                               </li>
   
                               <li <?php if($pageName == "Blog"|| $pageName == "Blogs"){echo 'class="active"';}?>><a href="blogs.php"><span class="data-hover" data-hover="blog">Blog</span></a></li>
   
                               <li <?php if($pageName == "Contact"){echo 'class="active"';}?>><a href="contact.php"> <span class="data-hover" data-hover="contact">Contact</span></a></li>
   
                               <li <?php if($pageName == "Portfolios"||$pageName == "About"|| $pageName == "FAQ"){echo 'class="active"';}?>><a href="#"><span class="data-hover" data-hover="about">About</span></a>
                                   <ul class="dropdown-menu">
                                       <li><a href="portfolio.php">Portfolio</a></li>
                                       <li><a href="about.php">About Us</a></li>
                                       <li><a href="faq.php">FAQ</a></li>
                                   </ul>
                               </li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    <?php
        if($pageName == "Home")
        {
           echo  '
       <div class="slider_block">
           <div class="flexslider top_slider">
               <ul class="slides">
                   <li class="slide1">
                       <div class="container">
                           <div class="flex_caption1">
   
                               <p class="slide-heading FromTop">Voluptas Assumenda Est </p><br/>
   
                               <p class="sub-line FromBottom">Dolore Magnam Aliquam Quaerat Voluptatem  </p><br/>
   
                               <a href="" class="slider-read FromLeft">Download Now</a>
                           </div>
                           <div class="flex_caption2 FromRight"></div>
                       </div>
                   </li>
   
                   <li class="slide2">
                       <div class="container">
                           <div class="slide flex_caption1">
                               <p class="slide-heading FromTop">ProBusiness is our theme</p><br/>
   
                               <p class="sub-line FromRight">Dolore Magnam Aliquam Quaerat Voluptatem </p><br/>
   
                               <a href="" class="slider-read FromLeft">Download Now</a>
   
                           </div>
                           <div class="flex_caption2 FromBottom"></div>
                       </div>
                   </li>
                   <li class="slide3">
                       <div class="container">
                           <div class="slide flex_caption1">
                               <p class="slide-heading FromTop">Easy to Maintain </p><br/>
   
                               <p class="sub-line FromRight">Powerful Features & Responsive Designs </p><br/>
   
                               <a href="" class="slider-read FromLeft">Download Now</a>
   
                           </div>
                           <div class="flex_caption2 FromRight"></div>
                       </div>
                   </li>
               </ul>
           </div>
       </div>
       ';
        }
        else {
            echo '<section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>'.$pageName.'</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>';
        }
    ?>
    
</header>  

