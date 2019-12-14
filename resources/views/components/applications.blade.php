
<div class="application-card">

    <div class="application-card-title">

        <a href="{{route('StudentProfilePublic',[$student_id])}}">
            <h4>{{$firstname}} {{$lastname}}</h4>
        </a>

        <div>
            <button class="application-response-deny {{ ($response == 'denied') ? 'application-response-selected' : '' }}" data-applicationId="{{$id}}" >Weiger</button>
            <button class="application-response-maybe {{ ($response == 'maybe') ? 'application-response-selected' : '' }}" data-applicationId="{{$id}}" >Misschien</button>
            <button class="application-response-accept {{ ($response == 'accepted') ? 'application-response-selected' : '' }}" data-applicationId="{{$id}}">Accepteer</button>
        </div>
    </div>

    <div class="application-card-content">
        <h5>Bericht</h5>
        <p>{{$reason}}</p>
        <div>
            <p>E-mail: {{$email}}</p>
            <p>Verzonden op: {{$created_at}}</p>
        </div>
    </div>

    <div>
        <button class="btn btn-primary btn-message {{ $class }}" data-applicationId="{{$id}}" data-applicant="{{$firstname}} {{$lastname}}" data-studentId="{{$student_id}}" data-internshipId="{{$internship_id}}">Start een gesprek</button>
        <a href="/conversations" class="btn btn-primary">Toon berichten</a>
    </div>

</div>
