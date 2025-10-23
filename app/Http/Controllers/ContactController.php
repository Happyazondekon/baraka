<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Mail\PracticalLessonRequest;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);

        // Envoyer l'email
        Mail::to('autopermis25@gmail.com')->send(new ContactMessage($request->all()));

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès !');
    }

    public function requestPracticalLesson(Request $request)
    {
        $request->validate([
            'lesson_date' => 'required|date|after:today',
            'lesson_time' => 'required|string',
            'location' => 'required|string|max:255',
            'notes' => 'nullable|string'
        ]);

        // Ajouter les informations utilisateur
        $data = $request->all();
        $data['user_name'] = auth()->user()->name;
        $data['user_email'] = auth()->user()->email;

        // Envoyer l'email de demande de cours pratique
        Mail::to('autopermis25@gmail.com')->send(new PracticalLessonRequest($data));

        return redirect()->route('contact')->with('success', 'Votre demande de cours pratique a été envoyée ! Nous vous contacterons pour confirmation.');
    }
}