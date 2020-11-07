@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-5">Espaces</h1>
    @foreach ($venues as $venue)
        <a href="{{ route('venues.show', $venue) }}" class="mb-3 d-block text-body">
            {{ $venue->name }}
        </a>
    @endforeach
</div>
@endsection
