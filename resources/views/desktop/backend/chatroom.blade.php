@extends('backend.layouts.app')

@section('title')
<title>{{__('Messages')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <p class="font_25 mb-6">{{ __('backend_messages.chatRoom') }}</p>
    <div class="bg-white border w-1/2">
        <div class="">
            <div class="flex justify-between border-b py-2">
                <a class="mx-4 font_19 robert-regular" href="{{url('/backend/messages')}}" style="color: #C293FC">
                    &lt; {{ __('backend_messages.back') }}
                </a>
                <span class="mr-4">{{ __('backend_messages.to') }}: <?php
                        $names = $thread->participantsString(Auth::id(), ['first_name']);
                        $replyTo = $names ? $names : ('All +' . (App\User::where('role', '!=', 'admin')->count()));
                        $names = explode(',', $names);
                        $count = count($names);
                        if ($count > 3) {
                            $replyTo = $names[0] . ', ' . $names[1] . ', ' . $names[2] . ' ....+' . ($count - 3);
                        }
                        ?>
                    {{$replyTo}}</span>
            </div>

            <div id="msgWrapper" class="overflow-y-auto" style="max-height: 400px;">
                @foreach($thread->messages as $key => $message)
                <div class="flex py-2 mx-4 mb-4 {{$key == count($thread->messages) - 1 ? '' : 'border-b'}} ">
                    <?php
                    // $prevMsg = $key > 0 ? $thread->messages[$key - 1] : null;
                    // $timeInterval = $key > 0 ? $message->created_at->diffInSeconds($prevMsg->created_at) : -1
                    ?>
                    <div>
                        @if($message->user->isAdmin())
                        <img class="object-fill w-20 h-20 rounded-full" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Admin">
                        @else
                        <img class="object-fill w-20 h-20 rounded-full" src="{{asset($message->user->profile->avatar)}}" alt="Avatar">
                        @endif
                    </div>

                    <div class="w-9/10 pl-6">
                        <div class="flex justify-between">
                            <p class="leading-none pt-2 font_19 regular-color">
                                @if($message->user->isAdmin())
                                Admin <span class="text-grey font-normal ml-2 robert-regular">Admin at OneStorage</span>
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
            </div>

            <form id="msgForm" class="flex border-t p-4" style="background-color: #F9FAFB;" action="{{ route('messages.update', $thread->id) }}" method="post">
                {{ method_field('put') }}
                @csrf
                <div>
                    <img class="object-fill w-20 h-20 rounded-full" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                </div>

                <div class="w-9/10 pl-6">
                    <div class="flex justify-between">
                        <p class="leading-none pt-2 font_19 regular-color">
                            {{Auth::user()->getName()}}
                        </p>
                    </div>
                    <div class="font_16 robert-regular mt-6">
                        <textarea class="border placeholder-gray-600 px-3 py-2 w-full border-gray-300" name="message" placeholder="{{ __('backend_messages.replyTo').$replyTo }}" rows="3"></textarea>
                        <button class="mt-4 mb-3 px-4 py-2 text-center" style="font-size: 17px;background-color: #3F81C7; color:white">{{ __('backend_messages.send') }}</button>
                    </div>
                </div>
            </form>
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
