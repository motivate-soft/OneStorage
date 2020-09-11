@extends('layouts.app')

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
    @include('partials.accessory')
@endsection

@section('content')
<div class="bg-white mx-auto w-3/5 pb-10 mt-40 mb-10">
    <div class="grid lg:grid-cols-3 md:grid-cols-1 gap-4">
        <div class="col-span-2 mr-10 lg:mr-0">
            <div class="text-left text-5xl pt-10 pb-5 ml-10 border-b">
                <h1 class="font_49 text-purple">新型肺炎疫情最新安排</h1>
                <p class="text2 text-xl mt-4">by admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; November 23, 2020</p>
            </div>
            <div class="text-left ml-10 mt-5">
                <img class="object-none pb-4" src="{{asset('images/latest_news/Image 89.png')}}" class="mt-4">
                <div class="bg-grey-1 py-5 px-5">
                    <h1 class="text2 text-justify leading-loose">
                        檔案編號: <b>SWH/OSM/MEMO2020-0005</b> <br>
                        敬啟者:<br>
                        <br>
                        因應最近新型肺炎疫情，至尊迷你倉 <b>ONE Storage</b> 為保障各客戶及職員的健康，由即 日起將採取以下防疫措施。<br>
                        所有於辦公時間進入至尊迷你倉 <b>ONE Storage</b> 之客戶，各分店職員會先於接待處為客
                        人量度體溫。在疫情減退前，恕不接待沒有配戴口罩之客戶。同時，倉內設有消毒洗手液供所<br>
                        <br>有訪客使用。<br>
                        .<br>
                        此致 所有客戶及員工<br>
                        有關: 應對最近「新型冠狀病毒」安排<br>
                        至尊迷你倉 <b>ONE Storage</b> 呼籲各位客戶通力合作，注意個人衞生及健康，做好一切預
                        防傳染病的措施，與香港市民攜手抗疫。如出現感冒症狀及發燒，請戴上口罩及立即求診。<br>
                    </h1>

                </div>
            </div>
        </div>
        <div class="md:col-span-1 col-span-2 mx-10 lg:mx-0">
            <div class="text-left pt-10 pb-5">
                <div class="text-3xl">
                    <h1 class="font_29 pt-4">其他資訊</h1>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 md:text-left lg:text-left leading-normal px-3 ">
                            【搬屋冇煩惱】搬屋前一定要知嘅小貼士
                        </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 md:text-left lg:text-left leading-normal px-3 ">
                            政府派1萬蚊 點先最快收到錢？ </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 md:text-left lg:text-left leading-normal px-3 ">
                            蝸居套房 </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex rounded-lg mt-2 lg:py-3 px-2">
                    <img class="h-24  ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 md:text-left lg:text-left leading-normal px-3 ">
                            迷你倉點揀好 - 2020年四大安全注意要點
                        </p>
                    </div>
                </a>

            </div>

        </div>
    </div>
</div>

<div class="bg-white mx-auto w-3/5 pt-14 pb-10 mb-10">
    <div class="w-1/3 mx-auto">
        
    </div>
</div>
@endsection


@section('scripts')

@endsection

@section('footer')
@include('layouts.footer')
@endsection