@extends('mobile.layouts.app')

@section('title')
<title>{{__('Register')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">
@endsection

@section('latest_news')

@endsection

@section('header')
@include('mobile.layouts.header')
@endsection

@section('content')
<p class=" text-center fontsize-21 regular-color mt-10 pb-12 px-9">註冊</p>

<div class=" w-full px-9">

    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
        <input class="form-control  py-10 cursor-pointer btn text-left gmail-btn-mobile hover:bg-red-500" type="button" value="以 Gmail 登入">
    </div>

    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
        <input class="form-control cursor-pointer btn text-left facebook-btn-mobile hover:bg-blue-500" type="button" value="以 Facebook 登入">
    </div>

    <div class=" flex py-4">
        <div class=" w-2/5 border-b my-2"></div>
        <div class=" w-1/5 text-center fontsize-14">或</div>
        <div class=" w-2/5 border-b my-2"></div>
    </div>

</div>

<form class=" w-full px-9 pb-4">

    <div class="flex mb-4 w-full">
        <div class="flex w-1/2 input-group">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
            <input class="w-full form-control fontsize-14" type="text" placeholder="姓">
        </div>
        <div class="w-1/2 flex input-group">
            <input class="w-full form-control fontsize-14" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名">
        </div>
    </div>


    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
        <input class="form-control fontsize-14" type="text" placeholder="電話號碼">
    </div>

    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
        <input class="form-control fontsize-14" type="text" placeholder="電子郵件">
    </div>

    <div class="radio-group">

        <p class="radio-title w-1/4 fontsize-14">姓別</p>

        <div class=" radio-custom w-1/4">
            <input type="radio" checked id="genderunchecked" class="radio-gray" name="gender">
            <label for="genderunchecked" class="radio-label fontsize-14">男</label>
        </div>
        <div class=" radio-custom w-1/4">
            <input type="radio" id="genderchecked" class="radio-gray" name="gender">
            <label for="genderchecked" class="radio-label fontsize-14">女</label>
        </div>
    </div>

    <div class="date-group">

        <p class=" date-title fontsize-14">生日日期</p>

        <div class=" date-component">
            <div class="inline-block relative">
                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none fontsize-14" aria-placeholder="日">
                    <option value="" selected>日</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
        </div>

        <div class=" date-component">
            <div class="inline-block relative">
                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none fontsize-14">
                    <option value="" selected>月</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
        </div>

        <div class=" date-component">
            <div class="inline-block relative">
                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none fontsize-14">
                    <option value="" selected>年</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 mb-4" style="background-color: #F9F9F9">
        <div class="flex justify-between cursor-pointer" id="btn-option-toggler">
            <p class="register-subtilte fontsize-14">Optional</p>
            <i class="register-subtilte icon wb-chevron-down"></i>
        </div>

        <div id="optional-content" class="hidden">
            <p class=" register-subtilte fontsize-14">住址</p>

            <div class="flex mb-6">
                <div class="w-1/3 inline-block relative">
                    <select class="block appearance-none w-full bg-white fontsize-14 border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                        <option value="" selected>地域</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>

                <div class="w-2/3 inline-block relative ml-4">
                    <select class="block appearance-none w-full bg-white fontsize-14 border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                        <option value="" selected>地區</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
            </div>


            <input class="w-full form-control mb-6 pl-4 fontsize-14" type="text" placeholder="地址第一行">

            <input class="w-full form-control mb-6 pl-4 fontsize-14" type="text" placeholder="地址第二行">

            <div class="w-full inline-block relative mb-6">
                <select class="block appearance-none w-full bg-white fontsize-14 border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                    <option value="" selected>最佳聯絡方式</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>

            <div class="radio-group">

                <p class="radio-title w-4/6 fontsize-14">是否One Storage 現有客戶 ? </p>

                <div class=" radio-custom w-1/6">
                    <input type="radio" id="storageyesunchecked" checked class="radio-gray" name="storage">
                    <label for="storageyesunchecked" class="radio-label fontsize-14">是</label>
                </div>
                <div class=" radio-custom w-1/6">
                    <input type="radio" id="storagenochecked" class="radio-gray" name="storage">
                    <label for="storagenochecked" class="radio-label fontsize-14">否</label>
                </div>
            </div>

            <div class="flex">
                <div class="w-2/3"></div>
                <div class="w-1/3 inline-block relative mb-6">
                    <select class="block appearance-none w-full fontsize-14 bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
                        <option value="" selected>分店</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
            </div>

            <div class="radio-group">

                <p class="radio-title w-4/6 fontsize-14">是否SoundWill Club 會員 ? </p>

                <div class=" radio-custom w-1/6">
                    <input type="radio" id="clubyesunchecked" checked class="radio-gray" name="club">
                    <label for="clubyesunchecked" class="radio-label fontsize-14">是</label>
                </div>
                <div class=" radio-custom w-1/6">
                    <input type="radio" id="clubnochecked" class="radio-gray" name="club">
                    <label for="clubnochecked" class="radio-label fontsize-14">否</label>
                </div>
            </div>
        </div>

    </div>

    <div class="relative">
        <img class="show-icon" src="{{asset('images/contactUs/Image_39@2x.png')}}" alt="Mobile">
        <input class="show-input w-full form-control mb-6 fontsize-12 pl-4" type="text" placeholder="密碼">
    </div>

    <div class="relative">
        <img class="show-icon" src="{{asset('images/contactUs/Image_39@2x.png')}}" alt="Mobile">
        <input class="w-full form-control mb-6 fontsize-12 pl-4" type="text" placeholder="確認密碼">
    </div>

    <button class="submit-btn hover:bg-purple-400 fontsize-21">
        註冊
    </button>
</form>
@endsection

@section('scripts')
<script>
    $("#btn-option-toggler").click(function() {
        $(this).next().toggle();

        if ($(this).next().css("display") != "none") {
            $(this).find("i").removeClass("wb-chevron-down");
            $(this).find("i").addClass("wb-chevron-up");
        } else {
            $(this).find("i").removeClass("wb-chevron-up");
            $(this).find("i").addClass("wb-chevron-down");
        }
    });
</script>
@endsection

@section('footer')

@endsection