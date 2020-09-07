@extends('desktop.layouts.app')

@section('title')
<title>{{__('Contact Us')}}</title>
@endsection

@section('styles')
<style>
    .main-wrapper {
        margin-top: -80px;
    }

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
        margin-left: 27.5px;
        font-size: 50px;
    }

    .maintitle-right-aboutus-english {
        font-family: 'Roboto';
    }

    .maintitle-right-bottom {
        font-size: 19px;
        color: #B2B5BD;
        transform: translate(0, 50%);
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

    .content-image-wrapper-2 {
        padding-top: 56px;
        padding-left: 121px;
        padding-right: 121px;
        margin-bottom: 80px;

    }

    .calculator-content-title {
        font-size: 44px;
        padding-left: 56px;
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

    .calculator-items-wrapper {
        margin-left: 100px;
        margin-right: 100px;
        margin-top: 80px;
    }

    .calculator-item-element {
        padding: 10px;
        height: 80px;
        margin: 5px;
    }

    .calculator-item-element-title {
        font-size: 19px;

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

    div .room-card-wrapper {
        background: white;
        color: #B2B5BD;
    }

    div .room-card-wrapper div>button {
        background-color: white;
    }

    div .room-card-wrapper.active {
        background: #56628C;
        color: white;
    }

    div .room-card-wrapper.active div>button {
        background-color: #E0CBF6;
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


    .panel {
        /* padding: 0 18px; */
        /* background-color: white; */
        max-height: 0;
        overflow: hidden;
        outline: none;
        transition: max-height 0.2s ease-out;
    }
</style>
@endsection

@section('accessory')
    @include('desktop.partials.accessory')
@endsection

@section('content')

<img class="w-full" src="{{asset('images/contact_us/shutterstock_1224334369.png')}}" />

<div class="relative block bg-white w-3/5 mx-auto main-wrapper">
    <div class="flex maintitle-wrapper color-primary">
        <span class="uppercase maintitle-left robert-regular">one</span>
        <div class="w-px maintitle-divider"></div>
        <div class="relative maintitle-right">
            <div class="flex items-center">
                <span>聯絡我們</span>
            </div>
            <div class="capitalize absolute bottom-0 left-0 maintitle-right-bottom">我們會在24小時內回覆</div>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-4 pt-20 pb-10">
        <div class="col-span-3">
            <div class="ml-10">
                <p class="form_header font_19 mb-8">連絡我們</p>
                <div class="grid grid-cols-6 gap-4">
                    <a href="Tel: 852-21112636" class="flex col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2...">
                        <img class="fill-current mr-4" src="{{asset('images/footer/icons8-phone-50@2x.png')}}" />
                        <span class="self-center text-primary font_19">(852) 2111 2636</span>
                    </a>
                    <a href="mailto:cs@onestorage.com.hk" class="flex col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2...">
                        <img class="fill-current mr-4" src="{{asset('images/footer/icons8-email-open-50@2x.png')}}" />
                        <span class="self-center text-primary font_19">cs@onestorage.com.hk</span>
                    </a>
                    <a href="https://wa.me/85251188503" class="flex col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2...">
                        <img class="fill-current mr-4" src="{{asset('images/footer/icons8-whatsapp-50@2x.png')}}" />
                        <span class="self-center text-primary font_19">(852) 5118 8503</span>
                    </a>
                    <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" class="flex col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2...">
                        <img class="fill-current mr-4" src="{{asset('images/footer/icons8-home-50@2x.png')}}" />
                        <span class="self-center text-primary font_19">查看分店地址</span>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-8 ml-10">
                <div class="col-span-2">
                    <p class="font_56 pl-10 pb-5">新界</p>
                </div>
                <div class="col-span-1">
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">屯門</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">荃灣</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">火炭</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>


                </div>
                <div class="col-span-1">
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">葵芳</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">葵涌</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">葵興</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">青衣</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="grid grid-cols-2 mt-8  ml-10">
                <div class="col-span-1">
                    <p class="font_56 pl-10 pb-5">九龍</p>
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">新蒲崗</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">長沙灣</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <p class="font_56 pl-10 pb-5">香港島</p>
                    <div class="accordion relative appearance-none items-center">
                        <div class="flex">
                            <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                            <span class="self-center text-primary">柴灣</span>
                        </div>
                    </div>
                    <div class="panel flex">
                        <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                        <div class=" leading-5">
                            <p class="font_14">
                                電話 : <span>2374-2022</span>
                            </p>
                            <a href="mailto:cs@onestorage.com.hk" class="font_14">
                                電郵 : <span>cs@onestorage.com.hk</span>
                            </a>
                            <p class="font_14">
                                <a href="http://maps.google.com/?q=新界屯門新益里3號通明工業大廈+4/5樓" target="_blank" rel="noopener noreferrer">
                                    地址 : 新界屯門新益里3號通明工業大廈 4/5樓
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2 pr-4">
            @include('desktop.partials.loginForm')
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
@include('desktop.layouts.footer1')
@endsection