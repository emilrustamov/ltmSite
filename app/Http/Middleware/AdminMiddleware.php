<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, является ли пользователь администратором
        if (!$request->user() || !$request->user()->admin) {
            return redirect()->route('noaccess', ['lang' => 'ru']); 
        }

        return $next($request);
    }
}
