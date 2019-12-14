@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
            @component('components/empty_message_popup')
                @slot('company_id') {{\Auth::user()->id}} @endslot
            @endcomponent

                <div class="messages-page-container messages-page-container-convos">
                    <h2>Berichten</h2>

                    @if($applications->count() == 0 && session('type') == 'company')
                   
                        <p>Je hebt nog geen berichten gestuurd. Van zodra je sollicitaties hebt ontvangen kan je een gesprek starten.</p>
                        <a href="/yourcompany" class="btn btn-primary">Terug naar startpagina</a>

                    @elseif($applications->count() == 0 && session('type') == 'student')
                        
                        <p>Je hebt nog geen berichten ontvangen. Solliciteer nu voor een vacature en wacht op een antwoord.</p>
                        <a href="/home" class="btn btn-primary">Terug naar startpagina</a>

                        <h3>Vacatures</h3>

                        @foreach($internships as $i)
                            @component('components/vacatures')
                                @slot('title') {{$i->title }} @endslot
                                @slot('company_name') {{$i->company['company_name']}} @endslot
                                @slot('address') {{$i->address}} @endslot
                                @slot('catch_phrase') {{$i->catch_phrase}} @endslot
                                @slot('id') {{$i->id}} @endslot
                            @endcomponent
                        @endforeach

                    @else
                        <p>Je hebt nog geen berichten gestuurd. Hier een overzicht van alle sollicitaties waarop je kan reageren.</p>
                        
                        <h3>Sollicitaties</h3>
                        @foreach($applications as $a)
                            @component('components/applications')
                                @slot('firstname') {{$a->firstname}} @endslot
                                @slot('lastname') {{$a->lastname}} @endslot
                                @slot('reason') {{$a->reason}} @endslot
                                @slot('response') {{$a->response}} @endslot
                                @slot('email') {{$a->email}} @endslot
                                @slot('created_at') {{$a->created_at}} @endslot
                                @slot('id') {{$a->id}} @endslot
                                @slot('student_id') {{$a->student_id}} @endslot
                                @slot('class') send-message--convo @endslot
                                @slot('internship_id') {{$a->internships_id}} @endslot
                            @endcomponent
                        @endforeach
                        
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection