@extends('layouts.app')

@section('title', 'Profil de l\'utilisateur')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">
            Gérer mon <span class="text-green-600">Profil</span>
        </h1>
        <p class="text-lg text-gray-600 mt-2">Mettez à jour vos informations et votre sécurité.</p>
    </div>

    {{-- Contenu du Profil --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- 1. Mise à jour des informations de profil --}}
        <div class="p-6 sm:p-8 bg-white shadow rounded-2xl border border-gray-100">
            <div class="max-w-xl">
                {{-- NOTE: Assurez-vous que ce fichier est dans resources/views/profile/partials/ --}}
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- 2. Mise à jour du mot de passe --}}
        <div class="p-6 sm:p-8 bg-white shadow rounded-2xl border border-gray-100">
            <div class="max-w-xl">
                {{-- NOTE: Assurez-vous que ce fichier est dans resources/views/profile/partials/ --}}
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- 3. Suppression du compte --}}
        <div class="p-6 sm:p-8 bg-white shadow rounded-2xl border border-gray-100">
            <div class="max-w-xl">
                {{-- NOTE: Assurez-vous que ce fichier est dans resources/views/profile/partials/ --}}
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection