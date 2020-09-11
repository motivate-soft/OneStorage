@extends('layouts.app')

@section('title')
<title>{{__('Home')}}</title>
@endsection

@section('styles')
<style>
    div.center {
        width: 100%;
        overflow-x: hidden;
        overflow-y: hidden;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    div.internal {
        width: 211px;
        height: 250px;
        margin-top: 0px;
        font-family: "RobertRegular";
        flex-shrink: 0;
    }

    .internal.active {
        margin-top: 5px;
    }

    #comment-wrapper {
        width: 697px;

        overflow-x: hidden;
        white-space: nowrap;

        margin-bottom: 20px;
    }

    .comment-item {
        width: 211px;
        font-family: "RobertRegular";
    }


    .bg-hero {
        background-image: url(images/Image-31-m@2x.jpg);
        background-repeat: no-repeat;
        background-position: bottom left;
        min-height: 470px;
    }

    .page-title {
        font-size: 38px;
        position: relative;
    }

    .title-shadow:before {
        content: '';
        position: absolute;
        width: 98%;
        height: 110%;
        bottom: 15px;
        z-index: -1;
        left: -10px;
        background-color: #E0CBF6;
    }

    .page-desc {
        font-size: 14px;
        font-weight: bold;
        color: #B2B5BD;
    }

    .heading1 {
        font-size: 18px;
        color: white;
    }

    .heading2 {
        /* 33px */
        font-size: 33px;
        color: #4D5567;
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

    .text0 {
        font-size: 14px;
        color: #4D5567;
    }

    .text1 {
        font-size: 16px;
        color: #4D5567;
    }

    .text2 {
        /* 19px */
        font-size: 19px;
        color: #4D5567;
    }

    .text3 {
        font-size: 20px;
        color: white
    }

    .text4 {
        /* 21px */
        font-size: 15px;
        color: #4D5567;
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
        font-size: 21px;
        border-radius: 0.3rem;
        color: #56628C;
        background-color: #E0CBF6;
        padding-top: 12.5px;
        padding-bottom: 12.5px;
    }

    main {
        margin-left: auto;
        margin-right: auto;
        max-width: 375px;
        overflow-x: hidden;
        background-color: #F6F6F6;
        /* For Mobile Home Screen */
        font-family: "RobertBlack";
    }

    .yellow-shadow {
        box-shadow: 10px 15px #FABD02;
    }

    .yellow-shadow1 {
        box-shadow: 18px 18px #FABD02;
    }

    .contact-icon {
        width: 20px;
        height: 20px;
    }

    .home-image-1 {
        width: 235px;
    }

    .home-screen-background {
        background-color: #F6F6F6;
    }

    .color-gray {
        color: #9A9CA2;
    }

    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #9A9CA2;
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #9A9CA2;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: #9A9CA2;
    }
</style>
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="bg-white w-full pl-10 pr-px pt-10 relative bg-hero">
    <p class="z-20 page-title leading-snug text-primary">
        唔想屋企<span class="text-yellow">咁亂</span>?
    </p>
    <span class="z-10 page-title title-shadow">
        搵One Storage 啦
    </span>
    <p class="page-desc pt-3">至尊迷你倉 ‧ One Choice ‧ One Storage</p>
</div>

<form id="branchSearchForm" class="bg-primary px-4 py-5" method="get" action="{{url('/rentwarehouse')}}">
    <div class="flex mb-4 justify-between">
        <img src="<?php echo e(asset('images/ic_marker.png')); ?>" class="align-middle my-auto" />
        <input id="storeId" type="hidden" name="storeId" />
        <div class="w-5/12 inline-block relative">
            <?php $locations = App\Store::groupBy('location')->select('location')->get(); ?>
            <select id="location-select" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                <option value="" selected disabled class="text-grey">地區</option>
                @foreach($locations as $location)
                <option value="{{$location->location}}" class=" text-grey-2">{{$location->location}}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>
        <div class="w-5/12 inline-block relative">
            <select id="branch-select" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                <option value="" selected disabled class="text-grey">分店</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>
    </div>
    <button class="button-primary w-full" type="submit">
        租倉
    </button>
</form>

