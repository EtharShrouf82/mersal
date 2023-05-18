@extends('Admin.main')
@section('title','تعديل السعر')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل السعر باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('prices.update', $price->id) }}">
        @csrf
        @method('PUT')
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-2">الرجاء إختيار النوع</h5>
                        @error('screen_type_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <select class="form-control" id="screen_type_id" name="screen_type_id" required>
                            <option value="">الرجاء إختيار النوع</option>
                            @foreach($screenTypes as $type)
                                <option @if($price->screen_type_id == $type->id) selected @endif value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <h5 class="mb-2">الرجاء إختيار الخطة</h5>
                        @error('plan_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div id="plans">
                            <span></span>
                            <select class="form-control" name="plan_id" required>
                                @foreach($plans as $plan)
                                    <option @if($price->plan_id == $plan->id) selected @endif value="{{ $plan->id }}">{{ $plan->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body @if(LaravelLocalization::setLocale() == 'en') entd @endif">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-2">إسم للشاشة</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input value="{{ $price->title }}" type="text" class="form-control" name="title" required placeholder="الرجاء إدخال الإسم"/>
                    </div>
                    <div class="col-6">
                        <label for="price" class="form-label">حالة (الظهور بالموقع)</label>
                        <div class="clearfix"></div>
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   @if($price->status ==1) checked @endif
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
                                   @if($price->status ==0) checked @endif
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
            <div class="card-body @if(LaravelLocalization::setLocale() == 'en') entd @endif">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-2">الرجاء إدخال السعر</h5>
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="number" value="{{ $price->price }}" class="form-control" name="price" required placeholder="الرجاء إختيار السعر"/>
                    </div>

                    <div class="col-6">
                        <h5 class="mb-2">الخصم إن وجد</h5>
                        <input type="number" value="{{ $price->discount }}" class="form-control" name="discount" required placeholder="الرجاء إدخال الخصم"/>
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
@include("Admin.Prices.jquery")
@endsection
