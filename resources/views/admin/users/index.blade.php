{{-- resources/views/admin/users/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Gestion des utilisateurs')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-semibold">Liste des utilisateurs</h2>
        <p class="text-gray-600 text-sm mt-1">{{ $users->total() }} utilisateur(s) au total</p>
    </div>
    
    <!-- Formulaire de recherche -->
    <div class="flex items-center space-x-4">
        <form method="GET" action="{{ route('admin.users') }}" class="flex items-center space-x-2">
            <input type="text" name="search" placeholder="Rechercher par nom ou email..." 
                value="{{ request('search') }}"
                class="border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 w-64">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-search"></i>
            </button>
            @if(request('search'))
                <a href="{{ route('admin.users') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    <i class="fas fa-times"></i>
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Statistiques rapides -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-2 bg-blue-100 rounded-full">
                <i class="fas fa-users text-blue-600"></i>
            </div>
            <div class="ml-3">
                <p class="text-gray-600 text-sm">Total</p>
                <p class="text-lg font-semibold">{{ $users->total() }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-2 bg-green-100 rounded-full">
                <i class="fas fa-user-check text-green-600"></i>
            </div>
            <div class="ml-3">
                <p class="text-gray-600 text-sm">Actifs</p>
                <p class="text-lg font-semibold">{{ \App\Models\User::where('is_admin', false)->whereNotNull('email_verified_at')->count() }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-2 bg-yellow-100 rounded-full">
                <i class="fas fa-user-clock text-yellow-600"></i>
            </div>
            <div class="ml-3">
                <p class="text-gray-600 text-sm">En attente</p>
                <p class="text-lg font-semibold">{{ \App\Models\User::where('is_admin', false)->whereNull('email_verified_at')->count() }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-2 bg-purple-100 rounded-full">
                <i class="fas fa-calendar-plus text-purple-600"></i>
            </div>
            <div class="ml-3">
                <p class="text-gray-600 text-sm">Ce mois</p>
                <p class="text-lg font-semibold">{{ \App\Models\User::where('is_admin', false)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count() }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Utilisateur
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Statut
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Inscription
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Progression
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
    @forelse($users as $user)
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-700">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                        <div class="text-sm text-gray-500">ID: {{ $user->id }}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                @if($user->phone)
                    <div class="text-sm text-gray-500">{{ $user->phone }}</div>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($user->email_verified_at)
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fas fa-check-circle mr-1"></i>
                        Vérifié
                    </span>
                @else
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        <i class="fas fa-clock mr-1"></i>
                        En attente
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <div>{{ $user->created_at->format('d/m/Y') }}</div>
                <div class="text-xs">{{ $user->created_at->diffForHumans() }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @php
                    $totalModules = App\Models\Module::where('is_active', true)->count();
                    $completedModules = method_exists($user, 'getCompletedModulesCount') ? $user->getCompletedModulesCount() : 0;
                    $progressPercentage = method_exists($user, 'getProgressPercentage') ? $user->getProgressPercentage() : 0;
                @endphp
                <div class="flex items-center">
                    <div class="w-16 bg-gray-200 rounded-full h-2 mr-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $progressPercentage }}%"></div>
                    </div>
                    <span class="text-sm text-gray-600">{{ $progressPercentage }}%</span>
                </div>
                <div class="text-xs text-gray-500 mt-1">
                    {{ $completedModules }}/{{ $totalModules }} modules
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex items-center space-x-2">    
                    <!-- NOUVEAU BOUTON: Voir les résultats -->
                    <a href="{{ route('admin.users.results', $user->id) }}" 
                       class="text-purple-600 hover:text-purple-900" title="Voir les résultats">
                        <i class="fas fa-eye"></i>
                    </a>
                    
                    @if(!$user->email_verified_at)
                        <form method="POST" action="{{ route('admin.users.verify', $user) }}" class="inline">
                            @csrf
                            <button type="submit" class="text-green-600 hover:text-green-900" title="Vérifier email">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    @endif
                    
                    <button onclick="toggleUserStatus({{ $user->id }})" 
                        class="text-yellow-600 hover:text-yellow-900" title="Suspendre/Activer">
                        <i class="fas fa-user-slash"></i>
                    </button>
                    
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" 
                        class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" title="Supprimer">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                @if(request('search'))
                    Aucun utilisateur trouvé pour "{{ request('search') }}"
                @else
                    Aucun utilisateur enregistré
                @endif
            </td>
        </tr>
    @endforelse
</tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $users->links() }}
</div>

<!-- Modal pour les détails utilisateur -->
<div id="userDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Détails de l'utilisateur</h3>
            <button onclick="closeUserDetails()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div id="userDetailsContent">
            <!-- Le contenu sera chargé ici via JavaScript -->
        </div>
    </div>
</div>

<script>
    function showUserDetails(userId) {
        document.getElementById('userDetailsModal').classList.remove('hidden');
        // Ici vous pouvez faire un appel AJAX pour charger les détails de l'utilisateur
        document.getElementById('userDetailsContent').innerHTML = '<p class="text-center">Chargement...</p>';
    }

    function closeUserDetails() {
        document.getElementById('userDetailsModal').classList.add('hidden');
    }

    function toggleUserStatus(userId) {
        if (confirm('Êtes-vous sûr de vouloir changer le statut de cet utilisateur ?')) {
            // Ici vous pouvez faire un appel AJAX pour changer le statut
            console.log('Toggle status for user:', userId);
        }
    }

    // Fermer le modal en cliquant à l'extérieur
    document.getElementById('userDetailsModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeUserDetails();
        }
    });
</script>
@endsection