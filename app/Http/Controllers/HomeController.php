<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

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

    // Modules non encore complétés par l'utilisateur (suggérés)
    $suggestedModules = $modules->filter(function ($module) use ($user) {
        return !$module->isCompletedBy($user);
    })->take(3); // suggère les 3 premiers non terminés

    return view('dashboard', compact('user', 'modules', 'suggestedModules'));
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
        // Validate payment data (e.g., amount, token from payment gateway)
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string|in:XOF,USD,EUR', // Example currencies
            'payment_method_nonce' => 'required|string', // Example for a tokenized payment
            // Add other validation rules as per your payment gateway requirements
        ]);

        $user = Auth::user();

        try {
            // Here you would integrate with your chosen payment gateway (e.g., Stripe, PayPal, Paystack)
            // This is a placeholder for actual payment processing logic
            $transactionId = 'TRANS_' . uniqid(); // Replace with actual transaction ID from gateway
            $status = 'completed'; // Assume success for now, handle failures in real scenario

            // Example: Call a payment gateway API
            // $gatewayResponse = PaymentGateway::charge($request->amount, $request->payment_method_nonce);
            // if ($gatewayResponse->successful()) {
            //     $status = 'completed';
            //     $transactionId = $gatewayResponse->transactionId;
            // } else {
            //     $status = 'failed';
            //     // Log error, get error message from gateway
            //     throw new \Exception('Payment failed: ' . $gatewayResponse->errorMessage);
            // }

            // Save payment record to your database
            Payment::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
                'currency' => $request->currency,
                'payment_method' => 'card', // Or dynamically set based on request
                'transaction_id' => $transactionId,
                'status' => $status,
                'payment_data' => json_encode($request->all()), // Store raw payment data if needed
            ]);

            return redirect()->route('dashboard')->with('success', 'Paiement effectué avec succès!');

        } catch (\Exception $e) {
            // Handle payment failure
            return back()->with('error', 'Échec du paiement: ' . $e->getMessage());
        }
    }

}
