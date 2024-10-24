<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    // Definir la tabla y los campos asignables masivamente
    protected $table = 'gifts';
    protected $fillable = ['name', 'description', 'quantity', 'status', 'gift_list_id'];

    // Relación con la lista de regalos
    public function giftList()
    {
        return $this->belongsTo(GiftList::class);
    }

    // Relación con las reservas de regalos
    public function reservations()
    {
        return $this->hasMany(GiftReservation::class);
    }
}
