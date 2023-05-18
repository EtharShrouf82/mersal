@extends('Admin.main')
@section('title','الشاشات')
@section('content')
    <div class="page-header">
        <div class="right page-title">الشاشات</div>
        @include("Admin.Components.navbarButton")

        <div class="clear"></div>
    </div>
    @can('add_screen')
        <a class="addNew" href="{{ route('screens.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($screens->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th width="20%" scope="col" class="center">المدينة - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th width="20%" scope="col" class="center">النوع - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th width="20%" scope="col" class="center">الشاشة - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th scope="col" class="center">بواسطة</th>
                    <th scope="col" class="center">تاريخ الإضافة</th>
                    @can('edit_screen')
                        <th scope="col" class="center">الحالة</th>
                        <th scope="col" class="center">تعديل</th>
                    @endcan
                    @can('delete_screen')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($screens as $item)
                    <tr class="data-tr">
                        <td class="center">{{ $item->id }}</td>
                        <td class="center">{{ $item->city->title }}</td>
                        <td class="center">{{ $item->screen_type->title }}</td>
                        <td class="center">{{ $item->title }}</td>
                        <td class="center">{{ $item->user->name }}</td>
                        <td class="center">{{ $item->created_at->toDateString() }}</td>
                        @can('edit_screen')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td class="center">
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href=" {{ route('screens.edit',$item->id) }}" class="editIcon">
                                    <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                            </td>
                        @endcan
                        @can('delete_screen')
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
            {{ $screens->links() }}
        </div>
    @else
        <div class="alert alert-danger">لا يوجد  منتجات</div>
    @endif
    <script>

        $(document).ready(function () {
            deleteItem("screens/");
            jsSwitch("{{ route('screen.update.status') }}")
        });
    </script>
@endsection
