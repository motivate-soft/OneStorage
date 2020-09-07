@extends('desktop.layouts.app')

@section('title')
<title>{{__('Sign In')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
<style>
    #main-content {
        font-family: "RobertBlack";
    }
    body{
        background-color: white !important;
    }
</style>

@endsection


@section('content')
<div class="mx-auto w-3/5 h-full" style="padding-top: 81px;">
    <p class="subheader-title">登入</p>

    <div class="flex flex-col lg:flex-row">

        <div class="w-full lg:w-1/2 px-4 border-r-none lg:border-r">
            <form class="register-form" action="{{url('/login')}}" method="post">
                @csrf
                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                    <input class="form-control" name="phoneNumber" required type="text" placeholder="電話號碼">
                </div>

                <input class="w-full form-control mb-6" name="password" type="password" required style="padding-left:32px" type="text" placeholder="密碼">

                <a href="{{url('/forgetpwd')}}">
                    <p class=" register-subtilte title-violet">忘記密碼?</p>
                </a>

                <button class="submit-btn hover:bg-purple-400" type="submit">
                    登入
                </button>
            </form>
        </div>

        <div class="w-full px-4 lg:w-1/2">
            <div class="login-alt-panel">
                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
                    <input class="form-control  py-10 cursor-pointer btn text-left gmail-btn hover:bg-red-500" type="button" value="以 Gmail 登入">
                </div>

                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
                    <input class="form-control cursor-pointer btn text-left facebook-btn hover:bg-blue-500" type="button" value="以 Facebook 登入">
                </div>

            </div>
        </div>

    </div>

</div>
@endsection

@section('scripts')

@endsection


@section('footer')
@endsection