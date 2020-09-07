@extends('desktop.layouts.app')

@section('title')
<title>{{ __('Chat Room') }}</title>
@endsection

@section('styles')
<style>
    #main-content {
        font-family: "RobertBlack";
    }

    body {
        background-color: white !important;
    }
</style>
@endsection

@section('content')
<div class="mx-auto w-1/2 py-16">

    <div class="flex mb-24">
        <img class="mx-15 object-none" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink">
        <div class="flex flex-col lg:rounded-b-none lg:rounded-r justify-end">
            <div class="branch-title">Paul Smith, 歡迎你回來!</div>
        </div>
    </div>

    <div class="text-primary">

        <div class="flex w-full mb-4">
            <div class="w-1/5">
                <a href="{{url('account')}}">
                    <div class="border text-center branch-tab py-6">個人資料</div>
                </a>
                <a href="{{url('chatlist')}}">
                    <div class="border text-center branch-tab-active py-6">信息</div>
                </a>
            </div>

            <div class="w-4/5 ml-2 border">
                <a class="flex border-b py-3 px-4 cursor-pointer" href="{{url('chatroom')}}">
                    <div>
                        <img class="object-none" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>

                    <div class="w-9/10 pl-6 pt-2">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                Admin - Tom
                            </p>
                            <p class="text-right pt-2 font_14 robert-regular">28-Jul-2020</p>
                        </div>
                        <div class="font_19 mt-2 robert-regular">
                            <p class="">你好! Paul Smith, 提提你要繳費. </p>
                        </div>
                    </div>
                </a>
                <a class="flex border-b py-3 px-4 cursor-pointer" href="{{url('chatroom')}}">
                    <div>
                        <img class="object-none" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>

                    <div class="w-9/10 pl-6 pt-2">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                Admin - Tom
                            </p>
                            <p class="text-right pt-2 font_14 robert-regular">28-Jul-2020</p>
                        </div>
                        <div class="font_19 mt-2 robert-regular">
                            <p class="">你好! Paul Smith, 提提你要繳費. </p>
                        </div>
                    </div>
                </a>
                <a class="flex border-b py-3 px-4 cursor-pointer" href="{{url('chatroom')}}">
                    <div>
                        <img class="object-none" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>

                    <div class="w-9/10 pl-6 pt-2">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                Admin - Tom
                            </p>
                            <p class="text-right pt-2 font_14 robert-regular">28-Jul-2020</p>
                        </div>
                        <div class="font_19 mt-2 robert-regular">
                            <p class="">你好! Paul Smith, 提提你要繳費. </p>
                        </div>
                    </div>
                </a>
                <a class="flex border-b py-3 px-4 cursor-pointer" href="{{url('chatroom')}}">
                    <div>
                        <img class="object-none" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>

                    <div class="w-9/10 pl-6 pt-2">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                Admin - Tom
                            </p>
                            <p class="text-right pt-2 font_14 robert-regular">28-Jul-2020</p>
                        </div>
                        <div class="font_19 mt-2 robert-regular">
                            <p class="">你好! Paul Smith, 提提你要繳費. </p>
                        </div>
                    </div>
                </a>
                <a class="flex border-b py-3 px-4 cursor-pointer" href="{{url('chatroom')}}">
                    <div>
                        <img class="object-none" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>

                    <div class="w-9/10 pl-6 pt-2">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                Admin - Tom
                            </p>
                            <p class="text-right pt-2 font_14 robert-regular">28-Jul-2020</p>
                        </div>
                        <div class="font_19 mt-2 robert-regular">
                            <p class="">你好! Paul Smith, 提提你要繳費. </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection