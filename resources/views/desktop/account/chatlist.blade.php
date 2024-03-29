@extends('layouts.app')

@section('title')
<title>{{ __('frontend_title.messeng') }}</title>
@endsection

@section('styles')
<style>
    #main-content {
        font-family: "RobertBlack";
    }

    body {
        background-color: white !important;
    }

    .inbox {
        position: relative;
    }

    .has-msg::after {
        content: '';
        width: 10px;
        height: 10px;
        border-radius: 9999px;
        background-color: #FB6767;
        right: -20px;
        margin-top: 2px;
        position: absolute;
    }
</style>
@endsection

@section('content')
<div class="mx-auto w-full md:w-4/5 lg:w-1/2 px-2 sm:px-10 lg:px-0 py-16">

    <div class="flex mb-24">
        <!-- <img class="mx-15 object-none" src="{{asset('images/contactUs/Intersection 15@2x.png')}}" alt="Avatar of Jonathan Reinink"> -->
        <img class="mx-15 w-40 h-40 rounded-full object-fill" src="{{asset(Auth::user()->profile->avatar)}}" alt="Avatar of Jonathan Reinink">
        <div class="flex flex-col lg:rounded-b-none lg:rounded-r justify-end">
            <div class="branch-title">{{Auth::user()->getName()}}, {{__('frontend_chatlist.welcomeBack')}}</div>
        </div>
    </div>

    <div class="text-primary">

        <div class="flex w-full mb-4">
            <div class="w-1/5">
                <a href="{{route('pages.account')}}">
                    <div class="border text-center branch-tab-active py-6">{{__('frontend_chatlist.personalInformation')}}</div>
                </a>
                <a href="{{route('pages.chatList')}}">
                    <div class="border text-center branch-tab py-6">{{__('frontend_chatlist.information')}}</div>
                </a>
                <a href="{{route('logout')}}">
                    <div class="border text-center branch-tab py-6" style="background-color: white !important;">{{__('frontend_chatlist.logout')}}</div>
                </a>
            </div>

            <div class="w-4/5 ml-2">
                <?php
                $threads = Cmgmyr\Messenger\Models\Thread::where('subject', '!=', App\Helper\Helper::$MESSAGE_TYPE_BROADCAST)->forUser(Auth::id())->latest('updated_at')->get();
                ?>
                @if(count($threads))
                @foreach($threads as $thread)
                <a class="flex border py-3 px-4 cursor-pointer" href="{{route('pages.chatRoom', $thread->id)}}">
                    <img class="object-center rounded-full inline w-20 h-20" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">

                    <?php $unreadCnt = $thread->userUnreadMessagesCount(Auth::id()) ?>
                    <div class="w-9/10 pl-6 pt-2">
                        <div class="flex justify-between">
                            <span class="leading-none pt-2 font_19 regular-color relative {{$unreadCnt ? 'has-new-msg' : ''}}">
                                {{--Admin - {{$thread->participantsString(Auth::id(), ['first_name'])}}--}}
                                Admin
                            </span>
                            <p class="text-right pt-2 font_14 robert-regular">{{$thread->latestMessage->created_at->format('d-M-Y')}}</p>
                        </div>
                        <div class="font_19 mt-2 robert-regular">
                            <!-- <p class="">{{ $thread->latestMessage->body }}</p> -->
                            <span class="{{$unreadCnt ? 'robert-black' : 'robert-regular'}}">{{ mb_strimwidth($thread->latestMessage->body, 0, 40, "...") }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
                @else
                @foreach(Auth::user()->getUnConnectedAdmins() as $admin)
                <a class="flex border py-3 px-4 cursor-pointer" href="{{route('pages.chatRoom').'?id='.$admin->id}}">
                    <img class="object-center rounded-full inline w-20 h-20" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">

                    <div class="w-9/10 pl-6 pt-2">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                {{--Admin - {{$admin->first_name}}--}}
                                Admin
                            </p>
                            <!-- <p class="text-right pt-2 font_14 robert-regular">28-Jul-2020</p> -->
                        </div>
                        <div class="font_19 mt-2 robert-regular">
                            <p class="text-xs text-blue-500">{{__('frontend_chatlist.goAdminChat')}}</p>
                        </div>
                    </div>
                </a>
                @break
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection
