@extends('layouts.app')

@section('title', 'Résultats Détaillés - Examen Code de la Route')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8">
    <div class="container mx-auto px-4 max-w-6xl">
        {{-- Logique pour l'affichage : le score est considéré comme 'Réussi' si le score est >= 70% --}}
        @php
            // La variable $display_passed est TRUE si le score est de 70 ou plus.
            $display_passed = $result->score >= 70;
            
            // Nouvelles variables pour regrouper les non répondues avec les incorrectes pour l'affichage des stats
            $display_correct_answers = $result->correct_answers;
            // Incorrectes = Total - Correctes
            $display_wrong_answers = $result->total_questions - $result->correct_answers;
        @endphp

        <div class="mb-8">
            <a href="{{ route('examens.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors group">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour aux examens blancs
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-8 border border-blue-200">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white bg-opacity-10 rounded-full -translate-y-32 translate-x-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white bg-opacity-10 rounded-full translate-y-24 -translate-x-24"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between">
                    <div class="flex-1 text-white mb-6 lg:mb-0">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-white bg-opacity-20 text-sm font-medium mb-4">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Résultats Détaillés
                        </div>
                        <h1 class="text-3xl lg:text-4xl font-bold mb-3">Correction de l'Examen</h1>
                        <h2 class="text-xl lg:text-2xl font-semibold opacity-95 mb-4">Analyse complète de vos réponses</h2>
                        <p class="text-blue-100 text-lg leading-relaxed max-w-2xl">
                            Consultez le détail de chaque question avec les bonnes réponses et les explications.
                        </p>
                    </div>
                    
                    {{-- Utilisation de $display_passed pour la couleur et le statut --}}
                    <div class="bg-white rounded-2xl p-6 text-center shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <div class="text-4xl font-bold {{ $display_passed ? 'text-green-600' : 'text-red-600' }} mb-2">
                            {{ $result->score }}<span class="text-2xl text-gray-500">%</span>
                        </div>
                        <div class="text-sm text-gray-600 font-medium">
                            {{ $display_passed ? 'Réussi' : 'Échoué' }}
                        </div>
                        <div class="w-24 h-1 {{ $display_passed ? 'bg-gradient-to-r from-green-400 to-green-500' : 'bg-gradient-to-r from-red-400 to-red-500' }} rounded-full mx-auto mt-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center">
                    <div class="bg-blue-100 text-blue-600 rounded-xl p-3 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        {{-- Utilisation de la variable adaptée --}}
                        <div class="text-2xl font-bold text-gray-800">{{ $display_correct_answers }}</div>
                        <div class="text-sm text-gray-600">Bonnes réponses</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center">
                    <div class="bg-red-100 text-red-600 rounded-xl p-3 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <div>
                        {{-- Utilisation de la variable adaptée --}}
                        <div class="text-2xl font-bold text-gray-800">{{ $display_wrong_answers }}</div>
                        <div class="text-sm text-gray-600">Mauvaises réponses</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <div class="flex items-center">
                    <div class="bg-purple-100 text-purple-600 rounded-xl p-3 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-800">{{ gmdate('i:s', $result->time_taken) }}</div>
                        <div class="text-sm text-gray-600">Temps passé</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 border border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <span class="text-lg font-semibold text-gray-800">Score obtenu</span>
                <span class="text-lg font-bold {{ $display_passed ? 'text-green-600' : 'text-red-600' }}">
                    {{ $result->score }}% 
                    <span class="text-sm font-normal text-gray-600">
                        ({{ $result->correct_answers }}/{{ $result->total_questions }})
                    </span>
                </span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                {{-- Utilisation de $display_passed ici aussi --}}
                <div class="h-4 rounded-full transition-all duration-1000 ease-out {{ $display_passed ? 'bg-gradient-to-r from-green-400 to-green-500' : 'bg-gradient-to-r from-red-400 to-red-500' }}" 
                     style="width: {{ $result->score }}%"></div>
            </div>
            <div class="flex justify-between text-sm text-gray-500">
                <span>0%</span>
                <span class="{{ $display_passed ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                    Seuil : 70%
                </span>
                <span>100%</span>
            </div>
        </div>

        <!-- Section de correction détaillée inspirée de show.blade.php -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl lg:text-3xl font-bold mb-2">Correction Détaillée</h3>
                        <p class="text-blue-100 text-lg">Analyse question par question de votre performance</p>
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
                @php
                    $detailedResults = [];
                    foreach($questions as $index => $question) {
                        $userAnswerIds = $userAnswers[$question->id] ?? [];
                        $correctAnswerIds = $question->answers->where('is_correct', true)->pluck('id')->toArray();
                        $isCorrect = empty(array_diff($correctAnswerIds, $userAnswerIds)) && empty(array_diff($userAnswerIds, $correctAnswerIds));
                        
                        $userAnswersText = [];
                        $correctAnswersText = [];
                        
                        foreach($question->answers as $answer) {
                            if(in_array($answer->id, $userAnswerIds)) {
                                $userAnswersText[] = $answer->answer_text;
                            }
                            if($answer->is_correct) {
                                $correctAnswersText[] = $answer->answer_text;
                            }
                        }
                        
                        $detailedResults[] = [
                            'question_text' => $question->question_text,
                            'image' => $question->image,
                            'is_correct' => $isCorrect,
                            'is_multiple_choice' => count($correctAnswerIds) > 1,
                            'user_answers_text' => $userAnswersText,
                            'correct_answers_text' => $correctAnswersText,
                            'explanation' => $question->explanation
                        ];
                    }
                @endphp
                
                <div class="space-y-6">
                    @foreach($detailedResults as $index => $resultItem)
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border-2 {{ $resultItem['is_correct'] ? 'border-green-200' : 'border-red-200' }} shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="flex items-start mb-4">
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
                                @if($resultItem['image'])
                                <div class="mb-4">
                                    <img src="{{ asset('storage/' . $resultItem['image']) }}" 
                                         alt="Image de la question" 
                                         class="max-h-64 w-auto rounded-lg shadow-md object-contain border border-gray-300">
                                </div>
                                @endif
                                
                                <p class="font-semibold text-gray-800 mb-3 text-lg">
                                    Question {{ $index + 1 }}: {{ $resultItem['question_text'] }}
                                </p>
                                
                                @if($resultItem['is_multiple_choice'])
                                <div class="mb-3">
                                    <span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-md">
                                        Question à réponses multiples
                                    </span>
                                </div>
                                @endif
                                
                                @if($resultItem['is_correct'])
                                <div class="bg-green-100 border border-green-300 rounded-lg p-4">
                                    <div class="flex items-center text-green-800 font-medium mb-2">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        Vos réponses correctes :
                                    </div>
                                    <div class="text-green-700">
                                        @if(is_array($resultItem['user_answers_text']))
                                            {{ implode(', ', $resultItem['user_answers_text']) }}
                                        @else
                                            {{ $resultItem['user_answers_text'] }}
                                        @endif
                                    </div>
                                </div>
                                @else
                                <div class="space-y-3">
                                    <div class="bg-red-100 border border-red-300 rounded-lg p-4">
                                        <div class="flex items-center text-red-800 font-medium mb-2">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                            Vos réponses :
                                        </div>
                                        <div class="text-red-700">
                                            @if(is_array($resultItem['user_answers_text']) && count($resultItem['user_answers_text']) > 0)
                                                {{ implode(', ', $resultItem['user_answers_text']) }}
                                            @else
                                                Aucune réponse sélectionnée
                                            @endif
                                        </div>
                                    </div>
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
                                </div>
                                @endif
                                
                                @if($resultItem['explanation'])
                                <div class="mt-4 bg-blue-50 border border-blue-200 rounded-lg p-4">
                                    <div class="flex items-start">
                                        <div class="bg-blue-100 text-blue-600 rounded-lg p-2 mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-blue-800 mb-2">Explication</h4>
                                            <p class="text-blue-700 leading-relaxed">{{ $resultItem['explanation'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-12 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-200 shadow-sm">
                    <div class="text-center">
                        <h4 class="text-xl font-bold text-gray-800 mb-4">Que souhaitez-vous faire maintenant ?</h4>
                        <p class="text-gray-600 mb-6">Analysez vos résultats et améliorez vos compétences.</p>
                        
                        <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                            <a href="{{ route('examens.index') }}" class="px-8 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-xl transition-colors duration-300 shadow-sm hover:shadow-md flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Retour aux examens
                            </a>
                            
                            @if($exam)
                            <a href="{{ route('examens.start.specific', $exam) }}" class="px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Refaire cet examen
                            </a>
                            @endif
                            
                            <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-green-500 hover:bg-green-600 text-white font-medium rounded-xl transition-colors duration-300 shadow-sm hover:shadow-md flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                Voir le tableau de bord
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Analyse de Votre Performance</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="font-semibold text-gray-700 mb-4">Répartition des réponses (Non répondues comptées comme incorrectes)</h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-medium">Correctes</span>
                            <div class="flex items-center">
                                <div class="w-32 bg-gray-200 rounded-full h-3 mr-3">
                                    {{-- Utilisation de la variable adaptée --}}
                                    <div class="bg-green-500 h-3 rounded-full" style="width: {{ ($display_correct_answers / $result->total_questions) * 100 }}%"></div>
                                </div>
                                <span class="text-sm text-gray-600">{{ $display_correct_answers }}</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-medium">Incorrectes</span>
                            <div class="flex items-center">
                                <div class="w-32 bg-gray-200 rounded-full h-3 mr-3">
                                    {{-- Utilisation de la variable adaptée --}}
                                    <div class="bg-red-500 h-3 rounded-full" style="width: {{ ($display_wrong_answers / $result->total_questions) * 100 }}%"></div>
                                </div>
                                <span class="text-sm text-gray-600">{{ $display_wrong_answers }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-semibold text-gray-700 mb-4">Conseils pour progresser</h4>
                    <div class="space-y-3 text-sm text-gray-600">
                        @if(!$display_passed)
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <span>Revoyez les thèmes où vous avez fait le plus d'erreurs</span>
                        </div>
                        @endif
                        
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <span>Entraînez-vous régulièrement sur les questions à réponses multiples</span>
                        </div>
                        
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Analysez les explications pour comprendre vos erreurs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.question-container {
    transition: all 0.3s ease;
}

.question-container:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.answer-label {
    transition: all 0.3s ease;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
}

.animate-pulse {
    animation: pulse 2s infinite;
}
</style>
@endsection