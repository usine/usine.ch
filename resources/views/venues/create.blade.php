@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nouvel espace</h1>

    <form action="{{ route('venues.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <h2 class="h3 mt-5 mb-3">Général</h2>

        <div class="row">
            <div class="form-group col-md">
              <label for="name">Nom de l'espace *</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div class="form-group col-md">
                <label for="logo">Logo</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="logo" name="logo" value="{{ old('logo') }}">
                  <label class="custom-file-label" for="logo">Choisir un fichier</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="6">{{ old('description') }}</textarea>
        </div>

        <h2 class="h3 mt-5 mb-3">Contact</h2>

        <div class="form-group">
            <label for="access">Accès à la salle</label>
            <input type="text" class="form-control" name="access" id="access" value="{{ old('access') }}" aria-describedby="accessHelp">
            <small id="accessHelp" class="form-text text-muted">P.E. 11 rue de la Coulouvrenière, 2ème étage à gauche</small>
        </div>

        <div class="row">
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="tel">Téléphone</label>
                  <input type="tel" class="form-control" name="tel" id="tel" value="{{ old('tel') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
          <label for="website">Site internet</label>
          <input type="text" class="form-control" name="website" id="website" value="{{ old('website') }}">
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Créer l'espace</button>
            <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
        </div>
    </form>
</div>
@endsection
