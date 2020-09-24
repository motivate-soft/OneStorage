@extends('layouts.app')

@section('title')
<title>{{__('最新資訊')}}</title>
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

<div class="bg-white mx-auto w-3/5 mb-10 floating-panel">
    <div class=" text-center text-5xl py-10">
        <span class="font_35 font-bold">最新資訊</span>
    </div>
    <?php
    $index = 0;
    $blogs = App\Blog::orderBy('updated_at', 'desc')->paginate(10);
    $count = count($blogs);
    ?>
    @foreach($blogs as $blog)
    <a href="{{url('/news/'.$blog->id)}}" class="lg:flex rounded-lg mt-2 lg:py-3 lg:px-10">
        <img class="w-32 h-32 mr-10 md:mb-4 object-cover" src="{{asset($blog->thumbnail)}}">
        <div class="w-full">
            <p class="font_19 md:text-center lg:text-left leading-normal px-10 lg:px-0">{{$blog->title}}</p>
            <p class="font_12 robert-regular mt-2 ml-1"> 刊登日期:{{$blog->created_at->format('d-m-Y')}}</p>

            <p class="font_16 w-2/3 text-justify mt-6 mb-4 leading-normal ml-1">{{ mb_strimwidth($blog->content, 0, 120, "...")}}</p>
            
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

    {{ $blogs->links() }}
</div>
@endsection


@section('scripts')

@endsection


@section('footer')
@include('layouts.footer')
@endsection