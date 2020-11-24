<?php
$latest_news = App\Blog::where('used_notify', true)->orderBy('created_at', 'desc')->first();
?>
@if($latest_news)
{{--<div class="flex justify-center" style="background-color: #8E96FF;">--}}
    {{--<a href="{{url('/news/'.$latest_news->id)}}" class="flex my-1">--}}
        {{--<div class=" text-center font_11  px-4 py-1 m-2" style="color: white;">最新消息</div>--}}
        {{--<div class=" text-center  px-4 font_11 py-1 m-2" style="color: white;">{{$latest_news->title}}</div>--}}
        {{--<div class="font_11 text-center px-4 py-1 m-2 rounded-sm" style="color: #4D5567; background-color: #FABD02;">查看</div>--}}
    {{--</a>--}}
{{--</div>--}}
    <div class="py-3 px-4 flex justify-between font_11 text-center" style="background-color: #8E96FF;">
        <div class="text-white my-auto">{{__('frontend_header.latestNews')}}</div>
        <div class="text-white my-auto mx-1 w-1/2 break-all">{{ mb_strimwidth($latest_news->title, 0, 40, "...")}}</div>
        <a href="{{route('pages.news', $latest_news->_id)}}" class="rounded-sm px-4 py-1 my-auto" style="color: #4D5567; background-color: #FABD02;">{{__('frontend_header.view')}}</a>
    </div>
@endif
