@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 常見問題 | 至尊迷你倉 One Storage')}}</title>
@endsection

@section('styles')
<style>
    .accordion {
        background-color: #E0CBF6;
        color: #444;
        cursor: pointer;
        padding: 12px;
        margin-top: 10px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        /* transition: 0.4s; */
        font-weight: 600;
    }

    .accordion:hover {
        background-color: #9B62D7;
    }

    .answer-panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        /* transition: max-height 0.2s ease-out; */
    }

    li {
        color: #9A9CA2;
    }

    li.active {
        color: #4D5567
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
        color: #444444;
        transform: translate(0, 50%);
    }

    .color-primary {
        color: #4D5567;
    }

    .category-title {
        font-size: 19px;
        font-weight: 600;
    }

    .content-area {
        /*min-height: 500px;*/
        margin-bottom: 30px;
    }

    .color-primary {
        color: #4D5567;
    }
</style>

<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}" />

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="relative block bg-white">

    <!-- <div class="flex maintitle-wrapper-m color-primary text-center mx-auto w-max-content">
        <span class="uppercase maintitle-left-m">one</span>
        <div class="w-px maintitle-divider-m"></div>
        <div class="relative maintitle-right-m">
            <div class="flex items-center">
                <span>常見問題</span>
            </div>
            <div class="capitalize absolute bottom-0 left-0 maintitle-right-bottom-m">解答關於迷你倉的疑難</div>
        </div>
    </div> -->

    <div class="flex maintitle-wrapper-m color-primary">
        <div class="relative maintitle-right-m">
            <div class="flex items-center">
                <span>{{__('frontend_faq.menuTitle')}}</span>
            </div>
        </div>
    </div>

    <div class="flex pt-10">
        <ul class="w-max-content pr-2 mx-auto" id="faq-menu">
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
    <div id="faq-content" class="bg-gray content-area px-6">
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


    <div class="bg-white px-6 py-10">
        <div class="capitalize mt-2 maintitle-right-bottom-m mb-8">{{__('frontend_faq.pageSubTitle')}}</div>
        @include('partials.enquiryForm', ['page' => Helper::$SS_FROM_FAQ_PAGE])
    </div>

</div>
@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.FAQ();
    })
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
