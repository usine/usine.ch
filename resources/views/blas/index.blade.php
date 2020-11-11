@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-5">Blas</h1>

    @can('create', App\Bla::class)
        <a href="{{ route('blas.create') }}" class="btn btn-primary mb-3">Nouveau Bla</a>
    @endcan

    @foreach ($blas as $bla)
        <a href="{{ route('blas.show', $bla) }}" class="mb-3 d-block text-body">
            <b>{{ $bla->title }}</b>
            <br>
            {{ $bla->created_at->isoFormat('LL') }}
        </a>
        @if (!$loop->last)
            <hr>
        @endif
    @endforeach
</div>
@endsection
