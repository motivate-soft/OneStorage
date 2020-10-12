@extends('layouts.app')

@section('title')
<title>{{__('迷你倉 | 最新資訊 | 至尊迷你倉 One Storage')}}</title>
@endsection

@section('styles')
<style>
    #main-content {
        font-family: "RobertBlack";
    }
</style>

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')

<img class="w-full" src="{{asset('images/latest_news/bg_lastnews.jpg')}}" />

<div class="bg-white section mb-10 floating-panel">
    <p class="font_35 text-center py-10 font-bold">最新資訊</p>
    <?php
    $index = 0;
    $newses = \App\Blog::getNewses()->paginate(10);
    $count = count($newses);
    ?>
    @foreach($newses as $news)
    <a href="{{url('/news/'.$news->id)}}" class="flex rounded-lg mt-2 py-3 px-10">
        <img class="w-32 h-32 mr-10 md:mb-4 object-cover" src="{{asset($news->thumbnail)}}">
        <div class="" style="width: calc(100% - 8rem);">
            <h1 class="font_19 w-4/5 leading-normal px-0 truncate">{{$news->title}}</h1>
            <p class="font_12 robert-regular mt-2 "> 刊登日期:{{$news->publish_date->format('d-m-Y')}}</p>
            <p class="font_16 w-2/3 text-justify mt-6 mb-4 leading-normal break-all">{{ mb_strimwidth($news->content, 0, 120, "...")}}</p>
        </div>
    </a>
    <?php
    $index++;
    if ($index != $count) {
    ?>
        <div class="rounded-lg lg:px-10 px-10 md:px-20 mb-3">
            <hr>
        </div>
    <?php
    }
    ?>
    @endforeach

    {{ $newses->links() }}
</div>
@endsection


@section('scripts')

@endsection


@section('footer')
@include('layouts.footer')
@endsection
