@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-5">Agenda</h1>
    @can('create', App\Event::class)
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Ajouter un évènement</a>
    @endcan
    @include('events.includes.lists')

    <hr class="my-5">
    @include('layouts.includes.external-entities')
</div>
@endsection
