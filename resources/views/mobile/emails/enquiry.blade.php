<p>Enqury Email</p>
<p>Name: {{$enquiry->first_name.' '.$enquiry->last_name}}</p>
<p>Phone Number: {{$enquiry->phone_number}}</p>
<p>Email: {{$enquiry->email}}</p>
@if($enquiry->question)
<p>Question: {{$enquiry->question}}</p>
@endif

@if($enquiry->message)
<p>Question: {{$enquiry->message}}</p>
@endif