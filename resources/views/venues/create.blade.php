@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nouvel espace</h1>

    <form action="{{ route('venues.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <h2 class="h3 mt-5 mb-3">Général</h2>

        <div class="row g-3">
            <div class="col-md">
              <label for="name" class="form-label">Nom de l'espace *</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="col-md">
              <label for="logo" class="form-label">Logo</label>
              <input class="form-control" type="file" id="logo" name="logo" value="{{ old('logo') }}">
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="6">{{ old('description') }}</textarea>
            </div>
        </div>

        <h2 class="h3 mt-5 mb-3">Contact</h2>

        <div class="row g-3">
            <div class="col-12">
                <label for="access" class="form-label">Accès à l'espace</label>
                <input type="text" class="form-control" name="access" id="access" value="{{ old('access') }}" aria-describedby="accessHelp">
                <small id="accessHelp" class="form-text text-muted">P.E. 11 rue de la Coulouvrenière, 2ème étage à gauche</small>
            </div>

            <div class="col-12">
              <label for="website" class="form-label">Site internet</label>
              <input type="text" class="form-control" name="website" id="website" value="{{ old('website') }}">
            </div>

            <div class="col-md">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="col-md">
              <label for="tel" class="form-label">Téléphone</label>
              <input type="tel" class="form-control" name="tel" id="tel" value="{{ old('tel') }}">
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Créer l'espace</button>
            <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
        </div>
    </form>
</div>
@endsection
