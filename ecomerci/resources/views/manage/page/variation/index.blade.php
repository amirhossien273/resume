@section('title')
ویژگی    
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
                                <h5 class="card-title">لیست  ویژگی </h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <a href="{{ route('manage.variations.create', request()->route('variation')) }}" class="btn btn-primary-rgba"><i class="feather icon-plus ml-2"></i>اضافه کردن ویژگی </a>
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
                                    @foreach ($variations as $key => $variation)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $variation->title }}</td>
                                            <td style="direction: ltr;">{{ \Morilog\Jalali\Jalalian::fromDateTime($variation->created_at)->format('Y/m/d H:i'); }}</td>
                                            <td>{{ $variation->is_active ? 'نمایش' : 'عدم نمایش' }}</td>
                                            <td>{{ $variation->creator->last_name }} {{ $variation->creator->first_name }}</td>
                                            <td>
                                                <a href="{{ route('manage.variations.toggleActive', $variation) }}" class="btn {{ $variation->is_active ? 'btn-danger ' : 'btn-success ' }}btn-sm">
                                                    @if ($variation->is_active)
                                                       عدم نمایش <i class='fa fa-lock'></i>
                                                     @else   
                                                     نمایش <i class='fa fa-unlock-alt'></i>
                                                    @endif 
                                                </a>
                                                <form action="{{ route('manage.variations.destroy', $variation->id) }}" method="POST" style="display:inline" onsubmit="return confirm('آیا میخواهید دسته بندی مورد نظر حذف شود؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف دسته بندی <i class="fa fa-remove"></i></button>
                                                </form>
                                                <a href="{{route('manage.variations.edit', $variation->id)}}" class="btn btn-primary btn-sm">ویرایش <i class="fa fa-edit"></i></a>
                                                <a href="{{route('manage.variation_options.index', $variation->id)}}" class="btn btn-primary btn-sm">انتاخب وِیژگی <i class="fa fa-external-link"></i></a>
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
