@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg">
            <b>Aujourd'hui</b>
            @foreach ($eventsToday as $event)
                <a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body @if ($event->finished) text-muted @endif">
                    {{ $event->start }} — {{ $event->end }}
                    <br>
                    <span class="font-weight-bold">{{ $event->title }}</span>
                    <br>
                    <span>{{ $event->venue->name }}</span>
                </a>
            @endforeach
        </div>
        <div class="col-12 col-lg">
            <b>Demain</b>
            @foreach ($eventsTomorrow as $event)
                <a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body">
                    {{ $event->start }} — {{ $event->end }}
                    <br>
                    <span class="font-weight-bold">{{ $event->title }}</span>
                    <br>
                    <span>{{ $event->venue->name }}</span>
                </a>
            @endforeach
        </div>
        <div class="col-12 col-lg">
            <b>Après-demain</b>
            @foreach ($eventsDayAfterTomorrow as $event)
                <a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body">
                    {{ $event->start }} — {{ $event->end }}
                    <br>
                    <span class="font-weight-bold">{{ $event->title }}</span>
                    <br>
                    <span>{{ $event->venue->name }}</span>
                </a>
            @endforeach
        </div>
        <div class="col-12 col-lg">
            <b>Après-après-demain</b>
            @foreach ($eventsDayAfterAfterTomorrow as $event)
                <a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body">
                    {{ $event->start }} — {{ $event->end }}
                    <br>
                    <span class="font-weight-bold">{{ $event->title }}</span>
                    <br>
                    <span>{{ $event->venue->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
