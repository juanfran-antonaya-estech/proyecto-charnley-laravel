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

    /**
     * @var Sala
     */
    public $selectedSala = null;

    public $messageContent = '';

    public $confirmreport = false;
    public $confirmtoparent = false;

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

    public function report(){
        if($this->confirmreport){
            $this->confirmreport = false;
            $this->selectedSala->reported = true;
            $this->selectedSala->save();
            $this->selectedSala = null;
        } else {
            $this->confirmreport = true;
        }
    }

    public function tofamiliar(){
        if($this->confirmtoparent){
            $this->confirmtoparent = false;
            $this->selectedSala->visible_by_familiar = true;
            $this->selectedSala->save();
        } else {
            $this->confirmtoparent = true;
        }
    }

    #[On('abrirChat')]
    public function setSelectedSalaId($salaId)
    {
        $this->selectedSalaId = $salaId;
        $this->messageContent = '';
        $this->selectedSala = Sala::find($salaId);
        $this->confirmreport = false;
        $this->confirmtoparent = false;
    }

    public function mount(){
        if($this->selectedSalaId != 0){
            $this->messageContent = '';
            $this->selectedSala = Sala::find($this->selectedSalaId);
            $this->confirmreport = false;
            $this->confirmtoparent = false;
        }
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
