@section('title')
    جزئیات سفارش
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
            <div class="col-lg-7 col-xl-8">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h5 class="card-title mb-0">شماره سفارش: #986953</h5>
                            </div>
                            <div class="col-5 text-left">
                                <span class="badge badge-success-inverse">تکمیل شده</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="order-primary-detail mb-4">
                                    <h6>سفارش ثبت شده</h6>
                                    <p class="mb-0">۱۶/۰۶/۲۰۱۹ ساعت ۰۴:۲۳ ب.ظ</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="order-primary-detail mb-4">
                                    <h6>نام</h6>
                                    <p class="mb-0">میشل جانسون</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="order-primary-detail mb-4">
                                    <h6>آدرس ایمیل</h6>
                                    <p class="mb-0">demo@example.com</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="order-primary-detail mb-4">
                                    <h6>شماره تماس</h6>
                                    <p class="mb-0">+۱ ۹۸۷۶۵۴۳۲۱۰</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6 ">
                                <div class="order-primary-detail mb-4">
                                    <h6>آدرس تحویل <a href="#" class="badge badge-primary-inverse">ویرایش</a></h6>
                                    <p>417 خیابان ردباد، ساختومان منهتن،<br/> وایت‌استون، نیویورک.<br/> نیویورک-۱۱۳۵۷
                                    </p>
                                    <p class="mb-0">+۱ ۱۲۳ ۱۲۳ ۴۵۶۷</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6 ">
                                <div class="order-primary-detail mb-4">
                                    <h6>آدرس صورتحساب <a href="#" class="badge badge-primary-inverse">ویرایش</a></h6>
                                    <p>417 خیابان ردباد، ساختومان منهتن،<br/> وایت‌استون، نیویورک.<br/> نیویورک-۱۱۳۵۷
                                    </p>
                                    <p class="mb-0">+۱ ۱۲۳ ۱۲۳ ۴۵۶۷</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">محصولات سفارش</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">عملیات</th>
                                    <th scope="col">تصویر</th>
                                    <th scope="col">محصول</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col" class="text-left">مجموع</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><a href="#" class="text-success ml-2"><i class="feather icon-edit-2"></i></a><a
                                            href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                    <td><img src="/assets/manage/images/ecommerce/product_01.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ Apple MacBook Pro</td>
                                    <td>1</td>
                                    <td>$10</td>
                                    <td class="text-left">$500</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><a href="#" class="text-success ml-2"><i class="feather icon-edit-2"></i></a><a
                                            href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                    <td><img src="/assets/manage/images/ecommerce/product_02.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ Dell Alienware</td>
                                    <td>2</td>
                                    <td>$20</td>
                                    <td class="text-left">$200</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td><a href="#" class="text-success ml-2"><i class="feather icon-edit-2"></i></a><a
                                            href="#" class="text-danger"><i class="feather icon-trash"></i></a></td>
                                    <td><img src="/assets/manage/images/ecommerce/product_03.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ Acer Predator Helios</td>
                                    <td>3</td>
                                    <td>$30</td>
                                    <td class="text-left">$300</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row border-top pt-3">
                            <div class="col-md-12 order-2 order-lg-1 col-lg-4 col-xl-6">
                                <div class="order-note">
                                    <p class="mb-5"><span
                                            class="badge badge-secondary-inverse">سفارش با تحویل رایگان</span></p>
                                    <h6>یادداشت:</h6>
                                    <p>لطفاً محصول را با کیسه هوا و با دقت بسته‌بندی کنید.</p>
                                </div>
                            </div>
                            <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
                                <div class="order-total table-responsive ">
                                    <table class="table table-borderless text-left">
                                        <tbody>
                                        <tr>
                                            <td>جمع کل:</td>
                                            <td>$1000.00</td>
                                        </tr>
                                        <tr>
                                            <td>هزینه ارسال:</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>مالیات (18٪):</td>
                                            <td>$180.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black f-w-7 font-18">مبلغ نهایی:</td>
                                            <td class="text-black f-w-7 font-18">$1180.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-left">
                        <button type="button" class="btn btn-primary-rgba my-1"><i class="feather icon-plus ml-2"></i>افزودن
                            محصول
                        </button>
                        <button type="button" class="btn btn-success-rgba my-1"><i class="feather icon-repeat ml-2"></i>بازپرداخت
                        </button>
                        <button type="button" class="btn btn-danger-rgba my-1"><i class="feather icon-trash ml-2"></i>لغو
                        </button>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h5 class="card-title mb-0">جزئیات فایل PDF فاکتور</h5>
                            </div>
                            <div class="col-5 text-left">
                                <button type="button" class="btn btn-success py-1"><i
                                        class="feather icon-download ml-2"></i>دریافت فاکتور
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="order-primary-detail">
                            <h6>جزئیات فایل PDF فعلی</h6>
                            <p class="mb-0">شماره فاکتور: #986953</p>
                            <p class="mb-0">کد مالی فروشنده: 24HY87078641Z0</p>
                            <p class="mb-0">کد مالی خریدار: 24HG9878961Z1</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-5 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h5 class="card-title mb-0">از طریق</h5>
                            </div>
                            <div class="col-8">
                                <div class="card-statistics">
                                    <ul class="nav nav-pills mb-0" id="stastic-pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-email-tab" data-toggle="pill"
                                               href="#pills-email" role="tab" aria-selected="false">ایمیل</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-sms-tab" data-toggle="pill" href="#pills-sms"
                                               role="tab" aria-selected="false">پیامک</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <select id="orderCategory" class="form-control">
                                    <option selected>نوع را انتخاب کنید</option>
                                    <option value="processing">در حال پردازش</option>
                                    <option value="on-hold">در انتظار</option>
                                    <option value="shipped">ارسال شده</option>
                                    <option value="out-for-delivery">در راه تا تحویل</option>
                                    <option value="delivered">تحویل شده</option>
                                    <option value="completed">تکمیل شده</option>
                                    <option value="cancelled">لغو شده</option>
                                </select>
                            </div>
                            <div class="form-group">
                <textarea class="form-control" name="specialMessage" id="specialMessage" rows="3"
                          placeholder="پیام ویژه را اضافه کنید"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="feather icon-send ml-2"></i>ارسال
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">گفتگو با مشتریان</h5>
                    </div>
                    <div class="card-body">
                        <div class="chat-detail order-chat-detail mb-0">
                            <div class="chat-body">
                                <div class="chat-day text-center mb-3">
                                    <span class="badge badge-secondary">امروز</span>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>سلام!</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:18 ب.ظ<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-left">
                                    <div class="chat-message-text">
                                        <span>بله، آقا</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:20 ب.ظ<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>برنامه‌ریزی جلسه دمو.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:25 ب.ظ<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>


                                <div class="chat-message chat-message-left">
                                    <div class="chat-message-text">
                                        <span>حتماً، انجام می‌دهم.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:27 ب.ظ<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>عالی. ممنون</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:30 ب.ظ<i class="feather icon-clock ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-left">
                                    <div class="chat-message-text">
                                        <span>کامل شد.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:20 ب.ظ<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>


                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>لطفاً، برایم ارسال کنید.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:25 ب.ظ<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-left">
                                    <div class="chat-message-text">
                                        <span>حتماً، به شما ایمیل می‌کنم.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:27 ب.ظ<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>خوب، فهمیدم.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:30 ب.ظ<i class="feather icon-clock ml-2"></i></span>
                                    </div>
                                </div>

                            </div>
                            <div class="chat-bottom px-0 pb-0">
                                <div class="chat-messagebar">
                                    <form>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-secondary-rgba" type="button"
                                                        id="button-addonmic"><i class="feather icon-mic"></i></button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="پیامی بنویسید..."
                                                   aria-label="Text">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary-rgba" type="submit"
                                                        id="button-addonlink"><i class="feather icon-link"></i></button>
                                                <button class="btn btn-primary-rgba" type="button"
                                                        id="button-addonsend"><i class="feather icon-send"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">دانلودها</h5>
                    </div>
                    <div class="card-body">
                        <p>
                            <button type="button" class="btn btn-primary-rgba my-1"><i
                                    class="feather icon-file ml-2"></i>فاکتور
                            </button>
                        </p>
                        <p>
                            <button type="button" class="btn btn-info-rgba my-1"><i class="feather icon-box ml-2"></i>سیاهه
                                بسته‌بندی
                            </button>
                        </p>
                        <p>
                            <button type="button" class="btn btn-success-rgba my-1"><i
                                    class="feather icon-gift ml-2"></i>جزئیات بسته‌بندی هدیه
                            </button>
                        </p>
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
    <!-- eCommerce Order Detail Page js -->
    <script src="{{ asset('/assets/manage/js/custom/custom-ecommerce-order-detail-page.js') }}"></script>
@endsection
