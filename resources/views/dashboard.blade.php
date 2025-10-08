@extends('layouts.app')

@section('title', 'Accueil Utilisateur')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 border border-gray-200 h-full flex flex-col justify-center relative overflow-hidden">
                    <!-- Background decorative element -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-green-50 rounded-full -translate-y-32 translate-x-32"></div>
                    <div class="relative z-10">
                        <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-2">
                            Bienvenue, <span class="text-green-600">{{ Auth::user()->name }}</span> !
                        </h1>
                        <p class="text-xl text-gray-600 max-w-xl">
                            Votre parcours vers la réussite est en cours. Continuez la pratique ou reprenez vos leçons.
                        </p>
                        <div class="mt-6 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                            <a href="{{ route('modules.index') }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-md text-white bg-green-600 hover:bg-green-700 transition duration-150">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Accéder aux Modules
                            </a>
                            <a href="{{ route('examens.index') }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-base font-medium rounded-xl shadow-md text-blue-600 bg-white hover:bg-blue-50 transition duration-150">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Faire un Examen Blanc
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-3xl shadow-xl p-6 text-white h-full flex flex-col justify-between relative overflow-hidden">
                <!-- Background car image -->
                <div class="absolute bottom-0 center-0 opacity-60">
                    <img src="{{ asset('images/driving.png') }}" alt="Car" class="w-32 h-32 object-contain">
                </div>
                <div class="relative z-10">
                    <h3 class="text-xl font-bold mb-2">Progression Totale</h3>
                    <p class="text-green-100 mb-4 text-sm">
                        @if($progressionGlobale < 100)
                        Il vous reste des leçons à maîtriser !
                        @else
                        Objectif atteint ! Vous êtes prêt(e).
                        @endif
                    </p>
                </div>
                
                <div class="mb-4 relative z-10">
                    <div class="w-full bg-white bg-opacity-30 rounded-full h-3">
                        <div class="bg-white h-3 rounded-full transition-all duration-1000 ease-out" style="width: {{ $progressionGlobale ?? 0 }}%;"></div>
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
                        <div class="bg-green-50 rounded-xl p-4 border-2 border-green-100 hover:border-green-300 transition duration-200">
                            <div class="flex justify-center mb-2">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-green-700">{{ $progressionGlobale ?? 0 }}%</div>
                            <div class="text-sm text-gray-600">Progression globale</div>
                        </div>
                        <div class="bg-yellow-50 rounded-xl p-4 border-2 border-yellow-100 hover:border-yellow-300 transition duration-200">
                            <div class="flex justify-center mb-2">
                                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-yellow-700">{{ $completedLessonsCount ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Leçons terminées</div>
                        </div>
                        <div class="bg-red-50 rounded-xl p-4 border-2 border-red-100 hover:border-red-300 transition duration-200">
                            <div class="flex justify-center mb-2">
                                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-red-700">{{ $modulesCompletedCount ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Modules complétés</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 border-2 border-blue-100 hover:border-blue-300 transition duration-200">
                            <div class="flex justify-center mb-2">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-blue-700">{{ $modules->count() ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Modules disponibles</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-200 relative overflow-hidden">
                <!-- Background learning car image -->
                <div class="absolute bottom-0 right-0 opacity-60">
                    <img src="{{ asset('images/learning-car.png') }}" alt="Learning Car" class="w-48 h-48 object-contain">
                </div>
                
                <div class="relative z-10">
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
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Reprendre Maintenant
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if (isset($recentExams) && $recentExams->isNotEmpty())
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Vos Derniers Examens Blancs</h2>
                <div class="flex items-center text-gray-500">
                    <img src="{{ asset('images/driving.png') }}" alt="Driving" class="w-6 h-6 mr-2">
                    <span class="text-sm font-medium">Historique des tests</span>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <ul class="divide-y divide-gray-100">
                    @foreach ($recentExams as $exam)
                    <li class="py-4 flex justify-between items-center hover:bg-gray-50 rounded-lg px-3 transition duration-150">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Examen n° {{ $exam->id }}</p>
                                <p class="text-sm text-gray-500">Passé le {{ $exam->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                @if ($exam->score >= 80) 
                                    bg-green-100 text-green-800 border border-green-200
                                @elseif ($exam->score >= 60)
                                    bg-yellow-100 text-yellow-800 border border-yellow-200
                                @else
                                    bg-red-100 text-red-800 border border-red-200
                                @endif
                            ">
                                Score: {{ $exam->score }}%
                            </span>
                            <a href="{{ route('examens.results', $exam) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center">
                                Voir les résultats
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="mt-6 text-center border-t pt-6">
                    <a href="{{ route('examens.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                        Voir tout l'historique des examens
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection