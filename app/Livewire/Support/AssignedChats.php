<?php

namespace App\Livewire\Support;

use App\Models\Sala;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AssignedChats extends Component
{
    public function render()
    {

        /** @var User $user */
        $user = Auth::user();
        $salas = $user->salasSoporte()->get();

        $salas = $salas->map(function (Sala $sala) {
            $ultimoMensaje = $sala->mensajes->last();
            return [
                'sala' => $sala,
                'ultimo_mensaje' => $ultimoMensaje ? $ultimoMensaje : null
            ];
        });

        return view('livewire.support.assigned-chats');
    }
}
