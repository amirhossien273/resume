@section('title')
    سفارشات
@endsection
@extends('manage.layout.app')
@section('style')
    <style>
        .widgetbar{
            text-align: left;
            /*color: #0080ff;*/
        }
        /*.btn-primary-rgba:hover {*/
        /*    color: #ffffff !important;*/
        /*}*/
    </style>
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
                            <div class="col-md-8 col-lg-8">
                                <h5 class="card-title">لیست سفارشات</h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                             
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle"></h6>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>شماره</th>
                                    <th>کاربر</th>
                                    <th>تاریخ ثبت</th>
                                    <th>وضعیت</th>
                                    <th>مبلغ نهایی</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach ($orders as $index => $order)
                                      <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ optional($order->creator)->first_name }} {{ optional($order->creator)->last_name }}</td>
                                        <td style="direction: ltr;">{{ \Morilog\Jalali\Jalalian::fromDateTime($order->created_at)->format('Y/m/d H:i') }}</td>
                                        <td>{{ $order->state }}</td>
                                        <td>{{ $order->final_price }}</td>
                                        <td>
                                            <a href="{{ route('manage.orders.show', $order) }}" class="btn btn-success btn-sm">مشاهده</a>
                                        </td>
                                      </tr>
                                  @endforeach
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
    <!-- Tabledit js -->
    <script src="{{ asset('/assets/manage/plugins/tabledit/jquery.tabledit.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-table-editable.js') }}"></script>
@endsection
