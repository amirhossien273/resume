@section('title')
      بنر
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
                                <h5 class="card-title">لیست  بنرها</h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <a href="{{ route('manage.sliders.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus ml-2"></i>اضافه کردن بنر</a>
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
                                    <th>ردیف</th>
                                    <th>عکس</th>
                                    <th>تیتر</th>
                                    <th>تاریخ ثبت</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $key => $slider)
                                        <tr>
                                          <th>{{ $key + 1 }}</th>  
                                          <th><img src="{{ $slider->getFirstMediaUrl('slider') }}" alt="{{ $slider->title }}" width="100"></th>
                                          <th>{{ $slider->title }}</th>  
                                          <th>{{ $slider->created_at }}</th> 
                                          <th>
                                          <a href="{{ route('manage.sliders.edit', $slider->id) }}" class="btn btn-primary btn-sm">ویرایش <i class="fa fa-edit"></i></a>
                                            <form action="{{ route('manage.sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟')">حذف <i class="fa fa-remove"></i></button>
                                            </form>
                                          </th> 
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
