@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>{{ $venue->name }}</h1>

    <section>
        <h2>Informations</h2>
        @if ($venue->tel)
            <p>
                {{ $venue->tel }}
            </p>
        @endif
        @if ($venue->mail)
            <p>
                <a href="mailto:{{ $venue->mail }}">{{ $venue->mail }}</a>
            </p>
        @endif
        @if ($venue->website)
            <p>
                <a href="{{ $venue->website }}">{{ $venue->website }}</a>
            </p>
        @endif
    </section>

    <section>
        <h2>Évènements</h2>
        <h3>À venir</h3>
        <ul class="list-unstyled">
            @foreach ($venue->eventsToCome as $event)
                <li>
                    <a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body @if ($event->finished) text-muted @endif">
                        {{ $event->start }} — {{ $event->end }}
                        <br>
                        <span class="font-weight-bold">{{ $event->title }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <h3>Passé</h3>
        <ul class="list-unstyled">
            @foreach ($venue->eventsPast as $event)
                <li>
                    <a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body @if ($event->finished) text-muted @endif">
                        {{ $event->start }} — {{ $event->end }}
                        <br>
                        <span class="font-weight-bold">{{ $event->title }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection
