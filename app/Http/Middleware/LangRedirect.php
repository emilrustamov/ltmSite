<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LangRedirect
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
        // Получаем параметры маршрута
        $parameters = $request->route()->parameters();

        // Если есть параметр 'lang', проверяем его корректность
        if (isset($parameters['lang'])) {
            if (in_array($parameters['lang'], ['ru', 'en', 'tm'])) {
                // Если язык допустим, продолжаем выполнение запроса
                return $next($request);
            } else {
                // Если язык недопустим, перенаправляем на '/ru'
                return redirect('/ru');
            }
        }

        // Если параметра 'lang' нет, ничего не делаем и позволяем Laravel продолжить
        return $next($request);
    }
}
