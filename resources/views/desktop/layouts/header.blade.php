<nav class="w-full pin-t z-40 fixed top-0 text-primary" id="header">
    @include('partials.latest_news')
    <div class="bg-white flex items-center justify-between flex-wrap pr-10 py-5" style="background: rgba(255, 255, 255, 0.75); ">
        <div class="flex items-center flex-shrink-0 text-white pl-20 xl:pl-36">
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
            <ul class="pl-20 xl:pl-36 list-reset flex flex-col md:flex-row lg:ml-0 lg:justify-end justify-between flex-1 items-center font_15 source-han" style="z-index: 50;">

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn inline-block default-color no-underline py-2 px-2" href="{{route('pages.aboutUs')}}">{{ __('frontend_about.menuTitle') }}</a>
                </li>

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn inline-block default-color no-underline  py-2 px-2" href="{{route('pages.lastNews')}}">{{ __('frontend_latestNews.menuTitle') }}</a>
                </li>

                <li class="mr-1 md:mr-0 dropdown">
                    <a class="dropbtn inline-block default-color no-underline py-2 px-2" href="{{route('pages.branchLocation')}}">{{ __('frontend_branchLocation.menuTitle') }}</a>

                    <ul class="dropdown-content">
                        <?php $locations = App\Store::getLocations(); ?>
                        @foreach($locations as $location)
                        <li class="py-1">
                            <a class="block hover:text-purple-700 cursor-pointer font_15" href="{{route('pages.branchLocation').'?location='.$location->location}}">
                                {{$location->location}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="relative mr-1 md:mr-0 dropdown">
                    <a class="dropbtn crown inline-block default-color no-underline py-2 px-2" href="{{route('pages.calculator')}}">{{__('frontend_calculator.menuTitle')}}</a>
                </li>
                <li class="relative mr-1 md:mr-0 dropdown">
                    <a class="dropbtn inline-block default-color no-underline  py-2 px-2" href="{{route('pages.faq')}}">{{__('frontend_faq.menuTitle')}}</a>
                </li>

                <li class="relative mr-0 md:mr-8 dropdown">
                    <a class="dropbtn inline-block default-color no-underline  py-2 px-2" href="{{route('pages.contactUs')}}">{{__('frontend_contact_us.menuTitle')}}</a>
                </li>


                <li class="sm:mr-5 md:mr-10 lg:mr-15">
                    <a href="https://wa.me/85251188503" target="_blank" class="flex">
                        <img class="fill-current inline-block" src="{{asset('images/header/icons8-whatsapp-50.png')}}" />
                        <span class="text-purple-1 font-bold text-xl my-auto ml-3 robert-black">5118 8503</span>
                    </a>
                </li>
                <div class="flex">
                    <li class="mr-1 md:mr-0 dropdown my-auto">
                        <a class="dropbtn inline-block default-color no-underline py-2 px-2" href="#">
                            {{Helper::getLocalName()}}
                        </a>
                        <ul class="dropdown-content">
                            <li class="py-1">
                                <a class="block hover:text-purple-700 cursor-pointer font_15" href="{{url('locale/zh-CN')}}">
                                    Chinese
                                </a>
                                <a class="block hover:text-purple-700 cursor-pointer font_15" href="{{url('locale/en')}}">
                                    English
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    if (Auth::check()) {
                    ?>
                    <li class="mr-1 md:mr-0">
                        <a class="inline-block font_16 default-color no-underline py-2 px-2" href="{{route('pages.account')}}" style="display: flex;">
                            <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">{{__('frontend_header.account')}}</span>
                        </a>
                    </li>
                    <li class="mr-1 md:mr-0">
                        <?php
                        $hasMsg = Auth::user()->hasUnreadMsg();
                        ?>
                        <a class="{{$hasMsg ? 'inbox new-msg' : ' '}} inline-block font_16 default-color no-underline py-2 px-2" href="{{route('pages.chatList')}}" style="display: flex;">
                            <img class="mr-1" src="{{asset('images/header/icons8-secured-letter-40@2x.png')}}" />
                            <span class="self-center text-primary">
                                        {{__('frontend_header.information')}}
                                    </span>
                        </a>
                    </li>
                    <?php
                    } else {
                    ?>
                    <li class="mr-1 md:mr-0">
                        <a class="inline-block font_16 default-color no-underline py-2 px-2" href="{{route('login')}}" style="display: flex;">
                            <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">{{__('frontend_login.menuTitle')}}</span>
                        </a>
                    </li>
                    <li class="mr-1 md:mr-0">
                        <a class=" inline-block  font_16 default-color no-underline  py-2 px-2" href="{{route('register')}}" style="display: flex;">
                            <img class="mr-1" src="{{asset('images/header/icons8-join-50@2x.png')}}" />
                            <span class="self-center text-primary">
                                        {{__('frontend_register.menuTitle')}}
                                    </span>
                        </a>
                    </li>

                    <?php
                    }
                    ?>
                </div>
            </ul>
        </div>
    </div>

</nav>
