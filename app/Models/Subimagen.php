<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subimagen extends Model
{
    public $timestamps = false;

    protected $table = 'subimagenes';

    public function imagen(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'id_imagen');
    }
}
