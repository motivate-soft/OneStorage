@extends('layouts.app')

@section('title')
    <title>{{__('frontend_title.jobVacancy')}}</title>
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
<p class=" text-center fontsize-21 py-6 regular-color px-5">{{__('frontend_joinus.vacancies')}}</p>

<div class="pt-8 bg-grey pb-4 px-5">
    <div class="flex">
        <img class="w-24 h-24 mr-2" src="{{asset('images/contactUs/contactUs.png')}}" alt="Avatar of Jonathan Reinink">
        <div>
            <div class="mb-8">
                <div class="jointitle-color fontsize-25 mb-4">{{__('frontend_joinus.customerServiceOfficer')}}</div>
                <p class=" fontsize-13 regular-color">{{__('frontend_joinus.handleSales')}}</p>
            </div>

            <div class="mb-4">
                <div class="jointitle-color fontsize-25 mb-4">{{__('frontend_joinus.entryRequirements')}}</div>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.workExperience')}}</p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.prefered')}}</p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.needTo')}}</p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.computerOperation')}}</p>
            </div>

            <div class="mb-4">
                <div class="jointitle-color fontsize-25 mb-4">{{__('frontend_joinus.employeeBenefits')}} </div>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.bankHoliday')}} </p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.paidAnnualLeave')}} </p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.medicalBenefits')}} </p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.yearEndBonus')}} </p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.businessBonus')}} </p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.staffDiscount')}} </p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.training')}} </p>
                <p class="after-list regular-color pl-2 py-1">{{__('frontend_joinus.promotionOpportunities')}} </p>
            </div>
        </div>
    </div>

    <p class=" fontsize-13 regular-color px-5 mb-2">{{__('frontend_joinus.emailResume')}} swhr@soundwill.com.hk </p>
    <p class=" fontsize-13 regular-color px-5">{{__('frontend_joinus.allInformation')}} </p>
</div>


<form class="w-full mt-12" id="enquiryForm" method="post" action="{{route('enquiries.store')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="page" value="{{Helper::$SS_FROM_JOINUS_PAGE}}">

    <p class=" font-bold mb-10 fontsize-19 regular-color">{{__('frontend_joinus.applyImmediately')}}</p>
    <div class="flex mb-4 w-full">
        <div class="flex w-1/2 input-group">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
            <input class="w-full form-control placeholder-color" type="text" placeholder="{{__('frontend_common.firstName')}}" name="firstName" required>
        </div>
        <div class="w-1/2 flex input-group">
            <input class="w-full form-control ml-1 pl-3 placeholder-color" type="text" placeholder="{{__('frontend_common.lastName')}}" name="lastName" required>
        </div>
    </div>


    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
        <input class="form-control placeholder-color" type="text" placeholder="{{__('frontend_common.mobileNumber')}}" name="phoneNumber" required>
    </div>

    <div class="input-group mb-8">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
        <input class="form-control placeholder-color" type="text" placeholder="{{__('frontend_common.email')}}" name="email">
    </div>

    <div class=" mx-3 px-3 mb-8">
        <div class="flex py-1">
            <p class="w-2/5 fontsize-14 placeholder-color">{{__('frontend_common.upload')}} CV</p>
            <div class="flex w-1/3">
                <button class="fileupload-btn fontsize-11 regular-color rounded">{{__('frontend_joinus.selectFile')}}</button>
                <input type="file" class="hidden file-input" name="fileCV" />
            </div>
            <span class="file-name ml-2"></span>
        </div>
        <div class="flex py-1">
            <p class="w-2/5 fontsize-14 placeholder-color">{{__('frontend_common.upload')}} Cover letter</p>
            <div class="flex w-1/3">
                <button class="fileupload-btn fontsize-11 regular-color rounded">{{__('frontend_joinus.selectFile')}}</button>
                <input type="file" class="hidden file-input" name="fileCL" />
            </div>
            <span class="file-name ml-2"></span>
        </div>
    </div>

    <button class="submit-btn hover:bg-purple-400 fontsize-21 regular-color" data-text="{{__('frontend_common.send')}}">
        {{__('frontend_common.send')}}
    </button>
</form>

    <div class="mt-14 mb-8">
        <p class=" text-left fontsize-21 regular-color font-bold">{{__('frontend_joinus.otherInformation')}}</p>
    </div>
    <div class="mb-8">
        <?php
        $latest_news = App\Blog::getNewses(4);
        $count = count($latest_news);
        ?>
        @foreach($latest_news as $index => $news)
            <a href="{{route('pages.news', $news->id)}}" class="flex  rounded-lg mt-2 lg:py-3  px-2">
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
