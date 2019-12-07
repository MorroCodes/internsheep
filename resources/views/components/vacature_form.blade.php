<div class="form-group">
    <div class="col-md-13 mb-3 mb-md-0">
        <h3 class="create-internship-title">Titel</h3>
        <input type="text" class="form-control" value="{{ $title ?? '' }}" id="title_vacature" name='title'>

        <h3 class="create-internship-title">Plaats</h3>
        <input type="text" class="form-control" value="{{ $address ?? '' }}" name='address'>

        <h3 class="create-internship-title space">Teaser</h3>
        <input type="textarea" class="form-control" value="{{ $description ?? ''  }}" rows="8" cols="50" name='description'>

        <h3 class="create-internship-title">Functie</h3>
        <input type="textarea" class="form-control" value="{{ $functie_omschrijving ?? ''  }}" rows="8" cols="50" name='functie_omschrijving'>

        <h3 class="create-internship-title">Ons aanbod</h3>
        <input type="textarea" class="form-control" value="{{ $aanbod ?? '' }}" rows="8" cols="50" name='aanbod'>

        <button type="submit" class="btn btn-primary">Maak deze vacature aan</button>
    </div>
</div>