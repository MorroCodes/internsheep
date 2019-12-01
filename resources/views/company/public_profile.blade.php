@extends('layouts/company')

@section('content')
<div>
    <div class="company-profile-image-container">
        <img src="/{{$userInfo->profile_image}}" alt="test">
    </div>

    <h1>{{$companyInfo->company_name}}</h1>
</div>
@endsection

