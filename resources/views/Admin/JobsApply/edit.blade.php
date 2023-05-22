@extends('Admin.main')
@section('title','ملاحظات الأدمن')
@section('content')
    <div class="page-header">
        <div class="right page-title">ملاحظات الأدمن {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('jobs_apply.update', $job->id) }}">
        @csrf
        @method('PUT')
        <div class="card m-3">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>إسم الوظيفة</td>
                        <td>{{ $job->job->title }}</td>
                        <td>إسم المتقدم</td>
                        <td>{{ $job->name }}</td>
                    </tr>
                    <tr>
                        <td>المدينة</td>
                        <td>{{ $job->city->title }}</td>
                        <td>رقم الهاتف</td>
                        <td>{{ $job->tel }}</td>
                    </tr>
                    <tr>
                        <td>البريد الإلكتروني</td>
                        <td>{{ $job->email }}</td>
                        <td>الجنس</td>
                        <td>{{ $job->gender() }}</td>
                    </tr>
                </table>
                <h5 class="mb-2">ملاحظات</h5>
                <div>
                    <div class="mt-2">
                        <textarea id="description" class="form-control" name="user_note">{{ $job->user_note }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-block">تعديل</button>
            </div>
        </div>
        <br/>
    </form>
@endsection
