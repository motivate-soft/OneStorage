<p>{{__('frontend_common.enquiryEmail')}}</p>
<p>{{__('frontend_common.fullName')}}: {{$enquiry->first_name.' '.$enquiry->last_name}}</p>
<p>{{__('frontend_common.mobileNumber')}}: {{$enquiry->phone_number}}</p>
<p>{{__('frontend_common.email')}}: {{$enquiry->email}}</p>
@if($enquiry->question)
    <p>{{__('frontend_common.question')}}: {{$enquiry->question}}</p>
@endif

@if($enquiry->message)
    <p>{{__('frontend_common.question')}}: {{$enquiry->message}}</p>
@endif