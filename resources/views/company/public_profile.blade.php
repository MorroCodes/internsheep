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

    <div class="company-profile-content-flex">
        @if($surveyInfo == null)  
        <div class="company-profile-survey-container">
            <h2>Leer ons kennen!</h2>

            <div>
                <p>Dit bedrijf heeft nog geen survey ingevuld.</p>
            </div>
        </div>
        @else

        <div class="company-profile-survey-container">
            <h2>Leer ons kennen!</h2>

            <div>
                <p>Werksfeer</p>
                <div class="survey-result-container-flex">
                    <div class="survey-label">informeel</div>
                    <div class="survey-result-container vibe-check" data-score="{{$surveyInfo->vibe}}">
                    </div>
                    <div class="survey-label">formeel</div>
                </div>
            </div>
            
            <div>
                <p>Bedrijfsgrootte</p>
                <div class="survey-result-container-flex">
                    <div class="survey-label">Kleine KMO</div>
                    <div class="survey-result-container size-check" data-score="{{$surveyInfo->size}}">
                    </div>
                    <div class="survey-label">Grote Multinational</div>
                </div>
            </div>
        
            
            <div>
                <p>Omschrijving</p>
                <div class="survey-result-container-flex">
                    <div class="survey-label">Jong</div>
                    <div class="survey-result-container age-check" data-score="{{$surveyInfo->age}}">
                    </div>
                    <div class="survey-label">Established</div>
                </div>
            </div>

            <div>
                <p>Soort stages in aanbieding</p>
                <div class="survey-result-container-flex">
                    <div class="survey-label">Kijkstage</div>
                    <div class="survey-result-container type-check" data-score="{{$surveyInfo->type}}">
                    </div>
                    <div class="survey-label">hands-on</div>
                </div>
            </div>

            <div>
                <p>Bereikbaaarheid openbaar vervoer</p>
                <div class="survey-result-container-flex">
                    <div class="survey-label">Makkelijk</div>
                    <div class="survey-result-container transport-check" data-score="{{$surveyInfo->transport}}">
                    </div>
                    <div class="survey-label">moeilijker</div>
                </div>
            </div>
        </div>
        @endif

        @if($vacatures->isEmpty())  

        <div class="company-profile-internships-container">
            <h2>Vacatures</h2>
            <div>
                <p>Dit bedrijf heeft momenteel geen vacatures.</p>
            </div>
        </div>
        @else
    
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
        @endif
    </div>
</div>
@endsection

