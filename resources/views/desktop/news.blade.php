@extends('layouts.app')

@section('title')
<title>{{__('新闻')}}</title>
@endsection

@section('styles')
<style>
    .w-120 {
        width: 30rem;
    }

    .news-short-content{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
@if($blog)
<div class="py-10">
    <div class="bg-white section">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2 mr-0">
                <div class="text-left text-5xl pt-10 pb-5 ml-10 border-b">
                    <h1 class="font_36 text-purple break-all pr-8">{{$blog->title}}</h1>
                    <p class="text2 text-xl mt-4">刊登日期: {{$blog->publish_date->format('d-m-Y')}}</p>
                </div>
                <div class="text-left ml-10 mt-5">
                    <img class="pb-4" src="{{asset($blog->image)}}">
                    <div class="bg-grey-1 py-5 px-5 mb-8">
                        <h1 class="font_19 robert-black text-justify leading-normal break-words">
                            <?php echo nl2br($blog->content) ?>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-span-1 mx-0">
                <div class="text-left pt-10 pb-5">
                    <div class="text-3xl">
                        <h1 class="font_25 pt-4">其他資訊</h1>
                    </div>
                    <?php
                    $latest_news = App\Blog::getNewses(4);
                    $count = count($latest_news);
                    ?>
                    @foreach($latest_news as $index => $news)
                    <a href="{{url('/news/'.$news->id)}}" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                        <img class="h-24 w-24 ml-0 mb-4" src="{{asset($news->thumbnail)}}">
                        <div class="text-left px-3 font_17" style="width: calc(100% - 6rem)">
                            <p class="truncate"><strong>{{$news->title}}</strong></p>
                            <p class="leading-normal break-all news-short-content pt-2" >
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
</div>

<div class="bg-white section pt-14 pb-10 mb-10">
    <div class="w-1/3 mx-auto">
        @include('partials.enquiryForm', ['page' => Helper::$SS_FROM_NEWS_PAGE])
    </div>
</div>
@else
<div class="text-center text-4xl py-36">
    No data
</div>
@endif
@endsection


@section('scripts')
<script>
    $(function() {

    });
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
