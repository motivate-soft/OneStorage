<footer class="w-full static pt-4 bottom-0" style="background-color: #F0F0F0;">
    <div class="pb-5 mx-5">
        <div class="grid ">
            <div class="flex flex-col">
                <h2 class="font_15 mt-4 mb-8 font-bold">關於至尊迷你倉</h2>
                <div class="text-justify mb-4 leading-5 font_13">為金朝陽集團屬下業務(股票代號： 00878.HK)。
                    <br><br>
                    分店遍佈港、九及新界，更積極不斷擴充業務，旗下迷你倉全部合乎消防處規格，為客戶提供優質的儲存環境及專業的服務。
                    <br><br>
                    至尊迷你倉是亞洲迷你倉商會(SSAA)及香港迷你倉總會會員(HKMSA)。
                </div>
                <span class="w-auto my-8 font_15 font-bold">
                        <a href="{{url('/joinus')}}">職位空缺</a> | <a href="{{url('/disclaimer')}}">免責聲明</a>
                    </span>
                <p class="font_15">©2020 至尊迷你倉 版權所有</p>
            </div>
            <div class="mt-12">
                <h2 class="font_15 mb-8 font-bold">最新資訊</h2>
                <?php
                $latest_news = App\Blog::getNewses(3);
                ?>
                @foreach($latest_news as $news)
                    <a class="flex mb-5" href="{{url('/news/'.$news->id)}}">
                        <img class="h-32 w-32 mr-4 object-cover" src="{{asset($news->thumbnail)}}">
                        <span class="h-32 break-all leading-4 font_13 overflow-y-hidden robert-black" style="width: calc(100% - 8rem)">
                        <?php echo nl2br($news->content) ?>
                    </span>
                    </a>
                @endforeach
            </div>
            <div>
                <div class="mt-2">
                    <h2 class="font_15 mt-4 mb-8 font-bold">聯絡我們</h2>
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
                            <span class="self-center text-primary">查看分店地址</span>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1  mt-8 z-10">
                    <p class="font_18 pl-10 pb-3">香港島</p>
                    <?php
                    $locations = App\LocationInfo::getHongKong();
                    ?>
                    @each('partials.location_info1', $locations, 'location')

                    <p class="font_18 pl-10 pb-3 pt-5">九龍</p>
                    <?php
                    $locations = App\LocationInfo::getKowloon();
                    ?>
                    @each('partials.location_info1', $locations, 'location')

                    <p class="font_18 pl-10 pb-3 pt-5">新界</p>
                    <?php
                    $locations = App\LocationInfo::getNew();
                    ?>
                    @each('partials.location_info1', $locations, 'location')
                    <!-- <div>
                        <div class="footer-accordion relative appearance-none items-center">
                            <div class="flex font_13">
                                <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                                <span class="self-center text-primary"></span>
                            </div>
                        </div>
                        <div class="panel flex">
                            <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                            <div class=" leading-5 ">
                                <p class="font_13">
                                    電話 : <span></span>
                                </p>
                                <a href="mailto:cs@onestorage.com.hk" class="font_13">
                                    電郵 : <span></span>
                                </a>
                                <p class="font_13">
                                    <a href="{{'http://maps.google.com/?q='}}" target="_blank" rel="noopener noreferrer">
                                        地址 :
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div> -->


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
