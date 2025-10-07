@extends('layouts.app')

@section('title', $module->title ?? 'Module')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Navigation -->
        <div class="mb-8">
            <a href="{{ route('modules.index') }}" class="inline-flex items-center text-green-600 hover:text-green-800 font-medium transition-colors group">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Tous les modules
            </a>
        </div>

        <!-- Module Header -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-8 border border-green-100">
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white bg-opacity-10 rounded-full -translate-y-32 translate-x-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white bg-opacity-10 rounded-full translate-y-24 -translate-x-24"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between">
                    <div class="flex-1 text-white mb-6 lg:mb-0">
                        <div class="inline-flex items-center px-3 py-1 rounded-full bg-white bg-opacity-20 text-sm font-medium mb-4">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                            </svg>
                            Phase théorique
                        </div>
                        <h1 class="text-3xl lg:text-4xl font-bold mb-3">Code de la route</h1>
                        <h2 class="text-xl lg:text-2xl font-semibold opacity-95 mb-4">{{ $module->title }}</h2>
                        <p class="text-green-100 text-lg leading-relaxed max-w-2xl">{{ $module->description }}</p>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 text-center shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <div class="text-4xl font-bold text-gray-800 mb-2">
                            {{ str_pad($module->order, 2, '0', STR_PAD_LEFT) }}<span class="text-2xl text-gray-500">/{{ $totalModules ?? '08' }}</span>
                        </div>
                        <div class="text-sm text-gray-600 font-medium">Modules</div>
                        <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full mx-auto mt-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Module Title -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center bg-white rounded-full px-6 py-3 shadow-md border border-green-100">
                <div class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></div>
                <h3 class="text-xl font-bold text-gray-800">
                    Module {{ $module->order }} : {{ $module->title }}
                </h3>
            </div>
        </div>

        <!-- Courses Section -->
        @if($module->courses->isNotEmpty())
        <div class="mb-12">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-8 mb-8 border border-green-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-green-500 text-white rounded-xl p-3 mr-4 shadow-md">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800">Contenu du Module</h4>
                            <p class="text-gray-600">{{ $module->courses->count() }} leçon(s) disponible(s)</p>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            Cliquez pour développer chaque leçon
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                @foreach($module->courses as $index => $course)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-300">
                    <button type="button" 
                            onclick="toggleCourse({{ $course->id }})"
                            class="w-full p-6 flex items-center justify-between hover:bg-gray-50 transition-colors group">
                        <div class="flex items-center space-x-4 flex-1">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-md">
                                    {{ $index + 1 }}
                                </div>
                                @if($course->isCompletedBy(auth()->user()))
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @endif
                            </div>
                            
                            <div class="text-left flex-1">
                                <h5 class="text-lg font-semibold text-gray-800 group-hover:text-green-700 transition-colors">{{ $course->title }}</h5>
                                <div class="flex items-center text-sm text-gray-500 mt-1">
                                    @if($course->video_url)
                                    <span class="flex items-center mr-4">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                        </svg>
                                        Vidéo
                                    </span>
                                    @endif
                                    @if($course->audio_url)
                                    <span class="flex items-center mr-4">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                                        </svg>
                                        Audio
                                    </span>
                                    @endif
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        ~{{ ceil(str_word_count(strip_tags($course->content)) / 200) }} min
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <svg id="chevron-{{ $course->id }}" class="w-6 h-6 text-gray-400 transform transition-transform duration-300 group-hover:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div id="course-{{ $course->id }}" class="hidden border-t border-gray-200">
                        <div class="p-6">
                            @if($course->video_url)
                            <div class="mb-6">
                                <div class="relative bg-black rounded-xl overflow-hidden shadow-lg">
                                    @if(str_contains($course->video_url, 'youtube.com') || str_contains($course->video_url, 'youtu.be'))
                                        @php
                                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $course->video_url, $matches);
                                            $youtube_id = $matches[1] ?? null;
                                        @endphp
                                        
                                        @if($youtube_id)
                                        <div class="aspect-video">
                                            <iframe 
                                                width="100%" 
                                                height="100%" 
                                                src="https://www.youtube.com/embed/{{ $youtube_id }}" 
                                                frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen
                                                class="w-full h-full">
                                            </iframe>
                                        </div>
                                        @endif
                                    @else
                                        <video controls class="w-full rounded-lg">
                                            <source src="{{ $course->video_url }}" type="video/mp4">
                                            Votre navigateur ne supporte pas la lecture de vidéos.
                                        </video>
                                    @endif
                                </div>
                            </div>
                            @endif

                            @if($course->audio_url)
                            <div class="mb-6">
                                <div class="bg-gradient-to-r from-gray-50 to-green-50 rounded-xl p-6 border border-green-200 shadow-sm">
                                    <div class="flex items-center mb-4">
                                        <div class="bg-green-500 text-white rounded-lg p-2 mr-3">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-lg font-semibold text-gray-800">Audio du cours</span>
                                            <p class="text-sm text-gray-600">Écoutez cette leçon en déplacement</p>
                                        </div>
                                    </div>
                                    <audio controls class="w-full rounded-lg">
                                        <source src="{{ $course->audio_url }}" type="audio/mpeg">
                                        Votre navigateur ne supporte pas la lecture audio.
                                    </audio>
                                </div>
                            </div>
                            @endif

                            <div class="prose prose-lg max-w-none mb-6">
                                <div class="text-gray-700 leading-relaxed text-lg">
                                    {!! nl2br(e($course->content)) !!}
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                <div class="text-sm text-gray-500 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    Temps estimé : ~{{ ceil(str_word_count(strip_tags($course->content)) / 200) }} minutes
                                </div>

                                @if(!$course->isCompletedBy(auth()->user()))
                                <form action="{{ route('courses.complete', $course) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-medium px-6 py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Marquer comme terminé
                                    </button>
                                </form>
                                @else
                                <div class="flex items-center text-green-600 font-medium bg-green-50 px-4 py-2 rounded-full">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Leçon terminée
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-8 text-center mb-8 shadow-sm">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Contenu en préparation</h3>
            <p class="text-gray-600">Les leçons de ce module seront bientôt disponibles.</p>
        </div>
        @endif

        <!-- Quiz Section -->
        @if($module->quiz)
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl lg:text-3xl font-bold mb-2">Test de Validation</h3>
                        <p class="text-blue-100 text-lg">Évaluez vos connaissances avec ce QCM</p>
                    </div>
                    <div class="hidden lg:block">
                        <div class="bg-white bg-opacity-20 rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold">{{ $module->quiz->questions->count() }}</div>
                            <div class="text-sm opacity-90">Questions</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded-xl p-6 mb-8">
                    <div class="flex items-start">
                        <div class="bg-green-100 rounded-lg p-3 mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-green-800 mb-1">Quiz validé avec succès !</h4>
                            <p class="text-green-700">{{ session('success') }}</p>
                            @if(session('quiz_result_id'))
                            <button onclick="toggleResults()" class="mt-3 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                Voir les corrections
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                @if(session('warning'))
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6 mb-8">
                    <div class="flex items-start">
                        <div class="bg-yellow-100 rounded-lg p-3 mr-4">
                            <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-yellow-800 mb-1">Attention !</h4>
                            <p class="text-yellow-700">{{ session('warning') }}</p>
                            @if(session('quiz_result_id'))
                            <button onclick="toggleResults()" class="mt-3 bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                Voir les corrections
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-50 border border-red-200 rounded-xl p-6 mb-8">
                    <div class="flex items-start">
                        <div class="bg-red-100 rounded-lg p-3 mr-4">
                            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-red-800 mb-1">Erreur !</h4>
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
                @endif

               @if(session('quiz_result_id') && session('detailed_results'))
