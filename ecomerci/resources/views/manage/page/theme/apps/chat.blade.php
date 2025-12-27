@section('title')
    چت
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
        <div class="col-lg-5 col-xl-4">
            <div class="chat-list">
                <div class="chat-search">
                    <form>
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="جستجو" aria-label="جستجو" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn" type="submit" id="button-addon3"><i class="feather icon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="chat-user-list">
                    <ul class="list-unstyled mb-0 pr-0">
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/girl.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>آمی آدامز<span class="badge badge-success mr-2">1</span> <span class="timing">22 ژانویه</span></h5>
                                <p>مدیر</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/boy.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>جیمز سیمی<span class="badge badge-success mr-2">2</span> <span class="timing">15 فوریه</span></h5>
                                <p>مدیر منابع انسانی</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/men.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>مارک ویتر<span class="badge badge-success mr-2">3</span> <span class="timing">03 مارس</span></h5>
                                <p>مدیر</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/women.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>استیو جیسون<span class="badge badge-success mr-2">1</span> <span class="timing">22 ژانویه</span></h5>
                                <p>تحلیل‌گر داده</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/girl.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>برد پیت<span class="badge badge-success mr-2">2</span> <span class="timing">15 فوریه</span></h5>
                                <p>بازیگر</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/boy.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>ویل اسمیت<span class="badge badge-success mr-2">3</span> <span class="timing">03 مارس</span></h5>
                                <p>مدیر محصول</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/men.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>کورتنی دو<span class="badge badge-success mr-2">1</span> <span class="timing">22 ژانویه</span></h5>
                                <p>توسعه‌دهنده PHP</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/women.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>جنی ویلز<span class="badge badge-success mr-2">2</span> <span class="timing">15 فوریه</span></h5>
                                <p>مدیر منابع انسانی</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/boy.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>سام پترسون<span class="badge badge-success mr-2">3</span> <span class="timing">03 مارس</span></h5>
                                <p>رئیس بازاریابی</p>
                            </div>
                        </li>
                        <li class="media">
                            <img class="align-self-center rounded-circle" src="/assets/manage/images/users/girl.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5>آمی آدامز<span class="badge badge-success mr-2">1</span> <span class="timing">22 ژانویه</span></h5>
                                <p>مدیر</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-7 col-xl-8">
            <div class="chat-detail">
                <div class="chat-head">
                    <ul class="list-unstyled mb-0 pr-0">
                        <li class="media">
                            <img class="align-self-center ml-3 rounded-circle" src="/assets/manage/images/users/girl.svg" alt="تصویر نمایه چرخیده">
                            <div class="media-body">
                                <h5 class="font-18">آمی آدامز</h5>
                                <p class="mb-0">در حال تایپ...</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="chat-body">
                    <div class="chat-day text-center mb-3">
                        <span class="badge badge-secondary">امروز</span>
                    </div>
                    <div class="chat-message chat-message-right">
                        <div class="chat-message-text">
                            <span>سلام! لطفاً پس از مدرسه وضعیت پروژه را به من اطلاع دهید.</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۱۸ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                        </div>
                    </div>
                    <div class="chat-message chat-message-left">
                        <div class="chat-message-text">
                            <span>من ۴ مرحله را تکمیل کردم، ۵ مرحله باقی مانده است.</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۲۰ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                        </div>
                    </div>
                    <div class="chat-message chat-message-right">
                        <div class="chat-message-text">
                            <span>از شما درخواست می‌کنم که جلسه دمو را در ساعت ۳ بعد از ظهر بعد از ۲ روز برای پیشرفت بهتر برنامه‌ریزی کنید.</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۲۵ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                        </div>
                    </div>
                    <div class="chat-message chat-message-left">
                        <div class="chat-message-text">
                            <span>مطمئناً، من برای همین آماده خواهم شد.</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۲۷ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                        </div>
                    </div>
                    <div class="chat-message chat-message-right">
                        <div class="chat-message-text">
                            <span>عالی. ممنون</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۳۰ بعد از ظهر<i class="feather icon-clock ml-2"></i></span>
                        </div>
                    </div>
                    <div class="chat-message chat-message-left">
                        <div class="chat-message-text">
                            <span>من ۴ مرحله را تکمیل کردم، ۵ مرحله باقی مانده است.</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۲۰ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                        </div>
                    </div>
                    <div class="chat-message chat-message-right">
                        <div class="chat-message-text">
                            <span>از شما درخواست می‌کنم که جلسه دمو را در ساعت ۳ بعد از ظهر بعد از ۲ روز برای پیشرفت بهتر برنامه‌ریزی کنید.</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۲۵ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                        </div>
                    </div>
                    <div class="chat-message chat-message-left">
                        <div class="chat-message-text">
                            <span>البته، من برای همین آماده خواهم شد.</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۲۷ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                        </div>
                    </div>
                    <div class="chat-message chat-message-right">
                        <div class="chat-message-text">
                            <span>عالی. ممنون</span>
                        </div>
                        <div class="chat-message-meta">
                            <span>۴:۳۰ بعد از ظهر<i class="feather icon-clock ml-2"></i></span>
                        </div>
                    </div>

                </div>
                <div class="chat-bottom">
                    <div class="chat-messagebar">
                        <form>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-secondary-rgba" type="button" id="button-addonmic"><i class="feather icon-mic"></i></button>
                                </div>
                                <input type="text" class="form-control" placeholder="یک پیام بنویسید..." aria-label="متن">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary-rgba" type="submit" id="button-addonlink"><i class="feather icon-link"></i></button>
                                    <button class="btn btn-primary-rgba" type="button" id="button-addonsend"><i class="feather icon-send"></i></button>
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
<!-- End contentbar -->
@endsection
@section('script')
<!-- Chat js -->
<script src="{{ asset('/assets/manage/js/custom/custom-chat.js') }}"></script>
@endsection
