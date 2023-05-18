<nav id="navbar" class="navbar without-border">
    <div class="container">
        <a class="navbar-brand" href="/" title="maraseel">
            <img src="{{ asset('/Front/assets/images/logo.svg') }}" alt="maraseel" />
        </a>
        <div class="mobile-only">
            <div class="navbar-search">
                <button title="search">
                    <svg
                        class="svg-transition"
                        xmlns="http://www.w3.org/2000/svg"
                        width="18.624"
                        height="18.624"
                        viewBox="0 0 18.624 18.624"
                    >
                        <g
                            id="Icon_feather-search"
                            data-name="Icon feather-search"
                            transform="translate(-3.5 -3.5)"
                        >
                            <path
                                id="Path_39436"
                                data-name="Path 39436"
                                d="M18.908,11.7a7.2,7.2,0,1,1-7.2-7.2A7.2,7.2,0,0,1,18.908,11.7Z"
                                fill="none"
                                stroke="#fff"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                            />
                            <path
                                id="Path_39437"
                                data-name="Path 39437"
                                d="M28.892,28.892l-3.917-3.917"
                                transform="translate(-8.183 -8.183)"
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
            <div class="navbar-call">
                <button title="contact us">
                    <svg
                        class="svg-transition"
                        xmlns="http://www.w3.org/2000/svg"
                        width="20.106"
                        height="20.14"
                        viewBox="0 0 20.106 20.14"
                    >
                        <path
                            id="Icon_feather-phone-call"
                            data-name="Icon feather-phone-call"
                            d="M14.317,4.947a4.309,4.309,0,0,1,3.4,3.4M14.317,1.5a7.756,7.756,0,0,1,6.851,6.842m-.862,6.877V17.8a1.723,1.723,0,0,1-1.879,1.723,17.054,17.054,0,0,1-7.437-2.646,16.8,16.8,0,0,1-5.17-5.17A17.054,17.054,0,0,1,3.175,4.24,1.723,1.723,0,0,1,4.89,2.362H7.475A1.723,1.723,0,0,1,9.2,3.844a11.065,11.065,0,0,0,.6,2.421,1.723,1.723,0,0,1-.388,1.818L8.319,9.178a13.788,13.788,0,0,0,5.17,5.17l1.094-1.094a1.723,1.723,0,0,1,1.818-.388,11.064,11.064,0,0,0,2.421.6A1.723,1.723,0,0,1,20.306,15.219Z"
                            transform="translate(-2.167 -0.396)"
                            fill="none"
                            stroke="#fff"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                    </svg>
                </button>
            </div>
            <button id="navbar-toggler" class="navbar-toggler" type="button">
                <svg
                    width="64px"
                    height="64px"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    stroke="#ffffff"
                >
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g
                        id="SVGRepo_tracerCarrier"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    ></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M4 18L20 18"
                            stroke="#ffffff"
                            stroke-width="2"
                            stroke-linecap="round"
                        ></path>
                        <path
                            d="M4 12L20 12"
                            stroke="#ffffff"
                            stroke-width="2"
                            stroke-linecap="round"
                        ></path>
                        <path
                            d="M4 6L20 6"
                            stroke="#ffffff"
                            stroke-width="2"
                            stroke-linecap="round"
                        ></path>
                    </g>
                </svg>
            </button>
        </div>

        <div class="navbar-menu" id="navbar-menu">
            <ul class="navbar-nav">
                <li class="nav-item nav-brand">
                    <a class="navbar-brand" href="#" title="maraseel">
                        <img src="./assets/images/logo.svg" alt="maraseel" />
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" title="About Us" href="#about-us">{{ __('translations.aboutUs') }}</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="#"
                        title="Our Message"
                        href="#our-message"
                    >Our Message</a
                    >
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Services and Products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#services">Services</a></li>
                        <li><a class="dropdown-item" href="#products">Products</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="#mechanism-of-action"
                        title="Our Message"
                    >Mechanism of Action</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#clients" title="Our Message"
                    >Our Clients</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-us" title="Our Message"
                    >Contact Us</a
                    >
                </li>
                <li class="nav-item navbar-search">
                    <button title="search">
                        <svg
                            class="svg-transition"
                            xmlns="http://www.w3.org/2000/svg"
                            width="18.624"
                            height="18.624"
                            viewBox="0 0 18.624 18.624"
                        >
                            <g
                                id="Icon_feather-search"
                                data-name="Icon feather-search"
                                transform="translate(-3.5 -3.5)"
                            >
                                <path
                                    id="Path_39436"
                                    data-name="Path 39436"
                                    d="M18.908,11.7a7.2,7.2,0,1,1-7.2-7.2A7.2,7.2,0,0,1,18.908,11.7Z"
                                    fill="none"
                                    stroke="#fff"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                />
                                <path
                                    id="Path_39437"
                                    data-name="Path 39437"
                                    d="M28.892,28.892l-3.917-3.917"
                                    transform="translate(-8.183 -8.183)"
                                    fill="none"
                                    stroke="#fff"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                />
                            </g>
                        </svg>
                    </button>
                </li>
                <li class="nav-item navbar-call">
                    <button title="contact us">
                        <svg
                            class="svg-transition"
                            xmlns="http://www.w3.org/2000/svg"
                            width="20.106"
                            height="20.14"
                            viewBox="0 0 20.106 20.14"
                        >
                            <path
                                id="Icon_feather-phone-call"
                                data-name="Icon feather-phone-call"
                                d="M14.317,4.947a4.309,4.309,0,0,1,3.4,3.4M14.317,1.5a7.756,7.756,0,0,1,6.851,6.842m-.862,6.877V17.8a1.723,1.723,0,0,1-1.879,1.723,17.054,17.054,0,0,1-7.437-2.646,16.8,16.8,0,0,1-5.17-5.17A17.054,17.054,0,0,1,3.175,4.24,1.723,1.723,0,0,1,4.89,2.362H7.475A1.723,1.723,0,0,1,9.2,3.844a11.065,11.065,0,0,0,.6,2.421,1.723,1.723,0,0,1-.388,1.818L8.319,9.178a13.788,13.788,0,0,0,5.17,5.17l1.094-1.094a1.723,1.723,0,0,1,1.818-.388,11.064,11.064,0,0,0,2.421.6A1.723,1.723,0,0,1,20.306,15.219Z"
                                transform="translate(-2.167 -0.396)"
                                fill="none"
                                stroke="#fff"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                            />
                        </svg>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
