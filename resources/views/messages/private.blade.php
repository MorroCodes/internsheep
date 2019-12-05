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
    @foreach($messages as $m)
        <div class="convo-user">
            @if($m->author_id == session('id'))
            <p class="own-message">{{$m->message}}</p>
            @else 
            <p>{{$m->message}}</p>
            @endif
        </div>
        @endforeach
    </div>

<form action="{{route('sendMessage',[$messages[0]->conversation_id])}}" method="post">
    <input type="hidden" name="company" value="{{$messages[0]->company_id}}">
    <input type="hidden" name="student" value="{{$messages[0]->student_id}}">
    <input type="text" name="message">
    <input type="submit" value="verstuur bericht">
    {{csrf_field()}}
</form>
    
</div>

@endsection