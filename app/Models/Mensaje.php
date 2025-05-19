<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $fillable = [
        'id_sala',
        'id_sender',
        'content',
        'sentiment',
        'sentiment_score',
    ];

    public function sala() {
        return $this->belongsTo(Sala::class, 'id_sala');
    }

    public function sender(){
        return $this->belongsTo(User::class, 'id_sender');
    }
}
