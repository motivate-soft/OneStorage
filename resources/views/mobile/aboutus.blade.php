@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 關於我們 | 至尊迷你倉 One Storage')}}</title>
@endsection

@section('styles')
<style>
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
        font-weight: 600;
    }

    .maintitle-right-aboutus-english-m {
        font-family: 'Roboto';
        font-weight: 800;
    }

    .maintitle-right-bottom-m {
        font-size: 11px;
        color: #B2B5BD;
        /* transform:translate(0, 50%); */
    }

    .color-primary {
        color: #4D5567;
    }

    .content-title {
        font-size: 25px;
        font-weight: 800;
        padding-top: 46px;
        padding-bottom: 22px;
    }

    .content-description-m {
        font-size: 16px;
    }

    .aboutus-images-1 {
        width: 191px;
        height: 270px;
    }

    .aboutus-images-2 {
        width: 154px;
    }
</style>
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="relative block bg-white pb-10">
    <div class="flex maintitle-wrapper-m color-primary">
        <div class="relative maintitle-right-m">
            <div class="flex">
                <span class="">關於</span>
                <span class="capitalize maintitle-right-aboutus-english-m pt-1">one storage</span>
            </div>
            <div class="capitalize maintitle-right-bottom-m">one choice one storage</div>
        </div>
    </div>

    <div class="flex overflow-x-auto mt-8 pb-4">
        <img class="flex-shrink-0 aboutus-images-1 object-contain mr-4" src="{{asset('images/aboutus/Web_Photos-03.jpg')}}" />
        <img class="flex-shrink-0 aboutus-images-1 object-contain mr-4" src="{{asset('images/aboutus/Web_Photos-01.jpg')}}" />
        <img class="flex-shrink-0 aboutus-images-1 object-contain" src="{{asset('images/aboutus/Web_Photos-02.jpg')}}" />
    </div>

    <div class="color-primary">
        <p class="pl-5 content-title mt-1 mb-4">至尊迷你倉</p>
        <p class="leading-relaxed content-description-m px-6">為金朝陽集團屬下業務(股票代號： 00878.HK)。
            <br /><br />
            分店遍佈香港、九龍及新界，更積極不斷擴充業務，旗下迷你倉全部合乎消防處規格，為客戶提供優質及專業的儲物收納服務。至尊迷你倉是亞洲迷你倉商會(Self Storage Association Asia, SSAA)及香港迷你倉總會會員(Hong Kong Mini-Storages Association, HKMSA)。
        </p>
    </div>

    <div class="">
        <div class="flex overflow-x-auto pt-10 aboutus-images-1-container pb-4">
            <img class="flex-shrink-0 aboutus-images-1 mr-4 object-contain" src="{{asset('images/aboutus/Web_SW_Photos-01.jpg')}}" />
            <img class="flex-shrink-0 aboutus-images-1 mr-4 object-contain" src="{{asset('images/aboutus/Web_SW_Photos-02.jpg')}}" />
            <img class="flex-shrink-0 aboutus-images-1 object-contain" src="{{asset('images/aboutus/Web_SW_Photos-03.jpg')}}" />
        </div>
    </div>

    <div class="color-primary">
        <p class="pl-5 content-title">設備及付款方式</p>
        <p class="leading-relaxed content-description-m px-6 pt-10">
            迷你倉裝修及設備合乎消防處迷你倉指引，客人可24小時自助儲存，配備全天候保安系統及智能保安系統。
            <br /><br />
            租賃迷你倉可以用以下方式付款：
            <br/>
            EPS、支票、信用卡、轉數快及免息分期
        </p>
    </div>

    <div class="grid grid-cols-2 col-gap-6 row-gap-6 px-6 pt-10">
        <img class="aboutus-images-2 object-fill" src="{{asset('images/aboutus/6@2x.png')}}" />
        <img class="aboutus-images-2 object-fill" src="{{asset('images/aboutus/4@2x.png')}}" />
        <img class="aboutus-images-2 object-fill" src="{{asset('images/aboutus/2@2x.png')}}" />
        <img class="aboutus-images-2 object-fill" src="{{asset('images/aboutus/7@2x.png')}}" />
        <img class="aboutus-images-2 object-fill" src="{{asset('images/aboutus/5@2x.png')}}" />
        <img class="aboutus-images-2 object-fill" src="{{asset('images/aboutus/3@2x.png')}}" />
    </div>

</div>
@endsection

@section('scripts')
@endsection

@section('footer')
@include('layouts.footer')
@endsection
