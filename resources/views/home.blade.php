@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md">
            <h1>À l'affiche</h1>
            @forelse ($events as $event)
                @include('events.includes.card')
            @empty
                <p class="text-muted font-italic">Pas d'évènements prévu aujourd'hui 😢</p>
            @endforelse
            <a href="{{ route('events.index') }}">Tous les évènements →</a>
        </div>
        <div class="col-12 col-md">
            <h1>{{ $latestBla->title }}</h1>

            <p class="small text-muted">{{ $latestBla->date }}</p>

            <p>{{ $latestBla->body }}</p>

            <a href="{{ route('blas.index') }}">Tous les blas →</a>
        </div>
    </div>
</div>
@endsection
