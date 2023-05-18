@extends('Admin.main')
@section('title','تعديل العميل')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل العميل باللغة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('clients.update', $client->id) }}">
        @csrf
        @method('PUT')
        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">صورة العميل </h5>
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
                            @if(old('vimg') == '')
                                <img style="max-width: 100px;" src="{{ $client->img }}" alt="" title="">
                            @else
                                <img src="/images/clients/{{ old('vimg') }}" alt="" title="">
                                <input type="hidden" name="vimg" value="{{ old('vimg') }}"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                        <h5 class="mb-2">إسم العميل</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                            <input class="form-control" value="{{ $client->title }}" type="text" id="name"
                                   placeholder="الرجاء إدخال إسم العميل" name="title"
                                   required="">
                        </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">رابط الموقع</h5>
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                    <input class="form-control" value="{{ $client->url }}" type="url" id="url"
                           placeholder="" name="url"
                           required="">
                </div>
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
                                   @if($client->status ==1) checked @endif
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
                                   @if($client->status ==0) checked @endif
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
                <button type="submit" class="btn btn-primary btn-block">تعديل</button>
            </div>
        </div>
        <br/>
        {{--            <div class="modal-bottom center">--}}
        {{--                <button type="submit" class="btn btn-primary">إضافة</button>--}}
        {{--            </div>--}}
    </form>
    <script>
        $(document).ready(function () {
            uploadFile("{{ route('uploadClient') }}", "clients");
        });
    </script>
@endsection
