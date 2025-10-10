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
        // Проверяем, авторизован ли пользователь
        if (!$request->user()) {
            return redirect()->route('login')->with('error', 'Пожалуйста, войдите в систему');
        }

        // Проверяем, является ли пользователь администратором
        if (!$request->user()->admin) {
            abort(403, 'У вас нет прав доступа к административной панели');
        }

        return $next($request);
    }
}
