@extends('layouts.app')

@section('title')
<title>{{__('Rent Ware House')}}</title>
@endsection

@section('styles')

<style>
    .bg-hero {
        background-image: url(images/bg_hero1.jpg);
        background-repeat: no-repeat;
        background-position: bottom right;
        min-height: 520px;
    }

    .page-title {
        font-size: 61px;
        position: relative;
        font-weight: bold;
    }

    .page-title:before {
        content: '';
        position: absolute;
        width: 97%;
        height: 88px;
        bottom: 30px;
        z-index: -1;
        left: -10px;
        background-color: #E0CBF6;
    }

    .page-desc {
        font-size: 26px;
        font-weight: bold;
        color: #B2B5BD;
    }

    .heading1 {
        font-size: 24px;
        color: white;
    }

    .heading2 {
        font-size: 30px;
        color: #4D5567;
    }

    .box-shadow {
        position: relative;
        z-index: 10;
    }

    .box-shadow:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-color: #FABD02;
        bottom: -18px;
        left: 18px;
    }

    .box-shadow1 {
        position: relative;
        z-index: 10;
    }

    .box-shadow1:before {
        content: '';
        position: absolute;
        width: 130%;
        height: 100%;
        z-index: -1;
        background-color: #FABD02;
        top: 15px;
        left: -15%;
    }

    .text0 {
        font-size: 14px;
        color: #4D5567;
    }

    .text1 {
        font-size: 16px;
        color: #4D5567;
    }

    .text2 {
        /* 19px */
        font-size: 19px;
        color: #4D5567;
    }

    .text3 {
        font-size: 20px;
        color: white
    }

    .text4 {
        /* 21px */
        font-size: 21px;
        color: #4D5567;
    }

    .text-name {
        font-size: 17px;
        color: #AFAFAF;
    }

    .score-lg {
        display: flex;
        font-size: 28px;
        font-weight: bold;
        background-color: #FABD02;
        border-radius: 9999px;
        color: #56628C;
        width: 62px;
        height: 62px;
    }

    .score-base {
        display: flex;
        font-size: 22px;
        font-weight: bold;
        background-color: #FABD02;
        border-radius: 9999px;
        color: #56628C;
        width: 52px;
        height: 52px;
    }

    .button-primary {
        font-size: 18px;
        border-radius: 0.3rem;
        color: #56628C;
        background-color: #E0CBF6;
        padding-left: 18px;
        padding-right: 18px;
    }

    main {
        margin-left: auto;
        margin-right: auto;
        max-width: 1336px;
        overflow-x: hidden
    }

    .yellow-shadow {
        box-shadow: 10px 15px #FABD02;
    }

    .yellow-shadow1 {
        box-shadow: 18px 18px #FABD02;
    }

    .contact-icon {
        width: 20px;
        height: 20px;
    }

    .horz-line {
        height: 1px;
        background-color: #E8EAEF;
    }

    .table-heading {
        font-size: 13px;
        color: white;
        background-color: #56628C;
    }

    .bg-third {
        background-color: #28E8DB;
    }

    .color-primary {
        color: #4D5567;
    }

    .color-deep {
        color: #5D6475;
        /* font-weight:600; */
    }

    .rentwarehouse-space-size-select {
        background-color: white;
        font-size: 15px;
        border: 1px solid gray;
    }

    .rentwarehouse-space-size-select.active {
        background-color: #E0CBF6;
        font-size: 15px;
        border: none;
    }

    .rentwarehouse-size-select-description {
        font-size: 13px;
        color: #B881FD;
    }

    .rentwarehouse-price-select p {
        color: #4D5567;
        font-size: 12px;
    }

    .rentwarehouse-price-select div.rentwarehouse-price-select-item {
        background-color: white;
        color: #4D5567;
        border: 1px solid gray;
    }

    .rentwarehouse-price-select.active p {
        color: #B881FD;
        font-size: 12px;
    }

    .rentwarehouse-price-select.active div.rentwarehouse-price-select-item {
        background-color: #E0CBF6;
        color: #4D5567;
        border: none;
    }

    .rentwarehouse-price-select-result-card-title {
        font-size: 19px;
        background: #E0CBF6;
    }

    .rentwarehouse-price-select-result-card-content {
        font-size: 32px;
    }

    .rentwarehouse-price-select-result-card-footer-title {
        font-size: 12px;
    }

    .rentwarehouse-price-select-result-card-footer-content {
        font-size: 14px;
    }

    .rentwarehouse-price-select-button {
        background-color: #28E8DB;
        font-size: 19px;
    }

    .rentwarehouse-price-select-news-title {
        font-size: 21px;
    }

    .rentwarehouse-price-select-news-image {
        width: 127px;
        height: 127px;
    }

    .rentwarehouse-price-select-news-content {
        height: 127px;
    }

    .rentwarehouse-left {
        max-width: 620px;
    }

    .rentwarehouse-right {
        max-width: 340px;
    }

    .bg-yellow {
        background-color: #FABD02;
    }

    .rentwarehouse-toggle-item-icon {
        background-color: #B881FC;
    }
