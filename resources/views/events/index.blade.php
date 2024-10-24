
<h1>Lista de Eventos</h1>
<a href="{{ route('events.create') }}">Crear nuevo evento</a>
<ul>
    @foreach ($events as $event)
        <li>{{ $event->name }} - <a href="{{ route('events.show', $event) }}">Ver</a></li>
    @endforeach
</ul>

