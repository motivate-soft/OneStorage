@extends('layouts.app')

@section('title')
<title>{{__('frontend_login.title')}}</title>
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
    <p class="subheader-title">{{__('frontend_login.menuTitle')}}</p>

    <div class="flex flex-col justify-center lg:flex-row">

        {{--border-r-none lg:border-r--}}
        <div class="w-full lg:w-1/2 px-4">
            <form class="register-form" action="{{url('/login')}}" method="post">
                @csrf
                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                    <input class="form-control" name="phone" required type="text" placeholder="{{__('frontend_login.mobilePhoneNumber')}}">
                </div>

                <input class="w-full form-control mb-2" name="password" type="password" required style="" type="text" placeholder="{{__('frontend_login.password')}}">

                @if(Session::has('errors'))
                    <p class="mt-3 text-red-600">{{Session::get('errors')->first('error')}}</p>
                @endif

                <div class="flex justify-between">
                    <a href="{{url('/forgot-password')}}">
                        <p class="register-subtilte title-violet mt-4">{{__('frontend_login.forgetPassword')}}</p>
                    </a>

                    <a href="{{url('/forgot-number')}}">
                        <p class="register-subtilte title-violet mt-4">{{__('frontend_login.forgetNumber')}}</p>
                    </a>
                </div>

                <button class="submit-btn hover:bg-purple-400" type="submit">
                    {{__('frontend_login.menuTitle')}}
                </button>
            </form>
        </div>

        <div class="w-full px-4 lg:w-1/2 hidden">
            <div class="login-alt-panel">
                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
                    <input class="form-control  py-10 cursor-pointer btn text-left gmail-btn hover:bg-red-500" type="button" value="{{__('frontend_login.loginWithGmail')}}">
                </div>

                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
                    <input class="form-control cursor-pointer btn text-left facebook-btn hover:bg-blue-500" type="button" value="{{__('frontend_login.loginWithFacebook')}}">
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
