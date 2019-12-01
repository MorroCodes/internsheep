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
        <div class="company-profile-survey-container">
            <h2>Leer ons kennen!</h2>

            <div>
                <p>Werksfeer</p>
                <div class="survey-result-container-flex">
                    <div>informeel</div>
                    <div class="survey-result-container">
                        <div class="vibe-check survey-slider" data-score="{{$surveyInfo->vibe}}"></div>
                    </div>
                    <div>formeel</div>
                </div>
            </div>
            
            <div>
                <p>Bedrijfsgrootte</p>
                <div class="survey-result-container-flex">
                    <div>Kleine KMO</div>
                    <div class="survey-result-container">
                        <div class="size-check survey-slider" data-score="{{$surveyInfo->size}}"></div>
                    </div>
                    <div>Grote Multinational</div>
                </div>
            </div>
        
            
            <div>
                <p>Omschrijving</p>
                <div class="survey-result-container-flex">
                    <div>Jong</div>
                    <div class="survey-result-container">
                        <div class="age-check survey-slider" data-score="{{$surveyInfo->age}}"></div>
                    </div>
                    <div>Established</div>
                </div>
            </div>

            <div>
                <p>Soort stages in aanbieding</p>
                <div class="survey-result-container-flex">
                    <div>Kijkstage</div>
                    <div class="survey-result-container">
                        <div class="type-check survey-slider" data-score="{{$surveyInfo->type}}"></div>
                    </div>
                    <div>hands-on</div>
                </div>
            </div>

            <div>
                <p>Bereikbaaarheid openbaar vervoer</p>
                <div class="survey-result-container-flex">
                    <div>Makkelijk</div>
                    <div class="survey-result-container">
                        <div class="transport-check survey-slider" data-score="{{$surveyInfo->transport}}"></div>
                    </div>
                    <div>moeilijker</div>
                </div>
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
</div>
@endsection

