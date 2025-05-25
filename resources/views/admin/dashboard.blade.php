@extends('admin.layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-full">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Utilisateurs</p>
                <p class="text-2xl font-semibold">{{ $stats['total_users'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-full">
                <i class="fas fa-book text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Modules</p>
                <p class="text-2xl font-semibold">{{ $stats['total_modules'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-full">
                <i class="fas fa-book-open text-white-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Cours</p>
                <p class="text-2xl font-semibold">{{ $stats['total_courses'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-full">
                <i class="fas fa-credit-card text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-600 text-sm">Revenus (XOF)</p>
                <p class="text-2xl font-semibold">{{ number_format($stats['total_payments']) }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Users -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Nouveaux utilisateurs</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($stats['recent_users'] as $user)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">{{ $user->name }}</p>
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>
                        </div>
                        <span class="text-sm text-gray-500">
                            {{ $user->created_at->diffForHumans() }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500">Aucun utilisateur récent</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Recent Quiz Results -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Résultats récents des quiz</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($stats['recent_quiz_results'] as $result)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">{{ $result->user->name }}</p>
                            <p class="text-sm text-gray-600">{{ $result->quiz->module->title }}</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $result->passed ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $result->score }}%
                            </span>
                            <p class="text-sm text-gray-500">{{ $result->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Aucun résultat récent</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection