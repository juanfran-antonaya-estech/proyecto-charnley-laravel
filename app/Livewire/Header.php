<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $user = Auth::user();
        return view('livewire.header',
            [
                'user' => $user,
            ]
        );
    }
}
