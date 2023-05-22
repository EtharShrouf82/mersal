@extends('Admin.main')
@section('title','إضافة شاشة')
@section('content')
    <div class="page-header">
        <div class="right page-title">إضافة شاشة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('screens.update', $screen->id) }}">
        @csrf
        @method('PUT')
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-2">المدينة</h5>
                        <select name="city_id" id="city" required class="form-control">
                            <option value="">الرجاء إختيار المدينة</option>
                            @foreach($city as $ct)
                                <option @if($screen->citie_id == $ct->id) selected @endif value="{{ $ct->id }}">{{ $ct->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <h5 class="mb-2">النوع</h5>
                        <select name="screen_type_id" required class="form-control">
                            <option value="">الرجاء إختيار النوع</option>
                            @foreach($screenType as $type)
                                <option @if($screen->screen_type_id == $type->id) selected @endif value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-2">إسم الشاشة</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                            <input class="form-control" value="{{ $screen->title }}" type="text" id="name"
                                   placeholder="الرجاء إدخال إسم الشاشة" name="title"
                                   required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-6">
                            <label for="price" class="form-label">حالة (الظهور بالموقع)</label>
                            <div class="clearfix"></div>
                            @error('status')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                       @if($screen->status == 1) checked @endif
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
                                       @if($screen->status == 0) checked @endif
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
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">وصف الشاشة</h5>
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div>
                    <div class="mt-2 @if(LaravelLocalization::setLocale() == 'en') entd @endif">
                        <textarea id="description" class="edit form-control"
                                  name="description">{{ $screen->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">صور أخرى للشاشه</h5>
                <div class="mt-5">
                    <label class="custom-file">
                        <input type="file" multiple id="multiple_files" class="custom-file-input">
                        <span class="custom-file-control custom-file-control-primary"></span>
                    </label>
                    <div class="progress mt-2 mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="row" id="otherImages">
                        @if($screen->images)
                            @foreach($screen->images as $img)
                                <div class="col-3">
                                    <div class="imgBox">
                                        <a class="deleteIcon" id="{{ $img->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <img src="/images/screens/{{ $img->img }}" alt="" title="">
                                    </div>
                                </div>
                            @endforeach
                        @endif
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
    @include("Admin.Screens.jquery")
@endsection
