@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Nouvel évènement</h1>

    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Titre *</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
          <label for="espaces">Espace(s) *</label>
          <select multiple class="form-control" id="espaces" name="venues[]" required>
              @foreach ($venues as $venue)
                  <option value="{{ $venue->id }}" @if (in_array($venue->id, old('venues', []))) selected @endif>{{ $venue->name }}</option>
              @endforeach
          </select>
        </div>
        <div class="row">
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="price">Entrée (prix, texte libre, ...) *</label>
                  <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" required>
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="billetterie">Billetterie (URL)</label>
                  <input type="text" class="form-control" name="billetterie" id="billetterie" value="{{ old('billetterie') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="start">Début *</label>
                  <input type="datetime-local" class="form-control bg-white" name="start" id="start" value="{{ old('start') }}" data-datepicker="datetime" required>
                  <small class="form-text text-muted">Si l'heure de début est antérieure 5h du matin, l'évènement sera affiché avec les évènements du jour précédent</small>
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="end">Fin</label>
                  <input type="datetime-local" class="form-control bg-white" name="end" id="end" value="{{ old('end') }}" data-datepicker="datetime">
                </div>
            </div>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" rows="6">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="flyer">Flyer</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="flyer" name="flyer" value="{{ old('flyer') }}">
              <label class="custom-file-label" for="flyer">Choisir un fichier</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'évènement</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
