@extends('layouts/entry')

@section('content')
    <div class="survey-content">
        <div class=logo-entry-container>
            <img src="/images/logo.svg" alt="Internsheep logo" class="logo logo-entry">
        </div>
        <h2>Internsheep wil you leren kennen!</h2>
        <p>Door onderstaande vragen in te vullen kunnen wij jou matchen met het perfecte bedrijf.🚀</p>
    
        <div class=survey-container>
            <form action="{{action('SurveyController@handleStudentSurvey')}}" method="post">

                <div class="form-group">
                    <label for="vibe">Welk type werksfeer heeft jouw voorkeur?</label>
                    <div>
                        <span class="col">Informeel</span>
                        <input type="range" class="custom-range col-4" min="1" max="5" id="vibe" name="vibe">
                        <span class="col">Formeel</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="size">Welke bedrijfsgrootte krijgt jouw voorkeur?</label>
                    <div>
                        <span class="col">Klein (KMO)</span>
                        <input type="range" class="custom-range col-4" min="1" max="5" id="size" name="size">
                        <span class="col">Groot (Multinational)</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="age">Wat voor bedrijf zoek je?</label>
                    <div>
                        <span class="col">Jong</span>
                        <input type="range" class="custom-range col-4" min="1" max="5" id="age" name="age">
                        <span class="col">Established</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="type">Wat voor stage zoek je?</label>
                    <div>
                        <span class="col">Kijkstage</span>
                        <input type="range" class="custom-range col-4" min="1" max="5" id="type" name="type">
                        <span class="col">Hands-on</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="distance">Hoe ver wil je gaan voor je stage?</label>
                    <div>
                        <span class="col">In de buurt (&lt; 10km)</span>
                        <input type="range" class="custom-range col-4" min="1" max="5" id="distance" name="distance">
                        <span class="col">Verder (&gt; 60km)</span>
                    </div>
                </div>

                <div class="form-group form-group-buttons">
                    <a href="/" class="btn btn-light">Later</a>
                    <input type="submit" value="Opslaan" class="btn btn-primary">
                </div>

                {{csrf_field()}}
            </form>
        </div>      
    </div>
@endsection