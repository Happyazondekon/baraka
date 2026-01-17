<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $featuredModules = Module::where('is_active', true)
                            ->orderBy('order')
                            ->take(3)
                            ->get();

        return view('home', compact('featuredModules'));
    }

    public function about()
    {
        return view('about');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Logique d'envoi d'email à implémenter

        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }

    public function dashboard()
    {
        $user = auth()->user();
        $modules = Module::where('is_active', true)->orderBy('order')->get();

        // Calculate global progression since User::getProgressPercentage() is undefined
        $progressionGlobale = 0;
        $totalModules = $modules->count();
        if ($totalModules > 0) {
            $progressSum = 0;
            foreach ($modules as $module) {
                $totalCourses = $module->courses()->count();
                $completedCourses = $module->userProgress()->where('user_id', $user->id)->where('completed', true)->count();

                $courseProgress = $totalCourses ? ($completedCourses / $totalCourses) : 0;

                $quiz = $module->quiz()->first();
                $quizPassed = false;
                if ($quiz) {
                    $lastResult = $quiz->userResults()->where('user_id', $user->id)->latest()->first();
                    $quizPassed = $lastResult && $lastResult->passed;
                }

                $quizProgress = $quiz ? ($quizPassed ? 1 : 0) : 1;
                $moduleProgress = ($courseProgress + $quizProgress) / 2;
                $progressSum += $moduleProgress;
            }

            $progressionGlobale = round(($progressSum / $totalModules) * 100);
        }

        $suggestedModules = $modules->filter(function ($module) use ($user) {
            return !$module->isCompletedBy($user);
        })->take(3);

        return view('dashboard', compact('user', 'modules', 'suggestedModules', 'progressionGlobale'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'language' => 'required|in:fr,en',
        ]);

        // Use fill + save to avoid static-analysis "undefined method update" warnings
        $user->fill($validated);
        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès !');
    }

    public function progression()
    {
        $user = auth()->user();

        $modules_theoriques = Module::where('is_active', true)->where('is_practical', false)->get();
        $modules_pratiques = Module::where('is_active', true)->where('is_practical', true)->get();

        $calculerProgression = function($modules) use ($user) {
            $totalModules = $modules->count();
            if ($totalModules === 0) return 0;

            $progressSum = 0;

            foreach ($modules as $module) {
                $totalCourses = $module->courses()->count();
                $completedCourses = $module->userProgress()->where('user_id', $user->id)->where('completed', true)->count();

                $courseProgress = $totalCourses ? ($completedCourses / $totalCourses) : 0;

                $quiz = $module->quiz()->first();
                $quizPassed = false;
                if ($quiz) {
                    $lastResult = $quiz->userResults()->where('user_id', $user->id)->latest()->first();
                    $quizPassed = $lastResult && $lastResult->passed;
                }

                $quizProgress = $quiz ? ($quizPassed ? 1 : 0) : 1;
                $moduleProgress = ($courseProgress + $quizProgress) / 2;
                $progressSum += $moduleProgress;
            }

            return round(($progressSum / $totalModules) * 100);
        };

        $progression_theorique = $calculerProgression($modules_theoriques);
        $progression_pratique = $calculerProgression($modules_pratiques);

        return view('progression', compact(
            'modules_theoriques', 
            'modules_pratiques', 
            'progression_theorique', 
            'progression_pratique'
        ));
    }

    public function payment()
    {
        return view('payment');
    }

    /**
     * NOTE: Cette méthode est généralement utilisée pour initialiser une transaction
     * avant de rediriger l'utilisateur vers FedaPay (Checkout ou redirection directe).
     * Dans votre cas, la logique de paiement semble se faire principalement via le 
     * bouton FedaPay. Laissez-la, mais assurez-vous que la logique de simulation
     * de mise à jour ci-dessous n'est PAS celle qui est réellement utilisée.
     */
    public function processPayment(Request $request)
    {
        try {
            if ($request->user()->has_paid) {
                return redirect()->route('dashboard')
                    ->with('success', 'Vous avez déjà un accès complet !');
            }

            // *************************************************************
            // REMPLACER CECI par votre LOGIQUE DE CRÉATION DE TRANSACTION FEDAPAY
            // Le statut de paiement ne DOIT ÊTRE mis à jour que dans le CALLBACK
            // *************************************************************
            
            // Logique de simulation TEMPORAIRE - À RETIRER
            $paiement_est_valide = false; // Par défaut, on suppose qu'il faut attendre le callback

            if ($paiement_est_valide) {
                $request->user()->update([
                    'has_paid' => true,
                    'paid_at' => now(),
                ]);

                Log::info('Paiement simulé réussi pour l\'utilisateur: ' . $request->user()->email);

                return redirect()->intended(route('dashboard'))
                    ->with('success', 'Félicitations ! Votre paiement a été validé (SIMULÉ). Accès débloqué !');
            } else {
                // Si la transaction FedaPay est créée avec succès, vous devriez rediriger l'utilisateur ici.
                // Si ce code est appelé APRES le paiement (ce qui est déconseillé), le message d'erreur est pertinent.
                Log::error('Processus de paiement non finalisé (pas de redirection FedaPay ?)');
                return redirect()->route('pricing')
                    ->with('error', 'Le processus de paiement a été initié mais non confirmé.');
            }

        } catch (\Exception $e) {
            Log::error('Erreur lors du traitement du paiement: ' . $e->getMessage());
            return redirect()->route('pricing')
                ->with('error', 'Une erreur est survenue lors du traitement.');
        }
    }

    /**
     * Gère le callback de FedaPay après paiement.
     * C'EST ICI QUE LE STATUT has_paid DOIT ÊTRE MIS À JOUR.
     */
   /**
     * Gère le callback de FedaPay après paiement.
     * C'EST ICI QUE LE STATUT has_paid DOIT ÊTRE MIS À JOUR.
     */


    /**
     * Gère les callbacks échoués et redirige vers la page tarifaire.
     */
    private function handleFailedCallback($reason)
    {
        Log::error('Callback FedaPay échoué: ' . $reason);
        
        return redirect()->route('pricing')
            ->with('error', 'Erreur lors de la confirmation du paiement. ' . $reason);
    }
    /**
 * Vérifie le statut de paiement en temps réel (pour les requêtes AJAX)
 */
