@extends('msg.layouts.master')

@section('content')
    @include('msg.messenger.partials.flash')

    @each('msg.messenger.partials.thread', $threads, 'thread', 'msg.messenger.partials.no-threads')
@stop
