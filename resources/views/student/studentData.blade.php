@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ action('AccountController@handleStudentData') }}" method="post">
                        <h2>Wijzig gegevens</h2>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email adres</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}" required>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="firstname">Voornaam</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" value="{{Auth::user()->firstname}}" required>
                            </div>
                            <div class="col">
                                <label for="lastname">Achternaam</label>
                                <input type="text" name="lastname" class="form-control" id="lastname" value="{{Auth::user()->lastname}}" required>
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea name="bio" class="form-control" id="bio" required>{{Auth::user()->description}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                        {{csrf_field()}}
                    </form>
                    <form action="{{ action('AccountController@handleProfilePicture') }}" method="post" enctype="multipart/form-data">
                        <br>
                        <br>
                        <h2>Profielfoto wijzigen</h2>
                        <div class="form-group">
                            <label for="profile">Profielfoto</label>
                            <input type="file" class="form-control-file" name="profile" id="profile" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                        {{csrf_field()}}
                    </form>
                    <form action="{{ action('AccountController@handleStudentNewPassword') }}" method="post">
                        <br>
                        <br>
                        <h2>Nieuw wachtwoord instellen</h2>
                        <div class="form-group">
                            <label for="inputPassword1">Nieuw wachtwoord</label>
                            <input type="password" name="password1" class="form-control" id="inputPassword1" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword2">Herhaal nieuw wachtwoord</label>
                            <input type="password"  name="password2" class="form-control" id="inputPassword2" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
