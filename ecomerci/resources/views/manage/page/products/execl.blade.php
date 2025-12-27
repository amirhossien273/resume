@section('title')
تغییر قیمت
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
                        <h5 class="card-title">تغییر قیمت</h5>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('manage.products.get-excle') }}">در یافت محصولات</a>
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
                        <form method="POST" action="{{ route('manage.products.chnge-price') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                            <div class="custom-file  mb-3 col-md-6">
                                <input type="file" class="custom-file-input" id="file" name="file" multiple aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="gallery" >انتخاب فایل</label>
                            </div>
                            <div class="custom-file col-md-12">
                               <button class="btn btn-primary" type="submit">تغییر قیمت</button>
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
@endsection
