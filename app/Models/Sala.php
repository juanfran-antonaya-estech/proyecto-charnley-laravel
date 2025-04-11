<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sala extends Model
{
    public function imagen(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'id_img_asociada');
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_paciente');
    }
}
