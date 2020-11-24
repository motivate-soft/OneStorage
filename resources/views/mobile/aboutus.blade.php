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
                <span class="">{{ __('frontend_about.on') }}</span>
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
        <p class="pl-5 content-title mt-1 mb-4">{{ __('frontend_about.title1') }}</p>
        <p class="leading-relaxed content-description-m px-6">{{ __('frontend_about.desc1-1') }}
            <br /><br />
            {{ __('frontend_about.desc1-2') }}
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
        <p class="pl-5 content-title">{{ __('frontend_about.title2') }}</p>
        <p class="leading-relaxed content-description-m px-6 pt-10">
            {{ __('frontend_about.desc2-1') }}
            <br /><br />
            {{ __('frontend_about.desc2-2') }}<br/>
            {{ __('frontend_about.desc2-3') }}
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
