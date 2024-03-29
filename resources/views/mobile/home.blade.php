@extends('layouts.app')

@section('title')
    <title>{{__('frontend_title.homepage')}}</title>
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
        width: 215px;
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
<div class="bg-white w-full pr-px pt-10 relative mx-auto">
    <div class="pl-10">
        <p class="z-20 page-title leading-snug text-primary">
            {{ __('frontend_home.titlePart1') }}<span class="text-yellow">{{ __('frontend_home.titlePart2') }}</span>
        </p>
        <span class="z-10 page-title title-shadow" style="font-size: 30px">
            One Choice ‧ One Storage
        </span>
        <p class="page-desc pt-3">{{ __('frontend_home.subTitle') }}</p>
    </div>


    <div class="mt-4 mb-1 mx-4 robert-black text-primary text-center flex flex-col">
        <div class="mb-4">
            <span class="my-auto relative font_14 crown">{{ __('frontend_home.calcDesc1') }} {{ __('frontend_home.calcDesc2') }}&nbsp;&nbsp;&nbsp;</span>
        </div>

        <a href="{{route('pages.calculator')}}" target="_blank" class="bg-yellow px-4 py-2 font_14 mx-auto rounded-lg">{{ __('frontend_home.calculate') }}</a>
    </div>

    <?php
    $background = App\AppConfig::getBackground();
    ?>
    @if($background)
        <img src="{{$background}}" class="w-full object-fill"/>
    @endif
</div>

