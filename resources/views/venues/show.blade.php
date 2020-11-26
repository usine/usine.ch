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
        <h2>Évènements</h2>
        @include('events.includes.lists')
    </section>
</div>
@endsection
