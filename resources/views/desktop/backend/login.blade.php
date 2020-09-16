<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font_size.css')}}" rel="stylesheet">
    <style>
        .bg-purple {
            background-color: #B881FD;
        }
    </style>


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>


</head>

<body class="bg-white h-screen antialiased" ondragstart="return false;" ondrop="return false;">
    <div class="text-primary h-full">
        <main id="main-content" class="flex flex-col justify-between py-10 w-2/5 mx-auto robert-black relative h-full">
            <form class="px-20 pt-48 mx-auto" method="post" action="{{url('/backend/login')}}">
                @csrf
                <input type="hidden" value="admin" name="role"/>
                <p class="font_25 mb-10 ml-5 mr-8 leading-tight">
                    OneStorage Backend login<br />
                    Please sign in to your account
                </p>
                <div class="flex mb-6">
                    <span class="w-1/3 font_19 mr-px my-auto">Login Name:</span>
                    <input class="form-input w-2/3 appearance-none rounded-none bg-white border border-gray-300 p-2 text-base" name="first_name" required type="text">
                </div>
                <div class="flex mb-6">
                    <span class="w-1/3 font_19 mr-px my-auto">Password:</span>
                    <input class="form-input w-2/3 appearance-none rounded-none bg-white border border-gray-300 p-2 text-base" name="password" required type="password">
                </div>
                <div class="flex">
                    <div class="w-1/3"></div>
                    <button class="bg-purple  py-2 px-10 text-white font_21 font-bold hover:bg-purple-500" name="name" required type="text">登入</button>
                </div>
            </form>
            <p class="text-center font_19">©️ 2020 One Storage Management Company Limited - All rights reserved.</p>

        </main>
    </div>
</body>

</html>