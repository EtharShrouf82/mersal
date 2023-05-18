@extends('Front.master.master')
@section('content')
    <header
        class="pages-header bg-cover"
        style="background-image: url({{ asset('/Front/assets/images/page-bg.png') }})"
    >
        <div class="container">
            <div class="inner-wrapper anim">
                <h1 class="h2">Services And Products</h1>
            </div>
        </div>
    </header>
    <section class="product-page">
        <div class="circle-shape top"></div>
        <div class="circle-shape bottom"></div>
        <section class="product-card">
            <div class="container">
                <div class="product-card-inner anim">
                    <div class="row g-4">
                        <div class="product-card-content">
                            <h4 class="text-black title-price-wrap">
                                <span class="title">{{ $service->title }}</span>
                            </h4>
                            <div class="description mt-5">
                                <h6 class="text-black">Description</h6>
                                <p>{!! $service->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-card mt-5">
            <div class="container">
                <div class="product-card-inner anim">
                    <div class="row g-4">
                        <div class="product-card-content service-info">
                            <h2 class="text-black center title-price-wrap mb-5">
                                <span class="title">{{ $service->title }}</span>
                            </h2>
                            @foreach($service->info as $info)
                                <div class="row anim">
                                    @if($loop->even)
                                        <div class="col-5">
                                            <div class="service-info-img">
                                                <img src="{{ $info->img }}" alt="" title="" />
                                                <div class="service-info-box service-right">
                                                    <h5>{{ $info->box_title }}</h5>
                                                    <p class="mt-2">{!! $info->box_description !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-5">
                                            <h4 class="mt-3">{{ $info->boxTitle }}</h4>
                                            <h3 class="mt-3 mb-3">{{ $info->title }}</h3>
                                            <p class="mt-3">
                                                {!! $info->description !!}
                                            </p>
                                        </div>
                                    @else
                                        <div class="col-5">
                                            <h4 class="mt-3">{{ $info->boxTitle }}</h4>
                                            <h3 class="mt-3 mb-3">{{ $info->title }}</h3>
                                            <p class="mt-3">
                                                {!! $info->description !!}
                                            </p>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-5">
                                            <div class="service-info-img">
                                                <img src="{{ $info->img }}" alt="" title="" />
                                                <div class="service-info-box service-left">
                                                    <h5>{{ $info->box_title }}</h5>
                                                    <p class="mt-2">{!! $info->box_description !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if($loop->last)
                                @else
                                    <div class="mt-5 mb-5"><hr/></div>
                                @endif
                            @endforeach
                            <div class="mt-5 mb-5"></div>
                            <div class="order-service-wrap mt-5">
                                <div class="play-btn-wrapper d-flex align-items-center justify-content-center">
                                    <div class="mr-5">Order This Service</div>
                                    <div class="play-btn play-service-button ml-5 mr-5">
                                        <button tabindex="0">
                                            <i class="fa-brands fa-whatsapp fa-beat-fade fa-2x" style="color: #ffffff;"></i>
                                        </button>
                                    </div>
                                    <div class="ml-5">
                                        Or Call<br/>
                                        02 01061245741
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
