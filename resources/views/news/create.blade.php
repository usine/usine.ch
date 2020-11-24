@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nouvelle actualité</h1>

    <form action="{{ route('news.store') }}" method="post">
        @csrf

        <div class="form-group">
          <label for="title">Titre *</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
          <label for="editor">Texte *</label>
          <textarea class="form-control" name="body" rows="6" id="editor">{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publier l'actualité</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
