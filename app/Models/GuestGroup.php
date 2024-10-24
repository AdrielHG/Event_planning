<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestGroup extends Model
{
    use HasFactory;

    // Definir la tabla y los campos asignables masivamente
    protected $table = 'guest_groups';
    protected $fillable = ['group_name', 'event_id'];

    // Relación con el evento
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relación con los invitados
    public function guests()
    {
        return $this->belongsToMany(Guest::class, 'guest_group_members');
    }
}
