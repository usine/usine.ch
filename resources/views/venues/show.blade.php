@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">{{ $venue->name }}</h1>

    <p>
        @include('venues.includes.contact')
    </p>

    <div class="row mt-5">
        @if ($venue->logo)
            <div class="col-md mb-4">
                <a href="{{ Storage::url($venue->logo) }}">
                    <img src="{{ $venue->logo962 }}" alt="Logo {{ $venue->name }}" class="img-fluid">
                </a>
            </div>
        @endif
        <div class="col-md">
            @if ($venue->description)
                <p>
                    {!! nl2br(e($venue->description)) !!}
                </p>
            @endif
        </div>
    </div>

    @can('update', $venue)
        <a href="{{ route('venues.edit', $venue) }}" class="btn btn-primary mb-3">Modifier l'espace</a>
    @endcan

    <section class="mt-5">
        <h2>Évènements à venir</h2>
        @forelse ($events as $event)
            @include('events.includes.card')
            @if (!$loop->last)
                <hr>
            @endif
        @empty
            <p class="text-muted font-italic">Pas d'évènements prévus 😢</p>
        @endforelse
    </section>
</div>
@endsection
