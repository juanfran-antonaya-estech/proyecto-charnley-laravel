<?php

use App\Models\Imagen;
use App\Models\Report;
use App\Models\Sala;
use App\Models\User;

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
