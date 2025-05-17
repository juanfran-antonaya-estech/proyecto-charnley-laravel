<?php

namespace App\Http\Controllers\V0_5;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\Subimagen;
use Illuminate\Support\Facades\Auth;

class BotController extends Controller
{
    public function uploadNewModifiedImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
            'id' => 'required|integer',
        ]);

        $user = Auth::user();

        if ($user && $user->role == 5 || $user->role == 6) {
            $imageName = time() . '_mod' . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // La imagen se puede acceder desde la url completa
            $relativeUrl = 'images/' . $imageName;
            $imagenMod = Imagen::create([
                'id_paciente' => Imagen::find($request->id)->id_paciente,
                'url' => $relativeUrl,
                'id_imagen_original' => $request->id,
            ]);

            return response()->json(['message' => 'La imagen se ha subido'], 200);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function uploadSubImage(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
            'id' => 'required|integer',
            'objeto' => 'required|string',
            'seguridad' => 'required|numeric'
        ]);
        $user = Auth::user();

        if ($user && $user->role == 5 || $user->role == 6) {
            $imageName = time() . '_sub_' . $request->id . '.' . $request->image->extension();
            if (!$request->image->move(public_path('images'), $imageName)) {
                return response()->json(['message' => 'Error al mover la imagen'], 500);
            }

            // La imagen se puede acceder desde la url completa
            $relativeUrl = 'images/' . $imageName;
            $imagenMod = Subimagen::create([
                'url' => $relativeUrl,
                'id_imagen' => $request->id,
                'objeto' => $request->objeto,
                'seguridad' => $request->seguridad,
            ]);
            $imagenMod->save();

            return response()->json($imagenMod, 200);
        }
    }

    public function uploadEditedModifiedImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
            'id' => 'required|integer',
        ]);

        $user = Auth::user();

        if ($user && $user->role == 5 || $user->role == 6) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Crear una nueva imagen modificada enlazada a la original
            $relativeUrl = 'images/' . $imageName;
            $imagenOriginal = Imagen::find($request->id);
            $imagenMod = Imagen::create([
                'id_paciente' => $imagenOriginal->id_paciente,
                'url' => $relativeUrl,
                'id_imagen_original' => $imagenOriginal->id,
            ]);

            return response()->json(['message' => 'La imagen modificada se ha subido'], 200);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }
}
