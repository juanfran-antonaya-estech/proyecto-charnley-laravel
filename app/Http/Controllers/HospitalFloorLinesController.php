<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalFloorLinesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        if($user->role == 3){
            return redirect()->route('support.chats');
        } elseif($user->role == 4){
            return redirect()->route('admin.chats');
        } elseif($user->role == 5){
            return redirect()->route('sadmin.user.create');
        } else {
            return redirect()->route('unwantedrole');
        }
    }
}
