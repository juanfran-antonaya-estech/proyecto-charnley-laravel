<?php

namespace App\Livewire;

use Livewire\Component;

use App\Http\Helpers\JoseHelper;

/**
 * @author Jose Lopez Vilchez
 * Carrusel con imágenes de las salas que no tienen a nadie
 * de soporte asociado, para poder añadir esas salas a la lista
 * de chats que se están manejando.
 */
class ChatsPorAtender extends Component
{
    public $por_atender;

    public function mount()
    {
        $this->por_atender = JoseHelper::listadoDeSalasSinAtender();
    }

    public function render()
    {
        return view('livewire.chats-por-atender');
    }
}
