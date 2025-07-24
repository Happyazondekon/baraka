@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Contactez-nous</h1>
    <div class="mb-8">
        <p class="mb-2"><strong>Téléphone :</strong> <a href="tel:+22991919565" class="text-green-600 hover:underline">+229 91 91 95 65</a></p>
        <p class="mb-2">
            <strong>Adresse :</strong> 
            Abomey Calavi, Bénin
        </p>
    </div>

    <h2 class="text-xl font-semibold mb-4">Notre localisation</h2>
    <div class="mb-8">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4078.129651471573!2d2.3468!3d6.4503!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1024a907d5334d9b%3A0xb28a9b10ccbc460a!2sAbomey%20Calavi!5e1!3m2!1sen!2sbj!4v1753369224749!5m2!1sen!2sbj" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <h2 class="text-xl font-semibold mb-4">Formulaire de contact</h2>
    <form method="POST" action="{{ route('contact.send') }}" class="max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-semibold mb-2">Nom</label>
            <input type="text" id="name" name="name" required class="w-full px-4 py-2 rounded border border-gray-300" value="{{ old('name') }}">
        </div>
        <div class="mb-4">
            <label for="email" class="block font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" required class="w-full px-4 py-2 rounded border border-gray-300" value="{{ old('email') }}">
        </div>
        <div class="mb-4">
            <label for="message" class="block font-semibold mb-2">Message</label>
            <textarea id="message" name="message" required class="w-full px-4 py-2 rounded border border-gray-300" rows="5">{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Envoyer</button>
    </form>
</div>
@endsection