@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 首頁 | 至尊迷你倉 One Storage')}}</title>
@endsection

@section('styles')
<style>
    .page-title {
        font-size: 91px;
        position: relative;
    }

    .title-shadow:before {
        content: '';
        position: absolute;
        width: 105%;
        height: 185%;
        bottom: 10px;
        z-index: -1;
        left: -10px;
        background-color: #E0CBF6;
    }

    .page-desc {
        font-size: 39px;
        color: #B2B5BD;
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

    .button-second {
        font-size: 18px;
        border-radius: 9999px;
        color: #56628C;
        background-color: #E0CBF6;
        padding-left: 40px;
        padding-right: 40px;
    }


    .yellow-shadow {
        box-shadow: 10px 15px #FABD02;
    }

    .yellow-shadow1 {
        box-shadow: 18px 18px #FABD02;
    }

    .contact-icon {
        width: 24px;
        height: 24px;
    }

    #main-content {
        font-family: "RobertBlack";
    }
</style>

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')

<div class="bg-white flex justify-between w-full ">
    <div class="w-1/2 pl-20 xl:pl-36 pt-10">
        <p class="z-20 page-title leading-snug text-primary mb-2 source-han">
            迷你倉<span class="text-yellow">首選</span>
        </p>
        <span class="z-10 title-shadow source-han" style="font-size: 50px;position: relative">
            One Choice ‧ One Storage
        </span>
        <p class="page-desc pt-6 source-han z-50">至尊迷你倉</p>
        <form id="branchSearchForm" class="flex bg-primary rounded-lg p-4 mr-4 mt-8 justify-between w-8/10" method="get" action="{{url('/rentwarehouse')}}">
            <img src="{{asset('images/ic_marker.png')}}" class="align-middle my-auto" />
            <input id="storeId" type="hidden" name="storeId" />
            <div class="w-3/12 inline-block relative">
                <?php $locations = App\Store::getLocations(); ?>
                <select id="location-select" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                    <option value="" selected disabled class="text-grey">地區</option>
                    @foreach($locations as $location)
                    <option value="{{$location->location}}" class=" text-grey-2">{{$location->location}}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
            <div class="w-5/12 inline-block relative">
                <select disabled="disabled"  id="branch-select" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                    <option value="" selected disabled class="text-grey">分店</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
            <button class="button-primary" type="submit">
                租倉
            </button>
        </form>

        <div class="flex mt-16 robert-black text-primary mb-8">
            <p class="my-auto font_24 break-all leading-tight">
                <span>唔知自己需要咩size ? </span>
                <br class="block xl:hidden"/>
                <span class="relative crown1"> 試下我地既空間計算器</span>
            </p>
            <a href="{{url('/calc')}}" target="_blank" class="ml-10 my-auto bg-yellow px-6 py-2 font_18">立即計算</a>
        </div>
    </div>
    <img src="{{App\AppConfig::first()->background}}" class="w-1/2 object-contain lg:-mt-10 object-right" style="max-width: 1100px"/>
</div>

<div class="bg-primary py-4">
    <p class="heading1 text-center">填妥簡單資料，立即領取5% off 獨家優惠</p>

    <form id="discountForm" class="flex justify-between mt-6 pr-10 pb-4 section" method="post" action="{{url('/enquiry')}}">
        @csrf
        <input type="hidden" name="page" value="{{Helper::$SS_FROM_FRONT_PAGE1}}">
        <input type="hidden" name="ajax" value="1">
        <div class="flex w-4/5">
            <div class="flex w-1/2 input-group mr-2">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                @if(Auth::check())
                <input class="w-full form-control" type="text" placeholder="姓" name="firstName" value="{{Auth::user()->first_name}}" required>
                @else
                <input class="w-full form-control" type="text" placeholder="姓" name="firstName" required>
                @endif
            </div>
            <div class="w-1/2 flex input-group">
                @if(Auth::check())
                <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" value="{{Auth::user()->last_name}}" type="text" placeholder="名" name="lastName" required>
                @else
                <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名" name="lastName" required>
                @endif
            </div>
        </div>

        <div class="input-group mx-10">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
            @if(Auth::check())
            <input class="form-control" type="email" placeholder="電子郵件" value="{{Auth::user()->email}}" name="email" required>
            @else
            <input class="form-control" type="email" placeholder="電子郵件" name="email" required>
            @endif
        </div>

        <button class="w-1/3 button-second" type="submit" data-text="領取優惠">
            領取優惠
        </button>
    </form>
</div>

