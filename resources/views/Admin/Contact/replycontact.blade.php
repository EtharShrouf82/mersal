@extends('Admin.main')
@section('title','الرسائل')
@section('content')
    <div class="page-header">
        <div class="right page-title">الرسائل</div>
        @include("Admin.Components.navbarButton")
    </div>
    @if($contact->count() > 0)
        <div class="table-responsive">
            <form method="POST" action="{{ route('contact_us.update', $contact->id) }}">
                @csrf
                @method('PUT')
                <table class="table table table-striped table-bordered">
                    <tr>
                        <td>المرسل</td>
                        <td>{{ $contact->name }}</td>
                    <tr>
                        <td>رقم الهاتف</td>
                        <td>{{ $contact->tel }}</td>
                    </tr>
                    <tr>
                        <td>البريد الإلكتروني</td>
                        <td>
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                            <input type="hidden" name="email_to" value="{{ $contact->email }}" />
                        </td>
                    </tr>
                    <tr>
                        <td>العنوان</td>
                        <td>{{ $contact->title }}</td>
                    </tr>
                    <tr>
                        <td>نص الرسالة</td>
                        <td>{{ $contact->message }}</td>
                    </tr>
                    <tr>
                        <td>تاريخ الرسالة</td>
                        <td>{{ $contact->created_at }}</td>
                    </tr>
                    <tr>
                        <td>تم الرد</td>
                        <td>
                            @if($contact->reply_at == null)
                                <label class="badge badge-danger">لا</label>
                            @else
                                <span>تم الرد بتاريخ {{ $contact->reply_at }} - بواسطة {{ $contact->user->name }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>الرد</td>
                        <td><textarea class="form-control" name="reply" required>{{ $contact->reply_msg }}</textarea> </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="center"><button class="btn btn-primary">إرسال الرد</button></td>
                    </tr>
                </table>
            </form>
        </div>
    @else
        <div class="alert alert-danger">لا يوجد رسائل</div>
    @endif
@endsection
