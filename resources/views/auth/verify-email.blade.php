@extends('layouts.guest')

@section('title', 'Vérifier votre e-mail - Baraka')

@section('content')
<div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
    <div class="text-center">
        {{-- You can put your logo here --}}
        {{-- <img class="mx-auto h-20 w-auto" src="{{ asset('path/to/your/logo.svg') }}" alt="Baraka Logo"> --}}
        <h2 class="mt-6 text-4xl font-extrabold text-gray-900 leading-tight">
            Vérifiez votre adresse e-mail
        </h2>
        <p class="mt-4 text-md text-gray-700">
            Merci de vous être inscrit(e) ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ? Si vous n'avez pas reçu l'e-mail, nous serons ravis de vous en envoyer un autre.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-center font-medium text-sm text-green-600">
            Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.
        </div>
    @endif

    <div class="flex flex-col space-y-4 items-center justify-center mt-6">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full">
            @csrf

            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-semibold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-green-500 group-hover:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </span>
                {{ __('Renvoyer l\'e-mail de vérification') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full py-2 text-md font-medium text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 rounded-xl">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>
</div>
@endsection