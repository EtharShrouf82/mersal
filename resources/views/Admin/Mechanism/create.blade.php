@extends('Admin.main')
@section('title','أليات العمل')
@section('content')
    <div class="page-header">
        <div class="right page-title">أليات العمل</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('mechanism.store')}}">
        @csrf
        <div class="tab-content">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>العنوان {{ LaravelLocalization::setLocale() }}<span class="text-danger required">*</span></td>
                    <td class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                        <input type="text" name="title" required class="form-control"/>
                    </td>
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
@endsection
