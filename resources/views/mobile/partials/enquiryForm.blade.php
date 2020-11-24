<form class="form-enquiry" id="enquiryForm" method="post" action="{{route('enquiries.store')}}">
    @csrf
    <input type="hidden" name="page" value="{{$page}}">
    <p class="text2 mb-8">{{__('frontend_enquiry_form.pageSubTitle')}}</p>
    <div class="flex mb-4 w-full">
        <div class="flex w-1/2 input-group">
            <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
            <input class="w-full form-control input-form" type="text" placeholder="{{__('frontend_enquiry_form.lastName')}}" name="firstName" required>
        </div>
        <div class="w-1/2 flex input-group">
            <input class="w-full form-control input-form" style="margin-left: 4px;padding-left:12px" type="text" placeholder="{{__('frontend_enquiry_form.firstName')}}" name="lastName" required>
        </div>
    </div>

    <div class="input-group mb-4">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
        <input class="form-control input-form" type="text" placeholder="{{__('frontend_enquiry_form.mobilePhoneNumber')}}" name="phoneNumber" required>
    </div>

    <div class="input-group mb-8">
        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
        <input class="form-control input-form" type="email" placeholder="{{__('frontend_enquiry_form.email')}}" name="email">
    </div>

    <div class="w-full inline-block relative mb-6">
        <select class="block input-form appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" style="color:#76838f" name="branchName">
            <option value="" selected disabled>{{__('frontend_enquiry_form.emailBranch')}}</option>
            <?php
            $branches = App\Store::all();
            ?>
            @foreach($branches as $branch)
                <option value="{{$branch->branch}}">{{$branch->branch}}</option>
            @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
        </div>
    </div>

    <div class="w-full inline-block relative mb-6">
        <select required class="input-form block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" style="color:#76838f" name="question" id="question-selector">
            <option value="" disabled selected>{{__('frontend_enquiry_form.emailBranchQuestion')}}</option>
            @if(isset($questions))
                @foreach($questions as $question)
                    <option value="{{$question}}">{{$question}}</option>
                @endforeach
            @else
                <option value="{{__('frontend_enquiry_form.findBranch')}}">{{__('frontend_enquiry_form.findBranch')}}</option>
                <option value="{{__('frontend_enquiry_form.appointmentVisit')}}">{{__('frontend_enquiry_form.appointmentVisit')}}</option>
                <option value="{{__('frontend_enquiry_form.sizePrice')}}">{{__('frontend_enquiry_form.sizePrice')}}</option>
                <option value="{{__('frontend_enquiry_form.ohter')}}">{{__('frontend_enquiry_form.other')}}</option>
            @endif
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
        </div>
    </div>

    <div class="w-full mb-6 hidden" id="message-wrapper">
        <textarea class="w-full input-form border placeholder-gray-600 px-3 py-2 border-gray-200 mb-6" style="padding-left:16px;color:#76838f" placeholder="{{__('frontend_enquiry_form.yourMessage')}}" rows="3" name="message"></textarea>
    </div>

    <button class="submit-btn hover:bg-purple-400" data-text="{{__('frontend_enquiry_form.sendOut')}}">
        {{__('frontend_enquiry_form.sendOut')}}
    </button>
</form>
