@section('title')
    محصولات برای {{ $product->title }}
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
                        <div class="row align-items-center">
                            <div class="col-md-8 col-lg-8">
                                <h5 class="card-title">لیست محصولات برای {{ $product->title }}</h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <a href="{{route('manage.product_items.create', request()->route('product'))}}" class="btn btn-primary-rgba"><i class="feather icon-plus ml-2"></i>اضافه کردن محصولات {{ $product->title }}</a>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" >
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>شناسه</th>
                                    <th>نام محصول</th>
                                    <th>نام ویژگی</th>
                                    <th>قیمت</th>
                                    <th>تعداد موجود</th>
                                    <th>تعداد فروش</th>
                                    <th>وضعیت</th>
                                    <th>فعال</th>
                                    <th>موجود</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productItems as $key => $productItem)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $productItem->id }}</td>
                                            <td>{{ $productItem->product->title }}</td>
                                            <td>
                                                @foreach($productItem->variationOptions as $variationOption)
                                                   {{ $variationOption->title }}, 
                                                @endforeach
                                            </td>
                                            <td>{{ $productItem->price }}</td>
                                            <td>{{ $productItem->quantity }}</td>
                                            <td>
                                                {{ $orderItem = \App\Models\OrderItem::where('product_item_id', $productItem->id) 
                                                   ->whereIn('state_enum', ['INITIALIZED', 'READY_TO_SHIP'])
                                                   ->sum('requested_quantity') }}
                                            </td>
                                            <td>{{ $productItem->state_enum }}</td>
                                            <td>{{ $productItem->is_active ? 'نمایش' : 'عدم نمایش' }}</td>
                                            <td>{{ $productItem->is_available ? 'بله' : 'خیر' }}</td>
                                            <td>
                                                <a href="{{ route('manage.product_items.toggleActive', $productItem) }}" class="btn {{ $productItem->is_active ? 'btn-danger ' : 'btn-success ' }}btn-sm">
                                                    @if ($productItem->is_active)
                                                       عدم نمایش <i class='fa fa-lock'></i>
                                                     @else   
                                                     نمایش <i class='fa fa-unlock-alt'></i>
                                                    @endif 
                                                </a>
                                                <a href="{{ route('manage.product_items.edit', $productItem->id) }}" class="btn btn-primary btn-sm">ویرایش <i class="fa fa-edit"></i></a>
                                                <form action="{{ route('manage.product_items.destroy', $productItem->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟')">حذف <i class="fa fa-remove"></i></button>
                                                </form>
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
