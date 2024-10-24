
<h1>Lista de Invitados para el evento: {{ $event->name }}</h1>
<a href="{{ route('guests.create', $event) }}">Agregar nuevo invitado</a>
<ul>
    @foreach ($guests as $guest)
        <li>{{ $guest->name }} ({{ $guest->unique_code }}) - <a href="{{ route('events.guests.edit', [$event, $guest]) }}">Editar</a></li>
    @endforeach
</ul>