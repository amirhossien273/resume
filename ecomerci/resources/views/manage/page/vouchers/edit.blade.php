@section('title')
     ثبت تخفیف 
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
                        <h5 class="card-title">ثبت تخفیف  جدید</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle"></h6>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('manage.vouchers.update', $voucher->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="title">عنوان تخفیف</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $voucher->title }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="code">کد تخفیف</label>
                                    <input type="text" class="form-control" id="code" name="code" value="{{ $voucher->code }}" required disabled>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="content">توضیحات تخفیف</label>
                                    <textarea class="form-control" id="content" name="content">{{ $voucher->content }}</textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="start_at">تاریخ شروع</label>
                                    <input type="text" class="form-control" id="start_at" name="start_at" value="{{ \Morilog\Jalali\Jalalian::fromFormat('Y-m-d H:i:s', $voucher->start_at)->toCarbon()->format('Y-m-d')  }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="end_at">تاریخ پایان</label>
                                    <input type="text" class="form-control" id="end_at" name="end_at" value="{{ \Morilog\Jalali\Jalalian::fromFormat('Y-m-d H:i:s', $voucher->end_at)->toCarbon()->format('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="discount_price">مقدار تخفیف (واحد تومان)</label>
                                    <input type="number" step="0.01" class="form-control" id="discount_price" name="discount_price" value="{{ $voucher->discount_price }}" onchange="toggleDiscountFields()">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="discount_percent">درصد تخفیف</label>
                                    <input type="number" class="form-control" id="discount_percent" name="discount_percent" value="{{ $voucher->discount_percent }}" min="0" max="100" onchange="toggleDiscountFields()">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="usage_limit">محدودیت استفاده</label>
                                    <input type="number" class="form-control" id="usage_limit" name="usage_limit" value="{{ $voucher->usage_limit }}" min="1" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="min_cart_price">حداقل مبلغ خرید</label>
                                    <input type="number" step="0.01" class="form-control" id="min_cart_price" name="min_cart_price" value="{{ $voucher->min_cart_price }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="max_discount">سقف تخفیف</label>
                                    <input type="number" step="0.01" class="form-control" id="max_discount" name="max_discount" value="{{ $voucher->max_discount }}">
                                </div>
                                <div class="col-12 row">
                                    <div class="col-md-4 mb-3">
                                        <label for="is_reusable">قابل استفاده مجدد</label>
                                        <input type="checkbox" class="form-control" id="is_reusable" name="is_reusable" value="1" {{ $voucher->is_reusable ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="is_first_order">برای اولین سفارش</label>
                                        <input type="checkbox" class="form-control" id="is_first_order" name="is_first_order" value="1" {{ $voucher->is_first_order ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-primary" type="submit">ویرایش تخفیف</button>
                                </div>
                            </div>
                        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css " rel="stylesheet">

    <script>
        function toggleDiscountFields() {
            const discountPrice = document.getElementById('discount_price');
            const discountPercent = document.getElementById('discount_percent');
    
            if (discountPrice.value && !discountPercent.value) {
                discountPercent.disabled = true;
            } else if (discountPercent.value && !discountPrice.value) {
                discountPrice.disabled = true;
            } else {
                discountPrice.disabled = false;
                discountPercent.disabled = false;
            }
        }
    
        // In case the page is reloaded with some prefilled values
        window.onload = toggleDiscountFields;

        document.addEventListener('DOMContentLoaded', function () {
        $('#start_at').persianDatepicker({
            format: 'YYYY/MM/DD',
            observer: true,
            altField: '#start_at',
            altFormat: 'YYYY-MM-DD'
        });

        $('#end_at').persianDatepicker({
            format: 'YYYY/MM/DD',
            observer: true,
            altField: '#end_at',
            altFormat: 'YYYY-MM-DD'
        });
    });
    </script>

@endsection
