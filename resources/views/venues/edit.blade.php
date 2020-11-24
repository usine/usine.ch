@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'espace</h1>

    <form action="{{ route('venues.update', $venue) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
          <label for="name">Nom de l'espace *</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $venue->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $venue->description) }}</textarea>
        </div>

        <div class="row">
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $venue->email) }}">
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="tel">Téléphone</label>
                  <input type="tel" class="form-control" name="tel" id="tel" value="{{ old('tel', $venue->tel) }}">
                </div>
            </div>
        </div>

        <div class="form-group">
          <label for="website">Site internet</label>
          <input type="text" class="form-control" name="website" id="website" value="{{ old('website', $venue->website) }}">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
