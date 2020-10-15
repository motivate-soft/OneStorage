@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 註冊會員 | 至尊迷你倉 One Storage')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">
@endsection

@section('latest_news')

@endsection

@section('header')
@include('layouts.header')
@endsection

@section('content')


<div class="w-full px-6">
    <p class="text-center font_21 regular-color mt-10 pb-12 pt-6 px-9">註冊</p>
    {{--<div class="input-group mb-4">--}}
        {{--<img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">--}}
        {{--<input class="form-control  py-10 cursor-pointer btn text-left gmail-btn-mobile hover:bg-red-500" type="button" value="以 Gmail 登入">--}}
    {{--</div>--}}

    {{--<div class="input-group mb-4">--}}
        {{--<img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">--}}
        {{--<input class="form-control cursor-pointer btn text-left facebook-btn-mobile hover:bg-blue-500" type="button" value="以 Facebook 登入">--}}
    {{--</div>--}}

    <div class=" flex py-4">
        <div class=" w-2/5 border-b my-2"></div>
        <div class=" w-1/5 text-center fontsize-14">或</div>
        <div class=" w-2/5 border-b my-2"></div>
    </div>

</div>



<form class=" w-full px-6 pb-8" id="registerForm" method="post" action="{{url('/register')}}">
    @csrf
    <div class="flex mb-4 w-full">
        <div class="flex w-1/2 input-group">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
            <input class="w-full form-control fontsize-14" type="text" placeholder="姓" name="firstName" required>
        </div>
        <div class="w-1/2 flex input-group">
            <input class="w-full form-control fontsize-14" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名" name="lastName" required>
        </div>
    </div>


    <div class="input-group mb-1">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
        <input class="form-control fontsize-14" type="text" placeholder="電話號碼" name="phone" required>
    </div>

    <div class="mt-1 mb-4 text-red-600"><span class="hidden error-msg" id="phoneDuplicateMsg">此電話號碼已被使用</span></div>

    <div class="input-group">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
        <input class="form-control fontsize-14" type="text" placeholder="電子郵件" name="email" required>
    </div>

    <div class="mt-2 mb-4 text-red-600"><span class="hidden error-msg" id="emailDuplicateMsg">该电子邮件已被使用</span></div>

    <div class="radio-group">

        <p class="radio-title w-1/4 fontsize-14">性別</p>

        <div class=" radio-custom w-1/4">
            <input type="radio" checked id="genderunchecked" class="radio-gray" value="m" name="gender">
            <label for="genderunchecked" class="radio-label fontsize-14">男</label>
        </div>
        <div class=" radio-custom w-1/4">
            <input type="radio" id="genderchecked" class="radio-gray" name="gender" value="w" name="gender">
            <label for="genderchecked" class="radio-label fontsize-14">女</label>
        </div>
    </div>

    <div class="date-group">

        <p class=" date-title fontsize-14">生日日期</p>

        <div class=" date-component">
            <div class="inline-block relative">
                <select id="daySelector" class="block appearance-none w-full bg-white border border-gray-200 px-3 py-2 pr-8 leading-tight focus:outline-none fontsize-14" aria-placeholder="日" name="day" required>
                    <option value="" selected disabled>日</option>
                    @for($i = 1; $i < 32; $i++) <option value="{{$i}}">{{$i}}</option>
                        @endfor
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
        </div>

        <div class=" date-component">
            <div class="inline-block relative">
                <select id="monthSelector" class="block appearance-none w-full bg-white border border-gray-200 px-3 py-2 pr-8 leading-tight focus:outline-none fontsize-14" name="month" required>
                    <option value="" selected disabled>月</option>
                    @for($i = 1; $i < 13; $i++) <option value="{{$i}}">{{$i}}</option>
                        @endfor
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
        </div>

        <div class=" date-component">
            <div class="inline-block relative">
                <select id="yearSelector" class="block appearance-none w-full bg-white border border-gray-200 px-3 py-2 pr-8 leading-tight focus:outline-none fontsize-14" name="year" required>
                    <option value="" selected disabled>年</option>
                    @for($i = 1920; $i < 2021; $i++) <option value="{{$i}}">{{$i}}</option>
                        @endfor
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
            <p class="register-subtilte fontsize-14" style="margin-bottom: 0px;">Optional</p>
            <i class="register-subtilte icon wb-chevron-down" style="margin-bottom: 0px;"></i>
        </div>

        <div id="optional-content" class="hidden mt-4">
            <p class=" register-subtilte fontsize-14">住址</p>

            <div class="flex mb-6">
                <div class="w-1/3 inline-block relative">
                    <select class="block appearance-none w-full bg-white fontsize-14 border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="area">
                        <option value="" selected>地域</option>
                        <option value="香港">香港</option>
                        <option value="九龍">九龍</option>
                        <option value="新界">新界</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>

                <div class="w-2/3 inline-block relative ml-4">
                    <select class="block appearance-none w-full bg-white fontsize-14 border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="place">
                        <option value="" selected>地區</option>
                        <option value="中西區">中西區</option>
                        <option value="灣仔">灣仔</option>
                        <option value="東區">東區</option>
                        <option value="南區">南區</option>
                        <option value="深水埗">深水埗</option>
                        <option value="油尖旺">油尖旺</option>
                        <option value="九龍城">九龍城</option>
                        <option value="黃大仙">黃大仙</option>
                        <option value="觀塘">觀塘</option>
                        <option value="屯門">屯門</option>
                        <option value="元朗">元朗</option>
                        <option value="荃灣">荃灣</option>
                        <option value="葵青">葵青</option>
                        <option value="離島">離島</option>
                        <option value="北區">北區</option>
                        <option value="大埔">大埔</option>
                        <option value="沙田">沙田</option>
                        <option value="西貢">西貢</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
            </div>


            <input class="w-full form-control mb-6 pl-4 fontsize-14" type="text" placeholder="地址第一行" name="addr1">

            <input class="w-full form-control mb-6 pl-4 fontsize-14" type="text" placeholder="地址第二行" name="addr2">

            <div class="w-full inline-block relative mb-6">
                <select class="block appearance-none w-full bg-white fontsize-14 border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="contactMethod">
                    <option value="" selected>最佳聯絡方式</option>
                    <option value="Whatsapp">Whatsapp</option>
                    <option value="Email">Email</option>
                    <option value="Call">Call</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>

            <div class="radio-group">

                <p class="radio-title w-4/6 fontsize-14">是否One Storage 現有客戶 ? </p>

                <div class="radio-custom w-1/6">
                    <input type="radio" id="storageyesunchecked" class="radio-gray" value="1" name="isCustomer">
                    <label for="storageyesunchecked" class="radio-label">是</label>
                </div>
                <div class="radio-custom w-1/6">
                    <input type="radio" id="storagenochecked" class="radio-gray" value="0" name="isCustomer">
                    <label for="storagenochecked" class="radio-label">否</label>
                </div>
            </div>

            <div class="flex">
                <div class="w-2/3"></div>
                <div class="w-1/3 inline-block relative mb-6">
                    <select class="block appearance-none w-full fontsize-14 bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="branch">
                        <option value="" selected disabled>分店</option>
                        <?php
                        $branches = App\Store::select('branch')->get();
                        ?>
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->branch}}</option>
                        @endforeach
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
                    <input type="radio" id="clubyesunchecked" class="radio-gray" value="1" name="isMember">
                    <label for="clubyesunchecked" class="radio-label">是</label>
                </div>
                <div class=" radio-custom w-1/6">
                    <input type="radio" id="clubnochecked" class="radio-gray" value="0" name="isMember">
                    <label for="clubnochecked" class="radio-label">否</label>
                </div>
            </div>
        </div>

    </div>

    <div class="relative">
        <img id="pwdShowToggle" class="form-control-right-icon" src="{{asset('images/contactUs/Image_39@2x.png')}}" alt="Mobile">
        <input class="show-input w-full form-control mb-6 fontsize-12 pl-4" placeholder="密碼" name="password" id="password" type="password" required>
    </div>

    <!-- <div class="relative">
        <img class="show-icon" src="{{asset('images/contactUs/Image_39@2x.png')}}" alt="Mobile">
        <input class="w-full form-control mb-6 fontsize-12 pl-4" type="text" placeholder="確認密碼">
    </div> -->

    <button class="submit-btn hover:bg-purple-400 fontsize-21">
        註冊
    </button>
</form>
@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.Register();
    })
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
