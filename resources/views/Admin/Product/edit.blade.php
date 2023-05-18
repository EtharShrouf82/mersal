@extends('Admin.main')
@section('title','تعديل المنتج')
@section('content')
    <div class="page-header">
        <div class="right page-title">تعديل منتج باللغة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h5 class="mb-2">إسم المنتج</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                            <input class="form-control" value="{{ $product->title }}" type="text" id="name"
                                   placeholder="الرجاء إدخال إسم المنتج" name="title"
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
                                   @if($product->status==1) checked @endif
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
                                   @if($product->status==0) checked @endif
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
                <h5 class="mb-2">وصف المنتج</h5>
                <div>
                    <div class="mt-2 @if(LaravelLocalization::setLocale() == 'en') entd @endif">
                        <textarea id="description" class="edit form-control" name="description">
                            {{ $product->description }}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="card m-3">
            <div class="card-body">
                        <h5 class="mb-2">قسم المنتج الرئيسي</h5>
                        <div>
                            <select dir="rtl" required multiple class="form-control select2" name="cat_id[]" id="cats">
                                    class="form-control select2" name="cat_id[]">
                                @foreach($cats as $cat)
                                    {{ $cat }}
                                    <option
                                        {{ $product->cats->pluck('id')->contains($cat->id) ? 'selected' : '' }}
                                        value="{{ $cat->id }}">
                                        {{ $cat->translations->title ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                </div>
            </div>
        </div>

        <div class="card m-3" id="section-5">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-2"> Sku </h5>
                </div>

                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div>
                                <label for="price" class="form-label">السعر</label>
                                <input value="{{ $product->price }}" type="number" min="0" step="0.0001" id="price" name="price"
                                       placeholder="سعر المنتج" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="price" class="form-label">حالة السعر (الظهور بالموقع)</label>
                            <div class="clearfix"></div>
                            @error('price_hidden')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                       @if($product->status==1) checked @endif
                                       type="radio"
                                       value="1"
                                       name="price_hidden"
                                       id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    نعم
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                       @if($product->status==0) checked @endif
                                       type="radio"
                                       value="0"
                                       name="price_hidden"
                                       id="flexRadioDefault2"
                                >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    لا
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            <!--for variation row end-->
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 float-right">
                        <h5 class="mb-2">صورة المنتج الرئيسية</h5>
                        @error('vimg')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div>
                            <label class="custom-file">
                                <input type="file" id="mainPic" class="custom-file-input">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <span id="mainPicShow">
                                <div class="row">
                                    <div class="col-4 mt-2 mb-2">
                                        <div class="imgBox">
                                           @if(old('vimg') == '')
                                                <img src="{{ $product->img }}" alt="" title="">
                                            @else
                                                <img src="/images/products/{{ old('vimg') }}" alt="" title="">
                                                <input type="hidden" name="vimg" value="{{ old('vimg') }}"/>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">صور أخرى للمنتج</h5>
                <div class="mt-5">
                    <label class="custom-file">
                        <input type="file" multiple id="multiple_files" class="custom-file-input">
                        <span class="custom-file-control custom-file-control-primary"></span>
                    </label>
                    <div class="progress mt-2 mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="row" id="otherImages">
                        @if($product->images)
                            @foreach($product->images as $img)
                                <div class="col-3">
                                    <div class="imgBox">
                                        <a class="deleteIcon" id="{{ $img->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <img src="/images/products/{{ $img->img }}" alt="" title="">
                                    </div>
                                </div>
                            @endforeach
                        @endif
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
    @include("Admin.Product.jquery");
@endsection