<div id="resultsSection" class="hidden mb-8">
    <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-6 border border-blue-200">
        <h4 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <div class="bg-blue-500 text-white rounded-lg p-2 mr-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                </svg>
            </div>
            Correction du Quiz
        </h4>
        
        @php
            $questions = $module->quiz->questions;
        @endphp
        
        <div class="space-y-6">
            @foreach(session('detailed_results') as $index => $resultItem)
            @php
                $question = $questions[$index];
                $userAnswerIds = session('user_answers')[$question->id] ?? [];
                
                // Assurer que toutes les clés existent avec des valeurs par défaut
                $resultItem = array_merge([
                    'question_text' => '',
                    'image' => null,
                    'is_correct' => false,
                    'is_multiple_choice' => false,
                    'user_answers_text' => [],
                    'correct_answers_text' => [],
                    'explanation' => null
                ], $resultItem);
            @endphp
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border-2 {{ $resultItem['is_correct'] ? 'border-green-200' : 'border-red-200' }} shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 mr-4">
                        @if($resultItem['is_correct'])
                        <div class="bg-green-500 text-white rounded-xl w-10 h-10 flex items-center justify-center text-lg font-bold shadow-md">
                            ✓
                        </div>
                        @else
                        <div class="bg-red-500 text-white rounded-xl w-10 h-10 flex items-center justify-center text-lg font-bold shadow-md">
                            ✗
                        </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        @if($resultItem['image'])
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $resultItem['image']) }}" 
                                 alt="Image de la question" 
                                 class="max-h-64 w-auto rounded-lg shadow-md object-contain border border-gray-300">
                        </div>
                        @endif
                        
                        <p class="font-semibold text-gray-800 mb-3 text-lg">
                            Question {{ $index + 1 }}: {{ $resultItem['question_text'] }}
                        </p>
                        
                        @if($resultItem['is_multiple_choice'])
                        <div class="mb-3">
                            <span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-md">
                                Question à réponses multiples
                            </span>
                        </div>
                        @endif
                        
                        <!-- AFFICHAGE DES RÉPONSES AVEC PRÉSÉLECTION -->
                        <div class="space-y-4">
                            <!-- Affichage des réponses de l'utilisateur -->
                            <div class="bg-{{ $resultItem['is_correct'] ? 'green' : 'red' }}-100 border border-{{ $resultItem['is_correct'] ? 'green' : 'red' }}-300 rounded-lg p-4">
                                <div class="flex items-center text-{{ $resultItem['is_correct'] ? 'green' : 'red' }}-800 font-medium mb-2">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        @if($resultItem['is_correct'])
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        @else
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        @endif
                                    </svg>
                                    {{ $resultItem['is_correct'] ? 'Vos réponses correctes' : 'Vos réponses' }} :
                                </div>
                                <div class="text-{{ $resultItem['is_correct'] ? 'green' : 'red' }}-700">
                                    @if(is_array($resultItem['user_answers_text']) && count($resultItem['user_answers_text']) > 0)
                                        {{ implode(', ', $resultItem['user_answers_text']) }}
                                    @else
                                        <span class="italic">Aucune réponse sélectionnée</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Affichage des bonnes réponses (seulement si incorrect) -->
                            @if(!$resultItem['is_correct'])
                            <div class="bg-green-100 border border-green-300 rounded-lg p-4">
                                <div class="flex items-center text-green-800 font-medium mb-2">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Bonnes réponses :
                                </div>
                                <div class="text-green-700">
                                    @if(is_array($resultItem['correct_answers_text']))
                                        {{ implode(', ', $resultItem['correct_answers_text']) }}
                                    @else
                                        {{ $resultItem['correct_answers_text'] }}
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- AFFICHAGE VISUEL DES RÉPONSES AVEC PRÉSÉLECTION -->
                        <div class="mt-6">
                            <h4 class="font-semibold text-gray-700 mb-3">Détail des réponses :</h4>
                            <div class="space-y-3">
                                @php
                                    $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                                @endphp
                                @foreach($question->answers as $answerIndex => $answer)
                                @php
                                    $isUserAnswer = in_array($answer->id, $userAnswerIds);
                                    $isCorrectAnswer = $answer->is_correct;
                                @endphp
                                <div class="flex items-start p-4 rounded-xl border-2 
                                    {{ $isUserAnswer && $isCorrectAnswer ? 'border-green-500 bg-green-50' : '' }}
                                    {{ $isUserAnswer && !$isCorrectAnswer ? 'border-red-500 bg-red-50' : '' }}
                                    {{ !$isUserAnswer && $isCorrectAnswer ? 'border-green-300 bg-green-25' : '' }}
                                    {{ !$isUserAnswer && !$isCorrectAnswer ? 'border-gray-200' : '' }}
                                    transition-all duration-300">
                                    <div class="flex items-start flex-1">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg 
                                            {{ $isUserAnswer && $isCorrectAnswer ? 'bg-green-500 text-white' : '' }}
                                            {{ $isUserAnswer && !$isCorrectAnswer ? 'bg-red-500 text-white' : '' }}
                                            {{ !$isUserAnswer && $isCorrectAnswer ? 'bg-green-300 text-green-800' : '' }}
                                            {{ !$isUserAnswer && !$isCorrectAnswer ? 'bg-gray-100 text-gray-600' : '' }}
                                            font-bold text-sm mr-4 flex-shrink-0 shadow-sm">
                                            {{ $letters[$answerIndex] }}
                                        </span>
                                        <span class="text-gray-700 leading-relaxed font-medium flex-1">
                                            {{ $answer->answer_text }}
                                            @if($isUserAnswer && $isCorrectAnswer)
                                            <span class="ml-2 text-green-600 font-semibold">✓ Votre réponse correcte</span>
                                            @elseif($isUserAnswer && !$isCorrectAnswer)
                                            <span class="ml-2 text-red-600 font-semibold">✗ Votre réponse incorrecte</span>
                                            @elseif(!$isUserAnswer && $isCorrectAnswer)
                                            <span class="ml-2 text-green-600 font-semibold">✓ Bonne réponse</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        @if($resultItem['explanation'])
                        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <div class="bg-blue-100 text-blue-600 rounded-lg p-2 mr-3 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-blue-800 mb-2">Explication</h4>
                                    <p class="text-blue-700 leading-relaxed">{{ $resultItem['explanation'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-8 p-6 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl text-white shadow-lg">
            <div class="flex flex-col lg:flex-row items-center justify-between text-center lg:text-left">
                <div class="mb-4 lg:mb-0">
                    <div class="text-3xl font-bold mb-2">{{ session('quiz_score') }}%</div>
                    <div class="text-blue-100">Score final</div>
                </div>
                <div class="text-lg">
                    <div class="font-semibold">{{ session('quiz_correct_answers') }}/{{ session('quiz_total_questions') }} réponses correctes</div>
                    <div class="text-blue-100 text-sm mt-1">Taux de réussite</div>
                </div>
                <div class="mt-4 lg:mt-0">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        @if(session('quiz_score') >= 80)
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        @else
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                        </svg>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
                
                <div id="quizForm" class="{{ session('quiz_result_id') && !session('error') ? 'hidden' : '' }}">
                    <form action="{{ route('modules.quiz.submit', $module) }}" method="POST" onsubmit="return handleQuizSubmit(event)">
                        @csrf
                        <input type="hidden" name="time_taken" id="timeTaken" value="0">
                        
                        <div class="space-y-8">
                            @foreach($module->quiz->questions as $index => $question)
                            @php
                                $correctAnswersCount = $question->answers->where('is_correct', true)->count();
                                $isMultipleChoice = $correctAnswersCount > 1;
                            @endphp
                            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow question-container" data-question-id="{{ $question->id }}">
                                <div class="flex flex-col lg:flex-row gap-6 mb-6">
                                    <div class="flex-1">
                                        <div class="flex items-start mb-4">
                                            <span class="bg-blue-500 text-white rounded-lg px-3 py-1 text-sm font-bold mr-3 shadow-md">
                                                {{ $index + 1 }}
                                            </span>
                                            <div class="flex-1">
                                                <div class="flex items-start justify-between">
                                                    <p class="text-lg font-semibold text-gray-800 leading-relaxed flex-1">
                                                        {{ $question->question_text }}
                                                        @if($isMultipleChoice)
                                                        <span class="inline-block ml-2 px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-md">
                                                            Plusieurs réponses
                                                        </span>
                                                        @endif
                                                    </p>
                                                    <!-- Bouton de lecture audio -->
                                                    <button type="button" 
                                                            id="tts-quiz-btn-{{ $question->id }}"
                                                            onclick="readQuestion(
                                                                '{{ addslashes(strip_tags($question->question_text)) }}', 
                                                                'tts-quiz-btn-{{ $question->id }}',
                                                                [
                                                                    @foreach($question->answers as $answer)
                                                                    '{{ addslashes(strip_tags($answer->answer_text)) }}'{{ !$loop->last ? ',' : '' }}
                                                                    @endforeach
                                                                ]
                                                            )"
                                                            class="tts-button ml-3 p-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-300 flex-shrink-0"
                                                            title="Écouter la question et les réponses">
                                                        <svg class="w-6 h-6 tts-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($question->image)
                                    <div class="flex-shrink-0">
                                        <div class="border-2 border-gray-300 rounded-xl overflow-hidden p-2 bg-white shadow-md w-full lg:w-56 max-h-56 mx-auto hover:border-blue-400 transition-colors">
                                            <img src="{{ asset('storage/' . $question->image) }}" 
                                                alt="Image pour la question n°{{ $index + 1 }}" 
                                                class="w-full h-full object-contain rounded-lg">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="space-y-3">
                                    @php
                                        $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                                    @endphp
                                    @foreach($question->answers as $answerIndex => $answer)
                                    <label class="flex items-start p-4 rounded-xl border-2 border-gray-200 hover:border-blue-400 hover:bg-blue-50 cursor-pointer transition-all duration-300 group shadow-sm answer-label" data-question-id="{{ $question->id }}">
                                        <input type="{{ $isMultipleChoice ? 'checkbox' : 'radio' }}" 
                                                name="answers[{{ $question->id }}]{{ $isMultipleChoice ? '[]' : '' }}" 
                                                value="{{ $answer->id }}" 
                                                class="mt-1 text-blue-500 focus:ring-blue-500 transform scale-125 answer-input"
                                                {{ !$isMultipleChoice ? 'required' : '' }}
                                                data-question-id="{{ $question->id }}"
                                                data-is-multiple="{{ $isMultipleChoice ? 'true' : 'false' }}">
                                        <div class="ml-4 flex items-start flex-1">
                                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 text-blue-700 font-bold text-sm mr-4 flex-shrink-0 group-hover:bg-blue-500 group-hover:text-white transition-colors shadow-sm">
                                                {{ $letters[$answerIndex] }}
                                            </span>
                                            <span class="text-gray-700 leading-relaxed font-medium group-hover:text-blue-900 transition-colors">
                                                {{ $answer->answer_text }}
                                            </span>
                                        </div>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-12 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-200 shadow-sm">
                            <div class="text-center">
                                <h4 class="text-xl font-bold text-gray-800 mb-4">Prêt à valider vos connaissances ?</h4>
                                <p class="text-gray-600 mb-6">Vérifiez vos réponses avant de soumettre le quiz.</p>
                                
                                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                                    <button type="button" onclick="resetQuiz()" class="px-8 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-xl transition-colors duration-300 shadow-sm hover:shadow-md">
                                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                        Réinitialiser
                                    </button>
                                    
                                    <button type="submit" 
                                            id="submitBtn"
                                            class="px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center disabled:bg-gray-400 disabled:cursor-not-allowed">
                                        <span id="btnText">Valider le Quiz</span>
                                        <span id="btnSpinner" class="hidden">
                                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            Validation en cours...
                                        </span>
                                    </button>
                                </div>
                                
                                <div class="mt-6 text-sm text-gray-500 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    Temps écoulé : <span id="timer" class="font-mono font-bold ml-1">00:00</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                @if(session('quiz_result_id'))
                <div class="text-center mt-6">
                    <button onclick="retakeQuiz()" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-lg transition-colors">
                        Reprendre le quiz
                    </button>
                </div>
                @endif
            </div>
        </div>
        @endif

        <!-- Navigation between modules -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-12">
            @if($previousModule)
            <a href="{{ route('modules.show', $previousModule->id) }}" 
                class="flex items-center px-6 py-3 bg-white text-gray-700 hover:bg-gray-50 rounded-xl font-medium transition-all duration-300 shadow-md hover:shadow-lg border border-gray-200 hover:border-gray-300 group w-full sm:w-auto justify-center">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Module précédent
            </a>
            @else
            <div class="w-full sm:w-auto"></div>
            @endif

            @if($nextModule)
            <a href="{{ route('modules.show', $nextModule->id) }}" 
                class="flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white rounded-xl font-bold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 group w-full sm:w-auto justify-center">
                Module suivant
                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            @else
            <div class="w-full sm:w-auto"></div>
            @endif
        </div>
    </div>
</div>

<script>
// Fonction pour toggle les cours
function toggleCourse(courseId) {
    const content = document.getElementById(`course-${courseId}`);
    const chevron = document.getElementById(`chevron-${courseId}`);
    
    if (content.classList.contains('hidden')) {
        // Cacher tous les autres contenus ouverts
        document.querySelectorAll('[id^="course-"]').forEach(c => {
            if (c.id !== `course-${courseId}` && !c.classList.contains('hidden')) {
                c.classList.add('hidden');
                const otherChevron = document.getElementById(`chevron-${c.id.split('-')[1]}`);
                if (otherChevron) otherChevron.classList.remove('rotate-180');
            }
        });

        // Afficher le contenu cliqué
        content.classList.remove('hidden');
        chevron.classList.add('rotate-180');
        content.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    } else {
        // Cacher le contenu cliqué
        content.classList.add('hidden');
        chevron.classList.remove('rotate-180');
    }
}

// Timer pour mesurer le temps passé sur le quiz
let startTime = Date.now();
let formSubmitted = false;
let timerInterval = setInterval(updateTimer, 1000);

function updateTimer() {
    let elapsed = Math.floor((Date.now() - startTime) / 1000);
    let minutes = Math.floor(elapsed / 60);
    let seconds = elapsed % 60;
    document.getElementById('timer').textContent = 
        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    document.getElementById('timeTaken').value = elapsed;
}

// Fonction pour gérer la soumission du formulaire avec SweetAlert
async function handleQuizSubmit(event) {
    if (formSubmitted) {
        event.preventDefault();
        return false;
    }

    const timeSpent = Math.floor((Date.now() - startTime) / 1000);
    document.getElementById('timeTaken').value = timeSpent;
    clearInterval(timerInterval);

    const questions = {{ $module->quiz->questions->count() ?? 0 }};
    let answeredQuestions = 0;
    
    // Compter les questions répondues (au moins une réponse cochée)
    document.querySelectorAll('.question-container').forEach(container => {
        const questionId = container.dataset.questionId;
        const hasAnswer = container.querySelector('.answer-input:checked') !== null;
        if (hasAnswer) {
            answeredQuestions++;
        }
    });
    
    if (answeredQuestions < questions) {
        event.preventDefault();
        
        await Swal.fire({
            title: 'Réponses manquantes',
            html: `Vous avez répondu à <strong>${answeredQuestions}</strong> sur <strong>${questions}</strong> questions.<br>Veuillez répondre à toutes les questions avant de valider.`,
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Compris',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl'
            }
        });
        return false;
    }

    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    
    if (submitBtn && btnText && btnSpinner) {
        submitBtn.disabled = true;
        btnText.classList.add('hidden');
        btnSpinner.classList.remove('hidden');
    }
    
    formSubmitted = true;
    return true;
}

function toggleResults() {
    const resultsSection = document.getElementById('resultsSection');
    if (resultsSection) {
        if (resultsSection.classList.contains('hidden')) {
            resultsSection.classList.remove('hidden');
            resultsSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
            resultsSection.classList.add('hidden');
        }
    }
}

// Reprendre le quiz avec SweetAlert
async function retakeQuiz() {
    const result = await Swal.fire({
        title: 'Reprendre le quiz',
        text: 'Êtes-vous sûr de vouloir reprendre le quiz ? Vos réponses précédentes seront perdues.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, reprendre',
        cancelButtonText: 'Annuler',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl',
            cancelButton: 'rounded-xl'
        }
    });
    
    if (result.isConfirmed) {
        startTime = Date.now();
        formSubmitted = false;
        
        const resultsSection = document.getElementById('resultsSection');
        const quizFormSection = document.getElementById('quizForm');
        
        if (resultsSection) resultsSection.classList.add('hidden');
        if (quizFormSection) quizFormSection.classList.remove('hidden');
        
        const form = document.querySelector('#quizForm form');
        if (form) form.reset();
        
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnSpinner = document.getElementById('btnSpinner');
        
        if (submitBtn && btnText && btnSpinner) {
            submitBtn.disabled = false;
            btnText.classList.remove('hidden');
            btnSpinner.classList.add('hidden');
        }
        
        // Redémarrer le timer
        clearInterval(timerInterval);
        timerInterval = setInterval(updateTimer, 1000);
        
        document.getElementById('quizForm').scrollIntoView({ behavior: 'smooth' });
        
        // Message de confirmation
        Swal.fire({
            title: 'Quiz réinitialisé !',
            text: 'Vous pouvez maintenant reprendre le quiz.',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Commencer',
            timer: 2000,
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl'
            }
        });
    }
}

