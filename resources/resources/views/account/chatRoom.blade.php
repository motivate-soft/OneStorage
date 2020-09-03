@extends('layouts.app')

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
                    <div class=" border text-center bg-grey branch-tab py-6">個人資料</div>
                </a>
                <a href="{{url('chatlist')}}">
                    <div class=" border text-center branch-tab py-6 active">信息</div>
                </a>
            </div>

            <div class="w-4/5 ml-2 border">
                <p class="border-b py-2">
                    <a class="mx-4 font_19 robert-regular" href="{{url('chatlist')}}" style="color: #C293FC">
                        &lt; Back
                    </a>
                </p>
                <div class="flex border-b py-2 mx-4 mb-4">
                    <div>
                        <img class="object-none" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>

                    <div class="w-9/10 pl-6">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                Admin - Tom <span class="text-grey font-normal ml-2 robert-regular">Admin at OneStorage</span>
                            </p>
                            <p class="text-right pt-2 font_14 robert-regular">18-Jul-2020 14:00</p>
                        </div>
                        <div class="font_19 my-6 robert-regular">
                            <p class="mb-6">你好! Paul Smith, 提提你要繳費. </p>
                            <p class="mb-6">應繳費用 $ xxxx</p>
                            <p class="mb-6">thanks!</p>
                            <p class="mb-6">Tom</p>
                        </div>
                    </div>
                </div>
                <div class="flex py-2 mx-4 mb-4">
                    <div>
                        <img class="object-none" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>

                    <div class="w-9/10 pl-6">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                Paul Smith
                            </p>
                            <p class="text-right pt-2 font_14 robert-regular">28-Jul-2020 14:00</p>
                        </div>
                        <div class="font_19 my-6 robert-regular">
                            <p class="mb-6">Thank you!</p>
                        </div>
                    </div>
                </div>

                <form class="flex border-t p-4">
                    <div>
                        <img class="object-none" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                    </div>

                    <div class="w-9/10 pl-6">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                Paul Smith
                            </p>
                        </div>
                        <div class="font_16 robert-regular mt-6">
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