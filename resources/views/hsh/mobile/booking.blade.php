@extends('mobile.layouts.app')

@section('title')
<title>{{__('Booking')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">
@endsection

@section('latest_news')
@endsection

@section('header')
@endsection

@section('content')
<div class=" w-96 mx-auto mt-4 mb-12 px-5">

    <div class=" flex">
        <img class=" w-7 h-7 left-20 z-20 mt-4" onclick="javascript:history.go(-1)" src="{{asset('images/contactUs/Backward_arrow@2x.png')}}" alt="Back">
        <p class=" text-center w-full pt-4 pb-2 font-bold regular-color fontsize-18">立即申請 </p>    
    </div>

    <form class="px-8 pt-5">

        <p class=" font-bold mb-4 fontsize-21 regular-color">黃竹坑(瑞琪分店) </p>

        <p class=" font-bold mb-4 fontsize-20 regular-color"><span class=" fontsize-25">12</span>平方呎 </p>

        <div role="alert" class="mb-4">
            <div class=" text-center font-bold rounded-t px-4 py-2 mr-4 ml-4 fontsize-21 bgsecondary-color secondary-fontcolor">
                月費
            </div>
            <div class="border border-t-0 rounded-b px-4 py-3 text-center mr-4 ml-4">
                <p class="font-bold fontsize-27" style="color:#324A5E">$600</p>
            </div>
        </div>

        <div class="flex mb-4 w-full pt-8 border-t">
            <div class="flex w-1/2 input-group">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                <input class="w-full form-control fontsize-12" type="text" placeholder="姓">
            </div>
            <div class="w-1/2 flex input-group">
                <input class="w-full form-control fontsize-12 " style="margin-left: 4px;padding-left:12px" type="text" placeholder="名">
            </div>
        </div>


        <div class="input-group mb-4">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
            <input class="form-control" type="text" placeholder="電話號碼">
        </div>

        <div class="w-full inline-block relative mb-6">
            <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                <option value="" selected>查詢問題</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>

        <div class="w-full inline-block relative pb-4 border-b">
            <input class="w-full form-control pb-8 border-b" style="padding: 16px 8px 16px 16px;" type="text" placeholder="你的信息">

        </div>

        <div class=" w-full mt-4 md:flex md:items-center mb-6">
            <label class="md:w-2/3 block text-gray-500 font-bold">
                <input class="mr-2 rounded border-gray-400 mt-4" type="checkbox">
                <span class="text-sm fontsize-10">
                    要運輸
                </span>
            </label>
        </div>

        <button class="submit-btn hover:bg-purple-400 fontsize-18">
            送出
        </button>

        <div class=" flex py-4 mt-2 border-t">
            <div class="w-2/5">
                <p class=" text-center font-bold fontsize-18" style="color: #988F9A">分享</p>
            </div>
            <div class="w-2/5 flex">
                <img class="img-links pr-1 object-none" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="facebook">
                <img class="img-links pr-1 object-none" src="{{asset('images/contactUs/icons8-instagram-50.png')}}" alt="instagram">
                <img class="img-links pr-1 object-none" src="{{asset('images/contactUs/icons8-whatsapp-50.png')}}" alt="whatsapp">
                <img class="img-links pr-1 object-none" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="email">
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
@endsection

@section('footer')
@endsection