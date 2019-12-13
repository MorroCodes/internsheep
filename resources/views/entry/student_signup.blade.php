@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
        <h2>Registreer als student | <a href="{{ url('/auth/redirect/facebook') }}" class="btn-social">via face<span>bok</span></a></h2>

        <div class="manual-signup-container">
            <form action="{{action('EntryController@handleStudentSignup')}}" method="post">

                @if(!empty($error))
                    <div class="alert alert-danger">{{$error}}</div>
                @endif

                <div class="form-group">
                <div class="col-md-13 mb-3 mb-md-0">
                    <label for="firstname">Voornaam</label>
                    <input type="text" name="firstname" class="form-control" value="{{$user['firstname'] ?? ''}}">
                    </div>
                </div>

                <div class="form-group">
                <div class="col-md-13 mb-3 mb-md-0">
                    <label for="lastname">Achternaam</label>
                    <input type="text" name="lastname" class="form-control" value="{{$user['lastname'] ?? ''}}">
                    </div>
                </div>

                <div class="form-group">
                <div class="col-md-13 mb-3 mb-md-0">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{$user['email'] ?? ''}}">
                    </div>
                </div>

                <div class="form-group">
                <div class="col-md-13 mb-3 mb-md-0">
                    <label for="school">School</label>
                    <input type="text" name="school" class="form-control" value="{{$user['school'] ?? ''}}">
                    </div>
                </div>

                <div class="form-group">
                <div class="col-md-13 mb-3 mb-md-0">
                    <label for="field_of_study">Studierichting</label>
                    <input type="text" name="field_of_study" class="form-control" value="{{$user['field_of_study'] ?? ''}}">
                    </div>
                </div>

                <div class="form-group">
                <div class="col-md-13 mb-3 mb-md-0">
                    <label for="password">Wachtwoord (min. 7 karakters)</label>
                    <input type="password" name="password" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                <div class="col-md-13 mb-3 mb-md-0">
                    <label for="password_repeat">Herhaal wachtwoord</label>
                    <input type="password" name="password_repeat" class="form-control">
                    </div>
                </div>

                <a href="/login">Heb je al een profiel? Meld hier aan.</a>

                <div class="form-group form-group-buttons">
                    <a href="/signup" class="btn btn-light">Vorige</a>
                    <input type="submit" value="Registreer als student" class="btn btn-primary">
                </div>

                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection