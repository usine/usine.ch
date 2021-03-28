@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'espace</h1>

    <form action="{{ route('venues.update', $venue) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <h2 class="h3 mt-5 mb-3">Général</h2>

        <div class="row g-3">
            <div class="col-md">
              <label for="name" class="form-label">Nom de l'espace *</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $venue->name) }}" required>
            </div>

            <div class="col-md">
              <label for="logo" class="form-label">Logo (modifie le logo actuel)</label>
              <input class="form-control" type="file" id="logo" name="logo">
            </div>

            @if ($venue->logo)
                <div class="col-md">
                    <label class="form-label">Supprimer le logo</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="removeLogo" name="removeLogo">
                      <label class="form-check-label" for="removeLogo">
                        Supprimer
                      </label>
                    </div>
                </div>
            @endif

            <div class="col-12">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="6">{{ old('description', $venue->description) }}</textarea>
            </div>
        </div>

        <h2 class="h3 mt-5 mb-3">Contact</h2>

        <div class="row g-3">
            <div class="col-12">
                <label for="access">Accès à la salle</label>
                <input type="text" class="form-control" name="access" id="access" value="{{ old('access', $venue->access) }}" aria-describedby="accessHelp">
                <small id="accessHelp" class="form-text text-muted">P.E. 11 rue de la Coulouvrenière, 2ème étage à gauche</small>
            </div>

            <div class="col-12">
              <label for="website">Site internet</label>
              <input type="text" class="form-control" name="website" id="website" value="{{ old('website', $venue->website) }}">
            </div>

            <div class="col-md">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $venue->email) }}">
            </div>
            <div class="col-md">
              <label for="tel">Téléphone</label>
              <input type="tel" class="form-control" name="tel" id="tel" value="{{ old('tel', $venue->tel) }}">
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
        </div>
    </form>
</div>
@endsection
