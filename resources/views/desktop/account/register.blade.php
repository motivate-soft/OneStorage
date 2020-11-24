@extends('layouts.app')

@section('title')
<title>{{__('frontend_register.title')}}</title>
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
<div class="w-full xl:w-7/10 px-14 mx-auto" style="padding-top: 81px; padding-bottom: 20px;">
    <p class="subheader-title">{{__('frontend_register.register')}}</p>

    <div class="flex flex-col justify-center lg:flex-row pt-10">

        {{--border-r-none lg:border-r--}}
        <div class="w-full lg:w-2/3">
            {{--mr-8--}}
            <form id="registerForm" class="flex register-form1" method="post" action="{{url('/register')}}">
                @csrf
                <div class="w-1/2 mr-4">
                    <p style="color: red;" class="mb-4">*</p>
                    <div class="flex mb-4 w-full">
                        <div class="flex w-1/2 input-group">
                            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                            <input class="w-full form-control appearance-none" type="text" placeholder="{{__('frontend_register.lastName')}}" name="firstName" required>
                        </div>
                        <div class="w-1/2 flex input-group">
                            <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="{{__('frontend_register.firstName')}}" name="lastName" required>
                        </div>
                    </div>


                    <div class="input-group">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                        <input class="form-control" type="text" placeholder="{{__('frontend_register.mobilePhoneNumber')}}" name="phone" required>
                    </div>
                    <div class="mt-2 mb-4 text-red-600"><span class="hidden error-msg" id="phoneDuplicateMsg">{{__('frontend_register.mobileNumberUsed')}}</span></div>


                    <div class="input-group">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                        <input class="form-control" type="email" placeholder="{{__('frontend_register.email')}}" name="email" required>
                    </div>
                    <div class="mt-2 mb-4 text-red-600"><span class="hidden error-msg" id="emailDuplicateMsg">{{__('frontend_register.emailUsed')}}</span></div>

                    <div class="radio-group">

                        <p class="radio-title w-1/4">{{__('frontend_register.gender')}}</p>

                        <div class=" radio-custom w-1/4">
                            <input type="radio" checked id="genderunchecked" class="radio-gray" value="m" name="gender">
                            <label for="genderunchecked" class="radio-label">{{__('frontend_register.male')}}</label>
                        </div>
                        <div class=" radio-custom w-1/4">
                            <input type="radio" id="genderchecked" class="radio-gray" value="w" name="gender">
                            <label for="genderchecked" class="radio-label">{{__('frontend_register.female')}}</label>
                        </div>
                    </div>

                    <div class="date-group">

                        <p class=" date-title">{{__('frontend_register.birthDate')}}</p>

                        <div class=" date-component">
                            <div class="inline-block relative">
                                <select id="daySelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="{{__('frontend_register.day')}}" name="day" required>
                                    <option value="" selected disabled>{{__('frontend_register.day')}}</option>
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
                                <select id="monthSelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="month" required>
                                    <option value="" selected disabled>{{__('frontend_register.month')}}</option>
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
                                <select id="yearSelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="year" required>
                                    <option value="" selected disabled>{{__('frontend_register.year')}}</option>
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
                    <div class="relative input-group">
                        <img id="pwdShowToggle" class="form-control-right-icon" src="{{asset('images/contactUs/Image_39@2x.png')}}" alt="Mobile">
                        <input class="show-input w-full form-control mb-6" style="padding-left:16px" placeholder="{{__('frontend_register.password')}}" name="password" id="password" type="password" required>
                    </div>

                    <!-- <div class="relative">
                        <img class="show-icon" src="{{asset('images/contactUs/Image_39@2x.png')}}" alt="Mobile">
                        <input class="w-full form-control mb-6" style="padding-left:16px" placeholder="確認密碼" type="password" name="confirm_password" id="confirm_password" required>
                    </div> -->

                    <!-- <span class="mb-4" id='message'></span> -->


                    <button class="submit-btn hover:bg-purple-400 mt-4">
                        {{__('frontend_register.register')}}
                    </button>
                </div>

                <div class="w-1/2 ml-10 mb-4">
                    <p class="register-subtilte robert-regular">{{__('frontend_register.optional')}}</p>
                    <div class="bg-grey p-6">
                        <p class="register-subtilte">{{__('frontend_register.address')}}</p>

                        <div class="flex mb-6">
                            <div class="w-1/3 inline-block relative">
                                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="area">
                                    <option value="" selected>{{__('frontend_register.part')}}</option>
                                    <option value="{{__('frontend_register.hongkong')}}">{{__('frontend_register.hongkong')}}</option>
                                    <option value="{{__('frontend_register.kowloon')}}">{{__('frontend_register.kowloon')}}</option>
                                    <option value="{{__('frontend_register.newTerritories')}}">{{__('frontend_register.newTerritories')}}</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                </div>
                            </div>

                            <div class="w-2/3 inline-block relative ml-4">
                                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="place">
                                    <option value="" selected>{{__('frontend_register.area')}}</option>
                                    <option value="{{__('frontend_register.cwDistrict')}}">{{__('frontend_register.cwDistrict')}}</option>
                                    <option value="{{__('frontend_register.wanchai')}}">{{__('frontend_register.wanchai')}}</option>
                                    <option value="{{__('frontend_register.eastDistrict')}}">{{__('frontend_register.eastDistrict')}}</option>
                                    <option value="{{__('frontend_register.southDistrict')}}">{{__('frontend_register.southDistrict')}}</option>
                                    <option value="{{__('frontend_register.shamShuiPo')}}">{{__('frontend_register.shamShuiPo')}}</option>
                                    <option value="{{__('frontend_register.yautsimmong')}}">{{__('frontend_register.yautsimmong')}}</option>
                                    <option value="{{__('frontend_register.kowloonCity')}}">{{__('frontend_register.kowloonCity')}}</option>
                                    <option value="{{__('frontend_register.wongtaisin')}}">{{__('frontend_register.wongtaisin')}}</option>
                                    <option value="{{__('frontend_register.kwuntong')}}">{{__('frontend_register.kwuntong')}}</option>
                                    <option value="{{__('frontend_register.tuenmun')}}">{{__('frontend_register.tuenmun')}}</option>
                                    <option value="{{__('frontend_register.yuenlong')}}">{{__('frontend_register.yuenlong')}}</option>
                                    <option value="{{__('frontend_register.tsuenwan')}}">{{__('frontend_register.tsuenwan')}}</option>
                                    <option value="{{__('frontend_register.kwaitsing')}}">{{__('frontend_register.kwaitsing')}}</option>
                                    <option value="{{__('frontend_register.outlyingIsland')}}">{{__('frontend_register.outlyingIsland')}}</option>
                                    <option value="{{__('frontend_register.northDistrict')}}">{{__('frontend_register.northDistrict')}}</option>
                                    <option value="{{__('frontend_register.taipo')}}">{{__('frontend_register.taipo')}}</option>
                                    <option value="{{__('frontend_register.shatin')}}">{{__('frontend_register.shatin')}}</option>
                                    <option value="{{__('frontend_register.saigon')}}">{{__('frontend_register.saigon')}}</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                </div>
                            </div>
                        </div>

                        <input class="w-full form-control mb-6" style="padding-left:16px" type="text" placeholder="{{__('frontend_register.addressLine1')}}" name="addr1">

                        <input class="w-full form-control mb-6" style="padding-left:16px" type="text" placeholder="{{__('frontend_register.addressLine2')}}" name="addr2">

                        <div class="w-full inline-block relative mb-6">
                            <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="contactMethod">
                                <option value="" selected disabled>{{__('frontend_register.bestContactMethod')}}</option>
                                <option value="Whatsapp">Whatsapp</option>
                                <option value="{{__('frontend_register.email')}}">{{__('frontend_register.email')}}</option>
                                <option value="{{__('frontend_register.call')}}">{{__('frontend_register.call')}}</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>

                        <div class="radio-group">

                            <p class="radio-title w-4/6">{{__('frontend_register.existingCustomers')}}</p>

                            <div class="radio-custom w-1/6">
                                <input type="radio" id="storageyesunchecked" class="radio-gray" value="1" name="isCustomer">
                                <label for="storageyesunchecked" class="radio-label">{{__('frontend_register.yes')}}</label>
                            </div>
                            <div class="radio-custom w-1/6">
                                <input type="radio" id="storagenochecked" class="radio-gray" value="0" name="isCustomer">
                                <label for="storagenochecked" class="radio-label">{{__('frontend_register.no')}}</label>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-2/3"></div>
                            <div class="w-1/3 inline-block relative mb-6">
                                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="branch">
                                    <option value="" selected disabled>{{__('frontend_register.branch')}}</option>
                                    <?php
                                    $branches = App\Store::all();
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

                            <p class="radio-title w-4/6">{{__('frontend_register.soundWill')}}</p>

                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubyesunchecked" class="radio-gray" value="1" name="isMember">
                                <label for="clubyesunchecked" class="radio-label">{{__('frontend_register.yes')}}</label>
                            </div>
                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubnochecked" class="radio-gray" value="0" name="isMember">
                                <label for="clubnochecked" class="radio-label">{{__('frontend_register.no')}}</label>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>

        <div class="w-full px-8  pt-8 lg:w-1/3 hidden">
            <div class="login-alt-panel1">
                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-gmail-50@2x.png')}}" alt="Mobile">
                    <input class="form-control  py-10 cursor-pointer btn text-left gmail-btn hover:bg-red-500" type="button" value="{{__('frontend_login.loginWithGmail')}}">
                </div>

                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="Mobile">
                    <input class="form-control cursor-pointer btn text-left facebook-btn hover:bg-blue-500" type="button" value="{{__('frontend_login.loginWithFacebook')}}">
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
