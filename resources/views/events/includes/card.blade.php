<a href="{{ route('events.show', $event) }}" class="mb-3 d-flex text-body @if ($event->finished) text-muted @endif">
    <div class="mr-3 flex-shrink-0" style="flex-basis: 100px;">
        @if ($event->flyer)
            <img src="{{ Storage::url($event->flyer) }}" alt="Flyer {{ $event->title }}" class="img-fluid">
        @endif
    </div>
    <div>
        {{ $event->start->format('H:i') }}
        @if ($event->end)
             — {{ $event->end->format('H:i') }}
        @endif
        <br>
        <span class="font-weight-bold">{{ $event->title }}</span>
        <br>
        <span>{{ $event->venuesList }}</span>
    </div>
</a>
