<div class="popup-message">
    <img src="{{asset('/img/close.svg')}}" alt="close button" class="popup-close">
    <form action="{{ action('MessageController@startConversation') }}" method="post">

        <input type="hidden" name="company" value="{{$company_id}}">
        <input type="hidden" class="application-id" name="application" value="">
        <input type="hidden" class="student-id" name="student" value="">
        <input type="hidden" name="internship" class="internship-id" value="{{$internship_id}}">

        <div class="form-group">
            <label for="message" class="popup-title"></label>
            <textarea name="message" class="form-control message-input" id="message"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Verstuur bericht</button>
    {{csrf_field()}}
    </form>
<!-- 
    <img class="close" src="{{ asset('img/close.svg') }}"> -->
</div>

<div class="popup-overlay"></div>