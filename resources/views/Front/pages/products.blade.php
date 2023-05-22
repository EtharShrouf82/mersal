@extends('Front.master.master')
@section('content')
    <header
        class="pages-header bg-cover"
        style="background-image: url({{ asset('/Front/assets/images/page-bg.png') }})"
    >
        <div class="container">
            <div class="inner-wrapper anim">
                <h1 class="h2">{{ __('translations.Our Products') }}</h1>
            </div>
        </div>
    </header>

    <section class="products-page"  id="products">
        <div class="circle-shape top-start"></div>
        <div class="circle-shape bottom-start"></div>
        <div class="circle-shape end"></div>
        <div class="container">
            <div class="products-title-category-wrapper products-page-wrapper">
                <h2 class="anim">{{ __('translations.Our Products') }}</h2>
                <div class="products-categories-wrapper anim">
                    <button type="button" data-filter="all">All</button>
                    @foreach($productCats as $ct)
                        <button type="button" data-filter=".class{{ $ct->id }}">{{ $ct->title }}</button>
                    @endforeach
                </div>
            </div>
            <div class="row gy-4 mt-3">
                <div class="products-wrapper">
                    <div class="row gy-4">
                        @foreach($products as $product)
                            <div class="col-xl-3 col-sm-6 @foreach($product->cats as $ct) class{{$ct->pivot->cat_id}} @endforeach mix anim">
                                @include("Front.components.product")
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
