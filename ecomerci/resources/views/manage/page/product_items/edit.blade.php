@section('title')
    ویرایش محصول
@endsection
@extends('manage.layout.app')
@section('style')
    <style>
        .widgetbar{
            text-align: left;
        }
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
                        <h5 class="card-title">ویرایش محصول </h5>
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
                        <form method="POST" action="{{ route('manage.product_items.update', $productItem->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="product_id" name="product_id" value="{{ $productItem->product_id }}">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="price">قیمت</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="قیمت" value="{{ old('price', $productItem->price) }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="price">قیمت خط خورده</label>
                                    <input type="number" class="form-control" id="strikethrough_price" name="strikethrough_price" placeholder="قیمت" value="{{ old('strikethrough_price', $productItem->strikethrough_price) }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="quantity">تعداد</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="تعداد" value="{{ old('quantity', $productItem->quantity) }}" required>
                                </div>
                                {{-- <div class="col-md-4 mb-3">
                                    <label for="consign_quantity">تعداد امانی</label>
                                    <input type="number" class="form-control" id="consign_quantity" name="consign_quantity" placeholder="تعداد امانی" value="{{ old('consign_quantity', $productItem->consign_quantity) }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="total_quantity">تعداد کل</label>
                                    <input type="number" class="form-control" id="total_quantity" name="total_quantity" placeholder="تعداد کل" value="{{ old('total_quantity', $productItem->total_quantity) }}">
                                </div> --}}
                                <div class="col-md-4 mb-3">
                                    <label for="max_basket_limit">حداکثر محدودیت سبد</label>
                                    <input type="number" class="form-control" id="max_basket_limit" name="max_basket_limit" placeholder="حداکثر محدودیت سبد" value="{{ old('max_basket_limit', $productItem->max_basket_limit) }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="box">ظرف</label>
                                    <input type="text" class="form-control" id="box" name="box" placeholder="ظرفی که برای بسته بندی استفاده می شود" value="{{ old('box', $productItem->box) }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <input type="hidden" name="is_available" value="0">
                                    <input type="checkbox" class="form-check-input" id="is_available" name="is_available" {{ old('is_available', $productItem->is_available) ? 'checked' : '' }} value="1">

                                    <label class="mr-3" for="is_available">موجود</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="hidden" name="is_new" value="0">
                                    <input type="checkbox" class="form-check-input" id="is_new" name="is_new" {{ old('is_new', $productItem->is_new) ? 'checked' : '' }} value="1">

                                    <label class="mr-3" for="is_new">جدید</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="hidden" name="is_best_seller" value="0">
                                    <input type="checkbox" class="form-check-input" id="is_best_seller" name="is_best_seller" {{ old('is_best_seller', $productItem->is_best_seller) ? 'checked' : '' }} value="1">

                                    <label class="mr-3" for="is_best_seller">پرفروش</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="hidden" name="is_on_sale" value="0">
                                    <input type="checkbox" class="form-check-input" id="is_on_sale" name="is_on_sale" {{ old('is_on_sale', $productItem->is_on_sale) ? 'checked' : '' }} value="1">

                                    <label class="mr-3" for="is_on_sale">حراج</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="hidden" name="is_special" value="0">
                                    <input type="checkbox" class="form-check-input" id="is_special" name="is_special" {{ old('is_special', $productItem->is_special) ? 'checked' : ''}} value="1" >

                                    <label class="mr-3" for="is_on_sale">ویژه</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="state_enum">وضعیت</label>
                                    <select class="form-control" id="state_enum" name="state_enum" required>
                                        <option value="DRAFT" {{ old('state_enum', $productItem->state_enum) == 'DRAFT' ? 'selected' : '' }}>پیش‌نویس</option>
                                        <option value="PENDING" {{ old('state_enum', $productItem->state_enum) == 'PENDING' ? 'selected' : '' }}>در انتظار تایید</option>
                                        <option value="APPROVED" {{ old('state_enum', $productItem->state_enum) == 'APPROVED' ? 'selected' : '' }}>تایید شده</option>
                                        <option value="REJECTED" {{ old('state_enum', $productItem->state_enum) == 'REJECTED' ? 'selected' : '' }}>رد شده</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="show_order">الویت نمایش</label>
                                    <input type="number" class="form-control" id="show_order" name="show_order" placeholder="الویت نمایش" value="{{ old('show_order', $productItem->show_order) }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="variation_ids">تنوع‌ها</label>
                                    <select multiple class="form-control" id="variation_ids" name="variation_ids[]">
                                        @foreach($variations as $variation)
                                            @foreach ($variation->variationOptions as $variationOption)
                                                <option value="{{ $variationOption->id }}" {{ in_array($variationOption->id, old('variation_ids', $productItem->variationOptions->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                    {{ $variation->title }} > {{ $variationOption->title }}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">ویرایش محصول</button>
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
@endsection
