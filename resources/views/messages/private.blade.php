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

<form action="{{route('sendMessage',[$messages[0]->conversation_id])}}" method="post">
    <input type="hidden" name="company" value="{{$messages[0]->company_id}}">
    <input type="hidden" name="student" value="{{$messages[0]->student_id}}">
    <input type="text" name="message">
    <input type="submit" value="verstuur bericht">
    {{csrf_field()}}
</form>
    
</div>

@endsection