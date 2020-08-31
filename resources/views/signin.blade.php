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

<body class="bg-white h-screen antialiased leading-none"  ondragstart="return false;" ondrop="return false;">

    @include('layouts.header')
    <div class="mx-4 md:mx-24 lg:mx-48 my-13 ">
        <p class="subheader-title">登入</p>

        <div class="flex flex-col lg:flex-row">

            <div class="w-full lg:w-1/2 px-4 border-r-none lg:border-r">
                <form class=" register-form">

                    <div class="input-group mb-4">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                        <input class="form-control" type="text" placeholder="電話號碼">
                    </div>

                    <input class="w-full form-control mb-6" style="padding-left:32px" type="text" placeholder="地址第一行">

                    <p class=" register-subtilte title-violet">忘記密碼?</p>

                    <button class="submit-btn hover:bg-purple-400">
                        登入
                    </button>
                </form>
            </div>

            <div class="w-full px-4 lg:w-1/2">
                <div class=" register-form">

                    <div class="input-group mb-4">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
                        <input class="form-control btn text-center facebook-btn hover:bg-purple-400" type="button" value="以 Gmail 註冊">
                    </div>

                    <div class="input-group mb-4">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
                        <input class="form-control btn text-center gmail-btn hover:bg-purple-400" type="button" value="以 Facebook 註冊">
                    </div>

                </div>
            </div>

        </div>

    </div>

</body>

</html>