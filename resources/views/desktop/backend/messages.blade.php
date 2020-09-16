@extends('backend.layouts.app')

@section('title')
<title>{{__('Messages')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="w-1/2 mb-8">
        <p class="font_25 mb-6">Messages</p>
        <div class="border bg-white mb-6 px-2">
            <?php
            $threads = Cmgmyr\Messenger\Models\Thread::forUser(Auth::id())->get();
            ?>
            @foreach($threads as $thread)
            <a class="flex border-b py-3 px-4 cursor-pointer" href="{{url('backend/chatroom/'.$thread->id)}}">
                <div>
                    <img class="object-none" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                </div>

                <div class="w-9/10 pl-6 pt-2">
                    <div class="flex justify-between">
                        <p class="leading-none pt-2 font_19 regular-color">
                            Admin - {{$thread->participantsString(Auth::id(), ['first_name'])}}
                            <?php $unreadCnt = $thread->userUnreadMessagesCount(Auth::id()) ?>
                            @if($unreadCnt)
                            <span class=" text-sm text-red-500">({{ $unreadCnt }} new msgs)</span>
                            @endif
                        </p>
                        <p class="text-right pt-2 font_14 robert-regular">{{$thread->latestMessage->created_at->format('d-M-Y')}}</p>
                    </div>
                    <div class="font_19 mt-2 robert-regular">
                        <p class="">{{ $thread->latestMessage->body }}</p>
                    </div>
                </div>
            </a>
            @endforeach
         
        </div>

        <p class="font_25 mb-1">Broadcase message</p>

        <div class="bg-white border py-2 pl-px pr-8 robert-regular">
            <div class="flex mb-4">
                <span class="text-right w-1/6 mr-2 mt-4">To:</span>
                <div class="w-1/2">
                    <input placeholder="" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="title" type="text" id="title">
                    <span class="font_13 pl-2">*type user ID (separate by comma if multiple) or ALL</span>
                </div>
            </div>
            <div class="flex mb-4">
                <span class="text-right w-1/6 mr-2 mt-1">Message:</span>
                <textarea placeholder="" name="content" required rows="4" class="w-5/6 form-input appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
            </div>
            <div class="flex mb-4 robert-black">
                <span class="w-1/6"></span>
                <button type="submit" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #B881FD;">Send</button>
            </div>
        </div>
    </div>


</div>
@endsection

@section('scripts')
@endsection