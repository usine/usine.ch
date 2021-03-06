@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">Contact</h1>

    <h2 class="mt-5">L'Usine</h2>
    <div>
        <p>
            <b>La permanence</b><br>
            4, Place des Volontaires<br>
            1204 Genève, Suisse<br>
            <a href="tel:+41227813490">+41 22 781 34 90</a>
            <br>
            <a href="mailto:usine@usine.ch">usine@usine.ch</a>
        </p>
        <p>
            La permanence de L’Usine est ouverte du lundi au jeudi
            <br>
            Bureau: 4, Place des Volontaires – 2ème étage, à droite.
        </p>
    </div>

    <h2 class="mt-5">Les espaces</h2>
    <div>
        @foreach ($venues as $venue)
            <div class="mt-3">
                @include('venues.includes.card')
            </div>
        @endforeach
    </div>

    <h2 class="mt-5">Plan du bâtiment</h2>
    <img src="/img/plan-usine.svg" class="img-fluid" alt="L'Usine - Plan du bâtiment">
</div>
@endsection
