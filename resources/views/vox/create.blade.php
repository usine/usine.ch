@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nouveau Vox</h1>

    <form action="{{ route('vox.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="title">Titre *</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
          <label for="date">Date *</label>
          <input type="month" class="form-control" name="date" id="date" value="{{ old('date') }}" required>
        </div>

        <div class="form-row">
            <div class="form-group col-md">
                <label for="vox">voxUsini (PDF) *</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="vox" name="vox" value="{{ old('vox') }}" required>
                  <label class="custom-file-label" for="vox">Choisir un fichier</label>
                </div>
            </div>
            <div class="form-group col-md">
                <label for="thumbnail">Miniature (image) *</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" required>
                  <label class="custom-file-label" for="thumbnail">Choisir un fichier</label>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Créer le vox</button>
            <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
        </div>
    </form>
</div>
@endsection
