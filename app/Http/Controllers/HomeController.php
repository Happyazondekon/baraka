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

        return view('dashboard', compact('user', 'modules'));
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

    // Exemple de récupération des modules pour progression
    $modules_theoriques = \App\Models\Module::where('is_active', true)
        ->where('is_practical', false)
        ->orderBy('order')
        ->get();

    $modules_pratiques = \App\Models\Module::where('is_active', true)
        ->where('is_practical', true)
        ->orderBy('order')
        ->get();

    // Calcule la progression (exemple simple)
    $progression_theorique = 60; // À remplacer par ta logique réelle
    $progression_pratique = 40;  // À remplacer par ta logique réelle

    return view('progression', compact(
        'modules_theoriques',
        'modules_pratiques',
        'progression_theorique',
        'progression_pratique'
    ));
}
}
