<footer class="w-full static pt-10 bottom-0" style="background-color: #F0F0F0;">
    <div class="pb-5 mx-auto w-3/5">
        <!-- <div class="grid lg:grid-cols-3 lg:gap-4 sm:grid-cols-1 sm:min-w-full"> -->
        <div class="flex">
            <div style="margin-right: 30px;" class="w-2/5">
                <div class="flex flex-col mt-2">
                    <!-- <h2 class=" text-lg my-8 font_15">關於 <b>One Storage.</b></h2> -->
                    <h2 class="text-lg mt-4 mb-8  font-bold">關於至尊迷你倉</h2>
                    <div class=" text-justify my-4 leading-5 font_13">為金朝陽集團屬下業務(股票代號： 00878.HK)。
                        <br><br>
                        分店遍佈港、九及新界，更積極不斷擴充業務，旗下迷你倉全部合乎消防處規格，為客戶提供優質的儲存環境及專業的服務。
                        <br><br>
                        至尊迷你倉是亞洲迷你倉商會(SSAA及香港迷你倉總會會員(HKMSA)。
                    </div>

                    <span class="w-auto my-8 font_15 font-bold">
                        <a href="{{url('/joinus')}}">職位空缺</a> | <a href="{{url('/disclaimer')}}">免責聲明</a>
                    </span>



                    <p class="font_15">©2020 至尊迷你倉 版權所有</p>

                </div>
            </div>
            <div class="px-2">
                <div class="">
                    <h2 class="text-lg mt-4 mb-8 font-bold">聯絡我們</h2>
                    <div class="grid grid-cols-6 gap-4 font_13 ml-1">
                        <a class="flex col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2..." href="Tel: 852-21112636">
                            <img class="fill-current mr-4" src="{{asset('images/footer/icons8-phone-50@2x.png')}}" />
                            <span class="self-center text-primary">(852) 2111 2636</span>
                        </a>
                        <a class="flex col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2..." href="mailto:cs@onestorage.com.hk">
                            <img class="fill-current mr-4" src="{{asset('images/footer/icons8-email-open-50@2x.png')}}" />
                            <span class="self-center text-primary">cs@onestorage.com.hk</span>
                        </a>
                        <a class="flex col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2..." href="https://wa.me/85251188503">
                            <img class="fill-current mr-4" src="{{asset('images/footer/icons8-whatsapp-50@2x.png')}}" />
                            <span class="self-center text-primary">(852) 5118 8503</span>
                        </a>
                        <a class="flex mt-3 col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2...">
                            <img class="fill-current mr-4" src="{{asset('images/footer/icons8-home-50@2x.png')}}" />
                            <span class="self-center text-primary">查看分店地址</span>
                        </a>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="grid grid-cols-2 mt-8">
                        <div class="col-span-1">
                            <p class="font_19 pl-10 pb-3">香港島</p>
                            <?php
                            $locations = App\LocationInfo::getHongKong();
                            ?>
                            @each('partials.location_info', $locations, 'location')
                        </div>

                        <div class="col-span-1">
                            <p class="font_19 pl-10 pb-3">九龍</p>
                            <?php
                            $locations = App\LocationInfo::getKowloon();
                            ?>
                            @each('partials.location_info', $locations, 'location')
                        </div>
                    </div>

                    <p class="font_19 pl-10 pb-3 mt-4">新界</p>
                    <div class="grid grid-cols-2">
                        <?php
                        $locations = App\LocationInfo::getNew();
                        $even = array_filter($locations, function ($input) {
                            return !($input & 1);
                        }, ARRAY_FILTER_USE_KEY);
                        $odd = array_filter($locations, function ($input) {
                            return $input & 1;
                        }, ARRAY_FILTER_USE_KEY);
                        ?>
                        <div class="col-span-1">
                            @each('partials.location_info', $even, 'location')
                        </div>

                        <div class="col-span-1">
                            @each('partials.location_info', $odd, 'location')
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-2/5" style="margin-left: 10px;">
                <h2 class="text-lg mt-4 mb-8 font-bold">最新資訊</h2>
                <?php
                $lasted_news = App\Blog::orderBy('id', 'desc')->take(3)->get();
                ?>
                @foreach($lasted_news as $news)
                <a class="flex mt-2 mb-5" href="{{url('/news/'.$news->id)}}">
                    <img class="h-32 w-32 mx-auto md:mx-0 md:mr-4 object-cover inline" src="{{asset($news->thumbnail)}}">
                    <span class="h-24 md:h-32 text-center md:text-left text-sm leading-4 font_13 inline overflow-y-hidden robert-black">
                        <?php echo nl2br($news->content) ?>
                    </span>
                </a>
                @endforeach
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