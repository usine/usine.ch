@if ($date->isYesterday())
    <h2 class="text-primary mb-0">Hier</h2>
    <p class="text-muted">{{ $date->isoFormat('dddd D MMMM Y') }}</p>
@elseif ($date->isSameDay())
    <h2 class="text-primary mb-0">Aujourd'hui</h2>
    <p class="text-muted">{{ $date->isoFormat('dddd D MMMM Y') }}</p>
@elseif ($date->isTomorrow())
    <h2 class="text-primary mb-0">Demain</h2>
    <p class="text-muted">{{ $date->isoFormat('dddd D MMMM Y') }}</p>
@else
    <h2 class="text-primary mb-3">{{ $date->isoFormat('dddd D MMMM Y') }}</h2>
@endif

@forelse ($events as $event)
    @include('events.includes.card')
    @if (!$loop->last)
        <hr>
    @endif
@empty
    <p class="text-muted font-italic">Pas d'évènements prévu pour ce jour 😢</p>
@endforelse
