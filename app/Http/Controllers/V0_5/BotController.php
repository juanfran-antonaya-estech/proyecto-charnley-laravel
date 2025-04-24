<?php

namespace App\Http\Controllers\V0_5;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imagen;
use Auth;

class BotController extends Controller
{
    public function uploadNewModifiedImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id' => 'required|integer',
        ]);

        $user = Auth::user();

        // Solo los users pueden crear la foto
        if ($user && $user->role == 5 || $user->role == 6) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // La imagen se puede acceder desde la url completa
            $imagenMod = Imagen::create([
                'id_paciente' => Imagen::find($request->id)->id_paciente,
                'url' => url('images/' . $imageName),
                'id_imagen_original' => $request->original_id,
            ]);

            return response()->json(['message' => 'Image uploaded successfully'], 200);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }
}
