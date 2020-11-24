<?php
use Illuminate\Support\Facades\App;
?>
<div class="w-96 px-3 bg-white border border-primary h-screen py-5 font_19">
    <div class="mb-11">
        <a href="{{url('/backend')}}"><img class="mx-auto object-fill" width="140" height="70" src="{{asset('images/header/logo@2x.png')}}" /></a>
    </div>

    <div class="flex mb-11">
        <div class="w-full inline-block relative">
            {{--<?php--}}
            {{--$locale = App::getLocale();--}}
            {{--?>--}}
            {{--<select id="language-select" class="text-primary shadow-md block appearance-none w-full bg-white border border-gray-200 px-4 py-4 pr-8 leading-tight focus:outline-none">--}}
                {{--<option value="zh-CN" class="py-2 text-grey-2" {{$locale == "zh-CN" ? "selected" : ""}}>--}}
                    {{--Chinese--}}
                {{--</option>--}}
                {{--<option value="en" class="py-2 text-grey-2" {{$locale == "en" ? "selected" : ""}}>--}}
                    {{--English--}}
                {{--</option>--}}
            {{--</select>--}}
            {{--<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
                {{--<svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
                    {{--<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="flex mb-11">
        <span class="w-32 mx-auto"><a href="{{url('/backend')}}">{{ __('backend_enquiries.title') }}</a></span>
    </div>
    <div class="flex mb-11">
        <span class="w-32 mx-auto"><a href="{{route('backend.stores.show')}}">{{ __('backend_stores.title') }}</a></span>
    </div>
    <div class="flex mb-11">
        <span class="w-32 mx-auto"><a href="{{url('/backend/pages')}}">{{ __('backend_pages.title') }}</a></span>
    </div>
    <div class="flex mb-11">
        <span class="w-32 mx-auto"><a href="{{route('backend.members')}}">{{ __('backend_members.title') }}</a></span>
    </div>
    <div class="flex mb-11">
        <span class="w-32 mx-auto"><a href="{{url('/backend/messages')}}">{{ __('backend_messages.title') }}</a></span>
    </div>
    <div class="flex mb-11">
        <span class="w-32 mx-auto"><a href="{{url('/logout ')}}">{{ __('backend_common.logout') }}</a></span>
    </div>
</div>