<form class="bg-primary px-5 pb-4" method="post" action="{{url('/enquiry')}}">
    @csrf
    <input type="hidden" name="page" value="Front Page">
    <p class="heading1 text-center mb-4">填妥簡單資料，立即領取5% off 獨家優惠</p>
    <div class="flex mb-4 w-full">
        <div class="flex w-1/2 input-group mr-2">
            <img class="form-control-icon" src="<?php echo e(asset('images/contactUs/icons8-account-50@2x.png')); ?>" alt="Mobile">
            <input class="w-full form-control" type="text" placeholder="姓" name="firstName" required>
        </div>
        <div class="w-1/2 flex input-group">
            <input class="w-full form-control" style="padding-left:12px" type="text" placeholder="名" name="lastName" required>
        </div>
    </div>

    <div class="input-group mb-4">
        <img class="form-control-icon" src="<?php echo e(asset('images/contactUs/icons8-email-50@2x.png')); ?>" alt="Mobile">
        <input class="form-control" type="text" placeholder="電子郵件" name="email">
    </div>

    <button class="button-primary w-full" type="submit">
        領取優惠
    </button>
</form>

<div class="py-4 mb-4 text-center">
    <div class="flex overflow-x-auto overflow-y-hidden mb-8">
        <div class="flex-shrink-0 mr-2">
            <img src="<?php echo e(asset('images/img_1.jpg')); ?>" class="home-image-1 mb-4" />
            <p class="text-center text1">迷你倉廣告</p>
        </div>
        <div class="flex-shrink-0 mx-2">
            <img src="<?php echo e(asset('images/img_2.jpg')); ?>" class="home-image-1 mb-4" />
            <p class="text-center text1">迷你倉廣告</p>
        </div>
        <div class="flex-shrink-0 ml-2">
            <img src="<?php echo e(asset('images/img_3.jpg')); ?>" class="home-image-1 mb-4" />
            <p class="text-center text1">迷你倉廣告</p>
        </div>
    </div>

    <span class="heading2 box-shadow">最新優惠</span>

    <div class="grid grid-cols-1 my-10">
        <img src="<?php echo e(asset('images/img_2_1.jpg')); ?>" />
        <img src="<?php echo e(asset('images/img_2_2.jpg')); ?>" />
        <img src="<?php echo e(asset('images/img_2_3.jpg')); ?>" />
        <img src="<?php echo e(asset('images/img_2_4.jpg')); ?>" />
        <img src="<?php echo e(asset('images/img_2_5.jpg')); ?>" />
        <img src="<?php echo e(asset('images/img_2_6.jpg')); ?>" />
    </div>
</div>

<div class="home-screen-background pb-8 text-center">
    <span class="heading2 box-shadow1 relative" style="top:-26px">客戶感言</span>
    <p class="text4 ml-10">用戶好評來自 <span class="text-blue-900 font-extrabold">facebook</span></p>
    <div class="flex justify-center mb-10">
        <div class="score-lg relative" style="top: -20px">
            <p class="m-auto">5.0</p>
        </div>
        <p class="text4">（滿分為 <span class="font-bold">5</span>） 根據 <span class="font-bold">205</span> 位用戶的意見</p>
    </div>


    <div class="relative">
        <div class="flex absolute w-full h-full">
            <div class="flex w-full justify-between my-auto px-4 align-middle">
                <div class="horizon horizon-prev">
                    <img src="<?php echo e(asset('images/Group 141@2x.png')); ?>" />
                </div>
                <div class="horizon horizon-next">
                    <img src="<?php echo e(asset('images/Group 222@2x.png')); ?>" />
                </div>
            </div>
        </div>

        <div class="flex center" id="content">
            <div class="internal active flex flex-col justify-between bg-white border border-gray-600 p-4 mr-2">
                <div>
                    <div class="score-base mb-4">
                        <p class="m-auto">5.0</p>
                    </div>
                    <p class="text1 mb-8 whitespace-normal">
                        The storage is clean and
                        tidy.
                        The office girl is very
                        helpful and kind
                    </p>
                </div>

                <div class="inline-block">
                    <span class="text-name">劉美英</span>
                    <img src="<?php echo e(asset('images/ic_recommend.png')); ?>" class="inline ml-2" />
                </div>
            </div>
            <div class="internal flex flex-col justify-between bg-white border border-gray-600 p-4 mx-2">
                <div>
                    <div class="score-base mb-4">
                        <p class="m-auto">5.0</p>
                    </div>
                    <p class="text1 mb-8 whitespace-normal">
                        The storage is clean and
                        tidy.
                        The office girl is very
                        helpful and kind
                    </p>
                </div>

                <div class="inline-block">
                    <span class="text-name">劉美英</span>
                    <img src="<?php echo e(asset('images/ic_recommend.png')); ?>" class="inline ml-2" />
                </div>
            </div>
            <div class="internal flex flex-col justify-between bg-white border border-gray-600 p-4 mx-2">
                <div>
                    <div class="score-base mb-4">
                        <p class="m-auto">5.0</p>
                    </div>
                    <p class="text1 mb-8 whitespace-normal">
                        The storage is clean and
                        tidy.
                        The office girl is very
                        helpful and kind
                    </p>
                </div>

                <div class="inline-block">
                    <span class="text-name">劉美英</span>
                    <img src="<?php echo e(asset('images/ic_recommend.png')); ?>" class="inline ml-2" />
                </div>
            </div>
            <div class="internal flex flex-col justify-between bg-white border border-gray-600 p-4 ml-2">
                <div>
                    <div class="score-base mb-4">
                        <p class="m-auto">5.0</p>
                    </div>
                    <p class="text1 mb-8 whitespace-normal">
                        The storage is clean and
                        tidy.
                        The office girl is very
                        helpful and kind
                    </p>
                </div>

                <div class="inline-block">
                    <span class="text-name">劉美英</span>
                    <img src="<?php echo e(asset('images/ic_recommend.png')); ?>" class="inline ml-2" />
                </div>
            </div>
        </div>
    </div>


