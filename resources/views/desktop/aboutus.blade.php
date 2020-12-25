@extends('layouts.app')

@section('title')
<title>{{__('frontend_title.aboutUs')}}</title>
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
                <span class="self-center">{{ __('frontend_about.on') }}</span>
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
        <p class="text-center content-title-1">{{ __('frontend_about.title1') }}</p>
        <p class="leading-relaxed content-description">{{ __('frontend_about.desc1-1') }}
            <br /><br />
            {{ __('frontend_about.desc1-2') }}
        </p>
    </div>

    <div class="grid grid-cols-3 col-gap-8 content-image-wrapper-0 my-10">
        <img src="{{asset('images/aboutus/Web_SW_Photos-01.jpg')}}" />
        <img src="{{asset('images/aboutus/Web_SW_Photos-02.jpg')}}" />
        <img src="{{asset('images/aboutus/Web_SW_Photos-03.jpg')}}" />
    </div>

    <div class="color-primary">
        <p class="text-center content-title-2"> {{ __('frontend_about.title2') }}</p>
        <p class="leading-relaxed content-description">
            {{ __('frontend_about.desc2-1') }}
            <br /><br />
            {{ __('frontend_about.desc2-2') }}<br/>
            {{ __('frontend_about.desc2-3') }}
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
