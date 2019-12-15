@extends('layouts/main')

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
                    <form action="{{ action('AccountCompanyController@handleCompanyData2') }}" method="post">
                        <div class="form-group">
                            <label for="name">Naam bedrijf</label>
                            <input type="text" name="company_name" class="form-control" id="company_name" value="{{$company['company_name']}}">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="firstname">Omschrijving</label>
                                <input type="text" name="company_bio" class="form-control" id="company_bio" value="{{$company['company_bio']}}">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                        {{csrf_field()}}
                    </form>
                    <form action="{{ action('AccountCompanyController@handleCompanyData') }}" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email adres</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="firstname">Voornaam</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" value="{{Auth::user()->firstname}}">
                            </div>
                            <div class="col">
                                <label for="lastname">Achternaam</label>
                                <input type="text" name="lastname" class="form-control" id="lastname" value="{{Auth::user()->lastname}}">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                        {{csrf_field()}}
                    </form>
                    <form action="{{ action('AccountCompanyController@handleCompanyNewPassword') }}" method="post">
                        <br>
                        <br>
                        <h2>Nieuw wachtwoord instellen</h2>
                        @if(!empty($error))
                            <div class="alert {{$type}}">{{$error}}</div>
                        @endif
                        <div class="form-group hidden">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Passwoord" value="{{Auth::user()->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Huidig wachtwoord</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Passwoord">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1">Nieuw wachtwoord</label>
                            <input type="password" name="pass1" class="form-control" id="inputPassword1" placeholder="Passwoord">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword2">Herhaal nieuw wachtwoord</label>
                            <input type="password" name="pass2" class="form-control" id="inputPassword2" placeholder="Passwoord">
                        </div>
                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                        {{csrf_field()}}
                    </form>

                    @if($surveyInfo != null)  
                        @component('components/company_survey_results')
                        @slot('surveyInfo') {{$surveyInfo}} @endslot
                        @slot('vibe') {{$surveyInfo->vibe}} @endslot
                        @slot('size') {{$surveyInfo->size}} @endslot
                        @slot('age') {{$surveyInfo->age}} @endslot
                        @slot('type') {{$surveyInfo->type}} @endslot
                        @slot('transport') {{$surveyInfo->transport}} @endslot
                        @endcomponent
                    @else
                        @component('components/company_survey_results_empty')
                            @slot('surveyInfo') {{$surveyInfo}} @endslot
                        @endcomponent
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
