@extends('layouts.app')

@section('title')
@php 
$title =strip_tags($blog->title);
@endphp
    @if($blog)
    <title>{!! __('迷你倉 | '. $title .' | 至尊迷你倉 One Storage') !!}</title>
    @else
        <title>{{__('迷你倉 | 至尊迷你倉 One Storage')}}</title>
    @endif
@endsection

@section('styles')
<style>
    .news-short-content{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    .news-short-title{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1; /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    .table-style table  tr td {
        border: 1px solid #d2d6dc !important;
    }

    
    .table-style ol{
        list-style-position: inside !important;
        list-style: decimal;
    }
    .table-style ul{
        list-style-position: inside !important;
        list-style: disc;
    }

</style>

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="bg-white pb-10 my-10">
    <div class="grid grid-cols-1 gap-4">
        <div class="col-span-2 mx-5">
            <div class="text-left pb-5" style="border-bottom-width:1px">
                <h1 class="font_21 break-all" style="color: #7E3E97;">{!! $blog->title !!}</h1>
                <p class="font_19 mt-4">{{__('frontend_latestNews.publishDate')}}: {{$blog->publish_date->format('d-m-Y')}}</p>
            </div>
            <div class="text-left mt-5">
                <img class="pb-4" src="{{asset($blog->image)}}">
                <div style="background-color:#F9F9F9">
                    <div class="pt-5 px-5 pb-5">
                        <h1 class="font_19 text-justify break-words break-all table-style">
                            {!! $blog->content !!}
                        </h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-span-2">
            <div class="bg-white px-6 py-10">
                @include('partials.enquiryForm', ['page' => Helper::$SS_FROM_NEWS_PAGE])
            </div>
        </div>
        <div class=" col-span-2 mx-6">
            <div class="text-left pt-10 pb-5">
                <div class="px-2 pb-8">
                    <h1 class="font_21">{{ __('frontend_latestNews.other') }}</h1>
                </div>
                <?php
                $latest_news = App\Blog::getNewses(4);
                $count = count($latest_news);
                ?>
                @foreach($latest_news as $index => $news)
                    <a href="{{route('pages.news', $news->_id)}}" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                        <img class="h-24 w-24 ml-0 mb-4" src="{{asset($news->thumbnail)}}">
                        <div class="px-3 font_19 leading-normal" style="width: calc(100% - 6rem)">
                            <p class="break-all news-short-title mb-1"><strong>{!! $news->title !!}</strong></p>
                            <p class="leading-normal break-all news-short-content pt-2" >
                                <?php //echo nl2br($news->content) ?>
                                {!! strip_tags(mb_strimwidth($news->content, 0, 250, "...")) !!}
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
