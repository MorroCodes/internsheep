@extends('layouts/entry')

@section('content')
    <div class="survey-content">
     
        <h2>Internsheep wil jouw bedrijf leren kennen!</h2>
        <p>Door onderstaande vragen in te vullen kunnen wij studenten beter met jouw bedrijf matchen.</p>
    
        <div class=survey-container>
            <form action="{{action('SurveyController@handleCompanySurvey')}}" method="post">

                <div class="form-group">
                    <label for="vibe">Welk type werksfeer leeft er op de werkvloer?</label>
                    <div class="survey-flex">
                    <div class="survey-label">informeel</div>
                        <div class="survey-result-container vibe-check">
                            <input type="radio" name="vibe" value="1" {{ ($survey != null && $survey->vibe == 1) ? "checked" : "" }}>
                            <input type="radio" name="vibe" value="2" {{ ($survey != null && $survey->vibe == 2) ? "checked" : "" }}>
                            <input type="radio" name="vibe" value="3" {{ ($survey != null && $survey->vibe == 3) ? "checked" : "" }}>
                            <input type="radio" name="vibe" value="4" {{ ($survey != null && $survey->vibe == 4) ? "checked" : "" }}>
                            <input type="radio" name="vibe" value="5" {{ ($survey != null && $survey->vibe == 5) ? "checked" : "" }}>
                        </div>
                        <div class="survey-label">formeel</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="size">Hoe zou je de bedrijfsgrootte omschrijven?</label>
                    <div class="survey-flex">
                    <div class="survey-label">Klein (KMO)</div>
                        <div class="survey-result-container vibe-check">
                            <input type="radio" name="size" value="1" {{ ($survey != null && $survey->size == 1) ? "checked" : "" }}>
                            <input type="radio" name="size" value="2" {{ ($survey != null && $survey->size == 2) ? "checked" : "" }}>
                            <input type="radio" name="size" value="3" {{ ($survey != null && $survey->size == 3) ? "checked" : "" }}>
                            <input type="radio" name="size" value="4" {{ ($survey != null && $survey->size == 4) ? "checked" : "" }}>
                            <input type="radio" name="size" value="5" {{ ($survey != null && $survey->size == 5) ? "checked" : "" }}>
                        </div>
                        <div class="survey-label">Groot (Multinational)</div>
                    </div>
                </div>

                <div class="form-group">
                <label for="age">Hoe zou je jouw bedrijf beschrijven?</label>
                    <div class="survey-flex">
                    <div class="survey-label">Jong</div>
                        <div class="survey-result-container vibe-check">
                            <input type="radio" name="age" value="1" {{ ($survey != null && $survey->age == 1) ? "checked" : "" }}>
                            <input type="radio" name="age" value="2" {{ ($survey != null && $survey->age == 2) ? "checked" : "" }}>
                            <input type="radio" name="age" value="3" {{ ($survey != null && $survey->age == 3) ? "checked" : "" }}>
                            <input type="radio" name="age" value="4" {{ ($survey != null && $survey->age == 4) ? "checked" : "" }}>
                            <input type="radio" name="age" value="5" {{ ($survey != null && $survey->age == 5) ? "checked" : "" }}>
                        </div>
                        <div class="survey-label">Established</div>
                    </div>
                </div>

                <div class="form-group">
                <label for="type">Welke stages bied je aan?</label>
                    <div class="survey-flex">
                    <div class="survey-label">Kijkstage</div>
                        <div class="survey-result-container vibe-check">
                            <input type="radio" name="type" value="1" {{ ($survey != null && $survey->type == 1) ? "checked" : "" }}>
                            <input type="radio" name="type" value="2" {{ ($survey != null && $survey->type == 2) ? "checked" : "" }}>
                            <input type="radio" name="type" value="3" {{ ($survey != null && $survey->type == 3) ? "checked" : "" }}>
                            <input type="radio" name="type" value="4" {{ ($survey != null && $survey->type == 4) ? "checked" : "" }}>
                            <input type="radio" name="type" value="5" {{ ($survey != null && $survey->type == 5) ? "checked" : "" }}>
                        </div>
                        <div class="survey-label">Hands-on</div>
                    </div>
                </div>

                <div class="form-group">
                <label for="transport">Hoe is de bereikbaarheid van het openbaar vervoer naar jouw bedrijf?</label>

                    <div class="survey-flex">
                    <div class="survey-label">Makkelijk bereikbaar</div>
                        <div class="survey-result-container vibe-check">
                            <input type="radio" name="transport" value="1" {{ ($survey != null && $survey->transport == 1) ? "checked" : "" }}>
                            <input type="radio" name="transport" value="2" {{ ($survey != null && $survey->transport == 2) ? "checked" : "" }}>
                            <input type="radio" name="transport" value="3" {{ ($survey != null && $survey->transport == 3) ? "checked" : "" }}>
                            <input type="radio" name="transport" value="4" {{ ($survey != null && $survey->transport == 4) ? "checked" : "" }}>
                            <input type="radio" name="transport" value="5" {{ ($survey != null && $survey->transport == 5) ? "checked" : "" }}>
                        </div>
                        <div class="survey-label">Moeilijker bereikbaar</div>
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