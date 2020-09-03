@extends('mobile.layouts.app')

@section('title')
<title>{{__('Join Us')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">
<style>
    .description-color {
        color: #6B6B6B;
    }   
    .robert-font {
        font-family: "RobertBlack";
    }
    .content-body-color {
        background-color: F9F9F9;
    }
</style>
@endsection

@section('header')
	@include('mobile.layouts.header')
@endsection

@section('content')
    <p class=" text-center fontsize-21 py-6 regular-color px-5">職位空缺</p>

    <div class="pt-8 pb-4 px-5">
        <div class=" flex content-body-color">
            <img class="w-24 h-24 mr-2" src="{{asset('images/contactUs/contactUs.png')}}" alt="Avatar of Jonathan Reinink">
            <div>
                <div class="mb-8">
                    <div class=" jointitle-color fontsize-25 font-bold subtitle-font">客戶服務主任</div>
                    <p class=" fontsize-13 regular-color leading-relaxed pt-4">處理迷你倉銷售﹑客戶查詢﹑透過電郵及電話處理客戶要求﹑為客戶提供高水平服務﹑負責日常事務﹑
                        文書處理﹑協助租務及市場部運作。 </p>
                </div>
    
                <div class="mb-4">
                    <div class=" jointitle-color fontsize-25 font-bold subtitle-font">入職要求</div>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">中六或以上程度及一年或以上的客戶服務工作經驗</p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">有客戶服務或銷售經驗者優先</p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">需自律﹑獨立﹑有責任心 </p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">懂基本電腦操作</p>
                </div>
    
                <div class="mb-4">
                    <div class=" jointitle-color fontsize-25 font-bold subtitle-font">員工福利</div>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">銀行假期 </p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">有薪年假 </p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">醫療福利 </p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">年尾獎金 </p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">營業獎金 </p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">員工優惠 </p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">在職培訓 </p>
                    <p class="after-list regular-color pl-2 py-1 leading-relaxed">晉升機會 </p>
                </div>
            </div>
        </div>
        <div class=" pb-2 px-5">
            <p class=" fontsize-13 leading-relaxed description-color font-bold robert-font">請電郵履歷至 swhr@soundwill.com.hk </p>
            <p class=" fontsize-13 leading-relaxed description-color font-bold">(申請人提供之全部資料絕對保密及只作招聘之用) </p>
        </div>

        
    </div>

    <form class=" w-full mt-12 px-5">
        <p class=" font-bold mb-10 fontsize-19 regular-color">立即申請 </p>

        <div class="flex mb-4 w-full">
            <div class="flex w-1/2 input-group">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                <input class="w-full form-control placeholder-color" type="text" placeholder="姓">
            </div>
            <div class="w-1/2 flex input-group">
                <input class="w-full form-control ml-1 pl-3 placeholder-color" type="text" placeholder="名">
            </div>
        </div>


        <div class="input-group mb-4">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
            <input class="form-control placeholder-color" type="text" placeholder="電話號碼">
        </div>

        <div class="input-group mb-8">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
            <input class="form-control placeholder-color" type="text" placeholder="電子郵件">
        </div>

        <div class=" mx-3 px-3 mb-8">
            <div class="flex py-1">
                <p class="w-2/5 fontsize-14 placeholder-color">上傳 CV</p>
                <button class="w-1/3 fileupload-btn fontsize-11 regular-color rounded">選擇檔案</button>
            </div>
            <div class="flex py-1">
                <p class="w-2/5 fontsize-14 placeholder-color">上傳 Cover letter</p>
                <button class="w-1/3 fileupload-btn fontsize-11 regular-color rounded">選擇檔案</button>
            </div>
        </div>

        <button class="submit-btn hover:bg-purple-400 fontsize-21 regular-color">
            送出
        </button>

        <div class="mt-14 mb-8">
            <p class=" text-left fontsize-21 regular-color font-bold">其他資訊</p>
        </div>
    
        <div class="grid grid-cols-1 row-gap-1 pb-12">
            <div class="flex">
                <img class="flex-shrink-0 " src="{{ asset('images/calculator/Image 82@2x.png') }}"/>
                <p class="text-base font-weight-bolder regular-color px-5 py-1 leading-6 fontsize-19">【搬屋冇煩惱】搬屋前一定要知嘅小貼士</p>
            </div>
            <div class=" border-b pt-8 mb-8"></div>
            <div class="flex">
                <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Intersection 39@2x.png') }}"/>
                <p class="text-base font-weight-bolder regular-color px-5 py-1 leading-6 fontsize-19">政府派1萬蚊 點先最快收到錢？</p>
            </div>
            <div class=" border-b pt-8 mb-8"></div>
            <div class="flex">
                <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Image 84@2x.png') }}"/>
                <p class="text-base font-weight-bolder regular-color px-5 py-1 leading-6 fontsize-19">蝸居套房</p>
            </div>
            <div class=" border-b pt-8 mb-8"></div>
            <div class="flex">
                <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Image 84@2x.png') }}"/>
                <p class="text-base font-weight-bolder regular-color px-5 py-1 leading-6 fontsize-19">【迷你倉點揀好 - 2020年四大安全注意要點</p>
            </div>
        </div>

    </form>
@endsection

@section('scripts')

@endsection

@section('footer')
@include('mobile.layouts.footer')
@endsection
