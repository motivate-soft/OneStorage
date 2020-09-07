@extends('backend.layouts.app')

@section('title')
<title>{{__('Members')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="mb-6">
        <div>
            <span class="font_25 mr-10">Member</span>
            <!-- <span class="font_16">Frontpage</span> -->
        </div>

    </div>

    <div class="bg-white w-4/5 h-full">
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
