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

        $progressionGlobale = $user->getProgressPercentage();

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

        $user->update($validated);

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
    public function handlePaymentCallback(Request $request)
    {
        Log::info('=== CALLBACK FEDAPAY REÇU ===');
        Log::info('Données complètes: ' . json_encode($request->all()));
        Log::info('URL complète: ' . $request->fullUrl());

        try {
            // Récupérer le statut et l'email depuis l'URL
            $status = $request->input('status');
            $transactionId = $request->input('transaction_id');
            $customerEmail = $request->input('email');

            Log::info('Status: ' . $status);
            Log::info('Transaction ID: ' . $transactionId);
            Log::info('Email: ' . $customerEmail);

            // Vérifier que tous les paramètres nécessaires sont présents
            if (!$status || !$customerEmail) {
                Log::error('Paramètres manquants dans le callback');
                return redirect()->route('pricing')
                    ->with('error', 'Données de paiement incomplètes.');
            }

            // Récupérer l'utilisateur
            $user = User::where('email', $customerEmail)->first();

            if (!$user) {
                Log::error('Utilisateur non trouvé pour l\'email: ' . $customerEmail);
                return redirect()->route('pricing')
                    ->with('error', 'Utilisateur non trouvé.');
            }

            // Vérifier le statut du paiement
            if (in_array(strtolower($status), ['approved', 'complete', 'completed', 'paid'])) {
                
                if (!$user->has_paid) {
                    // Mettre à jour l'utilisateur
                    $user->has_paid = true;
                    $user->paid_at = now();
                    $updateResult = $user->save();

                    if ($updateResult) {
                        Log::info('✅ SUCCÈS: Utilisateur ' . $user->id . ' mis à jour. has_paid = 1');
                        
                        // Vérification immédiate
                        $user->refresh();
                        Log::info('Vérification après refresh: has_paid = ' . $user->has_paid);
                        
                        return redirect()->route('dashboard')
                            ->with('success', '🎉 Félicitations ! Votre paiement a été validé. Accès débloqué !');
                    } else {
                        Log::error('❌ Échec du save() pour l\'utilisateur ' . $user->id);
                        return redirect()->route('pricing')
                            ->with('error', 'Erreur lors de l\'activation de votre accès.');
                    }
                } else {
                    Log::info('Utilisateur ' . $user->id . ' déjà payé');
                    return redirect()->route('dashboard')
                        ->with('info', 'Votre accès est déjà activé !');
                }
            } else {
                Log::warning('Statut non approuvé: ' . $status);
                return redirect()->route('pricing')
                    ->with('warning', 'Paiement en attente ou échoué (statut: ' . $status . ')');
            }

        } catch (\Exception $e) {
            Log::error('❌ EXCEPTION dans handlePaymentCallback: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->route('pricing')
                ->with('error', 'Erreur technique lors du traitement du paiement.');
        }
    }

    /**
     * Gère les callbacks échoués et redirige vers la page tarifaire.
     */
    private function handleFailedCallback($reason)
    {
        Log::error('Callback FedaPay échoué: ' . $reason);
        
        return redirect()->route('pricing')
            ->with('error', 'Erreur lors de la confirmation du paiement. ' . $reason);
    }
}
