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
            @foreach($enquiries as $enquiry)
            <tr class="border-b border-third align-top">
                <td class="item-column">
                    <p class="mb-1">{{$enquiry->created_at}}</p>
                    <p>E{{str_pad($enquiry->id, 6, '0', STR_PAD_LEFT)}}</p>
                </td>
                <td class="item-column">
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                        <span class="my-auto">{{$enquiry->user_name}}</span>
                    </div>
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                        <span class="my-auto">{{$enquiry->phone_number}}</span>
                    </div>
                    <div class="flex mb-3">
                        <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                        <span class="my-auto">{{$enquiry->email}}</span>
                    </div>
                </td>
                <td class="item-column">
                    <p class="mb-3">{{$enquiry->branch_name}}</p>
                    @if($enquiry->branch_size > 0)
                    <p class="font_34 text-left">{{$enquiry->branch_size}}"</p>
                    @endif
                </td>
                <td class="item-column">
                    <p>{{$enquiry->question}}</p>
                </td>
                <td class="item-column">
                    {{$enquiry->message}}
                </td>
                <td class="item-column">
                    {{$enquiry->page}}
                </td>
                <td class="px-7 py-6 font_14 text-primary">
                    @if($enquiry->status == 0)
                    <a href="{{url('/backend/accept-enquiry?id='.$enquiry->id)}}" class="bg-yellow-1 px-6 py-2 rounded-md">未follow</a>
                    @else
                    <span class="bg-green  px-6 py-2 rounded-md">已follow</span>
                    @endif
                </td>
                <td class="item-column">
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>
@endsection

@section('scripts')
@endsection