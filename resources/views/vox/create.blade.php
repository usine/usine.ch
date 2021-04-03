@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nouveau voxUsini</h1>

    <form action="{{ route('vox.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">
            <div class="col-12">
                <label for="title" class="form-label">Titre *</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="col-12">
              <label for="date" class="form-label">Date *</label>
              <input type="month" class="form-control" name="date" id="date" value="{{ old('date') }}" data-datepicker="month" required>
            </div>

            <div class="col-12 col-md">
                <label for="logo" class="form-label">voxUsini (PDF) *</label>
                <input class="form-control" type="file" id="vox" name="vox" value="{{ old('vox') }}" required>
            </div>

            <div class="col-12 col-md">
                <label for="thumbnail" class="form-label">Miniature (image) *</label>
                <input class="form-control" type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" required>
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Créer le vox</button>
            <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
        </div>
    </form>
</div>
@endsection
