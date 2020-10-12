@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 空間計算器 | 至尊迷你倉 One Storage')}}</title>
@endsection

@section('styles')
<style>
    .color-primary {}

    .news-short-content{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    .news-short-title{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1; /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    .content-title {
        font-size: 25px;
        font-weight: 800;
        padding-top: 66px;
        padding-bottom: 22px;
    }

    .calculator-content-title-m {
        font-size: 21px;
        padding-left: 36px;
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

    .calculator-item-element {
        padding: 10px;
        height: 30px;
        margin: 5px;
    }

    .calculator-item-element-title {
        font-size: 15px;

    }

    .calculator-item-element-input {
        background-color: #E0CBF6;
        border-bottom: 1px solid #4D5567;
        font-size: 21px;
        width: 31px;
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

    .room-card-wrapper-m {
        min-width: 160px;
        height: 245px;
        padding-top: 40px;
    }

    .calculator-elements-wrapper {
        background-color: #E0CBF6;
        min-height: 100%;
        padding: 5px;
    }

    div .room-card-wrapper-m {
        background: white;
        color: #B2B5BD;
    }

    div .room-card-wrapper-m div>button {
        background-color: white;
    }

    div .room-card-wrapper-m.active {
        background: #56628C;
        color: white;
    }

    div .room-card-wrapper-m.active div>button {
        background-color: #E0CBF6;
    }

    .maintitle-wrapper-m {
        padding-top: 32px;
    }

    .maintitle-left-m {
        padding-top: 20px;
        /* margin-left:163px;  */
        margin-right: 33px;
        font-size: 28px;
    }

    .maintitle-divider-m {
        height: 65px;
        background-color: #707070;
    }

    .maintitle-right-m {
        padding-top: 20px;
        margin-left: 27.5px;
        font-size: 29px;
    }

    .maintitle-right-aboutus-english-m {
        font-family: 'Roboto';
    }

    .maintitle-right-bottom-m {
        font-size: 11px;
        color: #B2B5BD;
        transform: translate(0, 50%);
    }

    .calculator-others-title-m {
        font-size: 21px;
        padding-left: 26px;
        padding-top: 70px;
        padding-bottom: 20px;
        font-weight: 600;
    }


    .calculator-others-item-divider {
        margin-left: 25px;
        margin-right: 25px;
        height: 1px;
        background-color: #707070;
    }
</style>
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="relative block bg-white">

    <div class="flex maintitle-wrapper-m color-primary">
        <div class="relative maintitle-right-m">
            <div class="flex items-center">
                <span>空間計算器</span>
            </div>
            <div class="capitalize maintitle-right-bottom-m">唔知道自己需要幾大個倉？不如自己計一計！</div>
        </div>
    </div>

    <div class="grid grid-cols-12 col-gap-0 pt-10 px-5">
        <div class="col-start-1 col-span-4" id="category-menu">

        </div>
        <!-- <div id="content-items" class="col-start-5 col-span-8 grid grid-cols-1 col-gap-1 row-gap-2 calculator-elements-wrapper"> -->
        <!-- <div id="content-items" class="col-start-5 col-span-8 flex flex-col calculator-elements-wrapper">

        </div> -->
        <div id="content-wrapper" class="col-start-5 col-span-8 ">
        </div>
    </div>

    <div>
        <p class="color-primary text-left calculator-content-title-m">你需要租</p>
    </div>

    <div class="flex overflow-x-auto pt-10 pb-5">
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3" id="s-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-s.jpg') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">小型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button value="S" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3 active" id="m-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-m.jpg') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">中型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button value="M" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3" id="l-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-l.jpg') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">大型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button value="L" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3" id="xl-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-xl.jpg') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">特大倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button value="XL" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
    </div>

    <div>
        <p class="text-center font_34 mt-10 px-2">預計需要空間：<span id="sizeText">0</span> 呎</p>
        <p class="color-primary text-left calculator-others-title-m">其他資訊</p>
    </div>

    <div class="grid grid-cols-1 row-gap-1 pb-10 px-6">
        <?php
        $latest_news = App\Blog::getNewses(4);
        $count = count($latest_news);
        ?>
        @foreach($latest_news as $index => $news)
            <a href="{{url('/news/'.$news->id)}}" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                <img class="h-24 w-24 ml-0 mb-4" src="{{asset($news->thumbnail)}}">
                <div class="px-3 font_19 leading-normal" style="width: calc(100% - 6rem)">
                    <p class="break-all news-short-title mb-1"><strong>{{$news->title}}</strong></p>
                    <p class="leading-normal break-all news-short-content pt-2" >
                        <?php echo nl2br($news->content) ?>
                    </p>
                </div>
            </a>
            @if($index != $count - 1)
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
            @endif
        @endforeach

    </div>

</div>
@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.Calculator('<div class="flex flex-col calculator-elements-wrapper" style="display: none;">');
    });
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
