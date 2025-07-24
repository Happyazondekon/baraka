@extends('layouts.app')

@section('title', 'Cours')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <h2 class="text-2xl font-bold mb-4">Phase théorique</h2>
    <div class="flex flex-col gap-6 mb-10">
        @foreach($modules->where('is_practical', false) as $module)
            <div class="bg-white shadow rounded p-4 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-lg">Module {{ $module->order }} : {{ $module->title }}</h3>
                    <p class="text-gray-600">{{ $module->description }}</p>
                </div>
                <a href="{{ route('modules.show', $module->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Commencer</a>
            </div>
        @endforeach
    </div>

    <h2 class="text-2xl font-bold mb-4">Phase pratique</h2>
    <div class="flex flex-col gap-6">
        @foreach($modules->where('is_practical', true) as $module)
            <div class="bg-white shadow rounded p-4 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-lg">Module {{ $module->order }} : {{ $module->title }}</h3>
                    <p class="text-gray-600">{{ $module->description }}</p>
                </div>
                <a href="{{ route('modules.show', $module->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Commencer</a>
            </div>
        @endforeach
    </div>
    
</div>
@endsection
