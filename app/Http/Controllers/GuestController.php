<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Event;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    // Mostrar todos los invitados de un evento
    public function index(Event $event)
    {
        $guests = $event->guests;
        return view('guests.index', compact('guests', 'event'));
    }

    // Mostrar formulario para agregar un nuevo invitado
    public function create(Event $event)
    {
        return view('guests.create', compact('event'));
    }

    // Almacenar un nuevo invitado
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $guest = new Guest($request->all());
        $guest->event_id = $event->id;
        $guest->unique_code = uniqid();
        $guest->save();

        return redirect()->route('events.guests.index', $event)->with('success', 'Invitado agregado exitosamente.');
    }

    // Mostrar formulario para editar un invitado
    public function edit(Event $event, Guest $guest)
    {
        return view('guests.edit', compact('event', 'guest'));
    }

    // Actualizar la información de un invitado
    public function update(Request $request, Event $event, Guest $guest)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $guest->update($request->all());

        return redirect()->route('events.guests.index', $event)->with('success', 'Invitado actualizado exitosamente.');
    }

    // Eliminar un invitado
    public function destroy(Event $event, Guest $guest)
    {
        $guest->delete();
        return redirect()->route('events.guests.index', $event)->with('success', 'Invitado eliminado exitosamente.');
    }
}
