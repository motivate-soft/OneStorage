<nav class="flex items-center justify-between flex-wrap p-2 w-full pin-t z-50" style="background-color:#F6F6F6;">
    <div class="block w-1/3">
        <button id="nav-toggle" class="flex items-center px-3 py-2  rounded text-grey-900">
            <div class="ml-1" onclick="myFunction(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </button>
    </div>
    <div class="items-center text-white w-1/3" id="default_log">
        <a href="/"><img class="fill-current mx-auto" width="90" height="45" src="{{asset('images/header/logo@2x.png')}}" /></a>
    </div>
    <div class="text-white mx-auto">
        <a href="https://wa.me/85251188503" class="flex" id="phone_log" style="display: none;">
            <img class="fill-current inline-block" src="{{asset('images/header/icons8-whatsapp-50.png')}}" />
            <span class="text-purple-1 font-bold text-xl my-auto ml-3 robert-black">5118 8503</span>
        </a>
    </div>
    <div class="w-full flex-grow z-50  hidden pt-6" id="nav-content" style="background-color:#F6F6F6;">
        <div class="my-2 px-2">
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                <a href="{{route('pages.aboutUs')}}">{{ __('frontend_about.menuTitle') }}</a>
            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                <a href="{{route('pages.lastNews')}}">{{ __('frontend_latestNews.menuTitle') }}</a>
            </div>
            <div class="text-left px-4 pt-2 py-2 m-2 font_16 default-color">
                <div class="flex ">
                    <a class="inline-block font_16 default-color no-underline " href="{{route('pages.branchLocation')}}">{{ __('frontend_branchLocation.menuTitle') }}
                    </a>
                    <div class="inset-y-0 accordion_1 right-0 items-center px-2 text-gray-700" style="margin-left: 84px; ">
                        <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                    </div>
                </div>
                <div class="text-left px-5 font_16 default-color panel_1" style="display: none; padding-top:8px;">
                    <?php $locations = App\Store::getLocations(); ?>
                    @foreach($locations as $location)
                    <div class="text-left w-full px-4  m-2 font_16 default-color">
                        <div class="flex">
                            <a class="inline-block font_16 default-color no-underline" href="{{route('pages.branchLocation').'?location='.$location->location}}">
                                {{$location->location}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="text-left flex px-4 py-2 m-2 font_16 default-color">
                <a class="inline-block font_16 default-color no-underline" href="{{route('pages.calculator')}}">{{__('frontend_calculator.menuTitle')}}
                </a>
                <img src="{{asset('images/header/icons8-crown-48.png')}}" class="ml-5 relative" style="margin-top: -5px;">
            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                <a href="{{route('pages.faq')}}">{{__('frontend_faq.menuTitle')}}</a>
            </div>
            <div class="text-left px-4 py-2 m-2 font_16 default-color">
                <a href="{{route('pages.contactUs')}}">{{__('frontend_contact_us.menuTitle')}}</a>
            </div>

            <!-- <div class="text-left px-4 pt-2 py-2 m-2 font_16 default-color">
                <div class="flex ">
                    <a class="inline-block font_16 default-color no-underline " href="#">{{Helper::getLocalName()}}</a>
                    <div class="inset-y-0 accordion_1 right-0 items-center px-2 text-gray-700" style="margin-left: 84px; ">
                        <a href="javascript:void(0)"><i class="icon wb-chevron-down"></i></a>
                    </div>
                </div>
                <div class="text-left px-5 font_16 default-color panel_1" style="display: none; padding-top:8px;">

                    <div class="text-left w-full px-4  m-2 font_16 default-color">
                        <div class="flex">
                            <a class="inline-block font_16 default-color no-underline" href="{{url('locale/zh-CN')}}">
                                中文
                            </a>
                        </div>
                    </div>

                    <div class="text-left w-full px-4  m-2 font_16 default-color">
                        <div class="flex">
                            <a class="inline-block font_16 default-color no-underline" href="{{url('locale/en')}}">
                                English
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="flex text-left px-4 py-2 m-2 font_16 default-color">
                <?php
                if (Auth::check()) {
                ?>
                    <div class="text-left w-1/2 py-1 font_16 default-color">
                        <a class="inline-block font_16 default-color no-underline py-2" href="{{route('pages.account')}}" style="display: flex;">
                            <img class="mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">{{__('frontend_header.account')}}</span>
                        </a>
                    </div>
                    <div class="flex text-left w-1/2 py-1 font_16 default-color">
                        <?php
                        $hasMsg = Auth::user()->hasUnreadMsg();
                        ?>
                        <a class="{{$hasMsg ? 'inbox new-msg' : ' '}} flex-shrink-0 inline-block  font_16 default-color no-underline  py-2" href="{{route('pages.chatList')}}" style="display: flex;">
                            <img class="" src="{{asset('images/header/icons8-secured-letter-40@2x.png')}}" />
                            <span class="self-center text-primary mx-2">
                                {{__('frontend_header.information')}}
                            </span>
                        </a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="text-left w-1/2 py-1 font_16 default-color">
                        <a class="inline-block font_16 default-color no-underline py-2" href="{{route('login')}}" style="display: flex;">
                            <img class=" mr-1" src="{{asset('images/header/icons8-user-50@2x.png')}}" />
                            <span class=" self-center text-primary">{{__('frontend_login.menuTitle')}}</span>
                        </a>
                    </div>
                    <div class="text-left w-1/2 py-1 font_16 default-color">
                        <a class=" inline-block  font_16 default-color no-underline  py-2" href="{{route('register')}}" style="display: flex;">
                            <img class="mr-1" src="{{asset('images/header/icons8-join-50@2x.png')}}" />
                            <span class="self-center text-primary">
                                {{__('frontend_register.menuTitle')}}
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
