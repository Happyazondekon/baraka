@extends('admin.layouts.app')

@section('title', 'Modifier le module')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Modifier le module : {{ $module->title }}</h3>
        </div>
        
        <form method="POST" action="{{ route('admin.modules.update', $module) }}" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre *</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('title', $module->title) }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $module->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                 <!-- Image actuelle et modification -->
                <div class="mt-6">

                    <!-- 1. Div image seule -->
                    <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image actuelle</label>

                        @if($module->image)
                            <img id="preview-image" src="{{ asset('storage/' . $module->image) }}" alt="Image actuelle"
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
                        <label class="inline-flex items-center" id="del_image" style="{{ $module->image ? '' : 'display:none' }}">
                            <input type="checkbox" name="remove_image" value="1" class="form-checkbox text-red-600">
                            <span class="ml-2 text-sm text-red-700">Supprimer l'image actuelle</span>
                        </label>
                    </div>

                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700">Ordre *</label>
                    <input type="number" name="order" id="order" required min="0"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('order', $module->order) }}">
                    @error('order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_practical" id="is_practical" value="1"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            {{ old('is_practical', $module->is_practical) ? 'checked' : '' }}>
                        <label for="is_practical" class="ml-2 block text-sm text-gray-700">
                            Module pratique
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            {{ old('is_active', $module->is_active) ? 'checked' : '' }}>
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