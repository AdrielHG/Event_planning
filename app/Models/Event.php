<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Definir la tabla y los campos asignables masivamente
    protected $table = 'events';
    protected $fillable = ['name', 'location', 'suggested_address', 'type', 'event_date'];

    // Relación con los invitados
    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    // Relación con las listas de regalos
    public function giftLists()
    {
        return $this->hasMany(GiftList::class);
    }

    // Relación con los grupos de invitados
    public function guestGroups()
    {
        return $this->hasMany(GuestGroup::class);
    }
}
