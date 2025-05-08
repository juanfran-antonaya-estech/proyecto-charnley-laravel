<?php

namespace App\Http\Controllers\V0_5;

use App\Http\Controllers\Controller;
use App\Http\Helpers\PhotoHelper;
use App\Models\Imagen;
use App\Models\Mensaje;
use App\Models\Report;
use App\Models\Sala;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class UserController extends Controller
{
    public function uploadImage(Request $request) {
        Log::info('Request received', ['request' => $request->all()]);
        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
        ]);
        Log::info('Request validated', ['request' => $request->all()]);

        $user = Auth::user();
        Log::info('User authenticated', ['user' => $user]);

        if (!$user) {
            Log::error('User not authenticated');
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        // Solo los users pueden crear la foto
        if ($user->role == 1 || $user->role == 6) {
            Log::info('User has permission to upload image', ['user' => $user]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            Log::info('Image moved', ['image' => $imageName]);



            /**
             * @var Imagen
             */
            $imagenOrig = Imagen::create([
                'id_paciente' => $user->id,
                'url' => url('images/' . $imageName),
            ]);
            Log::info('Image created in database', ['image' => $imagenOrig]);

            ImageOptimizer::optimize(public_path('images/' . $imageName));
            Log::info('Image optimized', ['image' => $imageName]);

            if (PhotoHelper::pythonProccess($imagenOrig->url, $imagenOrig->id)) {
                Log::info('Image processed by Python', ['image' => $imagenOrig]);
                return response()->json($imagenOrig, 200);
            }

            Log::error('Error processing image', ['image' => $imagenOrig]);
            return response()->json(['message' => 'Error processing image'], 500);
        }

        Log::error('User does not have permission to upload image', ['user' => $user]);
        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function listAllOwnPhotos(Request $request){
        $user = Auth::user();

        if ($user && $user->role == 1 || $user->role == 6) {
            $images = Imagen::where('id_paciente', $user->id)->and('id_imagen_original', null)->get();
            return response()->json($images, 200);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function getPhotoDetail(Request $request, $id){
        $user = Auth::user();

        if ($user && $user->role == 1) {

            /**
             * @var Imagen
             */
            $image = Imagen::find($id);
            if ($image) {
                $modifiedImage = Imagen::where('id_imagen_original', $id)->first();
                $subImages = $image->subimagenes;

                return response()->json([
                    'image' => $image,
                    'modified_image' => $modifiedImage,
                    'sub_images' => $subImages
                ], 200);
            }
            return response()->json(['message' => 'Imagen no encontrada'], 404);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function getChatrooms(Request $request){
        $user = Auth::user();

        if ($user && $user->role == 1 || $user->role == 6){
            $chatrooms = $user->chatrooms;
            return response()->json($chatrooms, 200);
        }
    }

    public function getMessagesByChatroom(Request $request, $id){
        $user = Auth::user();

        if ($user && $user->role == 1 || $user->role == 6){

            /**
             * @var Sala
             */
            $chatroom = Sala::find($id);
            if ($chatroom){
                $messages = $chatroom->mensajes;
                return response()->json($messages, 200);
            }
            return response()->json(['message' => 'Sala no encontrada'], 404);
        }
    }

    public function postImage(Request $request){
        $user = Auth::user();

        if ($user && $user->role == 1 || $user->role == 6){

            $request->validate([
                'id_sala' => 'required|integer',
                'content' => 'required|string',
            ]);

            $message = Mensaje::create([
                'id_sala' => $request->id_sala,
                'id_sender' => $user->id,
                'content' => $request->content,
            ]);
            return response()->json($message, 200);
        }
        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function postMessage(Request $request){
        $user = Auth::user();

        if ($user && $user->role == 1 || $user->role == 6){


            $request->validate([
                'id_imagen' => 'required|integer',
                'content' => 'required|string',
            ]);

            $sala = Sala::query()
                ->where('id_img_asociada', $request->id_imagen)
                ->where('id_paciente', $user->id)
                ->firstOrCreate([
                    'id_img_asociada' => $request->id_imagen,
                    'id_paciente' => $user->id,
                ]);

            $message = Mensaje::create([
                'id_sala' => $sala->id,
                'id_sender' => $user->id,
                'content' => $request->content,
            ]);
            return response()->json($message, 200);
        }
        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function setMessageStatus(Request $request){
        $user = Auth::user();

        if ($user && $user->role == 1 || $user->role == 6){

            $request->validate([
                'id_mensaje' => 'required|integer',
                'status' => 'required|integer',
            ]);

            $message = Mensaje::find($request->id_mensaje);
            if ($message){
                $message->state = $request->status;
                $message->save();
                return response()->json($message, 200);
            }
            return response()->json(['message' => 'Mensaje no encontrado'], 404);
        }
        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function sendReports(Request $request){
        $user = Auth::user();

        if ($user && $user->role == 1 || $user->role == 6){

            $request->validate([
                'id_usuario' => 'required|integer',
                'descripcion' => 'required|string',
                'id_sala' => 'nullable|integer',
            ]);

            $id_imagen = Sala::where('id'. $request->id_sala)->first()->imagen->id;

            $report = Report::create([
                'id_emisor' => $user->id,
                'id_usuario' => $request->id_usuario,
                'descripcion' => $request->descripcion,
                'id_imagen' => $id_imagen,
                'id_sala' => $request->id_sala,
            ]);
            return response()->json($report, 200);
        }
        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }
}
