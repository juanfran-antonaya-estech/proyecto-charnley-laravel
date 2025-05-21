<?php

namespace App\Livewire\Admin;

use App\Models\Imagen;
use App\Models\Sala;
use Livewire\Component;

class Chatrow extends Component
{

    public $salaId;
    public $index;

    public $confirmUserDelete = false;
    public $confirmImageDelete = false;
    public $confirmFree = false;

    public function deleteUser()
    {
        $sala = Sala::find($this->salaId);
        $sala->paciente->delete();
        $this->js('window.location.reload()');
    }

    public function deleteImage()
    {
        $sala = Sala::find($this->salaId);
        $sala->imagen->delete();

    }

    public function free()
    {
        $sala = Sala::find($this->salaId);
        $sala->reported = false;;
        $sala->save();
        $this->js('window.location.reload()');
    }

    public function render()
    {
        $sala = Sala::find($this->salaId);
        return view(
            'livewire.admin.chatrow',
            [
                'sala' => $sala,
                'index' => $this->index,
            ]
        );
    }
}
