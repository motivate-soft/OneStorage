@extends('layouts.app')

@section('title')
<title>{{__('最新資訊')}}</title>
@endsection

@section('styles')

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="bg-white py-10">
    <div class=" text-center text-5xl mb-16">
        <h1 class="font_21 pt-4">最新資訊</h1>
    </div>
    <div class="mx-5">
        <?php
        $index = 0;
        $newses = \App\Blog::getNewses()->paginate(10);
        $count = count($newses);
        ?>
        @foreach($newses as $news)
            <a href="{{url('/news/'.$news->id)}}" class="flex mt-2 py-3">
                <img class="w-24 h-24 object-cover mr-6" src="{{asset($news->thumbnail)}}">
                <div class="" style="width: calc(90% - 6rem);">
                    <p class="font_16 leading-normal pl-2 truncate">{{$news->title}}</p>
                    <p class="font_12 robert-regular mt-2 ml-1"> 刊登日期:{{$news->created_at->format('d-m-Y')}}</p>
                    <p class="font_16 my-4 leading-normal pl-2 text-left whitespace-pre-line break-all">{{ mb_strimwidth($news->content, 0, 80, "...")}}</p>
                </div>
            </a>
            <?php
            $index++;
            if ($index != $count) {
            ?>
            <div class="rounded-lg my-3">
                <hr>
            </div>
            <?php
            }
            ?>
        @endforeach

        {{ $newses->links() }}
    </div>
</div>
@endsection


@section('scripts')

@endsection


@section('footer')
@include('layouts.footer')
@endsection
