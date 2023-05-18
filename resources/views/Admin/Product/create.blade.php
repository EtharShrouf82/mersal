@extends('Admin.main')
@section('title','إضافة منتج')
@section('content')
    <div class="page-header">
        <div class="right page-title">إضافة منتج باللغة باللغة {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h5 class="mb-2">إسم المنتج</h5>
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input class="form-control" value="{{ old('title') }}" type="text" id="name"
                               placeholder="الرجاء إدخال إسم المنتج" name="title"
                               required="">
                        <span class="fs-sm text-muted">إجباري ويفضل أن يكون فريد</span>
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
                <h5 class="mb-2">وصف المنتج</h5>
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
                <h5 class="mb-2"><span class="text-danger required mr-2">*</span>القسم</h5>
                @error('cat_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div>
                    <select dir="rtl" required multiple class="form-control select2" name="cat_id[]" id="cats">
                        <option value="">الرجاء اختيار قسم المنتج</option>
                        @foreach($cats as $cat)
                            <option
                                @if (old("cat_id")){{ (in_array($cat->id, old("cat_id")) ? "selected":"") }}@endif
                                    value="{{ $cat->id }}">
                                    {{ $cat->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="card m-3" id="section-5">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-lg-6">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div>
                            <label for="price" class="form-label">السعر</label>
                            <input value="{{ old('price') }}"
                                   type="number"
                                   min="0"
                                   step="0.0001"
                                   id="price"
                                   name="price"
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
                                   @if(old('price_hidden')==1) checked @endif
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
                                   @if(old('price_hidden')==0) checked @endif
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
                <h5 class="mb-2">صورة المنتج الرئيسية</h5>
                @error('vimg')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-danger">أبعاد الصوره 646 * 250</div>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <div id="uploaded_image">
                            @if(old('vimg'))
                                <img style="max-width: 100px" src="/images/products/{{ old('vimg') }}"/>
                                <input type="hidden" name="vimg" value="{{ old('vimg') }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card m-3">
            <div class="card-body">
                <h5 class="mb-2">صور أخرى للمنتج</h5>
                @error('oimg')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div>
                    <label class="custom-file">
                        <input type="file" multiple id="multiple_files" class="custom-file-input">
                        <span class="custom-file-control custom-file-control-primary"></span>
                    </label>
                    <div class="progress mt-2 mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div id="success">
                        <div class="row" id="otherImages">
                            @if(old('oimg') != null)
                                @foreach(old('oimg') as $img)
                                    <div class=" col-3">
                                        <div class="imgBox">
                                            <a class="deleteIcon" id="{{ $img }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <img src="/images/products/{{ $img }}" alt="" title="">
                                        </div>
                                    </div><input type="hidden" name="oimg[]" value="{{ $img }}"/>
                                @endforeach
                            @endif
                        </div>
                        <label></label>
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
    @include("Admin.Product.jquery");
@endsection
