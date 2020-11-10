@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nouvel espace</h1>

    <form action="{{ route('venues.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Nom de l'espace *</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
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

        <button type="submit" class="btn btn-primary">Créer l'espace</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
