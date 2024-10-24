<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Event;
use App\Models\GiftList;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    // Mostrar todos los regalos de la lista de regalos
    public function index(Event $event, GiftList $giftList)
    {
        $gifts = $giftList->gifts;
        return view('gifts.index', compact('gifts', 'event', 'giftList'));
    }

    // Mostrar formulario para agregar un nuevo regalo
    public function create(Event $event, GiftList $giftList)
    {
        return view('gifts.create', compact('event', 'giftList'));
    }

    // Almacenar un nuevo regalo
    public function store(Request $request, Event $event, GiftList $giftList)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'status' => 'required|in:available,reserved,unavailable',
        ]);

        $gift = new Gift($request->all());
        $gift->gift_list_id = $giftList->id;
        $gift->save();

        return redirect()->route('events.gift_lists.gifts.index', [$event, $giftList])->with('success', 'Regalo agregado exitosamente.');
    }

    // Mostrar formulario para editar un regalo
    public function edit(Event $event, GiftList $giftList, Gift $gift)
    {
        return view('gifts.edit', compact('event', 'giftList', 'gift'));
    }

    // Actualizar un regalo
    public function update(Request $request, Event $event, GiftList $giftList, Gift $gift)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'status' => 'required|in:available,reserved,unavailable',
        ]);

        $gift->update($request->all());

        return redirect()->route('events.gift_lists.gifts.index', [$event, $giftList])->with('success', 'Regalo actualizado exitosamente.');
    }

    // Eliminar un regalo
    public function destroy(Event $event, GiftList $giftList, Gift $gift)
    {
        $gift->delete();
        return redirect()->route('events.gift_lists.gifts.index', [$event, $giftList])->with('success', 'Regalo eliminado exitosamente.');
    }
}
