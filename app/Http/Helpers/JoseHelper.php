<?php

namespace App\Http\Helpers;

use App\Models\Imagen;
use App\Models\Report;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JfalHelper {

    public static function listadoDeImagenes(){
        $imagenes = Imagen::all();
        return $imagenes;
    }

    public static function listadoDeImagenesPorUsuario($idUser){
        $imagenes = Imagen::where('id_paciente', $idUser)->get();
        return $imagenes;
    }

    public static function imagen($id){
        $imagen = Imagen::where('id', $id)->first();
        return $imagen;
    }

    public static function listadoDeSalas(){
        $salas = Sala::all();
        $salas = $salas->map(function (Sala $sala) {
            $ultimoMensaje = $sala->mensajes->last();
            return [
                'sala' => $sala,
                'ultimo_mensaje' => $ultimoMensaje ? $ultimoMensaje : null
            ];
        });

        return $salas;
    }

    public static function listadoDeSalasSinAtender(){
        $salas = Sala::all()->filter(function (Sala $sala) {
            return $sala->usersSoporte->isEmpty();
        });
        return $salas;
    }

    /**
     * @author Juan Francisco
     * Para mostrar las salas que tiene asignado un usuario de soporte
     *
     * @return array
     */
    public static function listadoDeSalasAtendidas(){
        /** @var User $user */
        $user = Auth::user();
        $salas = $user->salasSoporte()->get();

        $salas = $salas->map(function (Sala $sala) {
            $ultimoMensaje = $sala->mensajes->last();
            return [
                'sala' => $sala,
                'ultimo_mensaje' => $ultimoMensaje ? $ultimoMensaje : null
            ];
        });

        return $salas;
    }
}
