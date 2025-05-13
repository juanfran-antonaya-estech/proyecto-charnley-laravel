<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SupportController extends Controller
{
    public function chats(): View
    {
        if (Auth::user()->role > 4) { //TODO: comprobar a qué rol corresponde cada número y ajustar de forma acorde
            return view('chats', [
                'links' => ['chats', 'usuarios', 'reportes', 'bugs']
            ]);
        } else {
            return view('chats', [
                'links' => ['chats']
            ]);
        }
    }

    public function usuarios(): View
    {
        if (Auth::user()->role > 4) {
            return view('usuarios', [
                'links' => ['chats', 'usuarios', 'reportes', 'bugs']
            ]);
        } else {
            return view('chats', [
                'links' => ['chats']
            ]);
        }
    }

    public function reportes(): View
    {
        if (Auth::user()->role > 4) {
            return view('reportes', [
                'links' => ['chats', 'usuarios', 'reportes', 'bugs']
            ]);
        } else {
            return view('chats', [
                'links' => ['chats']
            ]);
        }
    }

    public function bugs(): View
    {
        if (Auth::user()->role > 4) {
            return view('bugs', [
                'links' => ['chats', 'usuarios', 'reportes', 'bugs']
            ]);
        } else {
            return view('chats', [
                'links' => ['chats']
            ]);
        }
    }
}
