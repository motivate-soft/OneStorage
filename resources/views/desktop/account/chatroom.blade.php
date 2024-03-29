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
</style>
@endsection

@section('content')
<div class="mx-auto w-full md:w-4/5 lg:w-1/2 px-2 sm:px-10 lg:px-0 py-16">

    <div class="flex mb-24">
        <img class="mx-15 w-40 h-40 rounded-full object-fill" src="{{asset(Auth::user()->profile->avatar)}}" alt="Avatar of Jonathan Reinink">
        <div class="flex flex-col lg:rounded-b-none lg:rounded-r justify-end">
            <div class="branch-title">{{Auth::user()->getName()}}, {{__('frontend_chatlist.welcomeBack')}}</div>
        </div>
    </div>

    <div class="text-primary">

        <div class="flex w-full mb-4">
            <div class="w-1/5">
                <a href="{{route('pages.account')}}">
                    <div class="border text-center branch-tab-active py-6">{{__('frontend_chatlist.personalInformation')}} </div>
                </a>
                <a href="{{route('pages.chatList')}}">
                    <div class="border text-center branch-tab py-6">{{__('frontend_chatlist.information')}}</div>
                </a>
                <a href="{{route('logout')}}">
                    <div class="border text-center branch-tab py-6" style="background-color: white !important;">{{__('frontend_chatlist.logout')}}</div>
                </a>
            </div>

            <div class="w-4/5 ml-2 border">
                <p class="border-b py-2">
                    <a class="mx-4 font_19 robert-regular" href="{{route('pages.chatList')}}" style="color: #C293FC">
                        &lt; {{__('frontend_common.back')}}
                    </a>
                </p>

                <div id="msgWrapper" class="overflow-y-auto" style="max-height: 400px;">
                    @if(isset($thread))
                    @foreach($thread->messages as $key => $message)
                    <div class="flex py-2 mx-4 mb-4 {{$key == count($thread->messages) - 1 ? '' : 'border-b'}} ">
                        <?php
                        // $prevMsg = $key > 0 ? $thread->messages[$key - 1] : null;
                        // $timeInterval = $key > 0 ? $message->created_at->diffInSeconds($prevMsg->created_at) : -1
                        ?>
                        <div>
                            @if($message->user->isAdmin())
                            <img class="object-cover w-20 h-20 rounded-full" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Admin">
                            @else
                            <img class="object-fill w-20 h-20 rounded-full" src="{{asset(Auth::user()->profile->avatar)}}" alt="Avatar">
                            @endif
                        </div>

                        <div class="w-9/10 pl-6">
                            <div class="flex justify-between">
                                <p class="leading-none pt-2 font_19 regular-color">
                                    @if($message->user->isAdmin())
                                        {{__('frontend_common.admin')}} <span class="text-grey font-normal ml-2 robert-regular">{{__('frontend_chatlist.adminAtOneStorage')}}</span>
                                    @else
                                    {{$message->user->getName()}}
                                    @endif
                                </p>
                                <p class="text-right pt-2 font_14 robert-regular">{{$message->created_at->format('d-M-Y H:i')}}</p>
                            </div>
                            <div class="font_19 my-6 robert-regular">
                                <p class="mb-6">{{$message->body}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                @if(isset($thread))
                <form id="msgForm" class="flex border-t p-4" action="{{ route('messages.update', $thread->id) }}" method="post">
                    {{ method_field('put') }}
                    @else
                    <form class="flex border-t p-4" action="{{ route('messages.store') }}" method="post">
                        @endif
                        @csrf
                        @if(isset($_GET['id']))
                        <input type="hidden" name="recipient" value="{{$_GET['id']}}" />
                        @endif
                        <div>
                            <img class="object-fill w-20 h-20 rounded-full" src="{{asset(Auth::user()->profile->avatar)}}" alt="Avatar">
                        </div>

                        <div class="w-9/10 pl-6">
                            <div class="flex justify-between">
                                <p class="leading-none pt-2 font_19 regular-color">
                                    {{Auth::user()->getName()}}
                                </p>
                            </div>
                            <div class="font_16 robert-regular mt-6">
                                <textarea class="border placeholder-gray-600 px-3 py-2 w-full border-gray-300" name="message" placeholder="{{__('frontend_chatlist.replyTo')}}" rows="3"></textarea>
                                <button class="mt-4 mb-3 px-4 py-2 text-center" style="font-size: 17px;background-color: #3F81C7; color:white">{{__('frontend_common.logout')}}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(function() {
        $("#msgWrapper").animate({
            scrollTop: $('#msgWrapper').prop("scrollHeight")
        }, 500);
        window.location.href = "#msgForm";

    })
</script>
@endsection
