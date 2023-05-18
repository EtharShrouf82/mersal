@extends('Admin.main')
@section('title','تعديل الصلاحيات')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل الصلاحية {{ $role->name }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <table class="table table table-striped table-bordered">
        <form method="POST" action="{{ route('role.update',$role->id)}}">
            @csrf
            @method('PUT')
            <div class="tab-content">
                <tr>
                    <td width="7%">الإسم<span class="required text-danger">*</span></td>
                    <td><input value="{{ $role->name }}" required="required" type="text" name="role"
                               class="form-control"
                               placeholder="المجموعة"/></td>
                </tr>
                <tr>
                    <td>الصلاحيات <span class="required text-danger">*</span></td>
                    <td>
                        @include("Admin.Role.components.role_component",['permissions'=>$permissions,'type'=>'edit'])
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="center">
                        <button type="submit" id="addAdminBtn" class="btn btn-primary">تعديل</button>
                    </td>
                </tr>
            </div>
        </form>
    </table>
@include("Admin.Role.components.role_script");
@endsection
