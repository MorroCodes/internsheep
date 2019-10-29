@extends('layouts/entry')
@section('content')
    <div>

        <h2>Registreer als student</h2>
        <a href="" class="btn btn-primary">Registreer met facebook</a>

        <form action="{{action('EntryController@handleStudentSignup')}}" method="post">

            @if(!empty($error))
                <div class="alert alert-danger">{{$error}}</div>
            @endif

            <div class="form-group">
                <label for="firstname">Voornaam</label>
                <input type="text" placeholder="Voornaam" name="firstname" class="form-control" value="{{$user['firstname'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="lastname">Achternaam</label>
                <input type="text" placeholder="Achternaam" name="lastname" class="form-control" value="{{$user['lastname'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" placeholder="E-mail" name="email" class="form-control" value="{{$user['email'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="school">School</label>
                <input type="text" placeholder="School" name="school" class="form-control" value="{{$user['school'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="field_of_study">Studierichting</label>
                <input type="text" placeholder="Studierichting" name="field_of_study" class="form-control" value="{{$user['field_of_study'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" placeholder="********" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_repeat">Herhaal wachtwoord</label>
                <input type="password" placeholder="********" name="password_repeat" class="form-control">
            </div>

            <a href="/login">Heb je al een profiel? Meld hier aan.</a>

            <div class="form-group">
                <a href="/signup" class="btn btn-light">Vorige</a>
                <input type="submit" value="Registreer als student" class="btn btn-primary">
            </div>

            {{csrf_field()}}
        </form>
    </div>
@endsection