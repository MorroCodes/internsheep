@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
<div class="entry-content entry-content-signup">
    <h2>Registreer</h2>
    <p>Ga mee op zoek naar de perfecte stage-match!</p>

    <div class="signup-container">
        <div class="signup-section">
            <h3>Ik zoek een stage</h3>
            <ul class="list-group">
                <li class="list-group-item">Creëer een digitale CV</li>
                <li class="list-group-item">Personaliseer de resultaten</li>
            </ul>
            <div class="btn-container">
                <a href="/student_signup" class="btn btn-primary">Registreer als student</a>
            </div>
        </div>

        <div class="signup-section">
            <h3>Ik zoek stagiairs</h3>
            <ul class="list-group">
                <li class="list-group-item">Bekijk de applicaties</li>
                <li class="list-group-item">Voeg vacatures toe</li>
            </ul>
            <div class="btn-container">
                <a href="/company_signup" class="btn btn-primary">Registreer als bedrijf</a>
            </div>
        </div>

    </div>
    <div class="link-redirect-container link-redirect-container-signup">
        <a href="/login" class="link-redirect">Ben je al lid? Meld hier aan!</a>
    </div>
    
</div>
@endsection