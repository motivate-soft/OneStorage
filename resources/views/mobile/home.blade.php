<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        .bg-hero {
            background-image: url(images/m_bg_hero.jpg);
            background-repeat: no-repeat;
            background-position: bottom left;
            min-height: 470px;
        }

        .page-title {
            font-size: 38px;
            position: relative;
            font-weight: bold;
        }

        .page-title:before {
            content: '';
            position: absolute;
            width: 99%;
            height: 56px;
            bottom: 11px;
            z-index: -1;
            left: -5px;
            background-color: #E0CBF6;
        }

        .page-desc {
            font-size: 14px;
            font-weight: bold;
            color: #B2B5BD;
        }

        .heading1 {
            font-size: 18px;
            color: white;
        }

        .heading2 {
            /* 33px */
            font-size: 33px;
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
            font-size: 15px;
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
            font-size: 21px;
            border-radius: 0.3rem;
            color: #56628C;
            background-color: #E0CBF6;
            padding-top: 12.5px;
            padding-bottom: 12.5px;
        }

        main {
            margin-left: auto;
            margin-right: auto;
            max-width: 375px;
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
    </style>
</head>

<body class="bg-white">
    <div>
        <main className="flex-1 w-full mx-auto">
            <div class="w-full pl-10 pr-px pt-10 relative bg-hero">
                <span class="page-title text-primary">
                    唔想屋企<span class="text-yellow">咁亂</span>? <br />
                    搵One Storage 啦
                </span>
                <p class="page-desc">至尊迷你倉 ‧ One Choice ‧ One Storage</p>
            </div>

            <div class="bg-primary px-4 py-5">
                <div class="flex mb-4">
                    <img src="{{asset('images/ic_marker.png')}}" class="align-middle my-auto" />
                </div>
                <div>
                    <button class="button-primary w-full">
                        租倉
                    </button>
                </div>
            </div>

            <div class="bg-primary px-5 py-4">
                <p class="heading1 text-center mb-5">填妥簡單資料，立即領取5% off 獨家優惠</p>
                <button class="button-primary w-full">
                    領取優惠
                </button>
            </div>

            <div class="bg-white py-4 mb-4 text-center">
                <div class="grid grid-cols-3 col-gap-6 mb-8">
                    <div>
                        <img src="{{asset('images/img_1.jpg')}}" class="mb-4" />
                        <p class="text-center text1">迷你倉廣告</p>
                    </div>
                    <div>
                        <img src="{{asset('images/img_2.jpg')}}" class="mb-4" />
                        <p class="text-center text1">迷你倉廣告</p>
                    </div>
                    <div>
                        <img src="{{asset('images/img_3.jpg')}}" class="mb-4" />
                        <p class="text-center text1">迷你倉廣告</p>
                    </div>
                </div>

                <span class="heading2 box-shadow">最新優惠</span>

                <div class="grid grid-cols-1 my-10">
                    <img src="{{asset('images/img_2_1.jpg')}}" />
                    <img src="{{asset('images/img_2_2.jpg')}}" />
                    <img src="{{asset('images/img_2_3.jpg')}}" />
                    <img src="{{asset('images/img_2_4.jpg')}}" />
                    <img src="{{asset('images/img_2_5.jpg')}}" />
                    <img src="{{asset('images/img_2_6.jpg')}}" />
                </div>
            </div>

            <div class="bg-grey pb-8 text-center">
                <span class="heading2 box-shadow1 relative" style="top:-26px">客戶感言</span>
                <p class="text4 ml-10">用戶好評來自 <span class="text-blue-900 font-extrabold">facebook</span></p>
                <div class="flex justify-center mb-10">
                    <div class="score-lg relative" style="top: -20px">
                        <p class="m-auto">5.0</p>
                    </div>
                    <p class="text4">（滿分為 <span class="font-bold">5</span>） 根據 <span class="font-bold">205</span> 位用戶的意見</p>
                </div>
                <div class="grid grid-cols-1 row-gap-4 text-left px-4">
                    <div class="bg-white border border-gray-600 p-4 relative">
                        <div class="score-base mb-4">
                            <p class="m-auto">5.0</p>
                        </div>
                        <p class="text1 mb-8">
                            The storage is clean and
                            tidy.
                            The office girl is very
                            helpful and kind
                        </p>
                        <div class="absolute bottom-4">
                            <span class="text-name">劉美英</span>
                            <img src="{{asset('images/ic_recommend.png')}}" class="inline ml-2" />
                        </div>
                    </div>
                    <div class="bg-white border border-gray-600 p-4 relative">
                        <div class="score-base mb-4">
                            <p class="m-auto">5.0</p>
                        </div>
                        <p class="text1 mb-8">
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
                        <p class="text1 mb-8">
                            Finally got a place to put our
                            extra stuff, 24 hrs air con and
                            just 5 mins distance away
                            from us.
                        </p>
                        <div class="absolute bottom-4">
                            <span class="text-name">Susanna Leung</span>
                            <img src="{{asset('images/ic_recommend.png')}}" class="inline ml-2" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between bg-primary py-3"></div>

            <div class="bg-yellow pb-12 text-center">
                <p class="w-fullpy-6 px-10 py-14 text4">
                    至尊迷你倉致力為每位客戶打造最安全及最可靠的倉存空間，實力雄厚，全屬自置物業。分店網絡積極不斷擴充，新蒲崗及火炭分店將於短期內正式投入服務。 特設多種大小不同呎碼獨立迷你倉，任君選擇。2.4米闊的走廊配以完善的裝置設備，完全符合消防指引。全天候高清保安監察及警報系統，智能保安進出系統，24小時自助式儲存，支援現金、EPS、支票、信用卡、轉數快及免息分期付費，優質的儲存環境及親切專業的客戶服務，用心為每位客戶提升生活空間質素，承傳尊貴享受典範。
                </p>
                <img src="{{asset('images/img_camera.jpg')}}" class="yellow-shadow1" />
                <div class="text-left px-4 py-3">
                    <p class="heading2 text-center">迷你倉設施</p>
                    <div class="grid grid-cols-1 row-gap-6 mb-8">
                        <div class="flex">
                            <img src="{{asset('images/ic_key_card.png')}}" class="mr-2 object-none" />
                            <p class="text0 my-auto"><span class="font-bold">7 x 24</span>智能保安進出系統</p>
                        </div>
                        <div class="flex">
                            <img src="{{asset('images/ic_fire.png')}}" class="mr-2 object-none" />
                            <p class="text0 my-auto">消防裝置設備</p>
                        </div>
                        <div class="flex">
                            <img src="{{asset('images/ic_water.png')}}" class="mr-2 object-none" />
                            <p class="text0 my-auto">自助飲用水機</p>
                        </div>
                        <div class="flex">
                            <img src="{{asset('images/ic_24_hours.png')}}" class="mr-2 object-none" />
                            <p class="text0">24小時電話熱線服務</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 row-gap-6">
                        <div class="flex flex-row-reverse">
                            <img src="{{asset('images/ic_air_con.png')}}" class="ml-2 object-none" />
                            <p class="text1 my-auto">無間斷恆溫空調</p>
                        </div>
                      
                        <div class="flex flex-row-reverse">
                            <img src="{{asset('images/ic_delivery.png')}}" class="ml-2 object-none" />
                            <p class="text0 my-auto">鋁梯及手推車借用服務</p>
                        </div>
                      
                        <div class="flex flex-row-reverse">
                            <img src="{{asset('images/ic_sec_cam.png')}}" class="ml-2 object-none" />
                            <p class="text0 my-auto">全天候高清保安監察及警報系統</p>
                        </div>
                       
                        <div class="flex flex-row-reverse">
                            <img src="{{asset('images/ic_wifi.png')}}" class="ml-2 object-none" />
                            <p class="text0 my-auto">免費Wi-Fi</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-grey py-8 text-center">
                <span class="heading2 box-shadow1">常見問題</span>
                <div class="text-left mt-12 px-15">
                    <div class="mb-8">
                        <img src="{{asset('images/ic_rarrow.png')}}" class="inline mr-4" />
                        <span class="text4">常見問題1</span>
                    </div>
                    <div class="mb-8">
                        <img src="{{asset('images/ic_rarrow.png')}}" class="inline mr-4" />
                        <span class="text4">常見問題1</span>
                    </div>
                    <div class="mb-8">
                        <img src="{{asset('images/ic_rarrow.png')}}" class="inline mr-4" />
                        <span class="text4">常見問題1</span>
                    </div>
                    <div class="mb-8">
                        <img src="{{asset('images/ic_rarrow.png')}}" class="inline mr-4" />
                        <span class="text4">常見問題1</span>
                    </div>
                </div>

            </div>

            <div class="bg-white px-6 py-10">
                <form class="">
                    <p class="text2">給我們留言</p>
                </form>
            </div>
        </main>
    </div>


</body>

</html>