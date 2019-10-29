@extends('layouts/entry')
@section('content')
<div>
    <h2>Registreer</h2>
    <p>Ga mee op zoek naar de perfecte stage-match!</p>

    <div>
        <h3>Ik zoek een stage</h3>
        <ul class="list-group">
            <li class="list-group-item">Creëer een digitale CV</li>
            <li class="list-group-item">Personaliseer de resultaten</li>
            <li class="list-group-item">Bla</li>
            <li class="list-group-item">Bla</li>
        </ul>
        <div>
            <a href="/student_signup" class="btn btn-primary">Registreer als student</a>
        </div>
    </div>

    <div>
        <h3>Ik zoek stagiairs</h3>
        <ul class="list-group">
            <li class="list-group-item">Bekijk de applicaties</li>
            <li class="list-group-item">Voeg vacatures toe</li>
            <li class="list-group-item">Bla</li>
            <li class="list-group-item">Bla</li>
        </ul>
        <div>
            <a href="/company_signup" class="btn btn-primary">Registreer als bedrijf</a>
        </div>
    </div>
    
</div>



    <form action="" method="post">
    


    {{csrf_field()}}
    </form>
@endsection