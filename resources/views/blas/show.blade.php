@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">{{ $bla->title }}</h1>

    <p>{{ $bla->created_at->isoFormat('LL') }}</p>
    <p>{!! nl2br($bla->body) !!}</p>

    @can('update', $bla)
        <a href="{{ route('blas.edit', $bla) }}" class="btn btn-primary">Modifier le bla</a>
    @endcan

    @can('delete', $bla)
        <form method="POST" action="{{ route('blas.destroy', $bla) }}" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link text-danger">Supprimer</button>
        </form>
    @endcan
</div>
@endsection
