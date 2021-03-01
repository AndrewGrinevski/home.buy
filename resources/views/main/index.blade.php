@extends('layouts.main')
@section('content')


        <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
            <div class="ps-container">
                <div class="ps-section__header mb-50">
                    <h3 class="ps-section__title" data-mask="features">- Features Products</h3>
                    <ul class="ps-masonry__filter">
                        <li class="current"><a href="#" data-filter="*">All <sup>8</sup></a></li>
                        <li><a href="#" data-filter=".nike">Nike <sup>1</sup></a></li>
                        <li><a href="#" data-filter=".adidas">Adidas <sup>1</sup></a></li>
                        <li><a href="#" data-filter=".men">Men <sup>1</sup></a></li>
                        <li><a href="#" data-filter=".women">Women <sup>1</sup></a></li>
                        <li><a href="#" data-filter=".kids">Kids <sup>4</sup></a></li>
                    </ul>
                </div>
                <div class="ps-section__content pb-50">
                    <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                        <div class="ps-masonry">
                            <div class="grid-sizer"></div>
                            <div class="grid-item kids">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__thumbnail">
                                            <div class="ps-badge"><span>New</span></div>
                                            <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{ asset('main/images/shoe/1.jpg') }}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal"><img src="{{ asset('main/images/shoe/2.jpg') }}" alt=""><img src="{{ asset('main/images/shoe/3.jpg') }}" alt=""><img src="{{ asset('main/images/shoe/4.jpg') }}" alt=""><img src="{{ asset('main/images/shoe/5.jpg') }}" alt=""></div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                                <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                            <del>£220</del> £ 120</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item nike">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/2.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                                <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item adidas">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/3.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                                <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item kids">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__thumbnail">
                                            <div class="ps-badge ps-badge--sale"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/4.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                                <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                            <del>£220</del> £ 120</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item men">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/5.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                                <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item women">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/6.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                                <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item kids">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/7.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                                <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item kids">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/8.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">Air Jordan 7 Retro</a>
                                                <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ps-section ps-home-blog pt-80 pb-80">
            <div class="ps-container">
                <div class="ps-section__header mb-50">
                    <h2 class="ps-section__title" data-mask="News">- Our Story</h2>
                    <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="#">View all post<i class="fa fa-long-arrow-right"></i></a></div>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="images/blog/1.jpg" alt=""></div>
                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">An Inside Look at the Breaking2 Kit</a>
                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.html">Read more<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="images/blog/2.jpg" alt=""></div>
                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Unpacking the Breaking2 Race Strategy</a>
                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.html">Read more<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="images/blog/3.jpg" alt=""></div>
                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Nike’s Latest Football Cleat Breaks the Mold</a>
                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.html">Read more<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-subscribe">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                        <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                        <form class="ps-subscribe__form" action="do_action" method="post">
                            <input class="form-control" type="text" placeholder="">
                            <button>Sign up now</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                        <p>...and receive  <span>$20</span>  coupon for first shopping.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer bg--cover" data-background="images/background/parallax.jpg">
            <div class="ps-footer__content">
                <div class="ps-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--info">
                                <header><a class="ps-logo" href="index.html"><img src="{{ asset('main/images/logo-white.png') }}" alt=""></a>
                                    <h3 class="ps-widget__title">Address Office 1</h3>
                                </header>
                                <footer>
                                    <p><strong>460 West 34th Street, 15th floor, New York</strong></p>
                                    <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                    <p>Phone: +323 32434 5334</p>
                                    <p>Fax: ++323 32434 5333</p>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--info second">
                                <header>
                                    <h3 class="ps-widget__title">Address Office 2</h3>
                                </header>
                                <footer>
                                    <p><strong>PO Box 16122 Collins  Victoria 3000 Australia</strong></p>
                                    <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                    <p>Phone: +323 32434 5334</p>
                                    <p>Fax: ++323 32434 5333</p>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Find Our store</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--link">
                                        <li><a href="#">Coupon Code</a></li>
                                        <li><a href="#">SignUp For Email</a></li>
                                        <li><a href="#">Site Feedback</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Get Help</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--line">
                                        <li><a href="#">Order Status</a></li>
                                        <li><a href="#">Shipping and Delivery</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Payment Options</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Products</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--line">
                                        <li><a href="#">Shoes</a></li>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Accessries</a></li>
                                        <li><a href="#">Football Boots</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
