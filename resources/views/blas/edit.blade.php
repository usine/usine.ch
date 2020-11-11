@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Bla</h1>

    <form action="{{ route('blas.update', $bla) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
          <label for="title">Titre *</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $bla->title) }}">
        </div>

        <div class="form-group">
          <label for="body">Bla *</label>
          <textarea class="form-control" id="body" name="body" rows="6">{{ old('body', $bla->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
