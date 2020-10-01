@extends('layouts.app')

@section('title')
<title>{{__('Chat Room')}}</title>
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

<div class="mt-10 robert-font mb-8 fontsize-25 regular-color text-center px-5 pt-4">{{Auth::user()->getName()}}, 歡迎你回來!</div>
<div class="w-full pb-8">

    <div class=" flex w-full">
        <div class="w-1/5"></div>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color bg-grey" href="{{url('account')}}">個人資料</a>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color" href="{{url('chatlist')}}">信息</a>
        <a class=" w-1/5 border text-center py-3 fontsize-11 regular-color" href="{{url('logout')}}">登出</a>
        <div class="w-1/5"></div>
    </div>

    <div class="border">
        <p class="border-b py-2">
            <a class="mx-4" href="{{url('chatlist')}}" style="font-size: 19px; color: #C293FC">
                &lt; Back
            </a>
        </p>
        <div id="msgWrapper" class="overflow-y-auto" style="max-height: 400px;">
            @if(isset($thread))
            @foreach($thread->messages as $key => $message)
            <div class="flex py-2 mx-4 mb-4 {{$key == count($thread->messages) - 1 ? '' : 'border-b'}} ">
                <div class="w-1/5">
                    @if($message->user->isAdmin())
                    <img class="w-12 h-12 mt-2" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Admin">
                    @else
                    <img class="w-12 h-12 mt-2 rounded-full object-fill" src="{{asset(Auth::user()->profile->avatar)}}" alt="Avatar">
                    @endif
                </div>

                <div class="w-4/5">
                    <div class="justify-between">
                        <div class="flex regular-color">
                            <div class="robert-font w-1/2 leading-none pt-2 fontsize-14">
                                @if($message->user->isAdmin())
                                Admin - {{$message->user->first_name}}
                                @else
                                {{$message->user->getName()}}
                                @endif
                            </div>
                            <div class="w-1/2 text-right right-0 pt-2 font_11 regular-color">{{$message->created_at->format('d-M-Y H:i')}}</div>
                        </div>
                        @if($message->user->isAdmin())
                        <p class="text-grey mt-2">Admin at OneStorage</p>
                        @endif
                    </div>
                    <div class="fontsize-13 my-6">
                        <p class="mb-6">{{$message->body}}</p>

                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @if(isset($thread))
        <form id="msgForm" class="flex bg-grey border-t p-4" action="{{ route('messages.update', $thread->id) }}" method="post">
            {{ method_field('put') }}
            @else
            <form class="flex border-t bg-grey p-4" action="{{ route('messages.store') }}" method="post">
                @endif
                @csrf
                @if(isset($_GET['id']))
                <input type="hidden" name="recipient" value="{{$_GET['id']}}" />
                @endif
                <div class="w-1/5">
                    <img class="object-fill w-12 h-12 rounded-full" src="{{asset(Auth::user()->profile->avatar)}}" alt="Avatar">
                </div>

                <div class="w-4/5">
                    <div class="flex justify-between">
                        <p class=" robert-font leading-none pt-2 fontsize-16 regular-color">
                            {{Auth::user()->getName()}}
                        </p>
                    </div>
                    <div class="font_16 robert-regular mt-6">
                        <textarea class="border fontsize-13 placeholder-gray-600 px-3 py-2 w-full border-gray-300" name="message" placeholder="Reply to Tom..." rows="3"></textarea>
                        <button class="mt-4 mb-3 px-4 py-2 text-center" style="font-size: 17px;background-color: #3F81C7; color:white">送出</button>
                    </div>
                </div>
            </form>
            <!-- <div class="flex border-b-2 py-2 mx-4 mb-4">


                <img class="h-12 mt-2" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                <div class="w-full ml-4">
                    <div class=" justify-between">
                        <div class=" flex regular-color">
                            <div class=" robert-font w-1/2 leading-none pt-2 fontsize-14">
                                Admin - Tom
                            </div>
                            <div class=" w-1/2 text-right right-0 pt-2 font_11 regular-color">28-Jul-2020</div>
                        </div>
                        <p class="text-grey mt-2">Admin at OneStorage</p>

                    </div>
                    <div class="fontsize-13 my-6">
                        <p class="mb-6">你好! Paul Smith, 提提你要繳費. </p>
                        <p class="mb-6">應繳費用 $ xxxx</p>
                        <p class="mb-6">thanks!</p>
                        <p class="mb-6">Tom</p>
                    </div>
                </div>
            </div>
            <div class="flex py-2 mx-4 mb-4">
                <img class="h-12 mt-2" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Paul Smith">
                <div class="w-full ml-4">
                    <div class="flex justify-between">
                        <p class=" robert-font w-1/2 leading-none pt-2 fontsize-14 regular-color">
                            Paul Smith
                        </p>
                        <p class=" w-1/2 text-right right-0 pt-2 font_11 regular-color">28-Jul-2020</p>
                    </div>
                    <div class="fontsize-13 my-6">
                        <p class="mb-6">Thank you!</p>
                    </div>
                </div>
            </div>


            <form class="flex border-t bg-grey pt-2 pb-6 px-4">
                <img class="h-12 mt-2" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Paul Smith">
                <div class="w-full ml-4">
                    <p class=" robert-font leading-none pt-2 fontsize-16 regular-color">
                        Paul Smith
                    </p>
                    <div class="fontsize-13 mt-6">
                        <textarea class="border placeholder-gray-600 px-3 py-2 w-full border-gray-300" placeholder="Reply to Tom..." rows="3"></textarea>
                        <button class="mt-4 mb-3 px-4 py-2 text-center" style="font-size: 17px;background-color: #3F81C7; color:white">送出</button>
                    </div>
                </div>
            </form> -->
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

@section('footer')

@endsection