@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">voxUsini</h1>

    <p>
        le voxUsini est la voix de L’Usine (en latin de cuisine).
    </p>
    <p>
        créé en septembre 1995 par compost (Dominic Brugger), il existe aujourd’hui grâce au travail de sa nouvelle graphiste, Félicité Landrivon.
    </p>
    <p>
        véritable partie de notre identité, il est financé directement par les associations représentées dans ses pages, et par l’ensemble de L’Usine à travers les cotisations, excluant ainsi complètement le sponsoring.
    </p>
    <p>
        le voxUsini se compose de notre programme mensuel – nos soirées, nos ateliers, nos concerts, nos nuits – un édito/une tribune que nous écrivons à deux ou plus de mains usiniennes, et peut-être d’autres idées, au gré de nos envies et de nos aventures, le tout habilement mis en forme par l’œil artistique de Félicité.
    </p>
    <p>
        c’est un média protéiforme, avant tout destiné à informer, mais également un symbole de la volonté d’unité du lieu.
    </p>
    <p>
        sur cette page, vous pouvez trouver la collection (presque complète) des anciens numéros du voxUsini depuis ses débuts.
    </p>
    <p>
        changeant au gré des époques, il n’a pas réellement de forme définie et continuera d’évoluer.
    </p>
    <p>
        depuis l’été 2020, il est imprimé et plié à la maison, dans notre bâtiment, par les mains de Sarah et Mélanie (Reklam & Ladiff).
    </p>
    <p>
        Nota Bene: si vous êtes collectionneu-se-r et que vous possédez l’un des deux numéros disparus (octobre 95 et janvier 98), n’hésitez pas à nous contacter à <a href="mailto:usine@usine.ch">usine@usine.ch</a>!
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
