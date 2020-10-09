@extends('layouts.app')

@section('title')
<title>{{__('关于我们')}}</title>
@endsection

@section('styles')
<style>
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
        font-family: 'Roboto', sans-serif;
        font-weight: 800;
    }

    .maintitle-right-bottom {
        font-size: 19px;
        color: #B2B5BD;
        /* transform: translate(0, 50%); */
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

    .content-image-wrapper-0 {
        margin-left: 153px;
        margin-right: 153px;
    }

    .content-image-wrapper-1 {
        padding: 56px;
    }

    .content-image-wrapper-2 {
        padding-top: 56px;
        padding-left: 121px;
        padding-right: 121px;
        /* margin-bottom: 133px; */

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
<img class="w-full" src="{{asset('images/aboutus/bg_about.jpg')}}" />

<div class="relative block bg-white section mb-10 floating-panel">
    <div class="flex maintitle-wrapper color-primary mx-auto mb-8">
        <div class="maintitle-right mx-auto">
            <div class="ml-1 mb-4">
                <span class="self-center">關於</span>
                <span class="self-center capitalize maintitle-right-aboutus-english pt-2">one storage</span>
            </div>
            <div class="capitalize maintitle-right-bottom">one choice one storage</div>
        </div>
    </div>

    <div class="grid grid-cols-3 col-gap-8 content-image-wrapper-0 mt-20">
        <img src="{{asset('images/aboutus/Web_Photos-03.jpg')}}" />
        <img src="{{asset('images/aboutus/Web_Photos-01.jpg')}}" />
        <img src="{{asset('images/aboutus/Web_Photos-02.jpg')}}" />
    </div>

    <div class="color-primary">
        <p class="text-center content-title-1">至尊迷你倉</p>
        <p class="leading-relaxed content-description">為金朝陽集團屬下業務(股票代號： 00878.HK)。
            <br /><br />
            分店遍佈港、九及新界，更積極不斷擴充業務，旗下迷你倉全部合乎消防處規格，為客戶提供優質的儲存環境及專業的服務。至尊迷你倉是亞洲迷你倉商會(SSAA)及香港迷你倉總會會員(HKMSA)。
        </p>
    </div>

    <div class="grid grid-cols-3 col-gap-8 content-image-wrapper-0 my-10">
        <img src="{{asset('images/aboutus/Web_SW_Photos-01.jpg')}}" />
        <img src="{{asset('images/aboutus/Web_SW_Photos-02.jpg')}}" />
        <img src="{{asset('images/aboutus/Web_SW_Photos-03.jpg')}}" />
    </div>

    <div class="color-primary">
        <p class="text-center content-title-2">設備及付款方式</p>
        <p class="leading-relaxed content-description">
            設備合乎消防處迷你倉指引，客人可24小時自助儲存，配備全天候保安系統及智能保安系統。
            <br /><br />
            付款方式：現金、EPS、支票、信用卡、轉數快及免息分期
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
