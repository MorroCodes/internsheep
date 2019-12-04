@extends('layouts/main')
@section('content')
    

        <h2>Registreer als bedrijf | <a href="{{ url('/auth/redirect/facebook') }}" class="btn-social">via face<span>bok</span></a></h2>
        <div class="container">
        <div class="row justify-content-center">
        <form action="{{action('EntryController@handleCompanySignup')}}" method="post">
        @csrf

            @if(!empty($error))
                <div class="alert alert-danger">{{$error}}</div>
            @endif
            <div class="form-group">
                <label for="firstname">Voornaam</label>
                <div class="col-md-6">
                <input type="text" name="firstname" class="form-control" value="{{$user['firstname'] ?? ''}}">
                </div>
            </div>

            <div class="form-group">
                <label for="lastname">Achternaam</label>
                <input type="text" name="lastname" class="form-control" value="{{$user['lastname'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" value="{{$user['email'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="company_name">Bedrijfsnaam</label>
                <input type="text" name="company_name" class="form-control" value="{{$user['company_name'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="company_bio">Korte bedrijfsomschrijving</label>
                <input type="text" name="company_bio" class="form-control" value="{{$user['company_bio'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_repeat">Herhaal wachtwoord</label>
                <input type="password"name="password_repeat" class="form-control">
            </div>

            <a href="/login">Heb je al een profiel? Meld hier aan.</a>

            <div class="form-group form-group-buttons">
                <a href="/signup" class="btn btn-light">Vorige</a>
                <input type="submit" value="Registreer als bedrijf" class="btn btn-primary">
            </div>

            {{csrf_field()}}
        </form>
        </div>  
    </div>
@endsection