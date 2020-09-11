<form class="mb-5" action="{{ url()->current() }}" method="get">
    <input type="text" class="bg-white" name="date" value="{{ Request::get('date') }}" data-datepicker="date">
    <button type="submit" class="btn btn-primary">Filtrer</button>
</form>
<div class="row">
    <div class="col-12 col-lg">
        @include('events.includes.list', ['events' => $eventsAtDate, 'date' => $date])
    </div>
    <div class="col-12 col-lg mt-3 mt-lg-0">
        @include('events.includes.list', ['events' => $eventsAtDatePlus1, 'date' => $date->copy()->addDays(1)])
    </div>
    <div class="col-12 col-lg mt-3 mt-lg-0">
        @include('events.includes.list', ['events' => $eventsAtDatePlus2, 'date' => $date->copy()->addDays(2)])
    </div>
</div>
