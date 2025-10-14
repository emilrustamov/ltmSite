<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $permission)
    {
        // Проверяем, авторизован ли пользователь
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Пожалуйста, войдите в систему');
        }

        $user = Auth::user();

        // Проверяем, имеет ли пользователь необходимое разрешение
        if (!$user->hasPermission($permission)) {
            abort(403, 'У вас нет прав для выполнения этого действия');
        }

        return $next($request);
    }
}
