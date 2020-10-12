@extends('layouts.app')

@section('title')
    @if($store)
        <title>{{__('迷你倉 | '. $store->branch .' | 至尊迷你倉 One Storage')}}</title>
    @else
        <title>{{__('迷你倉 | 至尊迷你倉 One Storage')}}</title>
    @endif
@endsection

@section('styles')
<style>


    .text0-m {
        font-size: 14px;
        color: #4D5567;
    }

    .text1-m {
        font-size: 15px;
        font-weight: 600;
        color: #4D5567;
    }

    main {
        margin-left: auto;
        margin-right: auto;
        /* max-width: 375px; */
        overflow-x: hidden;
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
        font-size: 17px;
        border: 1px solid gray;
    }

    .rentwarehouse-space-size-select.active {
        background-color: #E0CBF6;
        font-size: 17px;
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

    .rentwarehouse-price-select div.rentwarehouse-price-select-item-m {
        background-color: white;
        color: #4D5567;
        border: 1px solid gray;
    }

    .rentwarehouse-price-select.active p {
        color: #B881FD;
        font-size: 12px;
    }

    .rentwarehouse-price-select.active div.rentwarehouse-price-select-item-m {
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

    .rentwarehouse-mobile-order-button {
        background-color: #28E8DB;
    }

    .rentwarehouse-modal-title-m {
        font-size: 14px;
    }

    .rentwarehouse-space-size-select {
        font-size: 17px;
    }

    .rentwarehouse-size-select-description-m {
        font-size: 13px;
    }

    .rentwarehouse-size-select-item-m {
        font-size: 12px;
    }

    .rentwarehouse-space-size-title-m {
        font-size: 14px;
    }

    .rentwarehouse-mode-select-item-title-m {
        font-size: 12px;
    }

    .rentwarehouse-price-select-item-m {
        font-size: 21px;
    }

    .rentwarehouse-select-result-card-title-m {
        font-size: 20px;
        background-color: #E0CBF6;
        color: #56628C;
    }

    .rentwarehouse-space-size-title-m {
        font-size: 14px;
    }

    .rentwarehouse-space-size-select {
        font-size: 17px;
    }

    .rentwarehouse-size-select-description-m {
        font-size: 13px;
        color: #B881FD;
    }

    .rentwarehouse-price-select-item-m {
        font-size: 17px;
    }

    .rentwarehouse-content-title-1 {
        font-weight: 600;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 10px;
        border: 1px solid #888;
        /* width: 80%; */
        max-width: 350px;
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

    .store-image.active {
        display: block;
    }

    .store-image {
        display: none;
    }
</style>
<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}" />
@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
@if($store != null)
<div class="pb-4">
    <div class="relative items-center">

        <?php
        $storeImages = $store->storeImages()->where('is_used', true)->get();
        $count = count($storeImages);
        ?>

        <div id="rentwarehouse-main-image" class="w-full">
            @if($store->video_link)
            <iframe class="w-full h-full store-image" src="{{$store->video_link}}"></iframe>
            @endif
            @foreach($storeImages as $image)
            <img src="{{asset($image->image)}}" class="object-fill w-full h-full store-image" />
            @endforeach

        </div>

        @if($count)
        <div class="absolute flex w-full h-full left-0 top-0 items-center">
            <p class="flex justify-between p-2 z-10 w-full">
                <i class="flex icon wb-dropleft position-absolute left-0 rounded-full cursor-pointer bg-gray-600 text-white"></i>
                <i class="flex icon wb-dropright position-absolute right-0 rounded-full cursor-pointer bg-gray-600 text-white"></i>
            </p>
        </div>
        @endif
    </div>

    <p class="text1-m pt-8 pb-2 pl-4">
        詳細資料
    </p>
    <p class="text0-m py-4 px-4 leading-normal">
        <!-- 設備完善，提取簡便，環境清潔，光線充足，安全可靠。<br />
        優質服務 優惠價格，適合儲存大小貨物及辦公室物品、生財工具、家居雜物、收藏精品、季節性服飾、健身器材及單車等等。<br />
        多種面積，適合任何人仕使用。 -->
        <?php echo nl2br($store->detail) ?>
    </p>
    <div class="fixed bottom-0 flex justify-start z-10 w-full" style="margin-bottom: 5px; max-width: 600px">
        <div class="bg-white shadow-lg py-1 px-3 w-full">
            <div class="rentwarehouse-toggle-item py-2 cursor-pointer text-center"><i class="icon wb-chevron-up"></i></div>
            <div class="hidden">
                <p class="color-primary rentwarehouse-space-size-title-m pt-0 pb-4">你需要多大的空間?</p>
                <div class="grid grid-cols-2 col-gap-4 row-gap-2">
                    @foreach($store->sizes as $key=>$size)
                    <div data-price="{{$size->price}}" data-size="{{$size->size}}" data-prepaid-price="{{$size->prepaid_price}}" class="rounded p-2 color-primary rentwarehouse-space-size-select cursor-pointer text-center <?= $key == 0 ? 'active' : '' ?>"><b>{{$size->size}}</b>平方呎</div>
                    @endforeach
                </div>

                <div class="flex pt-4">
                    <a target="_blank" href="{{url('/calc')}}" class="rentwarehouse-size-select-description-m my-auto">唔知自己需要咩size ? 試下我地既空間計算器</a>
                    <img class="object-none box-content pl-1 -mt-1" src="{{ asset('branchlocation/icons8-crown-48@2x.png') }}" />
                </div>

                <p class="color-primary rentwarehouse-space-size-title-m pt-4 pb-4">請選擇付費方式</p>
                <div class="grid grid-cols-2 col-gap-4 row-gap-2">
                    <div class="rentwarehouse-price-select cursor-pointer">
                        <p class="color-primary rentwarehouse-mode-select-item-title pb-2">預繳12個月</p>
                        <div class="rounded p-2 color-primary rentwarehouse-price-select-item-m text-center">
                            <b>$</b><b class="price-content" id="prepaid-price-wrapper">---</b><b>/</b>月
                        </div>
                    </div>
                    <div class="rentwarehouse-price-select cursor-pointer active">
                        <p class="color-primary rentwarehouse-mode-select-item-title pb-2">單月付款</p>
                        <div class="rounded p-2 color-primary rentwarehouse-price-select-item-m text-center">
                            <b>$</b><b class="price-content" id="price-wrapper">---</b><b>/</b>月
                        </div>
                    </div>
                </div>
                <div class="mt-3 pb-0">

                    <div class="px-4 py-1 text-center">
                        <div class="w-max-content pl-4">
                            <p class="w-max-content rentwarehouse-price-select-result-card-footer-title color-primary">付費方式:</p>
                            <div class="w-max-content flex color-primary items-center pb-2 pt-2">
                                {{--<p class="rentwarehouse-price-select-result-card-footer-content color-deep">現金</p>--}}
                                <img class="mx-1" src="{{ asset('images/Image 60@2x.png') }}" />
                                <img class="mx-1" src="{{ asset('images/Image 59@2x.png') }}" />
                                <img class="mx-1" src="{{ asset('images/Image 58@2x.png') }}" />
                                <img class="mx-1" src="{{ asset('images/fps_color_tc@2x.png') }}" />
                                {{--<img class="mx-1" src="{{ asset('images/fps_color_tc@2x.png') }}" />--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex px-1 items-center pb-2">
                <div class="w-3/5 px-2 text-center">
                    <p class="border rounded-md border-gray-500 py-2 mx-1"><span class="text-lg pr-2">月費</span>
                        <span id="rentwarehouse-result-rate-m" class="text-3xl selected-price">$385</span>
                        <span class="text-lg">起</span>
                    </p>
                </div>
                <div class="w-2/5 px-1">
                    <button id="modalTrigger" class="w-full rounded-full rentwarehouse-mobile-order-button py-3 mx-1">立即預訂</button>

                </div>
            </div>
        </div>

    </div>

    <div class="flex rentwarehouse-toggle-item selection-none cursor-pointer mb-1 pt-5 pl-5">
        <span class="rentwarehouse-toggle-item-icon text-white px-1 py-1"><i class="icon wb-chevron-down"></i></span>
        <span class="text1 my-auto self-center pl-2">租用面積</span>
    </div>

    <div class="pt-2">

        <div class="w-max-content mx-auto">
            <p class="w-max-content text0-m px-4 py-1">
                可放換季衣服, 兒童物件及玩具,書本
            </p>
            <p class="w-max-content text0-m mb-4 px-4">
                參照圖片:
            </p>
        </div>

        <img id="rentwarehouse-size-preview" class="mx-auto mb-4"/>

        <table style="width:92%" class="mx-auto text-center text0">
            <tr class="table-heading">
                <th class="py-2">租用面積<br />
                    (平方尺)</th>
                <th>約數尺寸<br />
                    (長x闊x高) </th>
                <th>原價</th>
                <th>會員價</th>
            </tr>
            @foreach($store->sizes as $size)
            <tr class="border-b border-white bg-grey cursor-pointer rentwarehouse-table-item">
                <td class="bg-yellow py-2">{{$size->size}}</td>
                <td>({{$size->width}}"x{{$size->height}}"x{{$size->depth}}")</td>
                <td><del>${{number_format($size->price)}}</del></td>
                <td><span class=" rounded bg-third px-2 py-1">${{number_format($size->prepaid_price)}}起</span></td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="horz-line my-4"></div>

    <div class="flex mb-1 rentwarehouse-toggle-item selection-none cursor-pointer pt-1 pl-5">
        <span class="rentwarehouse-toggle-item-icon text-white px-1 py-1"><i class="icon wb-chevron-down"></i></span>
        <span class="text1 my-auto self-center pl-2 rentwarehouse-content-title-1">地址</span>
    </div>
    <div class="pt-6">
        <p class="text-sm color-primary px-4">地址: {{$store->address}}</p>
        <div class="px-4 leading-relaxed">
            <p class="text-sm color-deep pt-8 py-2 rentwarehouse-content-title-1">開放時間</p>
            <p class="text-sm color-primary py-1">
                <!-- 全年24小時開放。 -->
                <?php echo nl2br($store->opening_hours) ?>
            </p>
            <p class="text-sm color-deep pt-8 py-2 rentwarehouse-content-title-1">參觀及繳費時間：敬請致電該分店預約或按右面</p>
            <p class="text-sm color-primary py-1">
                <!-- 週一至週五，早上10時至晚上7時。 -->
                <?php echo nl2br($store->text_above_addr) ?>
            </p>

            <!-- <img class="rentware-middle-image px-1 pt-3" src="{{ asset('images/Image 7@2x.png') }}" /> -->

            <div id="map" class="w-full">
                <p class="text-center my-10 state-text">Loading...</p>
            </div>

            <p class="text-sm color-deep pt-8 py-2 rentwarehouse-content-title-1">交通:</p>
            <p class="text-sm color-primary py-1"><?php echo nl2br($store->text_below_addr) ?></p>
        </div>
    </div>

    <div class="horz-line my-4"></div>

    <div class="flex mb-1 rentwarehouse-toggle-item selection-none cursor-pointer pt-1 pl-5">
        <span class="rentwarehouse-toggle-item-icon text-white px-1 py-1"><i class="icon wb-chevron-down"></i></span>
        <span class="text1 my-auto self-center pl-2 rentwarehouse-content-title-1">最新優惠</span>
    </div>
    <div class="pl-5 pr-4 pt-6">
        <!-- <p class="text-sm color-primary">黃竹坑新店快閃優惠　低至6折優惠</p>
        <img class="px-1 mt-10 mb-10" src="{{ asset('images/Image 8@2x.png') }}" /> -->
        @foreach($store->offerImages()->where('is_used', true)->get() as $image)
        @if($image->is_used)
        <img class="pr-20 my-4" src="{{asset('images/offers/'.$image->image)}}" />
        @endif
        @endforeach

        <p class="text-sm color-deep py-1 leading-normal"><?php echo nl2br($store->latest_offer) ?></p>
    </div>

    <div class="horz-line my-4"></div>

    <div class="flex mb-1 rentwarehouse-toggle-item selection-none cursor-pointer pt-1 pl-5">
        <span class="rentwarehouse-toggle-item-icon text-white px-1 py-1"><i class="icon wb-chevron-up"></i></span>
        <span class="text1 my-auto self-center pl-2 rentwarehouse-content-title-1">服務設施</span>
    </div>
    <div class="pt-2 hidden">
        <div class="grid grid-cols-1 row-gap-3 py-2 pl-8">
            @foreach(Helper::$STORAGE_FACILITIES as $index => $facility)
                @if($store->serviceState($index))
                    <div class="flex">
                        <img src="{{asset($facility['image'])}}" class="w-8 h-8 mr-2 object-none" alt="Image" />
                        <p class="text0 my-auto" style="width: calc(100% - 2rem)">{{$facility['title']}}</p>
                    </div>
                @endif
            @endforeach
        </div>


    </div>

    <div class="horz-line my-4"></div>

    <div class="flex mb-1 rentwarehouse-toggle-item selection-none cursor-pointer pt-1 pl-5">
        <span class="rentwarehouse-toggle-item-icon text-white px-1 py-1"><i class="icon wb-chevron-up"></i></span>
        <span class="text1 my-auto self-center pl-2 rentwarehouse-content-title-1">附近設施</span>
    </div>
    <div class="pt-2 hidden">
        <div class="grid grid-cols-1 row-gap-6 py-2 px-12">
            @foreach($store->getNearbyFacilities() as $area)
            <p class="text-sm color-deep">{{$area}}</p>
            @endforeach
        </div>

    </div>

    <div class="horz-line my-4"></div>

    <div class="flex mb-1 rentwarehouse-toggle-item selection-none cursor-pointer pt-1 pl-5">
        <span class="rentwarehouse-toggle-item-icon text-white px-1 py-1"><i class="icon wb-chevron-up"></i></span>
        <span class="text1 my-auto self-center pl-2 rentwarehouse-content-title-1">常見問題</span>
    </div>

    <div class="pl-11 pt-2 pb-8 hidden leading-relaxed">
        @foreach($store->questions as $question)
        <p class="text-sm color-deep py-1">- {{$question->question}}</p>
        <p class="text-sm color-deep py-1"><?php echo nl2br($question->answer) ?></p>
        @endforeach
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

        <div class=" bg-white w-80 mx-auto mt-2 mb-8 pt-2">

            <p class="text-center pt-4 mb-6 font-bold" style="font-size: 21px;">查詢/預約</p>

            <form class="px-8 pt-3" id="bookingForm" method="post" action="{{url('/enquiry')}}">
                @csrf
                <input type="hidden" name="page" value="{{$store->branch}}" required>
                <input type="hidden" name="branchName" value="{{$store->branch}}" required>
                <input type="hidden" name="branchSize" id="branchSize" required>
                <input type="hidden" name="price" id="storePrice" required>
                <input type="hidden" name="ajax" value="1">

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
                        <input class="form-control" type="text" placeholder="電話號碼" value="{{$user->phone}}" name="phoneNumber">
                    @else
                        <input class="form-control" type="text" placeholder="電話號碼" name="email">
                    @endif
                </div>

                <div class="input-group mb-3">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                    @if(Auth::check())
                        <input class="form-control" type="text" placeholder="電子郵件" value="{{$user->email}}" name="email">
                    @else
                        <input class="form-control" type="text" placeholder="電子郵件" name="email">
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
                        <input class="mr-2 rounded border-gray-400" type="checkbox" name="transported">
                        <span class="text-sm">
                            要運輸
                        </span>
                    </label>
                </div>

                <button class="submit-btn hover:bg-purple-400" type="submit">
                    送出
                </button>

                <div class="flex py-2 mt-2 border-t hidden">
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

@section('scripts')
<script>
    const imgFrame = $("#rentwarehouse-main-image");
    const firstImg = $(".store-image").first();
    firstImg.addClass("active");
    if (imgFrame.children().length) {
        imgFrame.height(imgFrame.width());
    }

    function init() {
        $(function() {
            OneStorage.RentwareHouse(Number('<?= $store ? $store->lat : 0 ?>'), Number('<?= $store ? $store->lng : 0 ?>'));
        });
    }

    $(function() {

        $(".wb-dropleft").click(function() {
            const curImg = $(".store-image.active");
            var prevImg = curImg.prev(".store-image");
            if (prevImg.length == 0) {
                prevImg = $(".store-image").last();
            }
            curImg.removeClass("active");
            prevImg.addClass("active");
        })

        $(".wb-dropright").click(function() {
            const curImg = $(".store-image.active");
            var nextImg = curImg.next(".store-image");
            if (nextImg.length == 0) {
                nextImg = $(".store-image").first();
            }
            curImg.removeClass("active");
            nextImg.addClass("active");
        })
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuF23f8P4mybfOUR2lbLynVZqSI77xn4Q&libraries=places&callback=init"></script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
