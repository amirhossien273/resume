@section('title')
    ثبت استان
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
                        <h5 class="card-title">ثبت استان جدید</h5>
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
                        <form method="POST" action="{{ route('manage.provinces.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="provinceTitle">نام استان</label>
                                    <input type="text" class="form-control" id="provinceTitle" name="title" placeholder="نام استان" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="showOrder">ترتیب نمایش</label>
                                    <input type="number" class="form-control" id="showOrder" name="show_order" placeholder="ترتیب نمایش" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="latitude">عرض جغرافیایی</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="عرض جغرافیایی" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="longitude">طول جغرافیایی</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="طول جغرافیایی" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-primary" type="submit">ثبت استان</button>
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
