@extends('layouts/entry')
@section('content')
    <div>

        <h2>Vervolledig registratie als student</h2>

        <form action="{{action('EntryController@handleCompleteStudentSignup')}}" method="post">

            @if(!empty($error))
                <div class="alert alert-danger">{{$error}}</div>
            @endif

            <div class="form-group">
                <label for="school">School</label>
                <input type="text" placeholder="School" name="school" class="form-control" value="{{$user['school'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="field_of_study">Studierichting</label>
                <input type="text" placeholder="Studierichting" name="field_of_study" class="form-control" value="{{$user['field_of_study'] ?? ''}}">
            </div>

          <!--   <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_repeat">Herhaal wachtwoord</label>
                <input type="password" name="password_repeat" class="form-control">
            </div> -->

            <div class="form-group">
                <input type="submit" value="Vervolledig registratie" class="btn btn-primary">
            </div>

            {{csrf_field()}}
        </form>
    </div>
@endsection