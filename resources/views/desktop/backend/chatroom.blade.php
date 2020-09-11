@extends('backend.layouts.app')

@section('title')
<title>{{__('Enquiries')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <p class="font_25 mb-6">Chat Room</p>
    <div class="bg-white border w-1/2">
        <div class="">
            <p class="border-b py-2">
                <a class="mx-4 font_19 robert-regular" href="{{url('/backend/messages')}}" style="color: #C293FC">
                    &lt; Back
                </a>
            </p>
            <div class="flex border-b py-2 mx-4 mb-4">
                <div>
                    <img class="object-none" src="{{asset('images/contactUs/Intersection18@2x.png')}}" alt="Avatar of Jonathan Reinink">
                </div>

                <div class="w-9/10 pl-6">
                    <div class="flex justify-between">
                        <p class="leading-none pt-2 font_19 regular-color">
                            Admin - Tom <span class="text-grey font-normal ml-2 robert-regular">Admin at OneStorage</span>
                        </p>
                        <p class="text-right pt-2 font_14 robert-regular">18-Jul-2020 14:00</p>
                    </div>
                    <div class="font_19 my-6 robert-regular">
                        <p class="mb-6">你好! Paul Smith, 提提你要繳費. </p>
                        <p class="mb-6">應繳費用 $ xxxx</p>
                        <p class="mb-6">thanks!</p>
                        <p class="mb-6">Tom</p>
                    </div>
                </div>
            </div>
            <div class="flex py-2 mx-4 mb-4">
                <div>
                    <img class="object-none" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                </div>

                <div class="w-9/10 pl-6">
                    <div class="flex justify-between">
                        <p class="leading-none pt-2 font_19 regular-color">
                            Paul Smith
                        </p>
                        <p class="text-right pt-2 font_14 robert-regular">28-Jul-2020 14:00</p>
                    </div>
                    <div class="font_19 my-6 robert-regular">
                        <p class="mb-6">Thank you!</p>
                    </div>
                </div>
            </div>

            <form class="flex border-t p-4" style="background-color: #F9FAFB;">
                <div>
                    <img class="object-none" src="{{asset('images/contactUs/Intersection15.png')}}" alt="Avatar of Jonathan Reinink">
                </div>

                <div class="w-9/10 pl-6">
                    <div class="flex justify-between">
                        <p class="leading-none pt-2 font_19 regular-color">
                            Paul Smith
                        </p>
                    </div>
                    <div class="font_16 robert-regular mt-6">
                        <textarea class="border placeholder-gray-600 px-3 py-2 w-full border-gray-300" placeholder="Reply to Tom..." rows="3"></textarea>
                        <button class="mt-4 mb-3 px-4 py-2 text-center" style="font-size: 17px;background-color: #3F81C7; color:white">送出</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('scripts')
@endsection