@extends('layouts.app')

@section('title')
<title>{{__('Calculator')}}</title>
@endsection

@section('styles')

<style>
    .main-wrapper {
        margin-top: -80px;
    }

    .maintitle-wrapper {
        padding-top: 54.5px;
    }

    .maintitle-left {
        padding-top: 30px;
        margin-left: 163px;
        margin-right: 52.5px;
        font-size: 49px;
    }

    .maintitle-divider {
        height: 110px;
        background-color: #707070;
    }

    .maintitle-right {
        padding-top: 30px;
        margin-left: 27.5px;
        font-size: 50px;
    }

    .maintitle-right-aboutus-english {
        font-family: 'Roboto';
    }

    .maintitle-right-bottom {
        font-size: 19px;
        color: #B2B5BD;
        transform: translate(0, 50%);
    }

    .color-primary {
        color: #4D5567;
    }

    .content-title {
        font-size: 25px;
        font-weight: 800;
        padding-top: 66px;
        padding-bottom: 22px;
    }

    .content-description {
        margin-left: 173px;
        margin-right: 173px;
        font-size: 16px;
    }

    .content-image-wrapper-1 {
        padding: 56px;
    }

    .content-image-wrapper-2 {
        padding-top: 56px;
        padding-left: 121px;
        padding-right: 121px;
        margin-bottom: 80px;

    }

    .calculator-content-title {
        font-size: 44px;
        padding-left: 56px;
        padding-top: 30px;
        padding-bottom: 20px;
    }

    .calculator-category-title {
        font-size: 17px;
        padding: 15px;
        text-align: center;
        background-color: #E5E5E5;
    }

    div .calculator-category-title.active {
        background-color: #E0CBF6;
    }

    .calculator-items-wrapper {
        margin-left: 100px;
        margin-right: 100px;
        margin-top: 80px;
    }

    .calculator-item-element {
        padding: 10px;
        height: 60px;
        margin: 5px;
    }

    .calculator-item-element-title {
        font-size: 17px;
    }

    .calculator-elements-wrapper {
        background-color: #E0CBF6;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 120px;
    }

    .calculator-item-element-input {
        background-color: #E0CBF6;
        border-bottom: 1px solid #4D5567;
        font-size: 40px;
        width: 50px;
    }

    /* Remove Spinners in input type number */

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .room-card-wrapper {
        min-width: 120px;
        height: 280px;
        padding-top: 40px;
    }

    .room-card-image {

        width: 100px;
        height: 80px;

    }

    .room-card-title {
        font-size: 22px;
        /* color:#B2B5BD; */
    }

    .room-footer {
        font-size: 29px;
    }

    .room-footer-image {
        width: 30px;
        height: 30px;
    }

    div .room-card-wrapper {
        background: white;
        color: #B2B5BD;
    }

    div .room-card-wrapper div>button {
        background-color: white;
    }

    div .room-card-wrapper.active {
        background: #56628C;
        color: white;
    }

    div .room-card-wrapper.active div>button {
        background-color: #E0CBF6;
    }
</style>
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')

<img class="w-full" src="{{asset('images/calculator/markus-spiske-QtFAXP6z0Wk-unsplash@2x.png')}}" />

<div class="relative block bg-white w-3/5 mx-auto floating-panel mb-10">
    <div class="flex maintitle-wrapper color-primary">
        <span class="uppercase maintitle-left">one</span>
        <div class="w-px maintitle-divider"></div>
        <div class="relative maintitle-right">
            <div class="flex items-center">
                <span>空間計算器</span>
            </div>
            <div class="capitalize absolute bottom-0 left-0 maintitle-right-bottom">想知到需要幾大既倉? 幫緊你</div>
        </div>
    </div>

    <div class="grid grid-cols-12 col-gap-0 mt-16 mx-16 lg:mx-32">
        <div class="col-start-1 col-span-3" id="category-menu">

        </div>
        <div id="content-items" class="col-start-4 col-span-9 grid grid-cols-3 col-gap-10 calculator-elements-wrapper">

        </div>
    </div>

    <div>
        <p class="color-primary text-left calculator-content-title">你需要租</p>
    </div>

    <div class="grid grid-cols-4 col-gap-1 content-image-wrapper-2">
        <div class="relative max-w-sm rounded overflow-hidden shadow-lg room-card-wrapper store-select cursor-pointer" id="s-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-03@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">小型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="relative max-w-sm rounded overflow-hidden shadow-lg room-card-wrapper store-select cursor-pointer" id="m-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-04@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">中型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="relative max-w-sm rounded overflow-hidden shadow-lg room-card-wrapper store-select cursor-pointer" id="l-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-05@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">大型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="relative max-w-sm rounded overflow-hidden shadow-lg room-card-wrapper store-select cursor-pointer" id="xl-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-06@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">特大倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
    </div>

    <div class="pb-20">
        <p class="flex w-max-content room-footer color-primary mx-auto">
            <span class="pr-4">分享</span>
            <a href="#"><img class="pl-2 box-content room-footer-image" src="{{ asset('images/calculator/icons8-facebook-50@2x.png') }}" /></a>
            <a href="#"><img class="pl-2 box-content room-footer-image" src="{{ asset('images/calculator/icons8-instagram-50@2x.png') }}" /></a>
            <a href="#"><img class="pl-2 box-content room-footer-image" src="{{ asset('images/calculator/icons8-whatsapp-50@2x.png') }}" /></a>
            <a href="#"><img class="pl-2 box-content room-footer-image" src="{{ asset('images/calculator/icons8-email-50@2x.png') }}" /></a>
        </p>

    </div>

</div>

@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.Calculator();
    });
</script>

@endsection