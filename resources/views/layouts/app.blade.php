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
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/accessory.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 2000px;
        }

        .heading1 {
            font-size: 24px;
            color: white;
        }

        .heading2 {
            font-size: 33px;
            color: #4D5567;
        }


        .text0 {
            font-size: 14px;
            color: #4D5567;
        }

        .text1 {
            font-size: 16px;
            color: #4D5567;
            line-height: 1.225;
        }

        .text2 {
            /* 19px */
            font-size: 19px;
            color: #4D5567;
        }

        .text3 {
            font-size: 20px;
            color: white
        }

        .text4 {
            /* 21px */
            font-size: 21px;
            color: #4D5567;
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

        @font-face {
            font-family: 'RobertBlack';
            src: url(fonts/Roboto-Black.ttf);
        }

        @font-face {
            font-family: 'RobertRegular';
            src: url(fonts/Roboto-Regular.ttf);
        }

        main {
            font-family: 'RobertBlack';
        }

    </style>

    @yield('styles')

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>

<body class="bg-grey h-screen antialiased leading-none" ondragstart="return false;" ondrop="return false;">

    @include('partials.accessory')

    <div class="app-container text-primary">
        <!-- @include('partials.latest_news') -->
        @include('layouts.header')
        <main id="main-content">
            @yield('content')
        </main>
        @yield('footer')
    </div>

    @yield('scripts')
    <script src="{{ asset('js/accessory.js') }}"></script>
    <script>
        document.getElementById("main-content").style.marginTop = (document.getElementsByTagName("nav")[0].clientHeight + 7) + "px";
    </script>
</body>

</html>