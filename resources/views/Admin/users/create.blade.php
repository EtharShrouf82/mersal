@extends('Admin.main')
@section('title','إضافة إداري جديد')
@section('content')
    <div class="page-header">
        <div class="right page-title">إضافة إداري جديد</div>
        @include("Admin.Components.navbarButton")
    </div>
    <div class="modal-content">
        <form method="POST" action="{{ route('admin.store')}}">
            @csrf
            <div class="tab-content">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td width="30%">الإسم<span class="required text-danger">*</span></td>
                        <td><input required="required" type="text" name="name"
                                   class="form-control"
                                   placeholder="الإسم"/></td>
                    </tr>
                    <tr>
                        <td width="30%">البريد الإلكتروني<span class="required text-danger">*</span></td>
                        <td><input required="required" type="text" name="email"
                                   class="form-control"
                                   placeholder="البريد الإلكتروني"/></td>
                    </tr>
                    <tr>
                        <td width="30%">كلمة المرور<span class="required text-danger">*</span></td>
                        <td><input required="required" id="pass1" type="password" name="password"
                                   class="form-control"
                                   placeholder="كلمة المرور"/></td>
                    </tr>
                    <tr>
                        <td width="30%">إعادة كلمة المرور<span class="required text-danger">*</span></td>
                        <td><input required="required" id="pass2" type="password" name="password"
                                   class="form-control"
                                   placeholder="كلمة المرور"/></td>
                    </tr>
                    <tr>
                        <td>الحالة<span class="required text-danger">*</span></td>
                        <td>
                            <select name="status" class="form-control">
                                <option value="">الرجاء إختيار الحالة</option>
                                <option value="1">مفعل</option>
                                <option value="2">غير مفعل</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>الصلاحيات</td>
                        <td>
                            <select dir="rtl" class="select2 form-control" id="roles" multiple="multiple" name="role_name[]">
                                <option value="">الرجاء إختيار الصلاحية</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-bottom center">
                <button type="submit" id="addAdminBtn" class="btn btn-primary">إضافة</button>
            </div>
        </form>
    </div>
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
        });
    </script>
@endsection
