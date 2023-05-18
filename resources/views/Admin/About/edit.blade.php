@extends('Admin.main')
@section('title','أليات العمل')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل الالية باللغة   {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('about_us.update', $about->id)}}">
        @csrf
        @method('PUT')
        <div class="tab-content">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>الإيقونة<span class="text-danger required">*</span> </td>
                    <td class="@if(LaravelLocalization::setLocale() == 'ar')  @else entd @endif">
                        <input value="{{ $about->icon }}" type="text" name="icon" required class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>العنوان {{ LaravelLocalization::setLocale() }}<span class="text-danger required">*</span> </td>
                    <td class="@if(LaravelLocalization::setLocale() == 'ar')  @else entd @endif">
                        <input value="{{ $about->title }}" type="text" name="title" required class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>الحالة<span class="text-danger required">*</span></td>
                    <td>
                        <select name="status" required class="form-control">
                            <option @if($about->status == 1) selected @endif value="1">مفعل</option>
                            <option @if($about->status == 0) selected @endif value="0">غير مفعل</option>
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
@endsection
