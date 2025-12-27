@section('title')
    محصولات
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
                                <h5 class="card-title">لیست محصولات</h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <a href="{{route('manage.products.create')}}" class="btn btn-primary-rgba"><i class="feather icon-plus ml-2"></i>اضافه کردن محصولات</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle"></h6>
                        <form method="GET" action="{{ route('manage.products.index') }}" class="mb-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="جستجو بر اساس نام محصول">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">جستجو</button>
                                </div>
                            </div>
                        </form>
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
                                    <th>slug</th>
                                    <th>وضعیت</th>
                                    {{-- <th>فعال</th> --}}
                                    {{-- <th>الویت نمایش</th> --}}
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->slug }}</td>
                                            <td>{{ $product->state_enum }}</td>
                                            {{-- <td>{{ $product->is_active ? 'نمایش' : 'عدم نمایش' }}</td> --}}
                                            {{-- <td>{{ $product->show_order }}</td> --}}
                                            <td>
                                                <a href="{{ route('manage.products.toggleActive', $product) }}" class="btn {{ $product->is_active ? 'btn-danger ' : 'btn-success ' }}btn-sm">
                                                    @if ($product->is_active)
                                                       عدم نمایش <i class='fa fa-lock'></i>
                                                     @else   
                                                     نمایش <i class='fa fa-unlock-alt'></i>
                                                    @endif 
                                                </a>
                                                <a href="{{ route('manage.products.toggleShowFirstPage', $product) }}" class="btn {{ $product->is_show_first_page ? 'btn-danger ' : 'btn-success ' }}btn-sm">
                                                    @if ($product->is_show_first_page)
                                                        نمایش صفحه اول
                                                     @else   
                                                     عدم نمایش صفحه اول
                                                    @endif 
                                                </a>
                                                <a href="{{ route('manage.products.edit', $product->id) }}" class="btn btn-primary btn-sm">ویرایش <i class="fa fa-edit"></i></a>
                                                <form action="{{ route('manage.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟')">حذف <i class="fa fa-remove"></i></button>
                                                </form>
                                                <a href="{{route('manage.product_items.index', $product->id)}}" class="btn btn-primary btn-sm">ویژگی ها <i class="fa fa-external-link"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination with Bootstrap style -->
                        <div class="pagination-wrapper">
                            {{ $products->links('pagination::bootstrap-4') }}
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
