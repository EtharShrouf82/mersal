<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/admin/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/admin/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/favicon/favicon-16x16.png">
    <link rel="manifest" href="/admin/favicon/site.webmanifest">

    <link rel="stylesheet" href="/admin/css/font-awesome.min.css"/>
    <title>لوحة التحكم فولار | تسجيل الدخول</title>
</head>
<style>
    @font-face{font-family:'Lato';src:url('/admin/fonts/Lato-Thin.ttf')}
    @font-face{font-family:'Helvetica';src:url('/admin/fonts/HelveticaNeueW23forSKY-Reg.woff')}
    html {
        height: 100%;
    }
    body{
        background-size: cover;
        height: 100%;
        background-repeat: no-repeat !important;
        position: relative;
        min-height: 500px;
        overflow: hidden;
        direction: ltr;
        transition: background-image 1s ease;
    }
    body:before {
        content: '';
        display: inline-block;
        vertical-align: middle;
        height: 100%;
    }
    *{
        margin: 0;
        padding: 0;
        outline: 0;
        -webkit-transition-property:background-color,bottom,top;
        -webkit-transition-duration:.2s;
        -webkit-transition-timing-function:ease-in;
        -moz-transition-property:background-color,bottom,top;
        -moz-transition-duration:.2s;
        -moz-transition-timing-function:ease-in;
    }
    .pageInfo{
        font-family: 'Lato';
        position: fixed;
        bottom: 20px;
        left: 20px;
        right: 20px;
        width: 100%;
        min-height: 200px;
    }
    .hour{
        font-size: 100px;
    }
    .date,.hour{
        color:#fff;
    }
    .date{
        float: left;
        font-size: 60px;
    }
    .info{
        float: right;
        margin-right: 50px;
        text-align: center;
        text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.9);
    }
    .info a,.info p{
        color:#fff;
    }
    .info p{
        font-size: 30px;
        margin-bottom: 10px;
    }
    .fa-heart{color:red;}
    .jquery-ripples {
        position: relative;
        z-index: 0;
    }
    .login-box{
        font-family: 'Helvetica';
        position: absolute;
        width: 450px;
        height: 400px;
        top: calc(50% - 250px);
        right: calc(50% - 225px);
        margin: auto;
        overflow: hidden;
    }
    .msg-area,.login-header{
        width: 350px;
        margin: 0 auto;
        border-radius: 10px;
        height: 150px;
        color: #fff;
        z-index: 2;
        transform-style: preserve-3d;
    }
    .msg-area{
        position: absolute;
        top:-200px;
        left: 50px;
        background-image: url('/admin/img/loading-dots-white.gif');
        background-position: center center;
        background-color: #26c6da;
        background-repeat: no-repeat;
        color: #fff;
        box-sizing: border-box;
        text-align: center;
        font-size: 20px;
        cursor: pointer;
        background-size: 100px;
    }
    .msg-area h5{
        padding-top: 30px;
    }
    .success_login{
        background-color: #a5c23f;
        background-image: url('/admin/img/check.png');
    }
    .error_login{
        background-color: #c2453f;
        background-image: url('/admin/img/close.png');
    }
    .error_login,.success_login{
        background-size: 40px;
    }
    .login-header{
        background-color: #e06881cf;
        /*background: linear-gradient(60deg,#ec407a,#d81b60);*/
        /*box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(233,30,99,.4);*/
    }
    .login-header h4{
        font-weight: normal;
        font-size: 17px;
    }
    .login-body{
        width: 100%;
        height: 320px;
        background-color: rgba(255,255,255,0.6);
        margin-top: -70px;
        z-index: 1;
        border-radius: 10px;
        box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.25);
    }
    .login-header a{
        margin: 5px 20px;
        color:#fff;
    }
    .card-title{
        text-align: center;
        padding-top: 30px;
        font-size: 22px;
    }
    .social-line{
        text-align: center;
        margin-top: 5px;
    }
    .social-line img{
        max-width: 80px;
    }
    .login-area{
        padding-top: 80px;
        text-align: center;
    }
    .form-control{
        border-width: 1px;
        border-style: solid;
        border-color: rgba(0,0,0,0.12);
        background-position: center top;
        height: 30px;
        margin: 10px 0;
        padding: 5px;
        width:350px;
        font-size: 17px;
        color: #0d72a3;
        border-radius: 5px;
        text-align: center;
        font-family: 'Helvetica';
    }
    .input-group .fa{
        width:20px;
        font-size: 20px;
    }
    .submit{
        background: linear-gradient(60deg,#26c6da,#00acc1);
        box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(0,188,212,.4);
        color: #ffffff;
        font-family: 'Helvetica';
        margin-top: 20px;
        border: none;
        font-size: 16px;
        padding: 6px 12px;
        border-radius: 10px;
        z-index: 999;
        cursor: pointer;
    }
    .show_errors{
        color:red;
        font-size: 13px;
        width: 100%;
        text-align: center;
        height: 20px;
    }
    .border-red{
        border:1px solid red;
    }
    .mt-10{
        margin-top: 20px;
    }


    .circle{
        background: #d81b60;
        font-size: 18px;
        display: inline-block;
        width: 40px;
        height: 40px;
        overflow: hidden;
        position: relative;
        border-radius: 50%;
        -webkit-transition: 550ms cubic-bezier(.5, 0, .07, 1);
        transition: 550ms cubic-bezier(.5, 0, .07, 1);
        margin: 0 5px;
    }
    .circle .fa{
        position: absolute;
        color: #ffffff;
        z-index: 0;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        line-height: 40px;
        text-align: center;
    }
    .circle .background{
        position: absolute;
        z-index: 0;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        color: #fff;
        border-radius: 50%;
        opacity: .9;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: 350ms cubic-bezier(.5, 0, .07, 1);
        transition: 350ms cubic-bezier(.5, 0, .07, 1);
    }
    .circle:hover .fa{
        z-index: 999;
        color: #d81b60;
    }
    .circle:hover .background{
        width: 105%;
        height: 0;
        padding-top: 105%;
        opacity: 1;
        -webkit-transition: 550ms cubic-bezier(.5, 0, .07, 1);
        transition: 550ms cubic-bezier(.5, 0, .07, 1);
        background-color: #ffffff;
    }

    /* Pulse */
    @-webkit-keyframes hvr-pulse {
        25% {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
        75% {
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }
    }
    @keyframes hvr-pulse {
        25% {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
        75% {
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }
    }
    .hvr-pulse {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        -webkit-animation-name: hvr-pulse;
        animation-name: hvr-pulse;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
    }


</style>
<body class="jquery-ripples" id="body">
<div class="login-box">
    <div class="msg-area">
        <h5>جاري التحقق من البيانات</h5>
        <div class="image_msg"></div>
    </div>
    <div class="login-header">
        <h4 class="card-title">تسجيل الدخول</h4>
        <div class="social-line">
            <img src="/admin/img/vue5.png" alt="لوحة تحكم فولار لإدارة المواقع" title="لوحة تحكم فولار لإدارة المواقع">
        </div>
    </div>
    <div class="login-body">
        <div class="login-area">
            <div class="show_errors"></div>
            <div class="input-group mt-10">
                <i class="fa fa-meh-o emjoy" aria-hidden="true"></i>
                <input type="email" id="email" name="email" required class="form-control" placeholder="البريد الإلكتروني">
                <input type="hidden" id="_token" name="token" value="{{ csrf_token() }}">
            </div>
            <div class="input-group">
                <i class="fa fa-eye emjoy" aria-hidden="true"></i>
                <input type="password" id="password" name="password" required class="form-control" placeholder="كلمة المرور">
            </div>
            <input class="submit" type="submit" id="user_login" name="" value="تسجيل الدخول"/>
        </div>
    </div>
</div>

<div class="pageInfo">
    <div class="hour"></div>
    <div class="date">
        {{ date('l , d , F(m) , Y') }}
    </div>
    <div class="info">
        <p>Made With <i class="fa fa-heart hvr-pulse" aria-hidden="true"></i> By : Ethar Shrouf</p>
        <a class="circle" href="http://etharshrouf.com/" target="_blank">
            <div class="background"></div>
            <i class="fa fa-globe" aria-hidden="true"></i>
        </a>
        <a class="circle" href="https://www.facebook.com/eshrouf/" target="_blank">
            <div class="background"></div>
            <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a class="circle" href="https://twitter.com/ShroufEthar" target="_blank">
            <div class="background"></div>
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a class="circle" href="https://www.linkedin.com/in/ethar-shrouf-b5027a34/" target="_blank">
            <div class="background"></div>
            <i class="fa fa-linkedin" aria-hidden="true"></i>
        </a>
        <a class="circle" href="mailto:ethar.shrouf@email.com">
            <div class="background"></div>
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
        </a>
    </div>
</div>
<svg
    height="500"
    version="1.1"
    width="500"
    xmlns="http://www.w3.org/2000/svg"
    id="svgSk03y0ozn4"
    viewBox="0 0 500 500"
    preserveAspectRatio="xMidYMid meet"
>
    <g token="svgSk03y0ozn4">
        <g token="1" transform="matrix(0.633,0.772,-0.772,0.633,244.891,27.967)">
            <g token="1" transform="matrix(1,0,0,1,0,0)">
                <path
                    fill="rgba(0,0,0,0)"
                    d="M 8 0.25q-5.15 -0.9 -7.1 1.8q-2 2.65 0.45 7.3l178.85 321.05q2.4 4.65 5.95 4.5q3.4 0 5.65 -4.85l127.8 -267.3q2.15 -4.7 0.05 -8.7q-2.15 -3.9 -7.45 -4.9l-304.2 -48.9"
                    stroke="#00cccc"
                    style="stroke-width: 2;"
                ></path>
                <animateTransform
                    attributeName="transform"
                    attributeType="XML"
                    type="rotate"
                    from="0 150 150"
                    to="360 150 150"
                    dur="20s"
                    repeatCount="indefinite"
                />
            </g>
        </g>
    </g>
</svg>
<script src="/admin/js/jQuery.js"></script>
<script src="/admin/js/jquery.ripples-min.js"></script>
<script>

    $(document).ready(function() {
        try {
            $('body').ripples({
                resolution: 512,
                dropRadius: 20, //px
                perturbance: 0.04,
            });
        }
        catch (e) {
            $('.error').show().text(e);
        }

        $("#user_login").click(function (e) {
            e.preventDefault();
            $(".show_errors").text('');
            $(".form-control").removeClass('border-red');
            $(".emjoy").css('color','');
            var email= $("#email").val();
            var password= $("#password").val();
            var _token= $("#_token").val();
            var emailReg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            var errors = false;
            if (email == '') {
                $("#email").addClass("border-red");
                $(".show_errors").append("<div>الرجاء إدخال البريد الإلكتروني</div>");
                errors = true;
                $(".fa-meh-o").css("color", "red");
            } else if (!emailReg.test(email)) {
                $("#email").addClass("border-red");
                $(".show_errors").append("<div>الرجاء إدخال بريد إلكتروني صحيح</div>");
                errors = true;
                $(".fa-meh-o").css("color", "red");
            }
            if (password == '') {
                $("#password").addClass("border-red");
                $(".show_errors").append("الرجاء إدخال كلمة المرور");
                errors = true;
                $(".fa-eye").css("color", "red");
            }else if(password.length < 8){
                $("#password").addClass("border-red");
                $(".show_errors").append("كلمة المرور يجب إن تتكون من ٨ خانات أو أكثر");
                errors = true;
                $(".fa-eye").css("color", "red");
            }
            if (errors == true) {
                return false;
            } else {
                $(".msg-area").css('top', '0');
                $.ajax({
                    url: '{{ route("admin.login") }}',
                    type: 'POST',
                    data: {email: email, password: password, _token: _token},
                    success: function (data) {
                        if (data == 1) {
                            $(".msg-area").addClass('success_login')
                            $(".msg-area h5").text('تمت عملية تسجيل الدخول بنجاح..')
                            $(".emjoy").css("color", "green");
                            window.location = '/admin/dashboard';
                        } else {
                            $(".msg-area").addClass('error_login');
                            $(".emjoy").css('color','red');
                            $(".msg-area h5").text('يرجى التأكد من المعلومات المدخلة..');
                        }
                    },
                    error: function (error) {
                        // $(".card-header").addClass('error_login');
                    }
                });
            }
        });
        $('body').on('click', '.error_login', function() {
            $(".msg-area").css("top", "").removeClass('error_login')
            $(".emjoy").css("color","");
            $("#password").addClass("border-red");
            $("#email").addClass("border-red");
            $(".show_errors").text('');
        });

        $('.login-area').on('click', function(e) {
            e.stopPropagation();
        });

        rand_bg();
        $("#body").click(function(e){
            rand_bg();
        });

        function rand_bg(r){
            var r = Math.floor(Math.floor(Math.random() * 9));
            var newSrc = '/admin/img/bg'+r+'.jpg',
                image = new Image();
            image.onload = function() {
                $("#body").css('background-image','url('+newSrc+')');
            }
            image.src = newSrc;
        }

        var interval = setInterval(function() {
            var currentTime = new Date();
            hour = (currentTime.getHours()<10?"0":"")+currentTime.getHours();
            min	 = (currentTime.getMinutes()<10?"0":"")+currentTime.getMinutes();
            second	 = (currentTime.getMinutes()<10?"0":"")+currentTime.getSeconds();
            $('.hour').html(hour+':'+min+':'+second);
        },100);
    });

</script>
</body>
</html>
