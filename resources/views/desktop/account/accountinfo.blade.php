@extends('layouts.app')

@section('title')
<title>{{ __('Chat Room') }}</title>
@endsection

@section('styles')
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
<div class="mx-auto w-1/2 py-16">

    <div class="flex mb-24">
        <img class="mx-15 object-none" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink">
        <div class="flex flex-col lg:rounded-b-none lg:rounded-r justify-end">
        <div class="branch-title">{{Auth::user()->getName()}}, 歡迎你回來!</div>
        </div>
    </div>

    <div class="text-primary">
        <div class=" flex w-full mb-4">
            <div class=" w-1/4"></div>
            <div class=" w-3/4">
                <p class=" text-center" id="notification" style="color: #18B84D; font-size: 11px">更新成功! </p>
            </div>
        </div>

        <div class="flex w-full mb-4">
            <div class="w-1/5">
                <a href="{{url('account')}}">
                    <div class="border text-center branch-tab-active py-6">個人資料</div>
                </a>
                <a href="{{url('chatlist')}}">
                    <div class="border text-center branch-tab py-6">信息</div>
                </a>
                <a href="{{url('logout')}}">
                    <div class="border text-center branch-tab py-6" style="background-color: white !important;">登出</div>
                </a>
            </div>

            <div class="flex w-4/5 ml-2 border">
                <div class=" w-3/5 pl-12">
                    <div class=" sub-content">
                        <p class="subcontent-header my-2 pt-4">個人資料</p>

                        <div class=" flex relative py-2">
                            <p class=" w-1/4 input-label text-right ">姓 :</p>
                            <div class=" flex w-1/4 items-center border-b">
                                <input id="firstName" class="ischanged appearance-none bg-transparent border-none text-center  w-full px-2 leading-tight" type="text" value="Smith" readonly>
                            </div>
                            <p class=" w-1/4 input-label text-right ">名 :</p>
                            <div class=" w-1/4 items-center border-b">
                                <input id="lastName" class="ischanged appearance-none bg-transparent border-none w-full text-center  px-2 leading-tight" type="text" value="Paul" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(1)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class=" flex relative py-2">
                            <p class=" w-1/4 input-label text-right ">電子郵件 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input id="email" class="ischanged appearance-none bg-transparent border-none text-center w-full  px-2 leading-tight" type="text" value="Smith.P@gmail.com" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(2)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class=" flex relative py-2 mb-8">
                            <p class=" w-1/4 input-label text-right ">電話號碼 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input id="phone" class="ischanged appearance-none bg-transparent text-center border-none w-full  px-2 leading-tight" type="text" value="6123 6123" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(3)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <p class="subcontent-header py-4 mb-2 ">更改密碼</p>

                        <div class=" flex relative mb-8">
                            <p class=" w-1/4 input-label text-right ">密碼 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input id="password" class=" ischanged appearance-none bg-transparent border-none text-center w-full px-2 leading-tight" type="password" value="********" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(4)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class="date-group">

                            <p class=" date-title text-right  mr-2" style="font-size: 19px">生日日期</p>

                            <div class=" date-component">
                                <div class="inline-block relative">
                                    <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
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
                                    <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
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
                                    <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
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

                        <p class="subcontent-header py-4 mb-2 ">住址</p>

                        <div class=" flex mb-8 py-4">
                            <div class=" w-1/3">
                                <div class="inline-block relative w-full px-2">
                                    <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
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
                            </div>

                            <div class=" w-2/3">
                                <div class="inline-block relative w-full px-2">
                                    <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
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
                        </div>

                        <div class=" relative mb-8 px-2">
                            <div class=" w-full items-center border-b">
                                <input class="appearance-none bg-transparent border-none w-full px-2 py-1 leading-tight" type="text" placeholder="地址第一行">
                            </div>
                        </div>

                        <div class=" relative mb-8 px-2">
                            <div class=" w-full items-center border-b">
                                <input class="appearance-none bg-transparent border-none w-full px-2 py-1 leading-tight" type="text" placeholder="地址第二行">
                            </div>
                        </div>

                        <div class=" w-full mb-8">

                            <div class="inline-block relative w-full px-2">
                                <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-2 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
                                    <option value="" selected>最佳聯絡方式</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                </div>
                            </div>

                        </div>

                        <div class="radio-group">

                            <p class="radio-title w-4/6 ">是否One Storage 現有客戶 ? </p>

                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="storageyesunchecked" class="radio-gray" name="storage" value="true">
                                <label for="storageyesunchecked" class="radio-label">是</label>
                            </div>
                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="storagenochecked" checked class="radio-gray" name="storage" value="false">
                                <label for="storagenochecked" class="radio-label">否</label>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-1/3 inline-block relative mb-6">
                                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
                                    <option value="" selected>分店</option>
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
                            <div class="w-2/3"></div>
                        </div>

                        <div class="radio-group pb-6">

                            <p class="radio-title w-4/6 ">是否SoundWill Club 會員 ? </p>

                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubyesunchecked" class="radio-gray" name="club" value="true">
                                <label for="clubyesunchecked" class="radio-label">是</label>
                            </div>
                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubnochecked" checked class="radio-gray" name="club" value="false">
                                <label for="clubnochecked" class="radio-label">否</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="w-2/5 pt-10">
                    <img class="object-none mx-auto" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink">
                    <p class=" text-center py-3" style="color: #4D5567; font-size: 14px">更改相片</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $("#notification").hide();
        $(".ischanged").click(function() {
            $("#notification").fadeIn(3000);

        });
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