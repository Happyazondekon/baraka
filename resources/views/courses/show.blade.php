@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>
    <p class="mb-6 text-gray-700">{{ $course->content }}</p>

    @if ($course->video_url)
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Vidéo</h3>
            <iframe src="{{ $course->video_url }}" class="w-full h-64 rounded shadow" allowfullscreen></iframe>
        </div>
    @endif

    @if ($course->audio_url)
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Audio</h3>
            <audio controls class="w-full">
                <source src="{{ $course->audio_url }}" type="audio/mpeg">
                Votre navigateur ne supporte pas l’audio.
            </audio>
        </div>
    @endif

    <div class="flex justify-between mt-10">
        @if ($prevCourse)
            <a href="{{ route('courses.show', [$module->id, $prevCourse->id]) }}" class="text-green-600 hover:underline">&larr; Précédent</a>
        @else
            <span></span>
        @endif

        @if ($nextCourse)
            <a href="{{ route('courses.show', [$module->id, $nextCourse->id]) }}" class="text-green-600 hover:underline">Suivant &rarr;</a>
        @endif
    </div>
</div>
@endsection
