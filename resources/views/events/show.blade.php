@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>{{ $event->title }}</h1>
    <p>
        {{ $event->start }} — {{ $event->end }}
    </p>
    <p>
        {{ $event->price }}
    </p>
    <p>
        @foreach ($event->venues as $venue)
            <a href="{{ route('venues.show', $venue) }}">{{ $venue->name }}</a>@if(!$loop->last), @endif
        @endforeach
    </p>

    @if ($event->description)
        <p>{{ $event->description }}</p>
    @endif

    @can('update', $event)
        <a href="{{ route('events.edit', $event) }}" class="btn btn-primary">Modifier</a>
    @endcan

    @can('delete', $event)
        <form method="POST" action="{{ route('events.destroy', $event) }}" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    @endcan
</div>
@endsection
