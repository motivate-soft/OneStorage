@extends('backend.layouts.app')

@section('title')
<title>{{__('Enquiries')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="flex justify-between">
        <a href="{{url('/backend')}}" class="font_25 mb-6">Enquiries</a>
        <form method="GET" action="{{url('/backend')}}" class="flex justify-end" style="height: 44px">  
            <div class="flex relative mr-8 shadow-md">
                <select name="key" id="search-field-select" class="block appearance-none w-full bg-white border-none hover:border-gray-500 px-20 leading-tight focus:outline-none focus:shadow-outline ">
                    <option value="" selected class="text-grey">Search Field</option>
                    @foreach($keys as $key)
                    <option value="{{$key['key']}}" {{$key['key'] == (isset($_GET['key'])?$_GET['key']:'') ? 'selected' : ''}} class=" text-grey-2">{{$key['value']}}</option>
                    @endforeach
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
                        <span class="my-auto">{{$enquiry->first_name.' '.$enquiry->last_name}}</span>
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
                    <a href="{{url('/backend/accept-enquiry?id='.$enquiry->id)}}" class="{{$enquiry->status=='未' ? 'bg-yellow-1' : 'bg-green'}} px-6 py-2 rounded-md">{{$enquiry->status}}follow</a>
                </td>
                <td class="item-column">
                    {{$enquiry->principal}}
                </td>
            </tr>
            @endforeach
        </table>
        <div class="py-2 bg-white">
            {{ $enquiries->links() }}
        </div>

    </div>

</div>
@endsection

@section('scripts')
@endsection