</div>



<div class="flex justify-between bg-primary py-3"></div>

<div class="bg-yellow pb-12 text-center">
    <p class="w-fullpy-6 px-10 py-14 text4 leading-5">
        至尊迷你倉致力為每位客戶打造最安全及最可靠的倉存空間，實力雄厚，全屬自置物業。分店網絡積極不斷擴充，新蒲崗及火炭分店將於短期內正式投入服務。 特設多種大小不同呎碼獨立迷你倉，任君選擇。2.4米闊的走廊配以完善的裝置設備，完全符合消防指引。全天候高清保安監察及警報系統，智能保安進出系統，24小時自助式儲存，支援現金、EPS、支票、信用卡、轉數快及免息分期付費，優質的儲存環境及親切專業的客戶服務，用心為每位客戶提升生活空間質素，承傳尊貴享受典範。
    </p>
    <img src="<?php echo e(asset('images/img_camera.jpg')); ?>" class="yellow-shadow1" />
    <div class="text-left px-4 py-3">
        <p class="heading2 text-center pb-6">迷你倉設施</p>
        <div class="grid grid-cols-1 row-gap-6 mb-8">
            <div class="flex">
                <img src="<?php echo e(asset('images/ic_key_card.png')); ?>" class="mr-2 object-none" />
                <p class="text0 my-auto"><span class="font-bold">7 x 24</span>智能保安進出系統</p>
            </div>
            <div class="flex">
                <img src="<?php echo e(asset('images/ic_fire.png')); ?>" class="mr-2 object-none" />
                <p class="text0 my-auto">消防裝置設備</p>
            </div>
            <div class="flex">
                <img src="<?php echo e(asset('images/ic_water.png')); ?>" class="mr-2 object-none" />
                <p class="text0 my-auto">自助飲用水機</p>
            </div>
            <div class="flex">
                <img src="<?php echo e(asset('images/ic_24_hours.png')); ?>" class="mr-2 object-none" />
                <p class="text0">24小時電話熱線服務</p>
            </div>
        </div>
        <div class="grid grid-cols-1 row-gap-6">
            <div class="flex flex-row-reverse">
                <img src="<?php echo e(asset('images/ic_air_con.png')); ?>" class="ml-2 object-none" />
                <p class="text1 my-auto">無間斷恆溫空調</p>
            </div>

            <div class="flex flex-row-reverse">
                <img src="<?php echo e(asset('images/ic_delivery.png')); ?>" class="ml-2 object-none" />
                <p class="text0 my-auto">鋁梯及手推車借用服務</p>
            </div>

            <div class="flex flex-row-reverse">
                <img src="<?php echo e(asset('images/ic_sec_cam.png')); ?>" class="ml-2 object-none" />
                <p class="text0 my-auto">全天候高清保安監察及警報系統</p>
            </div>

            <div class="flex flex-row-reverse">
                <img src="<?php echo e(asset('images/ic_wifi.png')); ?>" class="ml-2 object-none" />
                <p class="text0 my-auto">免費Wi-Fi</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-grey py-8 text-center">
    <span class="heading2 box-shadow1">常見問題</span>
    <div class="text-left mt-12 px-15">
        <div class="mb-8">
            <div class="cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="inline mr-4" />
                <span class="text4">常見問題1</span>
            </div>
            <div class="hidden py-5">content</div>
        </div>
        <div class="mb-8">
            <div class="cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="inline mr-4" />
                <span class="text4">常見問題1</span>
            </div>
            <div class="hidden py-5">content</div>
        </div>
        <div class="mb-8">
            <div class="cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="inline mr-4" />
                <span class="text4">常見問題1</span>
            </div>
            <div class="hidden py-5">content</div>
        </div>
        <div class="mb-8">
            <div class="cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="inline mr-4" />
                <span class="text4">常見問題1</span>
            </div>
            <div class="hidden py-5">content</div>
        </div>
    </div>

