@extends('layouts.main')

@section('content')

<div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
            <div class="p-5 bg-white">

              @if(session('message'))
                    <div class="alert {{session('error-type')}}">{{session('message')}}</div>
              @endif
           
              <h5 class="main-title main-title-big">{{$internship->title}}</h5>
              <h5 class="main-title">Adres</h5>
              <p>{{$internship->address}}</p>

              <h5 class="main-title">Beschrijving</h5>
              <p>{{$internship->description}}</p>

              <h5 class="main-title">Functie omschrijving</h5>
              <p>{{$internship->functie_omschrijving}}</p>

              <h5 class="main-title">Aanbod</h5>
              <p>{{$internship->aanbod}}</p>
            </div>
            <form action="{{ action('AccountController@ApplyInternship') }}" method="post" id="fomu">

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
    <label for="reason">Interesse in een stage? Solliciteer hier!</label>
    <textarea name="reason" class="form-control" id="reason"></textarea>
</div>
<button type="submit" class="btn btn-primary">Verstuur</button>
{{csrf_field()}}
</form>
<h5 id="space">Meer vacatures van {{$company->company_name}}</h5>
                    <div class="d-flex flex-wrap">
                        @foreach ($others_by_company as $suggestion)
                        <div class="col-sm-4" id="card-internship">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">{{$suggestion->title}}</h6>
                                    <p>{{ Str::limit($suggestion->description, 50) }}</p>
                                    <a href="/internship/{{$suggestion->id}}">Bekijk deze
                                        vacature</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
          </div>

          <div class="col-lg-4">
            
            
            <div class="p-4 mb-3 bg-white">
            <h3>Over {{$company->company_name}}</h3>
            <p>{{$company->company_bio}}</p>
            <img src="../{{$user->profile_image}}" alt="{{$internship->title}}" class="card-img-student" width="150">
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
                    
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
