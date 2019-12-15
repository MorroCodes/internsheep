@extends('layouts/main')

@section('content')

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">

                <div class="survey-content">
                
                    <h2>Internsheep wil you leren kennen!</h2>
                    <p>Door onderstaande vragen in te vullen kunnen wij jou matchen met het perfecte bedrijf.🚀</p>
                
                    <div class=survey-container>
                        @if(!empty($error))
                            <div class="alert alert-danger">{{$error}}</div>
                        @endif
                        <form action="{{action('SurveyController@handleStudentSurvey')}}" method="post">


                        <div class="form-group">
                                <label for="vibe">Welk type werksfeer heeft jouw voorkeur?</label>
                                <div class="survey-flex">
                                <div class="survey-label">informeel</div>
                                    <div class="survey-result-container">
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
                                <label for="size">Welke bedrijfsgrootte krijgt jouw voorkeur?</label>
                                <div class="survey-flex">
                                <div class="survey-label">Klein (KMO)</div>
                                    <div class="survey-result-container">
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
                            <label for="age">Wat voor bedrijf zoek je?</label>
                                <div class="survey-flex">
                                <div class="survey-label">Jong</div>
                                    <div class="survey-result-container">
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
                            <label for="type">Wat voor stage zoek je?</label>
                                <div class="survey-flex">
                                <div class="survey-label">Kijkstage</div>
                                    <div class="survey-result-container">
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
                            <label for="transport">Hoe ver wil je gaan voor je stage?</label>

                                <div class="survey-flex">
                                <div class="survey-label">In de buurt (&lt; 10km)</div>
                                    <div class="survey-result-container">
                                        <input type="radio" name="distance" value="1" {{ ($survey != null && $survey->distance == 1) ? "checked" : "" }}>
                                        <input type="radio" name="distance" value="2" {{ ($survey != null && $survey->distance == 2) ? "checked" : "" }}>
                                        <input type="radio" name="distance" value="3" {{ ($survey != null && $survey->distance == 3) ? "checked" : "" }}>
                                        <input type="radio" name="distance" value="4" {{ ($survey != null && $survey->distance == 4) ? "checked" : "" }}>
                                        <input type="radio" name="distance" value="5" {{ ($survey != null && $survey->distance == 5) ? "checked" : "" }}>
                                    </div>
                                    <div class="survey-label">Verder (&gt; 60km)</div>
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
            </div>
        </div>
    </div>
</div>
@endsection