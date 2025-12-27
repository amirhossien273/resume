@section('title')
 ویژگی {{ $variation->title }}
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
                                <h5 class="card-title">لیست  گزینه ویژگی برای {{ $variation->title }}</h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <a href="{{ route('manage.variation_options.create', request()->route('variation')) }}" class="btn btn-primary-rgba"><i class="feather icon-plus ml-2"></i>اضافه کردن ویژگی برای {{ $variation->title }}</a>
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
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>نام</th>
                                    <th>تاریخ ثبت</th>
                                    <th>وضعیت</th>
                                    <th>ایجاد شده</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($variationOptions as $key => $variation_option)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $variation_option->title }}</td>
                                            <td style="direction: ltr;">{{ \Morilog\Jalali\Jalalian::fromDateTime($variation_option->created_at)->format('Y/m/d H:i') }}</td>
                                            <td>{{ $variation_option->is_active ? 'نمایش' : 'عدم نمایش' }}</td>
                                            <td>{{ $variation_option->creator->last_name }} {{ $variation_option->creator->first_name }}</td>
                                            <td>
                                                <a href="{{ route('manage.variations.toggleActive', $variation_option) }}" class="btn {{ $variation_option->is_active ? 'btn-danger ' : 'btn-success ' }}btn-sm">
                                                    @if ($variation_option->is_active)
                                                       عدم نمایش <i class='fa fa-lock'></i>
                                                     @else   
                                                     نمایش <i class='fa fa-unlock-alt'></i>
                                                    @endif 
                                                </a>
                                                <form action="{{ route('manage.variation_options.destroy', $variation_option->id) }}" method="POST" style="display:inline" onsubmit="return confirm('آیا میخواهید حالتگزینه ها مورد نظر حذف شود؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف دسته بندی <i class="fa fa-remove"></i></button>
                                                </form>
                                                <a href="{{route('manage.variation_options.edit', $variation_option->id)}}" class="btn btn-primary btn-sm">ویرایش <i class="fa fa-edit"></i></a>
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
