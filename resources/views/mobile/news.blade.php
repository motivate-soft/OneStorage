@extends('mobile.layouts.app')

@section('title')
<title>{{__('空間計算器')}}</title>
@endsection

@section('styles')
<style>
    .w-120 {
        width: 30rem;
    }
    
</style>

@endsection

@section('accessory')
    @include('mobile.partials.accessory')
@endsection

@section('content')
<div class="bg-white pb-10 my-10">
    <div class="grid grid-cols-1 gap-4">
        <div class="col-span-2 mr-5 ">
            <div class="text-left pb-5 ml-5"  style="border-bottom-width:1px">
                <h1 class="font_21" style="color: #7E3E97;">新型肺炎疫情最新安排</h1>
                <p class="font_19 mt-4">by admin November 23, 2020</p>
            </div>
            <div class="text-left ml-5 mt-5">
                <img class=" h-40 w-120 pb-4" src="{{asset('images/latest_news/Image 89.png')}}" class=" mt-4">
                <div style="background-color:#F9F9F9">
                    <div class="pt-5 px-5 pb-5">
                        <h1 class="font_19 text-justify">
                            檔案編號: <br> <b>SWH/OSM/MEMO2020-0005</b> <br>
                            <br>
                            敬啟者:<br>
                            <br>
                            <br>
                            <br>
                            因應最近新型肺炎疫情，至尊迷你倉 ONE Storage 為保障各客戶及職員的健康，由即<br>
                            <br>
                            日起將採取以下防疫措施。<br>
                            <br>
                            所有於辦公時間進入至尊迷你倉 ONE Storage 之客戶，各分店職員會先於接待處為客<br>
                            <br>
                            人量度體溫。在疫情減退前，恕不接待沒有配戴口罩之客戶。同時，倉內設有消毒洗手液供所<br>
                            <br>
                            有訪客使用。<br>
                            <br>
                            .<br>
                            <br>
                            此致 所有客戶及員工<br>
                            <br>
                            有關: 應對最近「新型冠狀病毒」安排<br>
                            <br>
                            至尊迷你倉 ONE Storage 呼籲各位客戶通力合作，注意個人衞生及健康，做好一切預<br>
                            <br>
                            防傳染病的措施，與香港市民攜手抗疫。如出現感冒症狀及發燒，請戴上口罩及立即求診。<br>
                        </h1>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-span-2">
            @include('partials.loginForm')
        </div>
        <div class=" col-span-2 mx-3">
            <div class="text-left  pb-5">
                <div class="px-2 pb-8">
                    <h1 class="font_21">空間計算器</h1>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class=" font_19  leading-normal px-3 ">
                            【搬屋冇煩惱】搬屋前一定要知嘅小貼士
                        </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2 px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 leading-normal px-3 ">
                            政府派1萬蚊 點先最快收到錢？ </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 leading-normal px-3 ">
                            蝸居套房 </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 leading-normal px-3 ">
                            迷你倉點揀好 - 2020年四大安全注意要點
                        </p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

@endsection


@section('scripts')

@endsection

@section('footer')
@include('mobile.layouts.footer')
@endsection