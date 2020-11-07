<a href="{{ route('events.show', $event) }}" class="mb-3 d-flex text-body @if ($event->finished) text-muted @endif">
    <div class="mr-3">
        {{ $event->start->format('H:i') }}
        @if ($event->end)
             <br>{{ $event->end->format('H:i') }}
        @endif
    </div>
    <div>
        <span class="font-weight-bold">{{ $event->title }}</span>
        <br>
        <span>{{ $event->venuesList }}</span>
    </div>
</a>
