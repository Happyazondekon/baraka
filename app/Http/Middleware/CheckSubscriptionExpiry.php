<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckSubscriptionExpiry
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            $user = Auth::user();

            // Vérifier si l'abonnement a expiré
            if ($user->has_paid && $user->payment_expires_at && $user->payment_expires_at->isPast()) {
                // L'abonnement a expiré
                $user->has_paid = false;
                $user->has_active_subscription = false;
                $user->save();

                Log::info("🔔 Abonnement expiré pour l'utilisateur : {$user->email}");

                // Rediriger vers la page de tarification si l'utilisateur essaie d'accéder au contenu
                if ($request->is('modules*', 'examens*', 'quizzes*', 'progression', 'dashboard')) {
                    return redirect()->route('pricing')
                        ->with('warning', '⏰ Votre abonnement a expiré. Veuillez renouveler votre accès pour continuer.');
                }
            } elseif ($user->has_paid && $user->isExpiringsoon()) {
                // L'abonnement expire bientôt
                $daysLeft = $user->getDaysUntilExpiry();
                Log::info("⚠️ Abonnement expire bientôt pour {$user->email} - {$daysLeft} jour(s) restant(s)");
            }
        }

        return $next($request);
    }
}
