﻿@extends('mobile.layouts.app')

@section('title')
<title>{{__('About Us')}}</title>
@endsection

@section('styles')
<style>
    .accordion {
        /* background-color: #E0CBF6; */
        color: #444;
        cursor: pointer;
        padding: 12px;
        margin-top:10px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        font-weight:600;
    }

    .accordion:hover {
        background-color: #E0CB00;
    }

    .panel-other {
        padding: 0;
        background-color: white;
        max-height: 0;
        overflow: auto;
        transition: max-height 0.2s ease-out;
    }
    li {
        color:#9A9CA2;
    }
    li.active {
        color:#4D5567
    }
   
    .color-primary {
        color:#4D5567;
    }

    .rentwarehouse-price-title {
        font-size:13px;
    }
    .rentwarehouse-wrapper-title {
        font-size:21px;
    }
    .rentwarehouse-price {
        font-weight: 800;
    }
    .branchlocation-store-select-description {
        font-size:13px;
        color:#B881FD;
    }
    .branchlocation-card-wrapper {
        min-width:100px;
        height:280px;
    }
    .branchlocation-card-image {

        width:90px;
        height:70px;
        margin-top:30px;

    }
    .branchlocation-card-title {
        font-size:13px;
        color:#B881FD;
    }
    .branchlocation-m-card-content {
        font-size:11px;
        color:#4F4540;
    }
    .branchlocation-card-wrapper.active {
        background-color: #56628C;
    }
    .branchlocation-card-wrapper.active div .branchlocation-card-content{
        color:white;
    }
    .branchlocation-card-wrapper.active div .branchlocation-m-card-content{
        color:white;
    }
    .branchlocation-card-wrapper.active div button{
        background-color:#E0CBF6;
        color:white;
    }
    .store-select {
        color:#4D5567;
        background:white;
    }
    .location-content-item-m {
        min-width:120px;
        max-width:312px;
        height:350px;
    }
    .location-content-title {
        font-size:15px;
    }
    .location-content-description {
        font-size:13px;
    }
    .location-content-item-button {
        background-color: #E0CBF6;
        color:#56628C;
    }
    .ribbon-inner {
        background-color: #B881FD;
        font-size:9px;
        top:20px;!important;
    }
    .location-content-item-price {
        font-size:31px;
        font-weight:700;
    }
    .ui-slider-range {
        background-color: #B881FD;!important
    }
    #slider-range {
        width:300px;
    }

    .branchlocation-m-item {
        background-color: white;
    }
    .branchlocation-m-item .branchlocation-m-card-content {
        color:#4F4540;
    }
    .branchlocation-m-item .branchlocation-m-card-check {
        display:none;
    }

    .branchlocation-m-item.active {
        background-color: #56628C;
    }
    .branchlocation-m-item.active .branchlocation-m-card-content {
        color:white;
    }
    .branchlocation-m-item.active .branchlocation-m-card-check {
        display:block;
    }

    .rentwarehouse-select-store-image-m {
        height:25px;
    }
    .rentwarehouse-select-store-item-area-m {
        width:90px;
        height:34px;
    }
    .rentwarehouse-select-store-item-branch-m {
        width:132px;
        height:34px;
    }
    .rentwarehouse-selects-store-item-select-m {
        font-size:11px; 
        color:#56628C;
    }
    .rentwarehouse-selects-store-item-option-m {
        font-size:11px; 
        color:#56628C;
    }
    .rentwarehouse-select-store-button-m {
        font-size:13px;
        background-color: #E0CBF6;
        color:#56628C;
        height:34px;
    }
    .rentwarehouse-price-check {
        font-size:13px;
        color:#9A9CA2;
    }
    

    
    
</style>
<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('branchlocation/ribbon/site.min.css') }}" />
<link rel="stylesheet" href=" {{asset('branchlocation/slider/jquery-ui.css') }}"/>
@endsection

@section('content')
<div class="w-full">
    <img class="p-1 shadow-lg overflow-hidden" src="{{ asset('branchlocation/Intersection 10@2x.png') }}"/>
</div>
<<<<<<< HEAD
=======

