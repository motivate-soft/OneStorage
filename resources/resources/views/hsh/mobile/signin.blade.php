@extends('mobile.layouts.app')

@section('title')
<title>{{__('Sign In')}}</title>
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
    <p class=" text-center fontsize-21 regular-color pt-6 pb-8">登入</p>

    <div class=" register-form w-full border-b pb-6">

        <div class="input-group mb-4">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
            <button class="w-full facebook-btn fontsize-14 px-4 py-2 hover:bg-purple-400 text-left pl-24">以 Gmail 註冊</button>
        </div>

        <div class="input-group mb-4">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
            <button class="w-full gmail-btn fontsize-14 px-4 py-2 hover:bg-purple-400 text-left pl-24">以 Facebook 註冊</button>
        </div>

    </div>

    <form class=" register-form w-full">

        <div class="input-group mb-4">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
            <input class="form-control fontsize-14" type="text" placeholder="電話號碼">
        </div>

        <input class="w-full form-control mb-6 fontsize-14 pl-8" type="text" placeholder="地址第一行">

        <a href="{{url('mobile/forgetpwd')}}">
            <p class=" register-subtilte title-violet fontsize-12">忘記密碼?</p>
        </a>

        <button class="submit-btn hover:bg-purple-400 fontsize-21 secondary-font">
            登入
        </button>
    </form>
@endsection

@section('scripts')
@endsection

@section('footer')

@endsection
