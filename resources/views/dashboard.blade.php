@extends('layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Hero Welcome Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 border border-gray-200 h-full flex flex-col justify-center relative overflow-hidden">
                    <!-- Background decorative element -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-green-50 rounded-full -translate-y-32 translate-x-32"></div>
                    <div class="relative z-10">
                        <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-2">
                            Bienvenue, <span class="text-green-600">{{ Auth::user()->name }}</span> !
                        </h1>
                        <p class="text-xl text-gray-600 max-w-xl mb-6">
                            Votre parcours vers la réussite est en cours. Continuez la pratique ou reprenez vos leçons.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('modules.index') }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-md text-white bg-green-600 hover:bg-green-700 transition duration-150">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Mes Modules
                            </a>
                            <a href="{{ route('examens.index') }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-base font-medium rounded-xl shadow-md text-blue-600 bg-white hover:bg-blue-50 transition duration-150">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Examens Blancs
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progression Card -->
            <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-3xl shadow-xl p-6 text-white h-full flex flex-col justify-between relative overflow-hidden">
                <div class="absolute bottom-0 center-0 opacity-90">
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

        <!-- Quick Actions Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- Cours Pratique -->
            <a href="{{ route('contact') }}" class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Cours Pratique</h3>
                <p class="text-sm text-gray-600">Réservez une séance avec un moniteur</p>
            </a>

            <!-- Ma Progression -->
            <a href="{{ route('progression') }}" class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Ma Progression</h3>
                <p class="text-sm text-gray-600">Suivez votre avancement détaillé</p>
            </a>

            <!-- Auto-écoles -->
            <a href="{{ route('contact') }}#map" class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Auto-écoles</h3>
                <p class="text-sm text-gray-600">Trouvez une auto-école près de vous</p>
            </a>

            <!-- Support -->
            <a href="{{ route('contact') }}" class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Support</h3>
                <p class="text-sm text-gray-600">Contactez-nous pour toute question</p>
            </a>

        </div>

        <!-- Performance Cards & Last Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            
            <!-- Performance Stats -->
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
            
           <!-- Last Activity Card -->
<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-200 relative overflow-hidden">
    <div class="absolute bottom-0 right-0 opacity-90">
        <img src="{{ asset('images/learning-car.png') }}" alt="Learning Car" class="w-48 h-48 object-contain">
    </div>
    
    <div class="relative z-10">
        <h3 class="text-xl font-bold text-gray-900 mb-3">Dernière Activité</h3>

        <div class="space-y-4">
            <div>
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">MODULE EN COURS</span>
                <h4 class="text-lg font-bold text-gray-900 mt-1 mb-2 line-clamp-2">
                    @if(isset($lastActiveModule))
                        {{ $lastActiveModule->title ?? 'Module Précédent' }}
                    @else
                        Votre parcours n'a pas encore démarré.
                    @endif
                </h4>
                <p class="text-gray-600 text-sm line-clamp-2">
                    @if(isset($lastActiveModule))
                        Reprenez la leçon <strong>{{ $lastActiveLessonName ?? 'en cours' }}</strong> pour avancer.
                    @else
                        Commencez par le premier module pour débloquer toutes les fonctionnalités.
                    @endif
                </p>
            </div>
            
            <div class="pt-3 border-t border-gray-100">
                <a href="{{ route('modules.index') }}" 
                   class="inline-flex items-center justify-center w-full px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-orange-500 hover:bg-orange-600 transition duration-150 shadow-sm">
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

        <!-- Recent Exams Section -->
        @if (isset($recentExams) && $recentExams->isNotEmpty())
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Vos Derniers Examens Blancs</h2>
                <div class="flex items-center text-gray-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm font-medium">Historique des tests</span>
                </div>
            </div>
            <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-200">
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

        <!-- Suggested Modules Section -->
        @if(isset($suggestedModules) && $suggestedModules->isNotEmpty())
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Modules Suggérés</h2>
                <a href="{{ route('modules.index') }}" class="text-green-600 hover:text-green-700 font-medium text-sm flex items-center">
                    Voir tous les modules
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($suggestedModules as $module)
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200">
                    @if($module->image)
                    <img src="{{ asset('storage/' . $module->image) }}" alt="{{ $module->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <span class="text-white text-4xl font-bold">{{ str_pad($module->order, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    @endif
                    <div class="p-6">
                        <div class="text-sm text-green-600 font-medium mb-2">Module {{ $module->order }}</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $module->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $module->description }}</p>
                        <a href="{{ route('modules.show', $module) }}" class="text-green-600 hover:text-green-700 flex items-center font-medium">
                            Commencer le module
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection