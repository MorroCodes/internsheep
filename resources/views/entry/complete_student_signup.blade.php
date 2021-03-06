@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
    <div class="entry-content entry-content-complete">
        <h2>Vervolledig registratie als student</h2>
        <div class="manual-signup-container">
            <form action="{{action('EntryController@handleCompleteStudentSignup')}}" method="post">

                @if(!empty($error))
                    <div class="alert alert-danger">{{$error}}</div>
                @endif

                <div class="form-group">
                    <label for="school">School</label>
                    <input type="text" name="school" class="form-control" value="{{$user['school'] ?? ''}}">
                </div>

                <div class="form-group">
                    <label for="field_of_study">Studierichting</label>
                    <input type="text" name="field_of_study" class="form-control" value="{{$user['field_of_study'] ?? ''}}">
                </div>

            <!--   <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_repeat">Herhaal wachtwoord</label>
                    <input type="password" name="password_repeat" class="form-control">
                </div> -->

                <div class="form-group form-group-button">
                    <input type="submit" value="Vervolledig registratie" class="btn btn-primary">
                </div>

                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection