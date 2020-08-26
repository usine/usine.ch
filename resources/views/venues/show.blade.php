@extends('layouts.app')

@section('content')
<div class="container">
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
        <ul class="list-unstyled">
            @foreach ($venue->events as $event)
                <li>
                    <a href="{{ route('events.show', $event) }}">{{ $event->name }}</a>
                </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection
