<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap js-site-navbar bg-white">

      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="/">Intern<strong class="font-weight-bold">Sheep</strong> </a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        @if(Auth::user())
                            @if(Auth::user()->type == "student")
                                <li><a href="">Bedrijven</a></li>
                                <li><a href="/match">Stages op maat</a></li>
                            @elseif(Auth::user()->type == "company")
                                <li><a href="">Studenten</a></li>
                            @endif
                        @endif
                      <li class="has-children">

                        <a href="#">
                        @if(Auth::user())
                            <span class="bg-primary text-white py-3 px-4 rounded">
                                {{ Auth::user()->firstname . " " . Auth::user()->lastname }}
                            </span>
                        </a>

                            <ul class="dropdown arrow-top">
                                @if(Auth::user())
                                    @if(Auth::user()->type == "student")
                                        <li><a href="{{ action('AccountController@StudentProfile') }}">Profiel</a></li>
                                        <li><a href="{{ action('AccountController@changeStudentData') }}">Instellingen</a></li>
                                    @elseif(Auth::user()->type == "company")
                                        <li><a href="{{ action('CompanyController@show') }}">Profiel</a></li>
                                        <li><a href="{{ action('AccountCompanyController@changeCompanyData') }}">Instellingen</a></li>
                                    @endif
                                @endif
                                <li><a href="{{ action('EntryController@logout') }}">Logout</a></li>
                            </ul>
                        @else
                            <a href="/login"><span>Login</span></a>
                        @endif



                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
