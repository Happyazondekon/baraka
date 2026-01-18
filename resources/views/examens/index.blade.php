@extends('layouts.app')

@section('title', 'Examens Blancs - Code de la Route')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50/30 py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="relative bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 p-8">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-32 translate-x-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-24 -translate-x-24"></div>

                    <div class="absolute bottom-0 right-8 opacity-80 hidden lg:block">
                        <img src="{{ asset('images/hero-car.png') }}" alt="Hero Car" class="w-80 h-80 object-contain">
                    </div>
                    
                    <div class="relative z-10 max-w-3xl">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-1.5 rounded-full">
                                Préparation à l'examen
                            </span>
                        </div>
                        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">Examens Blancs</h1>
                        <p class="text-lg text-blue-50 leading-relaxed">
                            Mettez-vous en situation réelle d'examen avec nos examens blancs chronométrés.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-200">
                    <div class="p-6 text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-100 rounded-xl mb-3">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-slate-900 mb-1">{{ $mockExams->count() }}</div>
                        <div class="text-sm text-slate-600">Examens disponibles</div>
                    </div>
                    <div class="p-6 text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-emerald-100 rounded-xl mb-3">
                            <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-slate-900 mb-1">{{ $completedExams ?? 0 }}</div>
                        <div class="text-sm text-slate-600">Examens réussis</div>
                    </div>
                    <div class="p-6 text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-violet-100 rounded-xl mb-3">
                            <svg class="w-6 h-6 text-violet-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-slate-900 mb-1">{{ $averageScore ?? 0 }}%</div>
                        <div class="text-sm text-slate-600">Score moyen</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouton Examen Aléatoire -->
        @if($mockExams && $mockExams->count() > 0)
        <div class="mb-8">
            <div class="bg-gradient-to-br from-amber-500 via-orange-500 to-red-500 rounded-2xl shadow-lg overflow-hidden relative group">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-400/20 to-orange-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-32 translate-x-32"></div>
                <div class="absolute bottom-0 right-0 opacity-80 group-hover:opacity-20 transition-opacity">
                    <img src="{{ asset('images/learning-car.png') }}" alt="Car" class="w-48 h-48 object-contain transform group-hover:scale-110 transition-transform duration-500">
                </div>
                
                <div class="relative z-10 p-8 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="text-white flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:rotate-180 transition-transform duration-500">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M7.5 2a5.5 5.5 0 015.28 7.889c.202.758.688 1.762 1.173 2.777C15.956 15.722 17.857 18 20 18a1 1 0 100-2c-1.654 0-3.08-1.95-4.313-4.612-.306-.675-.575-1.414-.834-2.11a5.5 5.5 0 11-7.353-7.278z"/>
                                </svg>
                            </div>
                            <span class="bg-white/20 backdrop-blur-sm text-sm font-semibold px-3 py-1 rounded-full">Mode Challenge</span>
                        </div>
                        <h2 class="text-3xl font-bold mb-2">Examen Aléatoire</h2>
                        <p class="text-amber-50 text-lg">Testez-vous avec un examen généré aléatoirement</p>
                        <div class="flex flex-wrap gap-3 mt-4">
                            <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-lg">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-medium">40 questions</span>
                            </div>
                            <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-lg">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-medium">30 minutes</span>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('examens.start.random') }}" 
                       class="flex-shrink-0 inline-flex items-center gap-3 bg-white hover:bg-amber-50 text-orange-600 font-bold px-8 py-4 rounded-xl transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 group/btn">
                        <svg class="w-6 h-6 group-hover/btn:rotate-90 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.5 2a5.5 5.5 0 015.28 7.889c.202.758.688 1.762 1.173 2.777C15.956 15.722 17.857 18 20 18a1 1 0 100-2c-1.654 0-3.08-1.95-4.313-4.612-.306-.675-.575-1.414-.834-2.11a5.5 5.5 0 11-7.353-7.278z"/>
                        </svg>
                        <span>Démarrer maintenant</span>
                        <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endif

        <!-- Examens Personnalisés -->
        @if($mockExams && $mockExams->count() > 0)
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900">Examens Thématiques</h2>
                        <p class="text-sm text-slate-600">Choisissez selon vos besoins</p>
                    </div>
                </div>
                <span class="bg-purple-100 text-purple-700 text-sm font-semibold px-4 py-2 rounded-full">{{ $mockExams->count() }} disponible(s)</span>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($mockExams as $exam)
                <div class="group bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="relative bg-gradient-to-br from-purple-500 via-purple-600 to-indigo-600 p-6 text-white overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-16 translate-x-16"></div>
                        <div class="absolute bottom-0 right-0 opacity-80">
                            <img src="{{ asset('images/learning-car.png') }}" alt="Car" class="w-20 h-20 object-contain">
                        </div>
                        
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-3">
                                <h3 class="text-xl font-bold flex-1">{{ $exam->title }}</h3>
                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-2 text-center ml-3">
                                    <div class="text-2xl font-bold">{{ $exam->questions_count }}</div>
                                    <div class="text-xs opacity-90">questions</div>
                                </div>
                            </div>
                            @if($exam->description)
                            <p class="text-purple-100 text-sm opacity-90">{{ Str::limit($exam->description, 80) }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="space-y-3 mb-5">
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-slate-900">Score requis: {{ $exam->passing_score }}%</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-slate-900">Durée: {{ $exam->time_limit }} minutes</div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('examens.start.specific', $exam) }}" 
                           class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold px-4 py-3.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                            </svg>
                            Commencer l'examen
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Historique -->
        @if($recentExams && $recentExams->count() > 0)
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="bg-gradient-to-r from-slate-50 to-blue-50 border-b p-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Historique</h3>
                </div>
            </div>
            <div class="p-6 space-y-3">
                @foreach($recentExams as $exam)
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl font-bold flex items-center justify-center">{{ $loop->iteration }}</div>
                        <div>
                            <div class="font-semibold text-slate-900">{{ $exam->created_at->format('d/m/Y') }}</div>
                            <div class="text-xs text-slate-600">{{ $exam->total_questions }} questions</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-2xl font-bold {{ $exam->score >= 80 ? 'text-emerald-600' : ($exam->score >= 60 ? 'text-amber-600' : 'text-red-600') }}">{{ $exam->score }}%</div>
                        <a href="{{ route('examens.results', $exam) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">Détails</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection