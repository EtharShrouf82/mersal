<section class="services-section-two" id="services">
    <div class="circle-shape top"></div>
    <div class="circle-shape bottom"></div>
    <div class="container">
        <div class="sec-title">
            <!--Title Block-->
            <div class="row clearfix">
                <div class="column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <h2>{{ __('translations.lets') }} <br>{{ __('translations.together') }}<span class="dot">.</span></h2>
                </div>
                <div class="column position-relative col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="lower-text">
                        {{ $settings->translations->site_description }}
                        <div class="top-rotate-shape">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve" > <defs> <path id="circlePath" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 " ></path> </defs> <circle cx="150" cy="100" r="75" fill="none"></circle> <g> <use xlink:href="#circlePath" fill="none"></use> <text> <textPath xlink:href="#circlePath"> Modern Technology and Expert Technicians </textPath> </text> </g> </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services">
            <div class="row clearfix">
                @foreach($services as $service)
                    @if($service->follow == 3)
                        <div class="service-block-two anim col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="bottom-curve"></div>
                                <div class="icon-box">
                                    <img src="{{ asset($service->icon) }}"
                                         alt="{{ $service->title }} | {{ $settings->site_name }}"
                                         title="{{ $service->title }} | {{ $settings->site_name }}" />
                                </div>
                                <h5>{{ $service->title }}</h5>
                                <div class="text">{{ $service->description }}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
