@extends('admin.layouts.app')

@section('title', 'Détails du quiz')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- En-tête du quiz -->
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-xl font-semibold">{{ $quiz->title }}</h3>
                    <p class="text-gray-600 mt-1">{{ $quiz->description }}</p>
                    <div class="flex items-center space-x-4 mt-3">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $quiz->module->is_practical ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                            {{ $quiz->module->title }}
                        </span>
                        <span class="text-sm text-gray-500">
                            {{ $quiz->time_limit ? $quiz->time_limit . ' minutes' : 'Durée illimitée' }}
                        </span>
                        <span class="text-sm text-gray-500">
                            Seuil de réussite : {{ $quiz->passing_score }}%
                        </span>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.quizzes.edit', $quiz) }}" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        <i class="fas fa-edit mr-2"></i>Modifier
                    </a>
                    <a href="{{ route('questions.create', ['quiz_id' => $quiz->id]) }}" 
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        <i class="fas fa-plus mr-2"></i>Ajouter une question
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des questions -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h4 class="text-lg font-semibold">Questions ({{ $quiz->questions->count() }})</h4>
        </div>
        
        <div class="divide-y divide-gray-200">
            @forelse($quiz->questions->sortBy('order') as $index => $question)
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-sm font-medium">
                                    Question {{ $index + 1 }}
                                </span>
                                <span class="text-xs text-gray-500">{{ $question->points }} points</span>
                            </div>
                            <h5 class="font-medium text-gray-900 mb-3">{{ $question->question_text}}</h5>
                            
                            <!-- Options de réponse -->
                            <div class="space-y-2">
                                @if(is_array($question->options))
                                    @foreach($question->options as $optionIndex => $option)
                                        <div class="flex items-center space-x-2">
                                            <span class="w-6 h-6 rounded-full border-2 {{ $option['is_correct'] ? 'bg-green-100 border-green-500 text-green-700' : 'border-gray-300' }} flex items-center justify-center text-sm font-medium">
                                                {{ chr(65 + $optionIndex) }}
                                            </span>
                                            <span class="{{ $option['is_correct'] ? 'text-green-700 font-medium' : 'text-gray-700' }}">
                                                {{ $option['text'] }}
                                            </span>
                                            @if($option['is_correct'])
                                                <i class="fas fa-check text-green-500 text-sm"></i>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @if($question->explanation)
                                <div class="mt-3 p-3 bg-blue-50 rounded">
                                    <p class="text-sm text-blue-800"><strong>Explication :</strong> {{ $question->explanation }}</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="flex space-x-2 ml-4">
                            <a href="{{ route('questions.edit', $question) }}" 
                                class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('questions.destroy', $question) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-6 text-center">
                    <i class="fas fa-question-circle text-gray-400 text-4xl mb-4"></i>
                    <p class="text-gray-600">Aucune question ajoutée pour ce quiz.</p>
                    <a href="{{ route('questions.create', $quiz) }}"
                        class="inline-block mt-3 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Ajouter la première question
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
