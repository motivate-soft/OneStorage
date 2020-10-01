@extends('layouts.app')

@section('title')
<title>{{__('Chat List')}}</title>
@endsection

@section('styles')
<link href="{{ asset('css/common.css')}}" rel="stylesheet">
<link href="{{ asset('css/mobileCss.css')}}" rel="stylesheet">
<style>
    .robert-font {
        font-family: "RobertBlack";
    }
</style>
@endsection

@section('latest_news')

@endsection

@section('header')
@include('layouts.header')
@endsection

@section('content')

<?php
$user = Auth::user();
?>
<div class=" mt-10 robert-font mb-8 fontsize-25 regular-color pt-4 text-center px-5">{{$user->getName()}}, 歡迎你回來!</div>

<div class="w-full pb-8">

    <div class=" flex w-full">
        <div class="w-1/5"></div>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color bg-grey" href="{{url('account')}}">個人資料</a>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color" href="{{url('chatlist')}}">信息</a>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color" href="{{url('logout')}}">登出</a>
        <div class="w-1/5"></div>
    </div>

    <div class=" w-full border pt-2 px-2">
        <?php
        $threads = Cmgmyr\Messenger\Models\Thread::where('subject', '!=', App\Helper\Helper::$MESSAGE_TYPE_BROADCAST)->forUser(Auth::id())->latest('updated_at')->get();
        ?>
        @if(count($threads))
        @foreach($threads as $thread)

        <a class="flex items-center border-b pt-1 pb-2 mx-2" href="{{url('chatroom/'.$thread->id)}}">
            <div class=" w-1/6">
                <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
            </div>
            <?php $unreadCnt = $thread->userUnreadMessagesCount(Auth::id()) ?>
            <div class=" w-5/6">
                <div class="flex justify-between">
                    <span class="robert-font leading-none pt-3 fontsize-14 regular-color relative {{$unreadCnt ? 'has-new-msg' : ''}}">
                        Admin - {{$thread->participantsString(Auth::id(), ['first_name'])}}
                    </span>
                    <p class="text-right pt-2 pr-2 font_11 font-robert">{{$thread->latestMessage->created_at->format('d-M-Y')}}</p>
                </div>
                <p class="pt-1 fontsize-13 regular-color {{$unreadCnt ? 'robert-black' : 'robert-regular'}}">{{ mb_strimwidth($thread->latestMessage->body, 0, 40, "...") }}</p>
            </div>
        </a>
        @endforeach
        @endif
        @foreach(Auth::user()->getUnConnectedAdmins() as $admin)
        <a class="flex items-center border-b pt-1 pb-2 mx-2" href="{{url('chatroom?id='.$admin->id)}}">
            <div class=" w-1/6">
                <img class=" w-12 h-12 rounded-full mr-4" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
            </div>
            <div class=" w-5/6">
                <div class=" flex">
                    <p class="  robert-font w-4/6 leading-none pt-2 fontsize-14 regular-color">Admin - {{$admin->first_name}}</p>
                </div>
                <p class="text-xs text-blue-500 mt-1">Click here to chat with Admin</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
@endsection

@section('footer')

@endsection