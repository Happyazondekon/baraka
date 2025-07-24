@extends('layouts.app')

@section('title', 'Ma Progression')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4 text-center">Où en sommes nous dans votre apprentissage ?</h2>
    <div class="mb-8">
        <h3 class="font-semibold mb-2">Phase théorique</h3>
        <div class="w-full bg-gray-300 rounded h-3 mb-4">
            <div class="bg-green-500 h-3 rounded" style="width: {{ $progression_theorique }}%;"></div>
        </div>
        <ul>
            @foreach($modules_theoriques as $index => $module)
                <li class="flex items-center mb-2">
                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-500 text-white mr-2">{{ $index }}</span>
                    {{ $module->title }}
                </li>
            @endforeach
        </ul>
    </div>
    <div>
        <h3 class="font-semibold mb-2">Phase pratique</h3>
        <div class="w-full bg-gray-300 rounded h-3 mb-4">
            <div class="bg-green-500 h-3 rounded" style="width: {{ $progression_pratique }}%;"></div>
        </div>
        <ul>
            @foreach($modules_pratiques as $index => $module)
                <li class="flex items-center mb-2">
                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-500 text-white mr-2">{{ $index + 1 }}</span>
                    {{ $module->title }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection