<?php

namespace App\Livewire\Admin;

use App\Models\Imagen;
use Livewire\Component;

class Imagedetail extends Component
{

    public $imageId = 0;

    public function render()
    {
        $imagen = Imagen::find($this->imageId);

        return view('livewire.admin.imagedetail', [
            'imagen' => $imagen
        ]);
    }
}
