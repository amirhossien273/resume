<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/theme/')}}" class="mobile-logo"><img src="/assets/manage/images/logo.svg" class="img-fluid" alt="لوگو"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <img src="/assets/manage/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="افقی">
                                    <img src="/assets/manage/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="عمودی">
                                </a>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <img src="/assets/manage/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="جمع‌شده">
                                    <img src="/assets/manage/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="بسته">
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Topbar -->
    <div class="topbar">
        <!-- Start row -->
        <div class="row align-items-center">
            <!-- Start col -->
            <div class="col-md-12 align-self-center">
                <div class="togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                   <img src="/assets/manage/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                   <img src="/assets/manage/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="searchbar">
                                <form>
                                    <div class="input-group">
                                      <input type="search" class="form-control" placeholder="جستجو" aria-label="جستجو" aria-describedby="button-addon2">
                                      <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2"><img src="/assets/manage/images/svg-icon/search.svg" class="img-fluid" alt="search"></button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="infobar">
                    <ul class="list-inline mb-0">
                        {{-- <li class="list-inline-item">
                            <div class="settingbar">
                                <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                    <img src="/assets/manage/images/svg-icon/settings.svg" class="img-fluid" alt="settings">
                                </a>
                            </div>
                        </li> --}}
                        {{-- <li class="list-inline-item">
                            <div class="notifybar">
                                <div class="dropdown">
                                    <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/assets/manage/images/svg-icon/notifications.svg" class="img-fluid" alt="notifications">
                                        <span class="live-icon"></span></a>
                                    <div class="dropdown-menu" aria-labelledby="notoficationlink">
                                        <div class="notification-dropdown-title">
                                            <h4>اعلان‌ها</h4>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li class="media dropdown-item">
                                                <span class="ml-3 action-icon badge badge-primary-inverse"><i class="feather icon-dollar-sign"></i></span>
                                                <div class="media-body">
                                                    <h5 class="action-title">دریافت شده: ۱۳۵ دلار</h5>
                                                    <p><span class="timing">امروز، ۱۰:۴۵ صبح</span></p>
                                                </div>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="ml-3 action-icon badge badge-success-inverse"><i class="feather icon-file"></i></span>
                                                <div class="media-body">
                                                    <h5 class="action-title">تصویب نمونه پروژه X</h5>
                                                    <p><span class="timing">دیروز، ۰۱:۴۰ بعد از ظهر</span></p>
                                                </div>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="ml-3 action-icon badge badge-danger-inverse"><i class="feather icon-eye"></i></span>
                                                <div class="media-body">
                                                    <h5 class="action-title">درخواست جان برای مشاهده نقشه سیمی</h5>
                                                    <p><span class="timing">۳ سپتامبر ۲۰۱۹، ۰۵:۲۲ بعد از ظهر</span></p>
                                                </div>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="ml-3 action-icon badge badge-warning-inverse"><i class="feather icon-package"></i></span>
                                                <div class="media-body">
                                                    <h5 class="action-title">کفش‌های ورزشی تمام شده‌اند</h5>
                                                    <p><span class="timing">۱۵ سپتامبر ۲۰۱۹، ۰۲:۵۵ بعد از ظهر</span></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li> --}}
                        {{-- <li class="list-inline-item">
                            <div class="languagebar">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="languagelink">
                                        <a class="dropdown-item" href="#"><i class="flag flag-icon-us flag-icon-squared"></i>انگلیسی</a>
                                        <a class="dropdown-item" href="#"><i class="flag flag-icon-de flag-icon-squared"></i>آلمانی</a>
                                        <a class="dropdown-item" href="#"><i class="flag flag-icon-bl flag-icon-squared"></i>فرانسه</a>
                                        <a class="dropdown-item" href="#"><i class="flag flag-icon-ru flag-icon-squared"></i>روسی</a>
                                    </div>
                                </div>
                            </div>
                        </li> --}}
                        <li class="list-inline-item">
                            <div class="profilebar">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/assets/manage/images/users/profile.svg" class="img-fluid" alt="پروفایل"><span class="feather icon-chevron-down live-icon"></span></a>
                                    <div class="dropdown-menu" aria-labelledby="profilelink">
                                        <div class="dropdown-item">
                                            <div class="profilename">
                                                <h5>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                                            </div>
                                        </div>
                                        <div class="userbox">
                                            <ul class="list-unstyled mb-0">
                                                {{-- <li class="media dropdown-item">
                                                    <a href="#" class="profile-icon"><img src="/assets/manage/images/svg-icon/user.svg" class="img-fluid" alt="کاربر">پروفایل من</a>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <a href="#" class="profile-icon"><img src="/assets/manage/images/svg-icon/email.svg" class="img-fluid" alt="ایمیل">ایمیل</a>
                                                </li> --}}
                                                <li class="media dropdown-item">
                                                    <a href="#" class="profile-icon"><img src="/assets/manage/images/svg-icon/logout.svg" class="img-fluid" alt="خروج">خروج</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Topbar -->
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">@yield('title')</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/theme/')}}">خانه</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary-rgba"><i class="feather icon-plus ml-2"></i>اقدام‌ها</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    @yield('rightbar-content')
    <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">© 1402 تمام حقوق محفوظ است.</p>
        </footer>
    </div>
    <!-- End Footerbar -->
</div>
