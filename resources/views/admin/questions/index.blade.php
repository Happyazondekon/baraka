extends('admin.layouts.app')

@section('title', 'Liste des cours')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Liste des cours</h2>
        <a href="{{ route('admin.courses.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           Créer un cours
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Module</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ordre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actif</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $course->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $course->module->title ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $course->order }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($course->is_active)
                            <span class="text-green-600 font-semibold">Oui</span>
                        @else
                            <span class="text-red-600 font-semibold">Non</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <a href="{{ route('courses.edit', $course) }}" 
                           class="text-blue-600 hover:text-blue-900">Modifier</a>

                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="inline"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer ce cours ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Aucun cours trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</div>
@endsection
