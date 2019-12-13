@extends('layouts.main')

@section('content')
<div class="container">
    @if(!empty($error))
        <div class="alert alert-danger">{{$error}}</div>
    @endif
    @component('components/search')
        @if (isset($request->searchFor))
            @slot('searchFor')
                {{$request->searchFor}}
            @endslot
        @endif
        @if (isset($request->address))
                @slot('address')
                    {{$request->address}}
                @endslot
            @endif
        @if (isset($request->transport_method))
            @slot('transport_method')
                {{$request->transport_method}}
            @endslot
        @endif
    @endcomponent
    @foreach ($companySurveys as $companySurvey)
    @if (!empty($companySurvey->internships->first()) && $companySurvey->company != null)
    <h2>{{$companySurvey->company->first()->company_name}}</h2>
    <h5 class="card-text">{{$companySurvey->match}}% overeenkomst</h5>
    <div class="d-flex flex-wrap">
        @foreach ($companySurvey->internships as $internship)
        <div class="col-sm-4">
            <div class="card">
                <img src="{{$companySurvey->user->first()->profile_image}}" alt="{{$internship->title}}"
                    class="card-img-top" width="200px">
                <div class="card-body">
                    <h2 class="card-title">{{$internship->title}}</h2>
                    @if ($internship->distance != null)
                    <h5 class="card-text">{{$internship->distance["distance"]}}</h5>
                    <h5 class="card-text">{{$internship->distance["duration"]}}</h5>
                    @endif
                    <p>{{ Str::limit($internship->description, 50) }}</p>
                    <a href="/internship/{{$internship->id}}" class="btn btn-secondary">Bekijk deze vacature</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    @endforeach
</div>
@endsection
