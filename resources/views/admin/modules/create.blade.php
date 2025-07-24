@extends('admin.layouts.app')

@section('title', 'Créer un module')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Créer un nouveau module</h3>
        </div>
        
        <form method="POST" action="{{ route('admin.modules.store') }}" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre *</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                <!-- Aperçu de l'image -->
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <div id="image-preview-container" class="mb-3">
                        <img id="image-preview" src="#" class="hidden w-48 rounded shadow" />
                    </div>

                    <!-- Boutons image -->
                    <div class="flex space-x-4 items-center"> 
                        <input type="file" name="image" id="image-input" accept="image/*"
                            class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">

                        <button type="button" id="remove-image-btn"
                                class="hidden bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                            Supprimer l'image
                        </button>
                    </div>

                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700">Ordre *</label>
                    <input type="number" name="order" id="order" required min="0"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('order', 0)}}">
                    @error('order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_practical" id="is_practical" value="1"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            {{ old('is_practical') ? 'checked' : '' }}>
                        <label for="is_practical" class="ml-2 block text-sm text-gray-700">
                            Module pratique
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" checked
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            {{ old('is_active', true) ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">
                            Module actif
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.modules.index') }}" 
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    Annuler
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Créer le module
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputImage = document.getElementById('image-input');
        const imagePreview = document.getElementById('image-preview');
        const imagePreviewContainer = document.getElementById('image-preview-container');
        const removeImageBtn = document.getElementById('remove-image-btn');

        inputImage.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    removeImageBtn.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "#";
                imagePreview.classList.add('hidden');
                removeImageBtn.classList.add('hidden');
            }
        });

        removeImageBtn.addEventListener('click', function () {
            // Réinitialiser l'input
            inputImage.value = "";
            // Cacher l'aperçu
            imagePreview.src = "#";
            imagePreview.classList.add('hidden');
            this.classList.add('hidden');
        });
    });
</script>
