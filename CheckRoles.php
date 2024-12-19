<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoles
{

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $auth = Auth::user();
        if(! $auth) {
            return response()->json([
                'success' => false,
                'message' => "Belum melakukan login",
            ], 403);
        }

        if(! in_array($auth->role, $roles)) {
            return response()->json([
                'success' => false,
                'message' => "Anda tidak memiliki akses",
            ], 403);
        }

        return $next($request);
    }
}
