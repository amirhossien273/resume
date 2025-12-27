@section('title')
    CRM
@endsection

@extends('manage.layout.app')

@section('style')
    <!-- Apex css -->
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
            <div class="col-lg-12 col-xl-6">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h5 class="card-title mb-0">آمار درآمد</h5>
                                    </div>
                                    <div class="col-3">
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0 font-18 float-left" type="button"
                                                    id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"><i class="feather icon-more-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="widgetRevenue">
                                                <a class="dropdown-item font-13" href="#">بارگذاری مجدد</a>
                                                <a class="dropdown-item font-13" href="#">خروجی</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-0">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <div class="revenue-box border-bottom mb-2">
                                            <h4>+ ۴۵۹۸</h4>
                                            <p>میزان درآمد ورودی</p>
                                        </div>
                                        <div class="revenue-box">
                                            <h4>- ۲۹۶</h4>
                                            <p>میزان درآمد خروجی</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div id="apex-line-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center ml-3 action-icon badge badge-secondary-inverse"><i
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
                    <div class="col-lg-6 col-xl-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="media">
                                    <span class="align-self-center ml-3 action-icon badge badge-secondary-inverse"><i
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
                </div>
                <!-- End row -->
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-b-30 dash-widget">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h5 class="card-title mb-0">نمایه</h5>
                            </div>
                            <div class="col-7">
                                <ul class="nav nav-pills float-left" id="pills-index-tab-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-sales-tab-justified" data-toggle="pill"
                                           href="#pills-sales-justified" role="tab" aria-selected="true">فروش</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-clients-tab-justified" data-toggle="pill"
                                           href="#pills-clients-justified" role="tab" aria-selected="false">مشتریان</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 pl-0 pr-2">
                        <div id="apex-bar-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-9">
                <!-- Start row -->
                <div class="row">
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
                                        <p class="mb-1"><i class="mdi mdi-circle text-light ml-2"></i>بسته</p>
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
                                <h5 class="mb-4">پروژه تانک اندیشه</h5>
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
                                <span class="ml-0">تیم‌ها: </span>
                                <div class="avatar-group">
                                    <div class="avatar">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="Amy Adams">
                                            <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                                 class="rounded-circle">
                                        </a>
                                    </div>
                                    <div class="avatar">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="Amy Adams">
                                            <img src="/assets/manage/images/users/women.svg" alt="avatar"
                                                 class="rounded-circle">
                                        </a>
                                    </div>
                                </div>
                                <span class="float-left mt-2"><i class="feather icon-paperclip mr-1"></i>۵</span>
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
                                        <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                             class="rounded-circle mt-3 mb-4">
                                        <h5>جیمز اسمیت</h5>
                                        <p>کارشناس فروش ارشد</p>
                                        <p>خیابان 55، خیابان North Street، ایالت کارولینا، شهر نیویورک، ایالات متحده
                                            آمریکا</p>
                                    </div>
                                    <div class="user-slider-item">
                                        <img src="/assets/manage/images/users/women.svg" alt="avatar"
                                             class="rounded-circle mt-3 mb-4">
                                        <h5>جیمز اسمیت</h5>
                                        <p>کارشناس فروش ارشد</p>
                                        <p>خیابان 55، خیابان North Street، ایالت کارولینا، شهر نیویورک، ایالات متحده
                                            آمریکا</p>
                                    </div>
                                    <div class="user-slider-item">
                                        <img src="/assets/manage/images/users/girl.svg" alt="avatar"
                                             class="rounded-circle mt-3 mb-4">
                                        <h5>جیمز اسمیت</h5>
                                        <p>کارشناس فروش ارشد</p>
                                        <p>خیابان 55، خیابان North Street، ایالت کارولینا، شهر نیویورک، ایالات متحده
                                            آمریکا</p>
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
                    <div class="col-lg-6 col-xl-6">
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
                                            <h6>پروژه X پروتوتایپ تکمیل شد.</h6>
                                            <p class="mb-0">همین الآن</p>
                                        </div>
                                    </div>
                                    <div class="activities-history-list">
                                        <div class="activities-history-item">
                                            <h6>تأییدیه از مدیر بازاریابی دریافت شد.</h6>
                                            <p class="mb-0">ساعت 11:00 صبح - 3 اکتبر، 2019</p>
                                        </div>
                                    </div>
                                    <div class="activities-history-list">
                                        <div class="activities-history-item">
                                            <h6>زوئی راهنمای شروع سریع را برای فرآیند توسعه به‌روز کرد.</h6>
                                            <p class="mb-0">ساعت 9:25 شب - 27 سپتامبر، 2019</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-6">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h5 class="card-title mb-0">عملکرد برتر</h5>
                                    </div>
                                    <div class="col-3">
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0 font-18 float-left" type="button"
                                                    id="widgetPerformers" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"><i class="feather icon-more-horizontal-"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="widgetPerformers">
                                                <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                                <a class="dropdown-item font-13" href="#">خروجی</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th>تصویر</th>
                                            <th>نام</th>
                                            <th>ایمیل</th>
                                            <th>%</th>
                                            <th>وظیفه</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><img src="/assets/manage/images/users/men.svg" class="img-fluid"
                                                     width="35" alt="مشتری"></td>
                                            <td>جان دو</td>
                                            <td>demo@example.com</td>
                                            <td>95%</td>
                                            <td>1500</td>
                                        </tr>
                                        <tr>
                                            <td><img src="/assets/manage/images/users/women.svg" class="img-fluid"
                                                     width="35" alt="مشتری"></td>
                                            <td>دانیال کریس</td>
                                            <td>demo@example.com</td>
                                            <td>93%</td>
                                            <td>1300</td>
                                        </tr>
                                        <tr>
                                            <td><img src="/assets/manage/images/users/boy.svg" class="img-fluid"
                                                     width="35" alt="مشتری"></td>
                                            <td>جان جاشوا</td>
                                            <td>demo@example.com</td>
                                            <td>87%</td>
                                            <td>1250</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">منابع کاربر</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button" id="widgetLeads"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="widgetLeads">
                                        <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div id="apex-radial-chart"></div>
                        <h4 class="mb-3">پروژه X</h4>
                        <p class="mb-5">لیست منابع برتر برای پروژه فوق</p>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-1">اخبار</p>
                                <h4>259</h4>
                                <p class="text-danger mb-5">7.5<i class="feather icon-arrow-down-right ml-1"></i></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-1">رسانه‌ها</p>
                                <h4>25</h4>
                                <p class="text-success mb-5">3.5<i class="feather icon-arrow-up-right ml-1"></i></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-1">تبلیغات</p>
                                <h4>95</h4>
                                <p class="text-success mb-4">5.1<i class="feather icon-arrow-up-right ml-1"></i></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-1">سایر</p>
                                <h4>63</h4>
                                <p class="text-danger mb-4">8.3<i class="feather icon-arrow-down-right ml-1"></i></p>
                            </div>
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
    <!-- Apex js -->
    <script src="{{ asset('/assets/manage/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('/assets/manage/plugins/slick/slick.min.js') }}"></script>
    <!-- Custom Dashboard js -->
    <script src="{{ asset('/assets/manage/js/custom/custom-dashboard.js') }}"></script>
@endsection
