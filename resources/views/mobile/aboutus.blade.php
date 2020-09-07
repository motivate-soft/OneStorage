@extends('mobile.layouts.app')

@section('title')
<title>{{__('About Us')}}</title>
@endsection

@section('styles')
<style>

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
        font-weight:600;
    }
    .maintitle-right-aboutus-english-m {
        font-family:'Roboto';
        font-weight:800;
    }
    .maintitle-right-bottom-m {
        font-size:11px; 
        color:#B2B5BD;
        transform:translate(0, 50%);
    }
    .color-primary {
        color:#4D5567;
    }
    .content-title {
        font-size:25px;
        font-weight:800;
        padding-top:66px;
        padding-bottom:22px;
    }
    .content-description-m {
        font-size:16px;
    }

    .aboutus-images-1 {
        width:191px;
    }
    .aboutus-images-2 {
        width:154px;
    }

    /* .aboutus-images-1-container::-webkit-scrollbar { 
        display: none; /* Chrome, Safari and Opera */
    }
    .aboutus-images-1-container {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    } */

</style>
@endsection

@section('accessory')
    @include('mobile.partials.accessory')
@endsection

@section('content')
<div class="relative block bg-white pb-10">
    <div class="flex maintitle-wrapper-m color-primary text-center mx-auto w-max-content">
        <span class="uppercase maintitle-left-m">one</span>
        <div class="w-px maintitle-divider-m"></div>
        <div class="relative maintitle-right-m">
            <div class="flex">
                <span class="">關於</span>
                <span class="capitalize maintitle-right-aboutus-english-m pt-1">one storage</span>    
            </div>
            <div class="capitalize absolute bottom-0 left-0 maintitle-right-bottom-m">one choice one storage</div>
        </div>
    </div>
    <div class="color-primary">
        <p class="pl-5 content-title mt-1 mb-4">背景</p>
        <p class="leading-relaxed content-description-m px-6">至尊迷你倉為金朝陽集團屬下業務(股票代號：00878.HK)。
        <br/><br/>
至尊迷你倉致力為每位客戶打造最安全及最可靠的倉存空間，實力雄厚，自置物業。分店網絡遍佈港、九、新界，並且積極不斷擴充。 特設多種不同呎碼獨立迷你倉，任君選擇。
        </p>
    </div>

    <div class="">
        <div class="flex overflow-x-auto pt-10 aboutus-images-1-container">
            <img class="flex-shrink-0 aboutus-images-1 mx-4" src="{{asset('images/aboutus/9@2x.png')}}"/>
            <img class="flex-shrink-0 aboutus-images-1 mx-4" src="{{asset('images/aboutus/8@2x.png')}}"/>
            <img class="flex-shrink-0 aboutus-images-1 mx-4" src="{{asset('images/aboutus/1@2x.png')}}"/>
        </div>
    </div>

    <div class="color-primary">
        <p class="pl-5 content-title">迷你倉業務</p>
        <p class="leading-relaxed content-description-m px-6 pt-10">2.4米闊的走廊配以完善的裝置設備，完全符合消防指引。
        <br/><br/>
全天候高清保安監察及警報系統，智能保安進出系統，24小時自助式儲存，支援現金、EPS、支票、信用卡、轉數快及免息分期付費，優質的儲存環境及親切專業的客戶服務，用心為每位客戶提升生活空間質素，承傳尊貴享受典範。
        </p>
    </div>

    <div class="grid grid-cols-2 col-gap-6 row-gap-6 px-6 pt-10">
        <img class="aboutus-images-2" src="{{asset('images/aboutus/6@2x.png')}}"/>
        <img class="aboutus-images-2" src="{{asset('images/aboutus/4@2x.png')}}"/>
        <img class="aboutus-images-2" src="{{asset('images/aboutus/2@2x.png')}}"/>
        <img class="aboutus-images-2" src="{{asset('images/aboutus/7@2x.png')}}"/>
        <img class="aboutus-images-2" src="{{asset('images/aboutus/5@2x.png')}}"/>
        <img class="aboutus-images-2" src="{{asset('images/aboutus/3@2x.png')}}"/>
    </div>

</div>
@endsection

@section('scripts')
@endsection

@section('footer')
@include('mobile.layouts.footer')
@endsection
