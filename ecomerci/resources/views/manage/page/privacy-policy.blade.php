@section('title')
قوانین و مقررات   
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
                        <h5 class="card-title">قوانین و مقررات</h5>
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
                        <form method="POST" action="{{ route('manage.privacy-policy.upsert') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea class="form-control" id="tinymce-example"  name="intro" placeholder="محتوا" required>{{ $privacyPolicy }}wqwqwqwq</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">ثبت </button>
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

    <script>
        tinymce.init({
            selector: '#tinymce-example',
            setup: function (editor) {
                editor.on('init', function () {
                    this.setContent(`{!! addslashes($privacyPolicy) !!}`);
                });
            }
       });
    </script>
@endsection
