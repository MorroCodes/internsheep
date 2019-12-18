@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">


                <div class="messages-page-container">
                    <div class="conversations-container">
                    
                        <label>Selecteer een gesprek:</label>
                        <select class="contacts-dropdown" name="forma" onchange="location = this.value;">
                            @foreach($conversations as $c)
                                <option value="/conversations/{{$c->id}}" @if($current == $c->id) selected class="selected-convo-option" @endif >{{$c->firstname}} {{$c->lastname}} @if($companyInfo)- {{$companyInfo->company_name}} @endif</option>
                            @endforeach
                        </select>
                    
                    </div>
                    <div class="messages-container">
                        @foreach($messages as $m)
                        <div class="convo-user">
                            @if($m->author_id == session('id'))
                            <div class="single-message-container own-message-container">
                                <p class="message-text own-message">{{$m->message}}</p>
                                <img src="{{asset(Auth::user()->profile_image)}}" alt="profile picture" class="message-picture">
                            </div>
                            
                            @else 
                            <div class="single-message-container other-message-container">
                                <img src="{{asset($m->profile_image)}}" alt="profile picture" class="message-picture">
                                <p class="message-text other-message">{{$m->message}}</p>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                <form action="{{route('sendMessage',[$messages[0]->conversation_id])}}" method="post">
                    <input type="hidden" name="company" value="{{$messages[0]->company_id}}">
                    <input type="hidden" name="student" value="{{$messages[0]->student_id}}">
                    <div class="convo-message-input-container">
                        <input type="text" name="message" class="convo-message-input">
                        <input type="submit" value="verstuur bericht" class="btn btn-primary">
                    </div>
                    {{csrf_field()}}
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection