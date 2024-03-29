@extends('layouts.app')

@section('title')
<title>{{__('frontend_title.branch')}}</title>
@endsection

@section('styles')

<style>
    .panel-other {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
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
        font-weight: 700;
        font-size: 13px;
    }

    .rentwarehouse-wrapper-title {
        font-size: 21px;
        font-weight: 700;
    }

    .branchlocation-store-select-description {
        font-size: 13px;
        font-weight: 700;
        color: #B881FD;
    }

    .branchlocation-card-wrapper {
        min-width: 100px;
        height: 320px;
        /* background-color: whi; */
    }

    .branchlocation-card-image {

        width: 180px;
        height: 140px;
        margin-top: 20px;

    }

    .branchlocation-card-title {
        font-size: 13px;
        color: #B881FD;
    }

    .branchlocation-card-content {
        font-size: 14px;
        color: #4F4540;
    }

    .branchlocation-card-wrapper.active {
        background-color: #56628C;
    }

    .branchlocation-card-wrapper.active div .branchlocation-card-content {
        color: white;
    }

    .branchlocation-card-wrapper.active div button {
        background-color: #E0CBF6;
        color: white;
    }

    .store-select {
        color: #4D5567;
        background: white;
    }

    .location-content-item {
        min-width: 120px;
        /* max-width: 220px; */
        /* height: 300px; */
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
        background-color: #E0CBF6 !important
    }

    #slider-range {
        width: 300px;
    }

    .rentwarehouse-select-store-image {
        height: 42px;
    }

    .rentwarehouse-select-store-item-area {
        /*width: 145px;*/
        width: 230px;
        height: 57px;
    }

    .rentwarehouse-select-store-item-branch {
        /*width: 248px;*/
        width: 300px;
        height: 57px;
    }

    .rentwarehouse-selects-store-item-select {
        font-size: 20px;
        color: #56628C;
    }

    .rentwarehouse-select-store-button {
        font-size: 25px;
        background-color: #E0CBF6;
        color: #56628C;
        height: 57px;
    }

    .rentwarehouse-price-check {
        font-size: 13px;
        font-weight: 700;
        color: #9A9CA2;
    }

    .rentwarehouse-price-toggle-button {
        color: #B881FD;
    }

    .rentwarehouse-image{
        width: 100%;
        height: 246px;
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
<div class="flex flex-col-reverse lg:flex-row w-full">
    <div class="w-full lg:w-3/5 px-5">
        <div class="p-5">
            <div class="rentwarehouse-wrapper-title color-primary text-left font-bold">{{ __('frontend_branchLocation.selectLocation') }}</div>
            <div id="branchSearchForm" class="flex items-center pl-6 py-5">
                <img class="rentwarehouse-select-store-image px-2" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                <div class="flex relative rentwarehouse-select-store-item-area mx-2">
                    <select id="location-select" data-url="{{route('pages.branchLocation')}}" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 leading-tight focus:outline-none focus:shadow-outline rentwarehouse-selects-store-item-select">
                        <option value="" selected disabled class="text-grey">{{ __('frontend_branchLocation.area') }}</option>
                        @foreach($locations as $location)

                        <option value="{{$location->location}}" class="text-grey-2" {{$location->location == $_GET['location'] ? 'selected' : ''}}>
                            {{$location->location}}
                        </option>

                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
                <div class="flex relative rentwarehouse-select-store-item-branch mx-2">
                    <select id="branch-select" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 leading-tight focus:outline-none focus:shadow-outline rentwarehouse-selects-store-item-select">
                        @if($_GET['location'] == '')
                        <option value="" selected disabled class="text-grey">{{ __('frontend_branchLocation.branch') }}</option>
                        @endif
                        @foreach($stores as $store)
                        <option value="{{route('pages.rentWareHouse', $store->_id)}}" class="text-grey-2">{{$store->branch}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
                <button id="goToStore" class="rentwarehouse-select-store-button items-center px-8" type="submit">{{ __('frontend_branchLocation.search') }}</button>
            </div>
            <div>
                <span class="rentwarehouse-price-toggle-button cursor-pointer py-5 select-none font-bold">
                    <span class="pr-1">
                        <i class="icon wb-triangle-up"></i>
                    </span>
                    {{ __('frontend_branchLocation.moreOption') }}
                </span>
                <div class="py-3 pl-2 pr-4">
                    <div class="flex">
                        <img class="w-5" src="{{ asset('branchlocation/icons8-pricing-50@2x.png') }}" />
                        <span class="rentwarehouse-price-title color-primary pl-5 font-bold">{{ __('frontend_branchLocation.priceRange') }}</span>
                        <span id="amount" class="rentwarehouse-price-title color-primary rentwarehouse-price pl-10"></span>
                    </div>
                    <div class="flex py-5 pl-5 border-b border-gray-200">
                        <div class="cursor-pointer">
                            <div id="slider-range"></div>
                        </div>
                        <div class="pl-40">
                            <label class="flex items-center rentwarehouse-price-check"><input type="checkbox" class="mr-3" />{{ __('frontend_branchLocation.onlyShow') }}</label>
                        </div>
                    </div>
                </div>

                <div class="px-12 pt-5">
                    <div class="flex">
                        <p class="branchlocation-store-select-description my-auto"><a target="_blank" href="{{route('pages.calculator')}}">{{__('frontend_branchLocation.localSpaceCalculator')}}</a></p>
                        <img class="object-none box-content pl-1 -mt-1" src="{{ asset('branchlocation/icons8-crown-48@2x.png') }}" />
                    </div>
                    <div class="grid grid-cols-4 col-gap-3 pt-1 branchlocation-room-select">
                        <div class="relative max-w-sm rounded overflow-hidden shadow-lg branchlocation-card-wrapper" value="S">
                            <img class="branchlocation-card-image mx-auto" src="{{ asset('images/calculator/rooms-s.jpg') }}" alt="BranchLocation">
                            <div class="px-6 py-4">
                                <div class="branchlocation-card-title text-center mb-2">{{ __('frontend_branchLocation.smallStore') }}</div>
                            </div>
                            <div class="px-6 pt-0 pb-4">
                                <div class="branchlocation-card-content text-center mb-2 leading-normal">
                                    {{ __('frontend_branchLocation.smallDesc') }}
                                </div>
                            </div>
                            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                                <button value="S" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow color-primary store-select text-2xl"><i class="icon wb-check"></i></button>
                            </div>
                        </div>
                        <div class="relative max-w-sm rounded overflow-hidden shadow-lg branchlocation-card-wrapper" value="M">
                            <img class="branchlocation-card-image mx-auto" src="{{ asset('images/calculator/rooms-m.jpg') }}" alt="BranchLocation">
                            <div class="px-6 py-4">
                                <div class="branchlocation-card-title text-center mb-2">{{ __('frontend_branchLocation.mediumStore') }}</div>
                            </div>
                            <div class="px-6 pt-0 pb-4">
                                <div class="branchlocation-card-content text-center mb-2 leading-normal">
                                    {{ __('frontend_branchLocation.mediumDesc') }}
                                </div>
                            </div>
                            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                                <button value="M" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow color-primary store-select text-2xl"><i class="icon wb-check"></i></button>
                            </div>
                        </div>
                        <div class="relative max-w-sm rounded overflow-hidden shadow-lg branchlocation-card-wrapper" value="L">
                            <img class="branchlocation-card-image mx-auto" src="{{ asset('images/calculator/rooms-l.jpg') }}" alt="BranchLocation">
                            <div class="px-6 py-4">
                                <div class="branchlocation-card-title text-center mb-2">{{ __('frontend_branchLocation.largeStore') }}</div>
                            </div>
                            <div class="px-6 pt-0 pb-4">
                                <div class="branchlocation-card-content text-center mb-2 leading-normal">
                                    {{ __('frontend_branchLocation.largeDesc') }}
                                </div>
                            </div>
                            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                                <button value="L" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow color-primary store-select text-2xl"><i class="icon wb-check"></i></button>
                            </div>
                        </div>
                        <div class="relative max-w-sm rounded overflow-hidden shadow-lg branchlocation-card-wrapper" value="XL">
                            <img class="branchlocation-card-image mx-auto" src="{{ asset('images/calculator/rooms-xl.jpg') }}" alt="BranchLocation">
                            <div class="px-6 py-4">
                                <div class="branchlocation-card-title text-center mb-2">{{ __('frontend_branchLocation.xLargeStore') }}</div>
                            </div>
                            <div class="px-6 pt-0 pb-4">
                                <div class="branchlocation-card-content text-center mb-2 leading-normal">
                                    {{ __('frontend_branchLocation.xLargeDesc') }}
                                </div>
                            </div>
                            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                                <button value="XL" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow color-primary store-select text-2xl"><i class="icon wb-check"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rentwarehouse-wrapper-title color-primary text-left pt-4">{{ __('frontend_branchLocation.branchLocations') }}</div>
            <div id="stores-wrapper" class="grid grid-cols-3 col-gap-4 row-gap-6 pt-5 pl-8 pr-0 md:w-4/5 lg:w-full">
                @foreach($stores as $store)
                    <?php
                        $store_model = App\Store::find($store->store_id);
                    ?>
                    @if($store_model)
                    <div class="flex flex-col relative rounded overflow-hidden shadow-lg location-content-item" data-name="{{$store->branch}}" data-price="{{$store->price}}" data-size-label="{{$store_model->getSizeLabel()}}">
                        <a href="{{route('pages.rentWareHouse', $store->_id)}}" class="relative">
                            <div class="ribbon ribbon-badge ribbon-pink">
                                <span class="ribbon-inner"> {{ __('frontend_branchLocation.latestOffers') }}</span>
                            </div>
                            <?php
                            $storeImages = $store_model->storeImages()->where('is_used', true)->get();
                            ?>
                            <img class="rentwarehouse-image" style="height: 246px;" src="{{count($storeImages) ? asset($storeImages[0]->image) : asset('branchlocation/Intersection 7@2x.png')}}" alt="Rentwarehouse">
                            <span class="absolute bottom-2 left-2 text-white font-weight-bolder location-content-item-price">$ {{$store->price}} <span class="text-sm">{{__('frontend_branchLocation.from')}}</span></span>
                        </a>
                        <div class="flex flex-col justify-between p-2 flex-auto">
                            <div class="mb-2 color-primary location-content-title">{{$store->branch}}</div>
                            <div class="flex py-1 mb-2">
                                <img class="w-4 h-4" src="{{ asset('branchlocation/icons8-marker-50@2x.png') }}" />
                                <p class="ml-1 color-primary my-auto location-content-description store-address" data-lat="{{$store->lat}}" data-lng="{{$store->lng}}">{{$store->address}}</p>
                            </div>
                            <div class="flex py-1 mb-1">
                                <img class="w-4 h-4 object-none" src="{{ asset('branchlocation/007-fire-extinguisher@2x.png') }}" />
                                <p class="ml-1 color-primary my-auto location-content-description">{{__('frontend_branchLocation.regulationFacility')}} </p>
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
    </div>
    <div class="w-full lg:w-2/5 lg:ml-5">
        <div class="sticky" style="top: 10.3rem">
            <div id="map" class="w-full h-screen">
                <p class="text-center my-10 state-text">Loading...</p>
            </div>
        </div>
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
    function init() {
        $(function() {
            OneStorage.BranchLocation('<?= isset($_GET['size']) ? strtoupper($_GET['size']) : '' ?>', '<?= $_GET['location'] ?>');
        })
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuF23f8P4mybfOUR2lbLynVZqSI77xn4Q&libraries=places&callback=init"></script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
