@extends('layouts.app')

@section('title')
<title>{{__('Location')}}</title>
@endsection

@section('styles')

<style>

    .panel-other {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    li {
        color: #9A9CA2;
    }

    li.active {
        color: #4D5567
    }

    .color-primary {
        color: #4D5567;
    }

    .rentwarehouse-price-title {
        font-size: 13px;
    }

    .rentwarehouse-wrapper-title {
        font-size: 21px;
    }

    .rentwarehouse-price {
        font-weight: 800;
    }

    .branchlocation-store-select-description {
        font-size: 13px;
        color: #B881FD;
    }

    .branchlocation-card-wrapper {
        min-width: 100px;
        height: 280px;
    }

    .branchlocation-card-image {

        width: 90px;
        height: 70px;
        margin-top: 30px;

    }

    .branchlocation-card-title {
        font-size: 13px;
        color: #B881FD;
    }

    .branchlocation-card-content {
        font-size: 14px;
        color: #4F4540;
    }

    .branchlocation-card-wrapper.active {
        background-color: #56628C;
    }

    .branchlocation-card-wrapper.active div .branchlocation-card-content {
        color: white;
    }

    .branchlocation-card-wrapper.active div button {
        background-color: #E0CBF6;
        color: white;
    }

    .store-select {
        color: #4D5567;
        background: white;
    }

    .location-content-item {
        min-width: 120px;
        max-width: 220px;
        height: 300px;
    }

    .location-content-title {
        font-size: 15px;
    }

    .location-content-description {
        font-size: 13px;
    }

    .location-content-item-button {
        background-color: #E0CBF6;
        color: #56628C;
    }

    .ribbon-inner {
        background-color: #B881FD;
        font-size: 9px;
        top: 20px !important;
    }

    .location-content-item-price {
        font-size: 31px;
        font-weight: 700;
    }

    .ui-slider-range {
        background-color: #E0CBF6 !important
    }

    #slider-range {
        width: 300px;
    }

    .rentwarehouse-select-store-image {
        height: 42px;
    }

    .rentwarehouse-select-store-item-area {
        width: 145px;
        height: 57px;
    }

    .rentwarehouse-select-store-item-branch {
        width: 248px;
        height: 57px;
    }

    .rentwarehouse-selects-store-item-select {
        font-size: 20px;
        color: #56628C;
    }

    .rentwarehouse-selects-store-item-option {
        font-size: 20px;
        color: #56628C;
    }

    .rentwarehouse-select-store-button {
        font-size: 25px;
        background-color: #E0CBF6;
        color: #56628C;
        height: 57px;
    }

    .rentwarehouse-price-check {
        font-size: 13px;
        color: #9A9CA2;
    }

    .rentwarehouse-price-toggle-button {
        color: #B881FD;
    }
</style>

<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}" />

<link rel="stylesheet" href="{{ asset('branchlocation/ribbon/site.min.css') }}" />



<link rel="stylesheet" href=" {{asset('branchlocation/slider/jquery-ui.css') }}" />


@endsection


