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
        .app-container {
            margin-left: auto;
            margin-right: auto;
            max-width: 1366px;
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

<body class="bg-gray-50 h-screen antialiased leading-none"  ondragstart="return false;" ondrop="return false;">
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