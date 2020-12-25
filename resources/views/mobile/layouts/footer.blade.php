<footer class="w-full static pt-4 bottom-0" style="background-color: #F0F0F0;">
    <div class="pb-5 mx-5">
        <div class="grid ">
            <div class="flex flex-col">
                <h2 class="font_15 mt-4 mb-8 font-bold">{{__('frontend_footer.aboutSupreme')}}</h2>
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
            <div class="mt-12">
                <h2 class="font_15 mb-8 font-bold">{{__('frontend_footer.latestNewsAccount')}}</h2>
                <?php
                $latest_news = App\Blog::getNewses(3);
                $count = count($latest_news);
                ?>
                @foreach($latest_news as $index => $news)
                    <a href="{{route('pages.news', $news->_id)}}" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                        <img class="h-24 w-24 ml-0 mb-4" src="{{asset($news->thumbnail)}}">
                        <div class="text-left px-3 font_17" style="width: calc(100% - 6rem)">
                            <p class="truncate font-bold leading-relaxed mb-1">{!! $news->title !!}</p>
                            <p class="leading-normal break-all news-short-content pt-1" >
                                <?php //echo nl2br($news->content) ?>
                                {!! strip_tags(mb_strimwidth($news->content, 0, 250, "...")) !!}
                            </p>
                        </div>
                    </a>
                    @if($index != $count - 1)
                    <div class="rounded-lg  px-2">
                        <hr>
                    </div>
                    @endif
                @endforeach
            </div>
            <div>
                <div class="mt-2">
                    <h2 class="font_15 mt-4 mb-8 font-bold">{{__('frontend_footer.contactUs')}}</h2>
                    <div class="grid grid-cols-6 gap-4 font_13 ml-1">
                        <a href="tel: 852-21112636" target="_blank" class="flex col-span-6 ">
                            <img class="fill-current mr-4" src="{{asset('images/footer/icons8-phone-50@2x.png')}}" />
                            <span class="self-center text-primary">(852) 2111 2636</span>
                        </a>
                        <a href="mailto:cs@onestorage.com.hk" target="_blank" class="flex col-span-6 mailto">
                            <img class="fill-current mr-4" src="{{asset('images/footer/icons8-email-open-50@2x.png')}}" />
                            <span class="self-center text-primary">cs@onestorage.com.hk</span>
                        </a>
                        <a href="https://wa.me/85251188503" target="_blank" class="flex col-span-6 ">
                            <img class="fill-current mr-4" src="{{asset('images/footer/icons8-whatsapp-50@2x.png')}}" />
                            <span class="self-center text-primary">(852) 5118 8503</span>
                        </a>
                        <div class="flex col-span-6 ">
                            <img class="fill-current mr-4" src="{{asset('images/footer/icons8-home-50@2x.png')}}" />
                            <span class="self-center text-primary">{{__('frontend_footer.viewBranchAddress')}}</span>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1  mt-8 z-10">
                    <p class="font_18 pl-10 pb-3">{{__('frontend_contact_us.hkMiniStorage')}}</p>
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

                    <p class="font_18 pl-10 pb-3 pt-5">{{__('frontend_contact_us.kowloonMiniStorage')}}</p>
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

                    <p class="font_18 pl-10 pb-3 pt-5">{{__('frontend_contact_us.newTerritoriesMiniStorage')}}</p>
                    <?php
                    if(Session::has('locale') && Session::get('locale') == "en") {
                        $locations = App\LocationInfo::getNewEN();
                    }
                    else {
                        $locations = App\LocationInfo::getNewCH();
                    }
                    ?>
                    @each('partials.location_info1', $locations, 'location')

                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    var acc = document.getElementsByClassName("footer-accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            // this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                panel.style.border = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                // panel.style.border = "1px solid #DCDCDC";
            }
        });
    }
</script>
