<a href="{{ route('events.show', $event) }}" class="mb-3 d-block text-body @if ($event->finished) text-muted @endif">
    {{ $event->start->format('H:i') }} — {{ $event->end->format('H:i') }}
    <br>
    <span class="font-weight-bold">{{ $event->title }}</span>
    <br>
    <span>{{ $event->venuesList }}</span>
</a>
