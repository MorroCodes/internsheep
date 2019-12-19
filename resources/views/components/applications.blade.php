
<div class="application-card">

    <div class="application-card-title">

        <a href="/student/{{$id}}">
            <h4>{{$firstname}} {{$lastname}}</h4>
        </a>

        <div class="response-btn-container">
            <button class="application-response-btn application-response-deny {{ ($response == 'denied') ? 'application-response-selected' : 'application-response-unselected' }}" data-applicationId="{{$id}}" >👎</button>
            <button class="application-response-btn application-response-maybe {{ ($response == 'maybe') ? 'application-response-selected' : 'application-response-unselected' }}" data-applicationId="{{$id}}" >🤔</button>
            <button class="application-response-btn application-response-accept {{ ($response == 'accepted') ? 'application-response-selected' : 'application-response-unselected' }}" data-applicationId="{{$id}}">👍</button>
        </div>
    </div>

    <div class="application-card-content">
        <!-- <h5>Bericht</h5> -->
        <p>{{$reason}}</p>
        <div>
            <p>E-mail: {{$email}}</p>
            <p>Verzonden op: {{$created_at}}</p>
        </div>
    </div>

    <div class="application-btn-container">
        <button class="btn btn-primary btn-message {{ $class }}" data-applicationId="{{$id}}" data-applicant="{{$firstname}} {{$lastname}}" data-studentId="{{$student_id}}" data-internshipId="{{$internship_id}}">Stuur bericht</button>
        <a href="/conversations" class="btn btn-primary">Toon berichten</a>
    </div>

</div>
