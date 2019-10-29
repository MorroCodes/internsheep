@extends('layouts/entry')
@section('content')
    <h2>Meld aan</h2>
    <a href="">Meld aan via facebook</a>

    <form action="{{action('EntryController@handleLogin')}}" method="post">
        @if(!empty($error))
            <div class="alert alert-danger">{{$error}}</div>
        @endif

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" placeholder="E-mail" name="email" class="form-control" value="{{$email?? ''}}">
        </div>
        
        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" placeholder="Wachtwoord" name="password" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" value="Aanmelden" class="btn btn-primary">
        </div>

    {{csrf_field()}}
    </form>
@endsection