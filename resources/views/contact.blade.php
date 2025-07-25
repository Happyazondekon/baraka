@extends('layouts.app')

@section('title', 'Contactez-nous - Baraka')

@section('content')

<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">
            Contactez <span class="text-green-600">B</span>araka
        </h1>
        <p class="text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
            Nous sommes là pour répondre à toutes vos questions, vous accompagner dans votre parcours ou recueillir vos suggestions. N'hésitez pas à nous joindre !
        </p>
    </div>
</section>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        <div class="bg-white rounded-lg p-8 shadow-md border border-gray-200 h-full">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Informations de Contact</h2>
            
            <div class="mb-6">
                <p class="text-gray-700 flex items-center mb-3 text-lg">
                    <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <strong>Téléphone :</strong> <a href="tel:+22991919565" class="text-green-700 hover:underline ml-2">+229 91 91 95 65</a>
                </p>
                <p class="text-gray-700 flex items-start text-lg">
                    <svg class="w-6 h-6 text-green-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.727A8 8 0 016.343 5.273v0A8 8 0 0117.657 16.727zM12 10a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                    <strong>Adresse :</strong> 
                    <span class="ml-2">Abomey Calavi, Bénin</span>
                </p>
                <p class="text-gray-700 flex items-center mt-6 text-lg">
                    <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-1 12H4a2 2 0 01-2-2V6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2z"></path></svg>
                    <strong>Email :</strong> <a href="mailto:contact@baraka.com" class="text-green-700 hover:underline ml-2">baraka@gmail.com</a> 
                </p>
            </div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-200 flex items-center justify-center p-4 h-full">
            <h2 class="sr-only">Notre localisation sur carte</h2>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.6521570535033!2d2.3444059999999997!3d6.427771500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b1368b6b02a83%3A0x6a0f6a0f6a0f6a0f!2sAbomey-Calavi!5e0!3m2!1sfr!2sbj!4v1719322960655!5m2!1sfr!2sbj" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="rounded-md" {{-- Add rounded corners to the iframe itself for consistency --}}
            ></iframe>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Envoyez-nous un message</h2>
        <div class="max-w-3xl mx-auto bg-gray-50 rounded-lg p-8 shadow-md border border-gray-200">
            <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                @csrf
                
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul class="mt-3 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">Votre Nom</label>
                    <input type="text" id="name" name="name" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200" 
                           value="{{ old('name') }}" placeholder="Votre nom complet">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Votre Email</label>
                    <input type="email" id="email" name="email" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200" 
                           value="{{ old('email') }}" placeholder="votre.email@exemple.com">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="message" class="block text-lg font-semibold text-gray-700 mb-2">Votre Message</label>
                    <textarea id="message" name="message" required 
                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200" 
                              rows="6" placeholder="Écrivez votre message ici...">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit" 
                            class="inline-flex items-center justify-center bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition duration-300 shadow-md transform hover:scale-105 text-lg font-semibold">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-1 12H4a2 2 0 01-2-2V6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2z"></path></svg>
                        Envoyer le message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection