@extends('backend.layouts.app')

@section('title')
<title>{{__('Messages')}}</title>
@endsection

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="w-1/2 mb-8">
        <p class="font_25 mb-2">Messages</p>
        <div class="flex justify-end">
            <span class="font_12 mb-4">Last messages</span>
        </div>

        <div class="border bg-white mb-6 px-2">
            <?php
            $threads = Cmgmyr\Messenger\Models\Thread::forUser(Auth::id())->latest('updated_at')->paginate(5);
            $count = count($threads);
            $i = 0;
            ?>
            @foreach($threads as $thread)
            <a class="flex {{($i++) == $count - 1 ? '' : 'border-b'}} py-3 px-4 cursor-pointer" href="{{url('backend/chatroom/'.$thread->id)}}">
                <img class=" object-center rounded-full inline" width="72" height="72" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                <?php $unreadCnt = $thread->userUnreadMessagesCount(Auth::id()) ?>
                <div class="w-full pl-6 pt-2">
                    <div class="flex justify-between">
                        <span class="leading-none pt-2 font_19 regular-color relative {{$unreadCnt ? 'has-new-msg' : ''}}">
                            Admin - {{$thread->participantsString(Auth::id(), ['first_name'])}}&nbsp;&nbsp;
                        </span>
                        <p class="text-right pt-2 font_14 robert-regular">{{$thread->latestMessage->created_at->format('d-M-Y')}}</p>
                    </div>
                    <div class="flex justify-between font_19 mt-2">
                        <span class="{{$unreadCnt ? 'robert-black' : 'robert-regular'}}">{{ mb_strimwidth($thread->latestMessage->body, 0, 40, "...") }}</span>
                    </div>
                </div>
            </a>
            @endforeach
            
            {{ $threads->links() }}
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