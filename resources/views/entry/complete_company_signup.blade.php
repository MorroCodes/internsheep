@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
    <div class="entry-content entry-content-complete">
        <h2>vervolledig registratie als bedrijf</h2>
        <div class="manual-signup-container">
        <form action="{{action('EntryController@handleCompleteCompanySignup')}}" method="post">

            @if(!empty($error))
                <div class="alert alert-danger">{{$error}}</div>
            @endif

            <div class="form-group">
                <label for="company_name">Bedrijfsnaam</label>
                <input type="text" name="company_name" class="form-control" value="{{$user['company_name'] ?? ''}}">
            </div>

            <div class="form-group">
                <label for="company_bio">Korte bedrijfsomschrijving</label>
                <input type="text" name="company_bio" class="form-control" value="{{$user['company_bio'] ?? ''}}">
            </div>

       <!--      <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_repeat">Herhaal wachtwoord</label>
                <input type="password"name="password_repeat" class="form-control">
            </div> -->

            <div class="form-group form-group-button">
                <input type="submit" value="Vervolledig registratie" class="btn btn-primary">
            </div>

            {{csrf_field()}}
        </form>
        </div>
    </div>
@endsection