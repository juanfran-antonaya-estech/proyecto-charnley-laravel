<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SupportController extends Controller
{
    public function chats(): View
    {
        if (Auth::user()->role > 3) {
            return view('chats', [
                'links' => ['chats', 'usuarios', 'reportes', 'bugs']
            ]);
        } elseif (Auth::user()->role > 2) {
            return view('chats', [
                'links' => ['chats']
            ]);
        } else {
            return view('denegado');
        }
    }

    public function usuarios(): View
    {
        if (Auth::user()->role > 3) {
            return view('usuarios', [
                'links' => ['chats', 'usuarios', 'reportes', 'bugs']
            ]);
        } else {
            return view('denegado');
        }
    }

    public function reportes(): View
    {
        if (Auth::user()->role > 3) {
            return view('reportes', [
                'links' => ['chats', 'usuarios', 'reportes', 'bugs']
            ]);
        } else {
            return view('denegado');
        }
    }

    public function bugs(): View
    {
        if (Auth::user()->role > 3) {
            return view('bugs', [
                'links' => ['chats', 'usuarios', 'reportes', 'bugs']
            ]);
        } else {
            return view('denegado');
        }
    }
}
