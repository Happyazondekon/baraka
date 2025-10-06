@extends('admin.layouts.app')

@section('title', 'Liste des cours')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Liste des cours</h2>
        <a href="{{ route('admin.courses.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out">
           <i class="fas fa-plus mr-2"></i>Créer un cours
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Titre / Contenu</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Module parent</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ordre</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($courses as $course)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-base font-semibold text-gray-900">{{ $course->title }}</div>
                        @if(!empty($course->content))
                            <div class="text-xs text-gray-500 max-w-sm overflow-hidden text-ellipsis">{{ Str::limit(strip_tags($course->content), 80) }}</div>
                        @else
                            <div class="text-xs text-gray-400">Pas de contenu ajouté.</div>
                        @endif
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $course->module->title ?? '-' }}</div>
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-medium">
                        {{ $course->order }}
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 text-xs font-bold leading-5 rounded-full 
                            {{ $course->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $course->is_active ? 'Actif' : 'Inactif' }}
                        </span>
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.courses.edit', $course) }}" class="text-blue-600 hover:text-blue-900 transition duration-150 ease-in-out" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                        {{-- Remplacer l'ancien formulaire de suppression --}}
<form method="POST" action="{{ route('admin.courses.destroy', $course) }}" class="inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:text-red-900 transition duration-150 ease-in-out" 
        onclick="confirmDelete(event, 'Supprimer le cours', 'Êtes-vous sûr de vouloir supprimer ce cours ?')" title="Supprimer">
        <i class="fas fa-trash"></i>
    </button>
</form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500 text-lg">
                        <i class="fas fa-book mr-2"></i>Aucun cours trouvé.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $courses->links() }}
    </div>
</div>
@endsection