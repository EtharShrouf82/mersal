@extends('Admin.main')
@section('title','الوظائف')
@section('content')
    <div class="page-header">
        <div class="right page-title">الوظائف</div>
        @include("Admin.Components.navbarButton")

        <div class="clear"></div>
    </div>
    @if($jobs->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th width="20%" scope="col" class="center">الوظيفة - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th width="20%" scope="col" class="center">الإسم</th>
                    <th scope="col" class="center">المدينة</th>
                    <th scope="col" class="center">السيرة الذاتية</th>
                    <th scope="col" class="center">البريد الإلكتروني</th>
                    <th scope="col" class="center">رقم الهاتف</th>
                    <th scope="col" class="center">الجنس</th>
                    <th scope="col" class="center">الحالة</th>
                    <th scope="col" class="center">تعديل</th>
                    <th scope="col" class="center">تاريخ التقديم</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($jobs as $item)
                    <tr class="data-tr">
                        <td class="center">{{ $item->id }}</td>
                        <td class="center"><span class="text-success">{{ $item->job->title ?? '' }}</span> </td>
                        <td class="center">{{ $item->name }}</td>
                        <td class="center">{{ $item->city->title }}</td>
                        <td class="center"><a  href="{{url('/cv/'.$item->cv.'')}}" target="_blank" >{{ $item->cv  }}</a> </td>
                        <td class="center"><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                        <td class="center"><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                        <td class="center">{{ $item->gender() }}</td>
                        <td class="center">
                            {!! $item->status() !!}
                        </td>
                        <td>
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href=" {{ route('jobs_apply.edit',$item->id) }}" class="editIcon">
                                    <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                        </td>
                        <td class="center">{{ $item->created_at->toDateString() }}</td>
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
