<nav class="flex items-center justify-between flex-wrap bg-white p-2 w-full pin-t z-50">
    
<div class="block">
        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-grey hover:border-black">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>
    <div class="flex-0 items-center  text-white " style="margin-right:123px">
        <a href="/"><img class="fill-current ml-12" width="90" height="45" src="{{asset('images/header/logo@2x.png')}}" /></a>
    </div>
    <div class="w-full flex-grow  hidden pt-6 lg:pt-0" id="nav-content">

        <ul class="list-reset  justify-end flex-1 items-center" style="z-index: 50;">

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
                    <li class="py-1"><a class="block text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/location')}}">Branch Location</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/rentwarehouse')}}">Rent Ware House</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/calc')}}">Calculator</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/contact')}}">Contact Us</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/join')}}">Join Us</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/about')}}">About Us</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/faqq')}}">FAQ</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/lastnews')}}">Latest News</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/news')}}">News</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/login')}}">Login</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/register')}}">Register</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/forgetpwd')}}">Forget Password</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/account')}}">Account</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/chatroom')}}">Chat room</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/chatlist')}}">Chat list</a></li>
                    <li class="py-1"><a class="block  text-base uppercase hover:text-purple-700 cursor-pointer font_16" href="{{url('/mobile/booking')}}">Order Now</a></li>
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
            <li class="mr-1 my-4">
                <img class="fill-current inline-block" src="{{asset('images/header/Component 7 – 1@2x.png')}}" />
            </li>
            <li class=" mr-1 my-4">
                <a class="inline-block font_16 default-color no-underline py-2 px-2" href="{{url('/mobile/login')}}" style="display: flex;">
                    <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                    <span class=" self-center text-primary">登入</span>
                </a>
            </li>
            <li class=" mr-1 my-4">
                <a class=" inline-block  font_16 default-color no-underline  py-2 px-2" href="{{url('/mobile/register')}}" style="display: flex;">
                    <img class="mr-1" src="{{asset('images/header/icons8-join-50@2x.png')}}" />
                    <span class="self-center text-primary">
                        註冊
                    </span>
                </a>
            </li>

        </ul>
    </div>
</nav>