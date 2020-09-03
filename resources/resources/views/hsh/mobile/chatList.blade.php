@extends('mobile.layouts.app')

@section('title')
<title>{{__('Chat List')}}</title>
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
@endsection

@section('scripts')
@endsection

@section('footer')

@endsection