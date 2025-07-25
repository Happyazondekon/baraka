@extends('layouts.guest') {{-- Or a custom layout for auth pages, if you create one --}}

@section('title', 'Connexion - Baraka')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
        <div class="text-center">
            {{-- You can put your logo here --}}
            {{-- <img class="mx-auto h-20 w-auto" src="{{ asset('path/to/your/logo.svg') }}" alt="Baraka Logo"> --}}
            <h2 class="mt-6 text-4xl font-extrabold text-gray-900 leading-tight">
                Connectez-vous à Baraka
            </h2>
            <p class="mt-2 text-md text-gray-600">
                Accédez à votre apprentissage du code de la route.
            </p>
        </div>

        <x-auth-session-status class="mb-4 text-center text-sm font-medium text-green-600" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 sr-only">Adresse Email</label>
                <input id="email" 
                       class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm transition duration-200" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       autofocus 
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
                       autocomplete="current-password"
                       placeholder="Mot de passe"
                />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded" name="remember">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-green-600 hover:text-green-500 transition-colors duration-200">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    </div>
                @endif
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-semibold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-green-500 group-hover:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('Se connecter') }}
                </button>
            </div>

            <div class="text-center text-sm text-gray-600">
                Pas encore de compte ? 
                <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-500 transition-colors duration-200">
                    S'inscrire
                </a>
            </div>
        </form>
    </div>
</div>
@endsection