<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Helpers\JoseHelper;

class ChatsAtendidos extends Component
{
    public $id_sala = 0;
    public $salas;

    public function mount()
    {
        $this->salas = JoseHelper::listadoDeSalasAtendidas();
    }
    public function render()
    {
        return view('livewire.chats-atendidos');
    }
}