// Réinitialiser le quiz avec SweetAlert
async function resetQuiz() {
    const result = await Swal.fire({
        title: 'Réinitialiser le quiz',
        text: 'Êtes-vous sûr de vouloir réinitialiser toutes vos réponses ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, réinitialiser',
        cancelButtonText: 'Annuler',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl',
            cancelButton: 'rounded-xl'
        }
    });
    
    if (result.isConfirmed) {
        document.querySelectorAll('.answer-input').forEach(radio => {
            radio.checked = false;
        });
        startTime = Date.now();
        clearInterval(timerInterval);
        timerInterval = setInterval(updateTimer, 1000);
        
        Swal.fire({
            title: 'Réinitialisé !',
            text: 'Toutes vos réponses ont été réinitialisées.',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500,
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl'
            }
        });
    }
}

// Gestion des réponses multiples
document.addEventListener('DOMContentLoaded', function() {
    // Écouter les changements de réponses
    document.querySelectorAll('.answer-input').forEach(input => {
        input.addEventListener('change', function() {
            const questionId = this.getAttribute('data-question-id');
            const isMultiple = this.getAttribute('data-is-multiple') === 'true';
            const questionContainer = document.querySelector(`.question-container[data-question-id="${questionId}"]`);
            
            if (!isMultiple) {
                // Réinitialiser toutes les réponses de cette question (cas radio)
                questionContainer.querySelectorAll('.answer-label').forEach(label => {
                    label.classList.remove('border-blue-500', 'bg-blue-50');
                    label.classList.add('border-gray-200', 'hover:border-blue-400');
                });
            }
            
            // Mettre en surbrillance la réponse sélectionnée
            const selectedLabel = this.closest('.answer-label');
            if (this.checked) {
                selectedLabel.classList.remove('border-gray-200', 'hover:border-blue-400');
                selectedLabel.classList.add('border-blue-500', 'bg-blue-50');
            } else {
                selectedLabel.classList.remove('border-blue-500', 'bg-blue-50');
                selectedLabel.classList.add('border-gray-200', 'hover:border-blue-400');
            }
        });
    });
    
    // Pré-sélectionner les réponses déjà choisies
    document.querySelectorAll('.answer-input:checked').forEach(input => {
        const selectedLabel = input.closest('.answer-label');
        selectedLabel.classList.remove('border-gray-200', 'hover:border-blue-400');
        selectedLabel.classList.add('border-blue-500', 'bg-blue-50');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Afficher les messages flash avec SweetAlert
    @if(session('success'))
    Swal.fire({
        title: 'Succès !',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl'
        }
    });
    @endif

    @if(session('warning'))
    Swal.fire({
        title: 'Attention !',
        text: '{{ session('warning') }}',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Compris',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl'
        }
    });
    @endif

    @if(session('error'))
    Swal.fire({
        title: 'Erreur !',
        text: '{{ session('error') }}',
        icon: 'error',
        confirmButtonColor: '#d33',
        confirmButtonText: 'OK',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl'
        }
    });
    @endif

    // Si un résultat de quiz existe, faire défiler vers la section quiz
    @if(session('quiz_result_id') || session('error'))
    setTimeout(function() {
        const quizSection = document.getElementById('quizForm').closest('.bg-white.rounded-3xl');
        if (quizSection) {
            quizSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        
        // Afficher les résultats si succès ou avertissement
        @if(session('quiz_result_id') && !session('error'))
            toggleResults();
        @endif
    }, 500);
    @endif
});

