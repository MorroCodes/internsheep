@extends('layouts/main')

@section('content')
<div class="container">
    <img src="{{ $user->profile_image }}">
    <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
    <p>{{ $user->description }}</p>
</div>
<a href="https://dribbble.com/oauth/authorize?client_id=f8a09cd89e974c42ed1d71a0daf7b58fc12b0a4922f5b0c855ede2ea213fc2ee">connect  to dribbble</a>
<ul id="dribbbleShots"></ul>


<script>
// Set the Access Token
var accessToken = "df8d770e9d19b6e0839c429244f60282e80375b34fded2792907cbb581c8022b"

// Call Dribble v2 API
$.ajax({
    url: 'https://api.dribbble.com/v2/user/shots?access_token='+accessToken,
    dataType: 'json',
    type: 'GET',
    success: function(data) {  
      if (data.length > 0) { 
        $.each(data.reverse(), function(i, val) {                
          $('#dribbbleShots').prepend(
            '<li class="shot" target="_blank" href="'+ val.html_url +'" title="' + val.title + '"><div class="title">' + val.title + '</div><img src="'+ val.images.hidpi +'"/></li>'
            )
        })
      }
      else {
        $('#dribbbleShots').append('<p>Sorry, No shots yet</p>');
      }
    }
});
</script>
<?php


?>
@endsection
