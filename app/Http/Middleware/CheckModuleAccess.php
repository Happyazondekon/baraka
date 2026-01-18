<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $module = $request->route('module');
        
        // Si pas de module dans la route, laisser passer
        if (!$module) {
            return $next($request);
        }

        // Si l'utilisateur n'est pas connecté, rediriger vers login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Si l'utilisateur n'a pas accès au contenu (pas payant), rediriger
        if (!auth()->user()->has_paid) {
            return redirect()->route('pricing')
                ->with('error', 'Vous devez souscrire à un abonnement pour accéder à ce module.');
        }

        // Si le module est verrouillé, refuser l'accès
        if ($module->isLockedFor(auth()->user())) {
            return redirect()->route('modules.index')
                ->with('error', 'Ce module est verrouillé. ' . $module->getLockReason(auth()->user()));
        }

        return $next($request);
    }
}
