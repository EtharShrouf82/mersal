<header class="header">
    <div id="header-slider" class="slider header-slider">
        @foreach($sliders as $slider)
            <div class="header-slide-item bg-cover" style="background-image: url('{{ $slider->img }}')">
                <div class="container">
                    <div class="slide-content">
                        <div class="row gy-0">
                            <div class="col-xxl-6 col-lg-8">
                                <h1 class="anim">{{ $slider->title }}</h1>
                                <p class="anim">{{ $slider->description }}</p>
                                @if($slider->link)
                                    <a href="{{ $slider->link }}" class="btn primary-btn with-icon anim">
                                        <span>{{ $slider->button_title }}</span>
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
                                @endif

                            </div>
                            <div class="col-xxl-6 col-lg-4">
                                <div
                                    class="play-btn-wrapper d-flex align-items-center justify-content-center"
                                >
                                    <div class="play-btn">
                                        <button>
                                            <svg
                                                class="svg-transition"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="36"
                                                height="38"
                                                viewBox="0 0 36 38"
                                            >
                                                <path
                                                    id="Polygon_3"
                                                    data-name="Polygon 3"
                                                    d="M16.347,5.027a3,3,0,0,1,5.306,0L35.678,31.6A3,3,0,0,1,33.024,36H4.976a3,3,0,0,1-2.653-4.4Z"
                                                    transform="translate(36) rotate(90)"
                                                    fill="#fff"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="page-title-round ani-move"></div>
    <div class="d-none d-sm-inline-block p-10 bg-transparent border border-width-2 border-secondary position-absolute bottom-5 rounded-circle right ani-top-bottom z-index-3"></div>
    <button class="next-header-arrow">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="17.828"
            height="32.656"
            viewBox="0 0 17.828 32.656"
        >
            <path
                id="Icon_feather-chevron-left"
                data-name="Icon feather-chevron-left"
                d="M13.5,37.414,27.707,23.207,13.5,9"
                transform="translate(-11.379 -6.879)"
                fill="none"
                stroke="#fff"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="3"
            />
        </svg>
    </button>
    <button class="prev-header-arrow">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="17.828"
            height="32.656"
            viewBox="0 0 17.828 32.656"
        >
            <path
                id="Icon_feather-chevron-left"
                data-name="Icon feather-chevron-left"
                d="M27.707,37.414,13.5,23.207,27.707,9"
                transform="translate(-12 -6.879)"
                fill="none"
                stroke="#fff"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="3"
            />
        </svg>
    </button>
</header>
