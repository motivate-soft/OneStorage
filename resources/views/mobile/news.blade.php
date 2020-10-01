@extends('layouts.app')

@section('title')
<title>{{__('空間計算器')}}</title>
@endsection

@section('styles')
<style>
    .w-120 {
        width: 30rem;
    }
</style>

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="bg-white pb-10 my-10">
    <div class="grid grid-cols-1 gap-4">
        <div class="col-span-2 mr-5 ">
            <div class="text-left pb-5 ml-5" style="border-bottom-width:1px">
                <h1 class="font_21" style="color: #7E3E97;">{{$blog->title}}</h1>
                <p class="font_19 mt-4">{{$blog->created_at->format('F j, Y')}}</p>
            </div>
            <div class="text-left ml-5 mt-5">
                <img class=" h-40 w-120 pb-4" src="{{asset($blog->image)}}" class=" mt-4">
                <div style="background-color:#F9F9F9">
                    <div class="pt-5 px-5 pb-5">
                        <h1 class="font_19 text-justify">
                            <?php echo nl2br($blog->content) ?>
                        </h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-span-2">

        </div>
        <div class=" col-span-2 mx-3">
            <div class="text-left pt-10 pb-5">
                <div class="px-2 pb-8">
                    <h1 class="font_21">空間計算器</h1>
                </div>
                <?php
                $latest_news = App\Blog::orderBy('created_at', 'desc')->take(4)->get();
                $count = count($latest_news);
                ?>
                @foreach($latest_news as $index => $news)
                <a href="{{url('/news/'.$news->id)}}" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                    <img class="h-24 w-24 ml-0 mb-4" src="{{asset($news->thumbnail)}}">
                    <div class="text-left">
                        <p class="h-24 font_19 md:text-left lg:text-left leading-normal px-3 overflow-y-hidden">
                            <?php echo nl2br($news->content) ?>
                        </p>
                    </div>
                </a>
                @if($index != $count - 1)
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer')
@include('layouts.footer')
@endsection