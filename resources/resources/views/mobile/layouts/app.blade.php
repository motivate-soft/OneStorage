<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
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
        .default-color:active {
            color: #C293FC;
        }


        .default-color {
            color: #4D5567;
        }

        .app-container {
            margin-left: auto;
            margin-right: auto;
            max-width: 375px;
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

        .panel {
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

<body class="bg-gray-50 h-screen antialiased leading-none" ondragstart="return false;" ondrop="return false;">

    @include('partials.accessory')

    <div class="app-container flex-1 text-primary">
        @include('mobile.partials.latest_news')
        @include('mobile.layouts.header')
        <main id="main-content">
            @yield('content')
        </main>
        @yield('footer')
    </div>

    @yield('scripts')
    
    <script src="{{ asset('js/accessory.js') }}"></script>
    <script>
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