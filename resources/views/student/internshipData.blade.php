@extends('layouts/main')

@section('content')

<div class="popup">
    <form action="{{ action('AccountController@ApplyInternship') }}" method="post">

        <input type="hidden" name="company" value="{{$internship->company_id}}">
        <input type="hidden" name="internship" value="{{$internship->id}}">
        <div class="form-group">
            <label for="reason">Waarom wil je hier stage doen?</label>
            <textarea name="reason" class="form-control" id="reason"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Solliciteren</button>
        {{csrf_field()}}
    </form>
    <img class="close" src="../img/close.svg">
</div>

<div class="container">
    <h3>{{$internship->title}}</h3>
    <h5>{{$internship->catch_phrase}}</h5>
    <p>{{$internship->description}}</p>
    @if(\Auth::user()->type == "student")
        <a href="#" class="badge badge-dark apply">Solliciteren voor deze vacature</a>
    @endif
</div>
@endsection
