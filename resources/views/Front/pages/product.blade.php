@extends('Front.master.master')
@section('content')
    <section class="product-page">
        <div class="circle-shape top"></div>
        <div class="circle-shape bottom"></div>

        <section class="product-card">
            <div class="container">
                <div class="product-card-inner anim">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="product-card-gallery">
                                <div class="main-image-wrap">
                                    <img
                                        class="img-full"
                                        src="{{ $product->img }}"
                                        alt="{{ $product->title }} | {{ $settings->site_name }}"
                                        title="{{ $product->title }} | {{ $settings->site_name }}"
                                    />
                                </div>
                                <div class="gallery-items-wrap">
                                    <div class="row gx-3">
                                        @foreach($product->images as $img)
                                            <div class="col">
                                                <div class="image-gallery-item-wrap">
                                                    <img
                                                        class="image-gallery-item img-full"
                                                        src="{{ asset("/images/products/".$img->img) }}"
                                                        alt="{{ $product->title }} | {{ $settings->site_name }}"
                                                        title="{{ $product->title }} | {{ $settings->site_name }}"
                                                    />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-card-content">
                                <h4 class="text-black title-price-wrap">
                                    <span class="title">{{ $product->title }}</span>
                                    <span class="price">{{ $product->price }} ILS</span>
                                </h4>
                                <div class="tags-wrapper">
                                    @foreach($product->cats as $cat)
                                        <div class="tag">{{ $cat->title }}</div>
                                    @endforeach
                                </div>
                                <div class="description mt-5">
                                    <p>{!! $product->description !!}</p>
                                </div>
                                @include("Front.inc.partials.whats_call_subscribe")
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="similar-products">
            <div class="container">
                <h2 class="text-black position-relative">
                    <span> {{ __('translations.Similar Products') }} </span>
                    <a href="{{ route('products') }}" title="Show More">{{ __("translations.Show More") }}</a>
                    <div class="star-shape">
                        <img
                            class="img-fluid"
                            src="{{ asset('/Front/assets/images/star.svg') }}"
                            alt="maraseel"
                        />
                    </div>
                </h2>
                <div class="row gy-4">
                    @foreach($products as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-6 security mix anim">
                            @include("Front.components.product")
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
    @push('scripts')
        <script>
            $('.image-gallery-item-wrap').on('click', function () {
                $('.image-gallery-item-wrap').removeClass('active');
                $(this).addClass('active');
                $('.main-image-wrap')
                    .children('img')
                    .attr('src', $(this).children('img').attr('src'));
            });

            // $('#readmoreBtn').on('click', function () {
            //     var neighborParag = $(this).siblings('p');
            //     neighborParag.toggleClass('expand');
            //     if (neighborParag.hasClass('expand')) {
            //         $(this).text('Read less...');
            //     } else {
            //         $(this).text('Read more...');
            //     }
            // });
        </script>
    @endpush
@endsection
