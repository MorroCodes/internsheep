@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profiel instellingen</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <form action="{{ action('AccountController@handleStudentData') }}" method="post">
                        <h2 class="profile-title">Wijzig gegevens</h2>
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
                        <button type="submit" class="btn btn-primary btn-profile-edit">Aanpassen</button>
                        {{csrf_field()}}
                    </form>
                    <form action="{{ action('AccountController@handleCV') }}" method="post" enctype="multipart/form-data">
                        <br>
                        <h2 class="profile-title">CV uploaden</h2>
                        <div class="form-group">
                            <label for="cv">CV</label>
                            <input type="file" class="form-control-file" name="cv" id="cv" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-profile-edit">Uploaden</button>
                        {{csrf_field()}}
                    </form>
                    <form action="{{ action('AccountController@handleProfilePicture') }}" method="post" enctype="multipart/form-data">
                        <br>
                        <h2 class="profile-title">Profielfoto wijzigen</h2>
                        <div class="form-group">
                            <label for="profile">Profielfoto</label>
                            <input type="file" class="form-control-file" name="profile" id="profile" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-profile-edit">Aanpassen</button>
                        {{csrf_field()}}
                    </form>
                    <form action="{{ action('AccountController@handleStudentNewPassword') }}" method="post">
                        <br>
                        <h2 class="profile-title">Nieuw wachtwoord instellen</h2>
                        @if(session('error'))
                            <div class="alert {{session('error-type')}}">{{session('error')}}</div>
                        @endif
                        @component('components/password_update')
                        @endcomponent
                        <button type="submit" class="btn btn-primary btn-profile-edit">Aanpassen</button>
                        {{csrf_field()}}
                    </form>
                </div>
                @if($surveyInfo != null)  
                        @component('components/student_survey_results')
                        @slot('surveyInfo') {{$surveyInfo}} @endslot
                        @slot('vibe') {{$surveyInfo->vibe}} @endslot
                        @slot('size') {{$surveyInfo->size}} @endslot
                        @slot('age') {{$surveyInfo->age}} @endslot
                        @slot('type') {{$surveyInfo->type}} @endslot
                        @slot('transport') {{$surveyInfo->distance}} @endslot
                        @endcomponent
                    @else
                        @component('components/student_survey_results_empty')
                            @slot('surveyInfo') {{$surveyInfo}} @endslot
                        @endcomponent
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
