@extends('Admin.main')
@section('title','الإداريين')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل الإداري {{ $admin->name }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('admin.update',$admin->id)}}">
        @csrf
        @method('PUT')
        <div class="tab-content">
            <table class="table table-striped table-bordered">
                <tr>
                    <td width="20%">الإسم<span class="required text-danger">*</span></td>
                    <td><input value="{{ $admin->name }}" required="required" type="text" name="name"
                               class="form-control"
                               placeholder="الإسم"/></td>
                </tr>
                <tr>
                    <td width="20%">البريد الإلكتروني<span class="required text-danger">*</span></td>
                    <td><input value="{{ $admin->email }}" required="required" type="text" name="email"
                               class="form-control"
                               placeholder="البريد الإلكتروني"/></td>
                </tr>
                <tr>
                    <td width="20%">كلمة المرور</td>
                    <td><input id="pass1" type="password" name="password"
                               class="form-control"
                               placeholder="كلمة المرور"/></td>
                </tr>
                <tr>
                    <td width="20%">إعادة كلمة المرور</td>
                    <td><input id="pass2" type="password" name="password"
                               class="form-control"
                               placeholder="كلمة المرور"/></td>
                </tr>
                <tr>
                    <td>الحالة<span class="required text-danger">*</span></td>
                    <td>
                        <select name="status" class="form-control">
                            @if($admin->status == 1)
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            @else
                                <option value="2">غير مفعل</option>
                                <option value="0">مفعل</option>
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>الصلاحيات</td>
                    <td>
                        <select dir="rtl" class="select2 form-control" id="roles" multiple="multiple" name="role_name[]">
                            @if($admin->role_name)
                                @foreach($roles as $role)
                                    <option {{ in_array($role->name,$admin->role_name) ? "selected" : "" }} value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            @else
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            @endif
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
    <script type="text/javascript">
        $(document).ready(function () {
            $("#roles").select2({
                theme: "bootstrap-5",
                width:"100%",
                scrollAfterSelect:true,
                language: {
                    inputTooShort: function() {
                        return 'إضغط هنا لإختيار الصلاحيات';
                    }
                },
            });
            uploadFile("{{ route('uploadadmin') }}", "admin");
            $("#pass1").blur(function () {
                var val = $(this).val().length;
                if (val < 8) {
                    $("#msgs-area").text('كلمة المرور يجب أن تكون على الأقل 8 خانات')
                }
            });
            $("#pass2").blur(function () {
                var pass1 = $("#pass1").val();
                var pass2 = $(this).val();
                var length = pass2.length;
                if (length < 8) {
                    $("#msgs-area").text('كلمة المرور يجب أن تكون على الأقل 8 خانات')
                } else if (pass1 !== pass2) {
                    $("#msgs-area").text('كلمة المرور غير متطابقة')
                } else {
                    $("#addAdminBtn").removeAttr('disabled')
                }
            });
        });
    </script>
@endsection
