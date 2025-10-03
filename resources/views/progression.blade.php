@extends('layouts.app')

@section('title', 'Ma Progression')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="bg-white rounded-3xl shadow-lg border border-green-100 p-8 mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    Votre Progression d'Apprentissage
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Suivez votre parcours vers la maîtrise du code de la route
                </p>
            </div>
        </div>

        <!-- Global Progress Overview -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-12">
            <!-- Theoretical Phase Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-green-200 p-6 text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Phase Théorique</h3>
                <div class="text-3xl font-bold text-green-600 mb-3">{{ $progression_theorique }}%</div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-3 rounded-full transition-all duration-1000 ease-out" 
                         style="width: {{ $progression_theorique }}%;"></div>
                </div>
            </div>

            <!-- Practical Phase Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-6 text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Phase Pratique</h3>
                <div class="text-3xl font-bold text-blue-600 mb-3">{{ $progression_pratique }}%</div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-3 rounded-full transition-all duration-1000 ease-out" 
                         style="width: {{ $progression_pratique }}%;"></div>
                </div>
            </div>

            <!-- Global Progress Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-purple-200 p-6 text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Progression Globale</h3>
                @php
                    $progressionGlobale = round(($progression_theorique + $progression_pratique) / 2);
                @endphp
                <div class="text-3xl font-bold text-purple-600 mb-3">{{ $progressionGlobale }}%</div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-purple-400 to-purple-500 h-3 rounded-full transition-all duration-1000 ease-out" 
                         style="width: {{ $progressionGlobale }}%;"></div>
                </div>
            </div>
        </div>

        <!-- Theoretical Phase Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-green-100 overflow-hidden mb-12">
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">Phase Théorique</h2>
                        <p class="text-green-100">Apprentissage des règles fondamentales</p>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold">{{ $progression_theorique }}%</div>
                        <div class="text-green-200 text-sm">Complétée</div>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>Progression globale de la phase</span>
                        <span>{{ $progression_theorique }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                             style="width: {{ $progression_theorique }}%;"></div>
                    </div>
                </div>

                <!-- Modules List -->
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
                            $statusColor = $moduleCompleted ? 'bg-green-500' : 
                                          ($moduleInProgress ? 'bg-yellow-500' : 'bg-gray-300');
                            $textColor = $moduleCompleted ? 'text-green-600' : 
                                        ($moduleInProgress ? 'text-yellow-600' : 'text-gray-500');
                        @endphp
                        
                        <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4 flex-1">
                                    <!-- Module Number -->
                                    <div class="flex flex-col items-center">
                                        <div class="w-12 h-12 {{ $statusColor }} text-white rounded-xl flex items-center justify-center font-bold text-lg shadow-md">
                                            {{ $index + 1 }}
                                        </div>
                                        @if($moduleCompleted)
                                        <div class="mt-2 bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                            Terminé
                                        </div>
                                        @elseif($moduleInProgress)
                                        <div class="mt-2 bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">
                                            En cours
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Module Content -->
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold text-gray-800 mb-2 {{ $moduleCompleted ? 'line-through' : '' }}">
                                            {{ $module->title }}
                                        </h3>
                                        <p class="text-gray-600 mb-4">{{ $module->description }}</p>
                                        
                                        <!-- Detailed Progress -->
                                        @if($moduleInProgress && !$moduleCompleted)
                                        <div class="space-y-3">
                                            <!-- Courses Progress -->
                                            <div>
                                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                                    <span class="font-medium">Leçons</span>
                                                    <span>{{ $completedCourses }}/{{ $totalCourses }} complétées</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="bg-green-400 h-2 rounded-full transition-all duration-500" 
                                                         style="width: {{ $courseProgress }}%;"></div>
                                                </div>
                                            </div>
                                            
                                            <!-- Quiz Status -->
                                            @if($quiz)
                                            <div>
                                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                                    <span class="font-medium">Quiz de validation</span>
                                                    <span class="{{ $quizPassed ? 'text-green-600 font-medium' : 'text-yellow-600' }}">
                                                        {{ $quizPassed ? '✅ Réussi' : '⏳ À faire' }}
                                                    </span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="ml-4">
                                    <a href="{{ route('modules.show', $module->id) }}" 
                                       class="inline-flex items-center bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-medium px-4 py-2 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        @if($moduleCompleted)
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Revoir
                                        @else
                                        Continuer
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Practical Phase Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-blue-100 overflow-hidden mb-12">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">Phase Pratique</h2>
                        <p class="text-blue-100">Application des connaissances en situation réelle</p>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold">{{ $progression_pratique }}%</div>
                        <div class="text-blue-200 text-sm">Complétée</div>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>Progression globale de la phase</span>
                        <span>{{ $progression_pratique }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                             style="width: {{ $progression_pratique }}%;"></div>
                    </div>
                </div>

                <!-- Modules List -->
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
                            $statusColor = $moduleCompleted ? 'bg-green-500' : 
                                          ($moduleInProgress ? 'bg-yellow-500' : 'bg-gray-300');
                            $textColor = $moduleCompleted ? 'text-green-600' : 
                                        ($moduleInProgress ? 'text-yellow-600' : 'text-gray-500');
                        @endphp
                        
                        <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4 flex-1">
                                    <!-- Module Number -->
                                    <div class="flex flex-col items-center">
                                        <div class="w-12 h-12 {{ $statusColor }} text-white rounded-xl flex items-center justify-center font-bold text-lg shadow-md">
                                            {{ $index + 1 }}
                                        </div>
                                        @if($moduleCompleted)
                                        <div class="mt-2 bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                            Terminé
                                        </div>
                                        @elseif($moduleInProgress)
                                        <div class="mt-2 bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">
                                            En cours
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Module Content -->
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold text-gray-800 mb-2 {{ $moduleCompleted ? 'line-through' : '' }}">
                                            {{ $module->title }}
                                        </h3>
                                        <p class="text-gray-600 mb-4">{{ $module->description }}</p>
                                        
                                        <!-- Detailed Progress -->
                                        @if($moduleInProgress && !$moduleCompleted)
                                        <div class="space-y-3">
                                            <!-- Courses Progress -->
                                            <div>
                                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                                    <span class="font-medium">Leçons</span>
                                                    <span>{{ $completedCourses }}/{{ $totalCourses }} complétées</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="bg-blue-400 h-2 rounded-full transition-all duration-500" 
                                                         style="width: {{ $courseProgress }}%;"></div>
                                                </div>
                                            </div>
                                            
                                            <!-- Quiz Status -->
                                            @if($quiz)
                                            <div>
                                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                                    <span class="font-medium">Quiz de validation</span>
                                                    <span class="{{ $quizPassed ? 'text-green-600 font-medium' : 'text-yellow-600' }}">
                                                        {{ $quizPassed ? '✅ Réussi' : '⏳ À faire' }}
                                                    </span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="ml-4">
                                    <a href="{{ route('modules.show', $module->id) }}" 
                                       class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium px-4 py-2 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        @if($moduleCompleted)
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Revoir
                                        @else
                                        Continuer
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Motivation Section -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-3xl p-8 text-center text-white shadow-xl">
            <h3 class="text-2xl font-bold mb-4">Continuez votre apprentissage !</h3>
            <p class="text-purple-100 text-lg mb-6">
                Vous avez complété {{ $progressionGlobale }}% de votre formation. 
                @if($progressionGlobale >= 80)
                Vous êtes bientôt au bout de votre parcours !
                @elseif($progressionGlobale >= 50)
                Vous avez déjà parcouru plus de la moitié du chemin !
                @else
                Bon début, continuez sur cette lancée !
                @endif
            </p>
            <a href="{{ route('modules.index') }}" 
               class="inline-flex items-center bg-white text-purple-600 hover:bg-gray-100 font-bold px-8 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                Reprendre l'apprentissage
            </a>
        </div>
    </div>
</div>
@endsection