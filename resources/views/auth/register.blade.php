@extends('layouts.guest')

@section('title', 'Inscription - AutoPermis')

@section('content')
<div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
    <div class="text-center">
        {{-- You can put your logo here --}}
        {{-- <img class="mx-auto h-20 w-auto" src="{{ asset('path/to/your/logo.svg') }}" alt="AutoPermis Logo"> --}}
        <h2 class="mt-6 text-4xl font-extrabold text-gray-900 leading-tight">
            Créez votre compte AutoPermis
        </h2>
        <p class="mt-2 text-md text-gray-600">
            Commencez votre parcours pour obtenir le code de la route.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 sr-only">Nom complet</label>
            <input id="name"
                   class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm transition duration-200"
                   type="text"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   autofocus
                   autocomplete="name"
                   placeholder="Nom complet"
            />
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 sr-only">Adresse Email</label>
            <input id="email"
                   class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm transition duration-200"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autocomplete="username"
                   placeholder="Adresse Email"
            />
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 sr-only">Mot de passe</label>
            <input id="password"
                   class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm transition duration-200"
                   type="password"
                   name="password"
                   required
                   autocomplete="new-password"
                   placeholder="Mot de passe"
            />
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 sr-only">Confirmer le mot de passe</label>
            <input id="password_confirmation"
                   class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm transition duration-200"
                   type="password"
                   name="password_confirmation"
                   required
                   autocomplete="new-password"
                   placeholder="Confirmer le mot de passe"
            />
            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="font-medium text-green-600 hover:text-green-500 transition-colors duration-200 text-sm" href="{{ route('login') }}">
                {{ __('Déjà inscrit(e) ?') }}
            </a>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-semibold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-green-500 group-hover:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10 2a3 3 0 00-3 3v.586l-1.707 1.707A1 1 0 005.707 9H7a1 1 0 001-1V5a1 1 0 112 0v3a1 1 0 001 1h1.293a1 1 0 00.707-1.707L13 5.586V5a3 3 0 00-3-3zM5 11.293V14a2 2 0 002 2h6a2 2 0 002-2v-2.707l-2.707 2.707a1 1 0 01-1.414 0L10 13.414l-1.879 1.879a1 1 0 01-1.414 0L5 11.293z"/>
                        </svg>
                    </span>
                    {{ __('S\'inscrire') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection