<div class="product-card">
    <div class="card">
        <a
            class="card-img-wrap image-placeholder"
            href="/product/{{ $product->id }}/{{ make_slug($product->title) }}"
            title="Product Name"
        >
            <img
                loading="lazy"
                src="{{ $product->img }}"
                class="card-img-top"
                alt="{{ $product->title }} | {{ $settings->site_name }}"
            />
        </a>

        <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <div class="card-price-cta-wrap">
                <strong>{{ $product->price }} ILS</strong>
                <a href="/product/{{ $product->id }}/{{ make_slug($product->title) }}" class="card-cta">
                    <svg class="svg-transition" xmlns="http://www.w3.org/2000/svg" width="10.766" height="11.181" viewBox="0 0 10.766 11.181" > <g id="Icon_feather-arrow-left" data-name="Icon feather-arrow-left" transform="translate(0.5 0.707)" > <path id="Path_6" data-name="Path 6" d="M0,0H9.766" transform="translate(0 4.883)" fill="none" stroke="#393939" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" /> <path id="Path_7" data-name="Path 7" d="M0,0,4.883,4.883,0,9.766" transform="translate(4.883)" fill="none" stroke="#393939" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" /> </g> </svg>
                </a>
            </div>
        </div>
    </div>
</div>
