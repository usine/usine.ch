<a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body @if ($event->finished) text-muted @endif">
    {{ $event->start->format('H:i') }}
    @if ($event->end)
         — {{ $event->end->format('H:i') }}
    @endif
    <br>
    <span class="font-weight-bold">{{ $event->title }}</span>
    <br>
    <span>{{ $event->venuesList }}</span>
</a>
