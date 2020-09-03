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
        <a href="/mobile"><img class="fill-current ml-20" width="90" height="45" src="{{asset('images/header/logo@2x.png')}}" id="default_log" /></a>
    </div>
    <div class="  text-white mx-auto">
        <a href="https://wa.me/85251188503">
            <img class="fill-current" id="phone_log" style="display: none;" src="{{asset('images/header/Component 7 – 1@2x.png')}}" />
        </a>
    </div>
    <div class="w-full flex-grow  hidden pt-6" id="nav-content">
        <div class="my-2 px-2">
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                關於我們
            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                最新資訊
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
                    <div class="text-left w-full px-4 m-2 font_16 default-color">
                        <div class="flex accordion_2">
                            <a class="inline-block font_16 default-color no-underline" href="javascript:void(0)">新界區
                            </a>
                            <div class="inset-y-0 right-0 items-center px-2 text-gray-700" style="margin-left: 57px; ">
                                <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="text-left px-5 font_16 default-color panel_2" style="display: none;">
                            <div class="text-left w-full px-2 m-2 font_16 default-color">
                                <a href="javascript:void(0)">分店</a>
                            </div>
                            <div class="text-left w-full px-2 m-2 font_16 default-color">
                                <a href="javascript:void(0)">分店</a>
                            </div>
                            <div class="text-left w-full px-2 m-2 font_16 default-color">
                                <a href="javascript:void(0)">分店</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color">
                        <div class="flex">
                            <a class="inline-block font_16 default-color no-underline" href="javascript:void(0)">新界區
                            </a>
                            <div class="inset-y-0 right-0 items-center px-2 text-gray-700" style="margin-left: 57px;">
                                <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color">
                        <div class="flex">
                            <a class="inline-block font_16 default-color no-underline" href="javascript:void(0)">新界區
                            </a>
                            <div class="inset-y-0 right-0 items-center px-2 text-gray-700" style="margin-left: 57px;">
                                <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-left flex px-4 py-2 m-2 font_16 default-color">
                <a class="inline-block font_16 default-color no-underline" href="javascript:void(0)">空間計算器
                </a>
                <img src="{{asset('images/header/icons8-crown-48.png')}}" class="ml-5 ">

            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                常見問題
            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                聯絡我們
            </div>

            <div class="text-left px-4 py-2 m-2 font_16 default-color cursor-pointer">
                <a href="{{url('/')}}">Desktop Demo</a>
            </div>

            <div class="text-left px-4 pt-2 m-2 font_16 default-color">
                <div class="flex accordion_2 cursor-pointer">
                    <a class="inline-block font_16 default-color no-underline " href="javascript:void(0)">Test
                    </a>
                    <div class="inset-y-0  right-0 items-center px-2 text-gray-700" style="margin-left: 122px; ">
                        <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a></div>
                </div>
                <div class="text-left px-5 font_16 default-color panel_2" style="display: none;">
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="/mobile">Home Page</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/location')}}">Branch Location</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/rentwarehouse')}}">Rent Ware House</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/calc')}}">Calculator</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/contact')}}">Contact Us</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/career')}}">Join Us</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/about')}}">About Us</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/faqq')}}">FAQ</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/lastnews')}}">Latest News</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/news')}}">News</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/login')}}">Login</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/register')}}">Register</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/forgetpwd')}}">Forget Password</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/account')}}">Account</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/chatroom')}}">Chat room</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/chatlist')}}">Chat list</a></div>
                    <div class="text-left w-full px-4  m-2 font_16 default-color"><a href="{{url('/mobile/booking')}}">Order Now</a></div>
                </div>

            </div>
            <div class="flex text-left px-4 py-2 m-2 font_16 default-color">
                <?php
                if (session()->get('logged_in')) {
                ?>
                <div class="text-left w-1/2 py-1 font_16 default-color">
                    <a class="inline-block font_16 default-color no-underline py-2" href="{{url('/mobile/account')}}" style="display: flex;">
                        <img class="mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                        <span class=" self-center text-primary">帳戶</span>
                    </a>
                </div>
                <div class="flex text-left w-1/2 py-1 font_16 default-color">
                    <a class="inbox new-msg flex-shrink-0 inline-block  font_16 default-color no-underline  py-2" href="{{url('/mobile/chatlist')}}" style="display: flex;">
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
                    <a class="inline-block font_16 default-color no-underline py-2" href="{{url('/mobile/login')}}" style="display: flex;">
                        <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                        <span class=" self-center text-primary">登入</span>
                    </a>
                </div>
                <div class="text-left w-1/2 py-1 font_16 default-color">
                    <a class=" inline-block  font_16 default-color no-underline  py-2" href="{{url('/mobile/register')}}" style="display: flex;">
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

        <!-- <ul class="list-reset  justify-end flex-1 items-center" style="z-index: 50;">

            <li class="mr-1 my-4">
                <a class="inline-block font_16 default-color no-underline  py-2 px-2" href="#">最新資訊</a>
            </li>
            <li class="mr-1 my-4 dropdown">
                <a class="dropbtn inline-block font_16 default-color no-underline  py-2 px-2" href="#">分店位置</a>
                <ul class="dropdown-content">
                    <li class="py-1">
                        <a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16">新界區</a>
                    </li>
                    <li class="py-1"><a class="block text-base uppercase hover:text-purple-700 cursor-pointer font_16">九龍區</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16">香港島</a></li>
                </ul>
            </li>
            <li class="mr-1 my-4 ">
                <a class=" font_16 default-color no-underline py-2 px-2" href="javascript:void(0)">空間計算器</a>

            </li>
            <li class=" relative mr-1 my-4">
                <img class=" absolute top-0 left-16" style="margin-top: -11px;" src="{{asset('images/header/icons8-crown-48.png')}}">
                <a class="inline-block font_16 default-color no-underline  py-2 px-2" href="javascript:void(0)">常見問題</a>
            </li>

            <li class="relative mr-1 my-4">
                <img src="{{asset('images/header/icons8-crown-48.png')}}" class=" absolute top-0 left-16" style="margin-top:-11px;">
                <a class="inline-block font_16 default-color no-underline  py-2 px-2" href="javascript:void(0)">聯絡我們</a>
            </li>

            <li class="mr-1 my-4 dropdown">
                <a class="dropbtn font_16 default-color no-underline py-2 px-2" href="javascript:void(0)">test</a>

                <ul class="dropdown-content">
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="/">Home Page</a></li>
                    <li class="py-1"><a class="block text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/location')}}">Branch Location</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/rentwarehouse')}}">Rent Ware House</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/calc')}}">Calculator</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/contact')}}">Contact Us</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/join')}}">Join Us</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/about')}}">About Us</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/faqq')}}">FAQ</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/lastnews')}}">Latest News</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/news')}}">News</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/login')}}">Login</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/register')}}">Register</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/forgetpwd')}}">Forget Password</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/account')}}">Account</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/chatroom')}}">Chat room</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/chatlist')}}">Chat list</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/booking')}}">Order Now</a></li>
                </ul>
            </li>

            <!-- <li class="mr-1 my-4 dropdown">
                <a class="dropbtn font_16 default-color no-underline py-2 px-2" href="javascript:void(0)"></a>

                <ul class="dropdown-content">
                    <li class="py-1">
                        <a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16">新界區</a>
                    </li>
                    <li class="py-1"><a class="block text-base uppercase hover:text-purple-700 cursor-pointer font_16">九龍區</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16">香港島</a></li>
                </ul>
            </li> -->
        <!-- <li class="mr-1 my-4">
                <img class="fill-current inline-block" src="{{asset('images/header/Component 7 – 1@2x.png')}}" />
            </li>
            <li class=" mr-1 my-4">
                <a class="inline-block font_16 default-color no-underline py-2 px-2" href="{{url('/login')}}" style="display: flex;">
                    <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                    <span class=" self-center text-primary">登入</span>
                </a>
            </li>
            <li class=" mr-1 my-4">
                <a class=" inline-block  font_16 default-color no-underline  py-2 px-2" href="{{url('/register')}}" style="display: flex;">
                    <img class="mr-1" src="{{asset('images/header/icons8-join-50@2x.png')}}" />
                    <span class="self-center text-primary">
                        註冊
                    </span>
                </a>
            </li>

        </ul>  -->
    </div>
</nav>