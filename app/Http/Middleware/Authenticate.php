<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Redireciona usuários não autenticados.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('auth.entrar'); // ou altere para sua rota personalizada
        }
    }
}
