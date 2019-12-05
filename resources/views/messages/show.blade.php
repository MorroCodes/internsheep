@extends('layouts/app')
@section('content')

<div class="messages-page-container">
    <div class="conversations-container">
        @foreach($conversations as $c)
        <div class="convo-user">
        <a href="/conversations/{{$c->id}}"><h3>{{$c->firstname}} {{$c->lastname}}</h3></a>
        </div>
        @endforeach
    </div>
    <div class="messages-container">
        /** show messages of conversation */
    </div>
</div>



@endsection