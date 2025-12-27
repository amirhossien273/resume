@section('title')
    بیمارستان
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
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">انواع بیماران</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetPatientTypes" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="widgetPatientTypes">
                                        <a class="dropdown-item font-13" href="#">بارگذاری مجدد</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 pl-2 pr-0">
                        <div id="apex-basic-column-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
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
                        <h3>۲۳۵</h3>
                        <p>مجموعه این هفته</p>
                        <ul class="list-unstyled py-3 pr-0">
                            <li><i class="mdi mdi-circle text-primary ml-2"></i> وب‌سایت</li>
                            <li><i class="mdi mdi-circle text-success ml-2"></i> تماس تلفنی</li>
                            <li><i class="mdi mdi-circle text-light ml-2"></i> اپلیکیشن</li>
                        </ul>
                        <div class="row align-items-end">
                            <div class="col-6">
                                <button type="button" class="btn btn-primary">گزارش خروجی <i
                                        class="feather icon-file mق-2"></i></button>
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
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">هزینه‌های بیمارستان</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4 pl-0">
                                <h4 class="mb-3">$۹۵</h4>
                                <p class="font-15 mb-0"><span class="badge badge-success"><i
                                            class="feather icon-arrow-up mr-1"></i>۲۵٪</span></p>
                            </div>
                            <div class="col-8">
                                <div id="apex-hospital-expense-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">هزینه‌های داروخانه</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4 pl-0">
                                <h4 class="mb-3">$۲۳</h4>
                                <p class="font-16 mb-0"><span class="badge badge-warning"><i
                                            class="feather icon-arrow-down mr-1"></i>۱۲٪</span></p>
                            </div>
                            <div class="col-8">
                                <div id="apex-pharmacy-expense-chart"></div>
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
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">آمار بخش‌ها</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetDepartment" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="widgetDepartment">
                                        <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>پزشک‌ها</th>
                                    <th>عملیات‌ها</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>اورتوپدی</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/women.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/boy.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 75%;"
                                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>75</td>
                                </tr>
                                <tr>
                                    <td>پزشکی کودکان</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/women.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%;"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>بارداری</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/women.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/boy.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 60%;"
                                                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>آنکولوژی</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/women.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>دندانپزشکی</td>
                                    <td>
                                        <div class="avatar-group">
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/women.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                            <div class="avatar">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="امی آدامز">
                                                    <img src="/assets/manage/images/users/boy.svg" alt="آواتار"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 87%;"
                                                 aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>87</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">بهترین پزشکان</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetBestDoctors" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="widgetBestDoctors">
                                        <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <ul class="list-unstyled pr-0">
                            <li class="media">
                                <img class="ml-3 rounded-circle" src="/assets/manage/images/users/men.svg"
                                     alt="تصویر مشخص کننده عمومی">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">دکتر شریرام رامش<span
                                            class="badge badge-warning-inverse float-left font-14">4.5</span></h5>
                                    <p class="mb-0">دکترای پزشکی (داروها)، دکترای جراحی زنان و زایمان</p>
                                </div>
                            </li>
                            <li class="media my-4">
                                <img class="ml-3 rounded-circle" src="/assets/manage/images/users/boy.svg"
                                     alt="تصویر مشخص کننده عمومی">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">دکتر اندرو گارفیلد<span
                                            class="badge badge-warning-inverse float-left font-14">4.0</span></h5>
                                    <p class="mb-0">پزشک عمومی، داروسازی</p>
                                </div>
                            </li>
                            <li class="media">
                                <img class="ml-3 rounded-circle" src="/assets/manage/images/users/women.svg"
                                     alt="تصویر مشخص کننده عمومی">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">دکتر نعومی واتسون<span
                                            class="badge badge-warning-inverse float-left font-14">3.5</span></h5>
                                    <p class="mb-0">تخصص در زنان و زایمان انکولوژی</p>
                                </div>
                            </li>
                            <li class="media my-4">
                                <img class="ml-3 rounded-circle" src="/assets/manage/images/users/girl.svg"
                                     alt="تصویر مشخص کننده عمومی">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">دکتر مارک والبرگ<span
                                            class="badge badge-warning-inverse float-left font-14">3.0</span></h5>
                                    <p class="mb-0">رئیس جراحی اعصاب</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">اطلاعیه‌ها</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetNotifications" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="widgetNotifications">
                                        <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <ul class="list-unstyled pr-0">
                            <li class="media">
                    <span class="ml-3 action-icon badge badge-primary-inverse"><i
                            class="feather icon-dollar-sign"></i></span>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">آمی آهوجا منتقل شده<span
                                            class="float-left text-muted font-11 mt-1">02:39 ب.ظ</span></h5>
                                    <p class="mb-0">اتاق شماره 405 به آن تعلق دارد...</p>
                                </div>
                            </li>
                            <li class="media my-4">
                    <span class="ml-3 action-icon badge badge-success-inverse"><i
                            class="feather icon-file"></i></span>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">تامین دریافت شده<span
                                            class="float-left text-muted font-11 mt-1">10:23 ب.ظ</span></h5>
                                    <p class="mb-0">ما تامین ماهانه دریافت کرده‌ایم.</p>
                                </div>
                            </li>
                            <li class="media">
                    <span class="ml-3 action-icon badge badge-danger-inverse"><i
                            class="feather icon-eye"></i></span>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">دکتر شریرام در مرخصی است<span
                                            class="float-left text-muted font-11 mt-1">04:51 ب.ظ</span></h5>
                                    <p class="mb-0">جلسه درمانی را برای او زمان‌بندی نکنید...</p>
                                </div>
                            </li>
                            <li class="media my-4">
                    <span class="ml-3 action-icon badge badge-warning-inverse"><i
                            class="feather icon-package"></i></span>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-16">عمل جراحی موفقیت‌آمیز بود<span
                                            class="float-left text-muted font-11 mt-1">05:12 ب.ظ</span></h5>
                                    <p class="mb-0">جسیکا میر پس از...</p>
                                </div>
                            </li>
                        </ul>
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
                                <h5 class="card-title mb-0">وضعیت بیماران</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-left" type="button"
                                            id="widgetPatientStatus" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="widgetPatientStatus">
                                        <a class="dropdown-item font-13" href="#">به‌روزرسانی</a>
                                        <a class="dropdown-item font-13" href="#">خروجی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>نام</th>
                                    <th>وارد شده در</th>
                                    <th>بیماری</th>
                                    <th>پزشک معالج</th>
                                    <th>وضعیت بهبود</th>
                                    <th>عملیات‌ها</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>آمی آهوجا</td>
                                    <td>23-Oct-19</td>
                                    <td><span class="badge badge-secondary-inverse">جوندگی</span></td>
                                    <td>دکتر اندرو گارفیلد</td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 75%;"
                                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                        <a href="#" class="text-primary ml-2"><i class="feather icon-edit-2"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ویکی ملهوترا</td>
                                    <td>15-Sep-19</td>
                                    <td><span class="badge badge-secondary-inverse">تصادف</span></td>
                                    <td>دکتر مارک والبرگ</td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%;"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                        <a href="#" class="text-primary ml-2"><i class="feather icon-edit-2"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>سایمون کاول</td>
                                    <td>05-Aug-19</td>
                                    <td><span class="badge badge-secondary-inverse">تب</span></td>
                                    <td>دکتر نعومی واتسون</td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 60%;"
                                                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                        <a href="#" class="text-primary ml-2"><i class="feather icon-edit-2"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>اندی مورفی</td>
                                    <td>18-Jul-19</td>
                                    <td><span class="badge badge-secondary-inverse">دنگی</span></td>
                                    <td>دکتر جنیفر ویل</td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                        <a href="#" class="text-primary ml-2"><i class="feather icon-edit-2"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>جسیکا مایر</td>
                                    <td>11-Jun-19</td>
                                    <td><span class="badge badge-secondary-inverse">بارداری</span></td>
                                    <td>دکتر شری رامش</td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 87%;"
                                                 aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                        <a href="#" class="text-primary ml-2"><i class="feather icon-edit-2"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ویل پاتیسون</td>
                                    <td>20-Apr-19</td>
                                    <td><span class="badge badge-secondary-inverse">سرطان</span></td>
                                    <td>دکتر لورن گاتبیل</td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 75%;"
                                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                        <a href="#" class="text-primary ml-2"><i class="feather icon-edit-2"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>کورتنی کاکس</td>
                                    <td>22 مارس 19</td>
                                    <td><span class="badge badge-secondary-inverse">فلج</span></td>
                                    <td>دکتر ولادیمیر جیر</td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%;"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                        <a href="#" class="text-primary ml-2"><i class="feather icon-edit-2"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>پل تیلور</td>
                                    <td>03 فوریه 19</td>
                                    <td><span class="badge badge-secondary-inverse">استفراغ</span></td>
                                    <td>دکتر سانسا اسمیت</td>
                                    <td>
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 60%;"
                                                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                        <a href="#" class="text-primary ml-2"><i class="feather icon-edit-2"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title text-center mb-0">وضعیت عملیات</h5>
                    </div>
                    <div class="card-body">
                        <div id="apex-operation-status-chart"></div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="row">
                            <div class="col-6 border-right">
                                <p class="my-2"><span class="font-18 f-w-6 text-primary">۱۷۰</span></p>
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
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30">
                    <div class="blog-slider">
                        <div class="blog-slider-item">
                            <img class="card-img-top" src="/assets/manage/images/blog/blog_slide_01.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <span class="badge badge-secondary mb-3">اخبار</span>
                                <h5 class="card-title font-18">واکسن جدید اختراع شد</h5>
                                <p class="card-text mb-0">واکسن‌های محافظتی در برابر روتاویروس، خراشی و واکسن پلیویروس غیرفعال (IPV)
                                    برای تمام کودکان در دسترس قرار خواهند گرفت...</p>
                            </div>
                        </div>
                        <div class="blog-slider-item">
                            <img class="card-img-top" src="/assets/manage/images/blog/blog_slide_02.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <span class="badge badge-secondary mb-3">نظرسنجی</span>
                                <h5 class="card-title font-18">تمام بیماران نارسایی قلبی سطح مراقبت یکسانی نمی‌بینند</h5>
                                <p class="card-text mb-0">اگر برای نارسایی قلبی بستری شوید و از نژاد سیاه یا هیسپانیک باشید، تحقیقات جدید...</p>
                            </div>
                        </div>
                        <div class="blog-slider-item">
                            <img class="card-img-top" src="/assets/manage/images/blog/blog_slide_03.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <span class="badge badge-secondary mb-3">ایده</span>
                                <h5 class="card-title font-18">شفافیت قیمت در مراقبت‌های بهداشتی</h5>
                                <p class="card-text mb-0">برای کاهش هزینه‌های مراقبت‌های بهداشتی، کارفرمایان بخش خصوصی باید از
                                    ارائه‌دهندگان مراقبت‌های بهداشتی بخواهند که قیمت‌های پنهان خود را اعلام کنند...</p>
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
    <!-- Dashboard js -->
    <script src="{{ asset('/assets/manage/js/custom/custom-dashboard-hospital.js') }}"></script>
@endsection
