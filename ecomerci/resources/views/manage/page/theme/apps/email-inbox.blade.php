@section('title')
    صندوق ورودی ایمیل
@endsection
@extends('manage.layout.app')
@section('style')

@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-3">
                <div class="email-leftbar">
                    <div class="card m-b-30">
                        <div class="card-header text-center">
                            <a href="apps-email-compose" class="btn btn-danger-rgba btn-lg btn-block py-2 px-0 font-18"><i
                                    class="feather icon-plus ml-2"></i>ایجاد</a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group pr-0">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="apps-email-inbox" class="active"><i class="feather icon-inbox ml-2"></i>صندوق
                                        ورودی</a>
                                    <span class="badge badge-primary-inverse text-primary">9</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-star ml-2"></i>ستاره‌دار</a>
                                    <span class="badge badge-secondary-inverse">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-clock ml-2"></i>معوق</a>
                                    <span class="badge badge-secondary-inverse">3</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-send ml-2"></i>ارسال شده</a>
                                    <span class="badge badge-secondary-inverse">4</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-file ml-2"></i>پیش‌نویس‌ها</a>
                                    <span class="badge badge-secondary-inverse">5</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-award ml-2"></i>مهم</a>
                                    <span class="badge badge-secondary-inverse">6</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-alert-octagon ml-2"></i>هرزنامه</a>
                                    <span class="badge badge-secondary-inverse">7</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-trash ml-2"></i>زباله‌دان</a>
                                    <span class="badge badge-secondary-inverse">8</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-9">
                <div class="email-rightbar">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <ul class="list-inline mb-0 pr-0">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="feather icon-square font-20"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="feather icon-download font-20"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="feather icon-alert-octagon font-20"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="feather icon-trash font-20"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="feather icon-clock font-20"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="feather icon-folder font-20"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="feather icon-tag font-20"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="feather icon-more-vertical- font-20"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item float-right">
                                    <a href="#">
                                        <i class="feather icon-settings font-20"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                    <tr class="email-unread">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck1">
                                                <label class="custom-control-label psn-abs" for="emailCheck1"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="apps-email-open">بانک Yes محدوده</a></td>
                                        <td><span class="badge badge-success-inverse ml-2">جدید</span> یک بار رمز عبور
                                            برای امضای EVC
                                            <p class="mt-1 mb-0 font-14">این ایمیل مربوط به ترازها و GSTR3B است. رمز
                                                عبور یک بار مصرف (OTP) شما </p></td>
                                        <td>02:05 ب.ظ</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck2">
                                                <label class="custom-control-label psn-abs" for="emailCheck2"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="apps-email-open">گوگل</a></td>
                                        <td>به گوگل خوش آمدید - از شما بابت بودن در کنار ما متشکریم <p
                                                class="mt-1 mb-0 font-14">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit...</p></td>
                                        <td>08:20 صبح</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck3">
                                                <label class="custom-control-label psn-abs" for="emailCheck3"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="apps-email-open">آمازون</a></td>
                                        <td>از الان ثبت‌نام کنید و فروش در آمازون را آغاز کنید</td>
                                        <td>سپتامبر 05</td>
                                    </tr>
                                    <tr class="email-unread">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck4">
                                                <label class="custom-control-label psn-abs" for="emailCheck4"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="apps-email-open">توییتر</a></td>
                                        <td>به توییتر خوش آمدید - از شما بابت بودن در کنار ما متشکریم</td>
                                        <td>سپتامبر 03</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck5">
                                                <label class="custom-control-label psn-abs" for="emailCheck5"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star-on font-18"></i></td>
                                        <td><a href="apps-email-open">یوتیوب</a></td>
                                        <td><span class="badge badge-primary-inverse ml-2">اجتماعی</span> به یوتیوب خوش
                                            آمدید - از شما بابت بودن در کنار ما متشکریم
                                        </td>
                                        <td>سپتامبر 02</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck6">
                                                <label class="custom-control-label psn-abs" for="emailCheck6"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="apps-email-open">مکس‌بوپا</a></td>
                                        <td>پوشش بیمه تا 1 کروٍر!</td>
                                        <td>آگوست 26</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck7">
                                                <label class="custom-control-label psn-abs" for="emailCheck7"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="apps-email-open">کرداکس</a></td>
                                        <td>معرفی راهکار سرمایه‌گذاری آسان برای کسب‌وکار شما</td>
                                        <td>آگوست 09</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck8">
                                                <label class="custom-control-label psn-abs" for="emailCheck8"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star-on font-18"></i></td>
                                        <td><a href="apps-email-open">سوییگی</a></td>
                                        <td>یک یکشنبه بدون بریانی چه حالی داره؟ 😋</td>
                                        <td>ژوئیه 22</td>
                                    </tr>
                                    <tr class="email-unread">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck9">
                                                <label class="custom-control-label psn-abs" for="emailCheck9"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="apps-email-open">تایید فوری</a></td>
                                        <td><span class="badge badge-danger-inverse ml-2">پشتیبانی</span> به سرعت پول
                                            نیاز دارید؟ امروز تا 2 لاک‌ روپیه وام بگیرید
                                        </td>
                                        <td>ژوئیه 03</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck10">
                                                <label class="custom-control-label psn-abs" for="emailCheck10"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="apps-email-open">پینترست</a></td>
                                        <td>ایده‌های خود را در مورد سفر کاری ذخیره کنید</td>
                                        <td>ژوئن 20</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 col-md-6 align-self-center">
                                    <div class="email-show-label">
                                        <span>نمایش: 1 - 10 از 590</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 align-self-center">
                                    <div class="email-pagination float-right">
                                        <ul class="pagination mb-0">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="قبلی">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">قبلی</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="بعدی">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">بعدی</span>
                                                </a>
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
        </div>
        <!-- Start row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')

@endsection
