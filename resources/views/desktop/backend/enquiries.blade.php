@extends('backend.layouts.app')

@section('title')
<title>{{__('Enquiries')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="flex justify-between">
        <a href="{{url('/backend')}}" class="font_25 mb-6">{{ __('backend_enquiries.title') }}</a>
        @include('backend.partials.searchbar')
    </div>

    <div class="bg-white h-full">
        <table class="w-full bg-white" id="content">
            <tr class="table-heading shadow-lg border border-primary robert-regular">
                <th class="py-5 border-r border-second">{{ __('backend_enquiries.date') }}</th>
                <th class="py-5 border-r border-second">{{ __('backend_enquiries.profile') }}</th>
                <th class="py-5 border-r border-second">{{ __('backend_enquiries.demand') }}</th>
                <th class="py-5 border-r border-second">{{ __('backend_enquiries.question') }}</th>
                <th class="py-5 border-r border-second w-1/6">{{ __('backend_enquiries.message') }}</th>
                <th class="py-5 border-r border-second">{{ __('backend_enquiries.page') }}</th>
                <th class="py-5 border-r border-second">{{ __('backend_enquiries.status') }}</th>
                <th class="py-5">{{ __('backend_enquiries.principle') }}</th>
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
                <td class="item-column text-center">
                    <p class="mb-1">{{$enquiry->branch_name}}</p>
                    @if($enquiry->branch_size > 0)
                    <p class="font_34">{{$enquiry->branch_size}}"</p>
                    @endif
                    @if($enquiry->store_price > 0)
                    <p class="font_24">${{number_format($enquiry->store_price)}}</p>
                    @endif
                </td>
                <td class="item-column">
                    <p class="mb-2">{{$enquiry->question}}</p>
                    @if($enquiry->transported)
                        <p>-要運輸</p>
                    @endif
                </td>
                <td class="item-column">
                    <p>{{$enquiry->message}}</p>
                </td>
                <td class="item-column">
                    {{$enquiry->page}}
                </td>
                <td class="px-7 py-6 font_14 text-primary">
                    <a href="{{route('backend.enquiries.accept', $enquiry->id)}}" class="{{$enquiry->status=='未' ? 'bg-yellow-1' : 'bg-green'}} px-6 py-2 rounded-md">{{$enquiry->status}}follow</a>
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
