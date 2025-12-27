<header class="header axil-header header-style-5">
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="header-top-dropdown">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                فارسی
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">عربی</a></li>
                                <li><a class="dropdown-item" href="#">Spanish</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                ريال
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">دلار</a></li>
                                <li><a class="dropdown-item" href="#">دینار</a></li>
                                <li><a class="dropdown-item" href="#">پوند</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="header-top-link">
                        <ul class="quick-link">
                            <li><a href="#">پشتیبانی</a></li>
                            <li><a href="{{ route('front.auth.register') }}">ثبت نام</a></li>
                            <li><a href="{{ route('front.auth.login') }}">ورود</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="{{ route('front.home')}}" class="logo logo-dark">
                        <img src="/assets/front/images/logo/logo.png" alt="Site Logo">
                    </a>
                    <a href="{{ route('front.home')}}" class="logo logo-light">
                        <img src="/assets/front/images/logo/logo-light.png" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="{{ route('front.home')}}" class="logo">
                                <img src="/assets/front/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li>
                                <a href="{{ route('front.home') }}">خانه</a>

                            </li>
                            <li><a href="{{ route('front.about') }}">درباه ما</a></li>
                            {{--                                <li class="menu-item-has-children">--}}
                            {{--                                    <a href="#">وبلاگ</a>--}}
                            {{--                                    <ul class="axil-submenu">--}}
                            {{--                                        <li><a href="blog.html">وبلاگ - لیست</a></li>--}}
                            {{--                                        <li><a href="blog-grid.html">وبلاگ - شبکه ای</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">جزئیات وبلاگ - استاندارد</a></li>--}}
                            {{--                                        <li><a href="blog-gallery.html">جزئیات وبلاگ - گالری</a></li>--}}
                            {{--                                        <li><a href="blog-video.html">جزئیات وبلاگ - ویدیو</a></li>--}}
                            {{--                                        <li><a href="blog-audio.html">جزئیات وبلاگ - صدا</a></li>--}}
                            {{--                                        <li><a href="blog-quote.html">جزئیات وبلاگ - نقل قول</a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </li>--}}
                            <li><a href="{{ route('front.contact') }}">ارتباط با ما</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-xl-block d-none">
                            <input type="search" class="placeholder product-search-input" name="search2"
                                   id="search2" value="" maxlength="128" placeholder="دنبال چه هستید؟؟"
                                   autocomplete="off">
                            <button type="submit" class="icon wooc-btn-search">
                                <i class="flaticon-magnifying-glass"></i>
                            </button>
                        </li>
                        <li class="axil-search d-xl-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="wishlist">
{{--                            <a href="wishlist.html">--}}
{{--                                <i class="flaticon-heart"></i>--}}
{{--                            </a>--}}
                        </li>
                        <li class="shopping-cart">
                            <a href="#" class="cart-dropdown-btn">
                                <span class="cart-count">3</span>
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <span class="title">دسترسی سریع</span>
                                <ul>
                                    <li>
                                        <a href="{{ route('front.user.profile') }}">پروفایل من</a>
                                    </li>
                                    <li>
                                        <a href="#">شرایط مرجوعی</a>
                                    </li>
                                    <li>
                                        <a href="#">پشتیبانی</a>
                                    </li>
                                    <li>
                                        <a href="#">زبان</a>
                                    </li>
                                </ul>
                                <div class="login-btn">
                                    <a href="{{ route('front.auth.login') }}" class="axil-btn btn-bg-primary">ورود</a>
                                </div>
                                <div class="reg-footer text-center">ثبت نام نکرده اید؟ <a href="{{ route('front.auth.register') }}"
                                                                                          class="btn-link">ثبت نام.</a></div>
                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
    <div class="header-top-campaign">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p>10% تخفیف به مناسبت فصل جدید <a href="#">ثبت سفارش</a></p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p>10% تخفیف به مناسبت فصل جدید <a href="#">ثبت سفارش</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
