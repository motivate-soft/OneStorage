<?php
$latest_news = App\Blog::orderBy('created_at', 'desc')->first();
?>
@if($latest_news)
<div class="flex w-full justify-center" style="background-color: #8E96FF;">
    <a href="{{url('/news/'.$latest_news->id)}}" class="flex my-1">
        <div class="text-center  px-4 py-1 m-2" style="color: white;">最新消息</div>
        <div class="text-center  px-4 py-1 m-2" style="color: white;">{{$latest_news->title}}</div>
        <div class="text-center px-4 py-1 m-2 rounded-sm" style="color: #4D5567; background-color: #FABD02;">查看</div>
    </a>
</div>
@endif