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
    <div class="mx-4 md:mx-24 lg:mx-40 my-13 ">

        <div class="flex px-12 mt-16 lg:px-32 md:px-20">
            <img class="mr-4 w-32 h-32" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink">
            <div class="body-content lg:rounded-b-none lg:rounded-r mt-28">
                <div class=" branch-title mb-8">Paul Smith, 歡迎你回來!</div>
            </div>
        </div>

        <div class=" chatroom-form">

            <div class=" flex w-full mb-4">

                <div class=" w-1/5 mx-8">
                    <div class=" border text-center branch-tab py-6">個人資料</div>
                    <div class=" border text-center branch-tab py-6">信息</div>
                </div>

                <div class=" w-4/5 mx-2 border pt-2 px-2">

                    <p class=" border-b py-1" style="font-size: 19px; color: #C293FC">
                        < Back <p>

                            <div class="flex items-center border-b pt-1 pb-2 px-2">
                                <div class=" flex w-5/6">
                                    <img class="w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                                    <div class="text-sm">
                                        <p class=" font-bold leading-none subcontent-header pt-2">Admin - Tom</p>
                                        <p class=" subcontent-header pt-1">你好! Paul Smith, 提提你要繳費.
                                            <br>
                                            <br>
                                            應繳費用 $ xxxx
                                            <br>
                                            <br>
                                            thanks!
                                            <br>
                                            <br>
                                            Tom
                                        </p>
                                    </div>
                                </div>

                                <div class=" w-1/6 text-right pt-2 pr-2">
                                    28-Jul-2020
                                </div>
                            </div>
                            <div class="flex items-center border-b pt-1 pb-8 px-2 mt-4">
                                <div class=" flex w-5/6">
                                    <img class="w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                                    <div class="text-sm">
                                        <p class=" font-bold leading-none subcontent-header pt-2">Paul Smith</p>
                                        <p class=" subcontent-header pt-1">Thank you!</p>
                                    </div>
                                </div>

                                <div class=" w-1/6 text-right pt-2 pr-2">
                                    28-Jul-2020
                                </div>
                            </div>

                            <form class="flex items-center border-b pt-1 pb-8 px-2">
                                <div class=" w-1/6">
                                    <img class="w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                                </div>
                                <div class=" w-5/6">
                                    <p class=" font-bold w-full leading-none subcontent-header py-2">Paul Smith</p>
                                    <textarea class="border w-full border-gray-300 px-4 py-2" rows="6" placeholder="Reply To Tom..."></textarea>
                                    <button class=" px-4 py-2 my-8 text-center" style="font-size: 17px;background-color: #3F81C7; color:white">送出</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>