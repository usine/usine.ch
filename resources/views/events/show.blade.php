@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        @if ($event->flyer)
            <div class="col-md mb-4">
                <img src="{{ Storage::url($event->flyer) }}" alt="Flyer {{ $event->title }}" class="img-fluid mb-5">
            </div>
        @endif
        <div class="col-md">
            <h1 class="text-primary">{{ $event->title }}</h1>

            <div>
                <p>
                    {{ $event->start }}

                    @if ($event->end)
                         — {{ $event->end }}
                    @endif
                </p>
                <p>
                    {{ $event->price }}
                </p>
                @if ($event->billetterie)
                    <p>
                        <a href="{{ $event->billetterie }}" class="btn btn-outline-primary">Billets</a>
                    </p>
                @endif
                <p>
                    @foreach ($event->venues as $venue)
                        <a href="{{ route('venues.show', $venue) }}">{{ $venue->name }}</a>@if(!$loop->last), @endif
                    @endforeach
                </p>
            </div>

            @if ($event->description)
                <p class="text-block">{!! $event->formattedDescription !!}</p>
            @endif
        </div>
    </div>

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
