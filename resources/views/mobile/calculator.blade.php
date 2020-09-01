@extends('mobile.layouts.app')

@section('title')
<title>{{__('Calculator')}}</title>
@endsection

@section('styles')
<style>

    .color-primary {
    }
    .content-title {
        font-size:25px;
        font-weight:800;
        padding-top:66px;
        padding-bottom:22px;
    }

    .calculator-content-title-m {
        font-size: 21px;
        padding-left:36px;
        padding-top:30px;
        padding-bottom:20px;
    }
    .calculator-item-title {
        font-size: 17px;
        padding:15px;
        text-align: center;
        background-color:#E5E5E5;
    }
    div .calculator-item-title.active {
        background-color: #E0CBF6;
    }

    .calculator-item-element-m {
        padding:10px;
        height:30px;
        margin:5px;
    }
    .calculator-item-element-title-m {
        font-size:15px;
        
    }
    .calculator-item-element-input-m {
        background-color: #E0CBF6;
        border-bottom:1px solid #4D5567;
        font-size: 21px;
        width:31px;
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

    .room-card-image {
        width:100px;
        height:80px;
    }
    .room-card-title {
        font-size:22px;
        /* color:#B2B5BD; */
    }
    .room-footer {
        font-size:29px;
    }
    .room-footer-image {
        width:30px;
        height:30px;
    }

    .room-card-wrapper-m {
        min-width:160px;
        height:245px;
        padding-top:40px;
    }

    .calculator-elements-wrapper {
        background-color: #E0CBF6;
        padding: 5px;
    }

    div .room-card-wrapper-m {
        background:white;
        color:#B2B5BD;
    }

    div .room-card-wrapper-m div > button {
        background-color: white;
    }

    div .room-card-wrapper-m.active {
        background:#56628C;
        color:white;
    }

    div .room-card-wrapper-m.active div > button {
        background-color: #E0CBF6;
    }

    .maintitle-wrapper-m {
        padding-top:32px;
    }
    .maintitle-left-m {
        padding-top:20px; 
        /* margin-left:163px;  */
        margin-right:33px;
        font-size:28px;
    }
    .maintitle-divider-m {
        height:65px; 
        background-color:#707070;
    }
    .maintitle-right-m {
        padding-top:20px; 
        margin-left:27.5px;
        font-size:29px;
    }
    .maintitle-right-aboutus-english-m {
        font-family:'Roboto';
    }
    .maintitle-right-bottom-m {
        font-size:11px; 
        color:#B2B5BD;
        transform:translate(0, 50%);
    }
    .calculator-others-title-m {
        font-size:21px;
        padding-left:26px;
        padding-top:20px;
        padding-bottom:20px;
        font-weight:600;
    }
    .calculator-others-item-image {
        width:124px;
    }
    .calculator-others-item-divider {
        margin-left:25px;
        margin-right:25px;
        height:1px;
        background-color:#707070;
    }


</style>
@endsection

@section('content')
<div class="relative block bg-white">

    <div class="flex maintitle-wrapper-m color-primary text-center mx-auto w-max-content">
        <span class="uppercase maintitle-left-m">one</span>
        <div class="w-px maintitle-divider-m"></div>
        <div class="relative maintitle-right-m">
            <div class="flex items-center">
                <span>空間計算器</span>
            </div>
            <div class="capitalize absolute bottom-0 left-0 maintitle-right-bottom-m">想知到需要幾大既倉? 幫緊你</div>
        </div>
    </div>

    <div class="grid grid-cols-12 col-gap-0 pt-10 px-5">
        <div class="col-start-1 col-span-3">
            <div id="1" class="calculator-item-title color-primary rounded-l-md">客廳</div>
            <div id="item0" class="calculator-item-title color-primary rounded-l-md active">客廳</div>
            <div id="2" class="calculator-item-title color-primary rounded-l-md">睡房</div>
            <div id="3" class="calculator-item-title color-primary rounded-l-md">辦公室</div>
            <div id="4" class="calculator-item-title color-primary rounded-l-md">其他家</div>
            <div id="5" class="calculator-item-title color-primary rounded-l-md">書房</div>
            <div id="6" class="calculator-item-title color-primary rounded-l-md">廚房</div>
        </div>
        <div id="content" class="col-start-4 col-span-9 grid grid-cols-2 col-gap-1 row-gap-0 calculator-elements-wrapper">
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">紅白藍</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">紅白藍</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">紙箱</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">紙箱</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">組合櫃</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">組合櫃</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">雙門鞋</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">雙門鞋</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">雙門鞋</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">紅白藍</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">組合櫃</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">紙箱</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">雙門鞋</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0/>
            </div>
            
            
            
            
        </div>
    </div>

    <div>
        <p class="color-primary text-left calculator-content-title-m">你需要租</p>
    </div>

    <div class="flex overflow-x-auto pt-10 px-10 pb-5">
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-03@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
              <div class="room-card-title text-center mb-2">小型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
              <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3 active">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-04@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
              <div class="room-card-title text-center mb-2">中型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
              <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-05@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
              <div class="room-card-title text-center mb-2">大型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
              <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-06@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
              <div class="room-card-title text-center mb-2">特大倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
              <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
    </div>

    <div>
        <p class="color-primary text-left calculator-others-title-m">其他資訊</p>
    </div>

    <div class="grid grid-cols-1 row-gap-1 pb-10">
        <div class="flex p-6">
            <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Image 82@2x.png') }}"/>
            <p class="text-base font-weight-bolder color-primary px-5 leading-6">【搬屋冇煩惱】搬屋前一定要知嘅小貼士</p>
        </div>
        <div class="calculator-others-item-divider"></div>
        <div class="flex p-6">
            <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Intersection 39@2x.png') }}"/>
            <p class="text-base font-weight-bolder color-primary px-5 leading-6">政府派1萬蚊 點先最快收到錢？</p>
        </div>
        <div class="calculator-others-item-divider"></div>
        <div class="flex p-6">
            <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Image 84@2x.png') }}"/>
            <p class="text-base font-weight-bolder color-primary px-5 leading-6">蝸居套房</p>
        </div>
        <div class="calculator-others-item-divider"></div>
        <div class="flex p-6">
            <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Image 84@2x.png') }}"/>
            <p class="text-base font-weight-bolder color-primary px-5 leading-6">【迷你倉點揀好 - 2020年四大安全注意要點</p>
        </div>
    </div>

</div>
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

@section('footer')
@include('mobile.layouts.footer')
@endsection