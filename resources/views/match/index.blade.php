@extends('layouts.app')

@section('content')
<div class="container">
    <form action="" method="GET">
        <div class="form-group">
            <label for="location_filter">Zoek op locatie:</label>
            <input class="form-control" type="search" name="address" id="location_filter" value="{{$request}}">
            <label for="tranports_method">Ik ga</label>
            <select class="form-control" name="transport_method" id="transport_method">
                <option value="driving">met de auto</option>
                <option value="cycling">met de fiets</option>
                <option value="walking">te voet</option>
            </select>
            <button type="submit" class="btn btn-primary">Zoek op locatie</button>
        </div>
    </form>
    @foreach ($companySurveys as $companySurvey)
    @if (!empty($companySurvey->internships) && $companySurvey->company != null)
        <h2>{{$companySurvey->company->first()->company_name}}</h2>
    @endif
    <div class="card-deck">
        @foreach ($companySurvey->internships as $internship)
            <div class="card">
                <img src="{{$internship->img}}" alt="{{$internship->title}}" class="card-img-top">
                <div class="card-body">
                    <h2 class="card-title">{{$internship->title}}</h2>
                    @if ($internship->distance != null)
                    <h5 class="card-text">{{$internship->distance["distance"]}}</h5>
                    <h5 class="card-text">{{$internship->distance["duration"]}}</h5>
                    @endif
                <h5 class="card-text">{{$companySurvey->match}}% overeenkomst</h5>
                <p>{{$internship->description}}</p>
            </div>
            </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection
