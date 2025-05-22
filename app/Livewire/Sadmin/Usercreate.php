<?php

namespace App\Livewire\Sadmin;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Usercreate extends Component
{

    #[Validate('required')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|min:8')]
    public $password;
    #[Validate('required')]
    public $role;
    public $taking_care_of;

    public $success;

    public function create(){
        $this->validate(messages: [
            'required' => 'El campo :attribute es necesario',
            'password.min' => 'La contraseña debe tener mínimo :min carácteres',
            'email.email' => 'El campo debe ser un email válido'
        ]);
        if($this->role == 2){
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'role' => $this->role,
                'taking_care_of' => $this->taking_care_of
            ]);
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'role' => $this->role
            ]);
        }
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->role = 0;
        $this->taking_care_of = 0;
        $this->success = true;
    }

    public function render()
    {
        $normalusers = User::where('role', 1)->get();

        return view('livewire.sadmin.usercreate', [
        'normalusers' => $normalusers
    ]);
    }
}