// Gestion de la soumission des cours avec SweetAlert
document.addEventListener('DOMContentLoaded', function() {
    // Intercepter les soumissions de formulaire "Marquer comme terminé"
    document.querySelectorAll('form[action*="courses.complete"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Marquer comme terminé ?',
                text: 'Confirmez-vous avoir terminé cette leçon ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10B981',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Oui, terminer',
                cancelButtonText: 'Annuler',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl',
                    cancelButton: 'rounded-xl'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Afficher un indicateur de chargement
                    Swal.fire({
                        title: 'Enregistrement...',
                        text: 'Marquage de la leçon comme terminée',
                        icon: 'info',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Soumettre le formulaire
                    form.submit();
                }
            });
        });
    });
});
</script>
<script>
// ==============================================================
// COMPOSANT TEXT-TO-SPEECH POUR LES QUESTIONS - CORRIGÉ
// ==============================================================

class QuestionReader {
    constructor() {
        this.synthesis = window.speechSynthesis;
        this.currentUtterance = null;
        this.isReading = false;
        this.voices = [];
        this.currentTexts = []; // Stocker tous les textes à lire
        this.currentIndex = 0; // Index du texte en cours
        
        // Charger les voix disponibles
        this.loadVoices();
        
        // Gérer le rechargement des voix (nécessaire pour certains navigateurs)
        if (speechSynthesis.onvoiceschanged !== undefined) {
            speechSynthesis.onvoiceschanged = () => this.loadVoices();
        }
    }
    
