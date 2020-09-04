@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Modifier l'évènement</h1>

    <form action="{{ route('events.update', $event) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="title">Titre *</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $event->title) }}" required>
        </div>
        <div class="form-group">
          <label for="espaces">Espace(s) *</label>
          <select multiple class="form-control" id="espaces" name="venues[]" required>
              @foreach ($venues as $venue)
                  <option value="{{ $venue->id }}" @if (in_array($venue->id, old('venues', $event->venues->pluck('id')->toArray()))) selected @endif>{{ $venue->name }}</option>
              @endforeach
          </select>
        </div>
        <div class="row">
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="price">Entrée (prix, texte libre, ...) *</label>
                  <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $event->price) }}" required>
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="billetterie">Billetterie (URL)</label>
                  <input type="text" class="form-control" name="billetterie" id="billetterie" value="{{ old('billetterie', $event->billetterie) }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="start">Début *</label>
                  <input type="datetime-local" class="form-control" name="start" id="start" value="{{ old('start', $event->startFormattedForInput) }}" required>
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="form-group">
                  <label for="end">Fin</label>
                  <input type="datetime-local" class="form-control" name="end" id="end" value="{{ old('end', $event->endFormattedForInput) }}">
                </div>
            </div>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" rows="6">{{ old('description', $event->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ url()->previous() }}" class="btn btn-text">Annuler</a>
    </form>
</div>
@endsection
