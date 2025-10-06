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
                <i class="fas fa-book-open text-yellow-600 text-xl"></i>
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

<!-- Actions Rapides -->
<div class="mb-8">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Actions Rapides</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Examens Blancs -->
                <a href="{{ route('admin.mock-exams.index') }}" 
                   class="flex items-center p-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg shadow hover:from-blue-600 hover:to-blue-700 transition-all duration-200">
                    <div class="p-3 bg-white bg-opacity-20 rounded-full mr-4">
                        <i class="fas fa-file-alt text-xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Examens Blancs</p>
                        <p class="text-sm opacity-90">Gérer les examens</p>
                    </div>
                </a>

                <!-- Utilisateurs -->
                <a href="{{ route('admin.users') }}" 
                   class="flex items-center p-4 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg shadow hover:from-green-600 hover:to-green-700 transition-all duration-200">
                    <div class="p-3 bg-white bg-opacity-20 rounded-full mr-4">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Utilisateurs</p>
                        <p class="text-sm opacity-90">Gérer les comptes</p>
                    </div>
                </a>

                <!-- Modules -->
                <a href="{{ route('admin.modules.index') }}" 
                   class="flex items-center p-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg shadow hover:from-purple-600 hover:to-purple-700 transition-all duration-200">
                    <div class="p-3 bg-white bg-opacity-20 rounded-full mr-4">
                        <i class="fas fa-book text-xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Modules</p>
                        <p class="text-sm opacity-90">Gérer les cours</p>
                    </div>
                </a>

                <!-- Quiz -->
                <a href="{{ route('admin.quizzes.index') }}" 
                   class="flex items-center p-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg shadow hover:from-orange-600 hover:to-orange-700 transition-all duration-200">
                    <div class="p-3 bg-white bg-opacity-20 rounded-full mr-4">
                        <i class="fas fa-question-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Quiz</p>
                        <p class="text-sm opacity-90">Gérer les quiz</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Users -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">Nouveaux utilisateurs</h3>
                <a href="{{ route('admin.users') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Voir tout
                </a>
            </div>
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
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">Résultats récents des quiz</h3>
                <a href="{{ route('admin.users') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Voir tout
                </a>
            </div>
        </div>
       <div class="p-6">
    <div class="space-y-4">
        @forelse($stats['recent_quiz_results'] as $result)
            <div class="flex items-center justify-between">
                <div>
                    <p class="font-medium">{{ $result->user->name }}</p>
                    <p class="text-sm text-gray-600">
                        @if($result->quiz->module)
                            {{ $result->quiz->module->title }}
                        @else
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"/>
                                </svg>
                                Examen blanc
                            </span>
                        @endif
                    </p>
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

<!-- Statistiques des Examens Blancs -->
<div class="mt-8">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">Statistiques des Examens Blancs</h3>
                <a href="{{ route('admin.mock-exams.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Gérer les examens
                </a>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $mockExams = \App\Models\Quiz::mockExams()->get();
                    $activeMockExams = $mockExams->where('is_active', true)->count();
                    $totalMockExamQuestions = \App\Models\Question::whereHas('quiz', function($query) {
                        $query->mockExams();
                    })->count();
                @endphp
                
                <div class="text-center">
                    <div class="p-4 bg-blue-50 rounded-lg">
                        <i class="fas fa-file-alt text-blue-600 text-2xl mb-2"></i>
                        <p class="text-2xl font-bold text-gray-800">{{ $mockExams->count() }}</p>
                        <p class="text-sm text-gray-600">Examens créés</p>
                    </div>
                </div>
                
                <div class="text-center">
                    <div class="p-4 bg-green-50 rounded-lg">
                        <i class="fas fa-check-circle text-green-600 text-2xl mb-2"></i>
                        <p class="text-2xl font-bold text-gray-800">{{ $activeMockExams }}</p>
                        <p class="text-sm text-gray-600">Examens actifs</p>
                    </div>
                </div>
                
                <div class="text-center">
                    <div class="p-4 bg-purple-50 rounded-lg">
                        <i class="fas fa-question-circle text-purple-600 text-2xl mb-2"></i>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalMockExamQuestions }}</p>
                        <p class="text-sm text-gray-600">Questions totales</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection