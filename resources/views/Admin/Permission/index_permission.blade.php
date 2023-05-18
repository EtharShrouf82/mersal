@extends('admin.main')
@section('title','الصلاحيات')
@section('content')
    <div class="page-header">
        <div class="right page-title">الصلاحيات</div>
        @include("Admin.Components.navbarButton")
    </div>
    @can('add_permission')
        <a class="addNew" data-toggle="modal" data-target="#insertModal" href="">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($permissions->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col" class="center">الصلاحية</th>
                    @can('edit_permission')
                        <th scope="col" class="center">تعديل</th>
                    @endcan
                    @can('delete_permission')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $item)
                    <tr class="data-tr">
                        <th scope="row" class="center">{{ $item->id }}</th>
                        <td class="center">{{ $item->name }}</td>
                        @can('edit_permission')
                            <td class="center">
                                <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                    <a href="{{ route('permission.edit',$item->id) }}" class="editIcon">
                                        <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                    </a>
                                </span>
                            </td>
                        @endcan
                        @can('delete_permission')
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
        </div>
    @else
        <div class="alert alert-danger">لا يوجد رول</div>
    @endif
    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="insertModal" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header model-header-relative">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة رول جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('permission.store')}}">
                    @csrf
                    <div class="tab-content">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td width="30%">الرول<span class="required text-danger">*</span></td>
                                <td><input required="required" type="text" name="name"
                                           class="form-control"
                                           placeholder="الرول"/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-bottom center">
                        <button type="submit" id="addAdminBtn" class="btn btn-primary">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
