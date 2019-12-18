<div class="site-blocks-cover overlay" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade"
    data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12" data-aos="fade">
                <h1>Vind een stage</h1>
                <form action="" method="GET">
                    <div class="row mb-4">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <label for="search_term">Zoekterm</label>
                                    <input class="mr-3 form-control border-0 px-4" type="search" name="searchFor"
                                        id="search_term" value="@if (isset($searchFor)) {{$searchFor}} @endif"
                                        placeholder="naam van bedrijf, soort werk of andere">
                                </div>
                                <div class="col-md-5 mb-4 mb-md-0">
                                    <div class="input-wrap">
                                        <span class="icon icon-room"></span>
                                        <label for="location_filter">Zoek op locatie</label>
                                        <input class="form-control form-control-block search-input  border-0 px-4"
                                            type="search" name="address" id="location_filter"
                                            value="@if (isset($address)) {{$address}}@endif"
                                            placeholder="Straat, stad of regio">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <div class="input-wrap">
                                        <label for="tranports_method">Ik ga</label>
                                        <select class="form-control" name="transport_method" id="transport_method">
                                            <option value="driving">met de auto</option>
                                            <option value="cycling" @if (isset($transport_method) &&
                                                $transport_method=="cycling" ) selected="selected" @endif>met de fiets
                                            </option>
                                            <option value="walking" @if (isset($transport_method) &&
                                                $transport_method=="walking" ) selected="selected" @endif>te voet
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="invissch">&nbsp;</label>
                            <input type="submit" class="btn btn-search btn-primary btn-block" value="Zoek nu!" id="invissrch">
                        </div>
                    </div>
                    <div class="row">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--
<form action="" method="GET">
    <div class="form-group">
        <label for="search_term">Zoekterm</label>
    <input class="form-control" type="search" name="searchFor" id="search_term" value="@if (isset($searchFor)) {{$searchFor}} @endif">
        <label for="location_filter">Zoek op locatie:</label>
        <input class="form-control" type="search" name="address" id="location_filter" value="@if (isset($address)) {{$address}}@endif">
        <label for="tranports_method">Ik ga</label>
        <select class="form-control" name="transport_method" id="transport_method">
            <option value="driving">met de auto</option>
            <option value="cycling" @if (isset($transport_method) && $transport_method == "cycling") selected="selected" @endif>met de fiets</option>
            <option value="walking" @if (isset($transport_method) && $transport_method == "walking") selected="selected" @endif>te voet</option>
        </select>
        <button type="submit" class="btn btn-primary">Zoek op locatie</button>
    </div>
</form>
-->
