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
        border: 1px solid #888888;
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
        font-family: 'RobertRegular';
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

    .rentwarehouse-left {}

    .rentwarehouse-right {}

    .bg-yellow {
        background-color: #FABD02;
    }

    .rentwarehouse-toggle-item-icon {
        background-color: #B881FC;
        height: 22px;
        width: 22px;
        padding-top: 2px;

    }

    .rentwarehouse-table-item {
        cursor: pointer;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 10px;
        border: 1px solid #888;
        /* width: 80%; */
        max-width: 410px;

    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 20px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .rentwarehouse-modal {
        display: none;
        z-index: 50 !important;
        /* max-width:375px; */
    }

    .rentwarehouse-space-size-title {
        font-size: 14px;
    }

    .rentwarehouse-mode-select-item-title {
        font-size: 12px;
    }

    .rentwarehouse-price-select-item {
        font-size: 21px;
    }

    .rentwarehouse-select-result-card-title {
        font-size: 20px;
        background-color: #E0CBF6;
        color: #56628C;
    }
</style>
<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}" />

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
@if($store)


<div class="mx-auto w-3/5 pt-6">
    <p class="heading2 px-4 mb-3 overflo">{{$store->branch}}</p>
    <div class="flex">
        <div class="w-2/3 pb-8">
            <p class="text1 px-4 mb-2"><a href="#address-section">{{$store->address}}</a> </p>
            <div class="bg-white px-4 py-2">
                <?php
                $storeImages = $store->storeImages()->where('is_used', true)->get();
                ?>
                @if(count($storeImages))
                <div class="flex" style="height: 310px;">
                    <div class="w-4/5">
                        <iframe id="rentwarehouse-main-image" class="w-full h-full" src="{{$store->video_link ? $store->video_link : asset($storeImages[0]->image)}}"></iframe>
                    </div>

                    <div class="w-1/5 pl-1 flex flex-col overflow-y-scroll overflow-auto" style="max-height: 310px;">
                        @if($store->video_link)
                        <p class="text-center rentwarehouse-sub-image cursor-pointer mb-3" src="{{$store->video_link}}">Video</p>
                        @endif
                        @foreach($storeImages as $image)
                        <img class="rentwarehouse-sub-image cursor-pointer mb-2" src="{{asset($image->image)}}" />
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="mr-10 pb-4">
                    <div class="horz-line my-4"></div>
                    <p class="text1 pb-2">
                        詳細資料
                    </p>
                    <p class="text0 py-4 leading-normal">
                        <!-- 設備完善，提取簡便，環境清潔，光線充足，安全可靠。<br />
                        優質服務 優惠價格，適合儲存大小貨物及辦公室物品、生財工具、家居雜物、收藏精品、季節性服飾、健身器材及單車等等。<br />
                        多種面積，適合任何人仕使用。
                        <br/> -->
                        <?php echo nl2br($store->detail) ?>
                    </p>

                    <div class="flex rentwarehouse-toggle-item selection-none cursor-pointer py-2">
                        <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-down"></i></span>
                        <span class="text1 my-auto self-center pl-2">租用面積</span>
                    </div>

                    <div class="my-4">
                        <p class="mb-4 font-bold">以下是較受歡迎之尺寸：</p>
                        <div class="flex">
                            <div class="w-2/3">
                                <table style="font-family: 'RobertRegular';" class="text-center text0 w-full">
                                    <tr class="table-heading">
                                        <th class="py-2">租用面積<br />
                                            (平方尺)</th>
                                        <th>約數尺寸<br />
                                            (長x闊x高) </th>
                                        <th>原價</th>
                                        <th>會員價</th>
                                    </tr>
                                    @foreach($store->sizes as $size)
                                    @if($size->size)
                                    <tr class="border-b border-white bg-grey rentwarehouse-table-item">
                                        <td class="bg-yellow py-5">{{$size->size}}</td>
                                        <td>({{$size->width}}"x{{$size->height}}"x{{$size->depth}}")</td>
                                        <td><del>${{number_format($size->price)}}</del></td>
                                        <td><span class=" rounded bg-third px-2 py-1">${{number_format($size->prepaid_price)}}起</span></td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </table>
                            </div>
                            <div class="w-1/3 ml-4">
                                <p class="text0 mb-10  leading-normal">
                                    可放換季衣服, 兒童物件及玩具,書本
                                    參照圖片:
                                </p>
                                <img id="rentwarehouse-size-preview" src="{{asset('images/img_webbox.jpg')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="horz-line my-4"></div>

                    <div class="flex rentwarehouse-toggle-item selection-none cursor-pointer py-2" id="address-section">
                        <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-down"></i></span>
                        <span class="text1 my-auto self-center pl-2">地址</span>
                    </div>
                    <div class="my-4">
                        <p class="text-sm color-primary">地址:{{$store->address}}</p>
                        <div>
                            <p class="text-sm color-deep pt-8 py-2">開放時間</p>
                            <p class="text-sm color-primary"><?php echo nl2br($store->opening_hours) ?></p>
                            <p class="text-sm color-deep pt-8 py-2">參觀及繳費時間：敬請致電該分店預約或按右面</p>
                            <p class="text-sm color-primary py-1 mb-3 leading-none"><?php echo nl2br($store->text_above_addr) ?></p>
                            <!-- <p class="text-sm color-primary py-1">週六，早上10時至晚上5時。</p>
                            <p class="text-sm color-primary mb-3 py-1">星期日及假期，需於 1 天前預約參觀。</p> -->
                            <img class="rentware-middle-image pr-5 py-1" src="{{ asset('images/Image 7@2x.png') }}" />

                            <p class="text-sm color-deep pt-8 py-2">交通:</p>
                            <p class="text-sm color-primary py-1 leading-relaxed"><?php echo nl2br($store->text_below_addr) ?></p>
                            <!-- <p class="text-sm color-primary py-1">巴士線: 170, 171, 37B, 671, 69, 70, 973</p>
                            <p class="text-sm color-primary py-1">小巴線: 4A, 4B, 4C, 4M, 29, 29A, 36X, 59A, 59B, 69</p> -->
                        </div>
                    </div>

                    <div class="horz-line my-4"></div>

                    <div class="flex rentwarehouse-toggle-item selection-none cursor-pointer py-2">
                        <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-down"></i></span>
                        <span class="text1 my-auto self-center pl-2">最新優惠</span>
                    </div>
                    <div class="my-4">
                        <!-- <p class="text-sm color-primary">黃竹坑新店快閃優惠　低至6折優惠</p> -->
                        <!-- <img class="pr-20 mt-4 mb-10" src="{{ asset('images/Image 8@2x.png') }}" /> -->
                        @foreach($store->offerImages()->where('is_used', true)->get() as $image)
                        @if($image->is_used)
                        <img class="pr-20 my-4" src="{{asset('images/offers/'.$image->image)}}" />
                        @endif
                        @endforeach

                        <p class="text-sm color-deep py-1 leading-snug mt-6"><?php echo nl2br($store->latest_offer) ?></p>
                        <!-- <p class="text-sm color-deep py-1 leading-normal">黃竹坑新店快閃優惠　低至6折優惠</p> -->
                        <!-- <p class="text-sm color-deep py-1 leading-normal">震撼筍價HK$300起即可入手</p><br />
                        <p class="text-sm color-deep py-1 leading-normal">黃竹坑分店全新開業，推出快閃驚喜優惠！顧客可享低至6折優惠，以震撼筍價HK$300起即可入手！你仲唔快啲黎搵我哋！！</p>
                        <p class="text-sm color-deep py-1 leading-normal">*詳情請向職員查詢</p><br />
                        <p class="text-sm color-deep py-1 leading-normal">地址：黃竹坑道18號瑞琪工業大廈14樓A室</p>
                        <p class="text-sm color-deep py-1 leading-normal">=========================</p>
                        <p class="text-sm color-deep py-1 leading-normal">立即租倉</p>
                        <p class="text-sm color-deep py-1 leading-normal">客戶專線：2111-2636</p>
                        <p class="text-sm color-deep py-1 leading-normal">WhatsApp：https://bit.ly/2XWPFdJ</p>
                        <p class="text-sm color-deep py-1 leading-normal">網頁：https://bit.ly/2B2Raxy</p>
                        <p class="text-sm color-deep py-1 leading-normal">全港18間分店任你揀，預繳優惠低至$307，仲有免息分期添</p>
                        <p class="text-sm color-deep py-1 leading-normal">熱門地點：</p>
                        <p class="text-sm color-deep py-1 leading-normal">#柴灣｜#小西灣｜#黃竹坑｜#新蒲崗｜#葵涌｜#葵興｜#葵芳｜#荃灣｜#青衣｜#火炭｜#屯門</p>
                        <p class="text-sm color-deep py-1 leading-normal">#至尊迷你倉 #onestorage #迷你倉 #黃竹坑 #隆重開幕 #符合消防最新指引</p> -->

                    </div>

                    <div class="horz-line my-4"></div>

                    <div class="flex rentwarehouse-toggle-item selection-none cursor-pointer py-2">
                        <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                        <span class="text1 my-auto self-center pl-2">服務設施</span>
                    </div>
                    <div class="my-4 hidden">
                        <div class="px-4 grid grid-cols-2 col-gap-2 row-gap-4">
                            @if($store->serviceState(0))
                            <div class="flex">
                                <img src="{{asset('images/ic_key_card.png')}}" class="mr-2 object-none" />
                                <p class="text0 my-auto"><span class="font-bold">7 x 24</span>智能保安進出系統</p>
                            </div>
                            @endif
                            @if($store->serviceState(1))
                            <div class="flex">
                                <img src="{{asset('images/ic_air_con.png')}}" class="mr-2 object-none" />
                                <p class="text0 my-auto">無間斷恆溫空調</p>
                            </div>
                            @endif
                            @if($store->serviceState(2))
                            <div class="flex">
                                <img src="{{asset('images/ic_fire.png')}}" class="mr-2 object-none" />
                                <p class="text0 my-auto">消防裝置設備</p>
                            </div>
                            @endif
                            @if($store->serviceState(3))
                            <div class="flex">
                                <img src="{{asset('images/ic_delivery.png')}}" class="mr-2 object-none" />
                                <p class="text0 my-auto">鋁梯及手推車借用服務</p>
                            </div>
                            @endif
                            @if($store->serviceState(4))
                            <div class="flex">
                                <img src="{{asset('images/ic_water.png')}}" class="mr-2 object-none" />
                                <p class="text0 my-auto">自助飲用水機</p>
                            </div>
                            @endif
                            @if($store->serviceState(5))
                            <div class="flex">
                                <img src="{{asset('images/ic_sec_cam.png')}}" class="mr-2 object-none" />
                                <p class="text0 my-auto">全天候高清保安監察及警報系統</p>
                            </div>
                            @endif
                            @if($store->serviceState(6))
                            <div class="flex">
                                <img src="{{asset('images/ic_24_hours.png')}}" class="mr-2 object-none" />
                                <p class="text0 my-auto">24小時電話熱線服務</p>
                            </div>
                            @endif
                            @if($store->serviceState(7))
                            <div class="flex">
                                <img src="{{asset('images/ic_wifi.png')}}" class="mr-2 object-none" />
                                <p class="text0 my-auto">免費Wi-Fi</p>
                            </div>
                            @endif
                            @if($store->serviceState(8))
                            <div class="flex">
                                <img class="mr-2 object-none" src="{{ asset('images/icons8-secured-letter-40@2x.png') }}" />
                                <p class="text0 my-auto color-primary">信箱服務</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="horz-line my-4"></div>

                    <div class="flex rentwarehouse-toggle-item selection-none cursor-pointer py-2">
                        <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                        <span class="text1 my-auto self-center pl-2">附近設施 </span>
                    </div>
                    <div class="my-4 ml-4 hidden">
                        <div class="grid grid-cols-2 col-gap-6 row-gap-4">
                            @foreach($store->getNearbyFacilities() as $area)
                            <p class="text-sm color-deep">{{$area}}</p>
                            @endforeach
                        </div>
                        <!-- <div class="flex py-2">
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
                        </div> -->
                    </div>

                    <div class="horz-line my-4"></div>

                    <div class="flex rentwarehouse-toggle-item selection-none cursor-pointer py-2">
                        <span class="rentwarehouse-toggle-item-icon text-white px-1"><i class="icon wb-chevron-up"></i></span>
                        <span class="text1 my-auto self-center pl-2">常見問題</span>
                    </div>

                    <div class="my-4 hidden">
                        @foreach($store->questions as $question)
                        <div class="mb-4">
                            <p class="text-sm color-deep py-1 px-2">- {{$question->question}}</p>
                            <p class="text-sm color-deep py-1 pl-4"><?php echo nl2br($question->answer) ?></p>
                        </div>
                        @endforeach
                    </div>


                </div>

            </div>
        </div>
        <div class="w-1/3 mx-8 pb-8 rentwarehouse-right bg-grey top-4">
            <div class="sticky top-48">
                <p class="color-primary rentwarehouse-space-size-title pb-6">你需要多大的空間?</p>
                <div class="grid grid-cols-2 col-gap-2 row-gap-2">
                    @foreach($store->sizes as $key=>$size)
                    @if($size->size)
                    <div data-price="{{$size->price}}" data-size="{{$size->size}}" data-prepaid-price="{{$size->prepaid_price}}" class="rounded p-2 color-primary rentwarehouse-space-size-select cursor-pointer text-center <?= $key == 0 ? 'active' : '' ?>"><b>{{$size->size}}</b>平方呎</div>
                    @endif
                    @endforeach
                </div>

                <div class="flex pt-4">
                    <p class="rentwarehouse-size-select-description my-auto"><a target="_blank" href="{{url('/calc')}}">唔知自己需要咩size ? 試下我地既空間計算器</a></p>
                    <img class="object-none box-content pl-1 -mt-1" src="{{ asset('branchlocation/icons8-crown-48@2x.png') }}" />
                </div>

                <p class="color-primary rentwarehouse-space-size-title pt-4 pb-4">請選擇付費方式</p>
                <div class="grid grid-cols-2 col-gap-4 row-gap-2">
                    <div class="rentwarehouse-price-select cursor-pointer active">
                        <p class="color-primary rentwarehouse-mode-select-item-title pb-2">預繳12個月</p>
                        <div class="rounded p-2 color-primary rentwarehouse-price-select-item text-center">
                            <b>$</b><b class="price-content" id="prepaid-price-wrapper">---</b><b>/</b>月
                        </div>
                    </div>
                    <div class="rentwarehouse-price-select cursor-pointer">
                        <p class="color-primary rentwarehouse-mode-select-item-title pb-2">單月付款</p>
                        <div class="rounded p-2 color-primary rentwarehouse-price-select-item text-center">
                            <b>$</b><b class="price-content" id="price-wrapper">---</b><b>/</b>月
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <div class="border-t border-l border-r border-grey text-center font-bold rounded-t px-4 py-4 rentwarehouse-select-result-card-title">
                        月費
                    </div>
                    <div class="border-b border-l border-r border-grey rounded-b px-4 py-3 text-center">
                        <p class="rentwarehouse-price-select-result-card-content pt-3 pb-5 text-center">$<span class="selected-price">380</span></p>
                        <div class="px-5">
                            <p class="w-max-content rentwarehouse-price-select-result-card-footer-title color-primary">付費方式:</p>
                            <div class="w-max-content flex color-primary pb-2 pt-2">
                                <span class="rentwarehouse-price-select-result-card-footer-content color-deep my-auto mr-2">現金</span>
                                <img class="mx-1 object-none" src="{{ asset('images/Image 60@2x.png') }}" />
                                <img class="mx-1 object-none" src="{{ asset('images/Image 59@2x.png') }}" />
                                <img class="mx-1 object-none" src="{{ asset('images/Image 58@2x.png') }}" />
                                <img class="mx-1 object-none" src="{{ asset('images/fps_color_tc@2x.png') }}" />
                                <img class="mx-1 object-none" src="{{ asset('images/Intersection 41@2x.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <button id="modalTrigger" class="rounded-full w-full rentwarehouse-price-select-button py-2 my-2 color-primary">查詢/預約 </button>

                <p class="rentwarehouse-price-select-news-title color-primary my-2">最新資訊</p>
                <?php
                $lasted_news = App\Blog::orderBy('id', 'desc')->first();
                ?>
                <a class="flex pt-2" href="{{url('/news/'.$lasted_news->id)}}">
                    <img class="flex-shrink-0 h-32" src="{{asset($lasted_news->thumbnail)}}"/>
                    <span class="pl-3 color-deep overflow-y-hidden leading-relaxed font_13 h-32">
                        <?php echo nl2br($lasted_news->content) ?>
                    </span>
                </a>
            </div>


        </div>
    </div>
</div>
<?php
$user = Auth::user();
?>
<div id="confirmModal" class="z-50 modal">
    <div class="modal-content">
        <div class="text-center p-8">
            <p class="font_25 mb-8">多謝你的查詢</p>
            <p class="font_16 leading-normal">
                我們的客戶服務專員，<br />
                將會盡快與你聯絡。<br />
                立刻註冊成為會員可享更多優惠
            </p>

            <div class="flex justify-between mt-8">
                <a href="{{url('/register')}}" class="submit-btn hover:bg-purple-400 mr-4" id="confirmBtn">
                    註冊
                </a>
                <button class="cancel-btn ml-4" type="button" id="cancelBtn">
                    離開
                </button>
            </div>
        </div>

    </div>
</div>

<div id="bookingModal" class="z-50 modal">
    <div class="modal-content">

        <span class="close" id="modalClose">&times;</span>

        <div class=" bg-white w-96 mx-auto mt-2 mb-8 pt-2">

            <p class="text-center pt-4 mb-6 font-bold" style="font-size: 21px;">查詢/預約</p>

            <form class="px-8 pt-3" id="bookingForm" method="post" action="{{url('/enquiry')}}">
                @csrf
                <input type="hidden" name="page" value="{{$store->branch}}" required>
                <input type="hidden" name="branchName" value="{{$store->branch}}" required>
                <input type="hidden" name="branchSize" id="branchSize" required>
                <input type="hidden" name="price" id="storePrice" required>
                <input type="hidden" name="ajax" value="1" type="number">

                <p class=" font-bold mb-3" style="font-size: 25px;">{{$store->branch}} </p>

                <p class=" font-bold mb-3" style="font-size: 20px;"><span style="font-size: 25px" id="branchSizeTxt">12</span>平方呎 </p>

                <div role="alert" class="mb-2">
                    <div id="payment-method" class="text-center font-bold rounded-t px-4 py-2 mr-4 ml-4" style="font-size: 25px; background-color: #E0CBF6; color:#56628C">
                        月費
                    </div>
                    <div class="border border-t-0 rounded-b px-4 py-3 text-center mr-4 ml-4">
                        <p class="font-bold" style="font-size: 32px;color:#324A5E">$<span class="selected-price">---</span></p>
                    </div>
                </div>

                <p class="text-center text-grey mb-6">此價格只供參考</p>

                <div class="flex mb-4 w-full pt-6 border-t">
                    <div class="flex w-1/2 input-group">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                        @if(Auth::check())
                        <input class="w-full form-control" type="text" placeholder="姓" value="{{$user->first_name}}" name="firstName" required>
                        @else
                        <input class="w-full form-control" type="text" placeholder="姓" name="firstName" required>
                        @endif
                    </div>
                    <div class="w-1/2 flex input-group">
                        @if(Auth::check())
                        <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名" value="{{$user->last_name}}" name="lastName" required>
                        @else
                        <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名" name="lastName" required>
                        @endif

                    </div>
                </div>


                <div class="input-group mb-3">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                    @if(Auth::check())
                    <input class="form-control" type="text" placeholder="電話號碼" value="{{$user->email}}" name="email">
                    @else
                    <input class="form-control" type="text" placeholder="電話號碼" name="email">
                    @endif
                </div>

                <div class="w-full inline-block relative mb-4">
                    <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="question" id="question-selector">
                        <option value="" selected>查詢問題</option>
                        <option value="我想預約參觀。">我想預約參觀。</option>
                        <option value="我想預留迷你倉。">我想預留迷你倉。</option>
                        <option value="我想續約/或繳款。">我想續約/或繳款。</option>
                        <option value="其他">其他</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>

                <div class="w-full pb-3 border-b hidden" id="message-wrapper">
                    <textarea class="w-full border placeholder-gray-600 px-3 py-2 border-gray-200" style="padding: 16px 8px 16px 16px;color:#76838f" type="text" placeholder="你的信息" rows="1" name="message"></textarea>
                </div>

                <div class=" w-full mt-3 md:flex md:items-center mb-4">
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        <input class="mr-2 rounded border-gray-400" type="checkbox">
                        <span class="text-sm">
                            要運輸
                        </span>
                    </label>
                </div>

                <button class="submit-btn hover:bg-purple-400" type="submit">
                    送出
                </button>

                <div class=" flex py-2 mt-2 border-t">
                    <div class="w-2/5">
                        <p class=" text-center font-bold" style="font-size: 21px;color: #988F9A">分享</p>
                    </div>
                    <div class="w-2/5 flex">
                        <img class="img-links pr-1 object-none" src="{{asset('images/contactUs/icons8-facebook-50@2x.png')}}" alt="facebook">
                        <img class="img-links pr-1 object-none" src="{{asset('images/contactUs/icons8-instagram-50.png')}}" alt="instagram">
                        <img class="img-links pr-1 object-none" src="{{asset('images/contactUs/icons8-whatsapp-50.png')}}" alt="whatsapp">
                        <img class="img-links pr-1 object-none" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="email">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@else
<div class="text-center text-4xl py-36">
    No data
</div>

@endif

@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.RentwareHouse();
    });
</script>
@endsection