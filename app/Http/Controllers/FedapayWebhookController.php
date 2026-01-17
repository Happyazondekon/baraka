<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Ajoutez ceci

class FedapayWebhookController extends Controller
{
    /**
     * Gère les événements Webhook de FedaPay.
     */
    public function handle(Request $request)
    {
        // 1. **Vérification de Sécurité (TRÈS IMPORTANT)**
        // FedaPay doit vous fournir un secret (clé secrète de webhook). 
        // L'implémentation complète nécessite de vérifier la signature.
        // Pour un test initial, nous allons nous concentrer sur le traitement de l'événement.

        $event = $request->all();
        $eventName = $event['name'] ?? null;
        $entity = $event['entity'] ?? null;
        
        Log::info("Webhook FedaPay reçu : {$eventName}");
        
        if ($eventName !== 'transaction.approved' || !$entity) {
            // Ignorer ou logguer les événements non pertinents
            return response()->json(['status' => 'ignored'], 200);
        }

        // 2. Traitement de l'événement transaction.approved
        
        $customerEmail = $entity['metadata']['paid_customer']['email'] ?? null;
        $transactionId = $entity['transaction_key'] ?? null;

        if (!$customerEmail) {
            Log::error("Webhook - Email client non trouvé pour la transaction: {$transactionId}");
            return response()->json(['status' => 'error', 'message' => 'Email manquant'], 400);
        }

        // Utiliser une transaction de base de données pour assurer l'atomicité
        DB::transaction(function () use ($customerEmail, $transactionId) {
            $user = User::where('email', $customerEmail)->first();

            if ($user && !$user->has_paid) {
                $user->has_paid = true;
                $user->paid_at = now();
                
                // Ajouter 2 mois d'accès à partir de maintenant
                $subscriptionMonths = 2;
                $user->payment_expires_at = now()->addMonths($subscriptionMonths);
                $user->subscription_months = $subscriptionMonths;
                $user->has_active_subscription = true;
                
                $user->save();

                Log::info("✅ Webhook : Utilisateur {$user->email} activé. Transaction: {$transactionId}");
                Log::info("📅 Accès valide jusqu'au : {$user->payment_expires_at->format('d/m/Y H:i:s')}");
            } elseif ($user && $user->has_paid) {
                Log::info("🔔 Webhook : Utilisateur {$user->email} déjà payé. Transaction: {$transactionId}");
            } else {
                Log::warning("❌ Webhook : Utilisateur {$customerEmail} non trouvé. Transaction: {$transactionId}");
            }
        });


        // 3. Réponse (Obligatoire)
        // FedaPay attend une réponse 200 OK rapide.
        return response()->json(['status' => 'success', 'message' => 'Webhook processed'], 200);
    }
}