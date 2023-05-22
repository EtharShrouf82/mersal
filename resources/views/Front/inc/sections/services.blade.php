<section
    id="services"
    class="services bg-cover black-fade"
    style="background-image: url('{{ asset('/Front/assets/images/services-bg.png')  }}')"
>
    <div class="inner-wrapper">
        <div class="circle-shape start"></div>
        <div class="circle-shape end"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 anim">
                    <div class="services-start-content">
                        <p>{{ $home_setting->translations->cctv_title }}</p>
                        <h4>{{ $home_setting->translations->cctv_title_two }}</h4>
                    </div>
                </div>
                <div class="col-lg-6 anim">
                    <div class="services-end-content">
                        <p>{{ $home_setting->translations->cctv_description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="services-cards-wrapper">
            <div class="container">
                <div class="row g-0">
                    @foreach($services as $service)
                        @if($service->follow == 1)
                            <div class="col-lg-3 col-sm-6 anim">
                                <a href="/service/{{ $service->id }}/{{ make_slug($service->title) }}">
                                    <div class="services-card">
                                        <div class="card-content">
                                            <div class="card-icon">
                                                <img src="{{ $service->icon }}"
                                                     alt="{{ $service->title }} | {{ $settings->site_name }}"
                                                     title="{{ $service->title }} | {{ $settings->site_name }}"/>
                                            </div>
                                            <div class="card-content">
                                                <h5>{{ $service->title }}</h5>
                                                <p>
                                                    {{ \Illuminate\Support\Str::limit($service->description, 150, $end='...') }}
                                                </p>
                                                <div class="card-cta">
                                                    <button>
                          <span class="cta-icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="3.541"
                                height="6.081"
                                viewBox="0 0 3.541 6.081"
                            >
                              <path
                                  id="Icon_feather-chevron-down"
                                  data-name="Icon feather-chevron-down"
                                  d="M0,2.334,2.334,0,4.667,2.334"
                                  transform="translate(3.041 0.707) rotate(90)"
                                  fill="none"
                                  stroke="#fff"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1"
                              />
                            </svg>
                          </span>
                                                        <span>Explore More</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
