<?php

namespace App\Livewire\Admin;

use App\Models\Imagen;
use App\Models\User;
use Livewire\Component;

class Imagedetail extends Component
{

    public $imageId = 0;

    public function deleteImage(){
        $imagen = Imagen::find($this->imageId);
        $imagen->delete();

        $this->redirect(route('admin.images'));
    }

    public function deleteUser(){
        $imagen = Imagen::find($this->imageId);
        $user = User::find($imagen->paciente->id);
        $user->delete();

        $this->redirect(route('admin.images'));
    }

    public function render()
    {
        $imagen = Imagen::find($this->imageId);


        return view('livewire.admin.imagedetail', [
            'imagen' => $imagen
        ]);
    }
}
