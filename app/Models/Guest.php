<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    // Definir la tabla y los campos asignables masivamente
    protected $table = 'guests';
    protected $fillable = ['name', 'email', 'unique_code', 'is_active', 'event_id'];

    // Relación con el evento
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relación con los grupos de invitados
    public function guestGroups()
    {
        return $this->belongsToMany(GuestGroup::class, 'guest_group_members');
    }

    // Relación con las reservas de regalos
    public function giftReservations()
    {
        return $this->hasMany(GiftReservation::class);
    }
}
