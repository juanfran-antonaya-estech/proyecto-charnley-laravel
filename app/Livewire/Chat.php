<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Helpers\JoseHelper;

/**
 * @author Jose Lopez Vilchez
 * Chat en su conjunto, incluyendo la imagen asociada a la sala,
 * nombre de paciente, opciones (de haberlas para el usuario actual),
 * bocadillos de mensajes, y envío de nuevos mensajes
 */
class Chat extends Component
{
    public $id_sala = 0;
    public $sala;

    public function mount()
    {
        $this->sala = JoseHelper::sala($this->id_sala);
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
