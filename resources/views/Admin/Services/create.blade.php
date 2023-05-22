@extends('Admin.main')
@section('title','إضافة خدمة')
@section('content')
    <div class="page-header">
        <div class="right page-title">إضافة خدمة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('service.store') }}">
        @csrf
        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">صورة الخدمة </h5>
                @error('icon')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-danger">يفضل نوع svg بمقاس 60 *60</div>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <div id="uploaded_image">
                            @if(old('vimg'))
                                <img style="max-width: 100px" src="/images/services/{{ old('vimg') }}"/>
                                <input type="hidden" name="vimg" value="{{ old('vimg') }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <h5 class="mb-2">وصف الخدمة</h5>
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div>
                    <div class="mt-2">
                        <textarea id="description" class="edit form-control"
                                  name="description">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="price" class="form-label">يتبع</label>
                        <div class="clearfix"></div>
                        @error('follow')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <select name="follow" required class="form-control">
                            <option value="">الرجاء إختيار يتبع من</option>
                            <option @if(old('follow')==3) selected @endif value="3">خدمات عامة</option>
                            <option @if(old('follow')==2) selected @endif  value="2"> خدمات التصمم والإعلانات</option>
                            <option @if(old('follow')==1) selected @endif  value="1">خدمات أنظمة الكاميرات والحماية</option>
                        </select>
                    </div>
                    <div class="col-6">
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
            </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-block">إضافة</button>
            </div>
        </div>
        <br/>
        {{--            <div class="modal-bottom center">--}}
        {{--                <button type="submit" class="btn btn-primary">إضافة</button>--}}
        {{--            </div>--}}
    </form>
    <script>
        $(document).ready(function () {
            uploadFile("{{ route('uploadService') }}", "services");
        });
    </script>
@endsection
