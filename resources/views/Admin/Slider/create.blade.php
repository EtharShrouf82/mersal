@extends('Admin.main')
@section('title','السلايدر الرئيسي')
@section('content')
    <div class="page-header">
        <div class="right page-title">السلايدر الرئيسي</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('slider.store')}}">
        @csrf
        <div class="tab-content">
            <table class="table table-striped table-bordered">
                <tr>
                    <td width="20%">صورة<span class="text-danger required">*</span></td>
                    <td>
                        <div class="text-danger">الحجم 704 * 1440   </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <div id="uploaded_image"></div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>العنوان <span class="text-danger required">*</span></td>
                    <td class="@if(LaravelLocalization::setLocale() == 'ar')  @else entd @endif">
                        <input type="text" name="title" required class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>النص</td>
                    <td class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                        <input type="text" name="description" required class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>عنوان الزر</td>
                    <td class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                        <input type="text" name="button_title" class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>الرابط</td>
                    <td class="entd"><input type="url" name="link" class="form-control"/></td>
                </tr>
                <tr>
                    <td>الحالة<span class="text-danger required">*</span></td>
                    <td>
                        <select name="status" required class="form-control">
                            <option value="">الرجاء إختيار الحالة</option>
                            <option value="1">مفعل</option>
                            <option value="0">غير مفعل</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="center">
                            <button type="submit" class="btn btn-primary">إضافة</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            uploadFile("{{ route('uploadslider') }}", "slider");
        });
    </script>
@endsection
