<nav class="w-full pin-t z-40 fixed top-0 text-primary" id="header">
    @include('partials.latest_news')
    <div class="bg-white flex items-center justify-between flex-wrap pr-10 py-5" style="background: rgba(255, 255, 255, 0.75); ">
        <div class="flex items-center flex-shrink-0 text-white" style="padding-left: 140px;">
            <a href="/"><img class="fill-current" width="140" height="70" src="{{asset('images/header/logo@2x.png')}}" /></a>
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

            <ul class="list-reset lg:flex lg:ml-0 justify-end flex-1 items-center font_15 source-han" style="z-index: 50;">

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn inline-block default-color no-underline py-2 px-2" href="{{url('/about')}}">關於我們</a>
                </li>

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn inline-block default-color no-underline  py-2 px-2" href="{{url('/lastnews')}}">最新資訊</a>
                </li>

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn default-color no-underline py-2 px-2" href="{{url('/branch-location')}}">分店位置</a>

                    <ul class="dropdown-content">
                        <?php $locations = App\Store::getLocations(); ?>
                        @foreach($locations as $location)
                        <li class="py-1">
                            <a class="block hover:text-purple-700 cursor-pointer font_15" href="{{url('/branch-location?location='.$location->location)}}">
                                {{$location->location}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="relative mr-1 md:mr-0 dropdown">
                    <a class="dropbtn crown inline-block default-color no-underline py-2 px-2" href="{{url('/calc')}}">空間計算器</a>
                </li>
                <li class="relative mr-1 md:mr-0 dropdown">
                    <a class="dropbtn inline-block default-color no-underline  py-2 px-2" href="{{url('/faq')}}">常見問題</a>
                </li>

                <li class="relative sm:mr-10 md:mr-15 lg:mr-20 dropdown">
                    <a class="dropbtn inline-block default-color no-underline  py-2 px-2" href="{{url('/contact')}}">聯絡我們</a>
                </li>

                <li class="relative mr-4 text-white font-thin">
                    <!-- <a href="{{url('/mobile')}}" class="bg-gray-500 px-3 py-px text-xs w-full">Mobile Demo</a><br /> -->
                    <a href="{{url('/backend')}}" class="bg-gray-700 px-3 py-px text-xs w-full robert-bold">Backend Demo</a><br />
                </li>

                <li class="relative mr-4">

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
                    <a href="https://wa.me/85251188503" class="flex">
                        <img class="fill-current inline-block" src="{{asset('images/header/icons8-whatsapp-50.png')}}" />
                        <span class="text-purple-1 font-bold text-xl my-auto ml-3 robert-black">5118 8503</span>
                    </a>
                </li>

                <?php
                if (Auth::check()) {
                ?>
                    <li class="mr-1 md:mr-0">
                        <a class="inline-block font_16 default-color no-underline py-2 px-2" href="{{url('/account')}}" style="display: flex;">
                            <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">帳戶</span>
                        </a>
                    </li>
                    <li class="mr-1 md:mr-0">
                        <?php
                        $hasMsg = Auth::user()->hasUnreadMsg();
                        ?>
                        <a class="{{$hasMsg ? 'inbox new-msg' : ' '}} inline-block font_16 default-color no-underline py-2 px-2" href="{{url('/chatlist')}}" style="display: flex;">
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