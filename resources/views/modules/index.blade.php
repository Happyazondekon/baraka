@extends('layouts.app')

@section('title', 'Cours')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="bg-white border-b">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    {{-- Phase Selector and Search Bar --}}
                    {{-- Le x-data est déplacé ici pour englober les deux champs --}}
                    <div class="flex items-center space-x-4" x-data="{ selectedPhase: 'all', searchTerm: '' }">
                        {{-- Phase Selector --}}
                        <div class="relative">
                            <select x-model="selectedPhase" class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="all">Toutes les phases</option>
                                <option value="theoretical">Phase théorique</option>
                                <option value="practical">Phase pratique</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        {{-- Search bar --}}
                        <div class="relative">
                           <input type="text" x-model="searchTerm" placeholder="Rechercher un cours..." class="w-80 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Language Selector Removed --}}
            </div>
        </div>
    </div>

    {{-- Utiliser le même x-data pour les éléments filtrables --}}
    <div class="container mx-auto px-4 py-8" x-data="{ selectedPhase: 'all', searchTerm: '' }">
        
        {{-- Phase théorique --}}
        <h2 x-show="selectedPhase === 'all' || selectedPhase === 'theoretical'" class="text-2xl font-bold text-gray-900 mb-6">Phase théorique</h2>
        <div class="space-y-6">
            @foreach($modules->where('is_practical', false) as $module)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden"
                    x-show="(selectedPhase === 'all' || selectedPhase === 'theoretical') && '{{ Str::lower($module->title) }}'.includes(searchTerm.toLowerCase())">
                    <div class="flex">
                        <div class="w-80 h-32 bg-gradient-to-br from-green-400 to-green-600 relative flex items-center justify-center">
                            <div class="absolute inset-0 opacity-30">
                                <svg viewBox="0 0 320 128" class="w-full h-full">
                                    <path d="M0 64 Q80 32 160 64 T320 64" stroke="#2d5016" stroke-width="8" fill="none"/>
                                    <path d="M0 68 Q80 36 160 68 T320 68" stroke="#4ade80" stroke-width="4" fill="none"/>
                                    <path d="M0 64 Q80 32 160 64 T320 64" stroke="white" stroke-width="2" stroke-dasharray="8,4" fill="none"/>
                                </svg>
                            </div>
                            <div class="relative z-10 flex items-center justify-center space-x-4">
                                <div class="bg-gray-800 rounded p-1">
                                    <div class="w-3 h-3 bg-red-500 rounded-full mb-1"></div>
                                    <div class="w-3 h-3 bg-yellow-400 rounded-full mb-1"></div>
                                    <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                </div>
                                <div class="bg-red-600 w-8 h-8 rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">STOP</span>
                                </div>
                                <div class="bg-white w-8 h-8 rounded-full border-2 border-red-500 flex items-center justify-center">
                                    <span class="text-red-500 text-xs font-bold">50</span>
                                </div>
                                <div class="bg-blue-600 w-8 h-8 rounded flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 p-6 flex items-center justify-between">
                            <div class="flex-1">
                                <div class="text-sm text-green-600 font-medium mb-1">Module {{ $module->order }}</div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $module->title }}</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $module->description }}</p>
                            </div>
                            <div class="ml-6">
                                {{-- LOGIQUE DE PAIEMENT : Vérifier si l'utilisateur a payé --}}
                                @if(auth()->check() && auth()->user()->payments()->where('status', 'completed')->exists())
                                    {{-- CAS 1 : L'utilisateur A PAYÉ --}}
                                    <a href="{{ route('modules.show', $module->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center">
                                        Commencer
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                @else
                                    {{-- CAS 2 : L'utilisateur N'A PAS PAYÉ --}}
                                    {{-- Le lien mène toujours à modules.show, mais le middleware 'payment.required' va bloquer et rediriger vers /tarifs --}}
                                    <a href="{{ route('modules.show', $module->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center">
                                        Débloquer
                                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Phase pratique --}}
        <h2 x-show="selectedPhase === 'all' || selectedPhase === 'practical'" class="text-2xl font-bold text-gray-900 mb-6 mt-12">Phase pratique</h2>
        <div class="space-y-6">
            @foreach($modules->where('is_practical', true) as $module)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden"
                    x-show="(selectedPhase === 'all' || selectedPhase === 'practical') && '{{ Str::lower($module->title) }}'.includes(searchTerm.toLowerCase())">
                    <div class="flex">
                        <div class="w-80 h-32 bg-gradient-to-br from-blue-400 to-blue-600 relative flex items-center justify-center">
                            <div class="absolute inset-0 opacity-30">
                                <svg viewBox="0 0 320 128" class="w-full h-full">
                                    <path d="M40 64 L280 64" stroke="#1e3a8a" stroke-width="12" fill="none"/>
                                    <path d="M40 64 L280 64" stroke="#60a5fa" stroke-width="8" fill="none"/>
                                    <path d="M40 64 L280 64" stroke="white" stroke-width="2" stroke-dasharray="12,8" fill="none"/>
                                </svg>
                            </div>
                            <div class="relative z-10 flex items-center justify-center space-x-4">
                                <div class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="bg-white w-12 h-6 rounded-sm flex items-center justify-center">
                                    <div class="w-8 h-4 bg-gray-700 rounded-sm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 p-6 flex items-center justify-between">
                            <div class="flex-1">
                                <div class="text-sm text-blue-600 font-medium mb-1">Module {{ $module->order }}</div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $module->title }}</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $module->description }}</p>
                            </div>
                            <div class="ml-6">
                                {{-- LOGIQUE DE PAIEMENT : Vérifier si l'utilisateur a payé --}}
                                @if(auth()->check() && auth()->user()->payments()->where('status', 'completed')->exists())
                                    {{-- CAS 1 : L'utilisateur A PAYÉ --}}
                                    <a href="{{ route('modules.show', $module->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center">
                                        Commencer
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                @else
                                    {{-- CAS 2 : L'utilisateur N'A PAS PAYÉ --}}
                                    <a href="{{ route('modules.show', $module->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center">
                                        Débloquer
                                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection