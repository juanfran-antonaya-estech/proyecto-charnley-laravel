<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subimagen extends Model
{
    public $timestamps = false;

    protected $table = 'subimagenes';

    protected $fillable = ['id_paciente', 'url', 'id_imagen', 'objeto', 'seguridad'];

    public function imagen(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'id_imagen');
    }
}
