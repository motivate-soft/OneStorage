<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Contact Us') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
</head>

<body class="bg-white h-screen antialiased leading-none">

    @include('layouts.header')
    <div class="px-4 md:px-24 lg:px-48 py-32 ">

        <p class="subheader-title">忘記密碼</p>

        <form class=" contact-form">

            <div class="input-group mb-8">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                <input class="form-control" type="text" placeholder="電子郵件">
            </div>


            <button class="submit-btn hover:bg-purple-400">
                送出
            </button>
        </form>
    </div>

</body>

</html>