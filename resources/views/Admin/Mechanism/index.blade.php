@extends('Admin.main')
@section('title','أليات العمل')
@section('content')
    <div class="page-header">
        <div class="right page-title">أليات العمل</div>
        @include("Admin.Components.navbarButton")
    </div>
    @can('add_mechanism')
        <a class="addNew" href="{{ route('mechanism.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($mechanism->count() > 0)
        <div class="row page-header">
            <div class="col-4 center">العنوان</div>
            <div class="col-1 center">الحالة</div>
            <div class="col-2 center">الإداري</div>
            <div class="col-3 center">التاريخ</div>
            <div class="col-1 center">تعديل</div>
            <div class="col-1 center">حذف</div>
        </div>
        @foreach ($mechanism as $item)
            <div id="MainMenu">
            <div class="list-group panel">
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-4 center">
                            <a href="#cat{{$item->id}}" data-toggle="collapse" data-parent="#MainMenu">
                                {{ $item->title }}
                            </a>
                        </div>
                        <div class="col-1 center">{{ $item->status }}</div>
                        <div class="col-2 center">{{ $item->user->name }}</div>
                        <div class="col-3 center">{{ $item->created_at->toDateString() }}</div>
                        <div class="col-1 center">
                                <span title="" data-toggle="tooltip" data-placement="left" data-original-title="تعديل">
                                    <a href="{{ route('mechanism.edit',$item->id) }}" class="editIcon">
                                        <i class="fa fa-pencil-square action-icon cat-fa" aria-hidden="true"></i>
                                    </a>
                                </span>
                        </div>
                        <div class="col-1 center">
                                          <span title="حذف" data-toggle="tooltip" data-placement="left">
                                            <i class="fa fa-trash action-icon cat-fa" id="delete-icon"
                                               deleteid="{{ $item->id }}"
                                               data-toggle="modal" data-target="#deleteModal"
                                               aria-hidden="true"></i>
                                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="alert alert-danger">لا يوجد أقسام</div>
    @endif
    <script>

        $(document).ready(function () {
            deleteItem("mechanism/");
            jsSwitch("{{ route('mechanism.update.status') }}")
        });
    </script>
@endsection
