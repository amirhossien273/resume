@section('title')
    ابزارک‌ها
@endsection
@extends('manage.layout.app')
@section('style')
    <!-- apex css -->
    <link href="{{ asset('/assets/manage/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Slick css -->
    <link href="{{ asset('/assets/manage/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/manage/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i
                        class="feather icon-folder"></i></span>
                            <div class="media-body">
                                <p class="mb-0">پروژه‌ها</p>
                                <h5 class="mb-0">۸۵</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i
                        class="feather icon-clipboard"></i></span>
                            <div class="media-body">
                                <p class="mb-0">وظایف</p>
                                <h5 class="mb-0">۲۵۹</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i
                                    class="feather icon-users"></i></span>
                            <div class="media-body">
                                <p class="mb-0">Teams</p>
                                <h5 class="mb-0">57</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">مشکلات</h5>
                    </div>
                    <div class="card-body">
                        <div id="apex-pie-chart"></div>
                        <div class="row">
                            <div class="col-6 text-left">
                                <p class="mb-1">باز<i class="mdi mdi-circle text-primary mr-2"></i></p>
                                <h5 class="mb-0">۱۰۵</h5>
                            </div>
                            <div class="col-6">
                                <p class="mb-1"><i class="mdi mdi-circle text-light mr-2"></i>بسته</p>
                                <h5 class="mb-0">۴۵</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="row">
                            <div class="col-6 border-right">
                                <p class="my-2"><span class="font-18 f-w-6 text-primary">۷۵٪</span></p>
                            </div>
                            <div class="col-6">
                                <p class="my-2">مشاهده همه</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">پیشرفت</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-4">پروژه تخصصی</h5>
                        <p>پروتوتایپ سازی <span class="float-left">۷۵٪</span></p>
                        <div class="progress mb-4" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p>طراحی <span class="float-left">۳۰٪</span></p>
                        <div class="progress mb-4" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 30%;"
                                 aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p>توسعه <span class="float-left">۵۰٪</span></p>
                        <div class="progress mb-1" style="height: 4px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="mr-0">تیم‌ها : </span>
                        <div class="avatar-group">
                            <div class="avatar">
                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                   data-original-title="آمی آدامز">
                                    <img src="/assets/manage/images/users/men.svg" alt="avatar" class="rounded-circle">
                                </a>
                            </div>
                            <div class="avatar">
                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                   data-original-title="آمی آدامز">
                                    <img src="/assets/manage/images/users/women.svg" alt="avatar"
                                         class="rounded-circle">
                                </a>
                            </div>
                        </div>
                        <span class="float-left mt-2"><i class="feather icon-paperclip ml-1"></i>۵</span>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body text-center">
                        <div class="user-slider">
                            <div class="user-slider-item">
                                <img src="/assets/manage/images/users/boy.svg" alt="avatar" width="100"
                                     class="rounded-circle mt-3 mb-4">
                                <h5>جیمز اسمیت</h5>
                                <p>مدیر فروش ارشد</p>
                                <p>خیابان 55، مسیر خیابان North، ایالت کارولینا، شهر نیویورک، ایالات متحده آمریکا</p>
                            </div>
                            <div class="user-slider-item">
                                <img src="/assets/manage/images/users/boy.svg" alt="avatar" width="100"
                                     class="rounded-circle mt-3 mb-4">
                                <h5>جیمز اسمیت</h5>
                                <p>مدیر فروش ارشد</p>
                                <p>خیابان 55، مسیر خیابان North، ایالت کارولینا، شهر نیویورک، ایالات متحده آمریکا</p>
                            </div>
                            <div class="user-slider-item">
                                <img src="/assets/manage/images/users/boy.svg" alt="avatar" width="100"
                                     class="rounded-circle mt-3 mb-4">
                                <h5>جیمز اسمیت</h5>
                                <p>مدیر فروش ارشد</p>
                                <p>خیابان 55، مسیر خیابان North، ایالت کارولینا، شهر نیویورک، ایالات متحده آمریکا</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="row">
                            <div class="col-6 border-right">
                                <p class="my-2">دنبال کردن</p>
                            </div>
                            <div class="col-6">
                                <p class="my-2">پیام</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">فضای ذخیره‌سازی</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link l-h-20 p-0 font-18 float-left" type="button"
                                            id="CustomdropdownMenuButton8" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu dropdown-menu-left"
                                         aria-labelledby="CustomdropdownMenuButton8">
                                        <a class="dropdown-item font-13" href="#">بارگذاری مجدد</a>
                                        <a class="dropdown-item font-13" href="#">خروجی‌گیری</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-xl-7">
                                <p><i class="feather icon-arrow-up text-primary ml-1"></i>مورد استفاده: <strong>۱۷.۲ گیگابایت</strong>
                                </p>
                                <p><i class="feather icon-arrow-down ml-1"></i>آزاد: <strong>۷.۸ گیگابایت</strong></p>
                            </div>
                            <div class="col-lg-6 col-xl-5 text-center">
                                <img src="/assets/manage/images/ecommerce/storage.png" class="img-fluid" alt="storage">
                                <p class="storage-num">۲۵ گیگابایت</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">پرفروش‌ترین محصول</h5>
                    </div>
                    <div class="card-body">
                        <div class="best-product-slider">
                            <div class="best-product-slider-item">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="/assets/manage/images/ecommerce/produc_slider_01.png"
                                             class="img-fluid" alt="product">
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="font-12 text-uppercase">نایک</span>
                                        <h5 class="mt-2 mb-4 font-16">کفش‌های ورزشی</h5>
                                        <ul class="list-inline mb-0 pr-0">
                                            <li class="list-inline-item pl-3 border-right">
                                                <h4 class="mb-0">۲۰۵</h4>
                                                <p class="mb-0">فروخته شده</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h4 class="mb-0">۵۲</h4>
                                                <p class="mb-0">موجود در انبار</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="best-product-slider-item">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="/assets/manage/images/ecommerce/produc_slider_02.png"
                                             class="img-fluid" alt="product">
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="font-12 text-uppercase">نایک</span>
                                        <h5 class="mt-2 mb-4 font-16">کفش‌های ورزشی</h5>
                                        <ul class="list-inline mb-0 pr-0">
                                            <li class="list-inline-item pl-3 border-right">
                                                <h4 class="mb-0">۲۰۵</h4>
                                                <p class="mb-0">واحد‌های فروخته شده</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h4 class="mb-0">۵۲</h4>
                                                <p class="mb-0">موجود در انبار</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="best-product-slider-item">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="/assets/manage/images/ecommerce/produc_slider_03.png"
                                             class="img-fluid" alt="product">
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="font-12 text-uppercase">نایک</span>
                                        <h5 class="mt-2 mb-4 font-16">کفش‌های ورزشی</h5>
                                        <ul class="list-inline mb-0 pr-0">
                                            <li class="list-inline-item pl-3 border-right">
                                                <h4 class="mb-0">۲۰۵</h4>
                                                <p class="mb-0">واحد‌های فروخته شده</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h4 class="mb-0">۵۲</h4>
                                                <p class="mb-0">موجود در انبار</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h5 class="card-title mb-0">میانگین درآمد</h5>
                            </div>
                            <div class="col-7 text-left">
                                <h4 class="mb-0">$2075 <span class="badge badge-secondary-inverse font-14 v-a-m">+23</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4">
                <div class="card text-center m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">سفارش‌ها</h5>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <p class="dash-analytic-icon"><i class="feather icon-shopping-bag success-rgba text-success"></i></p>
                        <h4 class="mb-3">۷۹</h4>
                        <p>۶۰٪ هدف</p>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4">
                <div class="card text-center m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">کاربران</h5>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <p class="dash-analytic-icon"><i class="feather icon-users primary-rgba text-primary"></i></p>
                        <h4 class="mb-3">۱۲۵</h4>
                        <p>۸۰٪ هدف</p>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/bitcoin.png"
                                 alt="تصویر نماینده‌ای عمومی">
                            <div class="media-body">
                                <h5 class="mb-2">بیت‌کوین</h5>
                                <p class="mb-0">1 BTC = 49 دلار آمریکا</p>
                            </div>
                            <img class="action-bg rounded-circle" src="/assets/manage/images/crypto/1.png"
                                 alt="تصویر نماینده‌ای عمومی">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/ethereum.png"
                                 alt="تصویر نماینده‌ای عمومی">
                            <div class="media-body">
                                <h5 class="mb-2">اتریوم</h5>
                                <p class="mb-0">1 ETC = 5.69 دلار آمریکا</p>
                            </div>
                            <img class="action-bg rounded-circle" src="/assets/manage/images/crypto/2.png"
                                 alt="تصویر نماینده‌ای عمومی">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/ripple.png"
                                 alt="تصویر نماینده‌ای عمومی">
                            <div class="media-body">
                                <h5 class="mb-2">ریپل</h5>
                                <p class="mb-0">1 RPC = 0.96 دلار آمریکا</p>
                            </div>
                            <img class="action-bg rounded-circle" src="/assets/manage/images/crypto/3.png"
                                 alt="تصویر نماینده‌ای عمومی">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/bcc.png"
                                 alt="تصویر نماینده‌ای عمومی">
                            <div class="media-body">
                                <h5 class="mb-2">بیت‌کوین کش</h5>
                                <p class="mb-0">1 BCC = 58.85 دلار آمریکا</p>
                            </div>
                            <img class="action-bg rounded-circle" src="/assets/manage/images/crypto/4.png"
                                 alt="تصویر نماینده‌ای عمومی">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                    <span class="action-icon badge badge-primary-inverse mr-0"><i
                            class="feather icon-user"></i></span>
                            </div>
                            <div class="col-7 text-left">
                                <h5 class="card-title font-14">دانش‌آموزان</h5>
                                <h4 class="mb-0">۲۵۸۵</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13">به‌روزرسانی شده امروز</span>
                            </div>
                            <div class="col-4 text-left">
                                <span class="badge badge-success"><i class="feather icon-trending-up ml-1"></i>۲۵٪</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                    <span class="action-icon badge badge-success-inverse mr-0"><i
                            class="feather icon-award"></i></span>
                            </div>
                            <div class="col-7 text-left">
                                <h5 class="card-title font-14">معلمان</h5>
                                <h4 class="mb-0">۲۶۳</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13">۱ روز پیش به‌روزرسانی شده</span>
                            </div>
                            <div class="col-4 text-left">
                    <span class="badge badge-warning"><i
                            class="feather icon-trending-down ml-1"></i>۲۳٪</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                    <span class="action-icon badge badge-warning-inverse mr-0"><i
                            class="feather icon-briefcase"></i></span>
                            </div>
                            <div class="col-7 text-left">
                                <h5 class="card-title font-14">کارکنان</h5>
                                <h4 class="mb-0">۴۵</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13">۳ روز پیش به‌روزرسانی شده</span>
                            </div>
                            <div class="col-4 text-left">
                    <span class="badge badge-success"><i
                            class="feather icon-trending-up ml-1"></i>۱۵٪</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                    <span class="action-icon badge badge-secondary-inverse mr-0"><i
                            class="feather icon-book-open"></i></span>
                            </div>
                            <div class="col-7 text-left">
                                <h5 class="card-title font-14">دوره‌ها</h5>
                                <h4 class="mb-0">۹۳</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13">۵ روز پیش به‌روزرسانی شده</span>
                            </div>
                            <div class="col-4 text-left">
                    <span class="badge badge-warning"><i
                            class="feather icon-trending-down ml-1"></i>۱۰٪</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-30 quote-bg">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <span><i class="mdi mdi-format-quote-open text-black font-20"></i></span>
                            </div>
                            <div class="col-10">
                                <h5 class="card-title mb-0 text-left">نقل قول روز</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <img src="/assets/manage/images/general/school_quote.svg" class="img-fluid my-3" width="150"
                             alt="نقل قول مدرسه">
                        <h5 class="text-primary font-italic my-3">تغییری باش، که می‌خواهی<br/> در دنیا ببینی.</h5>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">دوره‌ها</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="course-slider">
                            <div class="course-slider-item">
                                <h4 class="my-0">ریاضیات</h4>
                                <div class="row align-items-center my-4 py-3">
                                    <div class="col-4 p-0">
                                        <h4>24</h4>
                                        <p class="mb-0">استاد</p>
                                    </div>
                                    <div class="col-4 py-3 px-0 bg-primary-rgba rounded">
                                        <h4 class="text-primary">543</h4>
                                        <p class="text-primary mb-0">دانش‌آموزان</p>
                                    </div>
                                    <div class="col-4 p-0">
                                        <h4>09</h4>
                                        <p class="mb-0">کلاس</p>
                                    </div>
                                </div>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-6 text-right">
                                        <span class="font-13">80% تکمیل شده</span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="font-13">19/25 ماژول</span>
                                    </div>
                                </div>
                            </div>
                            <!-- دیگر موارد دوره‌ها را اضافه کنید -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">نظرات والدین</h5>
                    </div>
                    <div class="card-body">
                        <div class="parents-slider">
                            <div class="parents-slider-item">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-4">
                                        <img src="/assets/manage/images/general/parent_01.png" class="img-fluid"
                                             alt="والد">
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="mb-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                            از طراحان گرافیک است.</p>
                                        <h5 class="card-title mb-1">خانم جسیکا متیو</h5>
                                        <p class="mb-0 font-14 font-italic">مادر لری متیو، کلاس 6</p>
                                    </div>
                                </div>
                            </div>
                            <div class="parents-slider-item">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-4">
                                        <img src="/assets/manage/images/general/parent_02.png" class="img-fluid"
                                             alt="والد">
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="mb-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                            از طراحان گرافیک است.</p>
                                        <h5 class="card-title mb-1">خانم جان دو</h5>
                                        <p class="mb-0 font-14 font-italic">پدر میلا دو، کلاس 5</p>
                                    </div>
                                </div>
                            </div>
                            <div class="parents-slider-item">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-4">
                                        <img src="/assets/manage/images/general/parent_03.png" class="img-fluid"
                                             alt="والد">
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="mb-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                            از طراحان گرافیک است.</p>
                                        <h5 class="card-title mb-1">خانم ماریا اندرو</h5>
                                        <p class="mb-0 font-14 font-italic">مادر ویل اندرو، کلاس 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">نوبت‌ها</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetAppointment" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="widgetAppointment">
                                        <a class="dropdown-item font-13" href="#">بارگذاری مجدد</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body appointment-widget">
                        <h3>235</h3>
                        <p>مجموع این هفته</p>
                        <ul class="list-unstyled py-3 pr-0">
                            <li><i class="mdi mdi-circle text-primary mr-2"></i> وب‌سایت</li>
                            <li><i class="mdi mdi-circle text-success mr-2"></i> تماس تلفنی</li>
                            <li><i class="mdi mdi-circle text-light mr-2"></i> اپلیکیشن</li>
                        </ul>
                        <div class="row align-items-end">
                            <div class="col-6">
                                <button type="button" class="btn btn-primary">خروجی گزارش <i
                                        class="feather icon-file mr-2"></i></button>
                            </div>
                            <div class="col-6">
                                <p class="bg-icon"><i class="feather icon-calendar"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h5 class="card-title mb-0">فعالیت‌های اخیر</h5>
                            </div>
                            <div class="col-5">
                                <button class="btn btn-secondary-rgba float-left font-13">مشاهده همه</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="activities-history">
                            <div class="activities-history-list">
                                <div class="activities-history-item">
                                    <h6>پروژه X را تکمیل کردم.</h6>
                                    <p class="mb-0">همین الآن</p>
                                </div>
                            </div>
                            <div class="activities-history-list">
                                <div class="activities-history-item">
                                    <h6>تأییدیه از مدیر بازاریابی دریافت شد.</h6>
                                    <p class="mb-0">11:00 صبح - 3 اکتبر، 2019</p>
                                </div>
                            </div>
                            <div class="activities-history-list">
                                <div class="activities-history-item">
                                    <h6>زوئی راهنمای شروع سریع را برای فرآیند توسعه به‌روز کرد.</h6>
                                    <p class="mb-0">09:25 شب - 27 سپتامبر، 2019</p>
                                </div>
                            </div>
                            <div class="activities-history-list">
                                <div class="activities-history-item">
                                    <h6>نوبیتا درخواست مرخصی در روزهای عید پاک داده است.</h6>
                                    <p class="mb-0">06:45 شب - 15 مارس، 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">لیست کارها</h5>
                    </div>
                    <div class="card-body">
                        <div class="to-do-list">
                            <ul id="list-group" class="list-group list-group-flush p-0"></ul>
                            <form class="add-items">
                                <div class="input-group mt-3">
                                    <input type="text" class="form-control" id="todo-list-item"
                                           placeholder="چه کاری باید انجام دهید؟"
                                           aria-label="چه کاری باید انجام دهید؟"
                                           aria-describedby="button-addon-to-do-list">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary add" id="button-addon-to-do-list" type="submit">
                                            اضافه به لیست
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- To Do List js -->
    <script src="{{ asset('/assets/manage/js/custom/custom-to-do-list.js') }}"></script>
    <!-- Apex js -->
    <script src="{{ asset('/assets/manage/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('/assets/manage/plugins/slick/slick.min.js') }}"></script>
    <!-- Chart js -->
    <script src="{{ asset('/assets/manage/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/chart.js/chart-bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-widgets.js') }}"></script>
@endsection
