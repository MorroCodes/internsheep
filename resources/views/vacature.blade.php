
@extends('layouts/vacature')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
@section('nav')
<ul class="nav" id="nav">
  <li class="nav-item">
    <a class="nav-link active" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Students</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Meldingen</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Profiel</a>
  </li>
</ul>

<div class="nav" id="nav2">
    <img src="/img/intr.png" alt="profile pic" class="icon">
    <p>Interacto</p>
</div>


@endsection
@section('vacature')
<div class="card text-center">
  <div class="card-header">
    Flux
  </div>
  <div class="card-body">
    <h1 id="title_vacature">Webdeveloper</h1>
    <div class="flex">
        <h3 class="plaats">Plaats</h3>
        <p class="location">Antwpen</p>
        <a href="#"><img src="/img/edit.png" class='edit'></a>
        <img src="/img/delete.png" class='delete'>
    </div class="vacatureBody">
    <h3 class="space">bedrijfsbeschrijving</h3>
    <p>Flux is een webdesign bedrijf dat websites en IT oplossingen aanbiedt aan middelgrote bedrijven. Onze klanten zijn voornamelijk gebaseerd in Antwerpen maar we werken ook voor bedrijven in London en China. We zijn een jong snelgroeiend bedrijf gebaseerd in Idealabs. Dit is een leuke omgeving vol met snelgroeiende technologiebedrijven.</p>
    <h3>Functieomschrijving</h3>
    <p>Ben jij nog op zoek naar een stageplaats of een job als webdesigner? Stuur ons dan vlug een email, want wij breiden uit. Wij zijn een webdesign bedrijf in het hartje van Antwerpen. Wij zijn gevestigd in Idealabs, een co-working space vlakbij de Meir. Naast het maken van websites proberen wij een totaaloplossing voor onze klanten te bieden.Wil jij graag bij ons solliciteren? Stuur dan een bericht naar hello@flux.be. Voeg gelijk je portfolio toe en/of een voorbeeld van een website (of ander project) die je al gemaakt hebt. Je kunt de startdatum van je stage zelf bepalen!</p>
    <h3>Profiel</h3>
    <p>een coole kikker</p>
    <h3>Wat bieden wij aan ?</h3>
    <p>Flux is een webdesign bedrijf dat websites en IT oplossingen aanbiedt aan middelgrote bedrijven. Onze klanten zijn voornamelijk gebaseerd in Antwerpen maar we werken ook voor bedrijven in London en China.We zijn een jong snelgroeiend bedrijf gebaseerd in Idealabs. Dit is een leuke omgeving vol met snelgroeiende technologiebedrijven. Je krijgt ook koffie</p>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
@endsection
</body>
</html>