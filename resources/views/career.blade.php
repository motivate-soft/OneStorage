@extends('layouts.app')

@section('title')
<title>{{__('Career')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="bg-white">
    <div class="mx-4 md:mx-24 lg:mx-56 py-13">
        <p class="heading-font">職位空缺</p>
        <div class="horizontal-line">
        </div>

        <div class="flex mt-16 bg-grey p-3">
            <img class="mr-4 w-40 h-40" src="{{asset('images/contactUs/contactUs.png')}}" alt="Avatar of Jonathan Reinink">
            <div class="body-content lg:rounded-b-none lg:rounded-r">
                <div class="mb-8">
                    <div class="subtitle-font">客戶服務主任</div>
                    <p class="content-font">處理迷你倉銷售﹑客戶查詢﹑透過電郵及電話處理客戶要求﹑為客戶提供高水平服務﹑負責日常事務﹑
                        文書處理﹑協助租務及市場部運作。 </p>
                </div>

                <div class="mb-4">
                    <div class=" subtitle-font">入職要求</div>
                    <p class="after-list content-font">中六或以上程度及一年或以上的客戶服務工作經驗</p>
                    <p class="after-list content-font">有客戶服務或銷售經驗者優先</p>
                    <p class="after-list content-font">需自律﹑獨立﹑有責任心 </p>
                    <p class="after-list content-font">懂基本電腦操作</p>
                </div>

                <div class="mb-4">
                    <div class=" subtitle-font">員工福利</div>
                    <p class="after-list content-font">銀行假期 </p>
                    <p class="after-list content-font">有薪年假 </p>
                    <p class="after-list content-font">醫療福利 </p>
                    <p class="after-list content-font">年尾獎金 </p>
                    <p class="after-list content-font">營業獎金 </p>
                    <p class="after-list content-font">員工優惠 </p>
                    <p class="after-list content-font">在職培訓 </p>
                    <p class="after-list content-font">晉升機會 </p>
                </div>
                <p class="content-font contentfont-color">請電郵履歷至 <b>swhr@soundwill.com.hk</b> </p>
                <p class="content-font contentfont-color">(申請人提供之全部資料絕對保密及只作招聘之用) </p>
            </div>
        </div>

        <form class=" contact-form">
            <p class="content-font mb-10">立即申請 </p>

            <div class="flex mb-4 w-full">
                <div class="flex w-1/2 input-group">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                    <input class="w-full form-control" type="text" placeholder="姓">
                </div>
                <div class="w-1/2 flex input-group">
                    <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名">

                </div>
            </div>


            <div class="input-group mb-4">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                <input class="form-control" type="text" placeholder="電話號碼">
            </div>

            <div class="input-group mb-8">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                <input class="form-control" type="text" placeholder="電子郵件">
            </div>

            <div class="flex flex-wrap -mx-3 px-3 mb-8 justify-between">
                <div class="flex">
                    <span class="my-auto upload-label">上傳 <b>CV</b></span>
                    <button class="fileupload-btn ml-2">選擇檔案</button>
                </div>
                <div class="flex">
                    <span class="my-auto upload-label">上傳 <b>Cover letter</b></span>
                    <button class="fileupload-btn ml-2">選擇檔案</button>
                </div>
            </div>

            <button class="submit-btn hover:bg-purple-400">
                送出
            </button>
        </form>

    </div>
</div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection