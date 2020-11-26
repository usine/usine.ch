@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">{{ $event->title }}</h1>

    <p>
        @foreach ($event->venues as $venue)
            <a href="{{ route('venues.show', $venue) }}" class="text-reset">{{ $venue->name }}</a>@if(!$loop->last), @endif
        @endforeach
    </p>

    <p>
        {{ $event->displayDate }}
    </p>

    <div>
        <p>
            {{ $event->price }}
        </p>
        @if ($event->billetterie)
            <p>
                <a href="{{ $event->billetterie }}" class="btn btn-outline-primary">Billets</a>
            </p>
        @endif
    </div>

    <div class="row mt-5">
        @if ($event->flyer)
            <div class="col-md mb-4">
                <img src="{{ Storage::url($event->flyer) }}" alt="Flyer {{ $event->title }}" class="img-fluid">
            </div>
        @endif
        <div class="col-md">
            @if ($event->description)
                {!! nl2br($event->description) !!}
            @endif
        </div>
    </div>

    <hr class="my-5">

    <div class="row">
        @foreach ($event->venues as $venue)
            <div class="col-md-4">
                <div>
                    @include('venues.includes.card')
                </div>
            </div>
        @endforeach
    </div>

    @can(['update', 'delete'], $event)
        <div class="mt-5">
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
    @endcan
</div>
@endsection
