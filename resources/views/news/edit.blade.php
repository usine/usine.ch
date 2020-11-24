@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'actualité</h1>

    <form action="{{ route('news.update', $news) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
          <label for="publication_date">Date de publication</label>
          <input type="datetime-local" class="form-control bg-white" name="publication_date" id="publication_date" value="{{ old('publication_date', $news->publicationDateFormattedForInput) }}" data-datepicker="datetime">
          <small class="form-text text-muted">Si une date de publication n'est pas renseignée, l'actualité sera publiée au moment de l'enregistrement</small>
        </div>

        <div class="form-group">
          <label for="title">Titre *</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $news->title) }}">
        </div>

        <div class="form-group">
          <label for="editor">Texte *</label>
          <textarea class="form-control" id="editor" name="body" rows="6">{{ old('body', $news->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
