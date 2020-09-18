@extends('layouts.app')

@section('title')
<title>{{__('FAQ')}}</title>
@endsection

@section('styles')
<style>
    .accordion {
        background-color: #E0CBF6;
        color: #444;
        cursor: pointer;
        padding: 12px 12px 12px 24px;
        margin-top: 10px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 19px;
        /* transition: 0.4s; */
        /* font-weight: 600; */
    }

    .accordion:hover {
        background-color: #9B62D7;
    }

    .answer-panel {
        padding: 0 24px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: height 0.2s ease-out;
    }

    li {
        color: #9A9CA2;
    }

    li.active {
        color: #4D5567
    }

    .main-image {
        max-width: 1366px;
    }

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
        /* margin-left: 27.5px; */
        font-size: 50px;
    }

    .maintitle-right-aboutus-english {
        font-family: 'Roboto';
    }

    .maintitle-right-bottom {
        font-size: 19px;
        color: #B2B5BD;
        /* transform: translate(0, 50%); */
    }

    .color-primary {
        color: #4D5567;
    }

    .pb-230 {
        padding-bottom: 230px;
    }

    .category-title {
        font-size: 19px;
        /* font-weight: 600; */
    }

    .content-area {
        min-height: 500px;
    }

    .color-primary {
        color: #4D5567;
    }

    .maintitle-right {
        /* font-weight: 600; */
    }

    #main-content {
        font-family: "RobertBlack";
    }
</style>

<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}" />

@endsection


@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<img class="w-full" src="{{asset('images/faq/shutterstock_1540492397@2x.png')}}" />

<div class="relative block bg-white w-3/5 mx-auto mb-10 floating-panel">

    <div class="maintitle-wrapper color-primary text-center">
        <div class="maintitle-right">
            <p class="mb-6 self-center">常見問題</p>
            <div class="maintitle-right-bottom">解答關於迷你倉的疑難</div>
        </div>
    </div>

    <div class="grid grid-cols-10 gap-6 pt-10">
        <div class="col-start-1 col-span-3 flex relative justify-center">
            <ul class="pl-24" id="faq-menu">
                <!-- <li id="item0" class="p-3 cursor-pointer item category-title active">尺寸選擇</li> -->
                <!-- <li id="item1" class="p-3 cursor-pointer category-title">環境設施
                    <ul class="p-3">
                        <li id="item2" class="p-3 item cursor-pointer category-title">睇倉</li>
                        <li id="item3" class="p-3 item cursor-pointer category-title">消防安保</li>
                        <li id="item4" class="p-3 item cursor-pointer category-title">增值服務</li>
                    </ul>
                </li>
                <li id="item5" class="p-3 item cursor-pointer category-title">合約與條款
                    <ul class="p-3">
                        <li id="item6" class="p-3 item cursor-pointer category-title">合約與條款</li>
                        <li id="item7" class="p-3 item cursor-pointer category-title">合約與條款</li>
                        <li id="item8" class="p-3 item cursor-pointer category-title">合約與條款</li>
                    </ul>
                </li> -->
            </ul>
        </div>
        <div id="faq-content" class="col-start-4 col-span-7 bg-gray content-area pr-40 pb-10">
        </div>

    </div>

</div>

@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.FAQ();
    });
</script>

@endsection


@section('footer')
@include('layouts.footer')
@endsection