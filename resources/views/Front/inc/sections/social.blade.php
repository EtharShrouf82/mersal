<section id="social" class="social">
    <div class="social-top-arrow">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="150.014"
            height="148.473"
            viewBox="0 0 150.014 148.473"
        >
            <path
                id="Vector"
                d="M.375,108.628C6.555,97.5,13.122,86.577,19.3,75.448a2.263,2.263,0,0,1,4.249,1.26c0,4.83-.193,9.45-.193,14.28,3.09-3.57,3.863-7.77,4.442-12.81.386-2.1,1.159-4.41,3.283-5.04,3.283-1.05,6.953,2.52,9.464,4.41,6.373,4.83,12.167,10.5,19.12,14.49,8.112,4.41,8.3-1.89,6.567-8.82a90.21,90.21,0,0,0-8.3-21.21c-6.18-11.34-13.326-23.1-15.064-36.33C41.9,18.328,45.375,7.2,53.873,7.617c10.429.42,22.4,8.82,29.163,17.22,3.863,4.2,25.88,35.7,28,17.64,1.545-13.23-8.5-29.4-14.485-40.32C95.783.687,97.715-.783,98.68.477a93.8,93.8,0,0,1,16.223,35.7c1.352,6.93-.773,19.74-10.043,17.01-10.815-3.15-17.961-16.38-24.914-25.2-4.249-5.67-11.009-9.87-16.8-13.23-12.361-7.14-17.961,3.36-14.871,15.54,3.862,14.91,13.712,27.09,19.313,41.16C69.517,76.5,76.47,93.3,68.937,97.5c-8.691,4.83-20.279-7.14-26.459-12.39.386.21-9.85-8.82-10.429-6.93s-.579,4.2-.966,6.3a17.963,17.963,0,0,1-4.828,9.66,48.483,48.483,0,0,1,11.009.63c1.931.42,2.124,3.57.579,4.62-11.009,6.72-23.369,8.4-35.15,12.81C.955,113.038-.784,110.518.375,108.628Zm20.858-10.71a1.43,1.43,0,0,1-1.352-1.89,2.253,2.253,0,0,1-.966-1.89v-8.4c-3.863,6.72-7.725,13.23-11.588,19.951,7.339-2.31,14.871-3.99,21.824-7.14C26.641,98.338,23.937,98.128,21.234,97.918Z"
                transform="matrix(0.921, -0.391, 0.391, 0.921, 0, 45.041)"
                fill="#d5d8f3"
            />
        </svg>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="social-content">
                    <div
                        class="top-icon d-flex align-items-center justify-content-center"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32.017"
                            height="30.256"
                            viewBox="0 0 32.017 30.256"
                        >
                            <g id="Page-1" transform="translate(0 -0.435)">
                                <g id="Artboard" transform="translate(0 0.435)">
                                    <g id="icn_fluxo_stacks" transform="translate(0 0)">
                                        <path
                                            id="Path"
                                            d="M16.009,95.979,0,89.1v3.522L16.009,99.5l16.009-6.884V89.1l-3.2,1.441Z"
                                            transform="translate(0 -69.244)"
                                            fill="#4d5bed"
                                        />
                                        <path
                                            id="Path-2"
                                            data-name="Path"
                                            d="M32.017,9.88V7.319L16.009.435,0,7.319V9.88l16.009,6.884Z"
                                            transform="translate(0 -0.435)"
                                            fill="rgba(124,135,251,0.65)"
                                        />
                                        <path
                                            id="Path-3"
                                            data-name="Path"
                                            d="M28.816,59.076,16.009,64.519,0,57.635v3.522l16.009,6.884,16.009-6.884V57.635Z"
                                            transform="translate(0 -44.828)"
                                            fill="#4d5bed"
                                        />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h3 class="anim">Manage All Your Social Accounts In One Place</h3>
                    <p class="anim">
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy
                        text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.
                    </p>
                    <p class="higligted">Connect All Your Channels Now</p>
                </div>
            </div>
            <div class="col-sm-6 col-10">
                <div class="social-image anim">
                    <img
                        class="img-fluid"
                        src="{{ asset('Front/assets/images/social-image.png') }}"
                        alt="Manage All Your Social Accounts In One Place"
                    />
                </div>
            </div>
        </div>
        <div class="social-cards-wrapper">
            <div class="row gy-4">
                @foreach($services as $service)
                    @if($service->follow == 2)
                        <div class="col-xl-3 col-sm-6 anim">
                            <div class="social-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-top-icon d-flex align-items-center justify-content-center">
                                            <img src="{{ $service->icon }}" alt="" title=""/>
                                        </div>
                                        <h6 class="card-title">{{ $service->title }}</h6>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($service->description, 150, $end='...') }}</p>
                                        <a href="/media/{{ $service->id }}/{{ make_slug($service->title) }}" class="btn">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
