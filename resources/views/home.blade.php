@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md">
            <h1>À l'affiche</h1>
            @foreach ($events as $event)
                <a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body @if ($event->finished) text-muted @endif">
                    {{ $event->start->format('H:i') }} — {{ $event->end->format('H:i') }}
                    <br>
                    <span class="font-weight-bold">{{ $event->title }}</span>
                    <br>
                    <span>{{ $event->venue->name }}</span>
                </a>
            @endforeach
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
