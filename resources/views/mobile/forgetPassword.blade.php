<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Booking') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/common.css')}}" rel="stylesheet">
    <link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}"/>
</head>

<body class=" bg-white">
    <main className="w-full mx-auto">
        <p class="subheader-title fontsize-21 regular-color mt-8 pb-12 font-bold">忘記密碼</p>
    
        <form class=" w-full">

            <div class="input-group mb-8">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                <input class="form-control fontsize-14" type="text" placeholder="電子郵件">
            </div>


            <button class="submit-btn hover:bg-purple-400 fontsize-21 font-bold">
                送出
            </button>
        </form>
    </main>
</body>

</html>