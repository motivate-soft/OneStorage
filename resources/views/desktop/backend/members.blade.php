@extends('backend.layouts.app')

@section('title')
<title>{{__('Members')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="mb-6">
        <div class="flex justify-between">
            <a href="{{url('/backend/members')}}" class="font_25 mb-6">Enquiries</a>
            <form method="GET" action="{{url('/backend/members')}}" class="flex justify-end" style="height: 44px">
                <div class="flex relative mr-8 shadow-md">
                    <select name="key" id="search-field-select" class="block appearance-none w-full bg-white border-none hover:border-gray-500 px-20 leading-tight focus:outline-none focus:shadow-outline ">
                        <option value="" selected class="text-grey">Search Field</option>
                        
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
                <div class="flex relative mr-2">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x1.png')}}" alt="">
                    <input class="form-control w-full shadow-md" type="text" placeholder="" name="value" value="{{isset($_GET['value'])?$_GET['value']:''}}">
                </div>
                <a class="ml-8 text-blue-700 my-auto">Export as xls</a>
            </form>
        </div>

    </div>

    <div class="bg-white h-full">
        <table class="w-full bg-white">
            <tr class="table-heading shadow-lg border border-primary">
                <th class="py-5 border-r border-second">註冊日期</th>
                <th class="py-5 border-r border-second">客人資料</th>
                <th class="py-5 border-r border-second">註冊渠道</th>
                <th class="py-5 border-r border-second">查詢</th>
            </tr>
            <tr class="border-b border-third align-top">
                <td class="item-column">
                    <p class="mb-1">16:05 23-07-2020</p>
                    <p>M00001</p>
                </td>
                <td class="item-column robert-regular">
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                            <span class="my-auto">Paul Smith</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">D.O.B: </span>
                            <span>15 Jul 2000</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                            <span class="my-auto">6123 6123</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">Preferred: </span>
                            <span>Whatsapp</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                            <span class="my-auto">PSasdasdmith@gmail.com</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">Returning: </span>
                            <span>SoundWill</span>
                        </div>
                    </div>
                    <div class="flex">
                        <img class="object-none mr-2" src="{{asset('images/ic-building.png')}}" />
                        <span class="my-auto">14F/B ABC building , Canton Rd, KLN</span>
                    </div>
                </td>
                <td class="item-column align-middle text-center">
                    <p class="font_19">FB</p>
                </td>
                <td class="item-column">
                    <p>E00001, E00002, E00003</p>
                </td>
            </tr>
            <tr class="border-b border-third align-top">
                <td class="item-column">
                    <p class="mb-1">16:05 23-07-2020</p>
                    <p>M00002</p>
                </td>
                <td class="item-column robert-regular">
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                            <span class="my-auto">Paul Smith</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">D.O.B: </span>
                            <span>15 Jul 2000</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                            <span class="my-auto"></span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">Preferred: </span>
                            <span>Whatsapp</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                            <span class="my-auto">PSasdasdmith@gmail.com</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">Returning: </span>
                            <span>SoundWill<br />OneStorage (分店)</span>
                        </div>
                    </div>
                    <div class="flex">
                        <img class="object-none mr-2" src="{{asset('images/ic-building.png')}}" />
                        <span class="my-auto">14F/B ABC building , Canton Rd, KLN</span>
                    </div>
                </td>
                <td class="item-column align-middle text-center">
                    <p class="font_19">Web</p>
                </td>
                <td class="item-column">
                    <p>E00004</p>
                </td>
            </tr>
            <tr class="border-b border-third align-top">
                <td class="item-column">
                    <p class="mb-1">16:05 23-07-2020</p>
                    <p>M00003</p>
                </td>
                <td class="item-column robert-regular">
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                            <span class="my-auto">Paul Smith</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">D.O.B: </span>
                            <span>15 Jul 2000</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                            <span class="my-auto"></span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">Preferred: </span>
                            <span>Whatsapp</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                            <span class="my-auto">PSasdasdmith@gmail.com</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">Returning: </span>
                            <span>-</span>
                        </div>
                    </div>
                    <div class="flex">
                        <img class="object-none mr-2" src="{{asset('images/ic-building.png')}}" />
                        <span class="my-auto">14F/B ABC building , Canton Rd, KLN</span>
                    </div>
                </td>
                <td class="item-column align-middle text-center">
                    <p class="font_19">WeChat</p>
                </td>
                <td class="item-column">
                    <p>E00006</p>
                </td>
            </tr>
        </table>
    </div>

</div>
@endsection