<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PaymentRequired
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Non authentifié -> redirection vers login (ou JSON pour API)
        if (!$user) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->guest(route('login'));
        }

        // Vérifie la logique "backend-first" : attributs locaux puis vérification distante si configurée
        if ($this->hasValidPayment($user)) {
            return $next($request);
        }

        // Stocker l'URL demandée pour redirection après paiement (exclure les routes de paiement/connexion)
        if (!$request->is('paiement*', 'tarifs*', 'logout')) {
            session(['intended_url' => $request->fullUrl()]);
        }

        // Réponse différente pour les requêtes API
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Payment required.',
                'redirect' => route('pricing')
            ], 402);
        }

        return redirect()->route('pricing')
            ->with('warning', "Un accès complet est nécessaire pour consulter cette ressource.");
    }

    /**
     * Vérifie si l'utilisateur a bien payé selon la logique backend.
     * 1) Attribut local (has_paid / subscription_status)
     * 2) Optionnel : appel au service de facturation distant configuré dans services.billing.url
     */
    protected function hasValidPayment($user): bool
    {
        // Vérifications locales rapides
        if (!empty($user->has_paid)) {
            return true;
        }

        if (!empty($user->subscription_status) && $user->subscription_status === 'active') {
            return true;
        }

        // Vérification distante si un service de billing est configuré
        try {
            $billingUrl = config('services.billing.url');
            if ($billingUrl) {
                $response = \Illuminate\Support\Facades\Http::accept('application/json')
                    ->get(rtrim($billingUrl, '/').'/api/users/'.$user->id.'/status');

                if ($response->ok()) {
                    $data = $response->json();
                    if (!empty($data['paid']) || (!empty($data['subscription_status']) && $data['subscription_status'] === 'active')) {
                        // Mettre à jour le cache local si utile (silencieux)
                        try {
                            $user->forceFill([
                                'has_paid' => !empty($data['paid']) ? 1 : $user->has_paid,
                                'subscription_status' => $data['subscription_status'] ?? $user->subscription_status,
                            ])->saveQuietly();
                        } catch (\Throwable $e) {
                            \Illuminate\Support\Facades\Log::warning('Unable to update user payment cache: '.$e->getMessage());
                        }
                        return true;
                    }
                }
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('Billing service check failed: '.$e->getMessage());
            // En cas d'erreur de vérification distante, refuser l'accès par défaut.
        }

        return false;
    }
}