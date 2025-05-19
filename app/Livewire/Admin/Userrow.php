<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Userrow extends Component
{
    public $userId;
    public $index;

    public function delete(){
        $user = User::find($this->userId);
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
        } else {
            session()->flash('error', 'User not found.');
        }
    }

    public function render()
    {
        $authUser = Auth::user();
        $user = User::find($this->userId);
        return view('livewire.admin.userrow', [
            'user' => $user,
            'authUser' => $authUser,
            'index' => $this->index,
        ]);
    }
}