@section('content')
<div class="grid grid-cols-12 px-5">
    <div class="col-start-1 col-span-7">
        <div class="p-5">
            <div class="rentwarehouse-wrapper-title color-primary text-left">租倉</div>
            <div class="flex items-center pl-6 py-5">
                <img class="rentwarehouse-select-store-image px-2" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                <div class="flex relative rentwarehouse-select-store-item-area mx-2">
                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 shadow leading-tight focus:outline-none focus:shadow-outline rentwarehouse-selects-store-item-select">
                        <option class="rentwarehouse-selects-store-item-option" selected disabled>地區</option>
                        <option class="rentwarehouse-selects-store-item-option">Option 1</option>
                        <option class="rentwarehouse-selects-store-item-option">Option 2</option>
                        <option class="rentwarehouse-selects-store-item-option">Option 3</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
                <div class="flex relative rentwarehouse-select-store-item-branch mx-2">
                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 shadow leading-tight focus:outline-none focus:shadow-outline rentwarehouse-selects-store-item-select">
                        <option class="rentwarehouse-selects-store-item-option" selected disabled>分店</option>
                        <option class="rentwarehouse-selects-store-item-option">Option 1</option>
                        <option class="rentwarehouse-selects-store-item-option">Option 2</option>
                        <option class="rentwarehouse-selects-store-item-option">Option 3</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
                <button class="rentwarehouse-select-store-button items-center px-8">租倉</button>
            </div>
            <div>
                <span class="rentwarehouse-price-toggle-button cursor-pointer py-5 select-none">
                    <span class="pr-1">
                        <i class="icon wb-triangle-up"></i>
                    </span>
                    更多選項
                </span>
                <div class="py-3 pl-2 pr-4">
                    <div class="flex">
                        <img class="w-5" src="{{ asset('branchlocation/icons8-pricing-50@2x.png') }}" />
                        <span class="rentwarehouse-price-title color-primary pl-5">價格範圍</span>
                        <span id="amount" class="rentwarehouse-price-title color-primary rentwarehouse-price pl-10"></span>
                    </div>
                    <div class="flex pt-5 pl-5">
                        <div class="cursor-pointer">
                            <div id="slider-range"></div>
                        </div>
                        <div class="pl-40">
                            <label class="flex items-center rentwarehouse-price-check"><input type="checkbox" class="mr-3" />只顯示有折扣地區</label>
                        </div>
                    </div>
                    
                </div>
                <div class="pl-8 pt-5">
                    <div class="flex">
                        <p class="branchlocation-store-select-description">唔知自己需要咩size ? 試下我地既空間計算器</p>
                        <img class="w-4 box-content pl-3" src="{{ asset('branchlocation/icons8-crown-48@2x.png') }}" />
                    </div>
                    <div class="grid grid-cols-4 col-gap-3 pt-1 branchlocation-room-select">
                        <div class="relative max-w-sm rounded overflow-hidden shadow-lg branchlocation-card-wrapper">
                            <img class="branchlocation-card-image mx-auto" src="{{ asset('images/calculator/rooms-03@2x.png') }}" alt="BranchLocation">
                            <div class="px-6 py-4">
                                <div class="branchlocation-card-title text-center mb-2">小型倉</div>
                            </div>
                            <div class="px-6 pt-0 pb-4">
                                <div class="branchlocation-card-content text-center mb-2">
                                    換季衣服, 兒童物件<br />及玩具,書本
                                </div>
                            </div>
                            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow color-primary store-select text-2xl"><i class="icon wb-check"></i></button>
                            </div>
                        </div>
                        <div class="relative max-w-sm rounded overflow-hidden shadow-lg branchlocation-card-wrapper active">
                            <img class="branchlocation-card-image mx-auto" src="{{ asset('images/calculator/rooms-03@2x.png') }}" alt="BranchLocation">
                            <div class="px-6 py-4">
                                <div class="branchlocation-card-title text-center mb-2">小型倉</div>
                            </div>
                            <div class="px-6 pt-0 pb-4">
                                <div class="branchlocation-card-content text-center mb-2">
                                    換季衣服, 兒童物件<br />及玩具,書本
                                </div>
                            </div>
                            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow color-primary store-select text-2xl"><i class="icon wb-check"></i></button>
                            </div>
                        </div>
                        <div class="relative max-w-sm rounded overflow-hidden shadow-lg branchlocation-card-wrapper">
                            <img class="branchlocation-card-image mx-auto" src="{{ asset('images/calculator/rooms-03@2x.png') }}" alt="BranchLocation">
                            <div class="px-6 py-4">
                                <div class="branchlocation-card-title text-center mb-2">小型倉</div>
                            </div>
                            <div class="px-6 pt-0 pb-4">
                                <div class="branchlocation-card-content text-center mb-2">
                                    換季衣服, 兒童物件<br />及玩具,書本
                                </div>
                            </div>
                            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow color-primary store-select text-2xl"><i class="icon wb-check"></i></button>
                            </div>
                        </div>
                        <div class="relative max-w-sm rounded overflow-hidden shadow-lg branchlocation-card-wrapper">
                            <img class="branchlocation-card-image mx-auto" src="{{ asset('images/calculator/rooms-03@2x.png') }}" alt="BranchLocation">
                            <div class="px-6 py-4">
                                <div class="branchlocation-card-title text-center mb-2">小型倉</div>
                            </div>
                            <div class="px-6 pt-0 pb-4">
                                <div class="branchlocation-card-content text-center mb-2">
                                    換季衣服, 兒童物件<br />及玩具,書本
                                </div>
                            </div>
                            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow color-primary store-select text-2xl"><i class="icon wb-check"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rentwarehouse-wrapper-title color-primary text-left pt-4">分店位置</div>
            <div class="grid grid-cols-3 col-gap-3 row-gap-2 pt-5 pl-8 pr-0">
                <div class="relative rounded overflow-hidden shadow-lg location-content-item">
                    <div class="relative">
                        <div class="ribbon ribbon-badge ribbon-pink">
                            <span class="ribbon-inner">最新優惠</span>
                        </div>
                        <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                        <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
                    </div>
                    <div class="px-1 py-2">
                        <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                            <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
                        </div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}" />
                            <p class="color-primary location-content-description">合符消防署條例 + 其他 8 項設施 </p>
                        </div>
                    </div>
                    <div class="absolute px-2 py-1 bottom-0 w-full">
                        <a href="/rentwarehouse">
                            <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                                選擇
                            </button>
                        </a>
                        
                    </div>
                </div>
                <div class="relative rounded overflow-hidden shadow-lg location-content-item">
                    <div class="relative">
                        <div class="ribbon ribbon-badge ribbon-pink">
                            <span class="ribbon-inner">最新優惠</span>
                        </div>
                        <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                        <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
                    </div>
                    <div class="px-1 py-2">
                        <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                            <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
                        </div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}" />
                            <p class="color-primary location-content-description">合符消防署條例 + 其他 8 項設施 </p>
                        </div>
                    </div>
                    <div class="absolute px-2 py-1 bottom-0 w-full">
                        <a href="/rentwarehouse">
                            <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                                選擇
                            </button>
                        </a>
                    </div>
                </div>
                <div class="relative rounded overflow-hidden shadow-lg location-content-item">
                    <div class="relative">
                        <div class="ribbon ribbon-badge ribbon-pink">
                            <span class="ribbon-inner">最新優惠</span>
                        </div>
                        <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                        <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
                    </div>
                    <div class="px-1 py-2">
                        <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                            <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
                        </div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}" />
                            <p class="color-primary location-content-description">合符消防署條例 + 其他 8 項設施 </p>
                        </div>
                    </div>
                    <div class="absolute px-2 py-1 bottom-0 w-full">
                        <a href="/rentwarehouse">
                            <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                                選擇
                            </button>
                        </a>
                    </div>
                </div>
                <div class="relative rounded overflow-hidden shadow-lg location-content-item">
                    <div class="relative">
                        <div class="ribbon ribbon-badge ribbon-pink">
                            <span class="ribbon-inner">最新優惠</span>
                        </div>
                        <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                        <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
                    </div>
                    <div class="px-1 py-2">
                        <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                            <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
                        </div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}" />
                            <p class="color-primary location-content-description">合符消防署條例 + 其他 8 項設施 </p>
                        </div>
                    </div>
                    <div class="absolute px-2 py-1 bottom-0 w-full">
                        <a href="/rentwarehouse">
                            <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                                選擇
                            </button>
                        </a>
                    </div>
                </div>
                <div class="relative rounded overflow-hidden shadow-lg location-content-item">
                    <div class="relative">
                        <div class="ribbon ribbon-badge ribbon-pink">
                            <span class="ribbon-inner">最新優惠</span>
                        </div>
                        <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                        <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
                    </div>
                    <div class="px-1 py-2">
                        <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                            <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
                        </div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}" />
                            <p class="color-primary location-content-description">合符消防署條例 + 其他 8 項設施 </p>
                        </div>
                    </div>
                    <div class="absolute px-2 py-1 bottom-0 w-full">
                        <a href="/rentwarehouse">
                            <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                                選擇
                            </button>
                        </a>
                    </div>
                </div>
                <div class="relative rounded overflow-hidden shadow-lg location-content-item">
                    <div class="relative">
                        <div class="ribbon ribbon-badge ribbon-pink">
                            <span class="ribbon-inner">最新優惠</span>
                        </div>
                        <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                        <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
                    </div>
                    <div class="px-1 py-2">
                        <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                            <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
                        </div>
                        <div class="flex py-1">
                            <img class="w-4 h-4" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}" />
                            <p class="color-primary location-content-description">合符消防署條例 + 其他 8 項設施 </p>
                        </div>
                    </div>
                    <div class="absolute px-2 py-1 bottom-0 w-full">
                        <a href="/rentwarehouse">
                            <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                                選擇
                            </button>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="col-start-8 col-span-5">
        <img class="w-screen p-1 shadow-lg overflow-hidden" src="{{ asset('branchlocation/Group 72@2x.png') }}" />
    </div>

</div>
@endsection



@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/babel-external-helpers/babel-external-helpers.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/animsition/animsition.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Component.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Base.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Config.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Site.js')}}"></script>

<script>

    var stores = document.getElementsByClassName("store-select");

    for (var i = 0; i < stores.length; i++) {

        stores[i].addEventListener("click", function(event) {

            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");

            this.parentNode.parentNode.className += " active";

            console.log(event);

        });
    }
</script>

<script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 200,
            max: 2500,
            values: [200, 2500],
            slide: function(event, ui) {
                $("#amount").html("$" + ui.values[0] + " ~ $" + ui.values[1]);
            }
        });
        $("#amount").html("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));


        $(".rentwarehouse-price-toggle-button").click(function() {
            $(this).next().toggle();

            if($(this).next().css("display") == "none") {
                $(this).find("i").removeClass("wb-triangle-up");
                $(this).find("i").addClass("wb-triangle-down");
            } else {
                $(this).find("i").removeClass("wb-triangle-down");
                $(this).find("i").addClass("wb-triangle-up");
            }

        });

    });
</script>
@endsection

@section('footer')
@include('layouts.footer1')
@endsection