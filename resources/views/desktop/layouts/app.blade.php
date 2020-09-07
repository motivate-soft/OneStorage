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
    <link href="{{ asset('css/font_size.css')}}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/accessory.css') }}" rel="stylesheet">

    @yield('styles')

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>


</head>

<body class="bg-grey h-screen antialiased leading-none" onload="resize()" onresize="resize()" ondragstart="return false;" ondrop="return false;">

    @yield('accessory')
    <!-- back to top floating button -->
    <button onclick="topFunction()" id="floatBT" title="Go to top">
        <i class="fa fa-arrow-up"></i>
    </button>


    <div class="app-container text-primary">
        @include('desktop.layouts.header')
        <main id="main-content">
            @yield('content')
        </main>
        @yield('footer')
    </div>

    @yield('scripts')

    <script src="{{ asset('js/accessory.js') }}"></script>
    <!-- <script src="{{ asset('js/common.js') }}"></script> -->
    <script>
        resize();

        function resize() {
            document.getElementById("main-content").style.marginTop = (document.getElementsByTagName("nav")[0].clientHeight) + "px";
        }

        //Javascript to toggle the menu
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }

        
    </script>
</body>

</html>