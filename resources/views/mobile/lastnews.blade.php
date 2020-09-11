@extends('layouts.app')

@section('title')
<title>{{__('空間計算器')}}</title>
@endsection

@section('styles')

@endsection

@section('accessory')
    @include('partials.accessory')
@endsection

@section('content')
<div class="bg-white my-10">
    <div class=" text-center text-5xl mb-16">
        <h1 class="font_21">空間計算器</h1>
    </div>
    @if(count($users)>0)
    <?php
    $index = 0;
    ?>
    @foreach($users as $user)
    <a href="{{url('/news')}}" class="flex mt-2 px-5">
        <img class="h-32" src="{{asset('images/latest_news/Image 35.png')}}">
        <div class="text-justify">
            <p class="font_19 leading-normal pl-5">
                【搬屋冇煩惱】搬屋前一定要知嘅小貼士
            </p>
            <p class="font_19 text-justify my-4 leading-normal pl-5">
                因應最近新型肺炎疫情，至尊迷你倉 <b>ONE </b>
            </p>
        </div>
    </a>
    <?php
    $index++;
    if ($index != count($users)) {
    ?>
        <div class="rounded-lg lg:px-10 px-10 md:px-20 mb-3">
            <hr>
        </div>
    <?php
    }
    ?>
    @endforeach
    @endif
</div>
@endsection


@section('scripts')

@endsection


@section('footer')
@include('layouts.footer')
@endsection