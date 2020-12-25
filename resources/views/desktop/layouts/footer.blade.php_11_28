<footer class="w-full static py-10 bottom-0" style="background-color: #F0F0F0;">
    <div class="section">
        <div class="flex">
            <div style="margin-right: 30px;" class="w-1/3">
                <div class="flex flex-col">
                    <h2 class="text-lg mt-4 mb-8 font-bold">{{__('frontend_footer.aboutSupreme')}}</h2>
                    <div class="text-justify mb-4 leading-5 font_13">{{__('frontend_footer.business')}}
                        <br><br>
                        {{__('frontend_footer.withBranches')}}
                        <br><br>
                        {{__('frontend_footer.supremeMiniStorage')}}
                    </div>
                    <span class="w-auto my-8 font_15 font-bold">
                        <a href="{{route('pages.joinUs')}}">{{__('frontend_footer.vacancies')}}</a> | <a href="{{route('pages.disclaimer')}}">{{__('frontend_footer.disclaimer')}}</a>
                    </span>
                    <p class="font_15">{{__('frontend_footer.copyright')}}</p>
                </div>
            </div>
            <div class="px-2 w-1/2">
                <h2 class="text-lg mt-4 mb-8 font-bold">{{__('frontend_footer.contactUs')}}</h2>
                <div class="font_13 mb-6">
                    <a class="inline-block" href="tel: 852-21112636" target="_blank">
                        <img class="mr-4 inline" src="{{asset('images/footer/icons8-phone-50@2x.png')}}" alt="Phone" />
                        <span class="self-center text-primary">(852) 2111 2636</span>
                    </a>
                </div>
                <div class="font_13 mb-6">
                    <a class="inline-block mailto" href="mailto:cs@onestorage.com.hk" target="_blank">
                        <img class="mr-4 inline" src="{{asset('images/footer/icons8-email-open-50@2x.png')}}" alt="Email"/>
                        <span class="self-center text-primary">cs@onestorage.com.hk</span>
                    </a>
                </div>
                <div class="font_13 mb-6">
                    <a class="inline-block" href="https://wa.me/85251188503" target="_blank">
                        <img class="mr-4 inline" src="{{asset('images/footer/icons8-whatsapp-50@2x.png')}}" alt="WhatsApp"/>
                        <span class="self-center text-primary">(852) 5118 8503</span>
                    </a>
                </div>
                <div class="font_13 mb-8">
                    <a class="inline-block">
                        <img class="mr-4 inline" src="{{asset('images/footer/icons8-home-50@2x.png')}}" alt="Home"/>
                        <span class="self-center text-primary">{{__('frontend_footer.viewBranchAddress')}}</span>
                    </a>
                </div>

                <div class="mx-2">
                    <div class="flex">
                        <div class="grid grid-cols-2">
                            <div class="col-span-1">
                                <p class="font_19 pl-10 pb-3">{{__('frontend_contact_us.hkMiniStorage')}}</p>
                                <?php
                                use Illuminate\Support\Facades\Session;
                                $locations = null;
                                if(Session::has('locale') && Session::get('locale') == "en") {
                                    $locations = App\LocationInfo::getHongKongEN();
                                }
                                else {
                                    $locations = App\LocationInfo::getHongKongCH();
                                }
                                ?>
                                @each('partials.location_info1', $locations, 'location')
                            </div>

                            <div class="col-span-1">
                                <p class="font_19 pl-10 pb-3">{{__('frontend_contact_us.kowloonMiniStorage')}}</p>
                                <?php
                                $locations = null;
                                if(Session::has('locale') && Session::get('locale') == "en") {
                                    $locations = App\LocationInfo::getKowloonEN();
                                }
                                else {
                                    $locations = App\LocationInfo::getKowloonCH();
                                }

                                ?>
                                @each('partials.location_info1', $locations, 'location')
                            </div>
                        </div>
                    </div>

                    <p class="font_19 pl-10 pb-3 mt-6">{{__('frontend_contact_us.newTerritoriesMiniStorage')}}</p>
                    <div class="grid grid-cols-2">
                        <?php

                        $locations = null;

                        if(Session::has('locale') && Session::get('locale') == "en") {
                            $locations = App\LocationInfo::getNewEN();
                        }
                        else {
                            $locations = App\LocationInfo::getNewCH();
                        }

                        $even = array_filter($locations, function ($input) {
                            return !($input & 1);
                        }, ARRAY_FILTER_USE_KEY);
                        $odd = array_filter($locations, function ($input) {
                            return $input & 1;
                        }, ARRAY_FILTER_USE_KEY);
                        ?>
                        <div class="col-span-1">
                            @each('partials.location_info1', $even, 'location')
                        </div>

                        <div class="col-span-1">
                            @each('partials.location_info1', $odd, 'location')
                        </div>
                    </div>

                </div>



            </div>
            <div class="w-2/5 ml-3">
                <h2 class="text-lg mt-4 mb-8 font-bold">{{__('frontend_footer.latestNewsAccount')}}</h2>
                <?php
                $latest_news = App\Blog::getNewses(3);
                ?>
                @foreach($latest_news as $news)
                <a class="flex mb-5" href="{{route('pages.news', $news->_id)}}">
                    <img class="h-32 w-32 mr-4 object-cover" src="{{asset($news->thumbnail)}}">
                    <span class="h-32 break-all leading-4 font_13 overflow-y-hidden robert-black" style="width: calc(100% - 8rem)">
                        <?php echo nl2br($news->content) ?>
                    </span>
                </a>
                @endforeach
            </div>
        </div>

    </div>
</footer>

<script>
    var acc = document.getElementsByClassName("footer-accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                panel.style.border = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>
