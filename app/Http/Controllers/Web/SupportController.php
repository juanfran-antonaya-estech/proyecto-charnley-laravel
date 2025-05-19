<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SupportController extends Controller
{
    public function chats(){
        $user = Auth::user();
        return view('roles.support.chat', [
            'user' => $user,
        ]);
    }
}
