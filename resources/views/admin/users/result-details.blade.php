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
                    <td class="px-6 py-4">
    @if($result->quiz->module)
        {{ $result->quiz->module->title }}
    @else
        Examen blanc
    @endif
</td>
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

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Détail des questions et réponses</h2>
                @if($result->detailed_results && is_array($result->detailed_results))
                    <div class="space-y-6">
                        @foreach($result->detailed_results as $index => $detail)
                        <div class="rounded-lg border-2 {{ $detail['is_correct'] ? 'border-green-400' : 'border-red-400' }}">
                            <div class="p-4 rounded-t-lg flex items-center justify-between {{ $detail['is_correct'] ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                <h3 class="text-lg font-semibold">Question {{ $index + 1 }}</h3>
                                <span class="px-2 py-1 rounded-full text-xs font-bold bg-white {{ $detail['is_correct'] ? 'text-green-700' : 'text-red-700' }}">
                                    {{ $detail['is_correct'] ? 'Correcte' : 'Incorrecte' }}
                                </span>
                            </div>
                            <div class="p-4 bg-white">
                                <p class="font-bold text-gray-900 mb-4">{{ $detail['question_text'] }}</p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gray-50 border rounded-lg p-4 {{ $detail['is_correct'] ? 'border-green-300' : 'border-red-300' }}">
                                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Réponse de l'utilisateur</h4>
                                        <p class="text-sm {{ $detail['is_correct'] ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $detail['user_answer_text'] ?? 'Aucune réponse' }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 border border-green-300 rounded-lg p-4">
                                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Bonne réponse</h4>
                                        <p class="text-sm text-green-600">
                                            {{ $detail['correct_answer_text'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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

@endsection