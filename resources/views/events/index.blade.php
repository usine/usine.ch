@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($events as $event)
        <a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body">
            {{ $event->start }} — {{ $event->end }}
            <br>
            <span class="font-weight-bold">{{ $event->name }}</span>
            <br>
            <span>{{ $event->venue->name }}</span>
        </a>
    @endforeach
</div>
@endsection
