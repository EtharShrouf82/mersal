@extends('Admin.main')
@section('title','أقسام المنتجات')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل القسم باللغة   {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('cats.update', $cat->id)}}">
        @csrf
        @method('PUT')
        <div class="tab-content">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>العنوان {{ LaravelLocalization::setLocale() }}<span class="text-danger required">*</span> </td>
                    <td class="@if(LaravelLocalization::setLocale() == 'ar')  @else entd @endif">
                        <input value="{{ $cat->title }}" type="text" name="title" required class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>الحالة<span class="text-danger required">*</span></td>
                    <td>
                        <select name="status" required class="form-control">
                            <option @if($cat->status == 1) selected @endif value="1">مفعل</option>
                            <option @if($cat->status == 0) selected @endif value="0">غير مفعل</option>
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
