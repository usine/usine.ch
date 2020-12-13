@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">voxUsini</h1>

    <p>
        c’est (en latin de cuisine) la voix de L’Usine.
    </p>
    <p>
        paraissant depuis le mois de septembre 1995 (il était alors carré et en noir et blanc et ne portait pas encore ce nom), le « voxUsini, mensuel de propagande de L’Usine », est à la fois le programme général regroupant les différents évènements qui se déroulent à L’Usine (et parfois même ailleurs au gré des collaborations) et l’organe de presse de l’association L’Usine.
    </p>
    <p>
        tiré jusqu’à 3500 exemplaires (plus une cinquantaine non-pliés), inscrit sur le régistre fédéral Helveticat (il dispose donc de son propre numéro ISSN) et diffusé jusqu’en des coins improbables partout autour de la planète, il se devait d’avoir sa propre « page internet ». c’est donc chose faite…
    </p>
    <p>
        créé en septembre 1995, et réalisé jusqu’en avril 2013  par compost (c’est à dire Dominic Brugger), il est passé depuis d’un A4 recto verso noir/blanc imprimé en offset sur papier recyclé tiré à un petit millier d’exemplaires à un format ouvert de 60cm sur 30cm (et fermé de 10 cm X 15 cm), toujours sur recyclé et en offset, mais en deux couleurs, tiré jusqu’à 4500 exemplaires pliés plus une centaine non-pliés. il s’est offert une parenthèse, d’abord sous la houlette de Déborah, puis avec un format A3 ouvert, 10 cm X 21 cm fermé, réalisé par Thomas, puis a été repensé avec un format ouvert A3 et fermé de 7 cm X 14.8 cm, en deux couleurs par Sylvain Leguy, qui l’a réalisé pendant trois ans.  il adopte désormais un format 310 X 430 ouvert, 110X155 fermé, créé et réalisé par Martin Besson & Benoit Ecoiffier.
    </p>
    <p>
        rassemblant la programmation des divers lieux de L’Usine, ainsi qu’un éditorial de la permanence et les informations indispensables pour prendre contact avec les différentes composantes du lieu, c’est un média protéiforme, avant tout destiné à informer, mais également un symbole de la volonté d’unité du lieu.
    </p>
    <p>
        financé par les associations présentes dans ses pages, et par l’ensemble de L’Usine à travers les cotisations, il est subordonné aux moyens financiers à disposition puisque le sponsoring est exclu.
    </p>
    <p>
        il est donc volontairement réduit à sa plus simple expression d’un point de vue technique: une impression recto verso en noir plus une couleur Pantone (qui varie à chaque numéro de façon à permettre aux lecteur de percevoir le changement), et un pliage en accordéon suivi d’un pli croisé pour que le résultat tienne dans une poche de jeans…
    </p>
    <p>
        devenu depuis un élément de l’identité de L’Usine, il est décliné depuis plusieurs années au format .pdf pour être diffusé par le net. Changeant au gré des époques, il n’a pas réellement de forme définie et pourrait changer au gré des nécessités et du temps qui passe….
    </p>
    <p>
        vous trouverez ici la collection (aussi complète que possible) des anciens numéros du voxUsini depuis ses débuts.
    </p>
    <p>
        Nota Bene: si vous êtes collectionneur et que vous possédez l’un des deux numéros manquants (à savoir: octobre 1995 & janvier 1998), n’hésitez surtout pas à contacter <a href="mailto:usine@usine.ch">usine@usine.ch</a>…. merci d’avance.
    </p>

    @can('create', App\Vox::class)
        <a href="{{ route('vox.create') }}" class="btn btn-primary mb-3">Ajouter un vox</a>
    @endcan

        @foreach ($voxs as $year => $voxs)
            <h2 class="mt-5">{{ $year }}</h2>
            <div class="row">
                @foreach ($voxs as $vox)
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <a href="{{ Storage::url($vox->vox) }}" class="d-block">
                            {{ $vox->title }}
                            <br>
                            <img src="{{ $vox->thumbnail600 }}" alt="{{ $vox->title }}" class="img-fluid" loading="lazy">
                        </a>
                        @can(['update', 'delete'], $vox)
                            <a href="{{ route('vox.edit', $vox) }}" class="btn btn-outline-primary btn-sm mt-1">Modifier/Supprimer</a>
                        @endcan
                    </div>
                @endforeach
            </div>
        @endforeach
</div>
@endsection