<div class="bg-white py-16">
    <div class="section">
        <!-- <div class="grid grid-cols-3 col-gap-6 mb-8 justify-between"> -->
        <div class="flex justify-between mb-20">
            <div class="mr-4">
                <a href="https://youtu.be/GdBSugr-vY8" target="_blank"><img src="{{asset('images/video_thumb1.jpg')}}" class="mb-4" /></a>
                <p class="text-center text1">至尊迷你倉幫您解決一切空間煩惱</p>
            </div>
            <div class="mx-4">
                <a href="https://youtu.be/AG_ZbMUNok4" target="_blank"><img src="{{asset('images/video_thumb2.jpg')}}" class="mb-4" /></a>
                <p class="text-center text1">至尊迷你倉梗有一款岩您用</p>
            </div>
            <div class="ml-4">
                <a href="https://youtu.be/hxzEMSnO16g" target="_blank"><img src="{{asset('images/video_thumb3.jpg')}}" class="mb-4" /></a>
                <p class="text-center text1">租用 One Storage 就係咁簡單 </p>
            </div>
        </div>

        <div class="text-center">
            <span class="heading2 text-center box-shadow">最新優惠</span>
        </div>


        <div class="grid grid-cols-2 col-gap-8 row-gap-10 my-24 max-w-full mx-auto">
            <?php
            $promotions = App\Blog::where('as_promotion', true)->where('state', true)->orderBy('column', 'asc')->get();
            ?>
            @foreach($promotions as $promotion)
            <a href="{{url('/news/'.$promotion->id)}}"><img src="{{asset($promotion->promotion)}}" class="yellow-shadow promotion h-52" /></a>
            @endforeach
        </div>
    </div>
</div>

<div class="bg-grey pb-20 text-center">
    <span class="heading2 box-shadow1 relative" style="top:-26px">客戶感言</span>
    <p class="text4 my-4 ml-10">
        用戶好評來自
        <span class="text-blue-900 font-extrabold">
            <a href="https://www.facebook.com/onestorage/" target="_blank">facebook</a>
        </span>
    </p>
    <div class="flex justify-center mb-10">
        <div class="score-lg relative" style="top: -20px">
            <p class="m-auto">5.0</p>
        </div>
        <p class="text4">（滿分為 <span class="font-bold">5</span>） 根據 <span class="font-bold">逾180</span> 位用戶的意見</p>
    </div>
    <div class="grid grid-cols-3 col-gap-14 text-left section">
        <div class="bg-white border border-gray-600 p-4 relative">
            <div class="score-base mb-4">
                <p class="m-auto">5.0</p>
            </div>
            <p class="text1 mb-12">
                方便、簡潔、員工友好。
            </p>
            <div class="absolute bottom-4">
                <span class="text-name">Wyman Dana Tsui</span>
                <img src="{{asset('images/ic_recommend.png')}}" class="inline ml-2" />
            </div>
        </div>
        <div class="bg-white border border-gray-600 p-4 relative">
            <div class="score-base mb-4">
                <p class="m-auto">5.0</p>
            </div>
            <p class="text1 mb-12">
                Excellent customer service,
                very fast response even at
                midnight on facebook
                messenger. Save me a lot
                of time.
            </p>
            <div class="absolute bottom-4">
                <span class="text-name">Doris Yu</span>
                <img src="{{asset('images/ic_recommend.png')}}" class="inline ml-2" />
            </div>
        </div>
        <div class="bg-white border border-gray-600 p-4 relative">
            <div class="score-base mb-4">
                <p class="m-auto">5.0</p>
            </div>
            <p class="text1 mb-12">
                二十四小時，十分方便，搬屋雜物多，好夠用！very good
            </p>
            <div class="absolute bottom-4">
                <span class="text-name">Carrie Chiu</span>
                <img src="{{asset('images/ic_recommend.png')}}" class="inline ml-2" />
            </div>
        </div>
    </div>
</div>

