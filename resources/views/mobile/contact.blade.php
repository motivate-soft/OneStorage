@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 聯絡我們 | 至尊迷你倉 One Storage')}}</title>
@endsection

@section('styles')
<style>
    .main-wrapper {
        /* margin-top:-80px;
        margin-right:200px;
        margin-left:200px; */
    }

    .color-primary {
        color: #4D5567;
    }

    .content-title {
        font-size: 25px;
        font-weight: 800;
        padding-top: 66px;
        padding-bottom: 22px;
    }

    .content-description {
        margin-left: 173px;
        margin-right: 173px;
        font-size: 16px;
    }

    .content-image-wrapper-1 {
        padding: 56px;
    }

    /* .content-image-wrapper-2 {
        padding-top:56px;
        padding-left:121px;
        padding-right:121px;
        margin-bottom:80px;

    } */

    .calculator-content-title-m {
        font-size: 21px;
        padding-left: 36px;
        padding-top: 30px;
        padding-bottom: 20px;
    }

    .calculator-item-title {
        font-size: 17px;
        padding: 15px;
        text-align: center;
        background-color: #E5E5E5;
    }

    div .calculator-item-title.active {
        background-color: #E0CBF6;
    }

    /* .calculator-items-wrapper {
        margin-left:100px;
        margin-right:100px;
        margin-top:80px;
    } */
    .calculator-item-element {
        padding: 10px;
        height: 80px;
        margin: 5px;
    }

    .calculator-item-element-m {
        padding: 10px;
        height: 30px;
        margin: 5px;
    }

    .calculator-item-element-title {
        font-size: 19px;

    }

    .calculator-item-element-title-m {
        font-size: 15px;

    }

    .calculator-elements-wrapper {
        background-color: #E0CBF6;
        padding: 5px;
    }

    .calculator-item-element-input {
        background-color: #E0CBF6;
        border-bottom: 1px solid #4D5567;
        font-size: 65px;
        width: 40px;
    }

    .calculator-item-element-input-m {
        background-color: #E0CBF6;
        border-bottom: 1px solid #4D5567;
        font-size: 21px;
        width: 31px;
    }

    /* Remove Spinners in input type number */

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .room-card-wrapper {
        min-width: 120px;
        height: 280px;
        padding-top: 40px;
    }

    .room-card-wrapper-m {
        min-width: 160px;
        height: 245px;
        padding-top: 40px;
    }

    .room-card-image {

        width: 100px;
        height: 80px;

    }

    .room-card-title {
        font-size: 22px;
        /* color:#B2B5BD; */
    }

    .room-footer {
        font-size: 29px;
    }

    .room-footer-image {
        width: 30px;
        height: 30px;
    }

    div .room-card-wrapper-m {
        background: white;
        color: #B2B5BD;
    }

    div .room-card-wrapper-m div>button {
        background-color: white;
    }

    div .room-card-wrapper-m.active {
        background: #56628C;
        color: white;
    }

    div .room-card-wrapper-m.active div>button {
        background-color: #E0CBF6;
    }

    .main-screen {
        max-width: 375px;
    }

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
        font-size: 30px;
    }

    .maintitle-right-aboutus-english-m {
        font-family: 'Roboto';
    }

    .maintitle-right-bottom-m {
        font-size: 10px;
        color: #B2B5BD;
        transform: translate(0, 50%);
    }

    .calculator-others-title-m {
        font-size: 21px;
        padding-left: 26px;
        padding-top: 20px;
        padding-bottom: 20px;
        font-weight: 600;
    }

    .calculator-others-item-image {
        width: 124px;
    }

    .calculator-others-item-divider {
        margin-left: 25px;
        margin-right: 25px;
        height: 1px;
        background-color: #707070;
    }

    .accordion {
        /* background-color: #E0CBF6; */
        color: #444;
        cursor: pointer;
        padding: 8px;
        margin-top: 2px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        font-weight: 600;
    }
