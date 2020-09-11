@extends('layouts.app')

@section('title')
<title>{{__('About Us')}}</title>
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
        font-family: 'Roboto', sans-serif;
        font-weight: 800;
    }

    .maintitle-right-bottom {
        font-size: 19px;
        color: #B2B5BD;
        transform: translate(0, 50%);
    }

    .color-primary {
        color: #4D5567;
    }

    .content-title-1 {
        font-size: 25px;
        font-weight: 800;
        padding-top: 66px;
        padding-bottom: 22px;
    }

    .content-title-2 {
        font-size: 25px;
        font-weight: 800;
        padding-top: 15px;
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
        margin-bottom: 133px;

    }

    .main-screen {
        max-width: 1366px;
    }
</style>

@endsection

@section('accessory')
    @include('partials.accessory')
@endsection


@section('content')
<img class="w-full" src="{{asset('images/aboutus/shutterstock_95637766@2x.png')}}" />

<div class="relative block bg-white w-3/5 mx-auto main-wrapper">
    <div class="flex maintitle-wrapper color-primary">
        <span class="uppercase maintitle-left robert-regular">one</span>
        <div class="w-px maintitle-divider"></div>
        <div class="relative maintitle-right">
            <div class="flex items-stretch">
                <span class="self-center">關於</span>
                <span class="self-center capitalize maintitle-right-aboutus-english pt-2">one storage</span>
            </div>
            <div class="capitalize absolute bottom-0 left-0 maintitle-right-bottom">one choice one storage</div>
        </div>
    </div>
    <div class="color-primary">
        <p class="text-center content-title-1">背景</p>
        <p class="leading-relaxed content-description">至尊迷你倉為金朝陽集團屬下業務(股票代號：00878.HK)。
            <br /><br />
            至尊迷你倉致力為每位客戶打造最安全及最可靠的倉存空間，實力雄厚，自置物業。分店網絡遍佈港、九、新界，並且積極不斷擴充。 特設多種不同呎碼獨立迷你倉，任君選擇。
        </p>
    </div>

    <div class="grid grid-cols-3 col-gap-10 content-image-wrapper-1">
        <img src="{{asset('images/aboutus/9@2x.png')}}" />
        <img src="{{asset('images/aboutus/8@2x.png')}}" />
        <img src="{{asset('images/aboutus/1@2x.png')}}" />
    </div>

    <div class="color-primary">
        <p class="text-center content-title-2">迷你倉業務</p>
        <p class="leading-relaxed content-description">2.4米闊的走廊配以完善的裝置設備，完全符合消防指引。
            <br /><br />
            全天候高清保安監察及警報系統，智能保安進出系統，24小時自助式儲存，支援現金、EPS、支票、信用卡、轉數快及免息分期付費，優質的儲存環境及親切專業的客戶服務，用心為每位客戶提升生活空間質素，承傳尊貴享受典範。
        </p>
    </div>

    <div class="grid grid-cols-3 col-gap-8 row-gap-8 content-image-wrapper-2 pb-10">
        <img src="{{asset('images/aboutus/6@2x.png')}}" />
        <img src="{{asset('images/aboutus/4@2x.png')}}" />
        <img src="{{asset('images/aboutus/2@2x.png')}}" />
        <img src="{{asset('images/aboutus/7@2x.png')}}" />
        <img src="{{asset('images/aboutus/5@2x.png')}}" />
        <img src="{{asset('images/aboutus/3@2x.png')}}" />
    </div>

</div>

@endsection

@section('scripts')
@endsection


@section('footer')
@include('layouts.footer')
@endsection
