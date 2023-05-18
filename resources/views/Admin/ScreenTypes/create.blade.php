@extends('Admin.main')
@section('title','إضافة خدمة')
@section('content')
    <div class="page-header">
        <div class="right page-title">إضافة خدمة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('screen_type.store') }}">
        @csrf
        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">إسم الخدمة</h5>
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input class="form-control" value="{{ old('title') }}" type="text" id="name"
                       placeholder="الرجاء إدخال إسم الخدمة" name="title"
                       required="">
                <span class="fs-sm text-muted">إجباري ويفضل أن يكون فريد</span>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                        <label for="price" class="form-label">حالة (الظهور بالموقع)</label>
                        <div class="clearfix"></div>
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   @if(old('status')==1) checked @endif
                                   value="1"
                                   type="radio"
                                   name="status"
                                   id="flexRadioStatus1">
                            <label class="form-check-label" for="flexRadioStatus1">
                                نعم
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   @if(old('price_hidden')==0) checked @endif
                                   type="radio"
                                   value="0"
                                   name="status"
                                   id="flexRadioStatus2"
                            >
                            <label class="form-check-label" for="flexRadioStatus2">
                                لا
                            </label>
                        </div>
                    </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-block">إضافة</button>
            </div>
        </div>
        <br/>
    </form>
@endsection
