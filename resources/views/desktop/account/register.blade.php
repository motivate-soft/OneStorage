@extends('layouts.app')

@section('title')
<title>{{__('Register')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
<style>
    #main-content {
        font-family: "RobertBlack";
    }

    body {
        background-color: white !important;
    }
</style>
@endsection


@section('content')
<div class="w-7/10 px-14 mx-auto" style="padding-top: 81px; padding-bottom: 20px;">
    <p class="subheader-title">註冊</p>

    <div class="flex flex-col lg:flex-row pt-10">

        <div class="w-full lg:w-2/3 border-r-none lg:border-r">
            <form class="flex register-form1 mr-8" method="post" action="{{url('/register')}}">
                @csrf
                <div class="w-1/2 mr-4">
                    <p style="color: red;" class="mb-4">*</p>
                    <div class="flex mb-4 w-full">
                        <div class="flex w-1/2 input-group">
                            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                            <input class="w-full form-control appearance-none" type="text" placeholder="姓" name="firstName" required>
                        </div>
                        <div class="w-1/2 flex input-group">
                            <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名" name="lastName" required>
                        </div>
                    </div>


                    <div class="input-group mb-4">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                        <input class="form-control" type="text" placeholder="電話號碼" name="phone" required>
                    </div>

                    <div class="input-group mb-4">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                        <input class="form-control" type="email" placeholder="電子郵件" name="email" required>
                    </div>

                    <div class="radio-group">

                        <p class="radio-title w-1/4">性別</p>

                        <div class=" radio-custom w-1/4">
                            <input type="radio" checked id="genderunchecked" class="radio-gray" value="m" name="gender">
                            <label for="genderunchecked" class="radio-label">男</label>
                        </div>
                        <div class=" radio-custom w-1/4">
                            <input type="radio" id="genderchecked" class="radio-gray" value="w" name="gender">
                            <label for="genderchecked" class="radio-label">女</label>
                        </div>
                    </div>

                    <div class="date-group">

                        <p class=" date-title">生日日期</p>

                        <div class=" date-component">
                            <div class="inline-block relative">
                                <select id="daySelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日" name="day" required>
                                    <option value="" selected disabled>日</option>
                                    @for($i = 1; $i < 32; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
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
                                <select id="monthSelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="month" required>
                                    <option value="" selected disabled>月</option>
                                    @for($i = 1; $i < 13; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
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
                                <select id="yearSelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="year" required>
                                    <option value="" selected disabled>年</option>
                                    @for($i = 1990; $i < 2021; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative input-group">
                        <img id="pwdShowToggle" class="form-control-right-icon" src="{{asset('images/contactUs/Image_39@2x.png')}}" alt="Mobile">
                        <input class="show-input w-full form-control mb-6" style="padding-left:16px" placeholder="密碼" name="password" id="password" type="password" required>
                    </div>

                    <!-- <div class="relative">
                        <img class="show-icon" src="{{asset('images/contactUs/Image_39@2x.png')}}" alt="Mobile">
                        <input class="w-full form-control mb-6" style="padding-left:16px" placeholder="確認密碼" type="password" name="confirm_password" id="confirm_password" required>
                    </div> -->

                    <!-- <span class="mb-4" id='message'></span> -->


                    <button class="submit-btn hover:bg-purple-400 mt-4">
                        註冊
                    </button>
                </div>

                <div class="w-1/2 ml-10 mb-4">
                    <p class="register-subtilte robert-regular">Optional</p>
                    <div class="bg-grey p-6">
                        <p class="register-subtilte">住址</p>

                        <div class="flex mb-6">
                            <div class="w-1/3 inline-block relative">
                                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="area">
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
                                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="place">
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


                        <input class="w-full form-control mb-6" style="padding-left:16px" type="text" placeholder="地址第一行" name="addr1">

                        <input class="w-full form-control mb-6" style="padding-left:16px" type="text" placeholder="地址第二行" name="addr2">

                        <div class="w-full inline-block relative mb-6">
                            <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="contacatMethod">
                                <option value="" selected disabled>最佳聯絡方式</option>
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

                            <p class="radio-title w-4/6">是否One Storage 現有客戶 ? </p>

                            <div class="radio-custom w-1/6">
                                <input type="radio" id="storageyesunchecked" class="radio-gray" value="true" name="isCustomer">
                                <label for="storageyesunchecked" class="radio-label">是</label>
                            </div>
                            <div class="radio-custom w-1/6">
                                <input type="radio" id="storagenochecked" class="radio-gray" value="false" name="isCustomer">
                                <label for="storagenochecked" class="radio-label">否</label>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-2/3"></div>
                            <div class="w-1/3 inline-block relative mb-6">
                                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="branch">
                                    <option value="" selected disabled>分店</option>
                                    <?php
                                    $branches = App\Store::select('branch')->get();
                                    ?>
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->branch}}">{{$branch->branch}}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                </div>
                            </div>
                        </div>

                        <div class="radio-group">

                            <p class="radio-title w-4/6">是否SoundWill Club 會員 ? </p>

                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubyesunchecked" class="radio-gray" value="false" name="isMember">
                                <label for="clubyesunchecked" class="radio-label">是</label>
                            </div>
                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubnochecked" class="radio-gray" value="true" name="isMember">
                                <label for="clubnochecked" class="radio-label">否</label>
                            </div>
                        </div>
                    </div>

                </div>



            </form>
        </div>

        <div class="w-full px-8  pt-8 lg:w-1/3">
            <div class="login-alt-panel1">
                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
                    <input class="form-control  py-10 cursor-pointer btn text-left gmail-btn hover:bg-red-500" type="button" value="以 Gmail 登入">
                </div>

                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
                    <input class="form-control cursor-pointer btn text-left facebook-btn hover:bg-blue-500" type="button" value="以 Facebook 登入">
                </div>

            </div>
        </div>

    </div>

</div>
@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.Register();
    })
</script>
@endsection