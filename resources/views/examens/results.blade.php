@extends('layouts.app')

@section('title', 'Résultats de l\'Examen - Code de la Route')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Navigation -->
        <div class="mb-8">
            <a href="{{ route('examens.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors group">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour aux examens blancs
            </a>
        </div>

        <!-- Résultats Header -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-8 text-white text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white bg-opacity-20 text-sm font-medium mb-4">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Résultats de l'Examen
                </div>
                <h1 class="text-3xl lg:text-4xl font-bold mb-4">Vos Résultats</h1>
                
                <!-- Score Principal -->
                <div class="bg-white bg-opacity-20 rounded-2xl p-6 max-w-md mx-auto backdrop-blur-sm">
                    <div class="text-6xl font-bold mb-2 {{ $quizResult->passed ? 'text-green-300' : 'text-red-300' }}">
                        {{ $quizResult->score }}%
                    </div>
                    <div class="text-white text-lg font-semibold mb-4">
                        {{ $quizResult->correct_answers }}/{{ $quizResult->total_questions }} bonnes réponses
                    </div>
                    <div class="inline-flex items-center px-4 py-2 rounded-full {{ $quizResult->passed ? 'bg-green-500' : 'bg-red-500' }} text-white font-medium">
                        @if($quizResult->passed)
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Examen Réussi
                        @else
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Examen Échoué
                        @endif
                    </div>
                </div>
            </div>

            <!-- Statistiques détaillées -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="text-center">
                        <div class="bg-blue-50 rounded-lg p-4">
                            <div class="text-2xl font-bold text-blue-600">{{ $quizResult->total_questions }}</div>
                            <div class="text-sm text-gray-600">Questions totales</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-50 rounded-lg p-4">
                            <div class="text-2xl font-bold text-green-600">{{ $quizResult->correct_answers }}</div>
                            <div class="text-sm text-gray-600">Bonnes réponses</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-purple-50 rounded-lg p-4">
                            <div class="text-2xl font-bold text-purple-600">{{ $quizResult->time_taken }} min</div>
                            <div class="text-sm text-gray-600">Temps passé</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Correction détaillée -->
<!-- Correction détaillée -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 mb-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <svg class="w-6 h-6 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
        </svg>
        Correction détaillée
    </h2>

    @if(isset($detailedResults) && count($detailedResults) > 0)
    <div class="space-y-6">
        @foreach($detailedResults as $index => $result)
        <div class="border border-gray-200 rounded-xl p-6 {{ $result['is_correct'] ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200' }}">
            <div class="flex items-start mb-4">
                <span class="bg-{{ $result['is_correct'] ? 'green' : 'red' }}-500 text-white rounded-lg px-3 py-1 text-sm font-bold mr-3 shadow-sm flex-shrink-0">
                    {{ $index + 1 }}
                </span>
                <p class="text-lg font-semibold text-gray-800 leading-relaxed">
                    {{ $result['question_text'] ?? 'Question non disponible' }}
                </p>
            </div>

            <!-- Votre réponse -->
            <div class="mb-4">
                <div class="flex items-center mb-2">
                    <span class="text-sm font-medium text-gray-700">Votre réponse :</span>
                    <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $result['is_correct'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        @if($result['is_correct'])
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Correct
                        @else
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Incorrect
                        @endif
                    </span>
                </div>
                <div class="bg-white rounded-lg p-3 border border-gray-300">
                    <span class="text-gray-700">{{ $result['user_answer_text'] ?? 'Aucune réponse' }}</span>
                </div>
            </div>

            <!-- Bonne réponse -->
            @if(!$result['is_correct'])
            <div>
                <div class="flex items-center mb-2">
                    <span class="text-sm font-medium text-gray-700">Bonne réponse :</span>
                </div>
                <div class="bg-green-50 rounded-lg p-3 border border-green-200">
                    <span class="text-green-700 font-medium">{{ $result['correct_answer_text'] ?? 'Non disponible' }}</span>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-8">
        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Corrections non disponibles</h3>
        <p class="text-gray-600">Les corrections détaillées ne sont pas disponibles pour le moment.</p>
    </div>
    @endif
</div>

        <!-- Actions -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-200">
            <div class="text-center">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Que souhaitez-vous faire maintenant ?</h3>
                
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="{{ route('examens.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        Retour aux examens
                    </a>
                    
                    @if($exam)
                    <a href="{{ route('examens.start.specific', $exam) }}" 
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"/>
                        </svg>
                        Refaire cet examen
                    </a>
                    @else
                    <a href="{{ route('examens.start') }}" 
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"/>
                        </svg>
                        Nouvel examen
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection