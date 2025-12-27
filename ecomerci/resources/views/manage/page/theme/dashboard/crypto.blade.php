@section('title')
    رمزارزی
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
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/bitcoin.png"
                                 alt="تصویر محلی کلی">
                            <div class="media-body">
                                <h5 class="mb-2">بیت‌کوین</h5>
                                <p class="mb-0">1 بیت‌کوین = 49 دلار</p>
                            </div>
                            <img class="action-bg rounded-circle" src="/assets/manage/images/crypto/1.png"
                                 alt="تصویر محلی کلی">
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
                                 alt="تصویر محلی کلی">
                            <div class="media-body">
                                <h5 class="mb-2">اتریوم</h5>
                                <p class="mb-0">1 اتریوم = 5.69 دلار</p>
                            </div>
                            <img class="action-bg rounded-circle" src="/assets/manage/images/crypto/2.png"
                                 alt="تصویر محلی کلی">
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
                                 alt="تصویر محلی کلی">
                            <div class="media-body">
                                <h5 class="mb-2">ریپل</h5>
                                <p class="mb-0">1 ریپل = 0.96 دلار</p>
                            </div>
                            <img class="action-bg rounded-circle" src="/assets/manage/images/crypto/3.png"
                                 alt="تصویر محلی کلی">
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
                                 alt="تصویر محلی کلی">
                            <div class="media-body">
                                <h5 class="mb-2">بیت‌کوین کش</h5>
                                <p class="mb-0">1 بیت‌کوین کش = 58.85 دلار</p>
                            </div>
                            <img class="action-bg rounded-circle" src="/assets/manage/images/crypto/4.png"
                                 alt="تصویر محلی کلی">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">آمار زنده ATC</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetPatientTypes" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetPatientTypes">
                                        <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 pl-0">
                        <div id="apex-timeseries-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">خرید ATC</h5>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-5">دلار به ATC <span class="float-left"><i
                                    class="feather icon-chevron-left mr-2"></i><i
                                    class="feather icon-chevron-right"></i></span></h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="مبلغ به دلار"
                                   aria-label="مبلغ به دلار" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">دلار</span>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="تعداد ATC" aria-label="تعداد ATC"
                                   aria-describedby="basic-addon3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">ATC</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-lg btn-block my-4">خرید</button>
                        <div class="row">
                            <div class="col-8">
                                <p class="mb-0">هزینه یک بار</p>
                            </div>
                            <div class="col-4">
                                <p class="mb-0 text-left">$0.5</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">فروش ATC</h5>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-5">ATC به دلار <span class="float-left"><i
                                    class="feather icon-chevron-left mr-2"></i><i
                                    class="feather icon-chevron-right"></i></span></h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="تعداد ATC" aria-label="تعداد ATC"
                                   aria-describedby="basic-addon5">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon5">ATC</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="مبلغ به دلار"
                                   aria-label="مبلغ به دلار" aria-describedby="basic-addon4">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon4">دلار</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger btn-lg btn-block my-4">فروش</button>
                        <div class="row">
                            <div class="col-8">
                                <p class="mb-0">هزینه یک بار</p>
                            </div>
                            <div class="col-4">
                                <p class="mb-0 text-left">$0.5</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header text-center">
                        <h5 class="card-title mb-0">آمار سرمایه‌گذاری</h5>
                    </div>
                    <div class="card-body p-0">
                        <div id="apex-circle-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-8">
                <div class="card m-b-30 dash-widget">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h5 class="card-title mb-0">درآمد</h5>
                            </div>
                            <div class="col-7">
                                <ul class="nav nav-pills float-left" id="pills-earning-tab-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-month-tab-justified" data-toggle="pill"
                                           href="#pills-month-justified" role="tab" aria-selected="true">ماه</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-week-tab-justified" data-toggle="pill"
                                           href="#pills-week-justified" role="tab" aria-selected="false">هفته</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>ارز</th>
                                    <th>پلتفرم</th>
                                    <th>ایمیل</th>
                                    <th>شناسه</th>
                                    <th>مبلغ</th>
                                    <th>وضعیت</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img class="w-25 rounded-circle"
                                             src="/assets/manage/images/crypto/bitcoin_small.png"
                                             alt="تصویر محلی کلی"></td>
                                    <td>bitcoin.com</td>
                                    <td>johncb@gmail.com</td>
                                    <td>BCC98F59</td>
                                    <td>$598.69</td>
                                    <td><span class="badge badge-primary-inverse">در حال بررسی</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><img class="w-25 rounded-circle"
                                             src="/assets/manage/images/crypto/ethereum_small.png"
                                             alt="تصویر جایگزین عمومی"></td>
                                    <td>cashitnow.com</td>
                                    <td>jameson911@gmail.com</td>
                                    <td>CITN456546</td>
                                    <td>$98.65</td>
                                    <td><span class="badge badge-success-inverse">موفقیت</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><img class="w-25 rounded-circle"
                                             src="/assets/manage/images/crypto/ripple_small.png"
                                             alt="تصویر جایگزین عمومی"></td>
                                    <td>miningtrend.com</td>
                                    <td>will2go@gmail.com</td>
                                    <td>MGT584@F</td>
                                    <td>$83.25</td>
                                    <td><span class="badge badge-primary-inverse">در انتظار</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><img class="w-25 rounded-circle"
                                             src="/assets/manage/images/crypto/bcc_small.png"
                                             alt="تصویر جایگزین عمومی"></td>
                                    <td>getprofit.com</td>
                                    <td>dakota@gmail.com</td>
                                    <td>BCD94F769</td>
                                    <td>$859.55</td>
                                    <td><span class="badge badge-success-inverse">موفقیت</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><img class="w-25 rounded-circle"
                                             src="/assets/manage/images/crypto/bitcoin_small.png"
                                             alt="تصویر جایگزین عمومی"></td>
                                    <td>bitcoin.com</td>
                                    <td>johncb@gmail.com</td>
                                    <td>BCC98F59</td>
                                    <td>$598.69</td>
                                    <td><span class="badge badge-primary-inverse">در انتظار</span></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><img class="w-25 rounded-circle"
                                             src="/assets/manage/images/crypto/ethereum_small.png"
                                             alt="تصویر جایگزین عمومی"></td>
                                    <td>whatiscrypto.uk</td>
                                    <td>whatis@gmail.com</td>
                                    <td>MTB005TC</td>
                                    <td>$12.38</td>
                                    <td><span class="badge badge-success-inverse">موفقیت</span></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><img class="w-25 rounded-circle"
                                             src="/assets/manage/images/crypto/ripple_small.png"
                                             alt="تصویر جایگزین عمومی"></td>
                                    <td>bitcoin.com</td>
                                    <td>johncb@gmail.com</td>
                                    <td>BCC98F59</td>
                                    <td>$598.69</td>
                                    <td><span class="badge badge-primary-inverse">در انتظار</span></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><img class="w-25 rounded-circle"
                                             src="/assets/manage/images/crypto/bcc_small.png"
                                             alt="تصویر جایگزین عمومی"></td>
                                    <td>bitcoin.com</td>
                                    <td>johncb@gmail.com</td>
                                    <td>BCC98F59</td>
                                    <td>$598.69</td>
                                    <td><span class="badge badge-success-inverse">موفقیت</span></td>
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
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">تمامی فعالیت‌ها</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetPatientTypes" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetPatientTypes">
                                        <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                        <a class="dropdown-item font-13" href="#">صادر کردن</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="اینجا تایپ کنید..." aria-label="اینجا تایپ کنید..."
                                   aria-describedby="basic-addon6">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon6">جستجو</span>
                            </div>
                        </div>
                        <ul class="list-unstyled pr-0">
                            <li class="media">
                                <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/bitcoin_small.png"
                                     alt="تصویر جایگزین عمومی">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">بیت‌کوین (BTC)<span
                                            class="float-left text-success font-14 mt-1">+BTC 5.26</span></h5>
                                    <p class="mb-0"><i class="feather icon-arrow-left mr-2"></i>خریداری شده - امروز، 15:32<span class="float-left text-muted font-12 mt-1">= $20.89</span></p>
                                </div>
                            </li>
                            <li class="media my-4">
                                <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/ethereum_small.png"
                                     alt="تصویر جایگزین عمومی">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">ETH به RPH<span
                                            class="float-left text-success font-14 mt-1">+RPH 15.52</span></h5>
                                    <p class="mb-0"><i class="feather icon-arrow-left mr-2"></i>تبدیل شده - دیروز، 09:42<span class="float-left text-muted font-12 mt-1">= $15</span></p>
                                </div>
                            </li>
                            <li class="media">
                                <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/ripple_small.png"
                                     alt="تصویر جایگزین عمومی">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">ریپل<span
                                            class="float-left text-success font-14 mt-1">+Ripple 3.28</span></h5>
                                    <p class="mb-0"><i class="feather icon-arrow-left mr-2"></i>خریداری شده - دیروز، 18:20<span class="float-left text-muted font-12 mt-1">= $20.89</span></p>
                                </div>
                            </li>
                            <li class="media my-4">
                                <img class="ml-3 rounded-circle" src="/assets/manage/images/crypto/bcc_small.png"
                                     alt="تصویر جایگزین عمومی">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">بیت‌کوین کش<span
                                            class="float-left text-success font-14 mt-1">+BTC 1.63</span></h5>
                                    <p class="mb-0"><i class="feather icon-arrow-left mr-2"></i>تبدیل شده - 21 فوریه، 04:25<span class="float-left text-muted font-12 mt-1">= $33.72</span></p>
                                </div>
                            </li>
                        </ul>
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
                                <h5 class="card-title mb-0">سرمایه‌گذاری به تفکیک ارز</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetPatientTypes" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetPatientTypes">
                                        <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 pl-0">
                        <div id="apex-stacked-chart"></div>
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
    <!-- Dashboard js -->
    <script src="{{ asset('/assets/manage/js/custom/custom-dashboard-crypto.js') }}"></script>
@endsection
