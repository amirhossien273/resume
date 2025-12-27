@section('title')
    ویرایش استان
@endsection
@extends('manage.layout.app')

@section('rightbar-content')
    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">ویرایش استان</h5>
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
                        <form method="POST" action="{{ route('manage.provinces.update', $province->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="title">نام استان</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="نام استان" value="{{ old('title', $province->title) }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="showOrder">ترتیب نمایش</label>
                                    <input type="number" class="form-control" id="showOrder" name="show_order" placeholder="ترتیب نمایش" value="{{ old('show_order', $province->show_order) }}" >
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
