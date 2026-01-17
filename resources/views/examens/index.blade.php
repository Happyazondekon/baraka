@extends('layouts.app')

@section('title', 'Examens Blancs - Code de la Route')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50/30 py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Header Section avec image -->
        <div class="text-center mb-12">
            <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-slate-200 p-8 mb-8">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-purple-600"></div>
                <!-- Background decorative image -->
                <div class="absolute bottom-0 right-0 opacity-60">
                    <img src="{{ asset('images/hero-car.png') }}" alt="Hero Car" class="w-64 h-64 object-contain">
                </div>
                <div class="relative z-10 max-w-3xl mx-auto">
                    <div class="flex justify-center mb-4">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-4 bg-gradient-to-r from-slate-800 to-slate-900 bg-clip-text text-transparent">
                        Examens Blancs
                    </h1>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Testez vos connaissances avec des examens blancs interactifs. 
                    </p>
                </div>
            </div>
        </div>

        <!-- Stats Grid avec icônes améliorées -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="group bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-blue-50 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="flex items-center relative z-10">
                    <div class="bg-blue-100 text-blue-600 rounded-lg p-3 mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-900">{{ $mockExams->count() }}</div>
                        <div class="text-slate-600 text-sm">Examens disponibles</div>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-emerald-50 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="flex items-center relative z-10">
                    <div class="bg-emerald-100 text-emerald-600 rounded-lg p-3 mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-900">{{ $completedExams ?? 0 }}</div>
                        <div class="text-slate-600 text-sm">Examens terminés</div>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-violet-50 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="flex items-center relative z-10">
                    <div class="bg-violet-100 text-violet-600 rounded-lg p-3 mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-900">{{ $averageScore ?? 0 }}%</div>
                        <div class="text-slate-600 text-sm">Score moyen</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Examen Aléatoire Bouton -->
        @if($mockExams && $mockExams->count() > 0)
        <div class="mb-12">
            <div class="flex justify-center mb-8">
                <a href="{{ route('examens.start.random') }}" 
                   class="group inline-flex items-center gap-3 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    <svg class="w-6 h-6 group-hover:animate-spin" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7.5 2a5.5 5.5 0 015.28 7.889c.202.758.688 1.762 1.173 2.777C15.956 15.722 17.857 18 20 18a1 1 0 100-2c-1.654 0-3.08-1.95-4.313-4.612-.306-.675-.575-1.414-.834-2.110a5.5 5.5 0 11-7.353-7.278z"/>
                    </svg>
                    Lancer un examen aléatoire
                </a>
            </div>
        </div>
        @endif

        <!-- Examens Personnalisés -->
        @if($mockExams && $mockExams->count() > 0)
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900">Examens Personnalisés</h2>
                </div>
                <span class="bg-purple-100 text-purple-700 text-sm font-medium px-3 py-1 rounded-full">
                    {{ $mockExams->count() }} examen(s)
                </span>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($mockExams as $exam)
                <div class="group bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -translate-y-10 translate-x-10"></div>
                        <!-- Background car image -->
                        <div class="absolute bottom-0 right-0 opacity-90">
                            <img src="{{ asset('images/learning-car.png') }}" alt="Car" class="w-16 h-16 object-contain">
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-3">
                                <h3 class="text-lg font-bold leading-tight">{{ $exam->title }}</h3>
                                <div class="bg-white/20 rounded-lg px-2 py-1 text-xs font-semibold ml-3 flex-shrink-0">
                                    {{ $exam->questions_count }} Q
                                </div>
                            </div>
                            @if($exam->description)
                            <p class="text-purple-100 text-sm opacity-90 leading-relaxed">
                                {{ Str::limit($exam->description, 80) }}
                            </p>
                            @endif
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center text-sm text-slate-600">
                                <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                Score de passage : <span class="font-semibold text-slate-900 ml-1">{{ $exam->passing_score }}%</span>
                            </div>
                            <div class="flex items-center text-sm text-slate-600">
                                <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                                    <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                Durée : <span class="font-semibold text-slate-900 ml-1">{{ $exam->time_limit }} min</span>
                            </div>
                            <div class="flex items-center text-sm text-slate-600">
                                <div class="w-6 h-6 bg-{{ $exam->is_active ? 'emerald' : 'red' }}-100 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                                    <svg class="w-3 h-3 text-{{ $exam->is_active ? 'emerald' : 'red' }}-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                Statut : <span class="font-semibold text-slate-900 ml-1">{{ $exam->is_active ? 'Actif' : 'Inactif' }}</span>
                            </div>
                        </div>

                        <a href="{{ route('examens.start.specific', $exam) }}" 
                           class="w-full inline-flex items-center justify-center bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold px-4 py-3 rounded-lg transition-all duration-300 group shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Commencer l'examen
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif



        <!-- Historique des Examens -->
        @if($recentExams && $recentExams->count() > 0)
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Vos derniers examens</h3>
                </div>
                <span class="bg-slate-100 text-slate-700 text-sm font-medium px-3 py-1 rounded-full">
                    {{ $recentExams->count() }} résultat(s)
                </span>
            </div>

            <div class="space-y-4">
                @foreach($recentExams as $exam)
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition-colors group border border-slate-200">
                    <div class="flex items-center">
                        <div class="w-10 h-10 flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-bold mr-4 group-hover:scale-110 transition-transform">
                            {{ $loop->iteration }}
                        </div>
                        <div>
                            <div class="font-semibold text-slate-800">
                                Examen du {{ $exam->created_at->format('d/m/Y') }}
                            </div>
                            <div class="text-sm text-slate-600">
                                {{ $exam->total_questions }} questions • {{ gmdate('i:s', $exam->time_taken) }} minutes
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <div class="text-lg font-bold {{ $exam->score >= 80 ? 'text-emerald-600' : ($exam->score >= 60 ? 'text-amber-600' : 'text-red-600') }}">
                                {{ $exam->score }}%
                            </div>
                            <div class="text-sm text-slate-600">
                                {{ $exam->correct_answers }}/{{ $exam->total_questions }} correctes
                            </div>
                        </div>
                        <a href="{{ route('examens.results', $exam) }}" 
                           class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-colors text-sm font-medium inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Détails
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <!-- Empty State avec image -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-12 text-center relative overflow-hidden">
            <!-- Background road image -->
            <div class="absolute bottom-0 right-0 opacity-90">
                <img src="{{ asset('images/car.png') }}" alt="Road" class="w-64 h-64 object-contain">
            </div>
            <div class="relative z-10">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Aucun examen passé</h3>
                <p class="text-slate-600 mb-6 max-w-md mx-auto">
                    Commencez votre premier examen blanc pour évaluer vos connaissances et suivre votre progression.
                </p>
                <a href="{{ route('examens.start.specific', $exam) }}" 
                   class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition-all duration-300 shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"/>
                    </svg>
                    Commencer mon premier examen
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection