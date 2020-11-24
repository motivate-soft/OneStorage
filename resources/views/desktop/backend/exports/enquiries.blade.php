<table class="w-full bg-white" id="content">
    <tr class="table-heading shadow-lg border border-primary">
        <th class="py-5 border-r border-second">{{__('backend_enquiries.date')}}</th>
        <th class="py-5 border-r border-second">{{__('backend_enquiries.profile')}}</th>
        <th class="py-5 border-r border-second">{{__('backend_enquiries.demand')}}</th>
        <th class="py-5 border-r border-second">{{__('backend_enquiries.question')}}</th>
        <th class="py-5 border-r border-second w-1/6">{{__('backend_enquiries.message')}}</th>
        <th class="py-5 border-r border-second">{{__('backend_enquiries.page')}}</th>
        <th class="py-5 border-r border-second">{{__('backend_enquiries.status')}}</th>
        <th class="py-5">{{__('backend_enquiries.principle')}}</th>
    </tr>
    @foreach($enquiries as $enquiry)
    <tr class="border-b border-third align-top">
        <td class="item-column">
            <p class="mb-1">{{$enquiry->created_at}}</p>
            <br/>
            <p>E{{str_pad($enquiry->id, 6, '0', STR_PAD_LEFT)}}</p>
        </td>
        <td class="item-column">
            <span class="my-auto">{{$enquiry->first_name.' '.$enquiry->last_name}}</span>
            <br/>
            <span class="my-auto">{{$enquiry->phone_number}}</span>
            <br/>
            <span class="my-auto">{{$enquiry->email}}</span>
            <br/>
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