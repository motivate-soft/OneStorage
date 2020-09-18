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

                    <span class="w-auto mt-8 font_15 font-bold">
                        <a href="{{url('/joinus')}}">職位空缺</a>
                    </span>

                    <span class="mt-4 mb-8 font_15 font-bold">
                        <a href="{{url('/disclaimer')}}">免責聲明</a>
                    </span>

                    <p class="font_15">©2020 至尊迷你倉 | 版權所有</p>

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
                <?php
                $locations = App\LocationInfo::getAll();
                $count = count($locations);
                ?>
                <div class="flex mt-5">
                    <div class="w-1/2 mr-2">
                        @for($i = 0; $i < $count; $i +=2) 
                        <div class="font_13">
                            <div class="footer-accordion relative appearance-none items-center">
                                <div class="flex">
                                    <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                                    <span class="self-center text-primary">{{$locations[$i]['name']}}</span>
                                </div>
                            </div>
                            <div class="footer-panel">
                                @foreach($locations[$i]['items'] as $item)
                                <div class="flex mb-2">
                                    <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                                    <div class="leading-5 ">
                                        <p class="">電話 : <span>{{$item['phone']}}</span></p>
                                        <a href="{{'http://maps.google.com/?q='.$item['address']}}" target="_blank" rel="noopener noreferrer">
                                            地址 : {{$item['address']}}
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endfor
                </div>
                <div class="w-1/2 ml-2">
                    @for($i = 1; $i < $count; $i +=2) 
                        <div class="font_13">
                            <div class="footer-accordion relative appearance-none items-center">
                                <div class="flex">
                                    <img class="fill-current mr-4" src="{{asset('images/footer/Group 22.png')}}" />
                                    <span class="self-center text-primary">{{$locations[$i]['name']}}</span>
                                </div>
                            </div>
                            <div class="footer-panel">
                                @foreach($locations[$i]['items'] as $item)
                                <div class="flex mb-2">
                                    <img class="fill-current" style="height: 50px;" src="{{asset('images/footer/Artboard 1@72x-8@2x.png')}}" />
                                    <div class="leading-5 ">
                                        <p class="">電話 : <span>{{$item['phone']}}</span></p>
                                        <a href="{{'http://maps.google.com/?q='.$item['address']}}" target="_blank" rel="noopener noreferrer">
                                            地址 : {{$item['address']}}
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="grid grid-cols-2 mt-8">
                



            </div>
        </div>
        <div class="w-2/5" style="margin-left: 10px;">
            <h2 class="text-lg mt-4 mb-8 font-bold">最新資訊</h2>
            <div class="flex mt-2 pb-5">
                <img class="h-24 md:h-32 mx-auto md:mx-0 md:mr-4 object-none inline" src="{{asset('images/footer/Image 17@2x.png')}}">
                <span class="text-center md:text-left text-sm leading-4 font_13 inline">
                    黃竹坑新店快閃優惠　低至6折優惠
                    震撼筍價HK$300起即可入手<br>
                    <br>
                    黃竹坑分店全新開業，推出快閃驚喜優
                    ！顧客可享低至6折優惠，以震撼筍價
                    HK$300起即可入手！你仲唔快啲黎搵我
                    哋！！
                </span>
            </div>
            <div class="flex mt-2 pb-5">
                <img class="h-24 md:h-32 mx-auto md:mx-0 md:mr-4 object-none inline" src="{{asset('images/footer/Image 17@2x.png')}}">
                <span class="text-center md:text-left text-sm leading-4 font_13 inline">
                    黃竹坑新店快閃優惠　低至6折優惠
                    震撼筍價HK$300起即可入手<br>
                    <br>
                    黃竹坑分店全新開業，推出快閃驚喜優
                    ！顧客可享低至6折優惠，以震撼筍價
                    HK$300起即可入手！你仲唔快啲黎搵我
                    哋！！
                </span>
            </div>
            <div class="flex mt-2 pb-5">
                <img class="h-24 md:h-32 mx-auto md:mx-0 md:mr-4 object-none inline" src="{{asset('images/footer/Image 17@2x.png')}}">
                <span class="text-center md:text-left text-sm leading-4 font_13 inline">
                    黃竹坑新店快閃優惠　低至6折優惠
                    震撼筍價HK$300起即可入手<br>
                    <br>
                    黃竹坑分店全新開業，推出快閃驚喜優
                    ！顧客可享低至6折優惠，以震撼筍價
                    HK$300起即可入手！你仲唔快啲黎搵我
                    哋！！
                </span>
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