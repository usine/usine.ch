@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-5">Espaces</h1>
    @can('create', App\Venue::class)
        <a href="{{ route('venues.create') }}" class="btn btn-primary mb-3">Ajouter un espace</a>
    @endcan

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        @foreach ($venues as $venue)
            <div class="col mb-4">
                <a href="{{ route('venues.show', $venue) }}" class="text-body">
                    <div class="card h-100 border-0">
                        @if ($venue->logo)
                            <img src="{{ $venue->logo600 }}" alt="Logo {{ $venue->name }}" class="card-img-top p-3">
                        @endif
                        <div class="card-body d-flex align-items-end">
                            <h5 class="card-title mb-0">{{ $venue->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
