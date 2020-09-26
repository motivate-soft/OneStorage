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
            <span class="font_12 mb-4">Last messaged</span>
        </div>

        <div class="border bg-white mb-6 px-2">
            <?php
            $threads = Cmgmyr\Messenger\Models\Thread::forUser(Auth::id())->latest('updated_at')->orderBy('subject')->paginate(5);
            $count = count($threads);
            // $i = 0;
            ?>
            @foreach($threads as $thread)
            <?php
            $receipient = $thread->participants()->where('user_id', '!=', Auth::id())->first();
            ?>
            @if($thread->subject != App\Helper\Helper::$MESSAGE_TYPE_BYADMIN || Cmgmyr\Messenger\Models\Message::where('thread_id', $thread->id)->where('user_id', $receipient->user_id)->first())
            <a class="flex border-b py-3 px-4 cursor-pointer" href="{{url('backend/chatroom/'.$thread->id)}}">
                <img class=" object-center rounded-full inline" style="height: 72px" src="{{asset($thread->subject == App\Helper\Helper::$MESSAGE_TYPE_BROADCAST ? 'images/contactUs/Intersection18@2x.png' : 'images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                <?php $unreadCnt = $thread->userUnreadMessagesCount(Auth::id()) ?>
                <div class="w-full pl-6 pt-2">
                    <div class="flex justify-between">
                        <span class="leading-none pt-2 font_19 regular-color relative {{$unreadCnt ? 'has-new-msg' : ''}}">
                            @if($thread->subject == App\Helper\Helper::$MESSAGE_TYPE_BROADCAST)
                            Admin -
                            @endif
                            <?php
                            $names = $thread->participantsString(Auth::id(), ['first_name']);
                            $string = $names ? $names : ('All +' . (App\User::where('role', '!=', 'admin')->count()));
                            $names = explode(',', $names);
                            $count = count($names);
                            if ($count > 3) {
                                $string = $names[0] . ', ' . $names[1] . ', ' . $names[2] . ' ....+' . ($count - 3);
                            }
                            ?>
                            {{$string}}
                            &nbsp;&nbsp;
                        </span>
                        <p class="text-right pt-2 font_14 robert-regular">{{$thread->latestMessage->created_at->format('d-M-Y')}}</p>
                    </div>
                    <div class="flex justify-between font_19 mt-2">
                        <span class="{{$unreadCnt ? 'robert-black' : 'robert-regular'}}">{{ mb_strimwidth($thread->latestMessage->body, 0, 40, "...") }}</span>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
            @if($count)
            {{ $threads->links() }}
            @endif
        </div>


        <p class="font_25 mb-1">Broadcase message</p>

        <form class="bg-white border py-2 pl-px pr-8 robert-regular" method="post" action="{{url('/backend/broadcast')}}">
            @csrf
            <div class="flex mb-4">
                <span class="text-right w-1/6 mr-2 mt-4">To:</span>
                <div class="w-1/2">
                    <input required placeholder="" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="recipient" type="text" id="title">
                    <span class="font_13 pl-2">*type user ID (separate by comma if multiple) or ALL</span>
                </div>
            </div>
            <div class="flex mb-4">
                <span class="text-right w-1/6 mr-2 mt-1">Message:</span>
                <textarea placeholder="" name="message" required rows="4" class="w-5/6 form-input appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
            </div>
            <div class="flex mb-4 robert-black">
                <span class="w-1/6"></span>
                <button type="submit" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #B881FD;">Send</button>
            </div>
        </form>
    </div>


</div>
@endsection

@section('scripts')
<script>
    $(function() {
        var checkAll = window.localStorage.getItem(allKey);
        var ids = window.localStorage.getItem(key);
        if (checkAll == "1") {
            $("input[name='recipient']").val("All");
        } else {
            if (ids == null || ids.length == 0) {
                ids = [];
            } else {
                ids = ids.split(',');
            }
            var recipients = "";
            for (var i = 0; i < ids.length; i++) {
                recipients += ('M' + ids[i].padFunction('0', 5));
                if(i != ids.length - 1){
                    recipients += ',';
                }
            }
            $("input[name='recipient']").val(recipients);
        }
    })
</script>

@endsection