</div>

<div class="bg-white px-6 py-10">

    <form class="form-enquiry" method="post" action="{{url('/enquiry')}}">
        @csrf
        <input type="hidden" name="page" value="Front Page">
        <p class="text2 mb-8">給我們留言</p>
        <div class="flex mb-4 w-full">
            <div class="flex w-1/2 input-group">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                <input class="w-full form-control" type="text" placeholder="姓" name="firstName" required>
            </div>
            <div class="w-1/2 flex input-group">
                <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名" name="lastName" required>
            </div>
        </div>

        <div class="input-group mb-4">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
            <input class="form-control" type="text" placeholder="" name="phoneNumber">
        </div>

        <div class="w-full inline-block relative mb-6">
            <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" style="color:#76838f" name="branchName">
                <option value="" selected disabled>分店</option>
                <?php
                $branches = App\Store::select('branch')->get();
                ?>
                @foreach($branches as $branch)
                <option value="{{$branch->branch}}">{{$branch->branch}}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>

        <div class="w-full inline-block relative mb-6">
            <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" style="color:#76838f" name="question">
                <option value="" selected disabled>查詢問題</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>

        <textarea class="w-full border placeholder-gray-400 px-3 py-2 border-gray-200 mb-6" style="padding-left:16px;color:#76838f" type="text" placeholder="你的信息" rows="3" name="message"></textarea>

        <button class="submit-btn hover:bg-purple-400">
            送出
        </button>
    </form>
</div>

@section('footer')
@include('layouts.footer')
@endsection



@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.Home();
        
        $('.horizon-prev').click(function(event) {
            event.preventDefault();
            const cItem = $(".internal").length;
            const wItem = $(".internal").outerWidth();
            const wScreen = $(".app-container").width();
            const index = Math.ceil($('#content').scrollLeft() / wItem);
            if (index == 0) {
                return;
            }

            $(".internal").eq(index).removeClass("active");
            $(".internal").eq(index - 1).addClass("active");

            var offset;
            if (index == cItem - 1) {
                offset = wItem - (wScreen - wItem) / 2 + 16;
            } else {
                offset = wItem + 16;
            }


            $('#content').animate({
                scrollLeft: "-=" + offset + "px"
            }, "fast");
        });

        $('.horizon-next').click(function(event) {
            event.preventDefault();
            const cItem = $(".internal").length;

            const wItem = $(".internal").outerWidth();
            const wScreen = $(".app-container").width();
            const index = Math.ceil($('#content').scrollLeft() / wItem);

            if (index == cItem - 1) {
                return;
            }

            $(".internal").eq(index).removeClass("active");
            $(".internal").eq(index + 1).addClass("active");


            var offset;
            if (index == 0) {
                offset = wItem - (wScreen - wItem) / 2 + 16;
            } else {
                offset = wItem + 16;
            }

            console.log(offset);

            $('#content').animate({
                scrollLeft: "+=" + offset + "px"
            }, "fast");
        });

        $(".home-problem-toggle-item").click(function() {
            $(this).next().toggle(500);
        })
    });
</script>
@endsection