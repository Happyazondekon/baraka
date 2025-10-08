@extends('admin.layouts.app')

@section('title', 'Détails du résultat - ' . $result->user->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-900">Détails du résultat</h1>
                <a href="{{ route('admin.users.results', $result->user_id) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium px-4 py-2 rounded-lg transition-colors duration-200 inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour aux résultats
                </a>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 space-y-8">
        <!-- Statistiques des examens de l'utilisateur -->
        @if(isset($examStats))
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Statistiques des examens - {{ $result->user->name }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Taux de réussite global -->
                    <div class="text-center">
                        <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2">{{ $examStats['success_rate'] }}%</div>
                            <div class="text-sm text-gray-600 font-medium">Taux de réussite</div>
                            <div class="text-xs text-gray-500 mt-1">{{ $examStats['passed_exams'] }}/{{ $examStats['total_exams'] }} examens</div>
                        </div>
                    </div>

                    <!-- Score moyen -->
                    <div class="text-center">
                        <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2">{{ $examStats['average_score'] }}%</div>
                            <div class="text-sm text-gray-600 font-medium">Score moyen</div>
                            <div class="text-xs text-gray-500 mt-1">Sur tous les examens</div>
                        </div>
                    </div>

                    <!-- Examens modules -->
                    <div class="text-center">
                        <div class="bg-purple-50 rounded-lg p-4 border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600 mb-2">{{ $examStats['module_exams_success_rate'] }}%</div>
                            <div class="text-sm text-gray-600 font-medium">Modules réussis</div>
                            <div class="text-xs text-gray-500 mt-1">{{ $examStats['module_exams_count'] }} examens</div>
                        </div>
                    </div>

                    <!-- Examens blancs -->
                    <div class="text-center">
                        <div class="bg-orange-50 rounded-lg p-4 border border-orange-200">
                            <div class="text-3xl font-bold text-orange-600 mb-2">{{ $examStats['mock_exams_success_rate'] }}%</div>
                            <div class="text-sm text-gray-600 font-medium">Examens blancs</div>
                            <div class="text-xs text-gray-500 mt-1">{{ $examStats['mock_exams_count'] }} examens</div>
                        </div>
                    </div>
                </div>

                <!-- Barre de progression détaillée -->
                <div class="mt-6">
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>Progression globale</span>
                        <span>{{ $examStats['success_rate'] }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-blue-500 h-3 rounded-full" style="width: {{ $examStats['success_rate'] }}%"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informations générales</h2>
                    <p class="text-sm text-gray-600 mb-2"><strong>Utilisateur :</strong> {{ $result->user->name }}</p>
                    <p class="text-sm text-gray-600 mb-2"><strong>Email :</strong> {{ $result->user->email }}</p>
                    <p class="text-sm text-gray-600 mb-2">
                        <strong>Type d'examen :</strong> 
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $result->quiz->is_mock_exam ? 'bg-orange-100 text-orange-800' : 'bg-purple-100 text-purple-800' }}">
                            {{ $result->quiz->is_mock_exam ? 'Examen Blanc' : 'Module' }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-600 mb-2">
                        <strong>Module :</strong> 
                        @if($result->quiz->module)
                            {{ $result->quiz->module->title }}
                        @else
                            Examen blanc
                        @endif
                    </p>
                    <p class="text-sm text-gray-600 mb-2"><strong>Quiz :</strong> {{ $result->quiz->title }}</p>
                    <p class="text-sm text-gray-600"><strong>Date :</strong> {{ $result->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 text-center">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Performance</h2>
                    <div class="text-5xl font-extrabold mb-2 {{ $result->passed ? 'text-green-600' : 'text-red-600' }}">
                        {{ $result->score }}%
                    </div>
                    <div class="mt-2">
                        <span class="px-3 py-1 rounded-full text-lg font-bold {{ $result->passed ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $result->passed ? 'RÉUSSI' : 'ÉCHOUÉ' }}
                        </span>
                    </div>
                    <div class="mt-4 text-sm text-gray-600">
                        <p class="mb-1">{{ $result->correct_answers }} / {{ $result->total_questions }} réponses correctes</p>
                        <p class="mb-0">Temps passé: {{ gmdate('i:s', $result->time_taken) }} minutes</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section détaillée des questions et réponses avec le même design que show.blade.php -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl lg:text-3xl font-bold mb-2">Correction Détaillée</h3>
                        <p class="text-blue-100 text-lg">Cliquez sur chaque question pour voir l'analyse complète</p>
                    </div>
                    <div class="hidden lg:block">
                        <div class="bg-white bg-opacity-20 rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold">{{ $result->total_questions }}</div>
                            <div class="text-sm opacity-90">Questions</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                @if($result->detailed_results && is_array($result->detailed_results))
                    <div class="space-y-6">
                        @foreach($result->detailed_results as $index => $resultItem)
                        @php
                            // Récupérer la question complète depuis la base de données
                            $question = $result->quiz->questions->where('id', $resultItem['question_id'])->first();
                            $userAnswerIds = $resultItem['user_answer_ids'] ?? [];
                            
                            // Assurer que toutes les clés existent avec des valeurs par défaut
                            $resultItem = array_merge([
                                'question_text' => '',
                                'image' => null,
                                'is_correct' => false,
                                'is_multiple_choice' => false,
                                'user_answers_text' => [],
                                'correct_answers_text' => [],
                                'explanation' => null
                            ], $resultItem);
                        @endphp
                        
                        {{-- Conteneur de question cliquable pour déplier --}}
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-0 border-2 {{ $resultItem['is_correct'] ? 'border-green-200' : 'border-red-200' }} shadow-sm hover:shadow-md transition-all duration-300 question-toggle-container">

                            {{-- EN-TÊTE CLIQUABLE --}}
                            <button type="button" 
                                    class="w-full text-left p-6 flex items-center justify-between focus:outline-none transition-all duration-300 hover:bg-gray-100/50"
                                    onclick="toggleQuizCorrection('{{ $index }}')">
                                
                                <div class="flex items-start flex-1 pr-4">
                                    <div class="flex-shrink-0 mr-4">
                                        @if($resultItem['is_correct'])
                                        <div class="bg-green-500 text-white rounded-xl w-10 h-10 flex items-center justify-center text-lg font-bold shadow-md">
                                            ✓
                                        </div>
                                        @else
                                        <div class="bg-red-500 text-white rounded-xl w-10 h-10 flex items-center justify-center text-lg font-bold shadow-md">
                                            ✗
                                        </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-800 mb-1 text-lg leading-snug">
                                            Question {{ $index + 1 }}: {{ $resultItem['question_text'] }}
                                        </p>
                                        <span class="text-sm {{ $resultItem['is_correct'] ? 'text-green-600' : 'text-red-600' }} font-bold">
                                            {{ $resultItem['is_correct'] ? 'Réponse Correcte' : 'Réponse Incorrecte' }}
                                        </span>
                                    </div>
                                </div>

                                <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 quiz-chevron-icon-{{ $index }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            {{-- DÉTAIL DE LA CORRECTION (MASQUÉ PAR DÉFAUT) --}}
                            <div id="quiz-correction-details-{{ $index }}" class="hidden p-6 pt-0 border-t border-gray-200">
                                
                                {{-- Image de la question --}}
                                @if($question && $question->image)
                                <div class="mb-4">
                                    <img src="{{ asset('storage/' . $question->image) }}" 
                                         alt="Image de la question" 
                                         class="max-h-64 w-auto rounded-lg shadow-md object-contain border border-gray-300">
                                </div>
                                @endif
                                
                                @if($resultItem['is_multiple_choice'])
                                <div class="mb-3">
                                    <span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-md">
                                        Question à réponses multiples
                                    </span>
                                </div>
                                @endif
                                
                                <div class="space-y-4 my-4">
                                    <div class="bg-{{ $resultItem['is_correct'] ? 'green' : 'red' }}-100 border border-{{ $resultItem['is_correct'] ? 'green' : 'red' }}-300 rounded-lg p-4">
                                        <div class="flex items-center text-{{ $resultItem['is_correct'] ? 'green' : 'red' }}-800 font-medium mb-2">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                @if($resultItem['is_correct'])
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                @else
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                @endif
                                            </svg>
                                            {{ $resultItem['is_correct'] ? 'Vos réponses correctes' : 'Vos réponses' }} :
                                        </div>
                                        <div class="text-{{ $resultItem['is_correct'] ? 'green' : 'red' }}-700">
                                            @if(is_array($resultItem['user_answers_text']) && count($resultItem['user_answers_text']) > 0)
                                                {{ implode(', ', $resultItem['user_answers_text']) }}
                                            @else
                                                <span class="italic">Aucune réponse sélectionnée</span>
                                            @endif
                                        </div>
                                    </div>

                                    @if(!$resultItem['is_correct'])
                                    <div class="bg-green-100 border border-green-300 rounded-lg p-4">
                                        <div class="flex items-center text-green-800 font-medium mb-2">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            Bonnes réponses :
                                        </div>
                                        <div class="text-green-700">
                                            @if(is_array($resultItem['correct_answers_text']))
                                                {{ implode(', ', $resultItem['correct_answers_text']) }}
                                            @else
                                                {{ $resultItem['correct_answers_text'] }}
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                @if($question)
                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-700 mb-3">Détail de toutes les options :</h4>
                                    <div class="space-y-3">
                                        @php
                                            $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                                        @endphp
                                        @foreach($question->answers as $answerIndex => $answer)
                                        @php
                                            $isUserAnswer = in_array($answer->id, $userAnswerIds);
                                            $isCorrectAnswer = $answer->is_correct;
                                        @endphp
                                        <div class="flex items-start p-4 rounded-xl border-2 
                                            {{ $isUserAnswer && $isCorrectAnswer ? 'border-green-500 bg-green-50' : '' }}
                                            {{ $isUserAnswer && !$isCorrectAnswer ? 'border-red-500 bg-red-50' : '' }}
                                            {{ !$isUserAnswer && $isCorrectAnswer ? 'border-green-300 bg-green-25' : '' }}
                                            {{ !$isUserAnswer && !$isCorrectAnswer ? 'border-gray-200' : '' }}
                                            transition-all duration-300">
                                            <div class="flex items-start flex-1">
                                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg 
                                                    {{ $isUserAnswer && $isCorrectAnswer ? 'bg-green-500 text-white' : '' }}
                                                    {{ $isUserAnswer && !$isCorrectAnswer ? 'bg-red-500 text-white' : '' }}
                                                    {{ !$isUserAnswer && $isCorrectAnswer ? 'bg-green-300 text-green-800' : '' }}
                                                    {{ !$isUserAnswer && !$isCorrectAnswer ? 'bg-gray-100 text-gray-600' : '' }}
                                                    font-bold text-sm mr-4 flex-shrink-0 shadow-sm">
                                                    {{ $letters[$answerIndex] }}
                                                </span>
                                                <span class="text-gray-700 leading-relaxed font-medium flex-1">
                                                    {{ $answer->answer_text }}
                                                    @if($isUserAnswer && $isCorrectAnswer)
                                                    <span class="ml-2 text-green-600 font-semibold">✓ Réponse correcte de l'utilisateur</span>
                                                    @elseif($isUserAnswer && !$isCorrectAnswer)
                                                    <span class="ml-2 text-red-600 font-semibold">✗ Réponse incorrecte de l'utilisateur</span>
                                                    @elseif(!$isUserAnswer && $isCorrectAnswer)
                                                    <span class="ml-2 text-green-600 font-semibold">✓ Bonne réponse</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                
                                {{-- Explication --}}
                                @if($question && $question->explanation)
                                <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                                    <div class="flex items-start">
                                        <div class="bg-blue-100 text-blue-600 rounded-lg p-2 mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-blue-800 mb-2">Explication</h4>
                                            <p class="text-blue-700 leading-relaxed">{{ $question->explanation }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-8 p-6 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl text-white shadow-lg">
                        <div class="flex flex-col lg:flex-row items-center justify-between text-center lg:text-left">
                            <div class="mb-4 lg:mb-0">
                                <div class="text-3xl font-bold mb-2">{{ $result->score }}%</div>
                                <div class="text-blue-100">Score final</div>
                            </div>
                            <div class="text-lg">
                                <div class="font-semibold">{{ $result->correct_answers }}/{{ $result->total_questions }} réponses correctes</div>
                                <div class="text-blue-100 text-sm mt-1">Taux de réussite</div>
                            </div>
                            <div class="mt-4 lg:mt-0">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    @if($result->passed)
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    @else
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                                    </svg>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                        Les détails des réponses ne sont pas disponibles pour ce résultat.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
// Fonction pour toggle les corrections de quiz (dépliables)
function toggleQuizCorrection(index) {
    const details = document.getElementById('quiz-correction-details-' + index);
    const icon = document.querySelector('.quiz-chevron-icon-' + index);

    if (details.classList.contains('hidden')) {
        // Afficher les détails
        details.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        // Masquer les détails
        details.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}

</script>

<style>
.rotate-180 {
    transform: rotate(180deg);
}

.bg-green-25 {
    background-color: rgba(187, 247, 208, 0.3);
}

.question-toggle-container {
    transition: all 0.3s ease;
}

.question-toggle-container:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>

@endsection