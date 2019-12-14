@extends('layouts/main')
@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">

                <div class="messages-page-container">

                    @if(empty($applications))
                        <p>Je hebt nog geen berichten gestuurd. Van zodra je sollicitaties hebt ontvangen kan je een gesprek starten.</p>
                        <a href="/yourcompany" class="btn btn-primary">Terug naar startpagina</a>
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
                            @endcomponent
                        @endforeach
                        
                    @endif
                    <!-- button to applications overview page -->
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection