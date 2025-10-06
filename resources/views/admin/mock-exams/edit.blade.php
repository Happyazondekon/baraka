@extends('admin.layouts.app')

@section('title', 'Modifier l\'Examen Blanc')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Modifier l'examen blanc : {{ $quiz->title }}</h3>
        </div>
        
        <form method="POST" action="{{ route('admin.mock-exams.update', $quiz) }}" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Informations de base -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Titre de l'examen *</label>
                        <input type="text" name="title" id="title" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('title', $quiz->title) }}">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="time_limit" class="block text-sm font-medium text-gray-700">Durée (minutes) *</label>
                        <input type="number" name="time_limit" id="time_limit" required min="1" max="180"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('time_limit', $quiz->time_limit) }}">
                        @error('time_limit')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="passing_score" class="block text-sm font-medium text-gray-700">Score de passage (%) *</label>
                        <input type="number" name="passing_score" id="passing_score" required min="0" max="100"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('passing_score', $quiz->passing_score) }}">
                        @error('passing_score')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" 
                                {{ old('is_active', $quiz->is_active) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">
                                Examen actif
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $quiz->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sélection des questions -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">Sélection des questions *</label>
                    
                    <!-- Filtres et recherche -->
                    <div class="mb-4 flex flex-col sm:flex-row gap-4">
                        <input type="text" id="questionSearch" 
                            class="block w-full sm:w-64 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Rechercher une question...">
                        
                        <select id="moduleFilter" class="block w-full sm:w-48 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Tous les modules</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Liste des questions -->
                    <div class="border border-gray-300 rounded-lg max-h-96 overflow-y-auto">
                        <div class="bg-gray-50 px-4 py-2 border-b border-gray-300">
                            <div class="flex items-center">
                                <input type="checkbox" id="selectAllQuestions" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <label for="selectAllQuestions" class="ml-2 text-sm font-medium text-gray-700">
                                    Sélectionner toutes les questions ({{ $questions->count() }} disponibles)
                                </label>
                            </div>
                        </div>
                        
                        <div class="p-4 space-y-3" id="questionsList">
                            @foreach($questions as $question)
                            <div class="flex items-start question-item" data-module="{{ $question->quiz->module_id ?? '' }}">
                                <input type="checkbox" name="selected_questions[]" 
                                    value="{{ $question->id }}" 
                                    id="question_{{ $question->id }}"
                                    {{ in_array($question->id, $selectedQuestions) ? 'checked' : '' }}
                                    class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 question-checkbox">
                                
                                <label for="question_{{ $question->id }}" class="ml-3 block text-sm text-gray-700 flex-1 cursor-pointer">
                                    <div class="font-medium">{{ $question->question_text }}</div>
                                    <div class="text-xs text-gray-500 mt-1">
                                        Module: {{ $question->quiz->module->title ?? 'Non assigné' }} | 
                                        Type: {{ $question->type }}
                                    </div>
                                    <div class="text-xs text-gray-400 mt-1">
                                        Réponses: {{ $question->answers->count() }} | 
                                        Correctes: {{ $question->answers->where('is_correct', true)->count() }}
                                    </div>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Compteur de sélection -->
                    <div class="mt-2 text-sm text-gray-600">
                        <span id="selectedCount">{{ count($selectedQuestions) }}</span> question(s) sélectionnée(s)
                    </div>

                    @error('selected_questions')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.mock-exams.index') }}" 
                    class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 transition-colors">
                    Annuler
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('selectAllQuestions');
    const questionCheckboxes = document.querySelectorAll('.question-checkbox');
    const selectedCount = document.getElementById('selectedCount');
    const questionSearch = document.getElementById('questionSearch');
    const moduleFilter = document.getElementById('moduleFilter');
    const questionsList = document.getElementById('questionsList');

    // Sélection/désélection de toutes les questions
    selectAll.addEventListener('change', function() {
        questionCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAll.checked;
        });
        updateSelectedCount();
    });

    // Mise à jour du compteur
    function updateSelectedCount() {
        const selected = document.querySelectorAll('.question-checkbox:checked').length;
        selectedCount.textContent = selected;
        
        // Mettre à jour "Sélectionner tout" si nécessaire
        selectAll.checked = selected === questionCheckboxes.length;
        selectAll.indeterminate = selected > 0 && selected < questionCheckboxes.length;
    }

    questionCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    // Filtrage des questions
    function filterQuestions() {
        const searchTerm = questionSearch.value.toLowerCase();
        const moduleId = moduleFilter.value;

        document.querySelectorAll('.question-item').forEach(item => {
            const questionText = item.querySelector('label').textContent.toLowerCase();
            const itemModule = item.dataset.module;
            
            const matchesSearch = questionText.includes(searchTerm);
            const matchesModule = !moduleId || itemModule === moduleId;
            
            item.style.display = matchesSearch && matchesModule ? 'flex' : 'none';
        });
    }

    questionSearch.addEventListener('input', filterQuestions);
    moduleFilter.addEventListener('change', filterQuestions);

    // Validation du formulaire
    document.querySelector('form').addEventListener('submit', function(e) {
        const selectedQuestions = document.querySelectorAll('.question-checkbox:checked').length;
        
        if (selectedQuestions === 0) {
            e.preventDefault();
            alert('Veuillez sélectionner au moins une question pour l\'examen.');
            return false;
        }
    });

    updateSelectedCount();
});
</script>
@endsection