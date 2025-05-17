<?php

namespace App\Livewire\Support;

use Livewire\Component;
use App\Http\Helpers\JfalHelper;
use App\Models\Sala;
use Illuminate\Database\Eloquent\Collection;

class UnassignedChats extends Component
{

    /**
     * @var Collection<int, Sala>
     */
    public $unassignedChats;

    public function mount()
    {
        $salas = Sala::all()->filter(function (Sala $sala) {
            return $sala->usersSoporte->isEmpty();
        });

        $this->unassignedChats = $salas;
    }

    public function render()
    {
        $salas = Sala::all()->filter(function (Sala $sala) {
            return $sala->usersSoporte->isEmpty();
        });

        $this->unassignedChats = $salas;
        return view('livewire.support.unassigned-chats', [
            'unassignedChats' => $this->unassignedChats,
        ]);
    }
}
