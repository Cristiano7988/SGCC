<?php

namespace App\Http\Middleware;

use App\Helpers\Checa;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestringeUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = Auth::user();
            $isAdmin = $user->is_admin || $user->is_dev;
            $userFromTheRoute = $request->route()->user;
            
            if ($isAdmin || $user->id === $userFromTheRoute->id) return $next($request);
            else {
                $api = Checa::middleware('api');

                return $api
                    ? response('Acesso negado', 403) 
                    : redirect()->back()->with("error", "Acesso negado!");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
