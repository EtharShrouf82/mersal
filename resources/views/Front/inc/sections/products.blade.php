<section id="products" class="products">
    <div
        class="container bg-cover"
        style="background-image: url(/asset/images/products-bg.png)"
    >
        <div class="products-title-category-wrapper">
            <h2 class="anim">Our Products</h2>
            <div class="products-categories-wrapper anim">
                <button type="button" data-filter="all">All</button>
                <button type="button" data-filter=".security">Security</button>
                <button type="button" data-filter=".networking">Networking</button>
                <button type="button" data-filter=".accounting">Accounting</button>
                <button type="button" data-filter=".office">Office</button>
                <button type="button" data-filter=".others">Others</button>
            </div>
        </div>

        <div class="products-items-wrapper">
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-xl-3 col-lg-4 col-sm-6 security mix anim">
                        @include("Front.components.product")
                    </div>
                @endforeach
            </div>
            <div
                class="products-cta-wrap d-flex align-item-center justify-content-center"
            >
                <a href="{{ route('products') }}" class="btn primary-btn with-icon">
                    <span>All Products</span>
                    <span>
                <svg
                    class="svg-transition"
                    xmlns="http://www.w3.org/2000/svg"
                    width="5.914"
                    height="9.828"
                    viewBox="0 0 5.914 9.828"
                >
                  <path
                      id="Icon_feather-chevron-down"
                      data-name="Icon feather-chevron-down"
                      d="M0,3.5,3.5,0,7,3.5"
                      transform="translate(4.914 1.414) rotate(90)"
                      fill="none"
                      stroke="#fff"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                  />
                </svg>
              </span>
                </a>
            </div>
        </div>
    </div>
</section>
