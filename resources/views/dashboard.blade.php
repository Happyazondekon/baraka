@extends('layouts.app')

@section('title', 'Accueil Utilisateur')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 border border-gray-200 h-full flex flex-col justify-center">
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-2">
                        Bienvenue, <span class="text-green-600">{{ Auth::user()->name }}</span> !
                    </h1>
                    <p class="text-xl text-gray-600 max-w-xl">
                        Votre parcours vers la réussite est en cours. Continuez la pratique ou reprenez vos leçons.
                    </p>
                    <div class="mt-6 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('modules.index') }}" 
                           class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-md text-white bg-green-600 hover:bg-green-700 transition duration-150">
                            Accéder aux Modules
                        </a>
                        <a href="{{ route('examens.index') }}" 
                           class="inline-flex items-center justify-center px-6 py-3 border border-green-600 text-base font-medium rounded-xl shadow-md text-green-600 bg-white hover:bg-green-50 transition duration-150">
                            Faire un Examen Blanc
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-3xl shadow-xl p-6 text-white h-full flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold mb-2">Progression Totale</h3>
                    <p class="text-green-100 mb-4 text-sm">
                        @if($progressionGlobale < 100)
                        Il vous reste des leçons à maîtriser !
                        @else
                        Objectif atteint ! Vous êtes prêt(e).
                        @endif
                    </p>
                </div>
                
                <div class="mb-4">
                    <div class="w-full bg-white bg-opacity-30 rounded-full h-3">
                        <div class="bg-white h-3 rounded-full" style="width: {{ $progressionGlobale ?? 0 }}%;"></div>
                    </div>
                    <div class="text-3xl font-extrabold mt-2 text-right">
                        {{ $progressionGlobale ?? 0 }}%
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-200 h-full">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Vos Performances</h3>

                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div class="bg-green-50 rounded-xl p-4">
                            <div class="text-3xl font-bold text-green-700">{{ $progressionGlobale ?? 0 }}%</div>
                            <div class="text-sm text-gray-600">Progression globale</div>
                        </div>
                        <div class="bg-yellow-50 rounded-xl p-4">
                            <div class="text-3xl font-bold text-yellow-700">{{ $completedLessonsCount ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Leçons terminées</div>
                        </div>
                        <div class="bg-red-50 rounded-xl p-4">
                            <div class="text-3xl font-bold text-red-700">{{ $modulesCompletedCount ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Modules complétés</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4">
                            <div class="text-3xl font-bold text-blue-700">{{ $modules->count() ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Modules disponibles</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-200">
                 <h3 class="text-2xl font-bold text-gray-900 mb-4">Dernière Activité</h3>

                <div class="flex flex-col h-full justify-between">
                    <div>
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">MODULE EN COURS</span>
                        <h4 class="text-xl font-bold text-gray-900 mt-1 mb-2">
                            @if(isset($lastActiveModule))
                                {{ $lastActiveModule->title ?? 'Module Précédent' }}
                            @else
                                Votre parcours n'a pas encore démarré.
                            @endif
                        </h4>
                        <p class="text-gray-600 text-sm">
                            @if(isset($lastActiveModule))
                                Reprenez la leçon **{{ $lastActiveLessonName ?? 'en cours' }}** pour avancer.
                            @else
                                Commencez par le premier module pour débloquer toutes les fonctionnalités.
                            @endif
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <a href="{{ route('modules.index') }}" 
                           class="w-full text-center inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-orange-500 hover:bg-orange-600 transition duration-150">
                            Reprendre Maintenant
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        @if (isset($recentExams) && $recentExams->isNotEmpty())
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-2">Vos Derniers Examens Blancs</h2>
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <ul class="divide-y divide-gray-100">
                    @foreach ($recentExams as $exam)
                    <li class="py-3 flex justify-between items-center">
                        <div>
                            <p class="font-medium text-gray-900">Examen n° {{ $exam->id }}</p>
                            <p class="text-sm text-gray-500">Passé le {{ $exam->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                @if ($exam->score >= 80) 
                                    bg-green-100 text-green-800
                                @elseif ($exam->score >= 60)
                                    bg-yellow-100 text-yellow-800
                                @else
                                    bg-red-100 text-red-800
                                @endif
                            ">
                                Score: {{ $exam->score }}%
                            </span>
                            <a href="{{ route('examens.results', $exam) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                Voir les résultats &rarr;
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="mt-4 text-center border-t pt-4">
                    <a href="{{ route('examens.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                        Voir tout l'historique des examens
                    </a>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection