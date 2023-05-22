<footer
    class="footer bg-cover black-fade"
    style="background-image: url('{{ asset('/Front/assets/images/footer-bg.png') }}')">
    <div class="container">
        <div class="footer-inner-wrapper">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card anim">
                        <div class="card">
                            <div class="card-header">
                                <ul class="card-contact-social">
                                    <li>
                                        <a href="{{ $settings->translations->facebook }}" target="_blank" title="{{ $settings->translations->site_name }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8.034" height="15"
                                                 viewBox="0 0 8.034 15">
                                                <path id="Icon_awesome-facebook-f" data-name="Icon awesome-facebook-f"
                                                      d="M9.117,8.438l.417-2.715h-2.6V3.961a1.357,1.357,0,0,1,1.53-1.467H9.643V.183A14.441,14.441,0,0,0,7.541,0,3.314,3.314,0,0,0,3.994,3.654V5.723H1.609V8.438H3.994V15H6.929V8.438Z"
                                                      transform="translate(-1.609)" fill="#fff"/>
                                            </svg>
                                        </a>
                                    </li>
                                    @if($settings->translations->twitter)
                                        <li>
                                            <a href="{{ $settings->translations->twitter }}" title="{{ $settings->translations->site_name }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18.469" height="15"
                                                     viewBox="0 0 18.469 15">
                                                    <path id="Icon_awesome-twitter" data-name="Icon awesome-twitter"
                                                          d="M16.57,7.119c.012.164.012.328.012.492a10.7,10.7,0,0,1-10.77,10.77A10.7,10.7,0,0,1,0,16.682a7.83,7.83,0,0,0,.914.047,7.581,7.581,0,0,0,4.7-1.617,3.792,3.792,0,0,1-3.539-2.625,4.773,4.773,0,0,0,.715.059,4,4,0,0,0,1-.129A3.786,3.786,0,0,1,.75,8.7V8.654a3.812,3.812,0,0,0,1.711.48A3.791,3.791,0,0,1,1.289,4.072a10.759,10.759,0,0,0,7.8,3.961A4.273,4.273,0,0,1,9,7.166a3.789,3.789,0,0,1,6.551-2.59,7.452,7.452,0,0,0,2.4-.914,3.775,3.775,0,0,1-1.664,2.086,7.588,7.588,0,0,0,2.18-.586,8.137,8.137,0,0,1-1.9,1.957Z"
                                                          transform="translate(0 -3.381)" fill="#fff"/>
                                                </svg>
                                            </a>
                                        </li>
                                    @endif
                                    @if($settings->translations->linkedin)
                                        <li>
                                            <a href="{{ $settings->translations->linkedin }}" title="{{ $settings->translations->site_name }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                     viewBox="0 0 15 15">
                                                    <path id="Icon_awesome-linkedin-in" data-name="Icon awesome-linkedin-in"
                                                          d="M3.358,15H.248V4.986h3.11ZM1.8,3.62A1.81,1.81,0,1,1,3.6,1.8,1.816,1.816,0,0,1,1.8,3.62ZM15,15h-3.1V10.126c0-1.162-.023-2.652-1.617-2.652-1.617,0-1.865,1.262-1.865,2.568V15H5.306V4.986H8.288V6.352h.044a3.268,3.268,0,0,1,2.942-1.617C14.422,4.735,15,6.807,15,9.5V15Z"
                                                          transform="translate(0 0)" fill="#fff"/>
                                                </svg>
                                            </a>
                                        </li>
                                    @endif
                                    @if($settings->translations->instagram)
                                        <li>
                                            <a href="{{ $settings->translations->instagram }}" title="{{ $settings->translations->site_name }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.003" height="15"
                                                     viewBox="0 0 15.003 15">
                                                    <path id="Icon_awesome-instagram" data-name="Icon awesome-instagram"
                                                          d="M7.5,5.892a3.846,3.846,0,1,0,3.846,3.846A3.84,3.84,0,0,0,7.5,5.892Zm0,6.346a2.5,2.5,0,1,1,2.5-2.5,2.5,2.5,0,0,1-2.5,2.5Zm4.9-6.5a.9.9,0,1,1-.9-.9A.895.895,0,0,1,12.4,5.735Zm2.547.91A4.439,4.439,0,0,0,13.734,3.5,4.468,4.468,0,0,0,10.591,2.29c-1.238-.07-4.95-.07-6.189,0A4.462,4.462,0,0,0,1.259,3.5,4.454,4.454,0,0,0,.047,6.642c-.07,1.238-.07,4.95,0,6.189a4.439,4.439,0,0,0,1.212,3.143A4.474,4.474,0,0,0,4.4,17.185c1.238.07,4.95.07,6.189,0a4.439,4.439,0,0,0,3.143-1.212,4.468,4.468,0,0,0,1.212-3.143c.07-1.238.07-4.947,0-6.185Zm-1.6,7.514a2.531,2.531,0,0,1-1.426,1.426,16.531,16.531,0,0,1-4.422.3,16.66,16.66,0,0,1-4.422-.3,2.531,2.531,0,0,1-1.426-1.426,16.531,16.531,0,0,1-.3-4.422,16.66,16.66,0,0,1,.3-4.422A2.531,2.531,0,0,1,3.077,3.89a16.531,16.531,0,0,1,4.422-.3,16.66,16.66,0,0,1,4.422.3,2.531,2.531,0,0,1,1.426,1.426,16.531,16.531,0,0,1,.3,4.422A16.522,16.522,0,0,1,13.345,14.159Z"
                                                          transform="translate(0.005 -2.238)" fill="#fff"/>
                                                </svg>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ $settings->translations->whatsapp }}" title="{{ $settings->translations->site_name }}">
                                            <svg fill="#ffffff" width="15.003" height="15" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 308" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_468_"> <path id="XMLID_469_" d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z"></path> <path id="XMLID_470_" d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z"></path> </g> </g></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h2 class="card-title">{{ $settings->translations->site_name }}</h2>
                                <p>{{ $settings->translations->site_description }}</p>
                                <ul class="card-contact-info-wrap">
                                    <li>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16.501" height="16.501"
                               viewBox="0 0 16.501 16.501"> <g id="Group_70221" data-name="Group 70221"
                                                               transform="translate(-12.241 -12.286)"> <path
                                      id="_8216011891543238910" data-name="8216011891543238910"
                                      d="M17.111,13.23v2.258a1.507,1.507,0,0,1-1.644,1.505,14.945,14.945,0,0,1-6.509-2.311,14.692,14.692,0,0,1-4.525-4.516A14.877,14.877,0,0,1,2.118,3.641,1.507,1.507,0,0,1,3.619,2H5.881A1.507,1.507,0,0,1,7.39,3.295,9.649,9.649,0,0,0,7.918,5.41,1.5,1.5,0,0,1,7.578,7l-.958.956a12.055,12.055,0,0,0,4.525,4.516l.958-.956a1.511,1.511,0,0,1,1.591-.339,9.7,9.7,0,0,0,2.119.527A1.506,1.506,0,0,1,17.111,13.23Z"
                                      transform="translate(10.88 11.036)" fill="none" stroke="#299dee"
                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/> </g> </svg>
                        </span>
                                        <a href="tel:{{ $settings->translations->tel }}" title="maraseel phone">{{ $settings->translations->tel }}</a>
                                    </li>
                                    <li>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="17.064" height="14.192"
                               viewBox="0 0 17.064 14.192"> <g id="Group_70222" data-name="Group 70222"
                                                               transform="translate(-12.027 -14.821)"> <g
                                      id="_18144611595156101" data-name="18144611595156101"
                                      transform="translate(13.059 15.571)"> <path id="Path_39411" data-name="Path 39411"
                                                                                  d="M15.692,17.692H5.308A2.314,2.314,0,0,1,3,15.385V7.308A2.314,2.314,0,0,1,5.308,5H15.692A2.314,2.314,0,0,1,18,7.308v8.077A2.314,2.314,0,0,1,15.692,17.692Z"
                                                                                  transform="translate(-3 -5)"
                                                                                  fill="none" stroke="#299dee"
                                                                                  stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  stroke-miterlimit="10"
                                                                                  stroke-width="1.5"/> <path
                                          id="Path_39412" data-name="Path 39412" d="M3,10l7.5,4.615L18,10"
                                          transform="translate(-3 -7.115)" fill="none" stroke="#299dee"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                          stroke-width="1.5"/> </g> </g> </svg>
                        </span>
                                        <a title="info@marseel.com" href="mailto: {{ $settings->translations->email }}">
                                            {{ $settings->translations->email }}
                                        </a>
                                    </li>
                                    <li>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15.01" viewBox="0 0 15 15.01"> <g
                                  id="Group_70223" data-name="Group 70223" transform="translate(-12.373 -13.61)"> <g
                                      id="_10999648851580817583" data-name="10999648851580817583"
                                      transform="translate(12.373 13.61)"> <path id="Path_39413" data-name="Path 39413"
                                                                                 d="M9.95,9.513l1.519-2.644a4.544,4.544,0,0,0,0-4.594,4.594,4.594,0,0,0-7.95,0,4.544,4.544,0,0,0,0,4.594L5.038,9.5C2.5,9.813,0,10.619,0,12.182c0,1.931,3.888,2.813,7.5,2.813s7.5-.881,7.5-2.813C15,10.619,12.5,9.813,9.95,9.513Zm-5.344-6.6a3.338,3.338,0,1,1,5.781,3.331l-2.888,5-2.887-5a3.319,3.319,0,0,1-.006-3.331ZM7.5,13.744c-4.125,0-6.25-1.094-6.25-1.562,0-.331,1.344-1.219,4.488-1.488l.844,1.456a1.062,1.062,0,0,0,1.838,0l.844-1.456c3.144.269,4.488,1.175,4.488,1.488C13.75,12.65,11.625,13.744,7.5,13.744Z"
                                                                                 transform="translate(0 0.016)"
                                                                                 fill="#299dee"/> <circle
                                          id="Ellipse_425" data-name="Ellipse 425" cx="1.25" cy="1.25" r="1.25"
                                          transform="translate(6.25 3.135)" fill="#299dee"/> </g> </g> </svg>
                        </span>
                                        <span>{{ $settings->translations->address }}</span>
                                    </li>
                                    <li>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"> <g
                                  id="Group_70259" data-name="Group 70259" transform="translate(-13.541 -14.229)"> <path
                                      id="Icon_awesome-whatsapp" data-name="Icon awesome-whatsapp"
                                      d="M12.753,4.43a7.435,7.435,0,0,0-11.7,8.97L0,17.25l3.941-1.035a7.41,7.41,0,0,0,3.552.9h0A7.5,7.5,0,0,0,15,9.686,7.462,7.462,0,0,0,12.753,4.43ZM7.5,15.867a6.167,6.167,0,0,1-3.147-.86l-.224-.134-2.337.613.623-2.28-.147-.234A6.19,6.19,0,1,1,13.744,9.686,6.247,6.247,0,0,1,7.5,15.867Zm3.388-4.627c-.184-.094-1.1-.542-1.269-.6s-.295-.094-.419.094-.479.6-.589.73-.218.141-.4.047A5.056,5.056,0,0,1,5.679,9.3c-.191-.328.191-.3.546-1.015a.344.344,0,0,0-.017-.325c-.047-.094-.419-1.008-.573-1.379s-.3-.311-.419-.318-.231-.007-.355-.007a.688.688,0,0,0-.5.231,2.087,2.087,0,0,0-.65,1.55,3.639,3.639,0,0,0,.757,1.922,8.3,8.3,0,0,0,3.174,2.806,3.634,3.634,0,0,0,2.23.465,1.9,1.9,0,0,0,1.252-.884,1.553,1.553,0,0,0,.107-.884C11.193,11.377,11.069,11.33,10.885,11.24Z"
                                      transform="translate(13.541 11.979)" fill="#299dee"/> </g> </svg>
                        </span>
                                        <a title="+972 000000000" href="https://wa.me/{{ $settings->translations->whatsapp }}">
                                            {{ $settings->translations->whatsapp }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 anim">
                    <ul class="footer-links">
                        <li><a href="#" title="About Us">About Us</a></li>
                        <li><a href="#" title="Our Message">Our Message</a></li>
                        <li>
                            <a
                                class="dropdown-toggle"
                                href="#"
                                id="servicesAndProductsDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Services and Products
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesAndProductsDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="Mechanism of Action">Mechanism of Action</a>
                        </li>
                        <li>
                            <a href="#" title="Our Clients">Our Clients</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
