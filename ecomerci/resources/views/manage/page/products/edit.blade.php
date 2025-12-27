@extends('manage.layout.app')
@section('title')
    ویرایش محصول
@endsection
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
                        <h5 class="card-title">ویرایش محصول</h5>
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
                        <form method="POST" action="{{ route('manage.products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="category_id">دسته بندی ها</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">انتخاب کنید...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">نام محصول</label>
                                    <input type="text" class="form-control" id="validationServer01" name="title" placeholder="نام" value="{{ old('title', $product->title) }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="slug">نامک (Slug)</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="نامک" value="{{ old('slug', $product->slug) }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="intro">محتوا</label>
                                    <textarea class="form-control" id="intro" name="intro" placeholder="محتوا" required>{{ old('intro', $product->intro) }}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="content">محتوا</label>
                                    <textarea class="form-control" id="content" name="content" placeholder="محتوا" required>{{ old('content', $product->content) }}</textarea>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="state_enum">وضعیت</label>
                                    <select class="form-control" id="state_enum" name="state_enum" required>
                                        <option value="">انتخاب وضعیت</option>
                                        <option value="DRAFT" {{ old('state_enum', $product->state_enum) == 'DRAFT' ? 'selected' : '' }}>پیش‌نویس</option>
                                        <option value="PENDING" {{ old('state_enum', $product->state_enum) == 'PENDING' ? 'selected' : '' }}>در انتظار تایید</option>
                                        <option value="APPROVED" {{ old('state_enum', $product->state_enum) == 'APPROVED' ? 'selected' : '' }}>تایید شده</option>
                                        <option value="REJECTED" {{ old('state_enum', $product->state_enum) == 'REJECTED' ? 'selected' : '' }}>رد شده</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="show_order">الویت نمایش</label>
                                    <input type="number" class="form-control" id="show_order" name="show_order" placeholder="الویت نمایش" value="{{ old('show_order', $product->show_order) }}" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="attribute_ids">حالات</label>
                                <select multiple class="form-control" id="attribute_ids" name="attribute_ids[]">
                                    @foreach($attributes as $attribute)
                                        @foreach ($attribute->attributeOptions as $attributeOption)
                                            <option value="{{ $attributeOption->id }}" {{ in_array($attributeOption->id, $product->attributeOptions->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $attribute->title }} > {{ $attributeOption->title }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tag_ids">برچسب</label>
                                <select multiple class="form-control" id="tag_ids" name="tag_ids[]">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="gallery">تصاویر جدید</label>
                                <input type="file" class="form-control" id="gallery" name="gallery[]" multiple>
                                <small class="form-text text-muted">اگر نمی خواهید تصویر را تغییر دهید خالی بگذارید.</small>
                            </div>

                            <!-- Image list with remove and reorder options -->
                            <div class="col-md-12 mb-3">
                                <label>تصاویر موجود</label>
                                <ul id="image-list" class="list-group p-0">
                                    @foreach ($product->media as $media)
                                        <li class="list-group-item d-flex justify-content-between align-items-center" data-media-id="{{ $media->id }}">
                                            <i class="fa fa-sort fa-2x"></i>
                                            <img src="{{ $media->media_uri }}" alt="{{ $product->title }}" class="img-thumbnail" style="max-height: 120px">
                                            <button type="button" class="btn btn-danger btn-sm remove-image" data-media-id="{{ $media->id }}">حذف</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <button class="btn btn-primary" type="submit">ویرایش محصول</button>
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

    <script src="{{ asset('/assets/manage/js/Sortable.min.js') }}"></script>
    <script>
        // Initialize Sortable for image reordering
        const imageList = document.getElementById('image-list');
        new Sortable(imageList, {
            animation: 150,
            onEnd: function (evt) {
                const mediaIds = Array.from(imageList.children).map(child => child.getAttribute('data-media-id'));
                fetch("{{ route('manage.products.reorderImages', $product->id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ media_ids: mediaIds })
                }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('ترتیب تصاویر عوض شد.');
                        }
                    });
            }
        });

        // Handle image removal
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function () {
                const mediaId = this.getAttribute('data-media-id');
                fetch("{{ route('manage.products.removeImage', $product->id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ media_id: mediaId })
                }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.closest('li').remove();
                            alert('ترتیب حذف شد.');
                        }
                    });
            });
        });
    </script>
@endsection
