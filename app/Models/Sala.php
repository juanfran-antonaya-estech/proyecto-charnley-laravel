<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sala extends Model
{
    protected $fillable = ['id_img_asociada', 'id_paciente'];

    public function imagen(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'id_img_asociada');
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_paciente');
    }

    public function mensajes() {
        return $this->hasMany(Mensaje::class, 'id_sala');
    }

    public function usersSoporte(){
        return $this->hasMany(User::class, 'sala_user', 'sala_id', 'user_id');
    }
}
