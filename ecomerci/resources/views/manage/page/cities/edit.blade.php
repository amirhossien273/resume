@section('title')
    ویرایش شهر
@endsection
@extends('manage.layout.app')

@section('rightbar-content')
    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">ویرایش شهر</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('manage.cities.update', $city->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="title">نام شهر</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="نام شهر" value="{{ old('title', $city->title) }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="showOrder">ترتیب نمایش</label>
                                    <input type="number" class="form-control" id="showOrder" name="show_order" placeholder="ترتیب نمایش" value="{{ old('show_order', $city->show_order) }}" >
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="province_id">استان</label>
                                    <select class="form-control" id="province_id" name="province_id" required>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}" {{ $city->province_id == $province->id ? 'selected' : '' }}>
                                                {{ $province->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone_code">کد تلفن</label>
                                    <input type="text" class="form-control" id="phone_code" name="phone_code" placeholder="کد تلفن" value="{{ old('phone_code', $city->phone_code) }}" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-primary" type="submit">ثبت تغییرات</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection