@extends('Admin.main')
@section('title','تعديل الخطة')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل الخطة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('plans.update' , $plan->id) }}">
        @csrf
        @method('PUT')
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-2">إسم الخطة</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input class="form-control" value="{{ $plan->title }}" type="text" id="name"
                               placeholder="الرجاء إدخال إسم الخطة" name="title"
                               required="">
                    </div>
                    <div class="col-6">
                        <label for="price" class="form-label">حالة (الظهور بالموقع)</label>
                        <div class="clearfix"></div>
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   @if($plan->status ==1) checked @endif
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
                                   @if($plan->status ==0) checked @endif
                                   value="0"
                                   type="radio"
                                   name="status"
                                   id="flexRadioStatus1">
                            <label class="form-check-label" for="flexRadioStatus1">
                                لا
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-2">الرجاء إختيار النوع</h5>
                        <h5 class="mb-2">
                            <select class="form-control" required name="screen_type_id">
                                <option value="">الرجاء إختيار النوع</option>
                                @foreach($screenTypes as $type)
                                    <option @if($plan->screen_type_id == $type->id) selected @endif value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </h5>
                    </div>
                    <div class="col-6">
                        <h5 class="mb-2">عدد المشاهدات</h5>
                        <input type="number" value="{{ $plan->num_views }}" class="form-control" name="num_views" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-block">تعديل</button>
            </div>
        </div>
        <br/>
    </form>
@endsection
