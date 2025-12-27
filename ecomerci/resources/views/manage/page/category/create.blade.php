@section('title')
     ثبت دسته بندی
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
                        <h5 class="card-title">ثبت دسته بندی جدید</h5>
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
                        <div class="alert alert-info">عکس مورد نظر باید 120 * 120 باشد.</div>
                        <form method="POST" action="{{ route('manage.categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01" required>
                                    <label class="custom-file-label" for="image">انتخاب فایل</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">نام</label>
                                    <input type="text" class="form-control " id="title" name="title" placeholder="نام" value="" required>
                                </div>
                                {{-- <div class="col-md-4 mb-3">
                                    <label for="validationServer02">slug</label>
                                    <input type="text" class="form-control " id="slug" name="slug" placeholder="slug" value="" required>
                                </div> --}}
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">الویت نمایش</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="show_order" name="show_order" placeholder="الویت نمایش" value="" aria-describedby="inputGroupPrepend3" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationServerUsername">محتوا</label>
                                    <div class="input-group">
                                    <textarea id="tinymce-example" name="content"></textarea>
                                    </div>
                                </div>
                            <button class="btn btn-primary" type="submit">ثبت دسته بندی</button>
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

    <!-- Wysiwig js -->
    <script src="{{ asset('/assets/manage/plugins/tinymce/tinymce.min.js') }}"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('/assets/manage/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Code Mirror JS -->
    <script src="{{ asset('/assets/manage/plugins/code-mirror/codemirror.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/code-mirror/htmlmixed.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/code-mirror/css.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/code-mirror/javascript.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/code-mirror/xml.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-form-editor.js') }}"></script>
@endsection
