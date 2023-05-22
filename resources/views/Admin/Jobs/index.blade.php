@extends('Admin.main')
@section('title','الوظائف')
@section('content')
    <div class="page-header">
        <div class="right page-title">الوظائف</div>
        @include("Admin.Components.navbarButton")

        <div class="clear"></div>
    </div>
    @can('add_job')
        <a class="addNew" href="{{ route('jobs.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($jobs->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th width="20%" scope="col" class="center">الوظيفة - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th width="20%" scope="col" class="center">صوره</th>
                    <th scope="col" class="center">الزوار</th>
                    <th scope="col" class="center">تاريخ الإنتهاء</th>
                    <th scope="col" class="center">بواسطة</th>
                    <th scope="col" class="center">تاريخ الإضافة</th>
                    @can('edit_job')
                        <th scope="col" class="center">الحالة</th>
                        <th scope="col" class="center">تعديل</th>
                    @endcan
                    @can('delete_job')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($jobs as $item)
                    <tr class="data-tr">
                        <td class="center">{{ $item->id }}</td>
                        <td class="center">
                            <a href="/job/{{ $item->id }}" target="_blank">{{ $item->title ?? '' }}</a>
                        </td>
                        <td class="center">
                            <img src="{{ $item->img }}"  style="max-width: 100px"/>
                        </td>
                        <td class="center">{{ $item->num_views }}</td>
                        <td class="center">{{ $item->end_date }}</td>
                        <td class="center">{{ $item->user->name }}</td>
                        <td class="center">{{ $item->created_at->toDateString() }}</td>
                        @can('edit_job')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td class="center">
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href=" {{ route('jobs.edit',$item->id) }}" class="editIcon">
                                    <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                            </td>
                        @endcan
                        @can('delete_job')
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
        <div class="alert alert-danger">لا يوجد  خطط</div>
    @endif
    <script>

        $(document).ready(function () {
            deleteItem("jobs/");
            jsSwitch("{{ route('job.update.status') }}")
        });
    </script>
@endsection
