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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            height: 2000px;
        }

        html {
            scroll-behavior: smooth;
        }

        #floatBT {
            display: none;
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 99;
            cursor: pointer;
            color: #8e96ff;
            background-color: white;
            border-radius: 9999px;
            padding: 3px 5px 5px 5px;
            text-align: center;
            width: 50px;
            height: 50px;
            font-size: 40px;
        }

        #floatBT:hover {
            background-color: #F0F0F0;
            width: 70px;
            height: 70px;
            font-size: 50px;
            bottom: 1px;
            right: 1px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .icon-bar {
            position: fixed;
            top: 40%;
            right: 0;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .icon-bar a {
            display: block;
            text-align: center;
            padding: 12px;
            transition: all 0.3s ease;
            color: white;
            font-size: 22px;
        }

        .icon-bar a:hover {
            background-color: #000;
        }

        .facebook {
            background: #4a66a0;
            color: white;
        }

        .instagram {
            background: #405de6;
            color: white;
        }

        .youtube {
            background: #c4302b;
            color: white;
        }

        .whatsapp {
            background: #79ba7e;
            color: white;
        }

        .app-container {
            margin-left: auto;
            margin-right: auto;
            /* max-width: 1366px; */
            overflow-x: hidden
        }


        .accordion {
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

        body {
            padding-top: 0px !important;
        }
    </style>

    @yield('styles')
</head>

<body class="bg-gray-50 h-screen antialiased leading-none" ondragstart="return false;" ondrop="return false;">

    <!-- back to top floating button -->
    <button onclick="topFunction()" id="floatBT" title="Go to top">
        <!-- <img src="{{asset('images/bottom-top button@2x.png')}}" class="align-middle my-auto" /> -->
        <i class="fa fa-arrow-up"></i>
    </button>

    <!-- social icons -->
    <div class="icon-bar">
        <a href="https://www.facebook.com/onestorage/" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.youtube.com/channel/UCp91DP8DqA1_4zWhzum1NDQ" class="youtube"><i class="fab fa-youtube"></i></a>
        <a href="https://www.instagram.com/onestorage_hk/" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/85251188503" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
    </div>

    <div class="app-container flex-1 text-primary">
        @include('partials.latest_news')
        @include('layouts.header')
        <main>
            @yield('content')
        </main>
        @yield('footer')
    </div>

    <!-- <script src="{{asset('js/jquery-3.5.1.slim.min.js')}}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('scripts')
    <script>
        //Get the button
        var mybutton = document.getElementById("floatBT");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                // this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                    panel.style.border = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    // panel.style.border = "1px solid #DCDCDC";
                }
            });
        }
        //Javascript to toggle the menu
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script> -->
</body>

</html>