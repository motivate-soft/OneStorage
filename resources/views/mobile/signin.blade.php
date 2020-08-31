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
    <main className="flex-1 w-full mx-auto">
        <div class="mx-2  my-13 ">
            <p class=" text-center fontsize-21 regular-color">登入</p>

            <div class=" register-form w-full border-b pb-6">

                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
                    <input class="form-control btn text-center facebook-btn hover:bg-purple-400 fontsize-14" type="button" value="以 Gmail 註冊">
                </div>

                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
                    <input class="form-control btn text-center gmail-btn hover:bg-purple-400 fontsize-14" type="button" value="以 Facebook 註冊">
                </div>

            </div>


            <form class=" register-form w-full">

                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                    <input class="form-control fontsize-14" type="text" placeholder="電話號碼">
                </div>

                <input class="w-full form-control mb-6 fontsize-14 pl-8" type="text" placeholder="地址第一行">

                <p class=" register-subtilte title-violet fontsize-12">忘記密碼?</p>

                <button class="submit-btn hover:bg-purple-400 fontsize-21 secondary-font">
                    登入
                </button>
            </form>
    
        </div>
    </main>
</body>

</html>