@extends('layouts.app')

@section('title')
<title>{{ __('Account') }}</title>
@endsection

@section('content')
<div class="mx-auto w-3/5 py-10">

    <div class="flex px-12 mt-8 lg:px-32 md:px-20">
        <img class="mr-4 w-32 h-32" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink">
        <div class="body-content lg:rounded-b-none lg:rounded-r mt-28">
            <div class=" branch-title mb-8">Paul Smith, 歡迎你回來!</div>
        </div>
    </div>

    <div class=" chatroom-form">
        <div class=" flex w-full mb-4">
            <div class=" w-1/4"></div>
            <div class=" w-3/4">
                <p class=" text-center" id="notification" style="color: #18B84D; font-size: 11px">更新成功! </p>
            </div>
        </div>

        <div class=" flex w-full mb-4">

            <div class=" w-1/5 mx-8">
                <a href="{{url('account')}}"><div class=" border text-center branch-tab py-6">個人資料</div></a>
                <a href="{{url('chatlist')}}"><div class=" border text-center branch-tab py-6 active">信息</div></a>
            </div>

            <div class=" flex w-4/5 mx-2 border py-2 px-2">
                <div class=" w-3/5 pl-12">
                    <div class=" sub-content">
                        <p class="subcontent-header my-2 pt-4 font-bold">個人資料</p>

                        <div class=" flex relative py-2">
                            <p class=" w-1/4 input-label text-right font-bold">姓 :</p>
                            <div class=" flex w-1/4 items-center border-b">
                                <input id="firstName" class="ischanged appearance-none bg-transparent border-none text-center font-bold w-full px-2 leading-tight" type="text" value="Smith" readonly>
                            </div>
                            <p class=" w-1/4 input-label text-right font-bold">名 :</p>
                            <div class=" w-1/4 items-center border-b">
                                <input id="lastName" class="ischanged appearance-none bg-transparent border-none w-full text-center font-bold px-2 leading-tight" type="text" value="Paul" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(1)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class=" flex relative py-2">
                            <p class=" w-1/4 input-label text-right font-bold">電子郵件 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input id="email" class="ischanged appearance-none bg-transparent border-none text-center w-full font-bold px-2 leading-tight" type="text" value="Smith.P@gmail.com" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(2)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class=" flex relative py-2 mb-8">
                            <p class=" w-1/4 input-label text-right font-bold">電話號碼 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input id="phone" class="ischanged appearance-none bg-transparent text-center border-none w-full font-bold px-2 leading-tight" type="text" value="6123 6123" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(3)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <p class="subcontent-header py-4 mb-2 font-bold">更改密碼</p>

                        <div class=" flex relative mb-8">
                            <p class=" w-1/4 input-label text-right font-bold">密碼 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input id="password" class=" ischanged appearance-none bg-transparent border-none text-center w-full px-2 leading-tight" type="password" value="********" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(4)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class="date-group">

                            <p class=" date-title text-right font-bold mr-2" style="font-size: 19px">生日日期</p>

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

                        <p class="subcontent-header py-4 mb-2 font-bold">住址</p>

                        <div class=" flex mb-8 py-4">
                            <div class=" w-1/3">
                                <div class="inline-block relative w-full px-2">
                                    <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
                                        <option value="" selected>地域</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
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

                            <p class="radio-title w-4/6 font-bold">是否One Storage 現有客戶 ? </p>

                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="storageyesunchecked" checked class="radio-gray" name="storage">
                                <label for="storageyesunchecked" class="radio-label">是</label>
                            </div>
                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="storagenochecked" class="radio-gray" name="storage">
                                <label for="storagenochecked" class="radio-label">否</label>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-1/3 inline-block relative mb-6">
                                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
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
                            <div class="w-2/3"></div>
                        </div>

                        <div class="radio-group">

                            <p class="radio-title w-4/6 font-bold">是否SoundWill Club 會員 ? </p>

                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubyesunchecked" checked class="radio-gray" name="club">
                                <label for="clubyesunchecked" class="radio-label">是</label>
                            </div>
                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubnochecked" class="radio-gray" name="club">
                                <label for="clubnochecked" class="radio-label">否</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class=" w-2/5 py-4">
                    <img class="w-32 h-32 mx-auto" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink">
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