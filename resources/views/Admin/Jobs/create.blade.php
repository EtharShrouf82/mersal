@extends('Admin.main')
@section('title','إضافة وظيفة')
@section('content')
    <div class="page-header">
        <div class="right page-title">إضافة وظيفة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h5 class="mb-2">إسم الوظيفة</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input class="form-control" value="{{ old('title') }}" type="text" id="name"
                               placeholder="الرجاء إدخال إسم الوظيفة" name="title"
                               required="">
                    </div>
                    <div class="col-4">
                        <label for="price" class="form-label">حالة (الظهور بالموقع)</label>
                        <div class="clearfix"></div>
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   @if(old('status')==1) checked @endif
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
                                   @if(old('price_hidden')==0) checked @endif
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
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div>
                    <div class="mt-2">
                        <textarea id="description" class="edit form-control"
                                  name="description">{{ old('description') }}</textarea>
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
                            @if(old('vimg'))
                                <img style="max-width: 100px" src="/images/jobs/{{ old('vimg') }}"/>
                                <input type="hidden" name="vimg" value="{{ old('vimg') }}">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="mb-2">تاريخ إنتهاء طلب التقديم</h5>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-block">إضافة</button>
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
