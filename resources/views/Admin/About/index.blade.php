@extends('Admin.main')
@section('title','مواضيع من نحن')
@section('content')
    <div class="page-header">
        <div class="right page-title">مواضيع من نحن</div>
        @include("Admin.Components.navbarButton")
    </div>
    @can('add_about_us_subjects')
        <a class="addNew" href="{{ route('about_us.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($abouts->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col" class="center">الإيقونة</th>
                    <th width="20%" scope="col" class="center">الغنوان - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th scope="col" class="center">بواسطة</th>
                    <th scope="col" class="center">تاريخ الإضافة</th>
                    @can('edit_about_us_subjects')
                        <th scope="col" class="center">الحالة</th>
                        <th scope="col" class="center">تعديل</th>
                    @endcan
                    @can('delete_about_us_subjects')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($abouts as $item)
                    <tr class="data-tr">
                        <td class="center">{{ $item->id }}</td>
                        <td class="center">{!! $item->icon !!}</td>
                        <td class="center">{{ $item->title ?? '' }}</td>
                        <td class="center">{{ $item->user->name }}</td>
                        <td class="center">{{ $item->created_at->toDateString() }}</td>
                        @can('edit_about_us_subjects')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td class="center">
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href=" {{ route('about_us.edit',$item->id) }}" class="editIcon">
                                    <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                            </td>
                        @endcan
                        @can('delete_about_us_subjects')
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
        <div class="alert alert-danger">لا يوجد  منتجات</div>
    @endif
    <script>

        $(document).ready(function () {
            deleteItem("about_us/");
            jsSwitch("{{ route('about_us.update.status') }}")
        });
    </script>
@endsection
