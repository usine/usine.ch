@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'évènement</h1>

    <form action="{{ route('events.update', $event) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row g-3 mb-5">
            <div class="col-12">
              <label for="title" class="form-label">Titre *</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="col-12">
              <label for="espaces" class="form-label">Espace(s) *</label>
              <select multiple class="form-control" id="espaces" name="venues[]" required>
                  @foreach ($venues as $venue)
                      <option value="{{ $venue->id }}" @if (in_array($venue->id, old('venues', $event->venues->pluck('id')->toArray()))) selected @endif>{{ $venue->name }}</option>
                  @endforeach
              </select>
            </div>

            <div class="col-12 col-md-6">
              <label for="price" class="form-label">Entrée (prix, texte libre, ...) *</label>
              <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $event->price) }}" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="billetterie" class="form-label">Billetterie (URL)</label>
              <input type="text" class="form-control" name="billetterie" id="billetterie" value="{{ old('billetterie', $event->billetterie) }}">
            </div>

            <div class="col-12 col-md-6">
              <label for="start" class="form-label">Début *</label>
              <input type="test" class="form-control bg-white" name="start" id="start" value="{{ old('start', $event->startFormattedForInput) }}" data-datepicker="datetime" required>
              <small class="form-text text-muted">Si l'heure de début est antérieure 5h du matin, l'évènement sera affiché avec les évènements du jour précédent</small>
            </div>
            <div class="col-12 col-md-6">
              <label for="end" class="form-label">Fin</label>
              <input type="test" class="form-control bg-white" name="end" id="end" value="{{ old('end', $event->endFormattedForInput) }}" data-datepicker="datetime">
            </div>

            <div class="col-12">
              <label for="editor" class="form-label">Description</label>
              <textarea class="form-control" id="editor" name="description" rows="6">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="col-12 col-md">
                <label for="flyer" class="form-label">Flyer (modifie le flyer actuel)</label>
                <input class="form-control" type="file" id="flyer" name="flyer">
            </div>

            @if ($event->flyer)
                <div class="col-md">
                    <label class="form-label">Supprimer le flyer</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="removeFlyer" name="removeFlyer">
                      <label class="form-check-label" for="removeFlyer">
                        Supprimer
                      </label>
                    </div>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
