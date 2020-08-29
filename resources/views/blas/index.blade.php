@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @foreach ($blas as $bla)
        <a href="{{ route('blas.show', $bla) }}" class="mb-3 d-block text-body">
            {{ $bla->title }}
            <br>
            {{ $bla->date }}
        </a>
    @endforeach
</div>
@endsection
