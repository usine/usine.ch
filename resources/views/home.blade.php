@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <h1 class="text-primary mb-3 h6 font-italic">Aujourd'hui à L'Usine</h1>
        @forelse ($events as $event)
            @include('events.includes.card-home')
        @empty
            <p class="text-muted font-italic">Pas d'évènements prévu aujourd'hui 😢</p>
        @endforelse
        <a href="{{ route('events.index') }}">Ces prochains jours →</a>
    </section>

    @if ($latestNews)
        <section class="mt-6">
            <h1 class="text-primary h6">{{ $latestNews->title }}</h1>
            <p class="text-muted font-italic">Actualité du {{ $latestNews->publication_date->isoFormat('LL') }}</p>
            <p>{!! nl2br($latestNews->body) !!}</p>
        </section>
    @endif
</div>
@endsection
