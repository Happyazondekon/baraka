@extends('layouts.app')

@section('title', 'Cours')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Phase théorique</h2>
    <div class="flex flex-col gap-6">
        <!-- Exemple de modules, à boucler dynamiquement -->
        @foreach($modules as $module)
            <div class="bg-white shadow rounded p-4 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-lg">Module {{ $module->ordre }} : {{ $module->titre }}</h3>
                    <p class="text-gray-600">{{ $module->description }}</p>
                </div>
                <a href="{{ route('modules.show', $module->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Commencer</a>
            </div>
        @endforeach
    </div>
</div>
@endsection