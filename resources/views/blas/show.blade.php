@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">{{ $bla->title }}</h1>
    <p>{{ $bla->date->isoFormat('LL') }}</p>
    <p>{!! nl2br($bla->body) !!}</p>
</div>
@endsection
