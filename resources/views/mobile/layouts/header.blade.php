<nav class="flex items-center justify-between flex-wrap bg-white p-2 w-full pin-t z-50" style="background-color:#F6F6F6;">
    <div class="block">
        <button id="nav-toggle" class="flex items-center px-3 py-2  rounded text-grey-900">
            <div class="ml-1" onclick="myFunction(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </button>
    </div>
    <div class=" items-center  text-white " style="margin-right:123px">
        <a href="/"><img class="fill-current ml-20" width="90" height="45" src="{{asset('images/header/logo@2x.png')}}" id="default_log" /></a>
    </div>
    <div class="  text-white mx-auto">
        <a href="https://wa.me/85251188503">
            <img class="fill-current" id="phone_log" style="display: none;" src="{{asset('images/header/Component 7 – 1@2x.png')}}" />
        </a>
    </div>
    <div class="w-full flex-grow z-50  hidden pt-6" id="nav-content" style="background-color:#F6F6F6;">
        <div class="my-2 px-2">
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                <a href="{{url('/about')}}">關於我們</a>
            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                <a href="{{url('/lastnews')}}">最新資訊</a>
            </div>
            <div class="text-left px-4 pt-2 py-2 m-2 font_16 default-color">
                <div class="flex ">
                    <a class="inline-block font_16 default-color no-underline " href="javascript:void(0)">分店位置
                    </a>
                    <div class="inset-y-0 accordion_1 right-0 items-center px-2 text-gray-700" style="margin-left: 84px; ">
                        <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                    </div>
                </div>
                <div class="text-left px-5 font_16 default-color panel_1" style="display: none; padding-top:8px;">

                    <div class="text-left w-full px-4  m-2 font_16 default-color">
                        <div class="flex">
                            <a class="inline-block font_16 default-color no-underline" href="{{url('/branch-location?location=九龍')}}">九龍
                            </a>
                            <!-- <div class="inset-y-0 right-0 items-center px-2 text-gray-700" style="margin-left: 57px;">
                                <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                            </div> -->
                        </div>
                    </div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color">
                        <div class="flex">
                            <a class="inline-block font_16 default-color no-underline" href="{{url('/branch-location?location=新界')}}">新界
                            </a>
                            <!-- <div class="inset-y-0 right-0 items-center px-2 text-gray-700" style="margin-left: 57px;">
                                <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                            </div> -->
                        </div>
                    </div>
                    <div class="text-left w-full px-4 m-2 font_16 default-color">
                        <div class="flex accordion_2">
                            <a class="inline-block font_16 default-color no-underline" href="{{url('/branch-location?location=香港島')}}">新界區
                            </a>
                            <!-- <div class="inset-y-0 right-0 items-center px-2 text-gray-700" style="margin-left: 57px; ">
                                <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                            </div> -->
                        </div>
                        <!-- <div class="text-left px-5 font_16 default-color panel_2" style="display: none;">
                            <div class="text-left w-full px-2 m-2 font_16 default-color">
                                <a href="javascript:void(0)">分店</a>
                            </div>
                            <div class="text-left w-full px-2 m-2 font_16 default-color">
                                <a href="javascript:void(0)">分店</a>
                            </div>
                            <div class="text-left w-full px-2 m-2 font_16 default-color">
                                <a href="javascript:void(0)">分店</a>
                            </div>
                        </div> -->
                    </div>
                </div>

            </div>
            <div class="text-left flex px-4 py-2 m-2 font_16 default-color">
                <a class="inline-block font_16 default-color no-underline" href="{{url('/calc')}}">空間計算器
                </a>
                <img src="{{asset('images/header/icons8-crown-48.png')}}" class="ml-5 relative" style="margin-top: -5px;">
            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                <a href="{{url('/faq')}}">常見問題</a>
            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                <a href="{{url('/contact')}}">聯絡我們</a>
            </div>

            <div class="text-left px-4 py-2 m-2 font_16 default-color cursor-pointer">
                <!-- <a href="{{url('/')}}">Desktop Demo</a> -->
            </div>

            <div class="text-left px-4 py-2 m-2 font_16 default-color cursor-pointer">
                <!-- <a href="{{url('/backend')}}">Backend Demo</a> -->
            </div>

            <div class="flex text-left px-4 py-2 m-2 font_16 default-color">
                <?php
                if (session()->get('logged_in')) {
                ?>
                    <div class="text-left w-1/2 py-1 font_16 default-color">
                        <a class="inline-block font_16 default-color no-underline py-2" href="{{url('/account')}}" style="display: flex;">
                            <img class="mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">帳戶</span>
                        </a>
                    </div>
                    <div class="flex text-left w-1/2 py-1 font_16 default-color">
                        <a class="inbox new-msg flex-shrink-0 inline-block  font_16 default-color no-underline  py-2" href="{{url('/chatlist')}}" style="display: flex;">
                            <img class="" src="{{asset('images/header/icons8-secured-letter-40@2x.png')}}" />
                            <span class="self-center text-primary mx-2">
                                信息
                            </span>
                        </a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="text-left w-1/2 py-1 font_16 default-color">
                        <a class="inline-block font_16 default-color no-underline py-2" href="{{url('/login')}}" style="display: flex;">
                            <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">登入</span>
                        </a>
                    </div>
                    <div class="text-left w-1/2 py-1 font_16 default-color">
                        <a class=" inline-block  font_16 default-color no-underline  py-2" href="{{url('/register')}}" style="display: flex;">
                            <img class="mr-1" src="{{asset('images/header/icons8-join-50@2x.png')}}" />
                            <span class="self-center text-primary">
                                註冊
                            </span>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>