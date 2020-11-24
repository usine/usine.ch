@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-5">Actualités</h1>

    @can('create', App\News::class)
        <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Nouvelle actualité</a>
    @endcan

    @foreach ($news as $n)
        <a href="{{ route('news.show', $n) }}" class="mb-3 d-block text-body">
            <b>{{ $n->title }}</b>
            <br>
            {{ $n->publication_date->isoFormat('LL') }}
        </a>
        @if (!$loop->last)
            <hr>
        @endif
    @endforeach
</div>
@endsection
