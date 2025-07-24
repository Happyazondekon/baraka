@extends('layouts.app')

@section('title', $module->title ?? 'Module')

@section('content')
<div class="container mx-auto px-4 py-8">
    <a href="{{ route('modules.index') }}" class="text-green-600 hover:underline mb-6 inline-block">&larr; Retour aux modules</a>

    <!-- Header du module -->
    <div class="bg-green-100 rounded-xl p-6 flex flex-col md:flex-row justify-between items-start md:items-center mb-10">
        <div class="max-w-2xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Phase théorique</h1>
            <h2 class="text-xl font-semibold text-gray-700">{{ $module->title }}</h2>
            <p class="text-gray-600 mt-2">{{ $module->description }}</p>
        </div>
        <div class="mt-4 md:mt-0 text-center">
            <span class="text-4xl font-bold text-green-700">{{ str_pad($module->order, 2, '0', STR_PAD_LEFT) }}</span>
            <p class="text-sm text-gray-700">Ordre du module</p>
        </div>
    </div>

    <!-- Image illustrative -->
    <div class="relative mb-10">
        <img src="{{ $module->image ?? 'https://via.placeholder.com/600x300' }}" class="rounded-lg shadow w-full h-64 object-cover" alt="Image du module">
    </div>

    <!-- Liste des cours réels -->
    <div class="mb-12">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">📘 Cours du module</h3>
        @if ($module->courses->isEmpty())
            <p class="text-gray-500">Aucun cours n'est encore associé à ce module.</p>
        @else
            <ul class="space-y-4">
                @foreach ($module->courses as $course)
                    <li class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">{{ $course->title }}</h4>
                            <p class="text-sm text-gray-600">{{ Str::limit($course->description, 100) }}</p>
                        </div>
                        <a href="{{ route('courses.show', [$module->id, $course->id]) }}">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                Commencer le cours
                            </button>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Quiz réel du module -->
    <div class="mb-12">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">📝 Test du module</h3>
        @if ($module->quiz)
            <p class="mb-4 text-gray-600">Testez vos connaissances avec le quiz lié à ce module.</p>
            <a href="{{ route('quizzes.show', $module->quiz->id) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded transition">Accéder au Quiz</a>
        @else
            <p class="text-gray-500">Aucun quiz n’a encore été associé à ce module.</p>
        @endif
    </div>
</div>
@endsection
