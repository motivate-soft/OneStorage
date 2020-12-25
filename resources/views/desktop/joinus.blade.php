@extends('layouts.app')

@section('title')
<title>{{__('frontend_title.jobVacancy')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="bg-white">
    <div class="px-4 mx-auto py-13 section">
        <p class="heading-font">{{__('frontend_joinus.vacancies')}}</p>
        <div class="horizontal-line">
        </div>

        <div class="flex mt-16 bg-grey p-3 mx-20 pt-10">
            <div class="mr-10 mt-3">
                <img style="width: 200px;" src="{{asset('images/contactUs/contactUs@2x.png')}}" alt="Avatar of Jonathan Reinink">
            </div>

            <div class="body-content lg:rounded-b-none lg:rounded-r">
                <div class="mb-8">
                    <div class="subtitle-font">{{__('frontend_joinus.customerServiceOfficer')}}</div>
                    <p class="content-font">{{__('frontend_joinus.handleSales')}}</p>
                </div>

                <div class="mb-4">
                    <div class=" subtitle-font">{{__('frontend_joinus.entryRequirements')}}</div>
                    <p class="after-list content-font">{{__('frontend_joinus.workExperience')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.preferred')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.needTo')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.computerOperation')}}</p>
                </div>

                <div class="mb-4">
                    <div class=" subtitle-font">{{__('frontend_joinus.employeeBenefits')}}</div>
                    <p class="after-list content-font">{{__('frontend_joinus.bankHoliday')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.paidAnnualLeave')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.medicalBenefits')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.yearEndBonus')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.businessBonus')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.staffDiscount')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.training')}}</p>
                    <p class="after-list content-font">{{__('frontend_joinus.promotionOpportunities')}}</p>
                </div>
                <p class="content-font contentfont-color">{{__('frontend_joinus.emailResume')}} <b>swhr@soundwill.com.hk</b> </p>
                <p class="content-font contentfont-color">{{__('frontend_joinus.allInformation')}} </p>
            </div>
        </div>

        <form class="w-1/2 mx-auto px-14 mt-24 mb-10" id="enquiryForm" method="post" action="{{route('enquiries.store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="page" value="{{Helper::$SS_FROM_JOINUS_PAGE}}">
            <p class="content-font mb-10">{{__('frontend_joinus.applyImmediately')}}</p>

            <div class="flex mb-4 w-full">
                <div class="flex w-1/2 input-group">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                    <input class="w-full form-control input-form" type="text" placeholder="{{__('frontend_common.firstName')}}" name="firstName" required>
                </div>
                <div class="w-1/2 flex input-group">
                    <input class="w-full form-control input-form" style="margin-left: 4px;padding-left:12px" type="text" placeholder="{{__('frontend_common.lastName')}}" name="lastName" required>
                </div>
            </div>


            <div class="input-group mb-4">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                <input class="form-control input-form" type="text" placeholder="{{__('frontend_common.mobileNumber')}}" name="phoneNumber" required>
            </div>

            <div class="input-group mb-8">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                <input class="form-control input-form" type="email" placeholder="{{__('frontend_common.email')}}" name="email">
            </div>

            <div class="flex flex-wrap -mx-3 px-3 mb-8 justify-between">
                <div>
                    <span class="file-name mb-1"></span>
                    <div class="flex">
                        <span class="my-auto upload-label">{{__('frontend_common.upload')}} <b>CV</b></span>
                        <button type="button" class="fileupload-btn ml-2">{{__('frontend_joinus.selectFile')}}</button>
                        <input type="file" class="hidden file-input " name="fileCV" />
                    </div>
                </div>
                <div>
                    <span class="file-name mb-1"></span>
                    <div class="flex">
                        <span class="my-auto upload-label">{{__('frontend_common.upload')}} <b>Cover letter</b></span>
                        <button type="button" class="fileupload-btn ml-2">{{__('frontend_joinus.selectFile')}}</button>
                        <input type="file" class="hidden file-input" name="fileCL" />
                    </div>
                </div>
            </div>

            <button class="submit-btn hover:bg-purple-400" type="submit" data-text="{{__('frontend_common.send')}}">
                {{__('frontend_common.send')}}
            </button>
        </form>

    </div>
</div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.JoinUs();
    })
</script>
@endsection
