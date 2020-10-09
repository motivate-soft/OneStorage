@extends('layouts.app')

@section('title')
<title>{{__('職位空缺')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">
<style>
    .jointitle-color {
        color: #7F3E98
    }
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
</style>
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<p class=" text-center fontsize-21 py-6 regular-color px-5">職位空缺</p>

<div class="pt-8 bg-grey pb-4 px-5">
    <div class="flex">
        <img class="w-24 h-24 mr-2" src="{{asset('images/contactUs/contactUs.png')}}" alt="Avatar of Jonathan Reinink">
        <div>
            <div class="mb-8">
                <div class="jointitle-color fontsize-25 mb-4">客戶服務主任</div>
                <p class=" fontsize-13 regular-color">處理迷你倉銷售﹑客戶查詢﹑透過電郵及電話處理客戶要求﹑為客戶提供高水平服務﹑負責日常事務﹑
                    文書處理﹑協助租務及市場部運作。 </p>
            </div>

            <div class="mb-4">
                <div class="jointitle-color fontsize-25 mb-4">入職要求</div>
                <p class="after-list regular-color pl-2 py-1">中六或以上程度及一年或以上的客戶服務工作經驗</p>
                <p class="after-list regular-color pl-2 py-1">有客戶服務或銷售經驗者優先</p>
                <p class="after-list regular-color pl-2 py-1">需自律﹑獨立﹑有責任心 </p>
                <p class="after-list regular-color pl-2 py-1">懂基本電腦操作</p>
            </div>

            <div class="mb-4">
                <div class="jointitle-color fontsize-25 mb-4">員工福利</div>
                <p class="after-list regular-color pl-2 py-1">銀行假期 </p>
                <p class="after-list regular-color pl-2 py-1">有薪年假 </p>
                <p class="after-list regular-color pl-2 py-1">醫療福利 </p>
                <p class="after-list regular-color pl-2 py-1">年尾獎金 </p>
                <p class="after-list regular-color pl-2 py-1">營業獎金 </p>
                <p class="after-list regular-color pl-2 py-1">員工優惠 </p>
                <p class="after-list regular-color pl-2 py-1">在職培訓 </p>
                <p class="after-list regular-color pl-2 py-1">晉升機會 </p>
            </div>
        </div>
    </div>

    <p class=" fontsize-13 regular-color px-5 mb-2">請電郵履歷至 swhr@soundwill.com.hk </p>
    <p class=" fontsize-13 regular-color px-5">(申請人提供之全部資料絕對保密及只作招聘之用) </p>
</div>


<form class="w-full mt-12" id="enquiryForm" method="post" action="{{url('/enquiry')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="page" value="{{Helper::$SS_FROM_JOINUS_PAGE}}">

    <p class=" font-bold mb-10 fontsize-19 regular-color">立即申請 </p>
    <div class="flex mb-4 w-full">
        <div class="flex w-1/2 input-group">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
            <input class="w-full form-control placeholder-color" type="text" placeholder="姓" name="firstName" required>
        </div>
        <div class="w-1/2 flex input-group">
            <input class="w-full form-control ml-1 pl-3 placeholder-color" type="text" placeholder="名" name="lastName" required>
        </div>
    </div>


    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
        <input class="form-control placeholder-color" type="text" placeholder="電話號碼" name="phoneNumber">
    </div>

    <div class="input-group mb-8">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
        <input class="form-control placeholder-color" type="text" placeholder="電子郵件" name="email">
    </div>

    <div class=" mx-3 px-3 mb-8">
        <div class="flex py-1">
            <p class="w-2/5 fontsize-14 placeholder-color">上傳 CV</p>
            <div class="flex w-1/3">
                <button class="fileupload-btn fontsize-11 regular-color rounded">選擇檔案</button>
                <input type="file" class="hidden file-input" name="fileCV" />
            </div>
            <span class="file-name ml-2"></span>
        </div>
        <div class="flex py-1">
            <p class="w-2/5 fontsize-14 placeholder-color">上傳 Cover letter</p>
            <div class="flex w-1/3">
                <button class="fileupload-btn fontsize-11 regular-color rounded">選擇檔案</button>
                <input type="file" class="hidden file-input" name="fileCL" />
            </div>
            <span class="file-name ml-2"></span>
        </div>
    </div>

    <button class="submit-btn hover:bg-purple-400 fontsize-21 regular-color">
        送出
    </button>
</form>

    <div class="mt-14 mb-8">
        <p class=" text-left fontsize-21 regular-color font-bold">其他資訊</p>
    </div>
    <div class="mb-8">
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
@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.JoinUs();
    })
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
