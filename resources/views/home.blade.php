@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <h1 class="text-primary mb-3 h6 fst-italic">Aujourd'hui à L'Usine</h1>
        @forelse ($events as $event)
            @include('events.includes.card')
        @empty
            <p class="text-muted fst-italic">Pas d'évènements prévus</p>
        @endforelse
        <a href="{{ route('events.index') }}">Ces prochains jours →</a>

        <div class="mt-5 fst-italic text-muted small">
            @include('layouts.includes.external-entities')
        </div>
    </section>

    @if ($latestNews)
        <section class="mt-6">
            <h1 class="text-primary h6">{{ $latestNews->title }}</h1>
            <p class="text-muted fst-italic">Actualité du {{ $latestNews->publication_date->isoFormat('LL') }}</p>
            <p>{!! nl2br($latestNews->body) !!}</p>
        </section>
    @endif
</div>
@endsection