    loadVoices() {
        this.voices = this.synthesis.getVoices();
        // Privilégier les voix françaises
        this.frenchVoice = this.voices.find(voice => 
            voice.lang.startsWith('fr') && voice.name.includes('Female')
        ) || this.voices.find(voice => 
            voice.lang.startsWith('fr')
        );
    }
    
    read(questionText, buttonElement, answers = []) {
        // Si on est en train de lire, arrêter
        if (this.isReading && this.currentUtterance) {
            this.stop(buttonElement);
            return;
        }
        
        // Préparer tous les textes à lire : question + réponses
        this.currentTexts = [questionText];
        
        // Ajouter les réponses avec leur lettre
        const letters = ['A', 'B', 'C', 'D', 'E', 'F'];
        answers.forEach((answer, index) => {
            if (index < letters.length) {
                this.currentTexts.push(`Réponse ${letters[index]} : ${answer}`);
            }
        });
        
        this.currentIndex = 0;
        this.buttonElement = buttonElement;
        
        // Commencer la lecture
        this.readNextText();
    }
    
    readNextText() {
        if (this.currentIndex >= this.currentTexts.length) {
            // Tous les textes ont été lus
            this.isReading = false;
            this.updateButtonState(this.buttonElement, false);
            return;
        }
        
        const text = this.currentTexts[this.currentIndex];
        this.currentUtterance = new SpeechSynthesisUtterance(text);
        
        // Configuration de la voix
        if (this.frenchVoice) {
            this.currentUtterance.voice = this.frenchVoice;
        }
        
        this.currentUtterance.lang = 'fr-FR';
        this.currentUtterance.rate = 0.9; // Vitesse légèrement plus lente
        this.currentUtterance.pitch = 1.0;
        this.currentUtterance.volume = 1.0;
        
        // Événements
        this.currentUtterance.onstart = () => {
            this.isReading = true;
            this.updateButtonState(this.buttonElement, true);
        };
        
        this.currentUtterance.onend = () => {
            this.currentIndex++;
            setTimeout(() => this.readNextText(), 500); // Pause entre les lectures
        };
        
        this.currentUtterance.onerror = (event) => {
            console.error('Erreur de lecture:', event);
            this.isReading = false;
            this.updateButtonState(this.buttonElement, false);
        };
        
        // Lancer la lecture
        this.synthesis.speak(this.currentUtterance);
    }
    