</style>
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')


<div class="relative block bg-white main-wrapper">

    <div class="flex maintitle-wrapper-m color-primary">
        <div class="relative maintitle-right-m">
            <div class="flex items-center">
                <span>{{__('frontend_contact_us.pageSubTitle')}}</span>
            </div>
            <div class="capitalize mt-2 maintitle-right-bottom-m">{{__('frontend_contact_us.replyHours')}}</div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 pb-10">
        <div class="col-span-2">
            <div class="mt-2 ml-10">
                <p class=" form_header my-8">{{__('frontend_contact_us.supremeStorage')}}</p>
                <div class="grid grid-cols-6 gap-4">
                    <a href="Tel: 852-21112636" class="flex col-span-6">
                        <img class="fill-current mr-4" src="{{asset('images/footer/icons8-phone-50@2x.png')}}" />
                        <span class="self-center text-primary font_19">(852) 2111 2636</span>
                    </a>
                    <a href="mailto:cs@onestorage.com.hk" class="flex col-span-6 mailto">
                        <img class="fill-current mr-4" src="{{asset('images/footer/icons8-email-open-50@2x.png')}}" />
                        <span class="self-center text-primary font_19">cs@onestorage.com.hk</span>
                    </a>
                    <a href="https://wa.me/85251188503" class="flex col-span-6 ">
                        <img class="fill-current mr-4" src="{{asset('images/footer/icons8-whatsapp-50@2x.png')}}" />
                        <span class="self-center text-primary font_19">(852) 5118 8503</span>
                    </a>
                    <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" class="flex col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2...">
                        <img class="fill-current mr-4" src="{{asset('images/footer/icons8-home-50@2x.png')}}" />
                        <span class="self-center text-primary font_19">{{__('frontend_contact_us.viewBranchAddress')}}</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1  mt-8 z-10 mx-10">
                <p class="font_21 pl-10 pb-3">{{__('frontend_contact_us.hkMiniStorage')}}</p>
                <?php
                use Illuminate\Support\Facades\Session;
                $locations = null;
                if(Session::has('locale') && Session::get('locale') == "en") {
                    $locations = App\LocationInfo::getHongKongEN();
                }
                else {
                    $locations = App\LocationInfo::getHongKongCH();
                }
                ?>
                @each('partials.location_info', $locations, 'location')

                <p class="font_21 pl-10 pb-3 pt-5">{{__('frontend_contact_us.kowloonMiniStorage')}}</p>
                <?php
                $locations = null;
                if(Session::has('locale') && Session::get('locale') == "en") {
                    $locations = App\LocationInfo::getKowloonEN();
                }
                else {
                    $locations = App\LocationInfo::getKowloonCH();
                }
                ?>
                @each('partials.location_info', $locations, 'location')

                <p class="font_21 pl-10 pb-3 pt-5">{{__('frontend_contact_us.newTerritoriesMiniStorage')}}</p>
                <?php
                $locations = null;

                if(Session::has('locale') && Session::get('locale') == "en") {
                    $locations = App\LocationInfo::getNewEN();
                }
                else {
                    $locations = App\LocationInfo::getNewCH();
                }
                ?>
                @each('partials.location_info', $locations, 'location')
            </div>

        </div>
        <div class="col-span-2 px-2 mt-6 mx-10">
            @include('partials.enquiryForm',[
                'page' => Helper::$SS_FROM_CONTACTUS_PAGE,
                'questions' => [__('frontend_contact_us.appointmentVisit'), __('frontend_contact_us.renew'), __('frontend_contact_us.sizePrice'), __('frontend_contact_us.other')]
            ])
        </div>
    </div>

</div>
@endsection


@section('scripts')
<script>
    var acc = document.getElementsByClassName("accordion");
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
                // panel.style.border = "1px solid #DCDCDC";
            }
        });
    }
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