public function checkPaymentStatus(Request $request)
{
    try {
        $user = $request->user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié'
            ], 401);
        }

        // Recharger l'utilisateur pour avoir les données fraîches
        $user->refresh();

        Log::info('Vérification statut paiement pour: ' . $user->email . ' - has_paid: ' . $user->has_paid);

        return response()->json([
            'success' => true,
            'has_paid' => $user->has_paid,
            'paid_at' => $user->paid_at,
            'message' => $user->has_paid ? 'Accès déjà débloqué' : 'En attente de paiement'
        ]);

    } catch (\Exception $e) {
        Log::error('Erreur vérification statut paiement: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de la vérification'
        ], 500);
    }
}

/**
 * Simule un webhook de test pour les développements
 */
public function simulatePaymentWebhook(Request $request)
{
    try {
        $user = $request->user();
        
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Non authentifié'], 401);
        }

        // Simuler un paiement réussi
        $user->has_paid = true;
        $user->paid_at = now();
        
        // Ajouter 2 mois d'accès
        $subscriptionMonths = 2;
        $user->payment_expires_at = now()->addMonths($subscriptionMonths);
        $user->subscription_months = $subscriptionMonths;
        $user->has_active_subscription = true;
        
        $user->save();

        Log::info('✅ Paiement simulé pour: ' . $user->email);
        Log::info("📅 Accès valide jusqu'au : {$user->payment_expires_at->format('d/m/Y H:i:s')}");

        // Émettre un événement de paiement réussi
        event(new \App\Events\PaymentCompleted($user));

        return response()->json([
            'success' => true,
            'message' => 'Paiement simulé avec succès',
            'has_paid' => $user->has_paid
        ]);

    } catch (\Exception $e) {
        Log::error('Erreur simulation paiement: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Erreur simulation'], 500);
    }
}
public function handlePaymentCallback(Request $request)
{
    Log::info('=== CALLBACK FEDAPAY REÇU ===');
    
    try {
        $status = $request->input('status');
        $transactionId = $request->input('transaction_id');
        $customerEmail = $request->input('email');

        // Traitement du paiement...
        if (in_array(strtolower($status), ['approved', 'complete', 'completed', 'paid'])) {
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
                
                Log::info("✅ Utilisateur {$user->email} activé via callback");
                Log::info("📅 Accès valide jusqu'au : {$user->payment_expires_at->format('d/m/Y H:i:s')}");
                
                // REDIRECTION vers le dashboard (pas de vue)
                return redirect()->route('dashboard')
                    ->with('success', '🎉 Paiement validé ! Accès débloqué pour 2 mois.');
            }
        }
        
        return redirect()->route('pricing')
            ->with('error', 'Paiement échoué ou en attente.');
            
    } catch (\Exception $e) {
        Log::error('Erreur callback: ' . $e->getMessage());
        return redirect()->route('pricing')
            ->with('error', 'Erreur technique.');
    }
}
/**
 * Méthode de débogage temporaire
 */
public function debugPayment(Request $request)
{
    Log::info('=== DEBUG PAYMENT ===');
    Log::info('User: ' . ($request->user() ? $request->user()->email : 'none'));
    Log::info('Has paid: ' . ($request->user() ? $request->user()->has_paid : 'N/A'));
    Log::info('All request data: ' . json_encode($request->all()));
    
    return response()->json([
        'user' => $request->user() ? $request->user()->email : 'none',
        'has_paid' => $request->user() ? $request->user()->has_paid : false,
        'request_data' => $request->all()
    ]);
}
}
