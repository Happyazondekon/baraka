@extends('layouts.app')

@section('title', $module->title ?? 'Module')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Breadcrumb -->
    <div class="mb-4">
        <a href="{{ route('modules.index') }}" class="text-gray-600 hover:text-gray-800 text-sm flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Tous les modules
        </a>
    </div>

    <!-- Header Section avec style AutoPermis -->
    <div class="bg-gradient-to-r from-green-100 to-green-200 rounded-2xl p-8 mb-8 relative overflow-hidden">
        <div class="flex justify-between items-center relative z-10">
            <div class="flex-1">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Phase théorique : Code de la route</h1>
                <h2 class="text-xl font-semibold text-gray-700 mb-3">{{ $module->title }}</h2>
                <p class="text-gray-600 leading-relaxed max-w-lg">{{ $module->description }}</p>
            </div>
            
            <!-- Cercle avec numéro du module -->
            <div class="bg-white rounded-full w-32 h-32 flex flex-col items-center justify-center shadow-lg ml-8">
                <div class="text-3xl font-bold text-gray-800">
                    {{ str_pad($module->order, 2, '0', STR_PAD_LEFT) }} / {{ $totalModules ?? '08' }}
                </div>
                <div class="text-sm text-gray-600 mt-1">Modules</div>
            </div>
        </div>
        
        <!-- Decoration circles -->
        <div class="absolute top-4 right-4 w-20 h-20 bg-white bg-opacity-20 rounded-full"></div>
        <div class="absolute bottom-6 right-16 w-12 h-12 bg-white bg-opacity-15 rounded-full"></div>
    </div>

    <!-- Module Title avec numérotation -->
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-center text-gray-800">
            Module {{ $module->order }} : {{ $module->title }}
        </h3>
    </div>

    <!-- Video/Image Section -->
    @if($module->video_url || $module->image)
    <div class="mb-8">
        <div class="relative bg-black rounded-xl overflow-hidden shadow-lg">
            @if($module->video_url)
                <video controls class="w-full h-80 object-cover">
                    <source src="{{ $module->video_url }}" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéos.
                </video>
                <!-- Play button overlay pour style -->
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="bg-white bg-opacity-20 rounded-full p-6">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
            @else
                <img src="{{ $module->image }}" alt="{{ $module->title }}" class="w-full h-80 object-cover">
            @endif
        </div>
    </div>
    @endif

    <!-- Button "Allons plus en détail" -->
    <div class="text-center mb-8">
        <button class="text-gray-700 font-medium hover:text-gray-900 transition-colors">
            Allons plus en détail !
        </button>
    </div>

    <!-- Contenu des cours dans un style card -->
    @if($module->courses->isNotEmpty())
    <div class="bg-green-50 rounded-2xl p-6 mb-8">
        <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Les Types de Signalisations
        </h4>
        
        @foreach($module->courses as $course)
        <div class="mb-6">
            <h5 class="font-medium text-gray-800 mb-2 flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                </svg>
                {{ $course->title }}
            </h5>
            <div class="text-sm text-gray-600 ml-6 space-y-1">
                <p>{{ $course->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif

   <!-- Section Quiz/Test -->
@if($module->quiz)
<div class="bg-white rounded-2xl p-6 shadow-sm border mb-8">
    <h3 class="text-xl font-semibold text-center text-gray-800 mb-6">Test de Validation (QCM)</h3>
    
    <!-- Messages de succès/erreur -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 relative" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <div>
                <strong class="font-bold">Quiz validé avec succès !</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
        @if(session('quiz_result_id'))
        <div class="mt-3">
            <button onclick="toggleResults()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-medium">
                Voir les bonnes réponses
            </button>
        </div>
        @endif
    </div>
    @endif

    @if(session('warning'))
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6 relative" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <div>
                <strong class="font-bold">Attention !</strong>
                <span class="block sm:inline">{{ session('warning') }}</span>
            </div>
        </div>
        @if(session('quiz_result_id'))
        <div class="mt-3">
            <button onclick="toggleResults()" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded text-sm font-medium">
                Voir les bonnes réponses
            </button>
        </div>
        @endif
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 relative" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <div>
                <strong class="font-bold">Erreur !</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Affichage des résultats détaillés (caché par défaut) -->
    @if(session('quiz_result_id') && session('detailed_results'))
    <div id="resultsSection" class="hidden mb-6">
        <div class="bg-gray-50 rounded-lg p-4">
            <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                </svg>
                Correction du Quiz
            </h4>
            
            @foreach(session('detailed_results') as $index => $result)
            <div class="mb-4 p-4 border rounded-lg {{ $result['is_correct'] ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200' }}">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-3">
                        @if($result['is_correct'])
                        <div class="bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-medium">
                            ✓
                        </div>
                        @else
                        <div class="bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-medium">
                            ✗
                        </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800 mb-2">
                            Question {{ $index + 1 }}: {{ $result['question_text'] }}
                        </p>
                        
                        @if($result['is_correct'])
                        <div class="text-green-700 text-sm">
                            <strong>✓ Correct :</strong> {{ $result['user_answer_text'] }}
                        </div>
                        @else
                        <div class="space-y-1 text-sm">
                            <div class="text-red-700">
                                <strong>✗ Votre réponse :</strong> {{ $result['user_answer_text'] ?? 'Aucune réponse' }}
                            </div>
                            <div class="text-green-700">
                                <strong>✓ Bonne réponse :</strong> {{ $result['correct_answer_text'] }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            
            <!-- Résumé des résultats -->
            <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-blue-800 font-medium">Score final :</span>
                        <span class="text-blue-900 font-bold text-lg ml-2">{{ session('quiz_score') }}%</span>
                    </div>
                    <div>
                        <span class="text-blue-800">{{ session('quiz_correct_answers') }}/{{ session('quiz_total_questions') }} correctes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <!-- Formulaire du quiz (caché si déjà validé) -->
    <div id="quizForm" class="{{ session('quiz_result_id') && !session('error') ? 'hidden' : '' }}">
        <form action="{{ route('modules.quiz.submit', $module) }}" method="POST" onsubmit="return handleQuizSubmit(event)">
            @csrf
            <input type="hidden" name="time_taken" id="timeTaken" value="0">
            
            <div class="space-y-6">
                @foreach($module->quiz->questions as $index => $question)
                <div class="border-l-4 border-green-500 pl-4">
                    <div class="flex items-start">
                        <div class="bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-medium mr-3 mt-1">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800 mb-3">{{ $question->question_text }}</p>
                            
                            <div class="space-y-2">
                                @foreach($question->answers as $answer)
                                <label class="flex items-center space-x-3 p-2 rounded hover:bg-gray-50 cursor-pointer">
                                    <input type="radio" 
                                           name="answers[{{ $question->id }}]" 
                                           value="{{ $answer->id }}" 
                                           class="text-green-500"
                                           required>
                                    <span class="text-gray-700">{{ $answer->answer_text }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Bouton de validation -->
            <div class="text-center mt-8">
                <button type="submit" 
                        id="submitBtn"
                        class="bg-green-500 hover:bg-green-600 text-white font-medium px-8 py-3 rounded-lg transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">
                    <span id="btnText">Valider mes réponses</span>
                    <span id="btnSpinner" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Validation en cours...
                    </span>
                </button>
            </div>
        </form>
    </div>

    <!-- Bouton pour reprendre le quiz -->
    @if(session('quiz_result_id'))
    <div class="text-center mt-6">
        <button onclick="retakeQuiz()" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-lg transition-colors">
            Reprendre le quiz
        </button>
    </div>
    @endif

    <!-- Message de fin -->
    <div class="text-center mt-6">
        <p class="text-sm text-gray-600">Fiche récapitulatif du module !</p>
    </div>
</div>

<script>
// Timer pour mesurer le temps passé sur le quiz
let startTime = Date.now();
let formSubmitted = false;

// Fonction pour gérer la soumission du formulaire
function handleQuizSubmit(event) {
    if (formSubmitted) {
        event.preventDefault();
        return false;
    }

    // Calculer le temps passé
    const timeSpent = Math.floor((Date.now() - startTime) / 1000);
    document.getElementById('timeTaken').value = timeSpent;

    // Vérifier que toutes les questions ont une réponse
    const questions = {{ $module->quiz->questions->count() }};
    const answeredQuestions = document.querySelectorAll('input[type="radio"]:checked').length;
    
    if (answeredQuestions < questions) {
        event.preventDefault();
        alert('Veuillez répondre à toutes les questions avant de valider.');
        return false;
    }

    // Désactiver le bouton et afficher le spinner
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    
    if (submitBtn && btnText && btnSpinner) {
        submitBtn.disabled = true;
        btnText.classList.add('hidden');
        btnSpinner.classList.remove('hidden');
    }
    
    formSubmitted = true;
    return true;
}

// Fonction pour afficher/masquer les résultats
function toggleResults() {
    const resultsSection = document.getElementById('resultsSection');
    if (resultsSection) {
        if (resultsSection.classList.contains('hidden')) {
            resultsSection.classList.remove('hidden');
            resultsSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
            resultsSection.classList.add('hidden');
        }
    }
}

// Fonction pour reprendre le quiz
function retakeQuiz() {
    if (confirm('Êtes-vous sûr de vouloir reprendre le quiz ? Vos réponses précédentes seront perdues.')) {
        // Réinitialiser le timer
        startTime = Date.now();
        formSubmitted = false;
        
        // Masquer les résultats et afficher le formulaire
        const resultsSection = document.getElementById('resultsSection');
        const quizFormSection = document.getElementById('quizForm');
        
        if (resultsSection) resultsSection.classList.add('hidden');
        if (quizFormSection) quizFormSection.classList.remove('hidden');
        
        // Réinitialiser le formulaire
        const form = document.querySelector('form');
        if (form) {
            form.reset();
        }
        
        // Réactiver le bouton de soumission
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnSpinner = document.getElementById('btnSpinner');
        
        if (submitBtn && btnText && btnSpinner) {
            submitBtn.disabled = false;
            btnText.classList.remove('hidden');
            btnSpinner.classList.add('hidden');
        }
        
        // Faire défiler vers le quiz
        document.getElementById('quizForm').scrollIntoView({ behavior: 'smooth' });
        
        // Supprimer les données de session (rafraîchir la page)
        window.location.href = window.location.href;
    }
}

// Auto-scroll vers les résultats si ils existent
document.addEventListener('DOMContentLoaded', function() {
    @if(session('quiz_result_id'))
    setTimeout(function() {
        const successMessage = document.querySelector('.bg-green-100');
        if (successMessage) {
            successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }, 500);
    @endif
});
</script>
@endif

    <!-- Navigation -->
    <div class="flex justify-between items-center mt-8">
        @if($previousModule)
        <a href="{{ route('modules.show', $previousModule->id) }}" class="text-gray-600 hover:text-gray-800 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Module précédent
        </a>
        @else
        <div></div>
        @endif

        @if($nextModule)
        <a href="{{ route('modules.show', $nextModule->id) }}" class="text-gray-600 hover:text-gray-800 flex items-center">
            Module suivant
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        @else
        <div></div>
        @endif
    </div>
</div>
@endsection