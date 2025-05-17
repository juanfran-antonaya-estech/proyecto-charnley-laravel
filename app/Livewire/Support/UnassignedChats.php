<?php

namespace App\Livewire\Support;

use Livewire\Component;
use App\Http\Helpers\JfalHelper;
use App\Models\Sala;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UnassignedChats extends Component
{

    public function abrirChat($salaId){
        $sala = Sala::find($salaId);

        $sala->usersSoporte()->attach(Auth::user()->id);
        $sala->save();

        $this->dispatch('abrirChat', $salaId);
    }

    public function mount()
    {
        $salas = Sala::all()->filter(function (Sala $sala) {
            return $sala->usersSoporte->isEmpty();
        });
    }

    public function render()
    {
        $salas = Sala::all()->filter(function (Sala $sala) {
            return $sala->usersSoporte->isEmpty();
        });

        $unassignedChats = $salas;
        return view('livewire.support.unassigned-chats', [
            'unassignedChats' => $unassignedChats,
        ]);
    }
}
