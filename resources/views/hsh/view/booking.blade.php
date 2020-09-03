<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Booking') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
</head>

<body class="h-screen antialiased leading-none bg-gray-300 text-primary">

    <div class=" bg-white w-96 mx-auto mt-12 mb-12 pt-2">

        <p class="text-center pt-4 pb-2 font-bold" style="font-size: 21px;">立即申請 </p>

        <form class="px-8 pt-5">

            <p class=" font-bold mb-4" style="font-size: 25px;">黃竹坑(瑞琪分店) </p>

            <p class=" font-bold mb-4" style="font-size: 20px;"><span style="font-size: 25px">12</span>平方呎 </p>

            <div role="alert" class="mb-4">
                <div class=" text-center font-bold rounded-t px-4 py-2 mr-4 ml-4" style="font-size: 25px; background-color: #E0CBF6; color:#56628C">
                    月費
                </div>
                <div class="border border-t-0 rounded-b px-4 py-3 text-center mr-4 ml-4">
                    <p class="font-bold" style="font-size: 32px;color:#324A5E">$600</p>
                </div>
            </div>

            <div class="flex mb-4 w-full pt-8 border-t">
                <div class="flex w-1/2 input-group">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                    <input class="w-full form-control" type="text" placeholder="姓">
                </div>
                <div class="w-1/2 flex input-group">
                    <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名">

                </div>
            </div>


            <div class="input-group mb-4">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                <input class="form-control" type="text" placeholder="電話號碼">
            </div>

            <div class="w-full inline-block relative mb-6">
                <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                    <option value="" selected>查詢問題</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>

            <div class="w-full inline-block relative pb-4 border-b">
                <input class="w-full form-control pb-8 border-b" style="padding: 16px 8px 16px 16px;" type="text" placeholder="你的信息">

            </div>

            <div class=" w-full mt-4 md:flex md:items-center mb-6">
                <label class="md:w-2/3 block text-gray-500 font-bold">
                    <input class="mr-2 rounded border-gray-400" type="checkbox">
                    <span class="text-sm">
                        要運輸
                    </span>
                </label>
            </div>

            <button class="submit-btn hover:bg-purple-400">
                送出
            </button>

            <div class=" flex py-4 mt-2 border-t">
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

</body>

</html>