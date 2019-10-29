@extends('layouts/entry')

@section('content')
    <div>
        <h2>Internsheep wil jouw bedrijf leren kennen!</h2>
        <p>Door onderstaande vragen in te vullen kunnen wij studenten beter met jouw bedrijf matchen.</p>
    

        <form action="{{action('SurveyController@handleCompanySurvey')}}" method="post">

            <div class="form-group">
                <label for="vibe">Welk type werksfeer leeft er op de werkvloer?</label>
                <div>
                    <span class="col">Informeel</span>
                    <input type="range" class="custom-range col-4" min="1" max="5" id="vibe">
                    <span class="col">Formeel</span>
                </div>
            </div>

            <div class="form-group">
                <label for="size">Hoe zou je de bedrijfsgrootte omschrijven?</label>
                <div>
                    <span class="col">Klein (KMO)</span>
                    <input type="range" class="custom-range col-4" min="1" max="5" id="size">
                    <span class="col">Groot (Multinational)</span>
                </div>
            </div>

            <div class="form-group">
                <label for="age">Hoe zou je jouw bedrijf beschrijven?</label>
                <div>
                    <span class="col">Jong</span>
                    <input type="range" class="custom-range col-4" min="1" max="5" id="age">
                    <span class="col">Established</span>
                </div>
            </div>

            <div class="form-group">
                <label for="type">Welke stages bied je aan?</label>
                <div>
                    <span class="col">Kijkstage</span>
                    <input type="range" class="custom-range col-4" min="1" max="5" id="type">
                    <span class="col">Hands-on</span>
                </div>
            </div>

            <div class="form-group">
                <label for="transport">Hoe is de bereikbaarheid van het openbaar vervoer naar jouw bedrijf?</label>
                <div>
                    <span class="col">Makkelijk bereikbaar</span>
                    <input type="range" class="custom-range col-4" min="1" max="5" id="transport">
                    <span class="col">Moeilijker bereikbaar</span>
                </div>
            </div>

            <div class="form-group">
                <a href="/" class="btn btn-light">Later</a>
                <input type="submit" value="Opslaan" class="btn btn-primary">
            </div>

            {{csrf_field()}}
        </form>

    </div>
@endsection