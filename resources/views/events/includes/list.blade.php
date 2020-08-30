<p class="font-weight-bold">
    @if ($date->isSameDay())
        {{ $date->isoFormat('[Aujourd\'hui] (dddd D MMMM Y)') }}
    @elseif ($date->isTomorrow())
        {{ $date->isoFormat('[Demain] (dddd D MMMM Y)') }}
    @else
        {{ $date->isoFormat('dddd D MMMM Y') }}
    @endif
</p>

@forelse ($events as $event)
    @include('events.includes.card')
@empty
    <p class="text-muted font-italic">Pas d'évènements prévu pour ce jour 😢</p>
@endforelse
