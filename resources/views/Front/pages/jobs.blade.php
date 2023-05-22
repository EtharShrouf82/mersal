@extends('Front.master.master')
@section('content')

    <section class="products-page">
        <div class="circle-shape top-start"></div>
        <div class="circle-shape bottom-start"></div>
        <div class="circle-shape end"></div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-4 col-lg-5 sidebar products-page products-filter">
                        <div class="sidebar-widget recent-posts">
                            <div class="widget-inner">
                                <div class="sidebar-title">
                                    <h4>{{ __('translations.Our Services') }}</h4>
                                </div>
                                @foreach($services as $service)
                                    @if($service->follow == 3)
                                        <div class="post">
                                            <figure class="post-thumb">
                                                <img src="{{ $service->icon }}" alt="">
                                            </figure>
                                            <h5 class="text">{{ $service->title }}</h5>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="products-wrapper">
                        <div class="row gy-4">
                            @foreach($jobs as $job)
                                <div class="col-xl-4 col-sm-6 anim">
                                    <div class="product-card job_card">
                                        <div class="card">
                                            <a
                                                class="card-img-wrap image-placeholder"
                                                href="/job/{{ $job->id }}/{{ make_slug($job->title) }}"
                                                title="{{ $job->title }} | {{ $settings->site_name }}"
                                            >
                                                <img
                                                    loading="lazy"
                                                    src="{{ $job->img }}"
                                                    class="card-img-top"
                                                    alt="{{ $job->title }} | {{ $settings->site_name }}"
                                                    title="{{ $job->title }} | {{ $settings->site_name }}"
                                                />
                                            </a>

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $job->title }}</h5>
                                                <div class="card-price-cta-wrap">
                                                    <strong>{{ $job->end_date }}</strong>
                                                    <a href="/job/{{ $job->id }}/{{ make_slug($job->title) }}"
                                                       class="card-cta">
                                                        <svg class="svg-transition" xmlns="http://www.w3.org/2000/svg"
                                                             width="10.766" height="11.181" viewBox="0 0 10.766 11.181">
                                                            <g id="Icon_feather-arrow-left"
                                                               data-name="Icon feather-arrow-left"
                                                               transform="translate(0.5 0.707)">
                                                                <path id="Path_6" data-name="Path 6" d="M0,0H9.766"
                                                                      transform="translate(0 4.883)" fill="none"
                                                                      stroke="#393939" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1"/>
                                                                <path id="Path_7" data-name="Path 7"
                                                                      d="M0,0,4.883,4.883,0,9.766"
                                                                      transform="translate(4.883)" fill="none"
                                                                      stroke="#393939" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1"/>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
