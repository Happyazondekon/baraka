@extends('layouts.app')

@section('title', 'Statut de Progression')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50">
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-4 py-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Statut de Progression</h1>
                <p class="text-gray-600 text-lg">Suivez votre progression et débloquez de nouveaux modules</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <!-- Résumé Global -->
        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                    </svg>
                    Modules Théoriques
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total</span>
                        <span class="font-bold text-gray-900">{{ $summary['theorique']['total'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Déverrouillés</span>
                        <span class="font-bold text-green-600">{{ $summary['theorique']['unlocked'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Verrouillés</span>
                        <span class="font-bold text-red-600">{{ $summary['theorique']['locked'] }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ ($summary['theorique']['unlocked'] / max($summary['theorique']['total'], 1)) * 100 }}%"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    Modules Pratiques
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total</span>
                        <span class="font-bold text-gray-900">{{ $summary['pratique']['total'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Déverrouillés</span>
                        <span class="font-bold text-blue-600">{{ $summary['pratique']['unlocked'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Verrouillés</span>
                        <span class="font-bold text-red-600">{{ $summary['pratique']['locked'] }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ ($summary['pratique']['unlocked'] / max($summary['pratique']['total'], 1)) * 100 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modules Théoriques -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Progression des Modules Théoriques</h2>
            <div class="space-y-4">
                @forelse($theorique as $item)
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $item['module']->title }}</h3>
                                    @if($item['is_locked'])
                                        <span class="inline-flex items-center bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                            </svg>
                                            Verrouillé
                                        </span>
                                    @else
                                        <span class="inline-flex items-center bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            Déverrouillé
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-green-600">{{ $item['progress'] }}%</div>
                                <div class="text-xs text-gray-500">sur 80% requis</div>
                            </div>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-green-500 h-3 rounded-full transition-all duration-300" 
                                 style="width: {{ min($item['progress'], 100) }}%">
                            </div>
                        </div>

                        @if($item['lock_reason'])
                            <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <p class="text-sm text-yellow-800">
                                    <strong>Pour débloquer :</strong> {{ $item['lock_reason'] }}
                                </p>
                            </div>
                        @endif

                        <div class="mt-4 text-sm text-gray-600">
                            {{ $item['module']->courses->count() }} leçons
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 bg-white rounded-xl shadow-md border border-gray-200">
                        <p class="text-gray-600">Aucun module théorique.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modules Pratiques -->
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Progression des Modules Pratiques</h2>
            <div class="space-y-4">
                @forelse($pratique as $item)
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $item['module']->title }}</h3>
                                    @if($item['is_locked'])
                                        <span class="inline-flex items-center bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                            </svg>
                                            Verrouillé
                                        </span>
                                    @else
                                        <span class="inline-flex items-center bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            Déverrouillé
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-blue-600">{{ $item['progress'] }}%</div>
                                <div class="text-xs text-gray-500">sur 80% requis</div>
                            </div>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full transition-all duration-300" 
                                 style="width: {{ min($item['progress'], 100) }}%">
                            </div>
                        </div>

                        @if($item['lock_reason'])
                            <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <p class="text-sm text-yellow-800">
                                    <strong>Pour débloquer :</strong> {{ $item['lock_reason'] }}
                                </p>
                            </div>
                        @endif

                        <div class="mt-4 text-sm text-gray-600">
                            {{ $item['module']->courses->count() }} exercices pratiques
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 bg-white rounded-xl shadow-md border border-gray-200">
                        <p class="text-gray-600">Aucun module pratique.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Information sur le système de verrouillage -->
        <div class="mt-12 bg-blue-50 border border-blue-200 rounded-2xl p-6">
            <h3 class="text-lg font-bold text-blue-900 mb-3">ℹ️ Système de Verrouillage des Modules</h3>
            <p class="text-blue-800 mb-2">
                Pour avancer dans votre apprentissage et accéder aux modules suivants, vous devez atteindre au minimum <strong>80% de progression</strong> dans le module actuel.
            </p>
            <p class="text-blue-800">
                La progression est calculée en fonction de vos cours complétés et de vos résultats aux quizz associés au module.
            </p>
        </div>
    </div>
</div>
@endsection
