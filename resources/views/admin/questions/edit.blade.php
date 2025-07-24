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
        
        <form method="POST" action="{{ route('admin.questions.update', $question) }}" class="p-6" enctype="multipart/form-data">
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

                <!-- Image actuelle et modification -->
                <div class="mt-6">

                    <!-- 1. Div image seule -->
                    <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image actuelle</label>

                        @if($question->image)
                            <img id="preview-image" src="{{ asset('storage/' . $question->image) }}" alt="Image actuelle"
                                class="w-48 h-auto rounded shadow">
                        @else
                            <p class="text-gray-500 italic" id="no-image-text">Aucune image</p>
                        @endif
                    </div>

                    <!-- 2. Div boutons (horizontaux entre eux) -->
                    <div class="flex space-x-4 items-center">
                        <!-- Bouton 1 : Input file -->
                        <input type="file" name="image" id="image-input"
                            accept="image/*"
                            class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">

                        <!-- Bouton 2 : Supprimer image -->
                        <label class="inline-flex items-center" id="del_image" style="{{ $question->image ? '' : 'display:none' }}">
                            <input type="checkbox" name="remove_image" value="1" class="form-checkbox text-red-600">
                            <span class="ml-2 text-sm text-red-700">Supprimer l'image actuelle</span>
                        </label>
                    </div>

                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Options de réponse -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Options de réponse *</label>
                    <div id="options-container" class="space-y-3">
                        @foreach($options as $i => $option)
                            @php
                                $checkedOptions = old('correct_option') ?? [];
                            @endphp

                            <div class="flex items-center space-x-3 option-item">
                                <span class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-sm font-medium">
                                    {{ chr(65 + $i) }}
                                </span>

                                <input type="text" name="options[{{ $i }}][text]" 
                                    class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Texte de l'option {{ chr(65 + $i) }}" 
                                    value="{{ old("options.{$i}.text", $option['text']) }}" required>

                                <label class="flex items-center">
                                    <input type="checkbox" name="correct_option[]" value="{{ $i }}" 
                                        class="h-4 w-4 text-green-600 focus:ring-green-500"
                                        {{ in_array($i, $checkedOptions) || $option['is_correct'] ? 'checked' : '' }}>
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
                <a href="{{ route('admin.quizzes.show', $question->quiz) }}" 
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

<!-- {{-- Script pour prévisualiser la nouvelle image --}} -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('image-input');
        const noImageText = document.getElementById('no-image-text');
        const del = document.getElementById('del_image');

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const imageUrl = e.target.result;

                    let preview = document.getElementById('preview-image');
                    if (preview) {
                        preview.src = imageUrl;
                    } else {
                        preview = document.createElement('img');
                        preview.id = 'preview-image';
                        preview.className = 'w-48 h-auto rounded shadow mt-2';
                        preview.src = imageUrl;
                        input.parentElement.insertBefore(preview, input);
                    }

                    // Masquer le texte "Aucune image"
                    if (noImageText) {
                        noImageText.style.display = 'none';
                    }

                    // Afficher la checkbox de suppression d’image
                        del.style.display = 'inline-flex';
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
