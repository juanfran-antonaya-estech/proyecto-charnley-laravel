<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Sala;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['id_paciente', 'url', 'id_imagen_original'];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_paciente');
    }

    public function imagenOriginal(){
        return $this->belongsTo(Imagen::class, 'id_imagen_original');
    }

    public function imagenMod(){
        return $this->hasOne(Imagen::class, 'id_imagen_original');
    }

    public function subimagenes(){
        return $this->hasMany(Subimagen::class, 'id_imagen');
    }

    public function sala()
    {
        return $this->hasOne(Sala::class, 'id_img_asociada');
    }

    public function getUrlAttribute($value)
    {
        // Use asset() helper to generate the full URL from the relative path
        return asset($value);
    }
}
