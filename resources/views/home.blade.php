@extends('layouts.app')

@section('title', 'Apprentissage du code de la route')

@section('content')
    <!-- Hero Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    Apprenez le code de conduite <span class="text-green-500">à votre rythme</span>
                </h1>
                <p class="text-gray-600 mb-8">
                    Maîtrisez le code et la conduite depuis chez vous grâce à une formation digitale complète et interactive.
                </p>
                <a href="{{ route('register') }}" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">S'inscrire</a>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('images/hero-car.png') }}" alt="Voiture d'auto-école" class="w-full max-w-md">
            </div>
        </div>
        
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <img src="{{ asset('images/learning-car.png') }}" alt="Apprentissage sans contraintes" class="w-full max-w-md mx-auto">
            </div>
            <div class="order-1 md:order-2">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">
                    Apprenez sans contraintes, réussissez sans limites !
                </h2>
                <p class="text-gray-600 mb-6">
                    Notre plateforme révolutionne l'apprentissage du code de la route en proposant une formation digitale complète, accessible partout et à tout moment! Les candidats peuvent apprendre sans contrainte de déplacement, s'adapter ainsi à leur emploi du temps tout en bénéficiant d'un accompagnement structuré. L'apprentissage est conçu pour être aussi efficace qu'une session en présentiel, avec des ressources pédagogiques adaptées et un suivi personnalisé de formation.
                </p>
                <a href="{{ route('pricing') }}" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">Les Tarifs</a>
            </div>
        </div>
    </section>

    <!-- Modules Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Une formation subdivisée en modules de cours</h2>
            <p class="text-center text-gray-600 mb-12">
                Chaque module couvre une thématique spécifique, à travers une vidéo explicative, un cours théorique et des tests. Validez chaque étape avant de passer à la suivante.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredModules as $module)
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="{{ asset($module->image ?? 'images/module-placeholder.jpg') }}" alt="{{ $module->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ $module->title }}</h3>
                        <a href="{{ route('modules.show', $module) }}" class="text-green-500 hover:text-green-700 flex items-center">
                            Voir plus
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-8">Votre permis, votre rythme !</h2>
            <a href="{{ route('register') }}" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">Démo →</a>
        </div>
    </section>
@endsection
