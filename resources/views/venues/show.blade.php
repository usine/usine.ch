@extends('layouts.app')

@section('content')
<div class="container">
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
        @if ($venue->tel)
            <p>
                {{ $venue->tel }}
            </p>
        @endif
        @if ($venue->email)
            <p>
                <a href="mailto:{{ $venue->email }}">{{ $venue->email }}</a>
            </p>
        @endif
        @if ($venue->website)
            <p>
                <a href="{{ $venue->website }}">{{ $venue->website }}</a>
            </p>
        @endif
    </section>

    <section class="mt-5">
        <h2>Évènements</h2>
        @include('events.includes.lists')
    </section>
</div>
@endsection
