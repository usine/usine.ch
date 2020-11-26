<b>{{ $venue->name }}</b>
@include('venues.includes.contact')
<a href="{{ route('venues.show', $venue) }}">☞ Vers l'espace</a>
