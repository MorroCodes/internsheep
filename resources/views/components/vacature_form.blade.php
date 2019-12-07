<div class="form-group">
    <div class="col-md-13 mb-3 mb-md-0">
        <h3 class="create-internship-title">Titel</h3>
        <input type="text" class="form-control create-internship-input create-internship-input-title" value="{{ $title ?? '' }}" id="title_vacature" name='title'>

        <h3 class="create-internship-title">Plaats</h3>
        <input type="text" class="form-control create-internship-input create-internship-input-address" value="{{ $address ?? '' }}" name='address'>

        <h3 class="create-internship-title space">Teaser</h3>
        <textarea name='description' cols="30" rows="3" class="form-control create-internship-input create-internship-input-description">{{ $description ?? ''  }}</textarea>

        <h3 class="create-internship-title">Functie</h3>
        <textarea name='functie_omschrijving' cols="30" rows="5" class="form-control create-internship-input create-internship-input-function">{{ $functie_omschrijving ?? ''  }}</textarea>

        <h3 class="create-internship-title">Ons aanbod</h3>
        <textarea name='aanbod' cols="30" rows="5" class="form-control create-internship-input create-internship-input-offer">{{ $aanbod ?? '' }}</textarea>

    </div>
</div>