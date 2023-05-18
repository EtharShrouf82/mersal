@extends('Admin.main')
@section('title','الرسائل')
@section('content')
    <div class="page-header">
        <div class="right page-title">الرسائل</div>
        @include("Admin.Components.navbarButton")
    </div>
    <a class="addNew" data-toggle="modal" data-target="#insertModal" href=""><i class="fa fa-pencil fa-2x"
                                                                                aria-hidden="true"></i></a>
    @if($contact->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col">الإسم</th>
                    <th scope="col" class="center">رقم الهاتف</th>
                    <th scope="col" class="center">البريد الإلكتروني</th>
                    <th scope="col" class="center">الرسالة</th>
                    @can('edit_contact_us')
                        <th scope="col" class="center">الحالة</th>
                    @endcan
                    @can('reply_contact')
                        <th scope="col" class="center">الرد</th>
                    @endcan
                    <th scope="col" class="center">تاريخ الرسالة</th>
                    @can('delete_contact_us')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($contact as $item)
                    <tr class="data-tr">
                        <th scope="row" class="center">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->tel }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->message }}</td>
                        @can('edit_contact_us')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                        @endcan
                        @can('reply_contact')
                            <td class="center">
                                <a href="/admin/contact_us/show/{{ $item->id }}">
                                    <span title="الرد" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-reply action-icon" aria-hidden="true"></i>
                                    </span>
                                </a>
                        @endcan
                        <td>{{ $item->created_at }}</td>
                        @can('delete_contact_us')
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
        {{ $contact->links() }}
    @else
        <div class="alert alert-danger">لا يوجد رسائل</div>
    @endif
    <script>
        $(document).ready(function () {
            jsSwitch("{{ route('contact_us.update.status') }}")
            deleteItem("contact_us/");
        });
    </script>
@endsection
