@section('title')
    ایمیل باز
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
                            <a href="apps-email-compose" class="btn btn-danger-rgba btn-lg btn-block py-2 px-0 font-18"><i class="feather icon-plus ml-2"></i>نوشتن پیام</a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group pr-0">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="apps-email-inbox" class="active"><i class="feather icon-inbox ml-2"></i>صندوق ورودی</a>
                                    <span class="badge badge-primary-inverse text-primary">9</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-star ml-2"></i>ستاره‌دارها</a>
                                    <span class="badge badge-secondary-inverse">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-clock ml-2"></i>تأخیری‌ها</a>
                                    <span class="badge badge-secondary-inverse">3</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-send ml-2"></i>ارسال‌شده‌ها</a>
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
                    <div class="card email-open-box m-b-30">
                        <div class="card-header">
                            <ul class="list-inline mb-0 pr-0">
                                <li class="list-inline-item">
                                    <h5 class="mt-2 mb-0">ذخیره ایده‌هایتان در مورد سفر تجاری</h5>
                                </li>
                                <li class="list-inline-item float-left">
                                    <a href="#"><i class="feather icon-folder font-20"></i></a>
                                </li>
                                <li class="list-inline-item float-left">
                                    <a href="#"><i class="feather icon-printer font-20"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-md-5">
                                    <div class="media">
                                        <img class="align-self-center ml-3" src="/assets/manage/images/users/men.svg"
                                             alt="تصویر متناظر">
                                        <div class="media-body">
                                            <h6 class="mt-0">جان دو</h6>
                                            <p class="text-muted mb-0">johndoe@email.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="open-email-head float-left">
                                        <ul class="list-inline mb-0 pr-0">
                                            <li class="list-inline-item">25 ژوئیه، 2019، 1:05 ب.ظ</li>
                                            <li class="list-inline-item"><a href="#"><i class="feather icon-star font-20"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="feather icon-corner-up-left font-20"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="feather icon-more-vertical- font-20"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="mt-0">به اینجا خوش آمدید</h6>
                                    <p class="text-muted">سلام،</p>
                                    <p class="text-muted">لورم ایپسوم به طور ساده متنی آزمایشی از صنعت چاپ و صفحه آرایی است. لورم ایپسوم
                                        از زمانی که صنعت چاپ و صفحه آرایی به وجود آمد، متنی آزمایشی و بی معنی بوده است. زمانی که یک
                                        چاپگر ناشناس یک زمینه چاپی از نوع و متن را برای ساختن یک کتاب نمونه تایپی استفاده کرد. این نوع
                                        باقی مانده است و تغییر نکرده است. پنج قرن به بازمانده است، همچنین به تجاوز به تایپ الکترونیکی
                                        نیز رفته است، و اصولاً بدون تغییر باقی مانده است. در دهه 1960 با انتشار صفحات Letraset با متن
                                        های Lorem Ipsum، و به تازگی با نرم افزارهای صفحه آرایی مانند Aldus PageMaker شامل نسخه های
                                        Lorem Ipsum محبوب شد.</p>
                                    <p class="text-muted">این نوع باقی مانده است و تغییر نکرده است. پنج قرن به بازمانده است، همچنین به
                                        تجاوز به تایپ الکترونیکی نیز رفته است، و اصولاً بدون تغییر باقی مانده است. در دهه 1960 با
                                        انتشار صفحات Letraset با متن های Lorem Ipsum، و به تازگی با نرم افزارهای صفحه آرایی مانند Aldus
                                        PageMaker شامل نسخه های Lorem Ipsum محبوب شد.</p>
                                    <p class="text-muted">با تشکر.</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="/assets/manage/images/email/file-attached-1.jpg"
                                             alt="تصویر متناظر عمومی">
                                        <div class="card-body text-center">
                                            <button type="button" class="btn btn-secondary-rgba">دانلود</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="/assets/manage/images/email/file-attached-2.jpg"
                                             alt="تصویر متناظر عمومی">
                                        <div class="card-body text-center">
                                            <button type="button" class="btn btn-secondary-rgba">دانلود</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="open-email-footer">
                                <div class="row text-left">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary-rgba my-1">
                                            <i class="feather icon-corner-up-left ml-2"></i>پاسخ دادن
                                        </button>
                                        <button type="button" class="btn btn-success-rgba my-1">
                                            ارسال به جلو<i class="feather icon-corner-up-right mr-2"></i>
                                        </button>
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
    <!-- End Contentbar -->
@endsection
@section('script')

@endsection
