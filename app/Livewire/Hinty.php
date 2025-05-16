<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Hinty extends Component
{
    public $showHints = false;

    public $roles = [
        '1' => 'Usuario',
        '2' => 'Familiar',
        '3' => 'Soporte',
        '4' => 'Admin',
        '5' => 'SuperAdmin',
    ];

    /**
     * Array de usuarios diferentes
     *
     * @var User[] Array de usuarios con diferentes roles
     */
    public $usuarios = [];

    public function mount(){
        $users = User::query()
            ->where('role', '!=', 6)
            ->where('role', '!=', 1)->get();
        $this->usuarios = $users;

    }

    public function toggleHints()
    {
        $this->showHints = !$this->showHints;
    }

    public function render()
    {
        return view('livewire.hinty');
    }
}
