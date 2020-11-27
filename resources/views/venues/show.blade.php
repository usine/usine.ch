@extends('layouts.app')

@section('content')
<div class="container">
    @if ($venue->logo)
        <div class="text-center mb-5">
            <img src="{{ Storage::url($venue->logo) }}" alt="Logo {{ $venue->name }}" class="img-fluid">
        </div>
    @endif

    <h1>{{ $venue->name }}</h1>
    @can('update', $venue)
        <a href="{{ route('venues.edit', $venue) }}" class="btn btn-primary mb-3">Modifier l'espace</a>
    @endcan

    <section class="mt-5">
        @if ($venue->description)
            <p>
                {!! nl2br(e($venue->description)) !!}
            </p>
        @endif
        @include('venues.includes.contact')
    </section>

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
