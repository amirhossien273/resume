@section('title')
     ثبت بنر تیلیغات
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
                        <h5 class="card-title">ثبت بنر تیلیغات جدید</h5>
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
                        <div class="alert alert-info">عکس مورد نظر باید 450 * 768 باشد.</div>
                        <form method="POST" action="{{ route('manage.banners.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-row">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01" required>
                                        <label class="custom-file-label" for="image">انتخاب فایل</label>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="title">تیتر</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="link">لینک</label>
                                        <input type="text" class="form-control" id="link" name="link" placeholder="Link" required>
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
