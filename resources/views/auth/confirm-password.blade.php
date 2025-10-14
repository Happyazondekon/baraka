@extends('layouts.guest')

@section('title', 'Confirmer le mot de passe - Auto-Permis')

@section('content')
<div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
    <div class="text-center">
        {{-- You can put your logo here --}}
        {{-- <img class="mx-auto h-20 w-auto" src="{{ asset('path/to/your/logo.svg') }}" alt="Auto-Permis Logo"> --}}
        <h2 class="mt-6 text-4xl font-extrabold text-gray-900 leading-tight">
            Confirmer le mot de passe
        </h2>
        <p class="mt-2 text-md text-gray-600">
            Ceci est une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.
        </p>
    </div>

    <x-auth-session-status class="mb-4 text-center text-sm font-medium text-green-600" :status="session('status')" />

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 sr-only">Mot de passe</label>
            <input id="password"
                   class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm transition duration-200"
                   type="password"
                   name="password"
                   required
                   autocomplete="current-password"
                   placeholder="Mot de passe"
            />
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-semibold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-green-500 group-hover:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                </span>
                {{ __('Confirmer') }}
            </button>
        </div>
    </form>
</div>
@endsection