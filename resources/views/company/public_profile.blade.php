@extends('layouts/main')

@section('content')

<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8 mb-5">


        <div class="card company-public-profile">
            <div class="card-header">
            </div>
            <div class="public-company-container">
                <h1 class="profile-title">{{$companyInfo->company_name}}</h1>
                <div class="company-profile-image-container">
                    <img src="{{$userInfo->profile_image}}" alt="{{$companyInfo->company_name}} logo">
                </div>
                
                <div class="company-info-desc">
                      <h2 class="">Omschrijving</h2>
                      <p class="location">{{$companyInfo->company_bio}}</p>
                </div>

                @if($vacatures->isEmpty())
                            <div class="company-profile-internships-container">
                                <h3 class="profile-title">Vacatures</h3>
                                <div>
                                    <p>Dit bedrijf heeft momenteel geen vacatures.</p>
                                </div>
                            </div>
                            @else

                            <div class="company-profile-internships-container">
                                <h3 class="profile-title">Vacatures</h3>

                                @foreach($vacatures as $v)
                                    <div class="card internship_container">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$v->title}}</h5>
                                            <p class="card-text">{{$v->description}}</p>
                                            <a href="/internship/{{ $v->id }}">
                                            <button class="btn btn-primary">view</button>
                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif

                            @if($surveyInfo != null)
                            @component('components/company_survey_results')
                                @slot('surveyInfo') {{$surveyInfo}} @endslot
                                @slot('vibe') {{$surveyInfo->vibe}} @endslot
                                @slot('size') {{$surveyInfo->size}} @endslot
                                @slot('age') {{$surveyInfo->age}} @endslot
                                @slot('type') {{$surveyInfo->type}} @endslot
                                @slot('transport') {{$surveyInfo->transport}} @endslot
                            @endcomponent
                      
                        @endif
                    </div>
            <div class="card-footer text-muted">
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
