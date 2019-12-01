@extends('layouts/company')

@section('content')
<div>
    <div class="company-profile-image-container">
        <img src="{{$userInfo->profile_image}}" alt="{{$companyInfo->company_name}} logo">
    </div>
    <div class="company-profile-title-container">
        <h1>{{$companyInfo->company_name}}</h1>
    </div>

    <div class="company-profile-description-container">
        <h2>Wie zijn we?</h2>
        <p>{{$companyInfo->company_bio}}</p>
    </div>

    <div class="company-profile-survey-container">
        <h2>Leer ons kennen!</h2>

        <div>
            <p>Werksfeer (informeel-formeel)</p>
            <div class="survey-result-container">
                <div class="vibe-check survey-slider" data-score="{{$surveyInfo->vibe}}"></div>
            </div>
            <p>{{$surveyInfo->vibe}}</p>
        </div>
          
        <div>
            <p>Bedrijfsgrootte (Klein KMO - Groot Multinational)</p>
            <div class="survey-result-container">
                <div class="size-check survey-slider" data-score="{{$surveyInfo->size}}"></div>
            </div>
            <p>{{$surveyInfo->size}}</p>
        </div>
        
        <div>
            <p>Omschrijving (Jong - Established)</p>
            <div class="survey-result-container">
                <div class="age-check survey-slider" data-score="{{$surveyInfo->age}}"></div>
            </div>
            <p>{{$surveyInfo->age}}</p>
        </div>

        <div>
            <p>Soort stages in aanbieding (Kijkstage - hands-on)</p>
            <div class="survey-result-container">
                <div class="type-check survey-slider" data-score="{{$surveyInfo->type}}"></div>
            </div>
            <p>{{$surveyInfo->type}}</p>
        </div>

        <div>
            <p>Bereikbaaarheid openbaar vervoer (Makkelijk - moeilijker)</p>
            <div class="survey-result-container">
                <div class="transport-check survey-slider" data-score="{{$surveyInfo->transport}}"></div>
            </div>
            <p>{{$surveyInfo->transport}}</p>
        </div>
    </div>

    <div class="company-profile-internships-container">
        <h2>Vacatures</h2>
        @foreach($vacatures as $v)
        <a href="/internship/{{ $v->id }}">
                <div class="company-internships-card">
                    <div>
                        <img src="/{{ $v->img }}" class="card-img-side">
                    </div>
                    <div class="company-internship-description">
                            <h3>{{ $v->title }}</h3>
                        <p>{{ substr($v->functie_omschrijving, 0, 95) . '...' }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection

