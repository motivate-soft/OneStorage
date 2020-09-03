@extends('mobile.layouts.app')

@section('title')
<title>{{__('Chat List')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">
<style>
    .robert-font {
        font-family: "RobertBlack";
    }

</style>
@endsection

@section('latest_news')

@endsection

@section('header')
	@include('mobile.layouts.header')
@endsection

@section('content')
    <div class="  robert-font mt-10 mb-8 fontsize-25 regular-color text-center px-5"><span class=" font-black">Paul Smith,</span> 歡迎你回來!</div>

    <div class=" w-full">

        <div class=" flex w-full">
            <div class=" w-1/4"></div>
            <a class=" w-1/4 border text-center py-3 fontsize-11 regular-color" href="{{url('mobile/account')}}">個人資料</a>
            <a class=" w-1/4 border text-center bg-grey py-3 fontsize-11 regular-color" href="{{url('mobile/chatlist')}}">信息</a>
            <div class=" w-1/4"></div>
        </div>

        <div class=" w-full border pt-2 px-2">

            <a class="flex items-center border-b pt-1 pb-2 mx-2" href="{{url('mobile/chatroom')}}">
                <div class=" w-1/6">
                    <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                </div>
                <div class=" w-5/6">
                    <div class=" flex">
                        <p class="  robert-font w-4/6 leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                        <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14 font-robert">28-Jul-2020</p>
                    </div>
                    <p class=" robert-font pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                </div>
            </a>
            <a class="flex items-center border-b pt-1 pb-2 mx-2" href="{{url('mobile/chatroom')}}">
                <div class=" w-1/6">
                    <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                </div>
                <div class=" w-5/6">
                    <div class=" flex">
                        <p class="  robert-font w-4/6 leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                        <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14 font-robert">28-Jul-2020</p>
                    </div>
                    <p class=" robert-font pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                </div>
            </a>
            <a class="flex items-center border-b pt-1 pb-2 mx-2" href="{{url('mobile/chatroom')}}">
                <div class=" w-1/6">
                    <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                </div>
                <div class=" w-5/6">
                    <div class=" flex">
                        <p class="  robert-font w-4/6 leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                        <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14 font-robert">28-Jul-2020</p>
                    </div>
                    <p class=" robert-font pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                </div>
            </a>
            <a class="flex items-center border-b pt-1 pb-2 mx-2" href="{{url('mobile/chatroom')}}">
                <div class=" w-1/6">
                    <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                </div>
                <div class=" w-5/6">
                    <div class=" flex">
                        <p class="  robert-font w-4/6 leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                        <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14 font-robert">28-Jul-2020</p>
                    </div>
                    <p class=" robert-font pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                </div>
            </a>
            <a class="flex items-center border-b pt-1 pb-2 mx-2" href="{{url('mobile/chatroom')}}">
                <div class=" w-1/6">
                    <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                </div>
                <div class=" w-5/6">
                    <div class=" flex">
                        <p class="  robert-font w-4/6 leading-none pt-2 fontsize-14 regular-color">Admin - Tom</p>
                        <p class=" w-2/6 text-right pt-2 pr-2 fontsize-14 font-robert">28-Jul-2020</p>
                    </div>
                    <p class=" robert-font pt-1 fontsize-13 regular-color">你好! Paul Smith, 提提你要繳費.</p>
                </div>
            </a>
            
        </div>
    </div>
@endsection

@section('scripts')
@endsection

@section('footer')

@endsection