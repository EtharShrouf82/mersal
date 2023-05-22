$( function () {
    $(".map-highlight").maphilight({
        fill: true,
        fillColor: '000000',
        fillOpacity: 0.2,
        stroke: false,
        fade: true,
        shadow: true,
        shadowX: 0,
        shadowY: 0,
        shadowRadius: 6,
        shadowColor: '000000',
        shadowOpacity: 0.8,
        shadowPosition: 'outside',
        shadowFrom: false
    });

    $( '#header-slider' ).slick( {
        slidesToShow: 1,
        draggable: true,
        autoplay: false,
        autoplaySpeed: 7000,
        arrows: true,
        dots: true,
        fade: true,
        speed: 500,
        infinite: true,
        cssEase: 'ease-in-out',
        touchThreshold: 100,
        prevArrow: $( '.prev-header-arrow' ),
        nextArrow: $( '.next-header-arrow' ),
        rtl: $( 'body' ).css( 'direction' ) === 'rtl'
    } );
    $( '#clients-slider' ).slick( {
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        prevArrow: $( '.prev-arrow' ),
        nextArrow: $( '.next-arrow' ),
        rtl: $( 'body' ).css( 'direction' ) === 'rtl',

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    } );
    if ( $( '#products' ).length > 0 ) {
        var mixer = mixitup( $( '#products' ), {
            load: {
                filter: 'all',
            },
        } );
    }

    if ( $( '#media' ).length > 0 ) {
        var mixer = mixitup( $( '#media' ), {
            load: {
                filter: 'all',
            },
        } );
    }

    $("#showHideJob").click(function (e) {
        e.preventDefault();
        $("#applyJob").slideToggle();
    })

    if ($(".banner-carousel").length) {
        $(".banner-carousel").owlCarousel({
            loop: true,
            animateOut: "fadeOut",
            animateIn: "fadeIn",
            margin: 0,
            nav: true,
            smartSpeed: 500,
            autoplay: 6000,
            autoplayTimeout: 7000,
            navText: [
                '<span class="icon fa fa-angle-left"></span>',
                '<span class="icon fa fa-angle-right"></span>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                800: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        });
    }

    // handle click on navbar toggler
    $( '#navbar-toggler' ).on( 'click', function () {
        $( '#navbar-menu' ).toggleClass( 'show' );
        $( '#side-menu-fade' ).fadeToggle();
    } );
    $( '#side-menu-fade' ).on( 'click', function () {
        $( '#navbar-menu' ).removeClass( 'show' );
        $( '#side-menu-fade' ).fadeOut();
    } );

    // $( '#signages-viewer img' ).on( 'click', function () {
    //
    // } );
    $( '#area-menu-close' ).on( 'click', function () {
        $( '#area-side-menu' ).removeClass( 'active' );
    } );
    $( '#area-side-menu .area-side-menu-overlay' ).on( 'click', function () {
        $( '#area-side-menu' ).removeClass( 'active' );
    } );

    $('body').on('click', '.screen_bx', function(e) {
        e.preventDefault();
        const id = $(this).attr('id');
        const area = $("#area-side-menu .inner-wrapper");
        $.ajax({
            url: '/screen/'+id,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            beforeSend: function () {
                $('#unitsCourse').html('<img style="max-width: 30px" src="/admin/img/loading.gif">');
            },
            complete: function () {
                $('#unitsCourse').html('');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            },
            success: function (data) {
                if(data != null){
                    let ForumCat='';
                    const screen=data['screen'];
                    const plans = data['plans'];
                    $.each(screen['images'], function(k,v) {
                        if ( k === 0) {
                            ForumCat +='<div class="area-img-wrapper"> '+
                                ' <img src="/images/screens/'+v['img']+'"/>'+
                                '</div>';
                        }
                    });

                    ForumCat +='<div class="content">'+
                            '<h4 class="position-relative">'+screen['default_translation']['title']+''+
                    ' <div class="before-shape">'+
                    ' <img class="img-fluid" src="/Front/assets/images/maraseel-shape.png" alt="'+screen['default_translation']['title']+'" />'+
                            '</div>'+
                        '</h4>'+
                    ' <p>'+screen['default_translation']['description']+'</p>'+
                    '</div>' +
                        '<div class="row">';
                    $.each(screen['images'], function(k,v) {
                            ForumCat +='<div class="screen_bx_img p-2 col-6"> '+
                                '<img src="/images/screens/'+v['img']+'"/>'+
                                '</div>';
                    });
                    ForumCat +='</div>';
                    $.each(plans, function (e,w){
                        ForumCat += '<div class="pricing-table mt-5 colored">\n' +
                            '              <div class="header-label">\n' +
                            '                <h5><span>'+w['default_translation']['title']+' - '+w['num_views']+'</span> Appearances Per Day</h5>\n' +
                            '              </div>\n' +
                            '              <table>\n' +
                            '                <tbody>' +
                            '<tr class="head">\n' +
                            '                  <th>Period</th>\n' +
                            '                  <th>Price</th>\n' +
                            '                  <th>Discount</th>\n' +
                            '                  <th>New Price</th>\n' +
                            '                </tr>' ;
                        $.each(w['screen_price'], function (l,y) {
                            ForumCat+='<tr>\n' +
                                '                  <td>'+y['default_translation']['title']+'</td>\n' +
                                '                  <td>'+y['price']+'</td>\n' +
                                '                  <td>'+y['discount']+'</td>\n' +
                                '                  <td>'+y.priceAfterDiscount+'</td>\n' +
                                '                </tr>';
                        })
                            ForumCat+= '</tbody>' +
                            '</table>\n' +
                            '</div>';
                    });
                    ForumCat +='</div>';
                    area.html(ForumCat);
                }
            },
        });
        $( '#area-side-menu' ).addClass( 'active' );
    });


    $( 'area' ).on( 'click', function (e) {
        e.preventDefault();
        const id = $(this).attr('id');
        const viewer = $( '#signages-viewer' );
        $.ajax({
            url: '/getScreens/'+id,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            beforeSend: function () {
               $("#cms-loadding").show();
            },
            complete: function () {
                $("#cms-loadding").hide();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            },
            success: function (data) {
                if(data != null){
                    var ForumCat='';
                    ForumCat +='<div class="row p-3">';
                    viewer.addClass( 'no-after' );
                    $.each(data, function(k,v) {
                        console.log(v);
                        ForumCat +='<div id="'+v['id']+'" class="col-6 col-lg-4 col-md-4 col-sm-6 col-xs-6 screen_bx">\n' +
                            '<a title="'+v['default_translation']['title']+'"> ' +
                            '<span>'+v['default_translation']['title']+'</span>' +
                            '</a>\n' +
                            '</div>';
                    });
                    ForumCat +='</div>';
                    viewer.html(ForumCat);
                }
            },
        });
        // alert(id);
        // var relatedSrc = $( this ).attr( 'target' );
        //
        // $( '#signages-viewer .play-bt-wrap' ).fadeOut();
        // $( '#signages-viewer img' ).attr( 'src', relatedSrc );
    } );

    $("#sendMsg").click(function (e) {
        e.preventDefault()
        var spinner = $("#contact_spinner");
        var ths = $(this);
        spinner.show();
        ths.hide();
        $(".input").removeClass('is-invalid');
        var emailReg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var errors = false;
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();
        var inputHidden = $("#inputHidden").val();
        if (phone === '') {
            $("#phone").addClass("is-invalid");
            errors = true;
        }
        if (name === '') {
            $("#name").addClass("is-invalid");
            errors = true;
        }
        if (email === '') {
            $("#email").addClass("is-invalid");
            errors = true;
        } else if (!emailReg.test(email)) {
            $("#email").addClass("border-red");
            errors = true;
        }
        if (message === '') {
            $("#message").addClass("is-invalid");
            errors = true;
        }
        if (errors === true) {
            spinner.hide();
            ths.show();
            return false;
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/send_msg",
                data: {
                    'name': name,
                    'email': email,
                    'message': message,
                    'tel': phone,
                    'inputHidden': inputHidden
                },
                success: function (msg) {
                    if (msg === '1') {
                        ths.delay(5000).fadeIn(2000);
                        spinner.hide();
                        $(".ok").fadeIn(3000).delay(2000).fadeOut(200);
                        clearInput();
                    }
                },
                error: function (msg) {
                    $('.error').show().append(msg);
                }
            });
        }
    })

    function clearInput() {
        $(".input").each(function () {
            $(this).val("");
        });
    }

    // Initiate PhotoSwipe
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    // main script
    // handle navbar scroll
    var prevScrollpos = window.pageYOffset;
    console.log( prevScrollpos, 'prevScrollposprevScrollpos' );
    var navbar = document.getElementById( 'navbar' );
    var navbarTop = navbar.offsetTop;
    window.onscroll = function () {
        if ( window.pageYOffset > navbarTop ) {
            navbar.classList.add( 'sticky' );
        } else {
            navbar.classList.remove( 'sticky' );
        }
        var currentScrollPos = window.pageYOffset;
        if ( prevScrollpos >= currentScrollPos ) {
            navbar.style.top = '0';
        } else {
            navbar.style.top = '-100px';
        }
        prevScrollpos = currentScrollPos;
    };

    // scroll reveal
    var slideUp = {
        distance: '50px',
        origin: 'bottom',
        duration: 1500,
        opacity: 0.1,
    };

    ScrollReveal().reveal( '.anim', slideUp );

    // handle nav element click
    $( 'nav a' ).on( 'click', function () {
        if ( $( '#navbar-menu' ).hasClass( 'show' ) ) {
            $( '#navbar-menu' ).removeClass( 'show' );
            $( '#side-menu-fade' ).fadeOut();
        }
        var target = $( this.hash );
        if ( target.length ) {
            $( 'html, body' ).animate( {
                scrollTop: target.offset().top
            }, 300 );
            return false;
        }
    } );
} )
