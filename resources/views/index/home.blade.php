<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Internsheep</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('partials.head')

  </head>
  <body>

  @include('partials.nav')

  @include('partials.search')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5 h3">Recent Jobs</h2>
            <div class="rounded border jobs-wrap">
            @foreach($internship as $i)
              <div class="card internship_container">
                <div class="card-body">
                    <h3 class="card-title">{{ $i->title }}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{ $i->company['company_name']}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span>{{ $i->address}}</div>
                    </div>
                    <p>{{ $i->catch_phrase}}</p>
                    <a href="/internship/{{ $i->id }}" class="btn btn-primary">Meer info</a>
                </div>
            </div>

              @endforeach
            </div>

            <div class="col-md-12 text-center mt-5">
              <div class="container">

            </div>
          </div>
          <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-block-feature bg-light">
      <div class="container">

        <div class="text-center mb-5 section-heading">
          <h2>Why Choose Us</h2>
        </div>


        <div class="d-block border-bottom">
        @foreach($companies as $c)
          <div class=" p-4 item border-right" data-aos="fade">
            <h2 class="h4">{{$c->company_name}}</h2>
            <p>{{$c->company_bio}}</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          @endforeach

        </div>
      </div>
    </div>









    <footer class="site-footer">
      <div class="container">


        <div class="row">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>Ga met ons op zoek naar de perfecte match! Zoek je nog een stagiair of ben je op zoek naar een stage? InternSheep is the place to be!</p>
            <p><a href="#" class="btn btn-primary pill text-white px-4">Read More</a></p>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Approach</a></li>
                    <li><a href="#">Sustainability</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Careers</a></li>
                  </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Categories</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Full Time</a></li>
                    <li><a href="#">Freelance</a></li>
                    <li><a href="#">Temporary</a></li>
                    <li><a href="#">Internship</a></li>
                  </ul>
              </div>
            </div>
          </div>


          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                </p>
              </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="{{asset('external/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('external/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('external/js/jquery-ui.js')}}"></script>
  <script src="{{asset('external/js/popper.min.js')}}"></script>
  <script src="{{asset('external/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('external/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('external/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('external/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('external/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('external/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('external/js/aos.js')}}"></script>


  <script src="{{asset('external/js/mediaelement-and-player.min.js')}}"></script>

  <script src="{{asset('external/js/main.js')}}"></script>


  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>


    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete"
        async defer></script>

  </body>
</html>
