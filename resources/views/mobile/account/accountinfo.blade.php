@extends('layouts.app')

@section('title')
    <title>{{ __('frontend_title.memberInformation') }}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">

<style>
    .robert-font {
        font-family: "RobertBlack";
    }
</style>
@endsection


@section('latest_news')

@endsection

@section('header')
@include('layouts.header')
@endsection

@section('content')

<?php
$user = Auth::user();
use Illuminate\Support\Facades\Session;?>
<div class=" mt-10 robert-font mb-8 fontsize-25 regular-color pt-4 text-center px-5">{{$user->getName()}}, {{__('frontend_accountinfo.welcomeBack')}}</div>

<div class="w-full pb-8">

    <div class="flex w-full">
        <div class="w-1/5"></div>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color" href="{{route('pages.account')}}">{{__('frontend_accountinfo.personalInformation')}}</a>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color bg-grey" href="{{route('pages.chatList')}}">{{__('frontend_accountinfo.information')}}</a>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color" href="{{route('logout')}}">{{__('frontend_accountinfo.logout')}}</a>
        <div class="w-1/5"></div>
    </div>

    <form class=" w-full border py-4 px-8" method="POST" action="{{route('account.update')}}" enctype="multipart/form-data">
        @csrf
        <!-- <p class=" text-center py-3 fontsize-11" id="notification" style="color: #18B84D">更新成功!</p> -->
        <div>
            <img class="img-avatar cursor-pointer w-16 h-16 mx-auto rounded-full object-fill object-center" src="{{asset($user->profile->avatar)}}" alt="Avatar of Jonathan Reinink">
            <input type="file" name="avatar" class="hidden img-input" accept=".jpg,.png,.gif" />
        </div>

        <p class=" text-center py-1 fontsize-8 regular-color">{{__('frontend_accountinfo.changePhoto')}}</p>
        <div class="sub-content">
            <p class="subcontent-header my-2  fontsize-15">{{__('frontend_accountinfo.personalInformation')}}</p>

            <div class=" flex relative py-2">
                <p class=" w-1/4 input-label text-right fontsize-14">{{__('frontend_common.firstName')}} :</p>
                <div class=" flex w-1/4 items-center border-b">
                    <input name="firstName" id="firstName" class="ischanged appearance-none bg-transparent border-none text-center fontsize-14 w-full px-2 leading-tight" type="text" value="{{$user->first_name}}" readonly>
                </div>
                <p class=" w-1/4 input-label text-right fontsize-14">{{__('frontend_common.lastName')}} :</p>
                <div class=" w-1/4 items-center border-b">
                    <input name="lastName" required id="lastName" class="ischanged appearance-none bg-transparent border-none w-full text-center fontsize-14 px-2 leading-tight" type="text" readonly value="{{$user->last_name}}">
                </div>
                <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(1)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
            </div>

            <div class=" flex relative py-2">
                <p class=" w-1/4 input-label text-right fontsize-14">{{__('frontend_common.email')}} :</p>
                <div class=" w-3/4 items-center border-b">
                    <input name="email" required id="email" class="ischanged appearance-none bg-transparent border-none text-center w-full fontsize-14 px-2 leading-tight" type="text" readonly value="{{$user->email}}">
                </div>
                <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(2)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
            </div>

            <div class=" flex relative py-2 mb-8">
                <p class=" w-1/4 input-label text-right fontsize-14">{{__('frontend_accountinfo.mobilePhoneNumber')}} :</p>
                <div class=" w-3/4 items-center border-b">
                    <input name="phone" required id="phone" class="ischanged appearance-none bg-transparent text-center border-none w-full fontsize-14 px-2 leading-tight" type="text" value="{{$user->phone}}" readonly>
                </div>
                <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(3)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
            </div>

            <p class="subcontent-header py-4 mb-2  fontsize-13">{{__('frontend_accountinfo.changePassword')}}</p>

            <div class=" flex relative mb-8">
                <p class=" w-1/4 input-label text-right fontsize-14">{{__('frontend_accountinfo.password')}} :</p>
                <div class=" w-3/4 items-center border-b">
                    <input name="password" id="password" class=" ischanged appearance-none bg-transparent border-none text-center w-full px-2 leading-tight" type="password" value="" readonly>
                </div>
                <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(4)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
            </div>

            <div class="date-group">

                <p class=" date-title text-right  mr-2 fontsize-13">{{__('frontend_accountinfo.birthdayDate')}}</p>

                <div class=" date-component">
                    <div class="inline-block relative">
                        <select id="daySelector" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-2 py-2 pr-6 leading-tight focus:outline-none" aria-placeholder="{{__('frontend_accountinfo.day')}}" name="day" required>
                            <option value="" selected>{{__('frontend_accountinfo.day')}}</option>
                            @for($i = 1; $i < 32; $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>

                <div class=" date-component">
                    <div class="inline-block relative">
                        <select id="monthSelector" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-2 py-2 pr-6 leading-tight focus:outline-none" name="month" required>
                            <option value="" selected>{{__('frontend_accountinfo.month')}}</option>
                            @for($i = 1; $i < 13; $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>

                <div class=" date-component">
                    <div class="inline-block relative">
                        <select id="yearSelector" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-2 py-2 pr-6 leading-tight focus:outline-none" name="year" required>
                            <option value="" selected>{{__('frontend_accountinfo.year')}}</option>
                            @for($i = 1920; $i < 2021; $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <p class="subcontent-header py-4 mb-2  fontsize-13">{{__('frontend_accountinfo.address')}}</p>

            <div class=" flex mb-8 py-4">
                <div class=" w-1/3">
                    <div class="inline-block relative w-full px-2">
                        <select class="block appearance-none w-full bg-gray-100 fontsize-14 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="area">
                            <option value="" selected>{{__('frontend_accountinfo.part')}}</option>
                            <?php
                            $areas = null;
                            if(Session::has('locale') && Session::get('locale')=="en") {
                                $areas = ["Hong Kong", "Kowloon", "New Territories"];
                            }
                            else {
                                $areas = ["香港", "九龍", "新界"];
                            }

                            ?>
                            @foreach($areas as $area)
                            <option value="{{$area}}" {{$user->profile->area == $area ? 'selected' : ''}}>{{$area}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>

                <div class=" w-2/3">
                    <div class="inline-block relative w-full px-2">
                        <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none fontsize-14" name="place">
                            <option value="" selected>{{__('frontend_accountinfo.area')}}</option>
                            <?php
                            $places = null;
                            if(Session::has('locale') && Session::get('locale')=="en") {
                                $places = ["Central and Western District", "Wanchai", "East District", "South District", "Sham shui po", "Yau Tsim Mong", "Kowloon City", "Wong Tai Sin", "Kwun Tong", "Tuen Mun", "Yuen Long", "Tsuen Wan", "Kwai Tsing", "Outlying islands", "North District", "Tai Po", "Sha Tin", "Saigon"];
                            }
                            else {
                                $places = ["中西區", "灣仔", "東區", "南區", "深水埗", "油尖旺", "九龍城", "黃大仙", "觀塘", "屯門", "元朗", "荃灣", "葵青", "離島", "北區", "大埔", "沙田", "西貢"];
                            }
                            ?>
                            @foreach($places as $place)
                            <option value="{{$place}}" {{$user->profile->place == $place ? 'selected' : ''}}>{{$place}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" relative mb-8 px-2">
                <div class=" w-full items-center border-b">
                    <input value="{{$user->profile->address_line1}}" name="addr1" class="appearance-none bg-transparent border-none w-full px-2 py-1 leading-tight fontsize-14" type="text" placeholder="{{__('frontend_accountinfo.addressLine1')}}">
                </div>
            </div>

            <div class=" relative mb-8 px-2">
                <div class=" w-full items-center border-b">
                    <input value="{{$user->profile->address_line2}}" name="addr2" class="appearance-none bg-transparent border-none w-full px-2 py-1 leading-tight fontsize-14" type="text" placeholder="{{__('frontend_accountinfo.addressLine2')}}">
                </div>
            </div>

            <div class=" w-full mb-8">

                <div class="inline-block relative w-full px-2">
                    <select name="contactMethod" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 fontsize-14 px-2 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="{{__('frontend_common.day')}}">
                        <?php
                        $methods = ["Whatsapp", "Email", "Call"];
                        ?>
                        <option value="" selected>{{__('frontend_accountinfo.bestContactUs')}}</option>
                        @foreach($methods as $method)
                        <option value="{{$method}}" {{$user->profile->contact_method == $method ? 'selected' : ''}}>{{$method}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>

            </div>

            <div class="radio-group">

                <p class="radio-title w-4/6  fontsize-14">{{__('frontend_accountinfo.customerOneStorage')}}</p>

                <div class=" radio-custom w-1/6">
                    <input type="radio" id="storageyesunchecked" class="radio-gray" value="1" name="isCustomer">
                    <label for="storageyesunchecked" class="radio-label">{{__('frontend_common.yes')}}</label>
                </div>
                <div class=" radio-custom w-1/6">
                    <input type="radio" id="storagenochecked" checked class="radio-gray" value="0" name="isCustomer">
                    <label for="storagenochecked" class="radio-label">{{__('frontend_common.no')}}</label>
                </div>
            </div>

            <div class="flex">
                <div class="w-1/2 inline-block relative mb-6">
                    <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none fontsize-14" name="branch">
                        <?php
                        $branches = App\Store::all();
                        ?>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}" {{$user->profile->branch_id == $branch->id ? 'selected' : ''}}>{{$branch->branch}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
                <div class="w-2/3"></div>
            </div>

            <div class="radio-group">

                <p class="radio-title w-4/6  fontsize-14">{{__('frontend_register.soundWill')}}</p>

                <div class=" radio-custom w-1/6">
                    <input type="radio" id="clubyesunchecked" class="radio-gray" value="1" name="isMember">
                    <label for="clubyesunchecked" class="radio-label">{{__('frontend_common.yes')}}</label>
                </div>
                <div class=" radio-custom w-1/6">
                    <input type="radio" id="clubnochecked" checked class="radio-gray" value="0" name="isMember">
                    <label for="clubnochecked" class="radio-label">{{__('frontend_common.no')}}</label>
                </div>
            </div>

            <button class="submit-btn hover:bg-purple-400 my-4">
                {{__('frontend_common.update')}}
            </button>

        </div>
    </form>

</div>
@endsection

@section('scripts')
<script>
    function readURL(input, preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(document).ready(function() {
        $("#notification").hide();

        // $(".ischanged").click(function() {
        //     $("#notification").fadeIn(3000);

        // });

        $(".img-input").change(function() {
            readURL(this, $(".img-avatar"));
        })


        $(".img-avatar").click(function() {
            $(this).next().click();
        })

        if ('<?= $user->profile->is_existing_customer ?>' != '-') {
            $("#storageyesunchecked").prop("checked", true);
            $("#storagenochecked").removeAttr("checked");
        } else {
            $("#storagenochecked").prop("checked", true);
            $("#storageyesunchecked").removeAttr("checked");
        }

        if ('<?= $user->profile->is_soundwill_member ?>' != '-') {
            $("#clubyesunchecked").prop("checked", true);
            $("#clubnochecked").removeAttr("checked");
        } else {
            $("#clubnochecked").prop("checked", true);
            $("#clubyesunchecked").removeAttr("checked");
        }
        OneStorage.DOB(new Date('<?= $user->profile->birthday ?>'));
    });

    function modifyData(id) {
        if (id == 1) {
            const edtFirstName = document.getElementById('firstName');
            const edtLastName = document.getElementById('lastName');

            edtFirstName.readOnly = false;
            edtLastName.readOnly = false;
            edtFirstName.focus();

            return true;
        }
        if (id == 2) {
            const edtEmail = document.getElementById('email');
            edtEmail.readOnly = false;
            edtEmail.focus();
            return true;
        }
        if (id == 3) {
            const edtPhone = document.getElementById('phone');
            edtPhone.readOnly = false;
            edtPhone.focus();
            return true;
        }
        if (id == 4) {
            const edtPwd = document.getElementById('password');
            edtPwd.readOnly = false;
            edtPwd.focus();
            return true;
        }
    }
</script>
@endsection

@section('footer')

@endsection
