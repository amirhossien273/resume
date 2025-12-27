@section('title')
    ثبت محصول
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
                        <h5 class="card-title">ثبت محصول جدید</h5>
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
                        <div class="alert alert-info">عکس مورد نظر باید 1100 * 1100 باشد.</div>
                        <form method="POST" action="{{ route('manage.products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                            <div class="custom-file  mb-3">
                                <input type="file" class="custom-file-input" id="gallery" name="gallery[]" multiple aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="gallery" >انتخاب فایل</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="category_id">دسته بندی ها</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="">انتخاب کنید...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">نام محصول</label>
                                    <input type="text" class="form-control" id="validationServer01" name="title" placeholder="نام" value="{{ old('title') }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="slug">نامک (Slug)</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="نامک" value="{{ old('slug') }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="intro">محتوا</label>
                                    <textarea class="form-control" id="intro" name="intro" placeholder="محتوا" required>{{ old('intro') }}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="content">محتوا</label>
                                    <textarea class="form-control" id="content" name="content" placeholder="محتوا" required>{{ old('content') }}</textarea>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="show_order">الویت نمایش</label>
                                    <input type="number" class="form-control" id="show_order" name="show_order" placeholder="الویت نمایش" value="{{ old('show_order') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="attribute_ids">حالات</label>
                                <select multiple class="form-control" id="attribute_ids" name="attribute_ids[]">
                                    @foreach($attributes as $attribute)
                                        @foreach ($attribute->attributeOptions as $attributeOption)
                                            <option value="{{ $attributeOption->id }}">{{ $attribute->title }} > {{ $attributeOption->title }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="attribute_ids">بر چسب</label>
                                <select multiple class="form-control" id="tag_ids" name="tag_ids[]">
                                    @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">ایجاد محصول</button>
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
