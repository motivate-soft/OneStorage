@extends('backend.layouts.app')

@section('title')
<title>{{__('Enquiries')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <p class="font_25 mb-6">Enquiries</p>
    <div class="bg-white h-full">
        <table class="w-full bg-white">
            <tr class="table-heading shadow-lg border border-primary">
                <th class="py-5 border-r border-second">日期</th>
                <th class="py-5 border-r border-second">客人資料</th>
                <th class="py-5 border-r border-second">需求</th>
                <th class="py-5 border-r border-second">查詢問題</th>
                <th class="py-5 border-r border-second w-1/6">你的信息</th>
                <th class="py-5 border-r border-second">頁面</th>
                <th class="py-5 border-r border-second">狀態</th>
                <th class="py-5">負責人</th>
            </tr>
            <tr class="border-b border-third align-top">
                <td class="item-column">
                    <p class="mb-1">16:05 23-07-2020</p>
                    <p>E00003</p>
                </td>
                <td class="item-column">
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                        <span class="my-auto">Paul Smith</span>
                    </div>
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                        <span class="my-auto">6123 6123</span>
                    </div>
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                        <span class="my-auto">PSasdasdmith@gmail.com</span>
                    </div>
                </td>
                <td class="item-column">
                </td>
                <td class="item-column">
                    <p>你們的營業時間?</p>
                </td>
                <td class="item-column">
                    I would like to know the operation hour of your stores
                </td>
                <td class="item-column">
                    Contact us
                </td>
                <td class="px-7 py-6 font_14 text-primary">
                    <span class="bg-yellow-1 px-6 py-2 rounded-md">未follow</span>
                </td>
                <td class="item-column">
                </td>
            </tr>
            <tr class="border-b border-third align-top">
                <td class="item-column">
                    <p class="mb-1">16:05 23-07-2020</p>
                    <p>E00002</p>
                </td>
                <td class="item-column">
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                        <span class="my-auto">Paul Smith</span>
                    </div>
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                        <span class="my-auto"></span>
                    </div>
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                        <span class="my-auto">PSasdasdmith@gmail.com</span>
                    </div>
                </td>
                <td class="item-column">
                </td>
                <td class="item-column">

                </td>
                <td class="item-column">

                </td>
                <td class="item-column">
                    Front page
                </td>
                <td class="px-7 py-6 font_14 text-primary">
                    <span class="bg-green px-6 py-2 rounded-md">已follow</span>
                </td>
                <td class="item-column">
                    <span>Oscar</span>
                </td>
            </tr>
            <tr class="border-b border-third align-top">
                <td class="item-column">
                    <p class="mb-1">16:05 23-07-2020</p>
                    <p>E00001</p>
                </td>
                <td class="item-column">
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                        <span class="my-auto">Paul Smith</span>
                    </div>
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                        <span class="my-auto">6123 6123</span>
                    </div>
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                        <span class="my-auto">PSasdasdmith@gmail.com</span>
                    </div>
                </td>
                <td class="item-column">
                    <p class="mb-3">黃竹坑(瑞琪分店)</p>
                    <p class="font_34 text-center">12"</p>
                </td>
                <td class="item-column">
                </td>
                <td class="item-column">

                </td>
                <td class="item-column">
                    Contact us
                </td>
                <td class="px-7 py-6 font_14 text-primary">
                    <span class="bg-yellow-1 px-6 py-2 rounded-md">未follow</span>
                </td>
                <td class="item-column">
                </td>
            </tr>
        </table>
    </div>

</div>
@endsection

@section('scripts')
@endsection