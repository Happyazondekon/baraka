@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">
            Bienvenue, <span class="text-green-600">{{ Auth::user()->name }}</span> !
        </h1>
        <p class="text-lg text-gray-600 mt-2">Prêt(e) à maîtriser le code de la route ?</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 shadow-lg relative overflow-hidden">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-7 h-7 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a2 2 0 002-2.236V5.5c0 .211-.035.418-.104.614L16 11l2 4v2.5a2.5 2.5 0 01-2.5 2.5H6a3 3 0 01-3-3V6zm0 0v10a1 1 0 001 1h10a1 1 0 001-1V6H3z" clip-rule="evenodd"/>
                </svg>
                Votre Progression
            </h2>
            <p class="text-gray-700 mb-4">Un aperçu de votre parcours jusqu'à présent.</p>
            
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-md font-medium text-gray-700">Progression globale</span>
                    <span class="text-lg font-bold text-green-700">{{ $progressionGlobale ?? 0 }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-green-400 to-green-500 h-3 rounded-full transition-all duration-700 ease-out" 
                         style="width: {{ $progressionGlobale ?? 0 }}%;"></div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 text-center text-gray-700">
                <div>
                    <p class="text-xl font-semibold text-green-600">{{ $progression_theorique ?? 0 }}%</p>
                    <p class="text-sm">Théorie</p>
                </div>
                <div>
                    <p class="text-xl font-semibold text-green-600">{{ $progression_pratique ?? 0 }}%</p>
                    <p class="text-sm">Pratique</p>
                </div>
            </div>
            
            <div class="text-center mt-6">
                <a href="{{ route('progression') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                    Voir ma progression complète
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
            <div class="absolute top-0 right-0 w-24 h-24 bg-white bg-opacity-10 rounded-full transform translate-x-1/4 -translate-y-1/4"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white bg-opacity-10 rounded-full transform -translate-x-1/2 translate-y-1/2"></div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-7 h-7 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-11a1 1 0 00-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L11 9.586V7a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                Dernière activité
            </h2>
            @if(isset($latestModule))
                <p class="text-gray-700 mb-4">
                    Vous avez récemment travaillé sur le module :
                </p>
                <div class="border border-green-200 rounded-xl p-4 flex items-center space-x-4 bg-green-50 hover:bg-green-100 transition-colors duration-200">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-green-500 text-white rounded-full font-bold text-xl shadow">
                        {{ str_pad($latestModule->order, 2, '0', STR_PAD_LEFT) }}
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $latestModule->title }}</h3>
                        <p class="text-sm text-gray-600 truncate">{{ $latestModule->description }}</p>
                    </div>
                    <a href="{{ route('modules.show', $latestModule->id) }}" class="flex-shrink-0 text-green-600 hover:text-green-800">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
                <div class="text-center mt-6">
                    <a href="{{ route('modules.index') }}" class="text-green-600 hover:text-green-800 font-medium text-sm">
                        Explorer tous les modules
                    </a>
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    <p class="mt-2">Aucune activité récente.</p>
                    <p>Commencez un module pour suivre votre progression !</p>
                    <a href="{{ route('modules.index') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Commencer un module
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <svg class="w-7 h-7 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M12 6.293l-4 4-4-4a1 1 0 01-1.414-1.414l4.707-4.707a1 1 0 011.414 0l4.707 4.707a1 1 0 01-1.414 1.414zM10 18a8 8 0 100-16 8 8 0 000 16zm-1-11a1 1 0 00-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L11 9.586V7a1 1 0 00-1-1z"/>
            </svg>
            Continuez à apprendre
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($suggestedModules as $module)
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 flex items-center justify-center bg-green-100 text-green-700 rounded-full font-bold text-lg mr-3">
                            {{ str_pad($module->order, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $module->title }}</h3>
                    </div>
                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $module->description }}</p>
                    <a href="{{ route('modules.show', $module->id) }}" class="text-green-600 hover:text-green-800 text-sm font-medium flex items-center">
                        Commencer ce module
                        <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500 py-4">Aucun module suggéré pour le moment.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-blue-600 text-white rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between shadow-xl">
        <div class="md:w-2/3 mb-6 md:mb-0 text-center md:text-left">
            <h2 class="text-3xl font-bold mb-2">Prêt(e) pour l'examen ?</h2>
            <p class="text-blue-100 text-lg">Testez vos connaissances avec nos examens blancs interactifs.</p>
        </div>
        <div class="md:w-1/3 flex justify-center md:justify-end">
            
                Passer un examen blanc
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    </div>

</div>
@endsection