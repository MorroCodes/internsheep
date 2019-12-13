@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
        <h2>Registreer als bedrijf | <a href="{{ url('/auth/redirect/facebook') }}" class="btn-social">via face<span>bok</span></a></h2>
        <div class="container">
        <div class="row justify-content-center">
        <form action="{{action('EntryController@handleCompanySignup')}}" method="post">
        @csrf

            @if(!empty($error))
                <div class="alert alert-danger">{{$error}}</div>
            @endif
            <div class="form-group">
                <div class="col-md-13 mb-3 mb-md-0">
                <label for="firstname">Voornaam</label>
                <input type="text" name="firstname" class="form-control" value="{{$user['firstname'] ?? ''}}">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                <label for="lastname">Achternaam</label>
                <input type="text" name="lastname" class="form-control" value="{{$user['lastname'] ?? ''}}">
                </div>
            </div>

            <div class="form-group form-group-buttons">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" value="{{$user['email'] ?? ''}}">
            </div>


            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                <label for="company_name">Bedrijfsnaam</label>
                <input type="text" name="company_name" class="form-control" value="{{$user['company_name'] ?? ''}}">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                <label for="company_bio">Korte bedrijfsomschrijving</label>
                <textarea name="company_bio" class="form-control" cols="8">{{$user['company_bio'] ?? ''}}</textarea>
                </div>
            </div>


            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                <label for="password_repeat">Herhaal wachtwoord</label>
                <input type="password"name="password_repeat" class="form-control">
            </div>

            <a href="/login">Heb je al een profiel? Meld hier aan.</a>

            <div class="row form-group">
                <div class="col-md-12">
                <a href="/signup" class="btn btn-light">Vorige</a>
                <input type="submit" value="Registreer als bedrijf" class="btn btn-primary  pill px-4 py-2">
                </div>
            </div>
            {{csrf_field()}}
        </form>
        </div>
        </div>
        </div>
      </div>
    </div>

@endsection
