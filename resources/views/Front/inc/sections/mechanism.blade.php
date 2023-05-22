<section
    id="mechanism-of-action"
    class="mechanism bg-cover"
    style="background-image: url({{ asset('Front/assets/images/mechanism-bg.svg') }})"
>
    <div class="container">
        <div class="content">
            <h2 class="primary-text anim">
            <span>
                {{ __('translations.mechanism') }}
              <div class="maraseel-shape">
                <img
                    class="img-fluid"
                    src="{{ asset('/Front/assets/images/maraseel-shape.png') }}"
                    alt="maraseel"
                />
              </div>
              <div class="star-shape">
                <img
                    class="img-fluid"
                    src="{{ asset('/Front/assets/images/star.svg') }}"
                    alt="maraseel"
                />
              </div>
            </span>
            </h2>
        </div>
        <div class="mechanism-circles-wrapper">
            <div class="row justify-content-center gy-4">
                @foreach($mechanisms as $mechanism)
                    <div class="col-md-3 col-sm-4 col-6 anim">
                        <div class="circle-item circle-item-{{ $loop->index + 1 }}">
                            <div class="number"><span>{{ $loop->index + 1 }}</span></div>
                            <h6>{{ $mechanism->title }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
