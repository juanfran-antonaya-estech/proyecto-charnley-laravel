<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Web\AuthController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NonUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->user()->role >= 3) {
            return $next($request);
        } else {
            return redirect()->route('unwantedrole');
        }
    }
}
