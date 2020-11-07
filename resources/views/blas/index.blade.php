@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-5">Blas</h1>
    @foreach ($blas as $bla)
        <a href="{{ route('blas.show', $bla) }}" class="mb-3 d-block text-body">
            <b>{{ $bla->title }}</b>
            <br>
            {{ $bla->date->isoFormat('LL') }}
        </a>
        @if (!$loop->last)
            <hr>
        @endif
    @endforeach
</div>
@endsection
