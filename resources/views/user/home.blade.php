
<!DOCTYPE html>
<html lang="zxx" class="no-js">
@include('user.partials._head')
<body>
    <div id="app">
        <!-- Start Header Area -->
        <header class="default-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <img src="/user/img/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav scrollable-menu">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#news">News</a></li>
                            <li><a href="#travel">Travel</a></li>
                            <li><a href="#fashion">fashion</a></li>
                            <li><a href="#team">team</a></li>
                            <!-- Dropdown -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Pages
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="single.html">Single</a>
                                    <a class="dropdown-item" href="category.html">Category</a>
                                    <a class="dropdown-item" href="search.html">Search</a>
                                    <a class="dropdown-item" href="archive.html">Archive</a>
                                    <a class="dropdown-item" href="generic.html">Generic</a>
                                    <a class="dropdown-item" href="elements.html">Elements</a>
                                </div>
                            </li>                               
                        </ul>
                    </div>
                </div>

            </nav>
        </header>
        <!-- End Header Area -->

        


        <!-- Start post Area -->
        <public-master></public-master>

        <!-- Start post Area -->

        <!-- start footer Area -->      
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-12">
                        <div class="single-footer-widget">
                            <h6>Top Products</h6>
                            <ul class="footer-nav">
                                <li><a href="#">Managed Website</a></li>
                                <li><a href="#">Manage Reputation</a></li>
                                <li><a href="#">Power Tools</a></li>
                                <li><a href="#">Marketing Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-12">
                        <div class="single-footer-widget newsletter">
                            <h6>Newsletter</h6>
                            <p>You can trust us. we only send promo offers, not a single spam.</p>
                            <div id="mc_embed_signup">
                                <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

                                    <div class="form-group row" style="width: 100%">
                                        <div class="col-lg-8 col-md-12">
                                            <input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                            <div style="position: absolute; left: -5000px;">
                                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                            </div>
                                        </div> 

                                        <div class="col-lg-4 col-md-12">
                                            <button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
                                        </div> 
                                    </div>      
                                    <div class="info"></div>
                                </form>
                            </div>      
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-12">
                        <div class="single-footer-widget mail-chimp">
                            <h6 class="mb-20">Instragram Feed</h6>
                            <ul class="instafeed d-flex flex-wrap">
                                <li><img src="/user/img/i1.jpg" alt=""></li>
                                <li><img src="/user/img/i2.jpg" alt=""></li>
                                <li><img src="/user/img/i3.jpg" alt=""></li>
                                <li><img src="/user/img/i4.jpg" alt=""></li>
                                <li><img src="/user/img/i5.jpg" alt=""></li>
                                <li><img src="/user/img/i6.jpg" alt=""></li>
                                <li><img src="/user/img/i7.jpg" alt=""></li>
                                <li><img src="/user/img/i8.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>                      
                </div>

                <div class="row footer-bottom d-flex justify-content-between">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p class="col-lg-8 col-sm-12 footer-text">Copyright &copy; All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->
    </div>
    
    @include('user.partials._script')
</body>
</html>