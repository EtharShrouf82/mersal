@extends('Admin.main')
@section('title','الصلاحيات')
@section('content')
    <div class="page-header">
        <div class="right page-title">الصلاحيات</div>
        @include("Admin.Components.navbarButton")
    </div>
    @can('add_permission')
        <a class="addNew"  href="{{ route('role.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($roles->count() > 0)
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
                @foreach ($roles as $item)
                    <tr class="data-tr">
                        <th scope="row" class="center">{{ $item->id }}</th>
                        <td class="center">{{ $item->name }}</td>
                        @can('edit_permission')
                            <td class="center">
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href="{{ route('role.edit',$item->id) }}" class="editIcon">
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
@endsection
