<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/theme/')}}" class="logo logo-large"><img src="/assets/manage/images/logo.svg" class="img-fluid" alt="logo"></a>
            <a href="{{url('/theme/')}}" class="logo logo-small"><img src="/assets/manage/images/small_logo.svg" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('manage.page.dashboard') }}">
                        <img src="/assets/manage/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>داشبورد</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/basic.svg" class="img-fluid" alt="basic"><span>کاربران</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.users.index')}}">لیست کاربران</a></li>
                        <li><a href="{{route('manage.users.create')}}">ثبت کاربر</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/tables.svg" class="img-fluid" alt="tables"><span>استان ها</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.provinces.index')}}">لیست استان ها</a></li>
                        <li><a href="{{route('manage.provinces.create')}}">ثبت استان </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/tables.svg" class="img-fluid" alt="tables"><span>شهر ها</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.cities.index')}}">لیست شهر ها</a></li>
                        <li><a href="{{route('manage.cities.create')}}">ثبت شهر </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/advanced.svg" class="img-fluid" alt="advanced"><span>دسته بندی ها</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.categories.index')}}">لیست دسته بندی ها</a></li>
                        <li><a href="{{route('manage.categories.create')}}">ثبت دسته بندی</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/apps.svg" class="img-fluid" alt="apps"><span>حالات</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.attributes.index')}}">لیست حالات</a></li>
                        <li><a href="{{route('manage.attributes.create')}}">ثبت حالت</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/form_elements.svg" class="img-fluid" alt="form_elements"><span>گزینه حالات</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.attribute_options.index')}}">لیست گزینه حالات</a></li>
                        <li><a href="{{route('manage.attribute_options.create')}}">ثبت گزینه حالت</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/chart.svg" class="img-fluid" alt="chart"><span>ویژگی</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.variations.index')}}">لیست ویژگی ها</a></li>
                        <li><a href="{{route('manage.variations.create')}}">ثبت ویژگی </a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/icons.svg" class="img-fluid" alt="icons"><span>گزینه تغییر</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.variation_options.index')}}">لیست گزینه تغییر ها</a></li>
                        <li><a href="{{route('manage.variation_options.create')}}">ثبت گزینه تغییر </a></li>
                    </ul>
                </li> --}}


                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/tables.svg" class="img-fluid" alt="tables"><span>برچسب</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.tags.index')}}">لیست برچسب ها</a></li>
                        <li><a href="{{route('manage.tags.create')}}">ثبت برچسب </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/maps.svg" class="img-fluid" alt="maps"><span>محصولات</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.products.index')}}">لیست محصولات</a></li>
                        <li><a href="{{route('manage.products.create')}}">ثبت محصول</a></li>
                        <li><a href="{{route('manage.products.excel-page')}}">اکسل تغییر قیمت</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/chart.svg" class="img-fluid" alt="chart"><span>سفارشات</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.orders.index', ['status' => 'INITIALIZED'])}}">سفارشات ثبت شده</a></li>
                        <li><a href="{{route('manage.orders.index', ['status' => 'READY_TO_SHIP'])}}">آماده سازی سفارشات</a></li>
                        <li><a href="{{route('manage.orders.index', ['status' => 'SHIPPED'])}}">سفارشات ارسال شده</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('manage.contracts')}}">
                        <img src="/assets/manage/images/svg-icon/maps.svg" class="img-fluid" alt="maps"><span>تماس باما</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('manage.privacy-policy')}}">
                        <img src="/assets/manage/images/svg-icon/maps.svg" class="img-fluid" alt="maps"><span>قوانین و مقررات</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('manage.vouchers')}}">
                        <img src="/assets/manage/images/svg-icon/maps.svg" class="img-fluid" alt="maps"><span>کد تخفیف</span>
                    </a>
                </li>

                <li>
                    <a href="javaScript:void();">
                        <img src="/assets/manage/images/svg-icon/maps.svg" class="img-fluid" alt="maps"><span>تنظیمات</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('manage.settings')}}">تنظیمات سایت</a></li>
                        <li><a href="{{route('manage.sliders.index')}}">بنر</a></li>
                        <li><a href="{{route('manage.banners.index')}}">بنر تبلیغات</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
