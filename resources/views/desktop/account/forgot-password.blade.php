@extends('layouts.app')

@section('title')
<title>{{__('frontend_forgetpassword.title')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="px-4 mx-auto w-1/5 py-52">

    <p class="subheader-title">{{__('frontend_forgetpassword.forgetPassword')}}</p>
    <form action="{{route('password.email')}}" method="post">
        @csrf
        @if(Session::has('errors'))
            <p class="my-2 text-red-600">{{Session::get('errors')->first('email')}}</p>
        @endif
        @if(Session::has('status'))
            <p class="my-2 text-green-600">{{Session::get('status')}}</p>
        @endif
        <div class="input-group mb-8">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
            <input class="form-control" type="email" name="email" placeholder="{{__('frontend_forgetpassword.email')}}" required>
        </div>

        <button class="submit-btn hover:bg-purple-400">
            {{__('frontend_forgetpassword.send')}}
        </button>
    </form>
</div>
@endsection

@section('scripts')
@endsection


@section('footer')
@endsection
