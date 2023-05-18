@extends('Admin.main')
@section('title','السلايدر الرئيسي')
@section('content')
    <div class="page-header">
        <div class="right page-title">السلايدر الرئيسي</div>
        @include("Admin.Components.navbarButton")
    </div>
    @can('add_slider')
        <a class="addNew" href="{{ route('slider.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($slider->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col" class="center">الصوره</th>
                    <th width="35%" scope="col" class="center">الغنوان - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    @can('edit_slider')
                        <th scope="col" class="center">الحالة</th>
                        <th scope="col" class="center">تعديل</th>
                    @endcan
                    @can('delete_slider')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($slider as $item)
                    <tr class="data-tr">
                        <td class="center">{{ $item->id }}</td>
                        <td class="center"><img width="300" height="150" src="{{ $item->img }}"/></td>
                        <td class="center">{{ $item->title ?? '' }}</td>
                        @can('edit_slider')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td class="center">
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href=" {{ route('slider.edit',$item->id) }}" class="editIcon">
                                    <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                            </td>
                        @endcan
                        @can('delete_slider')
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
             {{ $slider->links() }}
        </div>
    @else
        <div class="alert alert-danger">لا يوجد صور للسلايدر</div>
    @endif
    <script>
        $(document).ready(function () {
            deleteItem("slider/");
            jsSwitch("{{ route('slider.update.status') }}")
        });
    </script>
@endsection
