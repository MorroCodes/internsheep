<div class="card internship_container">
    <div class="card-body">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="d-block d-lg-flex">
            <div class="mr-3">
                <span class="icon-suitcase mr-1"></span>{{ $company_name}}
            </div>
            <div class="mr-3">
                <span class="icon-room mr-1"></span>{{ $address}}
            </div>
        </div>
        <p>{{ $catch_phrase}}</p>
        <a href="/internship/{{ $id }}" class="btn btn-primary">Meer info</a>
    </div>
</div>