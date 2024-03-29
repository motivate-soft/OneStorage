@extends('layouts.app')

@section('title')
<title>{{__('frontend_title.resetPassword')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="px-4 mx-auto w-1/5 py-52">

    <p class="subheader-title">{{__('frontend_forgetpassword.forgetPassword')}}</p>
    <form class="w-full px-5" action="{{route('password.update')}}" method="post">
        @csrf
        <input type="hidden" value="{{$token}}" name="token"/>

        @if(Session::has('errors'))
            <p class="my-2 text-red-700">{{Session::get('errors')->first('password')}}</p>
        @endif

        <div class="input-group mb-8">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
            <input class="form-control fontsize-14" type="email" name="email" placeholder="{{__('frontend_forgetpassword.email')}}" required>
        </div>

        <div class="input-group mb-8">
            <input class="form-control fontsize-14" type="password" name="password" placeholder="{{__('frontend_forgetpassword.password')}}" required>
        </div>

        <div class="input-group mb-8">
            <input class="form-control fontsize-14" type="password" name="password_confirmation" placeholder="{{__('frontend_forgetpassword.password')}}" required>
        </div>

        <button class="submit-btn hover:bg-purple-400 fontsize-21 font-bold">
            {{__('frontend_forgetpassword.send')}}
        </button>
    </form>
</div>
@endsection

@section('scripts')
@endsection


@section('footer')
@endsection
