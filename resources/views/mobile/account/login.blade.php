@extends('layouts.app')

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
@include('layouts.header')
@endsection

@section('content')
<p class=" text-center fontsize-21 regular-color mt-10 pt-6 pb-8">登入</p>

<div class=" register-form w-full border-b pb-6">

    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
        <input class="form-control  py-10 cursor-pointer btn text-left gmail-btn-mobile hover:bg-red-500" type="button" value="以 Gmail 登入">
    </div>

    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
        <input class="form-control cursor-pointer btn text-left facebook-btn-mobile hover:bg-blue-500" type="button" value="以 Facebook 登入">
    </div>

</div>

<form class=" register-form w-full"  action="{{url('/login')}}" method="post">
    @csrf
    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
        <input class="form-control fontsize-14" type="text" placeholder="電話號碼" name="phone" required>
    </div>

    <input class="w-full form-control mb-6 fontsize-14 pl-8" placeholder="密碼" name="password" type="password" required>

    <a href="{{url('/forgot-password')}}">
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
