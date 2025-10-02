<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasPaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Vérifier si l'utilisateur est admin
        if ($user && ($user->is_admin || $user->role === 'admin')) {
            return $next($request);
        }

        // Vérifier si l'utilisateur a un paiement validé
        $hasValidPayment = $user->payments()
            ->where('status', 'completed')
            ->exists();

        if (!$hasValidPayment) {
            // Stocker l'URL demandée pour rediriger après paiement
            session(['intended_url' => $request->url()]);
            
            return redirect()
                ->route('pricing')
                ->with('warning', 'Veuillez effectuer le paiement pour accéder à ce contenu.');
        }

        return $next($request);
    }
}