@extends('mobile.layouts.app')

@section('title')
<title>{{__('Forget Password')}}</title>
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
    <p class="subheader-title fontsize-21 regular-color mt-10 pb-12 font-bold px-5">忘記密碼</p>
    
    <form class=" w-full px-5">

        <div class="input-group mb-8">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
            <input class="form-control fontsize-14" type="text" placeholder="電子郵件">
        </div>

        <button class="submit-btn hover:bg-purple-400 fontsize-21 font-bold">
            送出
        </button>
    </form>
@endsection

@section('scripts')
@endsection

@section('footer')

@endsection
