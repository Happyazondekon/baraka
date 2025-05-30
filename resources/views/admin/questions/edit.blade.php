@extends('admin.layouts.app')

@section('title', 'Modifier la question')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Modifier la question</h3>
            <p class="text-gray-600 mt-1">Quiz : {{ $question->quiz->title }}</p>
            <p class="text-gray-600">Module : {{ $question->quiz->module->title }}</p>
        </div>
        
        <form method="POST" action="{{ route('questions.update', $question) }}" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <div>
                    <label for="question" class="block text-sm font-medium text-gray-700">Question *</label>
                    <textarea name="question" id="question" rows="3" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('question', $question->question_text) }}</textarea>
                    @error('question')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Options de réponse -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Options de réponse *</label>
                    <div id="options-container" class="space-y-3">
                        @foreach($options as $i => $option)
                            <div class="flex items-center space-x-3 option-item">
                                <span class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-sm font-medium">
                                    {{ chr(65 + $i) }}
                                </span>
                                <input type="text" name="options[{{ $i }}][text]" 
                                    class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Texte de l'option {{ chr(65 + $i) }}" 
                                    value="{{ old("options.{$i}.text", $option['text']) }}" required>
                                <label class="flex items-center">
                                    <input type="radio" name="correct_option" value="{{ $i }}" 
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500"
                                        {{ old('correct_option', $option['is_correct'] ? $i : '') == $i ? 'checked' : '' }} required>
                                    <span class="ml-2 text-sm text-gray-700">Correcte</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('options')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('correct_option')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="explanation" class="block text-sm font-medium text-gray-700">Explication (optionnel)</label>
                    <textarea name="explanation" id="explanation" rows="2"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Explication de la bonne réponse">{{ old('explanation', $question->explanation) }}</textarea>
                    @error('explanation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="points" class="block text-sm font-medium text-gray-700">Points *</label>
                        <input type="number" name="points" id="points" required min="1"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('points', $question->points) }}">
                        @error('points')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">Ordre *</label>
                        <input type="number" name="order" id="order" required min="1"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('order', $question->order) }}">
                        @error('order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                <a href="{{ route('quizzes.show', $question->quiz) }}" 
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    Annuler
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
