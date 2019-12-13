@extends('layouts/app')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <img src="../{{$user->profile_image}}" alt="{{$internship->title}}" class="card-img-top" width="200px">
                <div class="container">
                    <form action="{{route('rating')}}" method="post">
                        <div class="rate">
                            <input @if ($internship->mid <= "5" && $internship->mid > "4")
                                checked
                                @endif data-rate="5" data-int="{{$internship->id}}" type="radio" id="star5" class="star"
                                name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input @if ($internship->mid <= "4" && $internship->mid > "3")
                                    checked
                                    @endif data-rate="4" data-int="{{$internship->id}}" type="radio" id="star4"
                                    class="star" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input @if ($internship->mid <= "3" && $internship->mid > "2")
                                        checked
                                        @endif data-rate="3" data-int="{{$internship->id}}" type="radio" id="star3"
                                        class="star" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input @if ($internship->mid <= "2" && $internship->mid > "1")
                                            checked
                                            @endif data-rate="2" data-int="{{$internship->id}}" type="radio" id="star2"
                                            class="star" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input @if ($internship->mid <= "1" && $internship->mid > "0")
                                                checked
                                                @endif data-rate="1" data-int="{{$internship->id}}" type="radio"
                                                id="star1" class="star" name="rate" value="1" />
                                                <label for="star1" title="text">1 star</label>
                        </div>
                        {{csrf_field()}}
                    </form>

                    <h3>{{$internship->title}}</h3>
                    <h5>{{$internship->catch_phrase}}</h5>
                    <p>{{$internship->description}}</p>
                </div>

                <form action="{{ action('AccountController@ApplyInternship') }}" method="post">

                    <input type="hidden" name="company" value="{{$internship->company_id}}">
                    <input type="hidden" name="internship" value="{{$internship->id}}">
                    <div class="form-group">
                        @if(!empty($error))
                        @component('components/alert')
                        @slot('message') {{$error}}
                        @endslot
                        @slot('alert_type') alert-primary
                        @endslot
                        @endcomponent
                        @endif
                        @if(Auth::user()->type == "student")
                        <label for="reason">Waarom wil je hier stage doen?</label>
                        <textarea name="reason" class="form-control" id="reason"></textarea>
                    </div>
                        <button type="submit" class="btn btn-primary">Solliciteren</button>
                    @endif
                    {{csrf_field()}}

                </form>
            </div>
            <div class="col-md-12 col-lg-8 mb-5">
                <div class="container">
                    <h3>Over {{$company->company_name}}</h3>
                    <p>{{$company->company_bio}}</p>
                    <h5>Meer vacatures van {{$company->company_name}}</h5>
                    <div class="d-flex flex-wrap">
                        @foreach ($others_by_company as $suggestion)
                        <div class="col-sm-4">
                            <div class="card">
                            <img src="../{{$user->profile_image}}" alt="{{$suggestion->title}}"
                                    class="card-img-top" width="200px">
                                <div class="card-body">
                                    <h2 class="card-title">{{$suggestion->title}}</h2>
                                    <p>{{ Str::limit($suggestion->description, 50) }}</p>
                                    <a href="/internship/{{$suggestion->id}}" class="btn btn-secondary">Bekijk deze
                                        vacature</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
