@extends('layouts.main')

@section('content')
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
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <h2 class="mb-5 h3">Interessante vacatures</h2>
                <div class="rounded border jobs-wrap">
                    @foreach ($internships as $internship)
                    <div class="card internship_container">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{$internship->user->first()->profile_image}}" alt="{{$internship->title}}"
                                    class="card-img-top">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">

                                    <h3 class="card-title">{{ $internship->title }}</h3>
                                    <div class="d-block d-lg-flex">
                                        <div class="mr-3"><span
                                                class="icon-suitcase mr-1"></span>{{ $internship->company_name}}
                                        </div>
                                        <div class="mr-3"><span class="icon-room mr-1"></span>{{ $internship->address}}
                                        </div>
                                    </div>
                                    <p>{{ $internship->catch_phrase}}</p>
                                    <a href="/internship/{{ $internship->id }}" class="btn btn-secondary">Meer info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.scripts')
@endsection
