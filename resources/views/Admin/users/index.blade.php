@extends('Admin.main')
@section('title','الإداريين')
@section('content')
    <div class="page-header">
        <div class="right page-title">الإداريين</div>
        @include("Admin.Components.navbarButton")
    </div>
    @can('add_admin')
        <a class="addNew" href="{{ route('admin.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($admins->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col">الإسم</th>
                    <th scope="col">البريد الإلكتروني</th>
                    <th scope="col">أخر دخول</th>
                    <th scope="col">تاريخ التسجيل</th>
                    <th scope="col">طلبات الشراء</th>
                    @can('edit_admin')
                        <th scope="col" class="center">الحالة</th>
                        <th scope="col" class="center">تعديل</th>
                    @endcan
                    @can('delete_admin')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($admins as $item)
                    <tr class="data-tr">
                        <th scope="row" class="center">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->last_login_at }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td></td>
                        @can('edit_admin')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td class="center">
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href="{{ route('admin.edit',$item->id) }}" class="editIcon">
                                    <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                            </td>
                        @endcan
                        @can('delete_admin')
                            <td class="center">
                                <span title="حذف" data-toggle="tooltip" data-placement="left">
                                    <i class="fa fa-trash action-icon" id="delete-icon" deleteid="{{ $item->id }}"
                                       data-toggle="modal" data-target="#deleteModal"
                                       aria-hidden="true"></i>
                                </span>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
             {{ $admins->links() }}
        </div>
    @else
        <div class="alert alert-danger">لا يوجد إداريين</div>
    @endif
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header model-header-relative">
                    <h5 class="modal-title" id="exampleModalLabel">تقارير المشرف <span>إيثار شروف</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="flex">
                    <div class="cart col-5 mr-3">
                        <div class="cart-icon cart-warning">
                            5
                        </div>
                        <div class="cart-title">نشاط اليوم</div>
                    </div>
                    <div class="cart col-5 ml-3">
                        <div class="cart-icon cart-rose">
                            20
                        </div>
                        <div class="cart-title">نشاط أخر إسبوع</div>
                    </div>
                </div>
                <div>
                    <div id="ajaxData" style="background: darkgrey"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            jsSwitch("{{ route('admin.update.status') }}")
            deleteItem("admin/");
        });
    </script>
@endsection
