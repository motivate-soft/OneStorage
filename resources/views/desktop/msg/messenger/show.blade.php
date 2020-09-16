@extends('msg.layouts.master')

@section('content')
    <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('msg.messenger.partials.messages', $thread->messages, 'message')

        @include('msg.messenger.partials.form-message')
    </div>
@stop
