@extends('Admin.main')
@section('title','تعديل الوظيفة')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل الوظيفة باللغة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('jobs.update', $job->id) }}">
        @csrf
        @method('PUT')
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h5 class="mb-2">إسم الوظيفة</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                            <input class="form-control" value="{{ $job->title }}" type="text" id="name"
                                   placeholder="الرجاء إدخال إسم الوظيفة" name="title"
                                   required="">
                            <span class="fs-sm text-muted">إجباري ويفضل أن يكون فريد</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="price" class="form-label">حالة (الظهور بالموقع)</label>
                        <div class="clearfix"></div>
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   @if($job->status==1) checked @endif
                                   value="1"
                                   type="radio"
                                   name="status"
                                   id="flexRadioStatus1">
                            <label class="form-check-label" for="flexRadioStatus1">
                                نعم
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   @if($job->status==0) checked @endif
                                   type="radio"
                                   value="0"
                                   name="status"
                                   id="flexRadioStatus2"
                            >
                            <label class="form-check-label" for="flexRadioStatus2">
                                لا
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">وصف الوظيفة</h5>
                <div>
                    <div class="mt-2 @if(LaravelLocalization::setLocale() == 'en') entd @endif">
                        <textarea id="description" class="edit form-control" name="description">
                            {{ $job->description }}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">صورة الوظيفة الرئيسية</h5>
                @error('vimg')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-danger">أبعاد الصوره 686 * 386</div>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                        <div id="uploaded_image">
                            @if(old('vimg') == '')
                                <img src="{{ $job->img }}" style="max-width: 200px" alt="" title="">
                            @else
                                <img src="/images/jobs/{{ old('vimg') }}" alt="" title="">
                                <input type="hidden" name="vimg" value="{{ old('vimg') }}"/>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="mb-2">تاريخ إنتهاء طلب التقديم</h5>
                        <input type="date" class="form-control" value="{{ $job->end_date }}" name="end_date" required>
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
        {{--            <div class="modal-bottom center">--}}
        {{--                <button type="submit" class="btn btn-primary">إضافة</button>--}}
        {{--            </div>--}}
    </form>
    <script>
        $(document).ready(function () {
            uploadFile("{{ route('uploadJob') }}", "jobs");
        });
    </script>
@endsection
