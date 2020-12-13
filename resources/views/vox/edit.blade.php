@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le vox</h1>

    <form action="{{ route('vox.update', $vox) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
          <label for="title">Titre *</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $vox->title) }}" required>
        </div>

        <div class="form-group">
          <label for="date">Date *</label>
          <input type="month" class="form-control" name="date" id="date" value="{{ old('date', $vox->date->format('Y-m')) }}" required>
        </div>

        <div class="form-row">
            <div class="form-group col-md">
                <label for="vox">voxUsini (PDF)</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="vox" name="vox" value="{{ old('vox') }}">
                  <label class="custom-file-label" for="vox">Choisir un fichier</label>
                </div>
            </div>
            <div class="form-group col-md">
                <label for="thumbnail">Miniature (image)</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">
                  <label class="custom-file-label" for="thumbnail">Choisir un fichier</label>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
        </div>
    </form>

    <hr>

    @can('delete', $vox)
        <div class="mt-5">
            <form method="POST" action="{{ route('vox.destroy', $vox) }}" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    @endcan
</div>
@endsection
