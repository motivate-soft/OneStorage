@extends('layouts.app')

@section('title')
<title>{{__('frontend_title.faq')}}</title>
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
        color: #444444;
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
        min-height: 350px;
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

<div class="relative block bg-white section mb-10 pb-10 floating-panel">

    <div class="maintitle-wrapper color-primary text-center">
        <div class="maintitle-right">
            <p class="mb-6 self-center">{{__('frontend_faq.menuTitle')}}</p>
        </div>
    </div>

    <div class="grid grid-cols-10 gap-6 pt-10">
        <div class="col-start-1 col-span-3 flex relative justify-center">
            <ul class="pl-24" id="faq-menu">
                @if(Session::has('locale') && Session::get('locale') == "en")
                    @foreach(Helper::$FAQ_DATA_EN as $index => $data)
                        <li data-index="{{$index}}" class="p-3 cursor-pointer item category-title">{{$data['category']}}</li>
                    @endforeach
                @else
                    @foreach(Helper::$FAQ_DATA_CH as $index => $data)
                        <li data-index="{{$index}}" class="p-3 cursor-pointer item category-title">{{$data['category']}}</li>
                    @endforeach
                @endif


            </ul>
        </div>
        <div class="col-start-4 col-span-7 bg-gray content-area pr-40 pb-10" id="faq-content">
            @if(Session::has('locale') && Session::get('locale') == "en")
                @foreach(Helper::$FAQ_DATA_EN as $data)
                    <div id=`{{'content'.$index}}` class="faq-wrapper">
                        @foreach($data['faqs'] as $faq)
                            <div class="accordion flex justify-between appearance-none ">
                                <p class="break-words">{{$faq['question']}}</p>
                                <i class="icon wb-chevron-down text-gray-700 ml-4"></i>
                            </div>
                            <div class="answer-panel">
                                <p class="leading-normal py-4 color-primary">{{$faq['answer']}}</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                @foreach(Helper::$FAQ_DATA_CH as $data)
                    <div id=`{{'content'.$index}}` class="faq-wrapper">
                        @foreach($data['faqs'] as $faq)
                            <div class="accordion flex justify-between appearance-none ">
                                <p class="break-words">{{$faq['question']}}</p>
                                <i class="icon wb-chevron-down text-gray-700 ml-4"></i>
                            </div>
                            <div class="answer-panel">
                                <p class="leading-normal py-4 color-primary">{{$faq['answer']}}</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>

    </div>

    <div class="mt-4 w-full">
        <p class="maintitle-right-bottom text-center mb-8">{{__('frontend_faq.pageSubTitle')}}</p>
        <div class="w-1/3 mx-auto px-4">
            @include('partials.enquiryForm', ['page' => Helper::$SS_FROM_FAQ_PAGE])
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
