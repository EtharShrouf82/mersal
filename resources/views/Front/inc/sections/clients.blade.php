<section
    id="clients"
    class="clients bg-cover black-fade"
    style="background-image: url({{ asset('/Front/assets/images/clients-bg.png') }})"
>
    <div class="container">
        <div class="top-content">
            <h2 class="anim">Our Clients</h2>
            <p class="anim">
                We have provided the best plus affordable web development services
                to numerous large as well as medium entrepreneurs.
            </p>
        </div>
    </div>
    <div class="clients-slider-wrapper anim">
        <div class="container">
            <div id="clients-slider" class="slider clients-slider">
                @foreach($clients as $client)
                    <div class="clients-slide-item">
                        <a class="client-slide-img-wrappe">
                            <img
                                class="img-fluid"
                                src="{{ $client->img }}"
                                alt="client-1"
                            />
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="prev-arrow carousel-arrow">
                <svg
                    class="svg-transition"
                    xmlns="http://www.w3.org/2000/svg"
                    width="15.704"
                    height="16.532"
                    viewBox="0 0 15.704 16.532"
                >
                    <g
                        id="Icon_feather-arrow-left"
                        data-name="Icon feather-arrow-left"
                        transform="translate(1 1.414)"
                    >
                        <path
                            id="Path_6"
                            data-name="Path 6"
                            d="M13.7,0H0"
                            transform="translate(0 6.852)"
                            fill="none"
                            stroke="#0b0d39"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                        <path
                            id="Path_7"
                            data-name="Path 7"
                            d="M6.852,0,0,6.852,6.852,13.7"
                            transform="translate(0)"
                            fill="none"
                            stroke="#0b0d39"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                    </g>
                </svg>
            </button>
            <button class="next-arrow carousel-arrow">
                <svg
                    class="svg-transition"
                    xmlns="http://www.w3.org/2000/svg"
                    width="15.704"
                    height="16.532"
                    viewBox="0 0 15.704 16.532"
                >
                    <g
                        id="Icon_feather-arrow-left"
                        data-name="Icon feather-arrow-left"
                        transform="translate(1 1.414)"
                    >
                        <path
                            id="Path_6"
                            data-name="Path 6"
                            d="M0,0H13.7"
                            transform="translate(0 6.852)"
                            fill="none"
                            stroke="#fff"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                        <path
                            id="Path_7"
                            data-name="Path 7"
                            d="M0,0,6.852,6.852,0,13.7"
                            transform="translate(6.852)"
                            fill="none"
                            stroke="#fff"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                    </g>
                </svg>
            </button>
        </div>
    </div>
</section>
