<section class="digital-signages">
    <div class="outlined-circle top"></div>
    <div class="outlined-circle bottom"></div>
    <div class="stair-shape">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="44.407"
            height="44.1"
            viewBox="0 0 44.407 44.1"
        >
            <g
                id="Group_144"
                data-name="Group 144"
                transform="translate(2.5 2.5)"
            >
                <path
                    id="Path_265"
                    data-name="Path 265"
                    d="M1702.522,10345.562l-19.758-.248.141,19.668"
                    transform="translate(-1663.146 -10345.313)"
                    fill="none"
                    stroke="#35A8E0"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="5"
                />
                <path
                    id="Path_266"
                    data-name="Path 266"
                    d="M1722.14,10364.981l-19.758-.251.141,19.665"
                    transform="translate(-1702.381 -10345.313)"
                    fill="none"
                    stroke="#35A8E0"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="5"
                />
            </g>
        </svg>
    </div>
    <div
        class="container bg-cover"
        style="background-image: url({{ asset('/Front/assets/images/signages-bg.png') }})"
    >
        <div class="row position-relative gy-4">
            <div class="col-lg-5">
                <div class="signages-area-section">
                    <p class="text-white anim">Choose An Area On The Map ></p>
                    <div class="anim position-relative">
                        @include("Front.inc.partials.map")
                        <button class="point nablus_point" data-src="{{ asset('Front/city/nablus.png') }}">
                            <span> </span>
                        </button>
                        <button class="point hebron_point" data-src="{{ asset('Front/city/hebron.png') }}">
                            <span> </span>
                        </button>
                        <button class="point bethlehem_point" data-src="{{ asset('Front/city/beith_lehem.png') }}">
                            <span> </span>
                        </button>
                        <button class="point jericho_point" data-src="{{ asset('Front/city/jericho.png') }}">
                            <span> </span>
                        </button>
                        <button class="point ramallah_point" data-src="{{ asset('Front/city/ramallah.png') }}">
                            <span> </span>
                        </button>
                        <button class="point qalqilia_point" data-src="{{ asset('Front/city/qalqilia.png') }}">
                            <span> </span>
                        </button>
                        <button class="point tulkarem_point" data-src="{{ asset('Front/city/tulkarem.png') }}">
                            <span> </span>
                        </button>
                        <button class="point jenin_point" data-src="{{ asset('Front/city/jenin.png') }}">
                            <span> </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content">
                    <h2 class="upper-case text-white anim">DIGITAL SIGNAGES</h2>
                    <p class="text-white anim">
                        Digital advertising technology is one of the most important
                        modern technologies for advertising
                    </p>
                    <div class="signages-viewer anim" id="signages-viewer">
                        <img
                            class="img-full"
                            src="{{ asset('Front/assets/images/signages.png') }}"
                            alt="DIGITAL SIGNAGES"
                        />
                        <div class="play-bt-wrap">
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
</section>
