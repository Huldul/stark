<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $excludedPaths = ['admin', 'admin/*', 'sendOrder', 'sendApplication', 'sendRespond'];

        // Проверяем, соответствует ли текущий запрос одному из исключённых путей
        foreach ($excludedPaths as $path) {
            if ($request->is($path)) {
                return $next($request); // Пропускаем дальше без изменения
            }
        }

        // Определяем локаль из первого сегмента URL
        $locale = $request->segment(1);

        // Проверяем, допустима ли эта локаль
        if (!in_array($locale, config('app.locales'))) {
            // Если нет, устанавливаем локаль по умолчанию и выполняем редирект
            $locale = 'ru'; // Локаль по умолчанию
            App::setLocale($locale);

            // Формируем URL с добавлением локали
            $newUrl = '/' . $locale . $request->getPathInfo();
            // Проверяем, нужен ли редирект
            if ($request->getPathInfo() !== '/' . $locale) {
                return redirect($newUrl);
            }
        } else {
            App::setLocale($locale);
        }

        return $next($request);
    
    

    }
}
