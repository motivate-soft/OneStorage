<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Booking') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/common.css')}}" rel="stylesheet">
    <link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}"/>
</head>

<body class=" bg-white">
    <main className="w-full mx-auto">

        <div class=" mb-8 fontsize-25 regular-color text-center font-bold">Paul Smith, 歡迎你回來!</div>

        <div class=" chatroom-form">

            <div class=" flex w-full">
                <div class=" w-1/4"></div>
                <div class=" w-1/4 border text-center py-3 fontsize-11 regular-color">個人資料</div>
                <div class=" w-1/4 border text-center py-3 fontsize-11 regular-color">信息</div>
                <div class=" w-1/4"></div>
            </div>

            <div class=" w-full border pt-2 px-4">
                <p class=" text-center py-3 fontsize-11" id="notification" style="color: #18B84D">更新成功!</p>
                <img class=" w-12 h-12 mx-auto object-center" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                <p class=" text-center py-3 fontsize-8 regular-color">更改相片</p>
                <div class=" sub-content">
                    <p class="subcontent-header my-2 pt-4 font-bold fontsize-15">個人資料</p>

                    <div class=" flex relative py-2">
                        <p class=" w-1/4 input-label text-right fontsize-14">姓 :</p>
                        <div class=" flex w-1/4 items-center border-b">
                            <input id="firstName" class="ischanged appearance-none bg-transparent border-none text-center fontsize-14 w-full px-2 leading-tight" type="text" value="Smith" readonly>
                        </div>
                        <p class=" w-1/4 input-label text-right fontsize-14">名 :</p>
                        <div class=" w-1/4 items-center border-b">
                            <input id="lastName" class="ischanged appearance-none bg-transparent border-none w-full text-center fontsize-14 px-2 leading-tight" type="text" value="Paul" readonly>
                        </div>
                        <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(1)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                    </div>

                    <div class=" flex relative py-2">
                        <p class=" w-1/4 input-label text-right fontsize-14">電子郵件 :</p>
                        <div class=" w-3/4 items-center border-b">
                            <input id="email" class="ischanged appearance-none bg-transparent border-none text-center w-full fontsize-14 px-2 leading-tight" type="text" value="Smith.P@gmail.com" readonly>
                        </div>
                        <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(2)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                    </div>

                    <div class=" flex relative py-2 mb-8">
                        <p class=" w-1/4 input-label text-right fontsize-14">電話號碼 :</p>
                        <div class=" w-3/4 items-center border-b">
                            <input id="phone" class="ischanged appearance-none bg-transparent text-center border-none w-full fontsize-14 px-2 leading-tight" type="text" value="6123 6123" readonly>
                        </div>
                        <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(3)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                    </div>

                    <p class="subcontent-header py-4 mb-2 font-bold fontsize-13">更改密碼</p>

                    <div class=" flex relative mb-8">
                        <p class=" w-1/4 input-label text-right fontsize-14">密碼 :</p>
                        <div class=" w-3/4 items-center border-b">
                            <input id="password" class=" ischanged appearance-none bg-transparent border-none text-center w-full px-2 leading-tight" type="password" value="********" readonly>
                        </div>
                        <a href="javascript:void(0);" class=" w-4 h-4" onclick="modifyData(4)"><img class=" w-4 h-4" src="{{asset('images/contactUs/icons8-edit-48@2x.png')}}" style="right:0;margin-right: -16px" alt="Pencil"></a>
                    </div>

                    <div class="date-group">

                        <p class=" date-title text-right font-bold mr-2 fontsize-13">生日日期</p>

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

                    <p class="subcontent-header py-4 mb-2 font-bold fontsize-13">住址</p>

                    <div class=" flex mb-8 py-4">
                        <div class=" w-1/3">
                            <div class="inline-block relative w-full px-2">
                                <select class="block appearance-none w-full bg-gray-100 fontsize-14 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
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
                                <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none fontsize-14">
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
                            <input class="appearance-none bg-transparent border-none w-full px-2 py-1 leading-tight fontsize-14" type="text" placeholder="地址第一行">
                        </div>
                    </div>

                    <div class=" relative mb-8 px-2">
                        <div class=" w-full items-center border-b">
                            <input class="appearance-none bg-transparent border-none w-full px-2 py-1 leading-tight fontsize-14" type="text" placeholder="地址第二行">
                        </div>
                    </div>

                    <div class=" w-full mb-8">

                        <div class="inline-block relative w-full px-2">
                            <select class="block appearance-none w-full bg-gray-100 border-b border-gray-200 fontsize-14 px-2 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日">
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

                        <p class="radio-title w-4/6 font-bold fontsize-14">是否One Storage 現有客戶 ? </p>

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
                        <div class="w-1/3 inline-block relative mb-6">
                            <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none fontsize-14" aria-placeholder="日">
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

                        <p class="radio-title w-4/6 font-bold fontsize-14">是否SoundWill Club 會員 ? </p>

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

            
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>  
        $(document).ready(function(){
            $("#notification").hide();
            $(".ischanged").click(function(){
                $("#notification").fadeIn(3000);

            });
        });

        function modifyData(id)
        {
            if(id == 1)
            {
                document.getElementById('firstName').readOnly = false;
                document.getElementById('lastName').readOnly = false;
                return true;
            }
            if(id == 2)
            {
                document.getElementById('email').readOnly = false;
                return true;
            }
            if(id == 3)
            {
                document.getElementById('phone').readOnly = false;
                return true;
            }
            if(id == 4)
            {
                document.getElementById('password').readOnly = false;
                return true;
            }
        }
    </script>
</body>

</html>