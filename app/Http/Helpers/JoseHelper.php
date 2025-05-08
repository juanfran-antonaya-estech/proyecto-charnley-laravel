<?php

namespace App\Http\Helpers;

use App\Models\Imagen;
use App\Models\Report;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JoseHelper {

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

    /**
     * @author Jose Lopez Vilchez
     * Para mostrar chats ya abiertos en los que participe alguien.
     *
     * TODO: reemplazar el uso de $soporte por una comprobacion de rol, cuando los haya.
     */
    public static function listadoDeSalasAtendidas(bool $soporte = true){
        /** @var User $user */
        $user = Auth::user();

        if ($soporte) {
            $salas = $user->salasSoporte();
        } else {
            $salas = $user->chatrooms();
        }

        $salas = $salas->map(function (Sala $sala) {
            $ultimoMensaje = $sala->mensajes->last();
            return [
                'sala' => $sala,
                'ultimo_mensaje' => $ultimoMensaje ? $ultimoMensaje : null
            ];
        });

        return $salas;
    }

    /**
     * @author Jose Lopez Vilchez
     * Esto vale para mostrar a los psicólogos a quién deben atender todavía.
     */
    public static function listadoDeSalasSinAtender(){
        $salas = Sala::query()
            ->whereDoesntHave('usersSoporte')
            ->get();
        return $salas;
    }

    /**
     * @author Juan Francisco
     * Para mostrar las salas que tiene asignado un usuario de soporte
     *
     * @return array
     */
    public static function listadoDeSalasMias(){
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

    public static function sala($id){
        $sala = Sala::where('id', $id)->first();
        return $sala;
    }

    public static function usuarios(){
        $usuarios = User::all();
        return $usuarios;
    }

    public static function listadoReportes(){
        $reportes = Report::all();
        return $reportes;
    }

    public static function reporte($id){
        $reporte = Report::where('id', $id)->first();
        return $reporte;
    }
}
