@extends('mobile.layouts.app')

@section('title')
<title>{{__('空間計算器')}}</title>
@endsection

@section('styles')

@endsection

@section('content')
<div class="bg-white my-8">
    <div class=" text-center text-5xl p-10">
        <h1 class="font_21">空間計算器</h1>
    </div>
    @if(count($users)>0)
    @foreach($users as $user)
    <a href="{{url('news')}}" class="flex mt-2 px-5">
        <img class=" h-32 w-32 " src="{{asset('images/latest_news/Image 35.png')}}">
        <div class="text-justify">
            <p class="font_19 leading-normal pl-5">
                【搬屋冇煩惱】搬屋前一定要知嘅小貼士
            </p>
            <p class="font_19 text-justify my-4 leading-normal pl-5">
                因應最近新型肺炎疫情，至尊迷你倉 <b>ONE </b>
            </p>
        </div>
    </a>
    <div class="rounded-lg px-5 mb-3">
        <hr>
    </div>
    @endforeach
    @endif
</div>
@endsection


@section('scripts')

@endsection


@section('footer')
@include('layouts.footer')
@endsection