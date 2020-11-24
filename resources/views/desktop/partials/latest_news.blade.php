<?php
$latest_news = \App\Blog::getLatestNotifyNews();
?>
@if($latest_news)
<div class="flex w-full justify-center" style="background-color: #8E96FF;">
    <a href="{{route('pages.news', $latest_news->_id)}}" class="flex my-1">
        <div class="text-center  px-4 py-1 m-2" style="color: white;">{{__('frontend_header.latestNews')}}</div>
        <div class="text-center  px-4 py-1 m-2 break-all" style="color: white;">{{ mb_strimwidth($latest_news->title, 0, 40, "...")}}</div>
        <div class="text-center px-4 py-1 m-2 rounded-sm" style="color: #4D5567; background-color: #FABD02;">{{__('frontend_header.view')}}</div>
    </a>
</div>
@endif
