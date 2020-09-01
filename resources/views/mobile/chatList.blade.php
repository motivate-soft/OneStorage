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

        <div class=" mb-8 fontsize-25 regular-color text-center font-bold">Paul Smith, 歡迎你回來!</div>

        <div class=" chatroom-form">

            <div class=" flex w-full">
                <div class=" w-1/4"></div>
                <div class=" w-1/4 border text-center py-3 fontsize-11 regular-color">個人資料</div>
                <div class=" w-1/4 border text-center py-3 fontsize-11 regular-color">信息</div>
                <div class=" w-1/4"></div>
            </div>

            <div class=" w-full border pt-2 px-2">

                <div class="flex items-center border-b pt-1 pb-2 mx-2">
                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                    </div>
                </div>
                <div class="flex items-center border-b pt-1 pb-2 mx-2">
                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                    </div>
                </div>
                <div class="flex items-center border-b pt-1 pb-2 mx-2">
                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                    </div>
                </div>
                <div class="flex items-center border-b pt-1 pb-2 mx-2">
                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                    </div>
                </div>
                <div class="flex items-center border-b pt-1 pb-2 mx-2">
                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                    </div>
                </div>
                <div class="flex items-center border-b pt-1 pb-2 mx-2">
                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                    </div>
                </div>
                <div class="flex items-center border-b pt-1 pb-2 mx-2">
                    <div class=" w-1/6">
                        <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>
                    <div class=" w-5/6">
                        <div class=" flex">
                            <p class=" w-4/6 font-bold leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                            <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <p class=" pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
</body>

</html>