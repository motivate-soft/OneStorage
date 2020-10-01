@extends('layouts.app')

@section('title')
<title>{{__('空間計算器')}}</title>
@endsection

@section('styles')

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
<div class="bg-white py-10">
    <div class=" text-center text-5xl mb-16">
        <h1 class="font_21 pt-4">空間計算器</h1>
    </div>
    <?php
    $index = 0;
    $blogs = App\Blog::orderBy('created_at', 'desc')->paginate(10);
    $count = count($blogs);
    ?>
    @foreach($blogs as $blog)
    <a href="{{url('/news/'.$blog->id)}}" class="flex mt-2 px-5 py-3">
        <img class="w-28 h-28 object-fill mr-6" src="{{asset($blog->thumbnail)}}">
        <div class="">
            <p class="font_16 leading-normal pl-2">{{$blog->title}}</p>
            <p class="font_12 robert-regular mt-2 ml-1"> 刊登日期:{{$blog->created_at->format('d-m-Y')}}</p>
            <p class="font_16 my-4 leading-normal pl-2 text-left whitespace-pre-line">{{ mb_strimwidth($blog->content, 0, 80, "...")}}</p>
        </div>
    </a>
    <?php
    $index++;
    if ($index != $count) {
    ?>
        <div class="rounded-lg px-5 my-3">
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