<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Mostrar todos los eventos
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Mostrar formulario para crear un nuevo evento
    public function create()
    {
        return view('events.create');
    }

    // Almacenar un nuevo evento en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'event_date' => 'required|date',
            'type' => 'required'
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Evento creado exitosamente.');
    }

    // Mostrar un evento específico
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Mostrar formulario para editar un evento
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    // Actualizar un evento en la base de datos
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'event_date' => 'required|date',
            'type' => 'required'
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Evento actualizado exitosamente.');
    }

    // Eliminar un evento de la base de datos
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento eliminado exitosamente.');
    }
}
