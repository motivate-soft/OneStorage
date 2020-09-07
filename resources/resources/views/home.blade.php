@extends('layouts.app')

@section('title')
<title>{{__('Home')}}</title>
@endsection

@section('styles')
<style>
    .bg-hero {
        background-image: url(images/bg_hero.jpg);
        background-repeat: no-repeat;
        background-position: bottom right;
        min-height: 647px;
    }


    .page-title {
        font-size: 91px;
        position: relative;
    }

    .title-shadow:before {
        content: '';
        position: absolute;
        width: 94%;
        height: 105%;
        bottom: 30px;
        z-index: -1;
        left: -10px;
        background-color: #E0CBF6;
    }

    .page-desc {
        font-size: 39px;
        color: #B2B5BD;
    }

    .box-shadow {
        position: relative;
        z-index: 10;
    }

    .box-shadow:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-color: #FABD02;
        bottom: -18px;
        left: 18px;
    }

    .box-shadow1 {
        position: relative;
        z-index: 10;
    }

    .box-shadow1:before {
        content: '';
        position: absolute;
        width: 130%;
        height: 100%;
        z-index: -1;
        background-color: #FABD02;
        top: 15px;
        left: -15%;
    }

    .text-name {
        font-size: 17px;
        color: #AFAFAF;
    }

    .score-lg {
        display: flex;
        font-size: 28px;
        font-weight: bold;
        background-color: #FABD02;
        border-radius: 9999px;
        color: #56628C;
        width: 62px;
        height: 62px;
    }

    .score-base {
        display: flex;
        font-size: 22px;
        font-weight: bold;
        background-color: #FABD02;
        border-radius: 9999px;
        color: #56628C;
        width: 52px;
        height: 52px;
    }

    .button-primary {
        font-size: 18px;
        border-radius: 0.3rem;
        color: #56628C;
        background-color: #E0CBF6;
        padding-left: 18px;
        padding-right: 18px;
    }

    .button-second {
        font-size: 18px;
        border-radius: 9999px;
        color: #56628C;
        background-color: #E0CBF6;
        padding-left: 40px;
        padding-right: 40px;
    }


    .yellow-shadow {
        box-shadow: 10px 15px #FABD02;
    }

    .yellow-shadow1 {
        box-shadow: 18px 18px #FABD02;
    }

    .contact-icon {
        width: 24px;
        height: 24px;
    }

    #main-content{
        font-family: "RobertBlack";
    }
</style>

@endsection

@section('content')

<div class="bg-white flex w-full pl-36 pt-10 bg-hero">
    <div class="w-1/2">
        <p class="z-20 page-title leading-snug text-primary mb-2">
            唔想屋企<span class="text-yellow">咁亂</span>?
        </p>
        <span class="z-10 page-title title-shadow">
            搵One Storage 啦
        </span>
        <p class="page-desc pt-6">至尊迷你倉 ‧ One Choice ‧ One Storage</p>
        <div class="flex bg-primary rounded-lg p-4 mr-4 mt-8 justify-between w-7/10">
            <img src="{{asset('images/ic_marker.png')}}" class="align-middle my-auto" />
            <div class="w-3/12 inline-block relative">
                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                    <option value="" selected>地區</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
            <div class="w-5/12 inline-block relative">
                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                    <option value="" selected>分店</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
            <button class="button-primary">
                租倉
            </button>
        </div>
    </div>
    <!-- <img class="relative" style="right:-100px;" src="{{asset('images/bg_hero.jpg')}}" /> -->
</div>

<div class="bg-primary py-4">
    <p class="heading1 text-center">填妥簡單資料，立即領取5% off 獨家優惠</p>

    <div class="flex justify-between mt-6 pr-10 pb-4 mx-auto w-3/5">
        <div class="flex w-4/5">
            <div class="flex w-1/2 input-group mr-2">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                <input class="w-full form-control" type="text" placeholder="姓">
            </div>
            <div class="w-1/2 flex input-group">
                <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名">
            </div>
        </div>

        <div class="input-group mx-10">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
            <input class="form-control" type="text" placeholder="電子郵件">
        </div>

        <button class="w-1/3 button-second">
            領取優惠
        </button>
    </div>
</div>

