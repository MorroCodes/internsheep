@extends('layouts/app')
@section('content')

<div class="messages-page-container">
    <div class="conversations-container">
        @foreach($conversations as $c)
        <div class="convo-user">
            <h3>{{$c->firstname}} {{$c->lastname}}</h3>
        </div>
        @endforeach
    </div>
    <div class="messages-container">
    @foreach($messages as $m)
        <div class="convo-user">
            <p>{{$m->message}}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection