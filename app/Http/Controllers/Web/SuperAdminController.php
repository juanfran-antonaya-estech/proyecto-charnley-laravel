<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function listchats(){
        $salas = Sala::all();
        $user = Auth::user();
        return view('roles.admin.chats', [
            'salas' => $salas,
            'user' => $user
        ]);
    }

    public function listimages(){
        $imagenes = Imagen::all()->chunk(3);
        return view('roles.admin.images', [
            'imagesgroup' => $imagenes
        ]);
    }

    public function listusers(){
        $users = User::all();
        return view('roles.admin.users', [
            'users' => $users
        ]);
    }

    public function createuser(){
        return view('roles.sadmin.createuser');
    }
}