    stop(buttonElement) {
        this.synthesis.cancel();
        this.isReading = false;
        this.currentIndex = 0;
        this.currentTexts = [];
        this.updateButtonState(buttonElement, false);
    }
    
    updateButtonState(button, isReading) {
        if (!button) return;
        
        const icon = button.querySelector('svg');
        const spinner = button.querySelector('.spinner');
        
        if (isReading) {
            button.classList.add('reading');
            button.classList.remove('text-gray-600', 'hover:text-blue-600');
            button.classList.add('text-blue-600');
            if (icon) icon.classList.add('animate-pulse');
            if (spinner) spinner.classList.remove('hidden');
        } else {
            button.classList.remove('reading');
            button.classList.remove('text-blue-600');
            button.classList.add('text-gray-600', 'hover:text-blue-600');
            if (icon) icon.classList.remove('animate-pulse');
            if (spinner) spinner.classList.add('hidden');
        }
    }
}

// Initialiser le lecteur
const questionReader = new QuestionReader();

// Fonction globale pour lire une question avec ses réponses
function readQuestion(questionText, buttonId, answers = []) {
    const button = document.getElementById(buttonId);
    questionReader.read(questionText, button, answers);
}

// Vérifier la compatibilité du navigateur
function checkTTSSupport() {
    if (!('speechSynthesis' in window)) {
        console.warn('La synthèse vocale n\'est pas supportée par ce navigateur.');
        // Masquer tous les boutons de lecture
        document.querySelectorAll('.tts-button').forEach(btn => {
            btn.style.display = 'none';
        });
        return false;
    }
    return true;
}

