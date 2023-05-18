@extends('Admin.main')
@section('title','الصلاحيات')
@section('content')
    <div class="page-header">
        <div class="right page-title">إضافة صلاحية جديدة </div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('role.store')}}">
        @csrf
        <div class="tab-content">
            <table class="table table-striped table-bordered">
                <tr>
                    <td width="15%">إسم الصلاحية<span class="required text-danger">*</span></td>
                    <td><input required="required" type="text" name="role"
                               class="form-control"
                               placeholder="الصلاحية"/></td>
                </tr>
                <tr>
                    <td>الصلاحيات <span class="required text-danger">*</span></td>
                    <td>
                        @include("Admin.Role.components.role_component",['permissions'=>$permissions,'type'=>'add'])
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-bottom center">
            <button type="submit" id="addAdminBtn" class="btn btn-primary">إضافة</button>
        </div>
    </form>
    @include("Admin.Role.components.role_script");
@endsection