<div class="bg-primary py-6 text3">
    <div class="flex justify-between pl-14 section" style="font-family: 'RobertRegular';">
        <a class="my-auto" href="Tel: 852-21112636" target="_blank">
            <img src="{{asset('images/ic_phone.png')}}" class="inline mr-2 contact-icon" />
            (852) 2111 2636
        </a>

        <a class="my-auto mailto" href="mailto:cs@onestorage.com.hk" target="_blank">
            <img src="{{asset('images/ic_email.png')}}" class="inline mr-2 contact-icon" />
            cs@onestorage.com.hk
        </a>

        <a class="my-auto" href="https://wa.me/85251188503" target="_blank">
            <img src="{{asset('images/ic_wa.png')}}" class="inline mr-2 contact-icon" />
            (852) 5118 8503
        </a>
        <div>
            <a target="_blank" href="https://www.facebook.com/onestorage/"><img src="{{asset('images/ic_fb.png')}}" class="inline mx-2 contact-icon" /></a>
            <a target="_blank" href="https://www.instagram.com/onestorage_hk/"><img src="{{asset('images/ic_in.png')}}" class="inline mx-2 contact-icon" /></a>
            <a target="_blank" href="https://www.youtube.com/channel/UCp91DP8DqA1_4zWhzum1NDQ"><img src="{{asset('images/ic_play.png')}}" class="inline mx-2" /></a>
        </div>
    </div>
</div>

<div class="bg-white pt-10 pb-20 text-center">
    <span class="heading2 box-shadow1">至尊迷你倉</span>
    <div class="section">
        <p class="w-full bg-yellow py-6 px-10 text4 my-10 leading-snug font-medium">
            <!-- 至尊迷你倉致力為每位客戶打造最安全及最可靠的倉存空間，實力雄厚，全屬自置物業。分店網絡積極不斷擴充，新蒲崗及火炭分店將於短期內正式投入服務。 特設多種大小不同呎碼獨立迷你倉，任君選擇。2.4米闊的走廊配以完善的裝置設備，完全符合消防指引。全天候高清保安監察及警報系統，智能保安進出系統，24小時自助式儲存，支援現金、EPS、支票、信用卡、轉數快及免息分期付費，優質的儲存環境及親切專業的客戶服務，用心為每位客戶提升生活空間質素，承傳尊貴享受典範。 -->
            為金朝陽集團屬下業務(股票代號： 00878.HK)。<br />
            分店遍佈港、九及新界，更積極不斷擴充業務，旗下迷你倉全部合乎消防處規格，為客戶提供優質的儲存環境及專業的服務。至尊迷你倉是亞洲迷你倉商會(SSAA)及香港迷你倉總會會員(HKMSA)。

        </p>
        <div class="flex">
            <img src="{{asset('images/img_camera.jpg')}}" class="yellow-shadow1 w-2/5" />
            <div class="bg-yellow w-3/5 mr-12 ml-10 mt-6 mb-4 text-left px-4 pb-6">
                <p class="heading2 relative" style="top: -20px">迷你倉設施</p>
                <div class="grid grid-cols-2 col-gap-2 row-gap-4 font_21 mt-2">
                    @foreach(Helper::$STORAGE_FACILITIES as $facility)
                        <div class="flex my-auto">
                            <img src="{{asset($facility['image'])}}" class="w-8 h-8 mr-2 object-none" alt="Image" />
                            <p class="my-auto" style="width: calc(100% - 2rem)">{{$facility['title']}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-grey pb-8 text-center">
    <span class="heading2 box-shadow1 relative" style="top:-26px">常見問題</span>
    <div class="text-left mt-12 section">
        <div class="mb-8">
            <div class="flex cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="mr-4" />
                <span class="text4 my-auto">怎樣聯絡至尊迷你倉？</span>
            </div>
            <div class="hidden px-12 pt-4">可致電：2111 2636、電郵：cs@onestorage.com.hk或Whatapp: 51188503</div>
        </div>

        <div class="mb-8">
            <div class="flex cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="mr-4" />
                <span class="text4 my-auto">至尊迷你倉分店位於那裡？</span>
            </div>
            <div class="hidden px-12 pt-4">我們分店遍佈港、九及新界，詳情可查閱分店位置。</div>
        </div>

        <div class="mb-8">
            <div class="flex cursor-pointer home-problem-toggle-item">
                <img src="<?php echo e(asset('images/ic_rarrow.png')); ?>" class="mr-4" />
                <span class="text4 my-auto">可以預約實地參觀迷你倉嗎？</span>
            </div>
            <div class="hidden px-12 pt-4">
                <p>歡迎致電21112636或whatsapp 51188503預約參觀。星期日及公眾假期，需至少於 1 天前預約。</p>
            </div>
        </div>

    </div>

</div>


<div class="bg-white py-14">
    <div class="mx-auto w-1/3 lg:w-1/4 xl:w-1/5">
        @include('partials.enquiryForm', ['page' => Helper::$SS_FROM_FRONT_PAGE2])
    </div>
</div>


@endsection

@section('scripts')
<script>
    $(function() {
        OneStorage.Home();
    });
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