// Vérifier au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    checkTTSSupport();
});
</script>
<style>
/* Personnalisation des SweetAlert pour correspondre au design */
.swal2-popup {
    border-radius: 1rem !important;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
}

.swal2-title {
    font-size: 1.5rem !important;
    font-weight: 600 !important;
    color: #1F2937 !important;
}

.swal2-html-container {
    font-size: 1.1rem !important;
    color: #6B7280 !important;
}

.swal2-confirm, .swal2-cancel {
    border-radius: 0.75rem !important;
    font-weight: 500 !important;
    padding: 0.75rem 1.5rem !important;
}

.swal2-confirm {
    background: linear-gradient(to right, #3B82F6, #6366F1) !important;
    border: none !important;
}

.swal2-confirm:hover {
    background: linear-gradient(to right, #2563EB, #4F46E5) !important;
    transform: translateY(-1px);
    box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4) !important;
}

.swal2-cancel {
    background-color: #6B7280 !important;
    border: none !important;
}

.swal2-cancel:hover {
    background-color: #4B5563 !important;
    transform: translateY(-1px);
}
</style>
<!-- Même style CSS que pour l'examen -->
<style>
.tts-button {
    transition: all 0.3s ease;
}

.tts-button:hover {
    transform: scale(1.1);
}

.tts-button.reading {
    animation: pulse-blue 2s infinite;
}

@keyframes pulse-blue {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
}

.tts-icon {
    transition: transform 0.3s ease;
}

.tts-button:hover .tts-icon {
    transform: rotate(10deg);
}

.answer-label {
    transition: all 0.3s ease;
}

.answer-label:hover {
    transform: translateY(-2px);
}

.question-container {
    transition: all 0.3s ease;
}

.question-container:hover {
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>

<style>
    .rotate-180 {
        transform: rotate(180deg);
    }
    
    .prose {
        line-height: 1.7;
    }
    
    .prose p {
        margin-bottom: 1em;
    }
    
    .prose ul, .prose ol {
        margin-bottom: 1em;
        padding-left: 1.5em;
    }
    
    .prose li {
        margin-bottom: 0.5em;
    }
</style>
@endsection