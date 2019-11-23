@extends('layouts/entry')
@section('content')
    <div class="entry-content">
        <div class=logo-entry-container>
            <img src="/images/logo.svg" alt="Internsheep logo" class="logo logo-entry">
        </div>
        <h2>Meld aan | <a href="{{ url('/auth/redirect/facebook') }}" class="btn-social">via face<span>bok</span></a></h2>
        
        <div class="login-container">
            <form action="{{action('EntryController@handleLogin')}}" method="post">
                @if(!empty($error))
                    <div class="alert alert-danger">{{$error}}</div>
                @endif

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{$email?? ''}}">
                </div>
                
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="link-redirect-container">
                    <a href="/signup" class="link-redirect">Heb je nog geen profiel? Registreer hier.</a>
                </div>

                <div class="form-group btn-container">
                    <input type="submit" value="Aanmelden" class="btn btn-primary">
                </div>

            {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection