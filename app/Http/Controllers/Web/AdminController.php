<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function chats(Request $request)
    {

        $salas = Sala::where('reported', true)->get();

        $user = Auth::user();
        return view('roles.admin.chats', [
            'user' => $user,
            'salas' => $salas,
        ]);
    }

    public function chat(Request $request, Sala $sala){
        $user = Auth::user();
        return view('roles.admin.chat', [
            'user' => $user,
            'sala' => $sala,
        ]);
    }

    public function images(Request $request){
        $imagenes = Sala::where('reported', true)->get()->map(function ($sala) {
            return $sala->imagen;
        })->chunk(3);
        return view('roles.admin.images', [
            'imagesgroup' => $imagenes,
        ]);
    }

    public function image(Request $request, Imagen $imagen){
        $user = Auth::user();
        return view('roles.admin.image', [
            'user' => $user,
            'imagen' => $imagen,
        ]);

    }

    public function users(Request $request){
        $users = Sala::where('reported', true)->get()->map(function ($sala) {
            return $sala->paciente;
        })->flatten(1)->unique('id')->values();
        return view('roles.admin.users', [
            'users' => $users,
        ]);
    }

    public function user(Request $request, User $user){
        return view('roles.admin.user', [
            'user' => $user,
        ]);
    }
}
