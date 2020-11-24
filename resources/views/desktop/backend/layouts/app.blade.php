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

    @yield('styles')

    <style>
        .bg-purple {
            background-color: #B881FD;
        }

        .item-column {
            padding: 1.5rem 1.75rem 1rem 1.75rem;
            font-size: 14px;
            color: #6B6B6B;
        }

        html, title, body, h1, h2, h3, h4, h5, h6, head, p, span, a, li, div {
            word-wrap: normal;
            overflow-wrap: normal;
            word-break: normal;
        }
    </style>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/excel.js') }}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/onestorage.js') }}"></script>
</head>

<body class="bg-white h-screen antialiased" ondragstart="return false;" ondrop="return false;">
    <div class="text-primary h-full">
        <main id="main-content" class="flex robert-black">
            @include('backend.layouts.sidebar')
            <div class="overflow-y-auto w-full bg-grey" id="wrapper">
                @yield('content')
            </div>

        </main>
    </div>

    @yield('scripts')
    <script>

        $(function(){

            $("#language-select").change(function(){
                window.location.href = "{{url('/locale')}}" + "/" + $(this).val();
            });
        })
    </script>
</body>
</html>
