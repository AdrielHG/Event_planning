<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestGroupMember extends Model
{
    use HasFactory;

    protected $table = 'guest_group_members';

    // Relación con el grupo de invitados
    public function guestGroup()
    {
        return $this->belongsTo(GuestGroup::class);
    }

    // Relación con los invitados
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
