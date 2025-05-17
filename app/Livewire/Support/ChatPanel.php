<?php

namespace App\Livewire\Support;

use App\Models\Mensaje;
use App\Models\Sala;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatPanel extends Component
{
    public $selectedSalaId = 0;
    public $selectedSala = null;

    public $messageContent = '';

    public function send(){
        $this->validate([
            'messageContent' => 'required|string|max:255',
        ]);

        $mensaje = Mensaje::create([
            'id_sala' => $this->selectedSalaId,
            'id_sender' => Auth::user()->id,
            'content' => $this->messageContent,
        ]);
        $mensaje->save();
    }

    #[On('abrirChat')]
    public function setSelectedSalaId($salaId)
    {
        $this->selectedSalaId = $salaId;
        $this->messageContent = '';
        $this->selectedSala = Sala::find($salaId);
    }

    public function render()
    {
        $user = Auth::user();

        return view('livewire.support.chat-panel', [
            'sala' => $this->selectedSala,
            'user' => $user,
        ]);
    }
}
