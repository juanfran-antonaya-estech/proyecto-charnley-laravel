<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Http\Helpers\NumberHelper;

class Userdetail extends Component
{

    public $pacienteId;

    private $nh;

    public function __construct()
    {
        $this->nh = new NumberHelper();
    }

    private $rolelist = [
        1 => 'Usuario',
        2 => 'Familiar',
        3 => 'Soporte',
        4 => 'Administrador',
        5 => 'SuperAdministrador',
        6 => 'Father',
    ];

    public function mount(){
        $this->nh = new NumberHelper();
    }

    public function render()
    {
        $usuario = User::find($this->pacienteId);
        return view('livewire.admin.userdetail',
    [
        'paciente' => $usuario,
        'rolelist' => $this->rolelist,
        'nh' => $this->nh
    ]);
    }
}
