@extends('layouts.app')

@section('title', $module->title ?? 'Module')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Breadcrumb -->
    <div class="mb-4">
        <a href="{{ route('modules.index') }}" class="text-gray-600 hover:text-gray-800 text-sm flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Tous les modules
        </a>
    </div>

    <!-- Header Section avec style AutoPermis -->
    <div class="bg-gradient-to-r from-green-100 to-green-200 rounded-2xl p-8 mb-8 relative overflow-hidden">
        <div class="flex justify-between items-center relative z-10">
            <div class="flex-1">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Phase théorique : Code de la route</h1>
                <h2 class="text-xl font-semibold text-gray-700 mb-3">{{ $module->title }}</h2>
                <p class="text-gray-600 leading-relaxed max-w-lg">{{ $module->description }}</p>
            </div>
            
            <!-- Cercle avec numéro du module -->
            <div class="bg-white rounded-full w-32 h-32 flex flex-col items-center justify-center shadow-lg ml-8">
                <div class="text-3xl font-bold text-gray-800">
                    {{ str_pad($module->order, 2, '0', STR_PAD_LEFT) }} / {{ $totalModules ?? '08' }}
                </div>
                <div class="text-sm text-gray-600 mt-1">Modules</div>
            </div>
        </div>
        
        <!-- Decoration circles -->
        <div class="absolute top-4 right-4 w-20 h-20 bg-white bg-opacity-20 rounded-full"></div>
        <div class="absolute bottom-6 right-16 w-12 h-12 bg-white bg-opacity-15 rounded-full"></div>
    </div>

    <!-- Module Title avec numérotation -->
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-center text-gray-800">
            Module {{ $module->order }} : {{ $module->title }}
        </h3>
    </div>

    <!-- Video/Image Section -->
    @if($module->video_url || $module->image)
    <div class="mb-8">
        <div class="relative bg-black rounded-xl overflow-hidden shadow-lg">
            @if($module->video_url)
                <video controls class="w-full h-80 object-cover">
                    <source src="{{ $module->video_url }}" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéos.
                </video>
                <!-- Play button overlay pour style -->
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="bg-white bg-opacity-20 rounded-full p-6">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
            @else
                <img src="{{ $module->image }}" alt="{{ $module->title }}" class="w-full h-80 object-cover">
            @endif
        </div>
    </div>
    @endif

    <!-- Button "Allons plus en détail" -->
    <div class="text-center mb-8">
        <button class="text-gray-700 font-medium hover:text-gray-900 transition-colors">
            Allons plus en détail !
        </button>
    </div>

    <!-- Contenu des cours dans un style card -->
    @if($module->courses->isNotEmpty())
    <div class="bg-green-50 rounded-2xl p-6 mb-8">
        <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Les Types de Signalisations
        </h4>
        
        @foreach($module->courses as $course)
        <div class="mb-6">
            <h5 class="font-medium text-gray-800 mb-2 flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                </svg>
                {{ $course->title }}
            </h5>
            <div class="text-sm text-gray-600 ml-6 space-y-1">
                <p>{{ $course->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Section Quiz/Test -->
    @if($module->quiz)
    <div class="bg-white rounded-2xl p-6 shadow-sm border mb-8">
        <h3 class="text-xl font-semibold text-center text-gray-800 mb-6">Test de Validation (QCM)</h3>
        
        <div class="space-y-6">
            @foreach($module->quiz->questions as $index => $question)
            <div class="border-l-4 border-green-500 pl-4">
                <div class="flex items-start">
                    <div class="bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-medium mr-3 mt-1">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800 mb-3">{{ $question->question_text }}</p>
                        
                        <div class="space-y-2">
                            @foreach($question->answers as $answer)
                            <label class="flex items-center space-x-3 p-2 rounded hover:bg-gray-50 cursor-pointer">
                                <input type="radio" name="question_{{ $question->id }}" value="{{ $answer->id }}" class="text-green-500">
                                <span class="text-gray-700">{{ $answer->answer_text }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Bouton de validation -->
        <div class="text-center mt-8">
            <button class="bg-green-500 hover:bg-green-600 text-white font-medium px-8 py-3 rounded-lg transition-colors">
                Valider mes réponses
            </button>
        </div>

        <!-- Message de fin -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">Fiche récapitulatif du module !</p>
        </div>
    </div>
    @endif

    <!-- Navigation -->
    <div class="flex justify-between items-center mt-8">
        @if($previousModule)
        <a href="{{ route('modules.show', $previousModule->id) }}" class="text-gray-600 hover:text-gray-800 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Module précédent
        </a>
        @else
        <div></div>
        @endif

        @if($nextModule)
        <a href="{{ route('modules.show', $nextModule->id) }}" class="text-gray-600 hover:text-gray-800 flex items-center">
            Module suivant
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        @else
        <div></div>
        @endif
    </div>
</div>
@endsection