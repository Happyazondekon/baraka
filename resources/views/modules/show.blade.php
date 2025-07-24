@extends('layouts.app')

@section('title', $module->titre ?? 'Module')

@section('content')
<div class="container mx-auto px-4 py-8">
    <a href="{{ route('modules.index') }}" class="text-green-500 mb-4 inline-block">&larr; Tous les modules</a>
    <div class="bg-green-100 rounded-lg p-6 flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold">Phase théorique : Code de la route</h2>
            <h3 class="text-lg font-semibold mt-2">{{ $module->titre ?? 'Les signalisation routières' }}</h3>
            <p class="mt-2 text-gray-700">{{ $module->description ?? 'Le respect de la signalisation réduit les risques d’accidents et permet une conduite plus sûre.' }}</p>
        </div>
        <div class="flex flex-col items-center justify-center">
            <span class="block text-3xl font-bold">01 / 08</span>
            <span class="text-green-700 font-semibold">Modules</span>
        </div>
    </div>
    <div class="mb-6">
        <!-- Vidéo/illustration -->
        <div class="rounded overflow-hidden shadow-lg mb-4">
            <img src="{{ $module->image ?? 'https://via.placeholder.com/600x300' }}" alt="Illustration Module" class="w-full h-64 object-cover">
            <div class="absolute inset-0 flex items-center justify-center">
                <button class="bg-white rounded-full p-2 shadow text-green-500">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                        <polygon points="9.5,7.5 16.5,12 9.5,16.5" />
                    </svg>
                </button>
            </div>
        </div>
        <h4 class="text-xl font-bold mb-4">Allons plus en détail !</h4>
        <div class="bg-green-100 rounded p-6 mb-8">
            <h5 class="font-bold text-green-700 mb-3">Les Types de Signalisations</h5>
            <ul class="list-disc pl-5 text-gray-800">
                <li>
                    <span class="font-semibold">La signalisation verticale :</span>
                    <ul class="list-disc pl-5">
                        <li>🔺 <span class="text-red-700">Panneaux de danger</span> : annonce un risque potentiel</li>
                        <li>🔵 <span class="text-blue-700">Panneaux d’obligation</span> : action spécifique à respecter</li>
                        <li>🟡 <span class="text-yellow-700">Panneaux temporaires</span> : modification temporaire</li>
                    </ul>
                </li>
                <li>
                    <span class="font-semibold">La signalisation horizontale :</span>
                    <ul class="list-disc pl-5">
                        <li>🚫 Lignes continues : interdiction de dépasser</li>
                        <li>🚸 Passages piétons : zone de traversée sécurisée</li>
                        <li>➡️ Flèches directionnelles : indication de la voie à suivre</li>
                    </ul>
                </li>
                <li>
                    <span class="font-semibold">Les feux tricolores :</span>
                    <ul class="list-disc pl-5">
                        <li>🔴 Rouge : arrêt obligatoire</li>
                        <li>🟠 Orange : ralentissement, arrêt sauf danger</li>
                        <li>🟢 Vert : passage autorisé</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="mb-8">
        <h4 class="font-bold text-xl mb-4">Test de Validation (QCM)</h4>
        <form>
            <!-- Question 1 -->
            <div class="mb-4">
                <span class="font-bold">1</span> Que signifie un panneau triangulaire avec un fond blanc et un contour rouge ?
                <div class="grid grid-cols-2 gap-2 mt-2">
                    <label><input type="checkbox" /> Une interdiction</label>
                    <label><input type="checkbox" /> Une obligation</label>
                    <label><input type="checkbox" /> Un danger</label>
                </div>
            </div>
            <!-- Question 2 -->
            <div class="mb-4">
                <span class="font-bold">2</span> Que devez-vous faire lorsqu'un feu est orange fixe ?
                <div class="grid grid-cols-2 gap-2 mt-2">
                    <label><input type="radio" name="q2" /> Une interdiction</label>
                    <label><input type="radio" name="q2" /> Une obligation</label>
                    <label><input type="radio" name="q2" /> Un avertissement</label>
                </div>
            </div>
            <!-- ... autres questions selon le modèle ... -->
            <div class="flex items-center gap-2 mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Valider</button>
                <a href="#" class="bg-green-100 px-4 py-2 rounded hover:bg-green-500 hover:text-white">Télécharger la fiche récapitulative du module</a>
            </div>
        </form>
    </div>
</div>
@endsection