<div class="bg-white py-16">
    <div class="mx-auto w-3/5">
        <!-- <div class="grid grid-cols-3 col-gap-6 mb-8 justify-between"> -->
        <div class="flex justify-between mb-20">
            <div class="mr-4">
                <img src="{{asset('images/img_1.jpg')}}" class="mb-4" />
                <p class="text-center text1">迷你倉廣告</p>
            </div>
            <div class="mx-4">
                <img src="{{asset('images/img_2.jpg')}}" class="mb-4" />
                <p class="text-center text1">迷你倉廣告</p>
            </div>
            <div class="ml-4">
                <img src="{{asset('images/img_3.jpg')}}" class="mb-4" />
                <p class="text-center text1">迷你倉廣告</p>
            </div>
        </div>

        <span class="heading2 ml-20 box-shadow">最新優惠</span>

        <div class="grid grid-cols-2 col-gap-8 row-gap-10 my-24 max-w-full mx-auto">
            <img src="{{asset('images/img_2_1.jpg')}}" class="yellow-shadow" />
            <img src="{{asset('images/img_2_2.jpg')}}" class="yellow-shadow" />
            <img src="{{asset('images/img_2_3.jpg')}}" class="yellow-shadow" />
            <img src="{{asset('images/img_2_4.jpg')}}" class="yellow-shadow" />
            <img src="{{asset('images/img_2_5.jpg')}}" class="yellow-shadow" />
            <img src="{{asset('images/img_2_6.jpg')}}" class="yellow-shadow" />
        </div>
    </div>
</div>

<div class="bg-grey pb-20 text-center">
    <span class="heading2 box-shadow1 relative" style="top:-26px">客戶感言</span>
    <p class="text4 my-4 ml-10">用戶好評來自 <span class="text-blue-900 font-extrabold">facebook</span></p>
    <div class="flex justify-center mb-10">
        <div class="score-lg relative" style="top: -20px">
            <p class="m-auto">5.0</p>
        </div>
        <p class="text4">（滿分為 <span class="font-bold">5</span>） 根據 <span class="font-bold">205</span> 位用戶的意見</p>
    </div>
    <div class="grid grid-cols-3 col-gap-14 text-left mx-auto w-3/5">
        <div class="bg-white border border-gray-600 p-4 relative">
            <div class="score-base mb-4">
                <p class="m-auto">5.0</p>
            </div>
            <p class="text1 mb-12">
                The storage is clean and
                tidy.
                The office girl is very
                helpful and kind
            </p>
            <div class="absolute bottom-4">
                <span class="text-name">劉美英</span>
                <img src="{{asset('images/ic_recommend.png')}}" class="inline ml-2" />
            </div>
        </div>
        <div class="bg-white border border-gray-600 p-4 relative">
            <div class="score-base mb-4">
                <p class="m-auto">5.0</p>
            </div>
            <p class="text1 mb-12">
                Excellent customer service,
                very fast response even at
                midnight on facebook
                messenger. Save me a lot
                of time.
            </p>
            <div class="absolute bottom-4">
                <span class="text-name">Doris Yu</span>
                <img src="{{asset('images/ic_recommend.png')}}" class="inline ml-2" />
            </div>
        </div>
        <div class="bg-white border border-gray-600 p-4 relative">
            <div class="score-base mb-4">
                <p class="m-auto">5.0</p>
            </div>
            <p class="text1 mb-12">
                Finally got a place to put our
                extra stuff, 24 hrs air con and
                just 5 mins distance away
                from us.
            </p>
            <div class="absolute bottom-4">
                <span class="text-name">Susanna Leung</span>
                <img src="{{asset('images/ic_recommend.png')}}" class="inline ml-2" />
            </div>
        </div>
    </div>
</div>

