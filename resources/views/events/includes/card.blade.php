<a href="{{ route('events.show', $event) }}" class="mb-3 d-flex text-body @if ($event->finished) text-muted @endif">
    <div class="me-3 flex-shrink-0" style="flex-basis: 100px;">
        @if ($event->flyer)
            <img src="{{ $event->flyer200 }}" alt="Flyer {{ $event->title }}" class="img-fluid">
        @elseif ($event->venues->count() === 1)
            @php
                $venue = $event->venues->first();
            @endphp
            @if ($venue->logo)
                <img src="{{ Storage::url($venue->logo) }}" alt="{{ $venue->name }}" class="img-fluid">
            @endif
        @else
            <img src="/img/usine-batiment.svg" alt="L'Usine" class="img-fluid">
        @endif
    </div>
    <div>
        @if ($event->start->isSameDay(now()))
            {{ $event->start->format('H:i') }}
            @if ($event->end)
                 — {{ $event->end->format('H:i') }}
            @endif
        @else
            {{ $event->displayDate }}
        @endif
        <br>
        <span class="font-weight-bold">{{ $event->title }}</span>
        <br>
        <span>{{ $event->venuesList }}</span>
    </div>
</a>
