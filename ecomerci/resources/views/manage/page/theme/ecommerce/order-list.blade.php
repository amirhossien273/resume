@section('title')
    لیست سفارش‌ها
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
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">همه سفارش‌ها</h5>
                            </div>
                            <div class="col-6">
                                <ul class="list-inline-group text-left mb-0 pl-0">
                                    <li class="list-inline-item">
                                        <div class="form-group mb-0 amount-spent-select">
                                            <select class="form-control" id="formControlSelect">
                                                <option>همه</option>
                                                <option>هفته گذشته</option>
                                                <option>ماه گذشته</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>شناسه</th>
                                    <th>فاکتور</th>
                                    <th>نام</th>
                                    <th>تاریخ</th>
                                    <th>مجموع</th>
                                    <th>انبار</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">#o2599</th>
                                    <td>11</td>
                                    <td>ایمی آدامز</td>
                                    <td>06/02/2019</td>
                                    <td>۱٬۹۵٬۰۰۰ دلار</td>
                                    <td>بوستون</td>
                                    <td><span class="badge badge-primary-inverse">در حال پردازش</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-order-detail" class="btn btn-primary-rgba"><i
                                                    class="feather icon-file"></i></a>
                                            <a href="page-order-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-order-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2600</th>
                                    <td>12</td>
                                    <td>شیوا راده‌آرامن</td>
                                    <td>06/01/2019</td>
                                    <td>۸۵٬۰۰۰ دلار</td>
                                    <td>واشنگتن دی‌سی</td>
                                    <td><span class="badge badge-secondary-inverse">ارسال شده</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-order-detail" class="btn btn-primary-rgba"><i
                                                    class="feather icon-file"></i></a>
                                            <a href="page-order-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-order-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2601</th>
                                    <td>13</td>
                                    <td>رایان اسمیت</td>
                                    <td>05/28/2019</td>
                                    <td>۷۰٬۰۰۰ دلار</td>
                                    <td>سان فرانسیسکو</td>
                                    <td><span class="badge badge-success-inverse">تکمیل شده</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-order-detail" class="btn btn-primary-rgba"><i
                                                    class="feather icon-file"></i></a>
                                            <a href="page-order-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-order-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2602</th>
                                    <td>14</td>
                                    <td>جیمز ویترسپون</td>
                                    <td>05/21/2019</td>
                                    <td>۱٬۲۵٬۰۰۰ دلار</td>
                                    <td>لاس وگاس</td>
                                    <td><span class="badge badge-warning-inverse">بازپرداخت شده</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-order-detail" class="btn btn-primary-rgba"><i
                                                    class="feather icon-file"></i></a>
                                            <a href="page-order-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-order-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2603</th>
                                    <td>15</td>
                                    <td>کورنی بری</td>
                                    <td>05/17/2019</td>
                                    <td>۱٬۳۰٬۰۰۰ دلار</td>
                                    <td>لس آنجلس</td>
                                    <td><span class="badge badge-danger-inverse">لغو شده</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-order-detail" class="btn btn-primary-rgba"><i
                                                    class="feather icon-file"></i></a>
                                            <a href="page-order-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-order-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2604</th>
                                    <td>16</td>
                                    <td>لیزا پری</td>
                                    <td>05/12/2019</td>
                                    <td>۱٬۵۰٬۰۰۰ دلار</td>
                                    <td>شیکاگو</td>
                                    <td><span class="badge badge-info-inverse">تحویل داده شده</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-order-detail" class="btn btn-primary-rgba"><i
                                                    class="feather icon-file"></i></a>
                                            <a href="page-order-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-order-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2605</th>
                                    <td>17</td>
                                    <td>جان دو</td>
                                    <td>05/01/2019</td>
                                    <td>۵٬۰۰۰ دلار</td>
                                    <td>نیویورک</td>
                                    <td><span class="badge badge-success-inverse">تکمیل شده</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-order-detail" class="btn btn-primary-rgba"><i
                                                    class="feather icon-file"></i></a>
                                            <a href="page-order-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-order-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
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

@endsection
