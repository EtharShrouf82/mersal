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
                                @if($service->follow == 1)
                                    <div class="post">
                                        <figure class="post-thumb">
                                            <img src="{{ $service->icon }}"
                                                 alt="{{ $service->title }} | {{ $settings->site_name }}"
                                                 title="{{ $service->title }} | {{ $settings->site_name }}"/>
                                        </figure>
                                        <h5 class="text">
                                            <a href="/service/{{ $service->id }}/{{ make_slug($service->title) }}">{{ $service->title }}</a>
                                        </h5>
                                    </div>
                                @endif
                                @if($service->follow == 2)
                                    <div class="post">
                                        <figure class="post-thumb">
                                            <img src="{{ $service->icon }}"
                                                 alt="{{ $service->title }} | {{ $settings->site_name }}"
                                                 title="{{ $service->title }} | {{ $settings->site_name }}"/>
                                        </figure>
                                        <h5 class="text">
                                            <a href="/media/{{ $service->id }}/{{ make_slug($service->title) }}">{{ $service->title }}</a>
                                        </h5>
                                    </div>
                                @endif
                            @endforeach
                            <div class="call_us_widget mt-5">
                                <div class="sidebar-title">
                                    <h4>{{ __('translations.need help?') }}</h4>
                                </div>
                                <div class="call_us_text">
                                    Prefer speaking with a human to filling out a form? call corporate
                                    office and we will connect you with a team member who can help.
                                </div>
                                <div class="products-cta-wrap d-flex align-item-center justify-content-center">
                                    <a href="{{ route('contact') }}" class="btn primary-btn with-icon">
                                        <span>{{ __('translations.Contact Us') }}</span>
                                        <span>
                                        <svg class="svg-transition" xmlns="http://www.w3.org/2000/svg" width="5.914" height="9.828"
                                             viewBox="0 0 5.914 9.828"> <path id="Icon_feather-chevron-down"
                                                                              data-name="Icon feather-chevron-down" d="M0,3.5,3.5,0,7,3.5"
                                                                              transform="translate(4.914 1.414) rotate(90)" fill="none"
                                                                              stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                                              stroke-width="2"></path> </svg>
                                      </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="product-card-inner">
                        <h4 class="text-black title-price-wrap">
                            <span class="title">{{ $job->title }}</span>
                        </h4>
                        <div class="anim job-img">
                            <img src="{{ $job->img }}" alt="" title=""/>
                        </div>
                        <div class="description">
                            <h6 class="text-black">Description</h6>
                            <p>{!! $job->description  !!}</p>
                        </div>
                        <div class="description mt-5 mb-5">
                            <h6 class="text-black">Last Date</h6>
                            <p>{!! $job->end_date !!}</p>
                        </div>
                        <div class="order-product-wrap">
                            <button id="showHideJob" class="btn">{{ __('translations.Apply') }}</button>
                        </div>
                        <form class="mt-5 hidden" id="applyJob">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">{{ __('translations.Name') }}</label>
                                <input type="text" class="form-control input" id="name" aria-describedby="firstName"/>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('translations.Place of residence') }}</label>
                                <select name="" class="form-control" id="city_id">
                                    <option value="">{{ __('translations.Place of residence') }}</option>
                                    @foreach($city as $ct)
                                        <option value="{{ $ct->id }}">{{ $ct->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Phone" class="form-label">{{ __('translations.Phone') }}</label>
                                <input type="text" class="form-control input" id="Phone" aria-describedby="firstName"/>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('translations.Email address') }}</label>
                                <input type="email" class="form-control input" id="email" aria-describedby="email"/>
                            </div>
                            <div id="gender" class="input gender">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="1" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{ __('translations.Male') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="2" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        {{ __('translations.Female') }}
                                    </label>
                                </div>
                            </div>
                            <div class="input mb-3 mt-3" id="cvbox">
                                <input type="file" class="cvfile form-control input" id="cvfile">
                                <span id="uploaded_cv" class="mt-1 center input">{{ __('translations.CV (PDF)') }}</span>
                            </div>
                            <button id="apply" class="btn primary-btn">
                                <span>{{ __('translations.Apply') }}</span>
                                <input type="hidden" id="inputHidden">
                            </button>
                            <div class="spinner-border text-danger hidden" id="contact_spinner" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="ok alert hidden">{{ __('translations.successSent') }}</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $(document).ready(function () {
                //upload cv
                $("#cvfile").change(function (e) {
                    var name = document.getElementById("cvfile").files[0].name;
                    var form_data = new FormData();
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['pdf']) == -1) {
                        alert("Invalid File, Must Be PDF");
                        var f = document.getElementById("cvfile").files[0];
                        var fsize = f.size || f.fileSize;
                        if (fsize > 2000000) {
                            alert("File Size is very big");
                        } else {
                            form_data.append("cvfile", document.getElementById('cvfile').files[0]);
                            $.ajax({
                                headers: {
                                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                                },
                                url: '{{ route('uploadcv') }}',
                                method: "POST",
                                data: form_data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                beforeSend: function () {
                                    $('#uploaded_cv').html("<label class='text-success'>Image Uploading...</label>");
                                },
                                success: function (data) {
                                    var imgData = '';
                                    imgData = '<span>' + data + '</span>';
                                    imgData += '<input id="cv" type="hidden" value="' + data + '"/>';
                                    $('#uploaded_cv').html(imgData);
                                }
                            });
                        }
                    }
                });

                //apply job
                $("#apply").click(function (e){
                    e.preventDefault()
                    const genderBox =  $(".gender");
                    const cvbox =  $(".cvfile");
                    genderBox.removeClass('border-red');
                    cvbox.removeClass('border-red');
                    const emailReg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                    let errors = false;
                    const name = $("#name").val();
                    const Phone = $("#Phone").val();
                    const city_id = $("#city_id").val();
                    const cv = $("#cv").val();
                    const email = $("#email").val();
                    const tel = $("#tel").val();
                    const job_id = $("#job_id").val();
                    const inputHidden = $("#inputHidden").val();
                    const gender = $('input[name="gender"]:checked').val();
                    alert(cv);
                    if($('#gender').not(':checked'))
                    {
                        genderBox.addClass('border-red');
                    }
                    if($("#cv").length == 0) {
                        cvbox.addClass('border-red');
                        errors = true;
                    }
                    if (name == '') {
                        $("#name").addClass('is-invalid');
                        errors = true;
                    }
                    if (Phone == '') {
                        $("#Phone").addClass('is-invalid');
                        errors = true;
                    }
                    if (city_id == '') {
                        $("#city_id").addClass('is-invalid');
                        errors = true;
                    }
                    if (email == '') {
                        $("#email").addClass('is-invalid');
                        errors = true;
                    }
                    if (email !== '') {
                        if (!emailReg.test(email)) {
                            $("#email").addClass('is-invalid');
                            errors = true;
                        }
                    }
                    if (errors == true) {
                        return false;
                    } else {
                        $.ajax({
                            headers: {
                                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                            },
                            type: "post",
                            url: '{{ route('applyJob') }}',
                            data: {
                                'name':name,
                                'Phone':Phone,
                                'email': email,
                                'city_id': city_id,
                                'job_id': {{ $job->id }},
                                'cv': cv,
                                'gender': gender,
                                'inputHidden': inputHidden,
                            },
                            success: function (msg) {
                                $("#apply").hide(200).delay(5000).fadeIn(2000);
                                $(".ok").fadeIn(3000).delay(2000).fadeOut(200);
                                clearInput();
                                $(".input").removeClass('is-invalid');
                                genderBox.removeClass('border-red');
                                cvbox.removeClass('border-red');
                            },
                            error: function (msg) {
                                $('.error').show().append(msg);
                            }
                        });
                    }
                });
            });
            function clearInput() {
                $(".input").each(function () {
                    $(this).val("");
                });
            }
        </script>
    @endpush
@endsection
