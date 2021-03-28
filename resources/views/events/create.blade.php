@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nouvel évènement</h1>

    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-3 mb-5">
            <div class="col-12">
              <label for="title" class="form-label">Titre *</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="col-12">
              <label for="espaces" class="form-label">Espace(s) *</label>
              <select multiple class="form-control" id="espaces" name="venues[]" required>
                  @foreach ($venues as $venue)
                      <option value="{{ $venue->id }}" @if (in_array($venue->id, old('venues', []))) selected @endif>{{ $venue->name }}</option>
                  @endforeach
              </select>
            </div>

            <div class="col-12 col-md-6">
              <label for="price" class="form-label">Entrée (prix, texte libre, ...) *</label>
              <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="billetterie" class="form-label">Billetterie (URL)</label>
              <input type="text" class="form-control" name="billetterie" id="billetterie" value="{{ old('billetterie') }}">
            </div>

            <div class="col-12 col-md-6">
              <label for="start" class="form-label">Début *</label>
              <input type="datetime-local" class="form-control bg-white" name="start" id="start" value="{{ old('start') }}" data-datepicker="datetime" required>
              <small class="form-text text-muted">Si l'heure de début est antérieure 5h du matin, l'évènement sera affiché avec les évènements du jour précédent</small>
            </div>
            <div class="col-12 col-md-6">
              <label for="end" class="form-label">Fin</label>
              <input type="datetime-local" class="form-control bg-white" name="end" id="end" value="{{ old('end') }}" data-datepicker="datetime">
            </div>

            <div class="col-12">
              <label for="editor" class="form-label">Description</label>
              <textarea class="form-control" name="description" rows="6" id="editor">{{ old('description') }}</textarea>
            </div>

            <div class="col-12">
                <label for="formFile" class="form-label">Flyer</label>
                <input class="form-control" type="file" id="flyer" name="flyer" value="{{ old('flyer') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'évènement</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
