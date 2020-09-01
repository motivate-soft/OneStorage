<nav class="w-full pin-t z-50 fixed text-primary">
    @include('partials.latest_news')
    <div class="bg-white flex items-center justify-between flex-wrap p-2" style="background: rgba(255, 255, 255, 0.75); ">
        <div class="flex items-center flex-shrink-0 text-white ">
            <a href="/"><img class="fill-current ml-12" width="90" height="45" src="{{asset('images/header/logo@2x.png')}}" /></a>
        </div>
        <div class="block lg:hidden">
            <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-grey hover:border-black">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden pt-6 lg:pt-0" id="nav-content">

            <ul class="list-reset lg:flex lg:ml-0 justify-end flex-1 items-center font-16" style="z-index: 50;">

                <li class="mr-1 md:mr-0">
                    <a class="inline-block default-color no-underline  py-2 px-2" href="#">最新資訊</a>
                </li>

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn default-color no-underline py-2 px-2" href="javascript:void(0)">分店位置</a>

                    <ul class="dropdown-content">
                        <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16">新界區</a></li>
                        <li class="py-1"><a class="block text-base uppercase hover:text-purple-700 cursor-pointer font_16">九龍區</a></li>
                        <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16">香港島</a></li>
                    </ul>
                </li>
                <li class="mr-1 md:mr-0 dropdown">
                    <a class="default-color no-underline py-2 px-2" href="#">空間計算器</a>
                </li>
                <li class=" relative mr-1 md:mr-0">
                    <img class=" absolute top-0 left-16" style="margin-top: -11px;" src="{{asset('images/header/icons8-crown-48.png')}}">
                    <a class="inline-block default-color no-underline  py-2 px-2" href="javascript:void(0)">常見問題</a>
                </li>

                <li class="relative sm:mr-10 md:mr-15 lg:mr-20">
                    <img src="{{asset('images/header/icons8-crown-48.png')}}" class=" absolute top-0 left-16" style="margin-top:-11px;">
                    <a class="inline-block default-color no-underline  py-2 px-2" href="javascript:void(0)">聯絡我們</a>
                </li>

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn default-color no-underline py-2 px-2" href="javascript:void(0)">test</a>

                    <ul class="dropdown-content">
                        <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="/">Home Page</a></li>
                        <li class="py-1"><a class="block text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/location')}}">Branch Location</a></li>
                        <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/rentwarehouse')}}">Rent Ware House</a></li>
                        <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/calc')}}">Calculator</a></li>
                        <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/contact')}}">Contact Us</a></li>
                        <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/career')}}">Join Us</a></li>
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

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn font_16 default-color no-underline py-2 px-2" href="javascript:void(0)"></a>

                    <ul class="dropdown-content">
                        <li class="py-1">
                            <a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16">新界區</a>
                        </li>
                        <li class="py-1"><a class="block text-base uppercase hover:text-purple-700 cursor-pointer font_16">九龍區</a></li>
                        <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16">香港島</a></li>
                    </ul>
                </li>
                <li class="sm:mr-5 md:mr-10 lg:mr-15">
                    <img class="fill-current inline-block" src="{{asset('images/header/Component 7 – 1@2x.png')}}" />
                </li>

                <?php
                if (session()->get('logged_in')) {
                ?>
                    <li class="mr-1 md:mr-0">
                        <a class="inline-block font_16 default-color no-underline py-2 px-2" href="{{url('/account')}}" style="display: flex;">
                            <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">帳戶</span>
                        </a>
                    </li>
                    <li class="mr-1 md:mr-0">
                        <a class="inbox new-msg inline-block font_16 default-color no-underline py-2 px-2" href="{{url('/chatlist')}}" style="display: flex;">
                            <img class="mr-1" src="{{asset('images/header/icons8-secured-letter-40@2x.png')}}" />
                            <span class="self-center text-primary">
                                信息
                            </span>
                        </a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="mr-1 md:mr-0">
                        <a class="inline-block font_16 default-color no-underline py-2 px-2" href="{{url('/login')}}" style="display: flex;">
                            <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">登入</span>
                        </a>
                    </li>
                    <li class="mr-1 md:mr-0">
                        <a class=" inline-block  font_16 default-color no-underline  py-2 px-2" href="{{url('/register')}}" style="display: flex;">
                            <img class="mr-1" src="{{asset('images/header/icons8-join-50@2x.png')}}" />
                            <span class="self-center text-primary">
                                註冊
                            </span>
                        </a>
                    </li>

                <?php
                }
                ?>



            </ul>
        </div>
    </div>

</nav>