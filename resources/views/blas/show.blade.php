@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>{{ $bla->title }}</h1>
    <p class="small text-muted">{{ $bla->date }}</p>

    <p>
        {{ $bla->body }}
    </p>
</div>
@endsection
