@extends('layouts.app')

@section('title')
    @if($blog)
    @php
    $title =strip_tags($blog->title);
    
    @endphp
    <meta name="keywords" content="{{$seoTag?$seoTag->seo_keyword:'' }}">
    <meta name="title" content="{{$seoTag?$seoTag->seo_title:'' }}">
    <meta name="content" content="{{$seoTag?$seoTag->seo_content:'' }}">
    <meta name="description" content="{{$seoTag?$seoTag->seo_description:'' }}">
        <title>{!! __('迷你倉 | '. $title .' | 至尊迷你倉 One Storage') !!}</title>
    @else
        <title>{{__('迷你倉 | 至尊迷你倉 One Storage')}}</title>
    @endif
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
    
    .leading-normal table  tr td {
        border: 1px solid #d2d6dc !important;
    }

    
    .leading-normal ol{
        list-style-position: inside !important;
        list-style: decimal;
    }
    .leading-normal ul{
        list-style-position: inside !important;
        list-style: disc;
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
                    <h1 class="font_36 text-purple break-all pr-8">{!! $blog->title !!}</h1>
                    <p class="text2 text-xl mt-4">{{ __('frontend_latestNews.publishDate') }}: {{$blog->publish_date->format('d-m-Y')}}</p>
                </div>
                <div class="text-left ml-10 mt-5">
                    <img class="pb-4" src="{{asset($blog->image)}}" alt="{{$seoTag?$seoTag->alt_field:''}}">
                    <div class="bg-grey-1 py-5 px-5 mb-8">
                        <div class="font_19 robert-black text-justify leading-normal break-words">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1 mx-0">
                <div class="text-left pt-10 pb-5">
                    <div class="text-3xl">
                        <h1 class="font_25 pt-4">{{ __('frontend_latestNews.other') }}</h1>
                    </div>
                    <?php
                    $latest_news = App\Blog::getNewses(4);
                    $count = count($latest_news);
                    ?>
                    @foreach($latest_news as $index => $news)
                    <a href="{{route('pages.news', $news->_id)}}" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                        <img class="h-24 w-24 ml-0 mb-4" src="{{asset($news->thumbnail)}}" >
                        <div class="text-left px-3 font_17" style="width: calc(100% - 6rem)">
                            <p class="truncate font-bold leading-relaxed mb-1">{!! $news->title !!}</p>
                            <p class="leading-normal break-all news-short-content pt-1" >
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
