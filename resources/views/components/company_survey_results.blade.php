<div>
    <h2>Survey antwoorden</h2>
    <div>
        <p>Werksfeer</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">informeel</div>
            <div class="survey-result-container vibe-check" data-score="{{$vibe}}">
            </div>
            <div class="survey-label">formeel</div>
        </div>
    </div>
            
    <div>
        <p>Bedrijfsgrootte</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">Kleine KMO</div>
            <div class="survey-result-container size-check" data-score="{{$size}}">
            </div>
            <div class="survey-label">Grote Multinational</div>
        </div>
    </div>
        

    <div>
        <p>Omschrijving</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">Jong</div>
            <div class="survey-result-container age-check" data-score="{{$age}}">
            </div>
            <div class="survey-label">Established</div>
        </div>
    </div>

    <div>
        <p>Soort stages in aanbieding</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">Kijkstage</div>
            <div class="survey-result-container type-check" data-score="{{$type}}">
            </div>
            <div class="survey-label">hands-on</div>
        </div>
    </div>

    <div>
        <p>Bereikbaaarheid openbaar vervoer</p>
        <div class="survey-result-container-flex">
            <div class="survey-label">Makkelijk</div>
            <div class="survey-result-container transport-check" data-score="{{$transport}}">
            </div>
            <div class="survey-label">moeilijker</div>
        </div>
    </div>
    <a href="/company_survey" class="btn btn-primary">Wijzig survey antwoorden</a>
</div>