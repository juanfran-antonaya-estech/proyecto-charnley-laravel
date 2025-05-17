<?php

namespace App\Livewire\Support;

use App\Models\Sala;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AssignedChats extends Component
{

    public $selectedSalaId = 0;

    #[On('abrirChat')]
    public function setSelectedSalaId($salaId){
        $this->selectedSalaId = $salaId;
    }

    public function abrirChat($salaId)
    {
        $this->selectedSalaId = $salaId;
        $this->dispatch('abrirChat', $salaId);
    }

    public function render()
    {

        /** @var User $user */
        $user = Auth::user();
        $salas = $user->salasSoporte;

        $selectedSalaId = $this->selectedSalaId;
        return view('livewire.support.assigned-chats', [
            'salas' => $salas,
            'user' => $user,
            'selectedSalaId' => $selectedSalaId,
        ]);
    }
}
