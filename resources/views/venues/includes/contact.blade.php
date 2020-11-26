<p>
    @if ($venue->access)
        {{ $venue->access }}<br>
    @endif
    @if ($venue->tel)
        {{ $venue->tel }}<br>
    @endif
    @if ($venue->email)
        <a href="mailto:{{ $venue->email }}">{{ $venue->email }}</a><br>
    @endif
    @if ($venue->website)
        <a href="{{ $venue->website }}">{{ $venue->website }}</a><br>
    @endif
</p>
