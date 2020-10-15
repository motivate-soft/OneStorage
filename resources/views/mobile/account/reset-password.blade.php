@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 忘記密碼 | 至尊迷你倉 One Storage')}}</title>
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
    <p class="subheader-title fontsize-21 regular-color mt-10 pt-6 pb-12 px-5">忘記密碼</p>
    <form class="w-full px-5" action="{{route('password.update')}}" method="post">
        @csrf
        <input type="hidden" value="{{$token}}" name="token"/>

        @if(Session::has('errors'))
            <p class="my-2 text-red-700">{{Session::get('errors')->first('password')}}</p>
        @endif

        <div class="input-group mb-8">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
            <input class="form-control fontsize-14" type="email" name="email" placeholder="電子郵件" required>
        </div>

        <div class="input-group mb-8">
            <input class="form-control fontsize-14" type="password" name="password" placeholder="密碼" required>
        </div>

        <div class="input-group mb-8">
            <input class="form-control fontsize-14" type="password" name="password_confirmation" placeholder="密碼" required>
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
