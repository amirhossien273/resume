@section('title')
    مدرسه
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
            <div class="col-lg-12 col-xl-3">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
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
                                        <span class="font-13">بروزرسانی امروز</span>
                                    </div>
                                    <div class="col-4 text-left">
                                        <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>۲۵٪</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-success-inverse mr-0"><i class="feather icon-award"></i></span>
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
                                        <span class="font-13">بروزرسانی ۱ روز پیش</span>
                                    </div>
                                    <div class="col-4 text-left">
                                        <span class="badge badge-warning"><i class="feather icon-trending-down mr-1"></i>۲۳٪</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-warning-inverse mr-0"><i class="feather icon-briefcase"></i></span>
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
                                        <span class="font-13">بروزرسانی ۳ روز پیش</span>
                                    </div>
                                    <div class="col-4 text-left">
                                        <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>۱۵٪</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-secondary-inverse mr-0"><i class="feather icon-book-open"></i></span>
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
                                        <span class="font-13">بروزرسانی ۵ روز پیش</span>
                                    </div>
                                    <div class="col-4 text-left">
                                        <span class="badge badge-warning"><i class="feather icon-trending-down mr-1"></i>۱۰٪</span>
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
            <div class="col-lg-12 col-xl-9">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-8">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h5 class="card-title mb-0">عملکرد دانش‌آموزان</h5>
                                    </div>
                                    <div class="col-3">
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0 font-18 float-left" type="button"
                                                    id="widgetStudent" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"><i class="feather icon-more-horizontal-"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-left"
                                                 aria-labelledby="widgetStudent">
                                                <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                                <a class="dropdown-item font-13" href="#">خروجی</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-0 pl-3 pr-0">
                                <div id="apex-area-chart"></div>
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
                                        <span class=""><i class="mdi mdi-format-quote-open text-black font-20"></i></span>
                                    </div>
                                    <div class="col-10">
                                        <h5 class="card-title mb-0 text-right">نقل قول روز</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <img src="/assets/manage/images/general/school_quote.svg" class="img-fluid my-3"
                                     width="150" alt="نقل قول مدرسه">
                                <h5 class="text-primary font-italic my-3">تغییری باشید که می‌خواهید<br/> در جهان ببینید.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-6">
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
                                                <p class="mb-0">اساتید</p>
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
                                            <div class="progress-bar" role="progressbar" style="width: 80%;"
                                                 aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <div class="course-slider-item">
                                        <h4 class="my-0">علوم</h4>
                                        <div class="row align-items-center my-4 py-3">
                                            <div class="col-4 p-0">
                                                <h4>22</h4>
                                                <p class="mb-0">اساتید</p>
                                            </div>
                                            <div class="col-4 py-3 px-0 bg-success-rgba rounded">
                                                <h4 class="text-success">350</h4>
                                                <p class="text-success mb-0">دانش‌آموزان</p>
                                            </div>
                                            <div class="col-4 p-0">
                                                <h4>05</h4>
                                                <p class="mb-0">کلاس</p>
                                            </div>
                                        </div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%;"
                                                 aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6 text-right">
                                                <span class="font-13">70% تکمیل شده</span>
                                            </div>
                                            <div class="col-6 text-left">
                                                <span class="font-13">17/25 ماژول</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-slider-item">
                                        <h4 class="my-0">زبان انگلیسی</h4>
                                        <div class="row align-items-center my-4 py-3">
                                            <div class="col-4 p-0">
                                                <h4>18</h4>
                                                <p class="mb-0">اساتید</p>
                                            </div>
                                            <div class="col-4 py-3 px-0 bg-secondary-rgba rounded">
                                                <h4 class="text-secondary">470</h4>
                                                <p class="text-secondary mb-0">دانش‌آموزان</p>
                                            </div>
                                            <div class="col-4 p-0">
                                                <h4>15</h4>
                                                <p class="mb-0">کلاس</p>
                                            </div>
                                        </div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                 style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6 text-right">
                                                <span class="font-13">60% تکمیل شده</span>
                                            </div>
                                            <div class="col-6 text-left">
                                                <span class="font-13">15/25 ماژول</span>
                                            </div>
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
                                <h5 class="card-title mb-0">نظرات والدین</h5>
                            </div>
                            <div class="card-body">
                                <div class="parents-slider">
                                    <div class="parents-slider-item">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-4">
                                                <img src="/assets/manage/images/general/parent_01.png" class="img-fluid"
                                                     alt="والدین">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="mb-4">متن نمونه استفاده از متن‌گذاری واقعی در صنعت چاپ و صفحه‌آرایی است. متن‌گذاری
                                                    از زمان‌های مختلفی که</p>
                                                <h5 class="card-title mb-1">خانم جسیکا متیو</h5>
                                                <p class="mb-0 font-14 font-italic">مادر لری متیو، کلاس 6</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="parents-slider-item">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-4">
                                                <img src="/assets/manage/images/general/parent_02.png" class="img-fluid"
                                                     alt="والدین">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="mb-4">متن نمونه استفاده از متن‌گذاری واقعی در صنعت چاپ و صفحه‌آرایی است. متن‌گذاری
                                                    از زمان‌های مختلفی که</p>
                                                <h5 class="card-title mb-1">خانم جان دو</h5>
                                                <p class="mb-0 font-14 font-italic">پدر میلا دو، کلاس 5</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="parents-slider-item">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-4">
                                                <img src="/assets/manage/images/general/parent_03.png" class="img-fluid"
                                                     alt="والدین">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="mb-4">متن نمونه استفاده از متن‌گذاری واقعی در صنعت چاپ و صفحه‌آرایی است. متن‌گذاری
                                                    از زمان‌های مختلفی که</p>
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
                </div>
                <!-- End row -->
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
                            <div class="col-6 col-lg-9">
                                <h5 class="card-title mb-0">برترین دانش‌آموزان</h5>
                            </div>
                            <div class="col-6 col-lg-3">
                                <select class="form-control font-12">
                                    <option value="class1">کلاس 1</option>
                                    <option value="class2">کلاس 2</option>
                                    <option value="class3">کلاس 3</option>
                                    <option value="class4">کلاس 4</option>
                                    <option value="class5" selected>کلاس 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>کلاس</th>
                                    <th>ریاضی</th>
                                    <th>علوم</th>
                                    <th>انگلیسی</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>جان دو</td>
                                    <td>5</td>
                                    <td>99</td>
                                    <td>99</td>
                                    <td>99</td>
                                    <td>99%</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>جیمی سیمپسون</td>
                                    <td>5</td>
                                    <td>98</td>
                                    <td>98</td>
                                    <td>98</td>
                                    <td>98%</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>لوریا جانسون</td>
                                    <td>5</td>
                                    <td>97</td>
                                    <td>97</td>
                                    <td>97</td>
                                    <td>97%</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>مری آنیستون</td>
                                    <td>5</td>
                                    <td>96</td>
                                    <td>96</td>
                                    <td>96</td>
                                    <td>96%</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>جسیکا پری</td>
                                    <td>5</td>
                                    <td>95</td>
                                    <td>95</td>
                                    <td>95</td>
                                    <td>95%</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ماریا سالکوا</td>
                                    <td>5</td>
                                    <td>94</td>
                                    <td>94</td>
                                    <td>94</td>
                                    <td>94%</td>
                                </tr>
                                </tbody>
                            </table>
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
                                <h5 class="card-title mb-0">رئیس دانشکده</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button" id="widgetHod"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="widgetHod">
                                        <a class="dropdown-item font-13" href="#">بارگزاری مجدد</a>
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
                                    <th>مدرک</th>
                                    <th>تجربه</th>
                                    <th>دانشکده</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="/assets/manage/images/users/men.svg" class="img-fluid" width="40"
                                             alt="رئیس دانشکده"></td>
                                    <td>آقای رونی سمسون</td>
                                    <td>B.Com (ریاضیات)</td>
                                    <td>بیش از 10 سال</td>
                                    <td><span class="badge badge-primary-inverse py-2 px-3 font-12">ریاضیات</span></td>
                                </tr>
                                <tr>
                                    <td><img src="/assets/manage/images/users/women.svg" class="img-fluid" width="40"
                                             alt="رئیس دانشکده"></td>
                                    <td>آقای اندرو گارفیلد</td>
                                    <td>B.Sc (شیمی)</td>
                                    <td>بیش از 8 سال</td>
                                    <td><span class="badge badge-success-inverse py-2 px-3 font-12">علوم</span></td>
                                </tr>
                                <tr>
                                    <td><img src="/assets/manage/images/users/boy.svg" class="img-fluid" width="40"
                                             alt="رئیس دانشکده"></td>
                                    <td>آقای نائومی واتسون</td>
                                    <td>B.Ed (زبان انگلیسی)</td>
                                    <td>بیش از 5 سال</td>
                                    <td><span class="badge badge-warning-inverse py-2 px-3 font-12">زبان انگلیسی</span></td>
                                </tr>
                                <tr>
                                    <td><img src="/assets/manage/images/users/girl.svg" class="img-fluid" width="40"
                                             alt="رئیس دانشکده"></td>
                                    <td>آقای مارک والبرگ</td>
                                    <td>B.A (ورزش)</td>
                                    <td>بیش از 3 سال</td>
                                    <td><span class="badge badge-secondary-inverse py-2 px-3 font-12">ورزش</span></td>
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
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Apex js -->
    <script src="{{ asset('/assets/manage/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('/assets/manage/plugins/slick/slick.min.js') }}"></script>
    <!-- Custom Dashboard js -->
    <script src="{{ asset('/assets/manage/js/custom/custom-dashboard-school.js') }}"></script>
@endsection
