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
    <?php
    $user = Auth::user();
    ?>

    <div class="flex mb-24">
        <img class="mx-15 img-avatar w-40 h-40 rounded-full object-fill" src="{{asset($user->profile->avatar)}}" alt="Avatar of Jonathan Reinink">
        <div class="flex flex-col lg:rounded-b-none lg:rounded-r justify-end">
            <div class="branch-title">{{$user->getName()}}, 歡迎你回來!</div>
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

            <form class="flex w-4/5 ml-2 border" method="POST" action="{{url('/account/update')}}" enctype="multipart/form-data">
                @csrf
                <div class=" w-3/5 pl-12">
                    <div class=" sub-content">
                        <p class="subcontent-header my-2 pt-4">個人資料</p>

                        <div class=" flex relative py-2">
                            <p class=" w-1/4 input-label text-right ">姓 :</p>
                            <div class=" flex w-1/4 items-center border-b">
                                <input name="firstName" required id="firstName" class="ischanged appearance-none bg-transparent border-none text-center  w-full px-2 leading-tight" type="text" value="{{$user->first_name}}" readonly>
                            </div>
                            <p class=" w-1/4 input-label text-right ">名 :</p>
                            <div class=" w-1/4 items-center border-b">
                                <input name="lastName" required id="lastName" class="ischanged appearance-none bg-transparent border-none w-full text-center  px-2 leading-tight" type="text" value="{{$user->last_name}}" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(1)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class=" flex relative py-2">
                            <p class=" w-1/4 input-label text-right ">電子郵件 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input name="email" required id="email" class="ischanged appearance-none bg-transparent border-none text-center w-full  px-2 leading-tight" type="text" value="{{$user->email}}" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(2)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class=" flex relative py-2 mb-8">
                            <p class=" w-1/4 input-label text-right ">電話號碼 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input name="phone" required id="phone" class="ischanged appearance-none bg-transparent text-center border-none w-full  px-2 leading-tight" type="text" value="{{$user->phone}}" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(3)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <!-- <div class="radio-group">

                            <p class="subcontent-header radio-title w-1/4">性別</p>

                            <div class=" radio-custom w-1/4">
                                <input type="radio" checked id="genderunchecked" class="radio-gray" value="m" name="gender">
                                <label for="genderunchecked" class="radio-label">男</label>
                            </div>
                            <div class=" radio-custom w-1/4">
                                <input type="radio" id="genderchecked" class="radio-gray" value="w" name="gender">
                                <label for="genderchecked" class="radio-label">女</label>
                            </div>
                        </div> -->

                        <p class="subcontent-header py-4 mb-2 ">更改密碼</p>

                        <div class=" flex relative mb-8">
                            <p class=" w-1/4 input-label text-right ">密碼 :</p>
                            <div class=" w-3/4 items-center border-b">
                                <input id="password" name="password" class="ischanged appearance-none bg-transparent border-none text-center w-full px-2 leading-tight" type="password" value="" readonly>
                            </div>
                            <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(4)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                        </div>

                        <div class="date-group">

                            <p class=" date-title text-right  mr-2" style="font-size: 19px">生日日期</p>

                            <div class=" date-component">
                                <div class="inline-block relative">
                                    <select id="daySelector" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日" name="day" required>
                                        <option value="" selected>日</option>
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
                                    <select id="monthSelector" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="month" required>
                                        <option value="" selected>月</option>
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
                                    <select id="yearSelector" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="year" required>
                                        <option value="" selected>年</option>
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

                        <p class="subcontent-header py-4 mb-2 ">住址</p>

                        <div class=" flex mb-8 py-4">
                            <div class=" w-1/3">
                                <div class="inline-block relative w-full px-2">
                                    <select value="{{$user->profile->area}}" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="area">
                                        <option value="" selected>地域</option>
                                        <?php
                                        $areas = ["香港", "九龍", "新界"];
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
                                    <select value="{{$user->profile->place}}" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="place">
                                        <option value="" selected>地區</option>
                                        <?php
                                        $places = ["中西區", "灣仔", "東區", "南區", "深水埗", "油尖旺", "九龍城", "黃大仙", "觀塘", "屯門", "元朗", "荃灣", "葵青", "離島", "北區", "大埔", "沙田", "西貢"];
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
                                <input value="{{$user->profile->address_line1}}" name="addr1" class="appearance-none bg-transparent border-none w-full px-2 py-1 leading-tight" type="text" placeholder="地址第一行">
                            </div>
                        </div>

                        <div class=" relative mb-8 px-2">
                            <div class=" w-full items-center border-b">
                                <input value="{{$user->profile->address_line2}}" name="addr2" class="appearance-none bg-transparent border-none w-full px-2 py-1 leading-tight" type="text" placeholder="地址第二行">
                            </div>
                        </div>

                        <div class=" w-full mb-8">

                            <div class="inline-block relative w-full px-2">
                                <select value="{{$user->profile->contact_method}}" class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-2 py-2 pr-8 leading-tight focus:outline-none" name="contactMethod">
                                    <?php
                                    $methods = ["Whatsapp", "Email", "Call"];
                                    ?>
                                    <option value="" selected>最佳聯絡方式</option>
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

                            <p class="radio-title w-4/6 ">是否One Storage 現有客戶 ? </p>

                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="storageyesunchecked" class="radio-gray" value="1" name="isCustomer">
                                <label for="storageyesunchecked" class="radio-label">是</label>
                            </div>
                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="storagenochecked" checked class="radio-gray" value="0" name="isCustomer">
                                <label for="storagenochecked" class="radio-label">否</label>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-1/3 inline-block relative mb-6">
                                <select value="{{$user->profile->branch_id}}" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="branch">
                                    <option value="" selected>分店</option>
                                    <?php
                                    $branches = App\Store::select('branch', 'id')->get();
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

                        <div class="radio-group pb-6">

                            <p class="radio-title w-4/6 ">是否SoundWill Club 會員 ? </p>

                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubyesunchecked" class="radio-gray" value="1" name="isMember">
                                <label for="clubyesunchecked" class="radio-label">是</label>
                            </div>
                            <div class=" radio-custom w-1/6">
                                <input type="radio" id="clubnochecked" checked class="radio-gray" value="0" name="isMember">
                                <label for="clubnochecked" class="radio-label">否</label>
                            </div>
                        </div>
                        <button class="submit-btn hover:bg-purple-400 my-4">
                            更新
                        </button>
                    </div>
                </div>
                <div class="w-2/5 pt-10">
                    <img class="object-fill img-avatar rounded-full mx-auto h-40 w-40 cursor-pointer" src="{{asset($user->profile->avatar)}}" alt="Avatar of Jonathan Reinink">
                    <input type="file" name="avatar" class="hidden img-input" accept=".jpg,.png,.gif" />
                    <p class="text-center py-3" style="color: #4D5567; font-size: 14px">更改相片</p>
                </div>
            </form>
        </div>
    </div>
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

        $(".img-input").change(function(){
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