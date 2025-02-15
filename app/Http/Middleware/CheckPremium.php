<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPremium
{

    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()->isPremium()) {
            return response()->json(['message' => 'Fitur ini hanya untuk pengguna premium'], 403);
        }
        return $next($request);
    }
}
