<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAnyPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permissions
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $permissions)
    {
        // Проверяем, авторизован ли пользователь
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Пожалуйста, войдите в систему');
        }

        $user = Auth::user();
        $permissionArray = explode('|', $permissions);

        // Проверяем, имеет ли пользователь хотя бы одно из указанных разрешений
        if (!$user->hasAnyPermission($permissionArray)) {
            abort(403, 'У вас нет прав для выполнения этого действия');
        }

        return $next($request);
    }
}