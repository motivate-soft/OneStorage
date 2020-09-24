@extends('backend.layouts.app')

@section('title')
<title>{{__('Enquiries')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="flex justify-between">
        <a href="{{url('/backend')}}" class="font_25 mb-6">Enquiries</a>
        @include('backend.partials.searchbar')
    </div>

    <div class="bg-white h-full">
        <table class="w-full bg-white" id="content">
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
<script>
    $("#export2Excel").click(function(){
        var table = $("#content").clone();
        table.find("img").remove();
        Excel.export(table.html());
    })
</script>
@endsection