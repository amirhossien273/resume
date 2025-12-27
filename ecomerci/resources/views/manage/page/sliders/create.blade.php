@section('title')
     ثبت بنر
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
                        <h5 class="card-title">ثبت بنر جدید</h5>
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
                        <div class="alert alert-info">عکس مورد نظر باید 800 * 2300 باشد.</div>
                        <form method="POST" action="{{ route('manage.sliders.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-row">
                                   <div class="custom-file  mb-3">
                                        <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="image" >انتخاب فایل</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="title">عنوان</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="intro">توضیحات</label>
                                        <input type="text" class="form-control" id="intro" name="intro" placeholder="Intro">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="intro">لینک</label>
                                        <input type="url" class="form-control" id="url" name="url" placeholder="url">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button class="btn btn-primary" type="submit">ثبت</button>
                                    </div>
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
@endsection
