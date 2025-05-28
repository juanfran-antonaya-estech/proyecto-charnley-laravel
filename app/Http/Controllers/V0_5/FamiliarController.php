<?php

namespace App\Http\Controllers\V0_5;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamiliarController extends Controller
{
    public function getChatsICanView(Request $request){

        $user = Auth::user();

        if($user->takingCareOf != null && ($user->role == 2 || $user->role == 6)){
            $takingCareOf = $user->takingCareOf;

            $salas = Sala::query()
                ->where('id_paciente', $takingCareOf->id)
                ->where('visible_by_familiar', true)
                ->get();

            return response()->json($salas, 200);
        }

        return response()->json([
            'message' => 'No tienes permisos para ver los chats de este usuario'
        ], 403);
    }

    public function getChatRoomDetail(Request $request, $id){
        $user = Auth::user();

        if($user->takingCareOf != null && ($user->role == 2 || $user->role == 6)){

            $sala = Sala::find($id);

            if($sala){
                $messages = $sala->mensajes;
                return response()->json($messages, 200);
            }
            else{
                return response()->json([
                    'message' => 'Sala no encontrada'
                ], 404);
            }
        }

        return response()->json([
            'message' => 'No tienes permisos para ver los chats de este usuario'
        ], 403);
    }

    public function getImagesByMySon(Request $request){
        $user = Auth::user();

        if($user->takingCareOf != null && ($user->role == 2 || $user->role == 6)){

            $imagenes = Imagen::query()
                ->where('id_paciente', $user->takingCareOf->id)
                ->get();

            return response()->json($imagenes, 200);
        }

        return response()->json([
            'message' => 'No tienes permisos para ver los chats de este usuario'
        ], 403);
    }

    public function getImageDetail(Request $request, $id){
        $user = Auth::user();

        if($user->takingCareOf != null && ($user->role == 2 || $user->role == 6)){

            $imagen = Imagen::query()
                ->where('id', $id)
                ->with(['imagenMod', 'subimagenes'])
                ->first();

            if($imagen){
                return response()->json($imagen, 200);
            }
            else{
                return response()->json([
                    'message' => 'No existe la imagen'
                ], 404);
            }
        }

        return response()->json([
            'message' => 'No tienes permisos para ver los chats de este usuario'
        ], 403);
    }
}
