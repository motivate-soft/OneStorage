@extends('layouts.app')

@section('title')
<title>{{__('Calculator')}}</title>
@endsection

@section('styles')

<style>
    .main-image img {
        max-width: 100%;
    }

    .main-wrapper {
        margin-top: -80px;
        margin-right: 200px;
        margin-left: 200px;
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

    .calculator-item-title {
        font-size: 17px;
        padding: 15px;
        text-align: center;
        background-color: #E5E5E5;
    }

    div .calculator-item-title.active {
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
        font-size: 19px;
    }

    .calculator-elements-wrapper {
        background-color: #E0CBF6;
        padding: 5px;
    }

    .calculator-item-element-input {
        background-color: #E0CBF6;
        border-bottom: 1px solid #4D5567;
        font-size: 40px;
        width: 40px;
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

    .main-screen {
        max-width: 1366px;
    }
</style>
@endsection


@section('content')

<div class="w-full mx-auto main-image">
    <img class="p-0 m-0" src="{{asset('images/calculator/markus-spiske-QtFAXP6z0Wk-unsplash@2x.png')}}" />
</div>

<div class="relative block bg-white main-wrapper">
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

    <div class="grid grid-cols-12 col-gap-0 calculator-items-wrapper">
        <div class="col-start-1 col-span-3">
            <div id="1" class="calculator-item-title color-primary rounded-l-md cursor-pointer">客廳用品</div>
            <div id="item0" class="calculator-item-title color-primary rounded-l-md active cursor-pointer">客廳用品</div>
            <div id="2" class="calculator-item-title color-primary rounded-l-md  cursor-pointer">睡房用品</div>
            <div id="3" class="calculator-item-title color-primary rounded-l-md  cursor-pointer">辦公室用品</div>
            <div id="4" class="calculator-item-title color-primary rounded-l-md  cursor-pointer">其他家庭用品</div>
            <div id="5" class="calculator-item-title color-primary rounded-l-md  cursor-pointer">書房用品</div>
            <div id="6" class="calculator-item-title color-primary rounded-l-md  cursor-pointer">廚房用品</div>
        </div>
        <div id="content" class="col-start-4 col-span-9 grid grid-cols-3 col-gap-1 calculator-elements-wrapper">
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">紅白藍5個</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">紅白藍5個</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">紅白藍5個</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">紙箱10個</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">紙箱10個</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">紙箱10個</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">組合櫃</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">組合櫃</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">組合櫃</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">雙門鞋櫃</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">雙門鞋櫃</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">雙門鞋櫃</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
            <div class="flex relative calculator-item-element">
                <span class="calculator-item-element-title color-primary absolute bottom-0 left-0">雙門鞋櫃</span>
                <input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 />
            </div>
        </div>
    </div>

    <div>
        <p class="color-primary text-left calculator-content-title">你需要租</p>
    </div>

    <div class="grid grid-cols-4 col-gap-1 content-image-wrapper-2">
        <div class="relative max-w-sm rounded overflow-hidden shadow-lg room-card-wrapper store-select cursor-pointer">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-03@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">小型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="relative max-w-sm rounded overflow-hidden shadow-lg room-card-wrapper store-select active  cursor-pointer">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-04@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">中型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="relative max-w-sm rounded overflow-hidden shadow-lg room-card-wrapper store-select cursor-pointer">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-05@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">大型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="relative max-w-sm rounded overflow-hidden shadow-lg room-card-wrapper store-select cursor-pointer">
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
    var items = document.getElementsByClassName("calculator-item-title");
    var content = document.getElementById("content");

    for (var i = 0; i < items.length; i++) {

        items[i].addEventListener("click", function(event) {

            if (event.target.id == "item0") {
                window.location.reload();
            }

            event.cancelBubble = true;

            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");

            this.className += " active";

            content.innerHTML = "<div style='color:blue;font-size:30px;'>Page : " + this.id + "</div>";

            console.log(event);

        });
    }

    var stores = document.getElementsByClassName("store-select");

    for (var i = 0; i < stores.length; i++) {

        stores[i].addEventListener("click", function(event) {

            var current = document.getElementsByClassName("active");
            current[1].className = current[1].className.replace(" active", "");

            this.className += " active";

            console.log(event);

        });
    }

    var buttons = document.getElementsByClassName("store-select-button");

    for (var i = 0; i < buttons.length; i++) {

        buttons[i].addEventListener("click", function(event) {

            event.cancelBubble = true;

            alert("selected");

            // var current = document.getElementsByClassName("active");
            // current[1].className = current[1].className.replace(" active", "");

            // this.className += " active";

            // console.log(event);

        });
    }
</script>

@endsection