<div class="bg-primary py-6 text3">
    <div class="flex justify-between mx-auto pl-14 w-3/5" style="font-family: 'RobertRegular';">
        <a class="my-auto" href="Tel: 852-21112636">
            <img src="{{asset('images/ic_phone.png')}}" class="inline mr-2 contact-icon" />
            (852) 2111 2636
        </a>

        <a class="my-auto" href="mailto:cs@onestorage.com.hk">
            <img src="{{asset('images/ic_email.png')}}" class="inline mr-2 contact-icon" />
            cs@onestorage.com.hk
        </a>

        <a class="my-auto" href="https://wa.me/85251188503">
            <img src="{{asset('images/ic_wa.png')}}" class="inline mr-2 contact-icon" />
            (852) 5118 8503
        </a>
        <div>
            <a href="https://www.facebook.com/onestorage/"><img src="{{asset('images/ic_fb.png')}}" class="inline mx-2 contact-icon" /></a>
            <a href="https://www.instagram.com/onestorage_hk/"><img src="{{asset('images/ic_in.png')}}" class="inline mx-2 contact-icon" /></a>
            <a href="https://www.youtube.com/channel/UCp91DP8DqA1_4zWhzum1NDQ"><img src="{{asset('images/ic_play.png')}}" class="inline mx-2" /></a>
        </div>
    </div>
</div>

<div class="bg-white pt-10 pb-20 text-center">
    <span class="heading2 box-shadow1">至尊迷你倉</span>
    <div class="mx-auto w-3/5">
        <p class="w-full bg-yellow py-6 px-10 text4 my-10 leading-snug font-medium">
            至尊迷你倉致力為每位客戶打造最安全及最可靠的倉存空間，實力雄厚，全屬自置物業。分店網絡積極不斷擴充，新蒲崗及火炭分店將於短期內正式投入服務。 特設多種大小不同呎碼獨立迷你倉，任君選擇。2.4米闊的走廊配以完善的裝置設備，完全符合消防指引。全天候高清保安監察及警報系統，智能保安進出系統，24小時自助式儲存，支援現金、EPS、支票、信用卡、轉數快及免息分期付費，優質的儲存環境及親切專業的客戶服務，用心為每位客戶提升生活空間質素，承傳尊貴享受典範。
        </p>
        <div class="flex">
            <img src="{{asset('images/img_camera.jpg')}}" class="yellow-shadow1 w-2/5" />
            <div class="bg-yellow w-3/5 mr-12 ml-10 mt-6 mb-4 text-left px-4 pb-6">
                <p class="heading2 relative" style="top: -20px">迷你倉設施</p>
                <div class="grid grid-cols-2 col-gap-2 row-gap-4">
                    <div class="flex">
                        <img src="{{asset('images/ic_key_card.png')}}" class="mr-2 object-none" />
                        <p class="text0 my-auto"><span class="font-bold">7 x 24</span>智能保安進出系統</p>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/ic_air_con.png')}}" class="mr-2 object-none" />
                        <p class="text1 my-auto">無間斷恆溫空調</p>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/ic_fire.png')}}" class="mr-2 object-none" />
                        <p class="text0 my-auto">消防裝置設備</p>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/ic_delivery.png')}}" class="mr-2 object-none" />
                        <p class="text0 my-auto">鋁梯及手推車借用服務</p>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/ic_water.png')}}" class="mr-2 object-none" />
                        <p class="text0 my-auto">自助飲用水機</p>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/ic_sec_cam.png')}}" class="mr-2 object-none" />
                        <p class="text0 my-auto">全天候高清保安監察及警報系統</p>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/ic_24_hours.png')}}" class="mr-2 object-none" />
                        <p class="text0">24小時電話熱線服務</p>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/ic_wifi.png')}}" class="mr-2 object-none" />
                        <p class="text0 my-auto">免費Wi-Fi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-grey pb-8 text-center">
    <span class="heading2 box-shadow1 relative" style="top:-26px">常見問題</span>
    <div class="text-left mt-12 mx-auto w-3/5">
        <div class="mb-8">
            <img src="{{asset('images/ic_rarrow.png')}}" class="inline mr-4" />
            <span class="text4">常見問題1</span>
        </div>
        <div class="mb-8">
            <img src="{{asset('images/ic_rarrow.png')}}" class="inline mr-4" />
            <span class="text4">常見問題1</span>
        </div>
        <div class="mb-8">
            <img src="{{asset('images/ic_rarrow.png')}}" class="inline mr-4" />
            <span class="text4">常見問題1</span>
        </div>
        <div class="mb-8">
            <img src="{{asset('images/ic_rarrow.png')}}" class="inline mr-4" />
            <span class="text4">常見問題1</span>
        </div>
    </div>

</div>


<div class="bg-white py-14">
    <div class="mx-auto w-1/5">
        @include('partials.loginForm')
    </div>
</div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection