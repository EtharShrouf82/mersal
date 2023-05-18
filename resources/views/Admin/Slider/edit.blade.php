@extends('Admin.main')
@section('title','السلايدر الرئيسي')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل السلايدر باللغة   {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('slider.update',$slider->id)}}">
        @csrf
        @method('PUT')
        <div class="tab-content">
            <table class="table table-striped table-bordered">
                <tr>
                    <td width="30%">صورة</td>
                    <td>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <div id="uploaded_image"><img style="max-width: 300px" src="{{ $slider->img }}"/> </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>العنوان -  {{ LaravelLocalization::getCurrentLocaleNative() }}<span class="text-danger required">*</span> </td>
                    <td class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                        <input type="text" name="title" value="{{ $slider->title ?? '' }}" required class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td> النص -  {{ LaravelLocalization::getCurrentLocaleNative() }}</td>
                    <td class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                        <input type="text" name="description" value="{{ $slider->description ?? '' }}" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>عنوان الزر -  {{ LaravelLocalization::getCurrentLocaleNative() }}</td>
                    <td class="@if(LaravelLocalization::setLocale() == 'ar')  @else entd @endif"><input value="{{ $slider->buttonTitle }}" type="text" name="button_title" class="form-control"/></td>
                </tr>
                <tr>
                    <td>الرابط</td>
                    <td class="entd"><input type="text" name="link" class="form-control" value="{{ $slider->link }}"/></td>
                </tr>
                <tr>
                    <td>الحالة</td>
                    <td>
                        <select name="status" required class="form-control">
                            @if($slider->status === 1)
                                <option value="1">مفعل</option>
                                <option value="2">غير مفعل</option>
                            @else
                                <option value="2">غير مفعل</option>
                                <option value="1">مفعل</option>
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="center">
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <script>

        $(document).ready(function () {
            uploadFile("{{ route('uploadslider') }}","slider");
        });
    </script>
@endsection
