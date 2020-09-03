@extends('mobile.layouts.app')

@section('title')
<title>{{__('Chat Room')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">
@endsection

@section('latest_news')

@endsection

@section('header')
	@include('mobile.layouts.header')
@endsection

@section('content')
    <div class=" mt-10 mb-8 fontsize-25 regular-color text-center font-bold px-5">Paul Smith, 歡迎你回來!</div>

    <div class=" w-full">

        <div class=" flex w-full">
            <div class=" w-1/4"></div>
            <div class=" w-1/4 border text-center py-3 fontsize-11 regular-color">個人資料</div>
            <div class=" w-1/4 border text-center py-3 fontsize-11 regular-color">信息</div>
            <div class=" w-1/4"></div>
        </div>

        <div class="border">
            <p class="border-b py-2">
                <a class="mx-4" href="{{url('mobile/chatlist')}}" style="font-size: 19px; color: #C293FC">
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
@endsection

@section('scripts')
@endsection

@section('footer')

@endsection