<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-55TMQ3D');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1306853613000826');
        fbq('track', 'PageView');
    </script>
    <!-- End Facebook Pixel Code -->

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/font_size.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/loginForm.css')}}">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'RobertBlack';
            src: url(fonts/Roboto-Black.ttf);
        }

        @font-face {
            font-family: 'RobertRegular';
            src: url(fonts/Roboto-Regular.ttf);
        }
    </style>


    <style>
        .crown::after {
            content: url("../images/header/icons8-crown-48.png");
            right: -10px;
            margin-top: -15px;
            position: absolute;
        }

        .default-color:active {
            color: #C293FC;
        }


        .default-color {
            color: #4D5567;
        }

        .app-container {
            margin-left: auto;
            margin-right: auto;
            max-width: 600px;
            overflow-x: hidden
        }

        .footer-accordion {
            /* background-color: #E0CBF6; */
            color: #444;
            cursor: pointer;
            padding: 8px;
            margin-top: 2px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            font-weight: 600;
        }

        .panel, .footer-panel {
            /* padding: 0 18px; */
            /* background-color: white; */
            max-height: 0;
            overflow: hidden;
            outline: none;
            transition: max-height 0.2s ease-out;
        }

        .bar1,
        .bar2,
        .bar3 {
            width: 35px;
            height: 5px;
            background-color: #333;
            margin: 6px 0;
            transition: 0.4s;
        }

        .change .bar1 {
            -webkit-transform: rotate(-45deg) translate(-9px, 6px);
            transform: rotate(-45deg) translate(-9px, 6px);
        }

        .change .bar2 {
            opacity: 0;
        }

        .change .bar3 {
            -webkit-transform: rotate(45deg) translate(-8px, -8px);
            transform: rotate(45deg) translate(-8px, -8px);
        }

        body {
            padding-top: 0px !important;
        }
    </style>

    <link href="{{asset('web-icons/web-icons.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <link href="{{ asset('css/accessory.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body class="bg-white h-screen antialiased leading-none" ondragstart="return false;" ondrop="return false;">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-55TMQ3D"
                height="0" width="0" style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=1306853613000826&ev=PageView&noscript=1"/>
    </noscript>

    <!-- back to top floating button -->
    <button onclick="topFunction()" id="floatBT" title="Go to top">
        <i class="fa fa-arrow-up"></i>
    </button>


    <div class="app-container flex-1 text-primary">
        @include('partials.latest_news')
        @include('layouts.header')
        <main id="main-content" class="bg-white">
            @yield('content')
        </main>
        @yield('footer')
    </div>

    <input id="locale" value="{{\Illuminate\Support\Facades\Session::get('locale')}}" type="hidden">

    <script src="{{ asset('js/accessory.js') }}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/onestorage.js') }}"></script>

    @yield('scripts')

    <script>

        // ------ Add code to change language style -----
        var locale = $("#locale").val();

        {{--if(locale == "en") {--}}
            {{--window.location.href = "{{url('/locale')}}" + "/zh-CN";--}}
        {{--}--}}
        // ----- end

        //Javascript to toggle the menu
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }

        // var acc = document.getElementsByClassName("accordion");
        // var i;

        // for (i = 0; i < acc.length; i++) {
        //     acc[i].addEventListener("click", function() {
        //         // this.classList.toggle("active");
        //         var panel = this.nextElementSibling;
        //         if (panel.style.maxHeight) {
        //             panel.style.maxHeight = null;
        //             panel.style.border = null;
        //         } else {
        //             panel.style.maxHeight = panel.scrollHeight + "px";
        //             // panel.style.border = "1px solid #DCDCDC";
        //         }
        //     });
        // }

        var acc = document.getElementsByClassName("accordion_1");
        var j;

        for (j = 0; j < acc.length; j++) {
            acc[j].addEventListener("click", function() {
                // this.classList.toggle("active");
                var panel_1 = this.parentElement.nextElementSibling;
                // console.log(panel_1)
                if (panel_1.style.maxHeight) {
                    panel_1.style.maxHeight = panel_1.scrollHeight + "px";

                } else {

                    panel_1.style.maxHeight = null;
                    panel_1.style.border = null;
                    // panel.style.border = "1px solid #DCDCDC";
                }
                //  alert(panel_1.style.display);
                if (this.parentElement.nextElementSibling.style.display == 'none') {
                    this.parentElement.nextElementSibling.style.display = 'block';
                    this.childNodes[1].className = this.childNodes[1].className.replace("wb-chevron-down", "wb-chevron-up");

                } else {
                    this.parentElement.nextElementSibling.style.display = 'none';
                    this.childNodes[1].className = this.childNodes[1].className.replace("wb-chevron-up", "wb-chevron-down");

                }

                // if (panel_1.style.maxHeight) {
                //     // console.log(this.childNodes[1].className);

                // } else {


                // }
            });
        }

        function myFunction(x) {
            x.classList.toggle("change");
            $('#default_log').toggle();
            $('#phone_log').toggle();
        }

        var acc = document.getElementsByClassName("accordion_2");
        var j;

        for (j = 0; j < acc.length; j++) {
            acc[j].addEventListener("click", function() {
                // this.classList.toggle("active");
                var panel_2 = this.nextElementSibling;
                // console.log(panel_1)
                if (panel_2.style.maxHeight) {
                    panel_2.style.maxHeight = panel_2.scrollHeight + "px";

                } else {
                    panel_2.style.maxHeight = null;
                    panel_2.style.border = null;
                    // panel.style.border = "1px solid #DCDCDC";
                }
                // alert(this.childNodes[1].childNodes[0].childNodes[0].className);
                // console.log()
                if (this.nextElementSibling.style.display == 'none') {
                    this.nextElementSibling.style.display = 'block';
                    this.childNodes[3].childNodes[1].childNodes[0].className = this.childNodes[3].childNodes[1].childNodes[0].className.replace(
                        "wb-chevron-down", "wb-chevron-up");

                } else {
                    this.nextElementSibling.style.display = 'none';
                    this.childNodes[3].childNodes[1].childNodes[0].className = this.childNodes[3].childNodes[1].childNodes[0].className.replace(
                        "wb-chevron-up", "wb-chevron-down");

                }

            });
        }
    </script>
</body>

</html>
