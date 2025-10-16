<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
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

        // 1. CALCULER LA PROGRESSION GLOBALE
        // Appeler la méthode sur l'utilisateur authentifié
        $progressionGlobale = $user->getProgressPercentage();

        // Modules non encore complétés par l'utilisateur (suggérés)
        $suggestedModules = $modules->filter(function ($module) use ($user) {
            return !$module->isCompletedBy($user);
        })->take(3); // suggère les 3 premiers non terminés

        // 2. PASSER LA VARIABLE À LA VUE
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

    // Modules actifs séparés par type
    $modules_theoriques = Module::where('is_active', true)->where('is_practical', false)->get();
    $modules_pratiques = Module::where('is_active', true)->where('is_practical', true)->get();

    // Fonction pour calculer progression d'une collection de modules
    $calculerProgression = function($modules) use ($user) {
        $totalModules = $modules->count();
        if ($totalModules === 0) return 0;

        $progressSum = 0;

        foreach ($modules as $module) {
            // Progression sur les cours
            $totalCourses = $module->courses()->count();
            $completedCourses = $module->userProgress()->where('user_id', $user->id)->where('completed', true)->count();

            $courseProgress = $totalCourses ? ($completedCourses / $totalCourses) : 0;

            // Progression sur quiz (0 ou 1 selon quiz passé et réussi)
            $quiz = $module->quiz()->first();
            $quizPassed = false;
            if ($quiz) {
                $lastResult = $quiz->userResults()->where('user_id', $user->id)->latest()->first();
                $quizPassed = $lastResult && $lastResult->passed;
            }

            $quizProgress = $quiz ? ($quizPassed ? 1 : 0) : 1; // pas de quiz = considéré comme réussi

            // Moyenne cours + quiz
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

    public function processPayment(Request $request)
    {
        try {
            // Vérifier si l'utilisateur a déjà payé
            if ($request->user()->has_paid) {
                return redirect()->route('dashboard')
                    ->with('success', 'Vous avez déjà un accès complet !');
            }

            // ICI : Vérification FedaPay
            // Pour l'instant, on simule un paiement réussi
            $paiement_est_valide = true; // À remplacer par votre logique FedaPay

            if ($paiement_est_valide) {
                // Marquer l'utilisateur comme ayant payé
                $request->user()->update([
                    'has_paid' => true,
                    'paid_at' => now(),
                ]);

                Log::info('Paiement réussi pour l\'utilisateur: ' . $request->user()->email);

                // Rediriger vers l'URL initialement demandée ou le dashboard
                return redirect()->intended(route('dashboard'))
                    ->with('success', 'Félicitations ! Votre paiement a été validé. Accès débloqué !');
            } else {
                Log::error('Paiement échoué pour l\'utilisateur: ' . $request->user()->email);
                return redirect()->route('pricing')
                    ->with('error', 'Le paiement a échoué. Veuillez réessayer.');
            }

        } catch (\Exception $e) {
            Log::error('Erreur lors du traitement du paiement: ' . $e->getMessage());
            return redirect()->route('pricing')
                ->with('error', 'Une erreur est survenue lors du traitement.');
        }
    }

    public function handlePaymentCallback(Request $request)
{
    try {
        // Vérifier la signature FedaPay
        $isValid = $this->verifyFedaPayCallback($request);
        
        if ($isValid && $request->status === 'approved') {
            // Récupérer l'utilisateur concerné
            $user = User::where('email', $request->customer['email'])->first();
            
            if ($user && !$user->has_paid) {
                // Activer l'accès payant
                $user->update([
                    'has_paid' => true,
                    'paid_at' => now(),
                ]);

                Log::info('Callback FedaPay réussi pour: ' . $user->email);
                
                // Rediriger vers le dashboard avec message de succès
                return redirect()->route('dashboard')
                    ->with('success', 'Paiement confirmé ! Votre accès est maintenant activé.');
            }
        }

        Log::error('Callback FedaPay échoué: ' . json_encode($request->all()));
        return redirect()->route('pricing')
            ->with('error', 'Erreur lors de la confirmation du paiement.');

    } catch (\Exception $e) {
        Log::error('Erreur callback FedaPay: ' . $e->getMessage());
        return redirect()->route('pricing')
            ->with('error', 'Erreur technique lors du traitement.');
    }
}

private function verifyFedaPayCallback(Request $request)
{
    // Implémentez la vérification de signature FedaPay
    // Consultez la documentation FedaPay pour les détails
    return true; // Temporaire - à implémenter
}

}
