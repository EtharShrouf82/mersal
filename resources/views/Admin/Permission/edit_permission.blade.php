@extends('admin.main')
@section('title','الإداريين')
@section('content')
    <div class="page-header">
        <div class="right page-title">الإداريين</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('admin.update',$admin->id)}}">
        @csrf
        @method('PUT')
        <div class="tab-content">
            <table class="table table-striped table-bordered">
                <tr>
                    <td width="30%">صورة</td>
                    <td>
                        <div id="msgs-area" class="text-danger"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <div id="uploaded_image" class="imgTd">
                                    <img src="{{ $admin->photo }}" width="60" height="60"/>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="30%">الإسم<span class="required text-danger">*</span></td>
                    <td><input value="{{ $admin->name }}" required="required" type="text" name="name"
                               class="form-control"
                               placeholder="الإسم"/></td>
                </tr>
                <tr>
                    <td width="30%">البريد الإلكتروني<span class="required text-danger">*</span></td>
                    <td><input value="{{ $admin->email }}" required="required" type="text" name="email"
                               class="form-control"
                               placeholder="البريد الإلكتروني"/></td>
                </tr>
                <tr>
                    <td width="30%">كلمة المرور</td>
                    <td><input id="pass1" type="password" name="password"
                               class="form-control"
                               placeholder="كلمة المرور"/></td>
                </tr>
                <tr>
                    <td width="30%">إعادة كلمة المرور</td>
                    <td><input id="pass2" type="password" name="password"
                               class="form-control"
                               placeholder="كلمة المرور"/></td>
                </tr>
                <tr>
                    <td>الحالة<span class="required text-danger">*</span></td>
                    <td>
                        <select name="active" class="form-control">
                            @if($admin->active === 1)
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            @else
                                <option value="0">غير مفعل</option>
                                <option value="1">مفعل</option>
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>الصلاحيات <span class="required text-danger">*</span></td>
                    <td>
                        <select name="role_id" required class="form-control">
                            @foreach($roles as $rl)
                                <option @if($admin->role_id == $rl['id']) selected
                                        @endif value="{{ $rl['id'] }}">{{ $rl['name'] }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="center">
                        <button type="submit" id="addAdminBtn" class="btn btn-primary">تعديل</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
@endsection
