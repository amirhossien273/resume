@section('title')
     تگ ها
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
                                <h5 class="card-title">لیست تگ ها</h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <a href="{{ route('manage.tags.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus ml-2"></i>اضافه کردن تگ</a>
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
                                    @foreach ($tags as $key => $tag)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $tag->title }}</td>
                                            <td style="direction: ltr;">{{ \Morilog\Jalali\Jalalian::fromDateTime($tag->created_at)->format('Y/m/d H:i'); }}</td>
                                            <td>
                                                @if($tag->is_active == 0)
                                                    <button class="btn btn-success-rgba btn-sm">نمایش</button>
                                                @else
                                                   <button class="btn btn-danger-rgba btn-sm">عدم نمایش</button>
                                                @endif
                                            </td>
                                            <td>{{ $tag->creator->last_name }} {{ $tag->creator->first_name }}</td>
                                            <td>
                                                @if($tag->is_active == 0)
                                                <a href="{{route('manage.tags.toggleActive', $tag->id)}}" class="btn btn-danger btn-sm">غیر فعال <i class="fa fa-lock"></i></a>
                                                @else
                                                <a href="{{route('manage.tags.toggleActive', $tag->id)}}" class="btn btn-success btn-sm"> فعال <i class="fa fa-unlock-alt"></i></a>
                                                @endif
                                                <form action="{{ route('manage.tags.destroy', $tag->id) }}" method="POST" style="display:inline" onsubmit="return confirm('آیا میخواهید دسته بندی مورد نظر حذف شود؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف دسته بندی <i class="fa fa-remove"></i></button>
                                                </form>
                                                <a href="{{route('manage.tags.edit', $tag->id)}}" class="btn btn-primary btn-sm">ویرایش <i class="fa fa-edit"></i></a>
                                                <a href="{{route('front.product.tags', $tag->id)}}" class="btn btn-primary btn-sm">نمایش محصولات <i class="fa fa-external-link"></i></a>
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

    <!-- Start Modal -->
    <div class="modal fade" id="exampleStandardModal" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleStandardModalLabel">اضاف کردن دسته بندی</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation">
                    <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="validationCustom01"></label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="دسته بندی" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="button" class="btn btn-primary">ذخیره شود</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection
@section('script')
    <!-- Tabledit js -->
    <script src="{{ asset('/assets/manage/plugins/tabledit/jquery.tabledit.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-table-editable.js') }}"></script>
@endsection