</style>
<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}" />

@endsection

@section('content')
<div class="grid grid-cols-12 px-56">
    <div class="col-start-1 col-span-8 py-8 rentwarehouse-left">
        <p class="heading2 px-4 mb-1">黃竹坑(瑞琪分店)</p>
        <p class="text1 px-4 mb-2">香港仔, 香港島南區</p>
        <div class="bg-white px-4 py-2">
            <div class="flex">
                <img class="w-4/5" src="{{asset('images/img_rentvideo.jpg')}}" />
                <div class="w-1/5 pl-1 grid grid-cols-1 row-gap-2 overflow-y-scroll overflow-auto" style="max-height: 310px;">
                    <img class="" src="{{asset('images/th_1.jpg')}}" />
                    <img class="" src="{{asset('images/th_1.jpg')}}" />
                    <img class="" src="{{asset('images/th_1.jpg')}}" />
                    <img class="" src="{{asset('images/th_1.jpg')}}" />
                    <img class="" src="{{asset('images/th_1.jpg')}}" />
                    <img class="" src="{{asset('images/th_1.jpg')}}" />
                </div>
            </div>
            <div class="mr-10">
                <div class="horz-line my-4"></div>
                <p class="text1 pb-2">
                    詳細資料
                </p>
                <p class="text0 py-4">
                    設備完善，提取簡便，環境清潔，光線充足，安全可靠。<br />
                    優質服務 優惠價格，適合儲存大小貨物及辦公室物品、生財工具、家居雜物、收藏精品、季節性服飾、健身器材及單車等等。<br />
                    多種面積，適合任何人仕使用。
                </p>

                <div class="flex rentwarehouse-toggle-item selection-none cursor-pointer mb-8 pt-8">
                    <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                    <span class="text1 my-auto self-center pl-2">租用面積</span>
                </div>

                <div class="flex mb-4">
                    <div class="w-2/3">
                        <table style="width:100%" class="text-center text0">
                            <tr class="table-heading">
                                <th class="py-2">租用面積<br />
                                    (平方尺)</th>
                                <th>約數尺寸<br />
                                    (長x闊x高) </th>
                                <th>原價</th>
                                <th>會員價</th>
                            </tr>
                            <tr class="border-b border-white bg-grey">
                                <td class="bg-yellow py-2 ">14</td>
                                <td>(3"x4'5"x3'4")</td>
                                <td><del>$642</del></td>
                                <td><span class=" rounded bg-third px-2 py-1">$385起</span></td>
                            </tr>
                            <tr class="border-b border-white bg-grey">
                                <td class="bg-yellow py-2 ">18</td>
                                <td>(4'6"x4'1"x6'7")</td>
                                <td><del>$1,764</del></td>
                                <td><span class=" rounded bg-third px-2 py-1">$1,058起</span></td>
                            </tr>
                            <tr class="border-b border-white bg-grey">
                                <td class="bg-yellow py-2 ">26</td>
                                <td>(5'1"x5'2"x6'7")</td>
                                <td><del>$2,288</del></td>
                                <td><span class=" rounded bg-third px-2 py-1">$1,373起</span></td>
                            </tr>
                            <tr class="border-b border-white bg-grey">
                                <td class="bg-yellow py-2 ">48</td>
                                <td>(9'10"x4'10"x6'7")</td>
                                <td><del>$3,840</del></td>
                                <td><span class=" rounded bg-third px-2 py-1">$2,304起</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-1/3 ml-4">
                        <p class="text0 mb-10">
                            可放換季衣服, 兒童物件及玩具,書本
                            參照圖片:
                        </p>
                        <img src="{{asset('images/img_webbox.jpg')}}" />
                    </div>
                </div>
                <div class="horz-line my-4"></div>

                <div class="flex mb-8 rentwarehouse-toggle-item selection-none cursor-pointer pt-8">
                    <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                    <span class="text1 my-auto self-center pl-2">地址</span>
                </div>
                <div>
                    <p class="text-sm color-primary">地址:黃竹坑道18號瑞琪工業大廈14樓A室</p>
                    <div>
                        <p class="text-sm color-deep pt-8">開放時間</p>
                        <p class="text-sm color-primary">全年24小時開放。</p>
                        <p class="text-sm color-deep pt-8">辦公時間</p>
                        <p class="text-sm color-primary">週一至週五，早上10時至晚上7時。</p>
                        <p class="text-sm color-primary">週六，早上10時至晚上5時。</p>
                        <p class="text-sm color-primary">星期日及假期，需於 1 天前預約參觀。</p>
                        <img class="rentware-middle-image pr-5" src="{{ asset('images/Image 7@2x.png') }}" />

                        <p class="text-sm color-deep pt-8">交通:</p>
                        <p class="text-sm color-primary">地鐵: 黃竹坑 (B 出口)</p>
                        <p class="text-sm color-primary">巴士線: 170, 171, 37B, 671, 69, 70, 973</p>
                        <p class="text-sm color-primary">小巴線: 4A, 4B, 4C, 4M, 29, 29A, 36X, 59A, 59B, 69</p>
                    </div>
                </div>
                <div class="flex mb-8 rentwarehouse-toggle-item selection-none cursor-pointer pt-8">
                    <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                    <span class="text1 my-auto self-center pl-2">最新優惠</span>
                </div>
                <div>
                    <p class="text-sm color-primary">黃竹坑新店快閃優惠　低至6折優惠</p>
                    <img class="pr-20 mt-10 mb-10" src="{{ asset('images/Image 8@2x.png') }}" />

                    <p class="text-sm color-deep">黃竹坑新店快閃優惠　低至6折優惠</p>
                    <p class="text-sm color-deep">震撼筍價HK$300起即可入手</p><br />
                    <p class="text-sm color-deep">黃竹坑分店全新開業，推出快閃驚喜優惠！顧客可享低至6折優惠，以震撼筍價HK$300起即可入手！你仲唔快啲黎搵我哋！！</p>
                    <p class="text-sm color-deep">*詳情請向職員查詢</p><br />
                    <p class="text-sm color-deep">地址：黃竹坑道18號瑞琪工業大廈14樓A室</p>
                    <p class="text-sm color-deep">=========================</p>
                    <p class="text-sm color-deep">立即租倉</p>
                    <p class="text-sm color-deep">客戶專線：2111-2636</p>
                    <p class="text-sm color-deep">WhatsApp：https://bit.ly/2XWPFdJ</p>
                    <p class="text-sm color-deep">網頁：https://bit.ly/2B2Raxy</p>
                    <p class="text-sm color-deep">全港18間分店任你揀，預繳優惠低至$307，仲有免息分期添</p>
                    <p class="text-sm color-deep">熱門地點：</p>
                    <p class="text-sm color-deep">#柴灣｜#小西灣｜#黃竹坑｜#新蒲崗｜#葵涌｜#葵興｜#葵芳｜#荃灣｜#青衣｜#火炭｜#屯門</p>
                    <p class="text-sm color-deep">#至尊迷你倉 #onestorage #迷你倉 #黃竹坑 #隆重開幕 #符合消防最新指引</p>

                </div>

                <div class="flex mb-8 rentwarehouse-toggle-item selection-none cursor-pointer pt-8">
                    <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                    <span class="text1 my-auto self-center pl-2">服務設施</span>
                </div>
                <div>
                    <div class="flex py-2">
                        <div class="w-2/5">
                            <div class="flex">
                                <img class="w-6 mr-3 object-contain" src="{{ asset('images/005-key-card@2x.png') }}" />
                                <p class="text-sm color-primary">7 x 24智能保安進出系統</p>
                            </div>
                        </div>
                        <div class="w-3/5">
                            <div class="flex">
                                <img class="w-6 mr-3 object-contain" src="{{ asset('images/002-air-conditioner@2x.png') }}" />
                                <p class="text-sm color-primary">無間斷恆溫空調</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex py-2">
                        <div class="w-2/5">
                            <div class="flex">
                                <img class="w-4 mr-5 object-contain" src="{{ asset('images/007-fire-extinguisher@2x.png') }}" />
                                <p class="text-sm color-primary">消防裝置設備</p>
                            </div>
                        </div>
                        <div class="w-3/5">
                            <div class="flex">
                                <img class="w-6 mr-3 object-contain" src="{{ asset('images/001-delivery@2x.png') }}" />
                                <p class="text-sm color-primary">鋁梯及手推車借用服務</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex py-2">
                        <div class="w-2/5">
                            <div class="flex">
                                <img class="w-6 mr-3 object-contain" src="{{ asset('images/008-water-machine@2x.png') }}" />
                                <p class="text-sm color-primary">自助飲用水機</p>
                            </div>
                        </div>
                        <div class="w-3/5">
                            <div class="flex">
                                <img class="w-6 mr-3 object-contain" src="{{ asset('images/006-security-camera@2x.png') }}" />
                                <p class="text-sm color-primary">全天候高清保安監察及警報系統</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex py-2">
                        <div class="w-2/5">
                            <div class="flex">
                                <img class="w-6 mr-3 object-contain" src="{{ asset('images/009-24-hours@2x.png') }}" />
                                <p class="text-sm color-primary">24小時電話熱線服務</p>
                            </div>
                        </div>
                        <div class="w-3/5">
                            <div class="flex">
                                <img class="w-6 mr-3 object-contain" src="{{ asset('images/003-wifi@2x.png') }}" />
                                <p class="text-sm color-primary">免費Wi-Fi</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex py-2">
                        <div class="w-2/5">
                            <div class="flex">
                                <img class="w-4 mr-5 object-contain" src="{{ asset('images/icons8-secured-letter-40@2x.png') }}" />
                                <p class="text-sm color-primary">信箱服務</p>
                            </div>
                        </div>
                        <div class="w-3/5"></div>
                    </div>
                </div>

                <div class="horz-line my-4"></div>

                <div class="flex mb-8 rentwarehouse-toggle-item selection-none cursor-pointer pt-8">
                    <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                    <span class="text1 my-auto self-center pl-2">附近設施</span>
                </div>
                <div>
                    <div class="flex py-2">
                        <div class="w-1/2">
                            <p class="text-sm color-deep">香葉道休憩處</p>
                        </div>
                        <div class="w-1/2">
                            <p class="text-sm color-deep">南朗山道熟食市場</p>
                        </div>
                    </div>
                    <div class="flex py-2">
                        <div class="w-1/2">
                            <p class="text-sm color-deep">香港仔警署</p>
                        </div>
                        <div class="w-1/2">
                            <p class="text-sm color-deep">香港仔網球及壁球中心網球場</p>
                        </div>
                    </div>
                </div>

                <div class="flex mb-8 rentwarehouse-toggle-item selection-none cursor-pointer pt-8">
                    <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                    <span class="text1 my-auto self-center pl-2">附近設施</span>
                </div>

                <div>
                    <p class="text-sm color-deep py-1">- 問題?</p>
                    <p class="text-sm color-deep py-1">- 答案。</p>
                </div>


            </div>

        </div>
    </div>
    <div class="col-start-9 col-span-4 py-8 rentwarehouse-right">
        <p class="color-primary pt-8 pb-4">你需要多大的空間?</p>
        <div class="grid grid-cols-2 col-gap-2 row-gap-2">
            <div class="rounded p-2 color-primary rentwarehouse-space-size-select cursor-pointer text-center active"><b>14</b>平方呎</div>
            <div class="rounded p-2 color-primary rentwarehouse-space-size-select cursor-pointer text-center"><b>18</b>平方呎</div>
            <div class="rounded p-2 color-primary rentwarehouse-space-size-select cursor-pointer text-center"><b>26</b>平方呎</div>
            <div class="rounded p-2 color-primary rentwarehouse-space-size-select cursor-pointer text-center"><b>48</b>平方呎</div>
        </div>

        <div class="flex pt-4">
            <p class="rentwarehouse-size-select-description">唔知自己需要咩size ? 試下我地既空間計算器</p>
            <img class="w-4 h-4 box-content pl-3" src="{{ asset('branchlocation/icons8-crown-48@2x.png') }}" />
        </div>

        <p class="color-primary pt-4 pb-4">你需要多大的空間?</p>
        <div class="grid grid-cols-2 col-gap-4 row-gap-2">
            <div class="rentwarehouse-price-select cursor-pointer active">
                <p class="color-primary pb-2">預繳12個月</p>
                <div class="rounded p-2 color-primary rentwarehouse-price-select-item text-center"><b>$380/</b>月</div>
            </div>
            <div class="rentwarehouse-price-select cursor-pointer">
                <p class="color-primary pb-2">單月付款</p>
                <div class="rounded p-2 color-primary rentwarehouse-price-select-item text-center"><b>$385/</b>月</div>
            </div>
        </div>
        <div class="my-4">
            <div class="border-t border-l border-r border-gray-600 text-center font-bold rounded-t px-4 py-4" style="font-size: 20px; background-color: #E0CBF6; color:#56628C">
                月費
            </div>
            <div class="border-b border-l border-r border-gray-600 rounded-b px-4 py-3 text-center">
                <p class="rentwarehouse-price-select-result-card-content pt-3 pb-5 text-center">$385</p>
                <div class="w-max-content mx-auto">
                    <p class="w-max-content rentwarehouse-price-select-result-card-footer-title color-primary">付費方式:</p>
                    <div class="w-max-content flex color-primary pb-2 pt-2">
                        <p class="rentwarehouse-price-select-result-card-footer-content color-deep">現金</p>
                        <img class="mx-1" src="{{ asset('images/Image 60@2x.png') }}" />
                        <img class="mx-1" src="{{ asset('images/Image 59@2x.png') }}" />
                        <img class="mx-1" src="{{ asset('images/Image 58@2x.png') }}" />
                        <img class="mx-1" src="{{ asset('images/fps_color_tc@2x.png') }}" />
                    </div>
                </div>
            </div>
        </div>
    
        <button class="rounded-full w-full rentwarehouse-price-select-button py-2 my-2 color-primary">立即預訂</button>

        <p class="rentwarehouse-price-select-news-title color-primary mb-2">最新資訊</p>

        <div class="flex">
            <img class="flex-shrink-0 rentwarehouse-price-select-news-image" src="{{ asset('images/Image 8@2x.png') }}" />
            <p class="rentwarehouse-price-select-news-content px-2 color-deep overflow-y-hidden">黃竹坑新店快閃優惠　低至6折優惠
                震撼筍價HK$300起即可入手
                黃竹坑分店全新開業，推出快閃驚喜優惠！顧客可享低至6折優惠，以震撼筍價HK$300起即可入手！你仲唔快啲黎搵我哋！！
                *詳情請向職員查詢
                地址：黃竹坑道18號瑞琪工業大廈14樓A室
            </p>
        </div>

    </div>
</div>

@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('scripts')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
    $(".rentwarehouse-toggle-item").click(function() {
        $(this).next().toggle();

        if ($(this).next().css("display") == "none") {
            $(this).find("i").removeClass("wb-chevron-up");
            $(this).find("i").addClass("wb-chevron-down");
        } else {
            $(this).find("i").removeClass("wb-chevron-down");
            $(this).find("i").addClass("wb-chevron-up");
        }
    })

    var sizes = document.getElementsByClassName("rentwarehouse-space-size-select");

    for (var i = 0; i < sizes.length; i++) {

        sizes[i].addEventListener("click", function(event) {

            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");

            this.className += " active";

            console.log(event);

        });
    }

    var prices = document.getElementsByClassName("rentwarehouse-price-select");

    for (var i = 0; i < prices.length; i++) {

        prices[i].addEventListener("click", function(event) {

            var current = document.getElementsByClassName("active");

            current[1].className = current[1].className.replace(" active", "");

            this.className += " active";

            if (this.childNodes[1].innerHTML == "預繳12個月") {
                this.parentNode.nextSibling.nextSibling.childNodes[3].innerHTML = "$380";
            } else {
                this.parentNode.nextSibling.nextSibling.childNodes[3].innerHTML = "$385";
            }


        });
    }
</script>
@endsection