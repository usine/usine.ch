@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @can('create', App\Event::class)
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Ajouter un évènement</a>
    @endcan
    @include('events.includes.lists')
</div>
@endsection
