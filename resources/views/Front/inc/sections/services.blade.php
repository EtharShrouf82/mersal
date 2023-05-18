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
                        <p>Find Peace Of Mind With 24/7 Monitoring</p>
                        <h4>Smart Security Systems That Fits Your Business!</h4>
                    </div>
                </div>
                <div class="col-lg-6 anim">
                    <div class="services-end-content">
                        <p>
                            Because a commercial security camera system has to produce
                            results, we offer what most security camera companies can’t.
                            For CCTV installation companies, it’s important to treat cctv
                            camera installation with a modern approach. Our security
                            camera system installation department is just passionate about
                            security installation and software.
                        </p>
                        <button class="btn primary-btn with-icon anim">
                            <span>How Does It Work?</span>
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
                        </button>
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
                                                <img src="{{ $service->icon }}" alt="" title=""/>
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
