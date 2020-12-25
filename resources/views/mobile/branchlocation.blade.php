@extends('layouts.app')

@section('title')
    <title>{{__('frontend_title.branch')}}</title>
@endsection

@section('styles')
<style>
    html {
        scroll-behavior: auto;
    }

    .accordion1 {
        /* background-color: #E0CBF6; */
        color: #444;
        cursor: pointer;
        padding: 12px;
        margin-top: 10px;
        width: 100%;
        /* border: none; */
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        font-weight: 600;
    }

    .accordion1:hover {
        background-color: #9B62D7;
        color: white;
    }

    .panel-other {
        padding: 0;
        background-color: white;
        max-height: 0;
        overflow: auto;
        transition: max-height 0.2s ease-out;
    }

    li {
        color: #9A9CA2;
    }

    li.active {
        color: #4D5567
    }

    .color-primary {
        color: #4D5567;
    }

    .rentwarehouse-price-title {
        font-size: 13px;
    }

    .rentwarehouse-wrapper-title {
        font-size: 21px;
    }

    .rentwarehouse-price {
        font-weight: 800;
    }

    .branchlocation-store-select-description {
        font-size: 13px;
        color: #B881FD;
    }

    /* .branchlocation-card-wrapper {
        min-width: 100px;
        height: 280px;
    } */

    .branchlocation-card-image {

        width: 90px;
        height: 70px;
        margin-top: 30px;

    }

    .branchlocation-card-title {
        font-size: 13px;
        color: #B881FD;
    }

    .branchlocation-m-card-content {
        font-size: 11px;
        color: #4F4540;
    }

    /* .branchlocation-card-wrapper.active {
        background-color: #56628C;
    }

    .branchlocation-card-wrapper.active div .branchlocation-card-content {
        color: white;
    }

    .branchlocation-card-wrapper.active div .branchlocation-m-card-content {
        color: white;
    }

    .branchlocation-card-wrapper.active div button {
        background-color: #E0CBF6;
        color: white;
    } */

    .store-select {
        color: #4D5567;
        background: white;
    }

    .location-content-item {
        min-width: 120px;
        max-width: 312px;
        /* height: 350px; */
    }

    .location-content-title {
        font-size: 15px;
    }

    .location-content-description {
        font-size: 13px;
    }

    .location-content-item-button {
        background-color: #E0CBF6;
        color: #56628C;
    }

    .ribbon-inner {
        background-color: #B881FD;
        font-size: 9px;
        top: 20px !important;
    }

    .location-content-item-price {
        font-size: 31px;
        font-weight: 700;
    }

    .ui-slider-range {
        background-color: #B881FD;
         !important
    }

    #slider-range {
        /* width: 300px; */
    }

    .branchlocation-m-item {
        background-color: white;
    }

    .branchlocation-m-item .branchlocation-m-card-content {
        color: #4F4540;
    }

    .branchlocation-m-item .branchlocation-m-card-check {
        display: none;
    }

    .branchlocation-m-item.active {
        background-color: #56628C;
    }

    .branchlocation-m-item.active .branchlocation-m-card-content {
        color: white;
    }

    .branchlocation-m-item.active .branchlocation-m-card-check {
        display: block;
    }

    .rentwarehouse-select-store-image-m {
        height: 25px;
    }

    .rentwarehouse-select-store-item-area-m {
        /* width: 90px; */
        width: 20%;
        height: 34px;
    }

    .rentwarehouse-select-store-item-branch-m {
        /* width: 132px; */
        width: 50%;
        height: 34px;
    }

    .rentwarehouse-selects-store-item-select-m {
        font-size: 11px;
        color: #56628C;
    }

    .rentwarehouse-selects-store-item-option-m {
        font-size: 11px;
        color: #56628C;
    }

    .rentwarehouse-select-store-button-m {
        font-size: 13px;
        background-color: #E0CBF6;
        color: #56628C;
        height: 34px;
    }

    .rentwarehouse-price-check {
        font-size: 13px;
        color: #9A9CA2;
    }
</style>
<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}" />
<link rel="stylesheet" href="{{ asset('branchlocation/ribbon/site.min.css') }}" />
<link rel="stylesheet" href=" {{asset('branchlocation/slider/jquery-ui.css') }}" />
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div id="map" class="w-full same-height" >
    <p class="text-center my-10 state-text">Loading...</p>
</div>

