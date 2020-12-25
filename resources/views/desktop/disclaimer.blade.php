@extends('layouts.app')

@section('title')
<title>{{__('frontend_title.disclaimer')}}</title>
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
        <p class="heading-font">{{__('frontend_disclaimer.disclaimer')}}</p>
        <div class="horizontal-line">
        </div>

        <div class="mt-16 bg-grey p-12 mx-20 pt-10 content-font leading-relaxed">
            <p>
                {{__('frontend_disclaimer.informationContained')}}
                <br/><br/>
                {{__('frontend_disclaimer.legalPermission')}}
                <br/><br/>
                {{__('frontend_disclaimer.userPermission')}}
                <br/><br/>
                {{__('frontend_disclaimer.confirmAccept')}}
                <br/><br/>
                {{__('frontend_disclaimer.requireCompanyInfo')}}
                <br/><br/>
                <span class="font-bold">{{__('frontend_disclaimer.privacyPolicyStatement')}}</span>
                <br/><br/>
                {{__('frontend_disclaimer.specialAdminRegion')}}
                <br/><br/>
                {{__('frontend_disclaimer.recordVisit')}}
                <br/><br/>
                {{__('frontend_disclaimer.identify')}}
                <br/><br/>
                {{__('frontend_disclaimer.purposes')}}
                <br/><br/>
            </p>

            <p class="pl-8">
                {{__('frontend_disclaimer.monitor')}}<br/>
                {{__('frontend_disclaimer.compile')}}<br/>
                {{__('frontend_disclaimer.collectInfo')}}<br/>
                {{__('frontend_disclaimer.internalManagement')}}<br/>
                {{__('frontend_disclaimer.provide')}}<br/>
                {{__('frontend_disclaimer.contactUsers')}}<br/><br/>
            </p>

            <p>
                {{__('frontend_disclaimer.verificationProcedure')}}
                {{__('frontend_disclaimer.followingWays')}}<br/><br/>
            </p>

            <p class="pl-8">
                {{__('frontend_disclaimer.shareInfo')}}<br/>
                {{__('frontend_disclaimer.arrangeContent')}}<br/><br/>
            </p>

            <p>
                {{__('frontend_disclaimer.advertiser')}}<br/><br/>
                {{__('frontend_disclaimer.speaking')}}
            </p>

            <p class="pl-8">
                {{__('frontend_disclaimer.serviceProvider')}}<br/>
                {{__('frontend_disclaimer.accessAccount')}}<br/>
                {{__('frontend_disclaimer.disclose')}}<br/><br/>
            </p>

            <p>
                {{__('frontend_disclaimer.accessGroup')}}<br/><br/>
                {{__('frontend_disclaimer.personalDataOrdinance')}}<br/><br/>
            </p>

        </div>


    </div>
</div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection
