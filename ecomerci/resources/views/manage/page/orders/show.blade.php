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
        @media print{
            .widgetbar{
                display: none;
            }
            .menubar{
                display: none;
            }
            .logobar{
                display: none;
            }
            .topbar{
                display: none;
            }
            .sidebar{
                display: none;
            }
            .rightbar {
                margin: 0 !important;
            }
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
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <form action="{{ route('manage.orders.change', $order->id) }}" method="POST" >
                                        @csrf
                                        <input name="state" type="hidden"
                                            @if($order->state_enum === "INITIALIZED")
                                                value="READY_TO_SHIP"
                                            @elseif($order->state_enum === "READY_TO_SHIP")
                                                value="SHIPPED"
                                            @endif
                                        />
                                        @if($order->state_enum === "READY_TO_SHIP")
                                           <input placeholder="کد پستی را وارد کنید." name="ship_code" type="text" value=""  class="form-control m-3" />
                                        @endif
                                        @if($order->state_enum === "INITIALIZED" || $order->state_enum === "READY_TO_SHIP")
                                        <input  type="submit" class="btn btn-primary-rgba"
                                            @if($order->state_enum === "INITIALIZED")
                                               value="آماده سازی سفارش"
                                            @elseif($order->state_enum === "READY_TO_SHIP")
                                               value="ارسال سفارش"
                                            @endif
                                        />
                                        @endif
                                        <button type="button" class="btn btn-primary-rgba" onclick="window.print()">پرینت</button>
                                    </form>
                               </div>
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
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>مشخصات سفارش</h3>
                                    <div>
                                        <span>کد سفارش:</span>
                                        <span style="font-weight: bold;">{{ $order->id }}</span>
                                    </div>
                                    <div>
                                        <span>وضعیت:</span>
                                        <span style="font-weight: bold;">{{ $order->state }}</span>
                                    </div>
                                    <div>
                                        <span>تاریح:</span>
                                        <span style="font-weight: bold;">{{ $order->created_at }}</span>
                                    </div>
                                    <div>
                                        <span>کاربر:</span>
                                        <span style="font-weight: bold;">{{ $order->creator->first_name }} {{ $order->creator->last_name }} - {{ $order->creator->phone }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <span>گیرنده:</span>
                                        <span style="font-weight: bold;">{{ $order->address->first_name }} {{ $order->address->last_name }}</span>
                                    </div>
                                    <div>
                                        <span>شهر:</span>
                                        <span style="font-weight: bold;">{{ $order->address->city->province->title }} - {{ $order->address->city->title }}</span>
                                    </div>
                                    <div>
                                        <span>آدرس:</span>
                                        <span style="font-weight: bold;">{{ $order->address->content }}</span>
                                    </div>
                                    <div>
                                        <span>کد پستی:</span>
                                        <span style="font-weight: bold;">{{ $order->address->postal_code }}</span>
                                    </div>
                                    <div>
                                        <span>تلفن:</span>
                                        <span style="font-weight: bold;">{{ $order->address->phone }}</span>
                                    </div>
                                    <div>
                                        <span>موبایل:</span>
                                        <span style="font-weight: bold;">{{ $order->address->mobile }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" >
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th class="sidebar">عکس</th>
                                    <th>نام کالا</th>
                                    <th>تنوع</th>
                                    <th>تعداد</th>
                                    <th>قیمت</th>
                                    <th>ظرف</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td class="sidebar" ><img src="{{ $item->product_images[0] }}" alt="{{ $item->product_title }}" width="100"></td>
                                            <td>{{ $item->product_title }}</td>
                                            <td>
                                                @foreach($item->product->variationOptions as $variationOption)
                                                  <p>{{ $variationOption->variation->title }}: {{ $variationOption->title }}</p>
                                                @endforeach
                                            </td>
                                            <td>{{ $item->product_total_price }}</td>
                                            <td>{{ $item->product_unit_price }}</td>
                                            <td>{{ $item->product?->box }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                          <h3>پرداخت</h3>
                          <div class="col-md-12 row">
                            <div class="col-md-6">
                                <img style="width: 150px;height: 100px;"  class="sidebar" src="{{url('assets/front/imgs/theme/behpardakht_logo.svg')}}" alt=""/>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <span> تاریخ پرداخت:</span>
                                <span style="font-weight: bold;">{{ \Morilog\Jalali\Jalalian::fromDateTime($order->transaction->succeeded_at)->format('Y/m/d H:i')}}</span>
                            </div>
                            <div class="col-md-12">
                                <span> کد پیگیری:</span>
                                <span style="font-weight: bold;">{{ $order->transaction->ref_number}}</span>
                            </div>
                            <div class="col-md-12">
                                <span> کارت :</span>
                                <span style="font-weight: bold;">{{ $order->transaction->card_code}}</span>
                            </div>
                            <div class="col-md-12">
                                <span>مبلغ :</span>
                                <span style="font-weight: bold;">{{ number_format($order->transaction->price)}}</span>
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
    <!-- Tabledit js -->
    <script src="{{ asset('/assets/manage/plugins/tabledit/jquery.tabledit.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-table-editable.js') }}"></script>
@endsection
