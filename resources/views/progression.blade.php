@extends('layouts.app')

@section('title', 'Ma Progression')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-light text-gray-800 italic mb-8">
            Où en sommes nous dans votre apprentissage ?
        </h1>
    </div>

    <!-- Phase théorique -->
    <div class="mb-16">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Phase théorique</h2>
            <span class="text-sm text-gray-600">{{ $progression_theorique }}% complété</span>
        </div>
        
        <!-- Barre de progression théorique -->
        <div class="w-full bg-gray-300 rounded-full h-4 mb-8">
            <div class="bg-gradient-to-r from-green-400 to-green-500 h-4 rounded-full transition-all duration-500 ease-out" 
                 style="width: {{ $progression_theorique }}%;"></div>
        </div>

        <!-- Liste des modules théoriques -->
        <div class="space-y-4">
            @foreach($modules_theoriques as $index => $module)
                @php
                    $user = auth()->user();
                    
                    // Calculer la progression du module
                    $totalCourses = $module->courses()->count();
                    $completedCourses = $module->userProgress()
                        ->where('user_id', $user->id)
                        ->where('completed', true)
                        ->count();
                    
                    $courseProgress = $totalCourses ? ($completedCourses / $totalCourses) * 100 : 0;
                    
                    // Vérifier si le quiz est passé
                    $quiz = $module->quiz()->first();
                    $quizPassed = false;
                    if ($quiz) {
                        $lastResult = $quiz->userResults()
                            ->where('user_id', $user->id)
                            ->latest()
                            ->first();
                        $quizPassed = $lastResult && $lastResult->passed;
                    }
                    
                    // Déterminer le statut du module
                    $moduleCompleted = $courseProgress >= 100 && ($quiz ? $quizPassed : true);
                    $moduleInProgress = $courseProgress > 0 || ($quiz && $quiz->userResults()->where('user_id', $user->id)->exists());
                    
                    // Classes CSS pour l'état
                    $circleClass = $moduleCompleted ? 'bg-green-500 text-white' : 
                                  ($moduleInProgress ? 'bg-green-200 text-green-800 border-2 border-green-500' : 
                                   'bg-gray-200 text-gray-600 border-2 border-gray-300');
                @endphp
                
                <div class="flex items-center py-3">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full {{ $circleClass }} mr-4 font-semibold text-sm">
                        {{ $index }}
                    </div>
                    <div class="flex-1">
                        <h3 class="font-medium text-gray-800 {{ $moduleCompleted ? 'line-through text-gray-500' : '' }}">
                            {{ $module->title }}
                        </h3>
                        @if($moduleInProgress && !$moduleCompleted)
                            <div class="mt-2">
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>Progression</span>
                                    <span>{{ round(($courseProgress + ($quizPassed ? 100 : 0)) / 2) }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-400 h-2 rounded-full" 
                                         style="width: {{ ($courseProgress + ($quizPassed ? 100 : 0)) / 2 }}%;"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>Cours: {{ $completedCourses }}/{{ $totalCourses }}</span>
                                    @if($quiz)
                                        <span>Quiz: {{ $quizPassed ? 'Réussi' : 'À faire' }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($moduleCompleted)
                        <div class="text-green-500 ml-4">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Phase pratique -->
    <div class="mb-16">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Phase pratique</h2>
            <span class="text-sm text-gray-600">{{ $progression_pratique }}% complété</span>
        </div>
        
        <!-- Barre de progression pratique -->
        <div class="w-full bg-gray-300 rounded-full h-4 mb-8">
            <div class="bg-gradient-to-r from-green-400 to-green-500 h-4 rounded-full transition-all duration-500 ease-out" 
                 style="width: {{ $progression_pratique }}%;"></div>
        </div>

        <!-- Liste des modules pratiques -->
        <div class="space-y-4">
            @foreach($modules_pratiques as $index => $module)
                @php
                    $user = auth()->user();
                    
                    // Calculer la progression du module
                    $totalCourses = $module->courses()->count();
                    $completedCourses = $module->userProgress()
                        ->where('user_id', $user->id)
                        ->where('completed', true)
                        ->count();
                    
                    $courseProgress = $totalCourses ? ($completedCourses / $totalCourses) * 100 : 0;
                    
                    // Vérifier si le quiz est passé
                    $quiz = $module->quiz()->first();
                    $quizPassed = false;
                    if ($quiz) {
                        $lastResult = $quiz->userResults()
                            ->where('user_id', $user->id)
                            ->latest()
                            ->first();
                        $quizPassed = $lastResult && $lastResult->passed;
                    }
                    
                    // Déterminer le statut du module
                    $moduleCompleted = $courseProgress >= 100 && ($quiz ? $quizPassed : true);
                    $moduleInProgress = $courseProgress > 0 || ($quiz && $quiz->userResults()->where('user_id', $user->id)->exists());
                    
                    // Classes CSS pour l'état
                    $circleClass = $moduleCompleted ? 'bg-green-500 text-white' : 
                                  ($moduleInProgress ? 'bg-green-200 text-green-800 border-2 border-green-500' : 
                                   'bg-gray-200 text-gray-600 border-2 border-gray-300');
                @endphp
                
                <div class="flex items-center py-3">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full {{ $circleClass }} mr-4 font-semibold text-sm">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex-1">
                        <h3 class="font-medium text-gray-800 {{ $moduleCompleted ? 'line-through text-gray-500' : '' }}">
                            {{ $module->title }}
                        </h3>
                        @if($moduleInProgress && !$moduleCompleted)
                            <div class="mt-2">
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>Progression</span>
                                    <span>{{ round(($courseProgress + ($quizPassed ? 100 : 0)) / 2) }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-400 h-2 rounded-full" 
                                         style="width: {{ ($courseProgress + ($quizPassed ? 100 : 0)) / 2 }}%;"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>Cours: {{ $completedCourses }}/{{ $totalCourses }}</span>
                                    @if($quiz)
                                        <span>Quiz: {{ $quizPassed ? 'Réussi' : 'À faire' }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($moduleCompleted)
                        <div class="text-green-500 ml-4">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Statistiques globales -->
    <div class="bg-gray-50 rounded-lg p-6 mt-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Résumé de votre progression</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-green-500">{{ $progression_theorique }}%</div>
                <div class="text-sm text-gray-600">Phase théorique</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-green-500">{{ $progression_pratique }}%</div>
                <div class="text-sm text-gray-600">Phase pratique</div>
            </div>
            <div class="text-center">
                @php
                    $progressionGlobale = round(($progression_theorique + $progression_pratique) / 2);
                @endphp
                <div class="text-2xl font-bold text-green-500">{{ $progressionGlobale }}%</div>
                <div class="text-sm text-gray-600">Progression globale</div>
            </div>
        </div>
    </div>
</div>
@endsection