<div>
    <h2>Survey antwoorden</h2>
    <div>
        <p class="survey-question">Werksfeer</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">informeel</div>
            <div class="survey-result-container vibe-check" data-score="{{$vibe}}">
            </div>
            <div class="survey-label">formeel</div>
        </div>
    </div>
            
    <div>
        <p class="survey-question">Bedrijfsgrootte</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">Kleine KMO</div>
            <div class="survey-result-container size-check" data-score="{{$size}}">
            </div>
            <div class="survey-label">Grote Multinational</div>
        </div>
    </div>
        

    <div>
        <p class="survey-question">Omschrijving</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">Jong</div>
            <div class="survey-result-container age-check" data-score="{{$age}}">
            </div>
            <div class="survey-label">Established</div>
        </div>
    </div>

    <div>
        <p class="survey-question">Soort stages in aanbieding</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">Kijkstage</div>
            <div class="survey-result-container type-check" data-score="{{$type}}">
            </div>
            <div class="survey-label">hands-on</div>
        </div>
    </div>

    <div>
        <p class="survey-question">Afstand</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">Dichtbij</div>
            <div class="survey-result-container transport-check" data-score="{{$transport}}">
            </div>
            <div class="survey-label">Verder</div>
        </div>
    </div>
    <a href="/student_survey" class="btn btn-primary">Wijzig survey antwoorden</a>
</div>