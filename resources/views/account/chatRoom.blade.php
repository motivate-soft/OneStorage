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
    <div class="mx-4 md:mx-36 lg:mx-72 py-32">

        <div class="flex px-12 mt-16 lg:px-32 md:px-20">
            <img class="mr-4 w-32 h-32" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink">
            <div class="body-content lg:rounded-b-none lg:rounded-r mt-28">
                <div class=" branch-title mb-8">Paul Smith, 歡迎你回來!</div>
            </div>
        </div>

        <div class=" chatroom-form">

            <div class=" flex w-full mb-4">

                <div class=" w-1/5 mx-8">
                    <div class=" border text-center branch-tab py-6 bg-gray-200">個人資料</div>
                    <div class=" border text-center branch-tab py-6 tab-active">信息</div>
                </div>

                <div class=" w-4/5 mx-2 border pt-2 px-2">

                <p class=" border-b py-1" style="font-size: 19px; color: #C293FC"><a href="{{url('chatlist')}}">< Back </a></p>

                <div class="flex border-b pt-1 pb-2 px-2 mb-4">
                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mx-auto mt-2" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color ml-4"><br>
                            應繳費用 $ xxxx
                            <br>
                            thanks!
                            <br>
                            <br>
                            Tom.</p>
                    </div>
                </div>
                <div class="flex border-b pt-1 pb-2 px-2 mb-4">

                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mx-auto" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Paul Smith</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color ml-4">Thank you!</p>
                    </div>

                </div>

                <form class="flex border-b pb-8 px-2">
                    <div class=" w-1/6">
                        <img class="w-12 h-12 rounded-full mx-auto" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <p class=" font-bold w-full leading-none subcontent-header py-2">Paul Smith</p>
                        <textarea class="border w-full border-gray-300 px-4 py-2 ml-4 fontsize-16" rows="6" placeholder="Reply To Tom..."></textarea>
                        <button class=" px-6 py-2 my-8 text-center ml-4 fontsize-17" style="background-color: #3F81C7; color:white">送出</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>