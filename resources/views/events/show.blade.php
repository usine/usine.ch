@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $event->name }}</h1>
    <p>
        {{ $event->start }} — {{ $event->end }}
    </p>
    <p>
        {{ $event->price }}
    </p>
    <p>
        <a href="{{ route('venues.show', $event->venue) }}">
            {{ $event->venue->name }}
        </a>
    </p>
</div>
@endsection
