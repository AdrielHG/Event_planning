<h1>Crear Evento</h1>
<form action="{{ route('events.store') }}" method="POST">
    @csrf
    <label for="name">Nombre del Evento:</label>
    <input type="text" name="name" required>
    
    <label for="location">Ubicación:</label>
    <input type="text" name="location" required>

    <label for="event_date">Fecha:</label>
    <input type="datetime-local" name="event_date" required>

    <label for="type">Tipo de Evento:</label>
    <select name="type" required>
        <option value="wedding">Boda</option>
        <option value="conference">Conferencia</option>
        <option value="party">Fiesta</option>
        <option value="other">Otro</option>
    </select>

    <button type="submit">Crear Evento</button>
</form>

