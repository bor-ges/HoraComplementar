<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Se o usuário não está logado OU não é admin
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Acesso não autorizado.'); // Proíbe o acesso
        }
        return $next($request);
    }
}
