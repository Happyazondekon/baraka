<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PaymentRequired
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->has_paid) {
            return $next($request);
        }

        // Stocker l'URL demandée pour redirection après paiement
        if (!$request->is('paiement', 'tarifs', 'logout')) {
            session(['intended_url' => $request->fullUrl()]);
        }

        return redirect()->route('pricing')
            ->with('warning', 'Un accès complet est nécessaire pour consulter cette ressource.');
    }
}