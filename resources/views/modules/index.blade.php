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
                            <div class="text-2xl font-bold text-blue-600">{{ $modules->count() }}</div>
                            <div class="text-sm text-gray-600">Modules disponibles</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-10">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
                <div class="flex flex-col sm:flex-row sm:items-center space-y-3 sm:space-y-0 sm:space-x-4" 
                     x-data="{ selectedPhase: 'all', searchTerm: '' }">
                    
                    <!-- Phase Selector -->
                    <div class="relative">
                        <select x-model="selectedPhase" 
                                class="appearance-none bg-white border-2 border-gray-200 rounded-xl px-4 py-3 pr-10 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200 w-full sm:w-48">
                            <option value="all">Toutes les phases</option>
                            <option value="theoretical">Phase théorique</option>
                            <option value="practical">Phase pratique</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="relative flex-1 min-w-0">
                        <input type="text" 
                               x-model="searchTerm" 
                               placeholder="Rechercher un cours..." 
                               class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="flex items-center space-x-2 text-sm text-gray-600">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <div>{{ auth()->user()->completedCourses()->count() }} leçons terminées</div>
                    <div class="h-4 w-px bg-gray-300"></div>
                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.39 2.462a1 1 0 00-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.54 1.118l-3.39-2.462a1 1 0 00-1.175 0l-3.39 2.462c-.784.57-1.838-.197-1.539-1.118l1.286-3.966a1 1 0 00-.364-1.118L2.235 9.393c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.951-.69l1.285-3.966z"/>               </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8" x-data="{ selectedPhase: 'all', searchTerm: '' }">
        
        <!-- Theoretical Phase -->
        <div x-show="selectedPhase === 'all' || selectedPhase === 'theoretical'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform -translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0">
            
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">Phase théorique</h2>
                    <p class="text-gray-600 text-sm">Apprenez les règles essentielles du code de la route</p>
                </div>
                <div class="hidden lg:block">
                    <div class="bg-green-100 text-green-800 px-3 py-1 rounded-lg font-medium text-sm">
                        {{ $modules->where('is_practical', false)->count() }} modules
                    </div>
                </div>
            </div>

            <div class="grid gap-4 lg:grid-cols-2 xl:grid-cols-1">
                @foreach($modules->where('is_practical', false) as $module)
                <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5"
                    x-show="(selectedPhase === 'all' || selectedPhase === 'theoretical') && '{{ Str::lower($module->title) }}'.includes(searchTerm.toLowerCase())">
                    
                    <div class="flex flex-col lg:flex-row">
                        <!-- Visual Section - Plus compacte -->
                        <div class="lg:w-48 bg-gradient-to-br from-green-500 to-emerald-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/10"></div>
                            <div class="relative h-32 lg:h-full flex items-center justify-center p-4">
                                <!-- Animated Road Elements -->
                                <div class="absolute inset-0 overflow-hidden">
                                    <div class="absolute top-1/2 left-0 right-0 h-1 bg-yellow-400 transform -translate-y-1/2">
                                        <div class="absolute inset-0 bg-yellow-400 animate-pulse" style="animation-duration: 2s;"></div>
                                    </div>
                                    <div class="absolute top-1/2 left-0 w-3 h-6 bg-white border-2 border-gray-800 transform -translate-y-1/2 animate-moveCar" style="animation-duration: 3s;"></div>
                                </div>
                                
                                <!-- Traffic Elements - Plus petits -->
                                <div class="relative z-10 flex items-center justify-center space-x-2">
                                    <div class="bg-gray-800 rounded p-1 shadow">
                                        <div class="w-3 h-3 bg-red-500 rounded-full mb-0.5 animate-pulse"></div>
                                        <div class="w-3 h-3 bg-yellow-400 rounded-full mb-0.5"></div>
                                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                    </div>
                                    <div class="bg-red-600 w-8 h-8 rounded-full flex items-center justify-center shadow">
                                        <span class="text-white text-xs font-bold">STOP</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Section - Plus compacte -->
                        <div class="flex-1 p-6">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between h-full">
                                <div class="flex-1 mb-4 lg:mb-0">
                                    <div class="flex items-center space-x-2 mb-3">
                                        <div class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                            Module {{ $module->order }}
                                        </div>
                                        @if($module->is_completed)
                                        <div class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            Terminé
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
                                            {{ $module->courses_count }} leçons
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-3 h-3 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                            </svg>
                                            ~{{ $module->estimated_duration }} min
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="lg:text-right">
                                    @if(auth()->check() && auth()->user()->payments()->where('status', 'completed')->exists())
                                    <a href="{{ route('modules.show', $module->id) }}" 
                                       class="inline-flex items-center bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold px-6 py-2 rounded-lg transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5 text-sm">
                                        <span>Commencer</span>
                                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                    @else
                                    <a href="{{ route('modules.show', $module->id) }}" 
                                       class="inline-flex items-center bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-600 hover:to-amber-700 text-white font-bold px-6 py-2 rounded-lg transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5 text-sm">
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
                @endforeach
            </div>
        </div>

        <!-- Practical Phase -->
        <div x-show="selectedPhase === 'all' || selectedPhase === 'practical'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform -translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="mt-12">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">Phase pratique</h2>
                    <p class="text-gray-600 text-sm">Appliquez vos connaissances en situation réelle</p>
                </div>
                <div class="hidden lg:block">
                    <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-lg font-medium text-sm">
                        {{ $modules->where('is_practical', true)->count() }} modules
                    </div>
                </div>
            </div>

            <div class="grid gap-4 lg:grid-cols-2 xl:grid-cols-1">
                @foreach($modules->where('is_practical', true) as $module)
                <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5"
                    x-show="(selectedPhase === 'all' || selectedPhase === 'practical') && '{{ Str::lower($module->title) }}'.includes(searchTerm.toLowerCase())">
                    
                    <div class="flex flex-col lg:flex-row">
                        <!-- Visual Section - Plus compacte -->
                        <div class="lg:w-48 bg-gradient-to-br from-blue-500 to-blue-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/10"></div>
                            <div class="relative h-32 lg:h-full flex items-center justify-center p-4">
                                <!-- Highway Elements -->
                                <div class="absolute inset-0 overflow-hidden">
                                    <div class="absolute top-1/2 left-0 right-0 h-2 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="absolute top-1/2 left-0 right-0 h-1 bg-white border-dashed border-y border-gray-400 transform -translate-y-1/2"></div>
                                </div>
                                
                                <!-- Driving Elements - Plus petits -->
                                <div class="relative z-10 flex items-center justify-center space-x-3">
                                    <div class="bg-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="bg-white w-12 h-6 rounded-sm flex items-center justify-center shadow border border-gray-800">
                                        <div class="w-8 h-3 bg-gray-700 rounded-sm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Section - Plus compacte -->
                        <div class="flex-1 p-6">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between h-full">
                                <div class="flex-1 mb-4 lg:mb-0">
                                    <div class="flex items-center space-x-2 mb-3">
                                        <div class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">
                                            Module {{ $module->order }}
                                        </div>
                                        @if($module->is_completed)
                                        <div class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            Terminé
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
                                            {{ $module->courses_count }} leçons
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-3 h-3 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                            </svg>
                                            ~{{ $module->estimated_duration }} min
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="lg:text-right">
                                    @if(auth()->check() && auth()->user()->payments()->where('status', 'completed')->exists())
                                    <a href="{{ route('modules.show', $module->id) }}" 
                                       class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold px-6 py-2 rounded-lg transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5 text-sm">
                                        <span>Commencer</span>
                                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                    @else
                                    <a href="{{ route('modules.show', $module->id) }}" 
                                       class="inline-flex items-center bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-600 hover:to-amber-700 text-white font-bold px-6 py-2 rounded-lg transition-all duration-300 shadow hover:shadow-md transform hover:-translate-y-0.5 text-sm">
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
                @endforeach
            </div>
        </div>

        <!-- Empty State -->
        <div x-show="(selectedPhase === 'all' && document.querySelectorAll('[x-show*=\"selectedPhase ===\"] .bg-white').length === 0) || 
                    (selectedPhase !== 'all' && document.querySelectorAll('[x-show*=\"selectedPhase === '\" + selectedPhase + \"'\"] .bg-white').length === 0)"
             class="text-center py-12">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-1">Aucun module trouvé</h3>
            <p class="text-gray-600 text-sm">Essayez de modifier vos critères de recherche ou de filtre</p>
        </div>
    </div>
</div>

<style>
@keyframes moveCar {
    0% { transform: translateX(-100%) translateY(-50%); }
    100% { transform: translateX(400%) translateY(-50%); }
}

.animate-moveCar {
    animation: moveCar 3s linear infinite;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection