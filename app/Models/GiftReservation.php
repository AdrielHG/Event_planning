<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftReservation extends Model
{
    use HasFactory;

    // Definir la tabla y los campos asignables masivamente
    protected $table = 'gift_reservations';
    protected $fillable = ['guest_id', 'gift_id', 'reserved_quantity'];

    // Relación con el invitado que reservó el regalo
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    // Relación con el regalo reservado
    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
