<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['id_paciente', 'url'];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_paciente');
    }

    public function imagenOriginal(){
        return $this->belongsTo(Imagen::class, 'id_imagen_original');
    }

    public function imagenMod(){
        return $this->hasOne(Imagen::class);
    }

    public function subimagenes(){
        return $this->hasMany(Subimagen::class);
    }
}