>>>>>>> 29971dc0e6ae30699aeea931d3bfca4d17d4798d
<div class="p-5">
    <div class="rentwarehouse-wrapper-title color-primary text-center">租倉</div>
    
    <div class="flex items-center px-2 py-5 mx-auto">
        <img class="rentwarehouse-select-store-image-m px-1" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}"/>
        <div class="flex relative rentwarehouse-select-store-item-area-m mx-1">
            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-1 py-2 pr-8 shadow leading-tight focus:outline-none focus:shadow-outline rentwarehouse-selects-store-item-select-m">
                <option class="rentwarehouse-selects-store-item-option-m" selected disabled>地區</option>
                <option class="rentwarehouse-selects-store-item-option-m">Option 1</option>
                <option class="rentwarehouse-selects-store-item-option-m">Option 2</option>
                <option class="rentwarehouse-selects-store-item-option-m">Option 3</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="flex relative rentwarehouse-select-store-item-branch-m mx-1">
            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-1 py-2 pr-8 shadow leading-tight focus:outline-none focus:shadow-outline rentwarehouse-selects-store-item-select-m">
                <option class="rentwarehouse-selects-store-item-option-m" selected disabled>分店</option>
                <option class="rentwarehouse-selects-store-item-option-m">Option 1</option>
                <option class="rentwarehouse-selects-store-item-option-m">Option 2</option>
                <option class="rentwarehouse-selects-store-item-option-m">Option 3</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <button class="rentwarehouse-select-store-button-m items-center px-2">租倉</button>
    </div>
    
    <div class="flex relative pt-4 mb-12">
        <label class="flex items-center absolute right-0 rentwarehouse-price-check"><input type="checkbox" class="mr-3"/>只顯示有折扣地區</label>
    </div>
    <div class="block">
        <div class="accordion appearance-none flex relative bg-white border-gray-800">
            <img class="align-middle w-4" src="{{ asset('branchlocation/icons8-ruler-50@2x.png') }}"/>
            <span class="pl-2 align-middle">尺寸</span>
            <div class="absolute right-4">
                <i class="icon wb-chevron-down"></i>
            </div>
        </div>
        <div class="panel-other">
            <div class="flex branchlocation-m-item items-center relative">
                <span class="p-4 branchlocation-card-title flex-shrink-0">小型倉</span>
                <span class="pl-0 pt-4 pb-4 pr-5 branchlocation-m-card-content leading-5">換季衣服, 兒童物及玩具,書本</span>
                <span class="pr-0 pt-4 pb-4 absolute right-2 branchlocation-m-card-check text-white"><i class="icon wb-check"></i></span>
            </div>
            <div class="flex branchlocation-m-item items-center relative active">
                <span class="p-4 branchlocation-card-title flex-shrink-0">中型倉</span>
                <span class="pl-0 pt-4 pb-4 pr-5 branchlocation-m-card-content leading-5">梳化, 椅, 櫃, 枱, 床縟, 單車, 高爾夫球袋, 箱</span>
                <span class="pr-0 pt-4 pb-4 absolute right-2 branchlocation-m-card-check text-white"><i class="icon wb-check"></i></span>
            </div>
            <div class="flex branchlocation-m-item items-center relative">
                <span class="p-4 branchlocation-card-title flex-shrink-0">大型倉</span>
                <span class="pl-0 pt-4 pb-4 pr-5 branchlocation-m-card-content leading-5">梳化, 椅, 櫃, 枱, 床縟, 單車, 高爾夫球袋, 箱</span>
                <span class="pr-0 pt-4 pb-4 absolute right-2 branchlocation-m-card-check text-white"><i class="icon wb-check"></i></span>
            </div>
            <div class="flex branchlocation-m-item items-center relative">
                <span class="object-none object-center p-4 branchlocation-card-title flex-shrink-0">特大倉</span>
                <span class="pl-0 pt-4 pb-4 pr-5 branchlocation-m-card-content leading-5">梳化, 椅, 櫃, 枱, 床縟, 單車, 高爾夫球袋, 箱換季衣服, 兒童物及玩具,書本</span>
                <span class="pr-0 pt-4 pb-4 absolute right-2 branchlocation-m-card-check text-white"><i class="icon wb-check"></i></span>
            </div>
        </div>
    </div>
    <div class="p-3">
        <div class="flex">
            <img class="w-5" src="{{ asset('branchlocation/icons8-pricing-50@2x.png') }}"/>
            <span class="rentwarehouse-price-title color-primary pl-5">價格範圍</span>
            <span id="amount" class="rentwarehouse-price-title color-primary rentwarehouse-price pl-10"></span>
        </div>
        <div class="relative pt-5">
            <div class="cursor-pointer mx-auto">
                <div id="slider-range"></div>
            </div>
         
        </div>
        <div class="flex pt-3 pb-3">
            <p class="branchlocation-store-select-description">唔知自己需要咩size ? 試下我地既空間計算器</p>
            <img class="w-4 box-content pl-3" src="{{ asset('branchlocation/icons8-crown-48@2x.png') }}" />
        </div>
      
    </div>
    <div class="rentwarehouse-wrapper-title color-primary text-center pb-4">分店位置</div>
    <div class="grid grid-cols-1 row-gap-2 pt-5 px-8">
        <div class="relative rounded overflow-hidden shadow-lg location-content-item-m mx-auto">
            <div class="relative">
                <div class="ribbon ribbon-badge ribbon-pink">
                    <span class="ribbon-inner">最新優惠</span>
                </div>
                <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
            </div>
            <div class="px-1 py-2">
              <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
              <div class="flex py-1 items-center">
                  <img class="w-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}"/>
                  <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
              </div>
              <div class="flex py-1 items-center">
                <img class="w-3" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}"/>
                <p class="color-primary location-content-description">合符消防署條例  + 其他 8 項設施 </p>
              </div>
            </div>
            <div class="absolute px-2 py-1 bottom-0 w-full">
                <a href="/mobile/rentwarehouse">
                    <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                        選擇
                    </button>
                </a>
            </div>
        </div>
        <div class="relative rounded overflow-hidden shadow-lg location-content-item-m mx-auto">
            <div class="relative">
                <div class="ribbon ribbon-badge ribbon-pink">
                    <span class="ribbon-inner">最新優惠</span>
                </div>
                <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
            </div>
            <div class="px-1 py-2">
              <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
              <div class="flex py-1 items-center">
                  <img class="w-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}"/>
                  <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
              </div>
              <div class="flex py-1 items-center">
                <img class="w-3" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}"/>
                <p class="color-primary location-content-description">合符消防署條例  + 其他 8 項設施 </p>
              </div>
            </div>
            <div class="absolute px-2 py-1 bottom-0 w-full">
                <a href="/mobile/rentwarehouse">
                    <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                        選擇
                    </button>
                </a>
            </div>
        </div>
        <div class="relative rounded overflow-hidden shadow-lg location-content-item-m mx-auto">
            <div class="relative">
                <div class="ribbon ribbon-badge ribbon-pink">
                    <span class="ribbon-inner">最新優惠</span>
                </div>
                <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
            </div>
            <div class="px-1 py-2">
              <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
              <div class="flex py-1 items-center">
                  <img class="w-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}"/>
                  <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
              </div>
              <div class="flex py-1 items-center">
                <img class="w-3" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}"/>
                <p class="color-primary location-content-description">合符消防署條例  + 其他 8 項設施 </p>
              </div>
            </div>
            <div class="absolute px-2 py-1 bottom-0 w-full">
                <a href="/mobile/rentwarehouse">
                    <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                        選擇
                    </button>
                </a>
            </div>
        </div>
        <div class="relative rounded overflow-hidden shadow-lg location-content-item-m mx-auto">
            <div class="relative">
                <div class="ribbon ribbon-badge ribbon-pink">
                    <span class="ribbon-inner">最新優惠</span>
                </div>
                <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
            </div>
            <div class="px-1 py-2">
              <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
              <div class="flex py-1 items-center">
                  <img class="w-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}"/>
                  <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
              </div>
              <div class="flex py-1 items-center">
                <img class="w-3" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}"/>
                <p class="color-primary location-content-description">合符消防署條例  + 其他 8 項設施 </p>
              </div>
            </div>
            <div class="absolute px-2 py-1 bottom-0 w-full">
                <a href="/mobile/rentwarehouse">
                    <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                        選擇
                    </button>
                </a>
            </div>
        </div>
        <div class="relative rounded overflow-hidden shadow-lg location-content-item-m mx-auto">
            <div class="relative">
                <div class="ribbon ribbon-badge ribbon-pink">
                    <span class="ribbon-inner">最新優惠</span>
                </div>
                <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Sunset in the mountains">
                <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ 498 起</span>
            </div>
            <div class="px-1 py-2">
              <div class="mb-2 color-primary location-content-title">火炭(富昌分店)</div>
              <div class="flex py-1 items-center">
                  <img class="w-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}"/>
                  <p class="color-primary location-content-description">富昌中心,火炭黃竹洋街5-7號</p>
              </div>
              <div class="flex py-1 items-center">
                <img class="w-3" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}"/>
                <p class="color-primary location-content-description">合符消防署條例  + 其他 8 項設施 </p>
              </div>
            </div>
            <div class="absolute px-2 py-1 bottom-0 w-full">
                <a href="/mobile/rentwarehouse">
                    <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                        選擇
                    </button>
                </a>
            </div>
        </div>

    </div>

</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('branchlocation/ribbon/babel-external-helpers/babel-external-helpers.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/animsition/animsition.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Component.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Base.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Config.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Site.js')}}"></script>
<script>

     // Script For Accordion
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            // this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                panel.style.border = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                panel.style.border = "1px solid #DCDCDC";
            }
        });
    }

    var stores = document.getElementsByClassName("branchlocation-m-item");

    for (var i = 0; i < stores.length; i ++) {

        stores[i].addEventListener("click", function(event) {

            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");

            this.className += " active";

            console.log(event);
        
    });
    }

</script>
<script>

    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 200,
            max: 2500,
            values: [ 200, 2500 ],
            slide: function( event, ui ) {
            $( "#amount" ).html( "$" + ui.values[ 0 ] + " ~ $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    } );

</script>
@endsection

@section('footer')
@include('mobile.layouts.footer1')
@endsection
