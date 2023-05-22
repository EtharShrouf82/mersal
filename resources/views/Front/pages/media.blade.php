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
        <div class="page-title-round ani-move"></div>
        <img src="{{ asset('/Front/assets/images/dots2-3.png') }}"
             class="position-absolute right-5 bottom-5 ani-top-bottom z-index-3 d-none d-sm-block"
             alt="Pagetitleicon">
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
                        <div class="product-card-content" id="media">
                            <div class="service-title">
                                <h2 class="anim">Work Sample</h2>
                                <div class="service-categories anim mt-3">
                                    <button type="button" data-filter="all">All</button>
                                    @foreach($services as $service)
                                        <button type="button" data-filter=".service{{$service->id}}">{{ $service->title }}</button>
                                    @endforeach
                                </div>
                                <div class="service-work-sample row mt-5">
                                    @foreach($workSamples as $work)
                                        <div class="gallery-item  col-xl-3 col-lg-4 col-sm-6 service{{$work->service_id}} mix anim">
                                            <div class="overlay-box">
                                                <a href="{{ asset($work->img) }}" title="{{ $settings->site_name }}" class="inner-box">
                                                    <div class="image">
                                                        <img class="img-full" loading="lazy" src="{{ asset($work->img) }}" alt="{{ $settings->site_name }}">
                                                    </div>
                                                    <div class="cap-box">
                                                        <div class="cap-inner">
                                                            <div class="cat">
                                                                <span>{{ $work->title }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-5 mb-5"></div>
                            @include("Front.inc.partials.whats_call_subscribe")
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
