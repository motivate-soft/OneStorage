@extends('desktop.layouts.app')

@section('title')
<title>{{__('Forget Password')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="px-4 mx-auto w-1/5 py-52">

    <p class="subheader-title">忘記密碼</p>

    <form>

        <div class="input-group mb-8">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
            <input class="form-control" type="text" placeholder="電子郵件">
        </div>


        <button class="submit-btn hover:bg-purple-400">
            送出
        </button>
    </form>
</div>
@endsection

@section('scripts')
@endsection


@section('footer')
@endsection
