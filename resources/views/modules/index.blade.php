@extends('layouts.app')

@section('title', 'Cours')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Cours de Code de la Route</h1>
                    <p class="text-gray-600 text-lg">Maîtrisez le code de la route avec nos modules interactifs</p>
                </div>
                
                <!-- Progress Indicator -->
                <div class="bg-white rounded-2xl p-4 shadow-md border border-gray-200">
                    <div class="flex items-center space-x-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">{{ auth()->user()->completedCourses()->count() }}</div>
                            <div class="text-sm text-gray-600">Leçons terminées</div>
                        </div>
                        <div class="h-8 w-px bg-gray-300"></div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">{{ auth()->user()->getProgressPercentage() }}%</div>
                            <div class="text-sm text-gray-600">Progression globale</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8" x-data="{ selectedPhase: 'all' }">
        <!-- Tabs / Filter -->
        <div class="flex flex-wrap space-x-2 mb-6 border-b border-gray-300">
            <button @click="selectedPhase = 'all'" 
                    :class="{'bg-green-600 text-white': selectedPhase === 'all', 'bg-white text-gray-700 hover:bg-green-50': selectedPhase !== 'all'}" 
                    class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors duration-200 shadow-sm border border-b-0 border-gray-300">
                Tous les Modules
            </button>
            <button @click="selectedPhase = 'theorique'" 
                    :class="{'bg-green-600 text-white': selectedPhase === 'theorique', 'bg-white text-gray-700 hover:bg-green-50': selectedPhase !== 'theorique'}" 
                    class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors duration-200 shadow-sm border border-b-0 border-gray-300">
                Modules Théoriques
            </button>
            <button @click="selectedPhase = 'pratique'" 
                    :class="{'bg-blue-600 text-white': selectedPhase === 'pratique', 'bg-white text-gray-700 hover:bg-blue-50': selectedPhase !== 'pratique'}" 
                    class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors duration-200 shadow-sm border border-b-0 border-gray-300">
                Modules Pratiques
            </button>
        </div>

        <!-- Modules Section -->
        <div class="space-y-8">
            <!-- Modules Théoriques -->
            <div x-show="selectedPhase === 'all' || selectedPhase === 'theorique'" class="pt-4">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-1">Modules Théoriques</h2>
                        <p class="text-gray-600 text-sm">Apprenez les règles essentielles du code de la route</p>
                    </div>
                    <div class="hidden lg:block">
                        <div class="bg-green-100 text-green-800 px-3 py-1 rounded-lg font-medium text-sm">
                            {{ $modules->where('is_practical', false)->count() }} modules
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 lg:grid-cols-1">
                    @forelse($modules->where('is_practical', false) as $module)
                        <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                            
                            <div class="flex flex-col lg:flex-row">
                                <!-- Visual Section avec image du module -->
                                <div class="lg:w-48 relative overflow-hidden bg-gray-100">
                                    @if($module->image)
                                        <img src="{{ asset('storage/' . $module->image) }}" alt="{{ $module->title }}" class="w-full h-48 lg:h-full object-cover">
                                    @else
                                        <!-- Fallback si pas d'image -->
                                        <div class="w-full h-48 lg:h-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center">
                                            <div class="text-white text-center p-4">
                                                <svg class="w-12 h-12 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="text-sm font-medium">Module {{ $module->order }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content Section -->
                                <div class="flex-1 p-6">
                                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between h-full">
                                        <div class="flex-1 mb-4 lg:mb-0">
                                            <div class="flex items-center space-x-2 mb-3">
                                                <div class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                                    Module {{ $module->order }}
                                                </div>
                                                @if(auth()->check() && auth()->user()->has_paid)
                                                <div class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                                    DÉBLOQUÉ
                                                </div>
                                                @else
                                                <div class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                                    PAYANT
                                                </div>
                                                @endif
                                            </div>
                                            
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $module->title }}</h3>
                                            <p class="text-gray-600 text-sm leading-relaxed mb-3 line-clamp-2">{{ $module->description }}</p>
                                            
                                            <!-- Progress & Stats -->
                                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                                <div class="flex items-center">
                                                    <svg class="w-3 h-3 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                                    </svg>
                                                    {{ $module->courses->count() }} leçons
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Action Button -->
                                        <div class="lg:text-right">
                                            @if(auth()->check() && auth()->user()->has_paid)
                                            <a href="{{ route('modules.show', $module->id) }}" 
                                               class="inline-flex items-center bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold px-6 py-3 rounded-lg transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5 text-sm">
                                                <span>Commencer</span>
                                                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                            @else
                                            <a href="{{ route('pricing') }}" 
                                               class="inline-flex items-center bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-600 hover:to-amber-700 text-white font-bold px-6 py-3 rounded-lg transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Débloquer</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8 bg-white rounded-xl shadow-lg border border-gray-200">
                            <p class="text-gray-600">Aucun module théorique actif pour le moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Modules Pratiques -->
            <div x-show="selectedPhase === 'all' || selectedPhase === 'pratique'" class="pt-4">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-1">Modules Pratiques</h2>
                        <p class="text-gray-600 text-sm">Appliquez vos connaissances en situation réelle</p>
                    </div>
                    <div class="hidden lg:block">
                        <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-lg font-medium text-sm">
                            {{ $modules->where('is_practical', true)->count() }} modules
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 lg:grid-cols-1">
                    @forelse($modules->where('is_practical', true) as $module)
                        <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                            
                            <div class="flex flex-col lg:flex-row">
                                <!-- Visual Section avec image du module -->
                                <div class="lg:w-48 relative overflow-hidden bg-gray-100">
                                    @if($module->image)
                                        <img src="{{ asset('storage/' . $module->image) }}" alt="{{ $module->title }}" class="w-full h-48 lg:h-full object-cover">
                                    @else
                                        <!-- Fallback si pas d'image -->
                                        <div class="w-full h-48 lg:h-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                            <div class="text-white text-center p-4">
                                                <svg class="w-12 h-12 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="text-sm font-medium">Module {{ $module->order }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content Section -->
                                <div class="flex-1 p-6">
                                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between h-full">
                                        <div class="flex-1 mb-4 lg:mb-0">
                                            <div class="flex items-center space-x-2 mb-3">
                                                <div class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">
                                                    Module Pratique {{ $module->order }}
                                                </div>
                                                @if(auth()->check() && auth()->user()->has_paid)
                                                <div class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                                    DÉBLOQUÉ
                                                </div>
                                                @else
                                                <div class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                                    PAYANT
                                                </div>
                                                @endif
                                            </div>
                                            
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $module->title }}</h3>
                                            <p class="text-gray-600 text-sm leading-relaxed mb-3 line-clamp-2">{{ $module->description }}</p>
                                            
                                            <!-- Progress & Stats -->
                                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                                <div class="flex items-center">
                                                    <svg class="w-3 h-3 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                                    </svg>
                                                    {{ $module->courses->count() }} exercices pratiques
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Action Button -->
                                        <div class="lg:text-right">
                                            @if(auth()->check() && auth()->user()->has_paid)
                                            <a href="{{ route('modules.show', $module->id) }}" 
                                               class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold px-6 py-3 rounded-lg transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5 text-sm">
                                                <span>Commencer</span>
                                                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                            @else
                                            <a href="{{ route('pricing') }}" 
                                               class="inline-flex items-center bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-600 hover:to-amber-700 text-white font-bold px-6 py-3 rounded-lg transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Débloquer</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8 bg-white rounded-xl shadow-lg border border-gray-200">
                            <p class="text-gray-600">Aucun module pratique actif pour le moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection