@extends('layouts.app')

@section('title', 'Quiz - ' . $quiz->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $quiz->title }}</h1>

    {{-- Check if quiz exists and has questions before attempting to loop --}}
    @if(!$quiz || $quiz->questions->isEmpty())
        <p class="text-gray-500">Ce quiz ne contient pas encore de questions.</p>
    @else
        {{-- Ensure the module is available for the form action --}}
        {{-- It's good practice to ensure $quiz->module is not null before passing it --}}
        <form method="POST" action="{{ route('modules.quiz.submit', $quiz->module ?? $quiz->module_id) }}">
            @csrf
            @foreach($quiz->questions as $index => $question)
                <div class="mb-6 p-4 bg-white rounded shadow">
                    <p class="font-semibold text-gray-800 mb-2">
                        {{ $index + 1 }}. {{ $question->question_text }} {{-- Using question_text as per your model --}}
                    </p>
                    {{-- THIS IS THE CRUCIAL CHANGE: Use $question->answers --}}
                    {{-- Changed input type to 'checkbox' and name to an array to allow multiple selections --}}
                    @foreach($question->answers as $option)
                        <label class="block mb-2">
                            <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}" class="mr-2">
                            {{ $option->answer_text }} {{-- Assuming Answer model has 'answer_text' or similar --}}
                        </label>
                    @endforeach
                </div>
            @endforeach

            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700">Soumettre</button>
        </form>
    @endif
    
</div>
@endsection
