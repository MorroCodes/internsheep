@extends('layouts/app')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <div class="container">
                        <form action="{{route('rating')}}" method="post">
                            <div class="rate">
                            <input data-rate="5" data-int="{{$internship->id}}" type="radio" id="star5" class="star" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input data-rate="4" data-int="{{$internship->id}}" type="radio" id="star4" class="star" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input data-rate="3" data-int="{{$internship->id}}" type="radio" id="star3" class="star" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input data-rate="2" data-int="{{$internship->id}}" type="radio" id="star2" class="star" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input data-rate="1" data-int="{{$internship->id}}" type="radio" id="star1" class="star" name="rate" value="1" />
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
                        <label for="reason">Waarom wil je hier stage doen?</label>
                        <textarea name="reason" class="form-control" id="reason"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Solliciteren</button>
                    {{csrf_field()}}

                </form>




                @endsection
