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
    @if($surveyInfo != null)  
        @component('components/company_survey_results')
            @slot('surveyInfo') {{$surveyInfo}} @endslot
            @slot('vibe') {{$surveyInfo->vibe}} @endslot
            @slot('size') {{$surveyInfo->size}} @endslot
            @slot('age') {{$surveyInfo->age}} @endslot
            @slot('type') {{$surveyInfo->type}} @endslot
            @slot('transport') {{$surveyInfo->transport}} @endslot
        @endcomponent
    @else
        @component('components/company_survey_results_empty')
            @slot('surveyInfo') {{$surveyInfo}} @endslot
        @endcomponent
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

