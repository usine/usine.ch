<form class="mb-5 d-flex" action="{{ url()->current() }}" method="get">
    <input type="text" class="bg-white form-control" name="date" value="{{ Request::get('date') }}" data-datepicker="date">
    <button type="submit" class="btn btn-primary">Filtrer</button>
</form>

<div>
    @include('events.includes.list', ['events' => $eventsAtDate, 'date' => $date])
</div>
<div class="mt-6">
    @include('events.includes.list', ['events' => $eventsAtDatePlus1, 'date' => $date->copy()->addDays(1)])
</div>
<div class="mt-6">
    @include('events.includes.list', ['events' => $eventsAtDatePlus2, 'date' => $date->copy()->addDays(2)])
</div>
