@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nouveau Bla</h1>

    <form action="{{ route('blas.store') }}" method="post">
        @csrf

        <div class="form-group">
          <label for="title">Titre *</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
          <label for="editor">Bla *</label>
          <textarea class="form-control" name="body" rows="6" id="editor">{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publier le Bla</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
