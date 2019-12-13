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