<div class="p-5 bg-grey">
    <div class="rentwarehouse-wrapper-title color-primary text-center">{{ __('frontend_branchLocation.selectLocation') }}</div>

    <div id="branchSearchForm" class="flex justify-between items-center px-1 py-5 mx-auto">
        <img class="rentwarehouse-select-store-image-m px-0" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
        <div class="flex relative rentwarehouse-select-store-item-area-m mx-1">
            <select id="location-select" data-url="{{route('pages.branchLocation')}}" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-1 py-2 pr-8 shadow leading-tight focus:outline-none focus:shadow-outline rentwarehouse-selects-store-item-select-m">
                <option class="rentwarehouse-selects-store-item-option-m" selected disabled>{{ __('frontend_branchLocation.area') }}</option>
                @foreach($locations as $location)

                <option value="{{$location->location}}" class="rentwarehouse-selects-store-item-option-m" {{$location->location == $_GET['location'] ? 'selected' : ''}}>
                    {{$location->location}}
                </option>

                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>
        <div class="flex relative rentwarehouse-select-store-item-branch-m mx-1">
            <select id="branch-select" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-1 py-2 pr-8 shadow leading-tight focus:outline-none focus:shadow-outline rentwarehouse-selects-store-item-select-m">
                <!-- <option class="rentwarehouse-selects-store-item-option-m" selected disabled>分店</option> -->
                @foreach($stores as $store)
                <option value="{{route('pages.rentWareHouse', $store->_id)}}" class="rentwarehouse-selects-store-item-option-m">{{$store->branch}}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
            </div>
        </div>
        <button id="goToStore" class="rentwarehouse-select-store-button-m items-center ml-2 px-2">{{ __('frontend_branchLocation.search') }}</button>
    </div>

    <div class="flex relative pt-4 mb-12">
        <label class="flex items-center absolute right-0 rentwarehouse-price-check"><input type="checkbox" class="mr-3" />{{ __('frontend_branchLocation.onlyShow') }}</label>
    </div>
    <div class="block">
        <div class="accordion1 appearance-none flex relative bg-white border border-gray-300">
            <img class="align-middle w-4" src="{{ asset('branchlocation/icons8-ruler-50@2x.png') }}" />
            <span class="pl-2 align-middle">{{ __('frontend_branchLocation.size') }}</span>
            <div class="absolute right-6">
                <i class="icon wb-chevron-down"></i>
            </div>
        </div>
        <div class="panel-other">
            <div class="flex branchlocation-card-wrapper branchlocation-m-item items-center relative" value="S">
                <span class="pl-8 pr-4 branchlocation-card-title flex-shrink-0">{{ __('frontend_branchLocation.smallStore') }}</span>
                <span class="pl-0 pt-4 pb-4 pr-7 branchlocation-m-card-content leading-5">{{ __('frontend_branchLocation.smallDesc') }}</span>
                <span class="pr-0 pt-4 pb-4 absolute right-2 branchlocation-m-card-check text-white"><i class="icon wb-check"></i></span>
            </div>
            <div class="flex branchlocation-card-wrapper branchlocation-m-item items-center relative" value="M">
                <span class="pl-8 pr-4 branchlocation-card-title flex-shrink-0">{{ __('frontend_branchLocation.mediumStore') }}</span>
                <span class="pl-0 pt-4 pb-4 pr-7 branchlocation-m-card-content leading-5">{{ __('frontend_branchLocation.mediumDesc') }}</span>
                <span class="pr-0 pt-4 pb-4 absolute right-2 branchlocation-m-card-check text-white"><i class="icon wb-check"></i></span>
            </div>
            <div class="flex branchlocation-card-wrapper branchlocation-m-item items-center relative" value="L">
                <span class="pl-8 pr-4 branchlocation-card-title flex-shrink-0">{{ __('frontend_branchLocation.largeStore') }}</span>
                <span class="pl-0 pt-4 pb-4 pr-7 branchlocation-m-card-content leading-5">{{ __('frontend_branchLocation.largeDesc') }}</span>
                <span class="pr-0 pt-4 pb-4 absolute right-2 branchlocation-m-card-check text-white"><i class="icon wb-check"></i></span>
            </div>
            <div class="flex branchlocation-card-wrapper branchlocation-m-item items-center relative" value="XL">
                <span class="pl-8 pr-4 branchlocation-card-title flex-shrink-0">{{ __('frontend_branchLocation.xLargeStore') }}</span>
                <span class="pl-0 pt-4 pb-4 pr-7 branchlocation-m-card-content leading-5">{{ __('frontend_branchLocation.xLargeDesc') }}</span>
                <span class="pr-0 pt-4 pb-4 absolute right-2 branchlocation-m-card-check text-white"><i class="icon wb-check"></i></span>
            </div>
        </div>
    </div>
    <div class="px-3 py-4">
        <div class="flex py-3">
            <img class="w-5" src="{{ asset('branchlocation/icons8-pricing-50@2x.png') }}" />
            <span class="rentwarehouse-price-title color-primary pl-5">{{ __('frontend_branchLocation.priceRange') }}</span>
            <span id="amount" class="rentwarehouse-price-title color-primary rentwarehouse-price pl-10"></span>
        </div>
        <div class="relative pt-5">
            <div class="cursor-pointer mx-auto">
                <div id="slider-range" class="w-full"></div>
            </div>
        </div>
        <div class="flex pt-5 pb-3">
            <a href="{{route('pages.calculator')}}">
                <p class="branchlocation-store-select-description my-auto">{{__('frontend_branchLocation.localSpaceCalculator')}}</p>
            </a>
            <img class="object-none box-content pl-1 -mt-1" src="{{ asset('branchlocation/icons8-crown-48@2x.png') }}" />
        </div>

    </div>
    <div class="rentwarehouse-wrapper-title color-primary text-center pb-4">{{ __('frontend_branchLocation.branchLocations') }}</div>
    <div class="grid grid-cols-1 row-gap-2 pt-5 px-6" id="storesList">
        @foreach($stores as $store)
            <?php
            $store_model = App\Store::find($store->store_id);
            ?>
                @if($store_model)
                <div class="flex flex-col justify-between relative rounded overflow-hidden shadow-lg location-content-item mx-auto mb-4" data-name="{{$store->branch}}" data-price="{{$store->price}}" data-size-label="{{$store_model->getSizeLabel()}}">
                    <a href="{{route('pages.rentWareHouse', $store->_id)}}" class="relative">
                        <div class="ribbon ribbon-badge ribbon-pink">
                            <span class="ribbon-inner">{{ __('frontend_branchLocation.latestOffers') }}</span>
                        </div>
                        <?php
                        $storeImages = $store_model->storeImages()->where('is_used', true)->get();
                        ?>
                        @if(count($storeImages))
                        <img class="w-full" src="{{asset($storeImages[0]->image)}}" alt="Rentwarehouse">
                        @else
                        <img class="w-full" src="{{ asset('branchlocation/Intersection 7@2x.png') }}" alt="Rentwarehouse">
                        @endif
                        <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ {{$store->price}} 起</span>
                    </a>
                    <div class="px-1 py-2 pl-2">
                        <div class="mb-1 mt-2 color-primary location-content-title">{{$store->branch}}</div>
                        <div class="flex pt-1 pl-1 items-center">
                            <img class="w-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                            <p class="color-primary location-content-description store-address" data-lat="{{$store->lat}}" data-lng="{{$store->lng}}">{{$store->address}}</p>
                        </div>
                        <div class="flex py-1 pl-1 items-center">
                            <img class="w-3" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}" />
                            <p class="color-primary location-content-description">{{__('frontend_branchLocation.regulationFacility')}}</p>
                        </div>
                        <a href="{{route('pages.rentWareHouse', $store->_id)}}">
                            <button class="w-full text-white font-bold py-2 rounded location-content-item-button">
                                {{ __('frontend_branchLocation.select') }}
                            </button>
                        </a>
                    </div>

                </div>
                @endif
        @endforeach

    </div>

</div>
@endsection

@section('scripts')

<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/babel-external-helpers/babel-external-helpers.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/animsition/animsition.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Component.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Base.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Config.js')}}"></script>
<script src="{{asset('branchlocation/ribbon/js/Site.js')}}"></script>
<script>
    $(function() {
        const search = window.location.search;
        if (search.includes("page")) {
            window.location.href = "#storesList";
        }

    });

    function init() {
        $(function() {
            OneStorage.BranchLocation('<?= isset($_GET['size']) ? strtoupper($_GET['size']) : '' ?>', '<?= $_GET['location'] ?>');
        })
    }


    // Script For Accordion
    var acc = document.getElementsByClassName("accordion1");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            // this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                panel.style.border = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                panel.style.border = "1px solid #DCDCDC";
            }
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuF23f8P4mybfOUR2lbLynVZqSI77xn4Q&libraries=places&callback=init"></script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
