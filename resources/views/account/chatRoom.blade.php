@extends('layouts.app')

@section('title')
<title>{{ config('app.name', 'Chat Room') }}</title>
@endsection

@section('content')
<div class="mx-4 md:mx-24 lg:mx-60 py-10">
    <div class="flex px-12 mt-8 lg:px-32 md:px-20">
        <img class="mr-4 w-32 h-32" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink">
        <div class="body-content lg:rounded-b-none lg:rounded-r mt-28">
            <div class="branch-title mb-8">Paul Smith, 歡迎你回來!</div>
        </div>
    </div>

    <div class="chatroom-form text-primary">

        <div class="flex w-full mb-4">

            <div class="w-1/5 mx-8">
                <div class="border text-center branch-tab py-6 bg-gray-200"><a href="{{url('/account')}}">個人資料</a></div>
                <div class="border text-center branch-tab py-6 tab-active"><a>信息</a></div>
            </div>

            <div class="w-4/5 mx-2 border">
                <p class="border-b py-2">
                    <a class="mx-4" href="{{url('chatlist')}}" style="font-size: 19px; color: #C293FC">
                        &lt; Back
                    </a>
                </p>
                <div class="flex border-b-2 py-2 mx-4 mb-4">
                    <img class="h-12 mt-2" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    <div class="w-full ml-4">
                        <div class="flex justify-between">
                            <p class="font-extrabold leading-none pt-2 fontsize-14 regular-color">
                                Admin - Tom <span class="text-grey font-normal ml-2">Admin at OneStorage</span>
                            </p>
                            <p class="text-right pt-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <div class="fontsize-13 my-6">
                            <p class="mb-6">你好! Paul Smith, 提提你要繳費. </p>
                            <p class="mb-6">應繳費用 $ xxxx</p>
                            <p class="mb-6">thanks!</p>
                            <p class="mb-6">Tom</p>
                        </div>
                    </div>
                </div>
                <div class="flex py-2 mx-4 mb-4">
                    <img class="h-12 mt-2" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Paul Smith">
                    <div class="w-full ml-4">
                        <div class="flex justify-between">
                            <p class="font-extrabold leading-none pt-2 fontsize-14 regular-color">
                                Paul Smith
                            </p>
                            <p class="text-right pt-2 fontsize-14">28-Jul-2020</p>
                        </div>
                        <div class="fontsize-13 my-6">
                            <p class="mb-6">Thank you!</p>
                        </div>
                    </div>
                </div>


                <form class="flex border-t bg-grey py-2 px-4 mb-4">
                    <img class="h-12 mt-2" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Paul Smith">
                    <div class="w-full ml-4">
                        <p class="font-extrabold leading-none pt-2 fontsize-14 regular-color">
                            Paul Smith
                        </p>
                        <div class="fontsize-13 mt-6">
                            <textarea class="border placeholder-gray-600 px-3 py-2 w-full border-gray-300" placeholder="Reply to Tom..." rows="3"></textarea>
                            <button class="mt-4 mb-3 px-4 py-2 text-center" style="font-size: 17px;background-color: #3F81C7; color:white">送出</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection