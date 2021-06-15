@extends('layouts.app')

@section('content')
<div class="container">
    <img src="/img/usine-batiment.jpg" alt="L'Usine - Photo du bâtiment depuis la place des Volontaires" class="img-fluid mb-5">

    <h1 class="text-primary">L'Usine?</h1>

    <p>
        Ouverte depuis 1989, L’Usine est un centre culturel autogéré important en Suisse et plébiscité par ses voisin-e-s européen-ne-s. L’association faîtière revendique une éthique de travail fondée sur l’autogestion, le multiculturalisme et l’ouverture aux autres.
    </p>
    <p>
        L’Usine est une association faîtière qui regroupe une vingtaine de collectifs et associations dont les plus visibles sont les lieux publics qui proposent une programmation de spectacles vivants, concerts, cinéma, expositions, performances, festivals et fêtes. L’Usine accueille aussi une multitude d’ateliers et d’espaces de création.
    </p>
    <p>
        Si chaque groupe possède son fonctionnement propre, certaines idées et pratiques sont partagées par toutes et tous : rejet du profit comme seul but des activités, de toute forme de concurrence ou de hiérarchie entre les individus ainsi qu’entre les disciplines.
    </p>

    <hr class="my-5">

    @include('layouts.includes.external-entities')
</div>
@endsection
