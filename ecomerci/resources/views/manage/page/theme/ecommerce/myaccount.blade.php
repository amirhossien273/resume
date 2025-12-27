@section('title')
    حساب کاربری من
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
            <div class="col-lg-5 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">حساب کاربری من</h5>
                    </div>
                    <div class="card-body">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link mb-2 active" id="v-pills-dashboard-tab" data-toggle="pill"
                               href="#v-pills-dashboard"
                               role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i
                                    class="feather icon-grid ml-2 mt-1 float-right"></i>داشبورد</a>
                            <a class="nav-link mb-2" id="v-pills-order-tab" data-toggle="pill" href="#v-pills-order"
                               role="tab" aria-controls="v-pills-order" aria-selected="false"><i
                                    class="feather icon-package ml-2 mt-1 float-right"></i>سفارش‌های من</a>
                            <a class="nav-link mb-2" id="v-pills-addresses-tab" data-toggle="pill"
                               href="#v-pills-addresses"
                               role="tab" aria-controls="v-pills-addresses" aria-selected="false"><i
                                    class="feather icon-map-pin ml-2 mt-1 float-right"></i>آدرس‌های من</a>
                            <a class="nav-link mb-2" id="v-pills-wishlist-tab" data-toggle="pill"
                               href="#v-pills-wishlist"
                               role="tab" aria-controls="v-pills-wishlist" aria-selected="false"><i
                                    class="feather icon-heart ml-2 mt-1 float-right"></i>لیست علاقه‌مندی‌ها</a>
                            <a class="nav-link mb-2" id="v-pills-wallet-tab" data-toggle="pill" href="#v-pills-wallet"
                               role="tab" aria-controls="v-pills-wallet" aria-selected="true"><i
                                    class="feather icon-credit-card ml-2 mt-1 float-right"></i>کیف‌پول</a>
                            <a class="nav-link mb-2" id="v-pills-chat-tab" data-toggle="pill" href="#v-pills-chat"
                               role="tab" aria-controls="v-pills-chat" aria-selected="false"><i
                                    class="feather icon-message-circle ml-2 mt-1 float-right"></i>گفت‌وگوهای من</a>
                            <a class="nav-link mb-2" id="v-pills-notifications-tab" data-toggle="pill"
                               href="#v-pills-notifications"
                               role="tab" aria-controls="v-pills-notifications" aria-selected="false"><i
                                    class="feather icon-bell ml-2 mt-1 float-right"></i>اعلان‌ها</a>
                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                               role="tab" aria-controls="v-pills-profile" aria-selected="false"><i
                                    class="feather icon-user ml-2 mt-1 float-right"></i>پروفایل من</a>
                            <a class="nav-link" id="v-pills-logout-tab" data-toggle="pill" href="#v-pills-logout"
                               role="tab" aria-controls="v-pills-logout" aria-selected="false"><i
                                    class="feather icon-log-out ml-2 mt-1 float-right"></i>خروج</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-7 col-xl-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Dashboard Start -->
                    <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                         aria-labelledby="v-pills-dashboard-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">داشبورد</h5>
                            </div>
                            <div class="card-body">
                                <div class="profilebox py-4 text-center">
                                    <img src="/assets/manage/images/users/profile.svg" class="img-fluid mb-3"
                                         alt="پروفایل">
                                    <div class="profilename">
                                        <h5>جان دو</h5>
                                        <p class="text-muted my-3"><a href="my-account"><i
                                                    class="feather icon-edit-2 ml-2"></i>ویرایش پروفایل</a></p>
                                    </div>
                                    <div class="button-list">
                                        <a href="#" class="btn btn-primary-rgba font-18"><i
                                                class="feather icon-facebook"></i></a>
                                        <a href="#" class="btn btn-info-rgba font-18"><i
                                                class="feather icon-twitter"></i></a>
                                        <a href="#" class="btn btn-danger-rgba font-18"><i
                                                class="feather icon-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ردیف شروع -->
                        <div class="row">
                            <!-- ستون شروع -->
                            <div class="col-lg-12 col-xl-4">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <div class="ecom-dashboard-widget">
                                            <div class="media">
                                                <i class="feather icon-package"></i>
                                                <div class="media-body">
                                                    <h5>سفارش‌های من</h5>
                                                    <p>در انتظار (3)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ستون پایان -->
                            <!-- ستون شروع -->
                            <div class="col-lg-12 col-xl-4">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <div class="ecom-dashboard-widget">
                                            <div class="media">
                                                <i class="feather icon-heart"></i>
                                                <div class="media-body">
                                                    <h5>لیست علاقه‌مندی‌ها</h5>
                                                    <p>موارد (7)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ستون پایان -->
                            <!-- ستون شروع -->
                            <div class="col-lg-12 col-xl-4">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <div class="ecom-dashboard-widget">
                                            <div class="media">
                                                <i class="feather icon-credit-card"></i>
                                                <div class="media-body">
                                                    <h5>کیف‌پول من</h5>
                                                    <p>موجودی ($25)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ستون پایان -->
                        </div>
                        <!-- ردیف پایان -->
                    </div>
                    <!-- Dashboard End -->
                    <!-- My Orders Start -->
                    <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">سفارش‌های من</h5>
                            </div>
                            <div class="card-body">
                                <div class="order-box">
                                    <div class="card border m-b-30">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-sm-6">
                                                    <h5>شناسه : #26598</h5>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0 text-left">مجموع : <strong>$500</strong></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">عکس</th>
                                                        <th scope="col">محصول</th>
                                                        <th scope="col">تعداد</th>
                                                        <th scope="col">قیمت</th>
                                                        <th scope="col" class="text-left">مجموع</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><img src="/assets/manage/images/ecommerce/product_01.svg"
                                                                 class="img-fluid" width="35" alt="محصول"></td>
                                                        <td>ساعت اپل</td>
                                                        <td>1</td>
                                                        <td>$100</td>
                                                        <td class="text-left">$100</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td><img src="/assets/manage/images/ecommerce/product_02.svg"
                                                                 class="img-fluid" width="35" alt="محصول"></td>
                                                        <td>آیفون اپل</td>
                                                        <td>2</td>
                                                        <td>$200</td>
                                                        <td class="text-left">$400</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row align-items-center">
                                                <div class="col-sm-6">
                                                    <h5>وضعیت : <span
                                                            class="badge badge-info-inverse font-14">ارسال شده</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0 text-left">
                                                        <button class="btn btn-success-rgba font-16"><i
                                                                class="feather icon-file ml-2"></i>صورتحساب
                                                        </button>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-box">
                                    <div class="card border m-b-30">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-sm-6">
                                                    <h5>شناسه : #26597</h5>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0 text-left">مجموع : <strong>$100</strong></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">عکس</th>
                                                        <th scope="col">محصول</th>
                                                        <th scope="col">تعداد</th>
                                                        <th scope="col">قیمت</th>
                                                        <th scope="col" class="text-left">مجموع</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><img src="/assets/manage/images/ecommerce/product_01.svg"
                                                                 class="img-fluid" width="35" alt="محصول"></td>
                                                        <td>تبلت اپل</td>
                                                        <td>1</td>
                                                        <td>$100</td>
                                                        <td class="text-left">$100</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row align-items-center">
                                                <div class="col-sm-6">
                                                    <h5>وضعیت : <span class="badge badge-primary-inverse font-14">تحویل داده شده</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0 text-left">
                                                        <button class="btn btn-success-rgba font-16"><i
                                                                class="feather icon-file ml-2"></i>صورتحساب
                                                        </button>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Orders End -->
                    <!-- My Addresses Start -->
                    <div class="tab-pane fade" id="v-pills-addresses" role="tabpanel"
                         aria-labelledby="v-pills-addresses-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">آدرس‌های من</h5>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="address-box">
                                            <div class="card border m-b-30">
                                                <div class="card-body text-center py-5">
                                                    <p>
                                                        <button type="button" class="btn btn-round btn-success-rgba"><i
                                                                class="feather icon-plus"></i></button>
                                                    </p>
                                                    <h5 class="mt-4 mb-0">افزودن آدرس جدید</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="address-box">
                                            <div class="card border m-b-30">
                                                <div class="card-header">
                                                    <h5 class="mb-0">آمی آدامز</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p>+1 9876543210</p>
                                                    <p>خیابان کارگر شمالی، پلاک 123، طبقه 2، واحد 5، تهران، ایران</p>
                                                    <p class="mb-0">demo@example.com</p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="button-list">
                                                        <button type="button"
                                                                class="btn btn-round btn-success-rgba mb-1"><i
                                                                class="feather icon-edit-2"></i></button>
                                                        <button type="button"
                                                                class="btn btn-round btn-danger-rgba mb-1"><i
                                                                class="feather icon-trash"></i></button>
                                                        <button type="button" class="btn btn-primary-rgba font-16 mb-0">
                                                            پیش‌فرض
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="address-box">
                                            <div class="card border m-b-30">
                                                <div class="card-header">
                                                    <h5 class="mb-0">آمی آدامز</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p>+1 9876543210</p>
                                                    <p>خیابان کارگر شمالی، پلاک 123، طبقه 2، واحد 5، تهران، ایران</p>
                                                    <p class="mb-0">demo@example.com</p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="button-list">
                                                        <button type="button"
                                                                class="btn btn-round btn-success-rgba mb-1"><i
                                                                class="feather icon-edit-2"></i></button>
                                                        <button type="button"
                                                                class="btn btn-round btn-danger-rgba mb-1"><i
                                                                class="feather icon-trash"></i></button>
                                                        <button type="button"
                                                                class="btn btn-secondary-rgba font-16 mb-0">تبدیل به
                                                            پیش‌فرض
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Addresses End -->
                    <!-- My Wishlist Start -->
                    <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel"
                         aria-labelledby="v-pills-wishlist-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">لیست علاقه‌مندی‌های من</h5>
                            </div>
                            <div class="card-body">
                                <div class="wishlist-box">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">عکس</th>
                                                <th scope="col">محصول</th>
                                                <th scope="col">تعداد</th>
                                                <th scope="col">قیمت</th>
                                                <th scope="col">مجموع</th>
                                                <th scope="col">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><img src="/assets/manage/images/ecommerce/product_01.svg"
                                                         class="img-fluid" width="35" alt="محصول"></td>
                                                <td>ساعت اپل</td>
                                                <td>
                                                    <div class="form-group mb-0">
                                                        <input type="number" class="form-control cart-qty"
                                                               name="cartQty1" id="cartQty1" value="1">
                                                    </div>
                                                </td>
                                                <td>$10</td>
                                                <td>$500</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary-rgba mb-1 ml-1"><i
                                                            class="feather icon-shopping-cart"></i></button>
                                                    <button type="button" class="btn btn-danger-rgba mb-1"><i
                                                            class="feather icon-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td><img src="/assets/manage/images/ecommerce/product_02.svg"
                                                         class="img-fluid" width="35" alt="محصول"></td>
                                                <td>آیفون اپل</td>
                                                <td>
                                                    <div class="form-group mb-0">
                                                        <input type="number" class="form-control cart-qty"
                                                               name="cartQty2" id="cartQty2" value="1">
                                                    </div>
                                                </td>
                                                <td>$20</td>
                                                <td>$200</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary-rgba mb-1 ml-1"><i
                                                            class="feather icon-shopping-cart"></i></button>
                                                    <button type="button" class="btn btn-danger-rgba mb-1"><i
                                                            class="feather icon-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td><img src="/assets/manage/images/ecommerce/product_03.svg"
                                                         class="img-fluid" width="35" alt="محصول"></td>
                                                <td>تبلت اپل</td>
                                                <td>
                                                    <div class="form-group mb-0">
                                                        <input type="number" class="form-control cart-qty"
                                                               name="cartQty3" id="cartQty3" value="1">
                                                    </div>
                                                </td>
                                                <td>$30</td>
                                                <td>$300</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary-rgba mb-1 ml-1"><i
                                                            class="feather icon-shopping-cart"></i></button>
                                                    <button type="button" class="btn btn-danger-rgba mb-1"><i
                                                            class="feather icon-trash"></i></button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Wishlist End -->
                    <!-- My Wallet Start -->
                    <div class="tab-pane fade" id="v-pills-wallet" role="tabpanel" aria-labelledby="v-pills-wallet-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">کیف پول من</h5>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <img src="/assets/manage/images/ecommerce/wallet.svg" class="img-fluid"
                                             alt="کیف پول">
                                    </div>
                                </div>
                                <div class="wallet-box">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <h4 class="text-primary"><i class="feather icon-credit-card ml-2"></i>$45
                                                <span class="font-14">موجودی</span></h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="mb-0 text-left">
                                                <button class="btn btn-success-rgba font-16"><i
                                                        class="feather icon-plus ml-2"></i>افزودن وجه
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h5 class="card-title mb-0">تراکنش‌ها</h5>
                                    </div>
                                    <div class="col-4">
                                        <ul class="list-inline-group text-left mb-0 pl-0">
                                            <li class="list-inline-item ml-0 font-12">
                                                <button type="button" class="btn btn-sm btn-primary-rgba px-2">خروجی
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="wallet-transaction-box">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                            <tr>
                                                <th scope="col">شناسه</th>
                                                <th scope="col">نام</th>
                                                <th scope="col">برداشت</th>
                                                <th scope="col">واریز</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">توضیحات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>اپل</td>
                                                <td>$1,85,000</td>
                                                <td>-</td>
                                                <td><span class="badge badge-success-inverse">موفق</span></td>
                                                <td>شناسه تراکنش: 9875648951</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>دل</td>
                                                <td>-</td>
                                                <td>$2,05,000</td>
                                                <td><span class="badge badge-danger-inverse">رد</span></td>
                                                <td>شناسه تراکنش بانکی: 2458615478</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>HP Care</td>
                                                <td>$5,000</td>
                                                <td>-</td>
                                                <td><span class="badge badge-success-inverse">موفق</span></td>
                                                <td>تعویض باطری</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Wallet End -->
                    <!-- My Chat Start -->
                    <div class="tab-pane fade" id="v-pills-chat" role="tabpanel" aria-labelledby="v-pills-chat-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h5 class="card-title mb-0">گفتگو من</h5>
                                    </div>
                                    <div class="col-4">
                                        <ul class="list-inline-group text-left mb-0 pl-0">
                                            <li class="list-inline-item ml-0 font-12">
                                                <div class="form-group mb-0 amount-spent-select">
                                                    <select class="form-control" id="formControlSelect">
                                                        <option>سفارش #1</option>
                                                        <option>سفارش #2</option>
                                                        <option>سفارش #3</option>
                                                        <option>سفارش #4</option>
                                                    </select>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="chat-detail mb-0">
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
                                                <span>من ۴ مرحله را تکمیل کرده‌ام، ۵ مرحله باقی‌مانده است.</span>
                                            </div>
                                            <div class="chat-message-meta">
                                                <span>۴:۲۰ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="chat-message chat-message-right">
                                            <div class="chat-message-text">
                                                <span>درخواست دارم که برای پیشرفت بهتر یک دمو را ساعت ۳ عصر بعد از ۲ روز برنامه‌ریزی کنید.</span>
                                            </div>
                                            <div class="chat-message-meta">
                                                <span>۴:۲۵ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="chat-message chat-message-left">
                                            <div class="chat-message-text">
                                                <span>مطمئناً، من برای همان موضوع آماده می‌شوم.</span>
                                            </div>
                                            <div class="chat-message-meta">
                                                <span>۴:۲۷ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="chat-message chat-message-right">
                                            <div class="chat-message-text">
                                                <span>عالی. متشکرم</span>
                                            </div>
                                            <div class="chat-message-meta">
                                                <span>۴:۳۰ بعد از ظهر<i class="feather icon-clock ml-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="chat-message chat-message-left">
                                            <div class="chat-message-text">
                                                <span>من ۴ مرحله را تکمیل کرده‌ام، ۵ مرحله باقی‌مانده است.</span>
                                            </div>
                                            <div class="chat-message-meta">
                                                <span>۴:۲۰ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="chat-message chat-message-right">
                                            <div class="chat-message-text">
                                                <span>درخواست دارم که برای پیشرفت بهتر یک دمو را ساعت ۳ عصر بعد از ۲ روز برنامه‌ریزی کنید.</span>
                                            </div>
                                            <div class="chat-message-meta">
                                                <span>۴:۲۵ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="chat-message chat-message-left">
                                            <div class="chat-message-text">
                                                <span>مطمئناً، من برای همان موضوع آماده می‌شوم.</span>
                                            </div>
                                            <div class="chat-message-meta">
                                                <span>۴:۲۷ بعد از ظهر<i class="feather icon-check ml-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="chat-message chat-message-right">
                                            <div class="chat-message-text">
                                                <span>عالی. متشکرم</span>
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
                                                        <button class="btn btn-secondary-rgba" type="button"
                                                                id="button-addonmic">
                                                            <i class="feather icon-mic"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                           placeholder="پیام خود را وارد کنید..."
                                                           aria-label="Text">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-secondary-rgba" type="submit"
                                                                id="button-addonlink">
                                                            <i class="feather icon-link"></i>
                                                        </button>
                                                        <button class="btn btn-primary-rgba" type="button"
                                                                id="button-addonsend">
                                                            <i class="feather icon-send"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Chat End -->
                    <!-- My Notifications Start -->
                    <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel"
                         aria-labelledby="v-pills-notifications-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">اعلان‌ها</h5>
                            </div>
                            <div class="card-body">
                                <div class="ecom-notification-box">
                                    <ul class="list-unstyled">
                                        <li class="media">
                        <span class="ml-3 action-icon badge badge-success-inverse"><i
                                class="feather icon-check"></i></span>
                                            <div class="media-body">
                                                <h5 class="action-title">پرداخت موفقیت‌آمیز !!!</h5>
                                                <p class="my-3">پرداخت شما به حساب تبلیغاتی 9876543210 واریز شده است.
                                                    تبلیغ شما در حال اجراست.</p>
                                                <p><span class="badge badge-danger-inverse">اطلاعات</span><span
                                                        class="badge badge-info-inverse">وضعیت</span><span
                                                        class="timing">امروز، 09:39 بعد از ظهر</span></p>
                                            </div>
                                        </li>
                                        <li class="media">
                        <span class="ml-3 action-icon badge badge-primary-inverse"><i
                                class="feather icon-calendar"></i></span>
                                            <div class="media-body">
                                                <h5 class="action-title">نوبیتا درخواست مرخصی داده است.</h5>
                                                <p class="my-3">نوبیتا به دلایل شخصی در تاریخ 22 فوریه درخواست مرخصی
                                                    داده است.</p>
                                                <p><span class="badge badge-success">تایید</span><span
                                                        class="badge badge-danger">رد</span><span class="timing">دیروز، 05:25 بعد از ظهر</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="media">
                        <span class="ml-3 action-icon badge badge-danger-inverse"><i
                                class="feather icon-alert-triangle"></i></span>
                                            <div class="media-body">
                                                <h5 class="action-title">هشدار</h5>
                                                <p class="my-3">ورودی جدید از حساب شما در ملبورن ثبت شده است. آن را ایمن
                                                    یا گزارش کنید.</p>
                                                <p><i class="feather icon-check text-success ml-3"></i><a href="#"
                                                                                                          class="ml-2">هم‌اکنون
                                                        گزارش دهید</a><span
                                                        class="timing">5 ژانویه 2019، 02:13 بعد از ظهر</span></p>
                                            </div>
                                        </li>
                                        <li class="media">
                        <span class="ml-3 action-icon badge badge-warning-inverse"><i
                                class="feather icon-award"></i></span>
                                            <div class="media-body">
                                                <h5 class="action-title">تبریک می‌گویم !!!</h5>
                                                <p class="my-3">نقش شما در سازمان از ویرایشگر به راهبر استراتژی تغییر
                                                    یافته است.</p>
                                                <p><span class="badge badge-danger-inverse">فعالیت</span><span
                                                        class="timing">10 ژانویه 2019، 08:49 بعد از ظهر</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Notifications End -->
                    <!-- My Profile Start -->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">پروفایل من</h5>
                            </div>
                            <div class="card-body">
                                <div class="profilebox pt-4 text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="btn btn-success-rgba font-18"><i
                                                    class="feather icon-edit"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="/assets/manage/images/users/profile.svg" class="img-fluid"
                                                 alt="پروفایل">
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="btn btn-danger-rgba font-18"><i
                                                    class="feather icon-trash"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">ویرایش اطلاعات پروفایل</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">نام کاربری</label>
                                            <input type="text" class="form-control" id="username">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="useremail">ایمیل</label>
                                            <input type="email" class="form-control" id="useremail">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="usermobile">شماره موبایل</label>
                                            <input type="text" class="form-control" id="usermobile">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="userbirthdate">تاریخ تولد</label>
                                            <input type="date" class="form-control" id="userbirthdate">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="userpassword">رمزعبور</label>
                                            <input type="password" class="form-control" id="userpassword">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="userconfirmedpassword">تأیید رمزعبور</label>
                                            <input type="password" class="form-control" id="userconfirmedpassword">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="usermale" name="usergender"
                                                   class="custom-control-input" checked>
                                            <label class="custom-control-label" for="usermale">مرد</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="userfemale" name="usergender"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="userfemale">زن</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary-rgba font-16"><i
                                            class="feather icon-save ml-2"></i>به‌روزرسانی
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- My Profile End -->
                    <!-- My Logout Start -->
                    <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">خروج</h5>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="logout-content text-center my-5">
                                            <img src="/assets/manage/images/ecommerce/logout.svg" class="img-fluid mb-5"
                                                 alt="خروج">
                                            <h2 class="text-success">خروج؟</h2>
                                            <p class="my-4">آیا مطمئن هستید که می‌خواهید خارج شوید؟ شما قرار است از
                                                تخفیفات فوری خود
                                                غافل شوید.</p>
                                            <div class="button-list">
                                                <button type="button" class="btn btn-danger font-16"><i
                                                        class="feather icon-check ml-2"></i>بله، مطمئنم
                                                </button>
                                                <button type="button" class="btn btn-success-rgba font-16"><i
                                                        class="feather icon-x ml-2"></i>انصراف
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Logout End -->
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- eCommerce My Account Page js -->
    <script src="{{ asset('/assets/manage/js/custom/custom-ecommerce-myaccount.js') }}"></script>
@endsection
