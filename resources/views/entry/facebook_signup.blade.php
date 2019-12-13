@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <div class="entry-content entry-content-signup">
                    <h2>Registreer</h2>
                    <p>Ga mee op zoek naar de perfecte stage-match!</p>

                    <div class="alert alert-warning">Je hebt nog geen profiel aangemaakt via facebook. Kies hier het soort profiel dat je wil aanmaken.</div>

                    <div class="signup-container signup-container-buttons">

                    <div class="btn-container">
                        <a href="{{ url('/auth/redirect/facebook/student') }}" class="btn btn-primary">Registreer als student</a>
                    </div>
                    <div class="btn-container">
                        <a href="{{ url('/auth/redirect/facebook/company') }}" class="btn btn-primary">Registreer als bedrijf</a>
                    </div>
                </div>
            <div class="link-redirect-container link-redirect-container-signup">
                <a href="/login" class="link-redirect">Heb je al aan profiel? Meld aan via e-mail en wachtwoord!</a>
            </div>
        </div>
    </div>
</div>
@endsection