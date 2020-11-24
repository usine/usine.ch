@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">{{ $news->title }}</h1>

    <p>{{ $news->publication_date->isoFormat('LL') }}</p>
    <p>{!! nl2br($news->body) !!}</p>

    @can('update', $news)
        <a href="{{ route('news.edit', $news) }}" class="btn btn-primary">Modifier l'actualité</a>
    @endcan

    @can('delete', $news)
        <form method="POST" action="{{ route('news.destroy', $news) }}" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link text-danger">Supprimer</button>
        </form>
    @endcan
</div>
@endsection