<div id="branchSearchForm" class="bg-primary px-4 py-5">
    <div class="flex mb-4 justify-between">
        <img src="<?php echo e(asset('images/ic_marker.png')); ?>" class="align-middle my-auto" />
        <input id="storeId" type="hidden" name="storeId" />
        <div class="w-5/12 inline-block relative">
            <?php $locations = App\Store::getLocations(); ?>
            <select id="location-select" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                <option value="" selected disabled class="text-grey">{{ __('frontend_home.area') }}</option>
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
            <select disabled="disabled" id="branch-select" data-url="{{route('pages.rentWareHouse')}}" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                <option value="" selected disabled class="text-grey">{{ __('frontend_home.branch') }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>
    </div>
    <button id="goToStore" class="button-primary w-full" type="submit">
        {{ __('frontend_home.rent') }}
    </button>
</div>

<form id="discountForm" class="bg-primary px-5 pb-4" style="" method="post" action="{{route('enquiries.store')}}"> <!--kch-display:none-->
    @csrf
    <input type="hidden" name="page" value="{{Helper::$SS_FROM_FRONT_PAGE1}}">
    <input type="hidden" name="ajax" value="1">
    <p class="heading1 text-center mb-4">{{ __('frontend_home.discountDesc') }}</p>
    <div class="flex mb-4 w-full">
        <div class="flex w-1/2 input-group mr-2">
            <img class="form-control-icon" src="<?php echo e(asset('images/contactUs/icons8-account-50@2x.png')); ?>" alt="Mobile">
            @if(Auth::check())
            <input class="w-full form-control" type="text" placeholder="{{ __('frontend_common.firstName') }}" name="firstName" value="{{Auth::user()->first_name}}" required>
            @else
            <input class="w-full form-control" type="text" placeholder="{{ __('frontend_common.firstName') }}" name="firstName" required>
            @endif
        </div>
        <div class="w-1/2 flex input-group">
            @if(Auth::check())
            <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" value="{{Auth::user()->last_name}}" type="text" placeholder="{{ __('frontend_common.lastName') }}" name="lastName" required>
            @else
            <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="{{ __('frontend_common.lastName') }}" name="lastName" required>
            @endif
        </div>
    </div>

    <div class="input-group mb-4">
        <img class="form-control-icon" src="<?php echo e(asset('images/contactUs/icons8-email-50@2x.png')); ?>" alt="Mobile">
        @if(Auth::check())
        <input class="form-control" type="email" placeholder="{{ __('frontend_common.email') }}" value="{{Auth::user()->email}}" name="email" required>
        @else
        <input class="form-control" type="email" placeholder="{{ __('frontend_common.email') }}" name="email" required>
        @endif
    </div>

    <button class="button-primary w-full" type="submit" data-text="{{ __('frontend_home.receiveDiscount') }}" data-text1="{{ __('frontend_home.checkEmail') }}">
        {{ __('frontend_home.receiveDiscount') }}
    </button>
</form>

<div class="py-4 mb-4 text-center">
    <div class="flex overflow-x-auto overflow-y-hidden pb-4 mb-8">
        <div class="flex-shrink-0 mr-2">
            <a href="https://youtu.be/GdBSugr-vY8" target="_blank"><img src="{{asset('images/video_thumb1.jpg')}}" class="mb-4" /></a>
            <p class="text-center text1">{{ __('frontend_home.videoDesc1') }}</p>
        </div>
        <div class="flex-shrink-0 mx-2">
            <a href="https://youtu.be/AG_ZbMUNok4" target="_blank"><img src="{{asset('images/video_thumb2.jpg')}}" class="mb-4" /></a>
            <p class="text-center text1">{{ __('frontend_home.videoDesc2') }}</p>
        </div>
        <div class="flex-shrink-0 ml-2">
            <a href="https://youtu.be/hxzEMSnO16g" target="_blank"><img src="{{asset('images/video_thumb3.jpg')}}" class="mb-4" /></a>
            <p class="text-center text1">{{ __('frontend_home.videoDesc3') }}</p>
        </div>
    </div>

    <span class="heading2 box-shadow">{{ __('frontend_home.latestOffers') }}</span>

    <div class="grid grid-cols-1 my-10 mx-auto">
        <?php
        $promotions = App\Blog::where('as_promotion', true)->where('state', true)->orderBy('column', 'asc')->get();
        ?>
        @foreach($promotions as $promotion)
        <a href="{{route('pages.news', $promotion->_id)}}"><img src="{{asset($promotion->promotion)}}" class="mx-auto" /></a>
        @endforeach
    </div>
</div>

<div class="home-screen-background pb-8 text-center">
    <span class="heading2 box-shadow1 relative" style="top:-26px">{{ __('frontend_home.customer') }}</span>
    <p class="text4 ml-10 mt-8 mb-1">{{ __('frontend_home.testimonials') }}
        <span class="text-blue-900 font-extrabold">
            <a href="https://www.facebook.com/onestorage/" target="_blank">facebook</a>
        </span>
    </p>
    <div class="flex justify-center mb-4">
        <div class="score-lg relative" style="top: -30px">
            <p class="m-auto">5.0</p>
        </div>
        <p class="text4">（{{ __('frontend_home.fullMarks') }} <span class="font-bold">5</span>） {{ __('frontend_home.accordingTo') }} <span class="font-bold">{{ __('frontend_home.overThan') }}</span> {{ __('frontend_home.userOpinions') }}</p>
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
                        {{__('frontend_home.convenient')}}
                    </p>
                </div>

                <div class="inline-block">
                    <span class="text-name">Wyman Dana Tsui</span>
                    <img src="<?php echo e(asset('images/ic_recommend.png')); ?>" class="inline ml-2" />
                </div>
            </div>
            <div class="internal flex flex-col justify-between bg-white border border-gray-600 p-4 mx-2">
                <div>
                    <div class="score-base mb-4">
                        <p class="m-auto">5.0</p>
                    </div>
                    <p class="text1 mb-8 whitespace-normal">
                        {{__('frontend_home.saveTime')}}
                    </p>
                </div>

                <div class="inline-block">
                    <span class="text-name">Doris Yu</span>
                    <img src="<?php echo e(asset('images/ic_recommend.png')); ?>" class="inline ml-2" />
                </div>
            </div>
            <div class="internal flex flex-col justify-between bg-white border border-gray-600 p-4 mx-2">
                <div>
                    <div class="score-base mb-4">
                        <p class="m-auto">5.0</p>
                    </div>
                    <p class="text1 mb-8 whitespace-normal">
                        {{__('frontend_home.veryGood')}}
                    </p>
                </div>

                <div class="inline-block">
                    <span class="text-name">Carrie Chiu</span>
                    <img src="<?php echo e(asset('images/ic_recommend.png')); ?>" class="inline ml-2" />
                </div>
            </div>
        </div>
    </div>


</div>



<div class="flex justify-between bg-primary py-3"></div>

<div class="bg-yellow pb-12 text-center">
    <div class="text-center py-14 leading-5">
        <p class="font_33 mb-8">{{__('frontend_home.extremeMiniStorage')}}</p>
        <p class="font_14 mx-20">
            {{__('frontend_home.businessGCG')}}<br />
            {{__('frontend_home.withBranches')}}
        </p>
    </div>

    <img src="<?php echo e(asset('images/img_camera.jpg')); ?>" class="yellow-shadow1 object-fill w-full" />
    <div class="text-left px-4 py-3">
        <p class="heading2 text-center pb-6">{{__('frontend_home.miniStorageFacilities')}}</p>
        <div class="grid grid-cols-1 row-gap-3 mb-8">
            <div class="flex">
                <img src="<?php echo e(asset('images/ic_key_card.png')); ?>" class="w-8 h-8 mr-2 object-none" />
                    <p class="text0 my-auto" style="width: calc(100% - 2rem)">{{__('frontend_home.accessSystem')}}</p>
            </div>
            <div class="flex">
                <img src="<?php echo e(asset('images/ic_fire.png')); ?>" class="w-8 h-8 mr-2 object-none" />
                <p class="text0 my-auto" style="width: calc(100% - 2rem)">{{__('frontend_home.equipment')}}</p>
            </div>
            <div class="flex">
                <img src="<?php echo e(asset('images/ic_water.png')); ?>" class="w-8 h-8 mr-2 object-none" />
                <p class="text0 my-auto" style="width: calc(100% - 2rem)">{{__('frontend_home.selfService')}}</p>
            </div>
            <div class="flex">
                <img src="<?php echo e(asset('images/ic_24_hours.png')); ?>" class="w-8 h-8 mr-2 object-none" />
                <p class="text0 my-auto" style="width: calc(100% - 2rem)">{{__('frontend_home.hotlineService')}}</p>
            </div>
        </div>
        <div class="grid grid-cols-1 row-gap-3">
            <div class="flex flex-row-reverse">
                <img src="<?php echo e(asset('images/ic_air_con.png')); ?>" class="w-8 h-8 ml-2 object-none" />
                <p class="text1 my-auto">{{__('frontend_home.constantTemperature')}}</p>
            </div>

            <div class="flex flex-row-reverse">
                <img src="<?php echo e(asset('images/ic_delivery.png')); ?>" class="w-8 h-8 ml-2 object-none" />
                <p class="text0 my-auto">{{__('frontend_home.loanService')}}</p>
            </div>

            <div class="flex flex-row-reverse">
                <img src="<?php echo e(asset('images/ic_sec_cam.png')); ?>" class="w-8 h-8 ml-2 object-none" />
                <p class="text0 my-auto">{{__('frontend_home.allWeather')}}</p>
            </div>

            <div class="flex flex-row-reverse">
                <img src="<?php echo e(asset('images/ic_wifi.png')); ?>" class="w-8 h-8 ml-2 object-none" />
                <p class="text0 my-auto">{{__('frontend_home.freeWiFi')}}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-grey py-8 text-center">
    <span class="heading2 box-shadow1">{{__('frontend_home.faq')}}</span>
    <div class="text-left mt-12 px-10">
        <div class="mb-8">
            <div class="flex cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="mr-4" />
                <span class="text4 my-auto">{{__('frontend_home.howToContact')}}</span>
            </div>
            <div class="hidden px-8 pt-4 leading-normal">{{__('frontend_home.callEmailWhatsapp')}}</div>
        </div>

        <div class="mb-8">
            <div class="flex cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="mr-4" />
                <span class="text4 my-auto">{{__('frontend_home.whereIsSupreme')}}</span>
            </div>
            <div class="hidden px-8 pt-4 leading-normal">{{__('frontend_home.branchLocation')}}</div>
        </div>

        <div class="mb-8">
            <div class="flex cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="mr-4" />
                <span class="text4 my-auto">{{__('frontend_home.appointment')}}</span>
            </div>
            <div class="hidden px-8 pt-4 leading-normal">
                <p>{{__('frontend_home.appointmentDescription')}}</p>
            </div>
        </div>
    </div>

</div>

<div class="bg-white px-6 py-10">
    @include('partials.enquiryForm', ['page' => Helper::$SS_FROM_FRONT_PAGE2])
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


    });
</script>
@endsection
