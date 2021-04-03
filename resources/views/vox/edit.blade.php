@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le voxUsini</h1>

    <form action="{{ route('vox.update', $vox) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row g-3">
            <div class="col-12">
              <label for="title" class="form-label">Titre *</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $vox->title) }}" required>
            </div>

            <div class="col-12">
              <label for="date" class="form-label">Date *</label>
              <input type="month" class="form-control" name="date" id="date" value="{{ old('date', $vox->date->format('Y-m')) }}" data-datepicker="month" required>
            </div>

            <div class="col-12 col-md">
                <label for="logo" class="form-label">voxUsini (PDF)</label>
                <input class="form-control" type="file" id="vox" name="vox" value="{{ old('vox') }}">
            </div>

            <div class="col-12 col-md">
                <label for="thumbnail" class="form-label">Miniature (image)</label>
                <input class="form-control" type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">
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
