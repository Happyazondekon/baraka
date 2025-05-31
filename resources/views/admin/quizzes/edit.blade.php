@extends('admin.layouts.app')

@section('title', 'Modifier le quiz')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Modifier le quiz : {{ $quiz->title }}</h3>
        </div>
        
        <form method="POST" action="{{ route('quizzes.update', $quiz) }}" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <div>
                    <label for="module_id" class="block text-sm font-medium text-gray-700">Module *</label>
                    <select name="module_id" id="module_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($modules as $module)
                            <option value="{{ $module->id }}" {{ $quiz->module_id == $module->id ? 'selected' : '' }}>
                                {{ $module->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('module_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre *</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('title', $quiz->title) }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $quiz->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="time_limit" class="block text-sm font-medium text-gray-700">Limite de temps (minutes)</label>
                    <input type="number" name="time_limit" id="time_limit" min="1"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('time_limit', $quiz->time_limit) }}">
                    @error('time_limit')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="passing_score" class="block text-sm font-medium text-gray-700">Score de passage (%) *</label>
                    <input type="number" name="passing_score" id="passing_score" required min="0" max="100"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('passing_score', $quiz->passing_score) }}">
                    @error('passing_score')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                        {{ old('is_active', $quiz->is_active) ? 'checked' : '' }}>
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Quiz actif
                    </label>
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                <a href="{{ route('quizzes.index') }}" 
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    Annuler
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Mettre à jour
                </button>
            </div>
        </form>

        <!-- Gestion des questions -->
        <div class="p-6 border-t border-gray-200">
            <h4 class="text-lg font-semibold mb-4">Questions</h4>
            
            @foreach($quiz->questions as $question)
                <div class="bg-gray-50 p-4 rounded-lg mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <h5 class="font-medium">{{ $question->question_text }}</h5>
                        <div class="flex space-x-2">
                            <a href="{{ route('questions.edit', $question) }}" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('questions.destroy', $question) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" 
                                    onclick="return confirm('Êtes-vous sûr ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Image actuelle et modification  -->
                    <div class="mt-6">
                        <!-- <label class="block text-sm font-medium text-gray-700 mb-2">Image</label> -->
                        
                        <div class="mb-4">
                            @if($question->image)
                                <img id="preview-image" src="{{ asset('storage/' . $question->image) }}" alt="image"
                                    class="w-48 h-auto rounded shadow">
                            @endif
                        </div>

                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="ml-4 space-y-2">
                        @foreach($question->answers as $answer)
                            <div class="flex items-center">
                                <input type="{{ $question->type == 'multiple_choice' ? 'checkbox' : 'radio' }}" 
                                    name="answer_{{ $question->id }}" 
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                    {{ $answer->is_correct ? 'checked' : '' }} disabled>
                                <label class="ml-2 block text-sm text-gray-700">
                                    {{ $answer->answer_text }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- Supposons que tu as l'objet $quiz dans ta vue -->
            <a href="{{ route('questions.create', ['quiz_id' => $quiz->id]) }}" 
            class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            <i class="fas fa-plus mr-2"></i>
                Ajouter une question
            </a>
            <!-- <button type="button" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-plus mr-2"></i>Ajouter une question
            </button> -->
        </div>
    </div>
</div>
@endsection