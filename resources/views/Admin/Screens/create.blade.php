@extends('Admin.main')
@section('title','إضافة شاشة')
@section('content')
    <div class="page-header">
        <div class="right page-title">إضافة شاشة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('screens.store') }}">
        @csrf
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-2">المدينة</h5>
                        <select name="city_id" id="city" required class="form-control">
                            <option value="">الرجاء إختيار المدينة</option>
                            @foreach($city as $ct)
                                <option value="{{ $ct->id }}">{{ $ct->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="showCity">

                    </div>
                    <input type="text" name="position_X" id="position_X">
                    <input type="text" name="position_y" id="position_y">
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h5 class="mb-2">إسم الشاشة</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                            <input class="form-control" value="{{ old('title') }}" type="text" id="name"
                                   placeholder="الرجاء إدخال إسم الشاشة" name="title"
                                   required="">
                        </div>
                    </div>
                        <div class="col-4">
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
                    <div class="col-4">
                        <h5 class="mb-2">النوع</h5>
                        <select name="screen_type_id" required class="form-control">
                            <option value="">الرجاء إختيار النوع</option>
                            @foreach($screenType as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                        </select>
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
                                  name="description">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">صور  للشاشة</h5>
                @error('oimg')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div>
                    <label class="custom-file">
                        <input type="file" multiple id="multiple_files" class="custom-file-input">
                        <span class="custom-file-control custom-file-control-primary"></span>
                    </label>
                    <div class="progress mt-2 mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div id="success">
                        <div class="row" id="otherImages">
                            @if(old('oimg') != null)
                                @foreach(old('oimg') as $img)
                                    <div class=" col-3">
                                        <div class="imgBox">
                                            <a class="deleteIcon" id="{{ $img }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <img src="/images/products/{{ $img }}" alt="" title="">
                                        </div>
                                    </div><input type="hidden" name="oimg[]" value="{{ $img }}"/>
                                @endforeach
                            @endif
                        </div>
                        <label></label>
                    </div>
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
    @include("Admin.Screens.jquery")
@endsection
