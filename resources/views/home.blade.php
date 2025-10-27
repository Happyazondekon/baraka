@extends('layouts.app')

@section('title', 'Apprentissage du code de la route')

@section('content')
    <section class="py-16 bg-gradient-to-br from-green-50 to-green-100">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-5xl font-bold text-gray-800 mb-4 leading-tight">
                    Apprenez le code de conduite <span class="text-green-600">à votre rythme</span>
                </h1>
                <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                    Maîtrisez le code et la conduite depuis chez vous grâce à une formation digitale complète et interactive.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    @guest
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition-all font-semibold text-center shadow-lg transform hover:scale-105">
                            Commencer gratuitement →
                        </a>
                        <a href="{{ route('login') }}" class="bg-white text-green-600 px-8 py-4 rounded-lg hover:bg-gray-50 transition-all font-semibold text-center border-2 border-green-600">
                            Se connecter
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition-all font-semibold text-center shadow-lg transform hover:scale-105">
                            Accéder à mon espace →
                        </a>
                    @endguest
                </div>
                
                <div class="mt-8 grid grid-cols-3 gap-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600">500+</div>
                        <div class="text-sm text-gray-600">Étudiants</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600">95%</div>
                        <div class="text-sm text-gray-600">Réussite</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600">24/7</div>
                        <div class="text-sm text-gray-600">Disponible</div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('images/hero-car.png') }}" alt="Voiture d'auto-école" class="w-full max-w-md drop-shadow-2xl animate-car-float">
            </div>
        </div>
    </section>

    <section class="py-16 bg-white animate-on-scroll">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <img src="{{ asset('images/learning-car.png') }}" alt="Apprentissage sans contraintes" class="w-full max-w-md mx-auto drop-shadow-xl">
            </div>
            <div class="order-1 md:order-2">
                <h2 class="text-4xl font-bold text-gray-800 mb-6">
                    Apprenez sans contraintes, <span class="text-green-600">réussissez sans limites !</span>
                </h2>
                <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                    Notre plateforme révolutionne l'apprentissage du code de la route en proposant une formation digitale complète, accessible partout et à tout moment! Les candidats peuvent apprendre sans contrainte de déplacement, s'adapter ainsi à leur emploi du temps tout en bénéficiant d'un accompagnement structuré.
                </p>
                
                <div class="space-y-3 mb-6">
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Formation complète théorique et pratique
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Accès illimité à tous les modules
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Examens blancs interactifs
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Suivi personnalisé de progression
                    </div>
                </div>
                
                @guest
                <a href="{{ route('register') }}" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-all font-semibold shadow-lg">
                    Découvrir l'offre
                </a>
                @endguest
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50 animate-on-scroll">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Une formation structurée en modules</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Chaque module couvre une thématique spécifique, à travers une vidéo explicative, un cours théorique et des tests. Validez chaque étape avant de passer à la suivante.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                @foreach($featuredModules as $module)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow module-item">
                    @if($module->image)
                    <img src="{{ asset('storage/' . $module->image) }}" alt="{{ $module->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <span class="text-white text-4xl font-bold">{{ str_pad($module->order, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    @endif
                    <div class="p-6">
                        <div class="text-sm text-green-600 font-medium mb-2">Module {{ $module->order }}</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $module->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $module->description }}</p>
                        
                        @auth
                            @if(auth()->user()->payments()->where('status', 'completed')->exists())
                                <a href="{{ route('modules.show', $module) }}" class="text-green-600 hover:text-green-700 flex items-center font-medium">
                                    Accéder au module
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('pricing') }}" class="text-green-600 hover:text-green-700 flex items-center font-medium">
                                    Débloquer le contenu
                                    <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                            @endif
                        @else
                            <a href="{{ route('register') }}" class="text-green-600 hover:text-green-700 flex items-center font-medium">
                                S'inscrire pour voir plus
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>

            @guest
            <div class="text-center">
                <p class="text-gray-600 mb-4">Découvrez tous nos modules de formation</p>
                <a href="{{ route('register') }}" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-all font-semibold shadow-lg">
                    Créer un compte gratuit
                </a>
            </div>
            @endguest
        </div>
    </section>

    <section class="py-20 bg-gradient-to-r from-green-600 to-green-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Votre permis, votre rythme !</h2>
            <p class="text-xl mb-8 text-green-50 max-w-2xl mx-auto">
                Rejoignez plus de 500 étudiants qui ont déjà commencé leur formation au code de la route
            </p>
            @guest
            <a href="{{ route('register') }}" class="inline-block bg-white text-green-600 px-10 py-4 rounded-lg hover:bg-gray-100 transition-all font-bold text-lg shadow-xl transform hover:scale-105">
                Commencer maintenant →
            </a>
            @else
            <a href="{{ route('pricing') }}" class="inline-block bg-white text-green-600 px-10 py-4 rounded-lg hover:bg-gray-100 transition-all font-bold text-lg shadow-xl transform hover:scale-105">
                Débloquer tous les cours - 5 000 FCFA →
            </a>
            @endguest
        </div>
    </section>

<style>
    /* Animation pour la voiture dans la section Hero */
    @keyframes carFloat {
        0%, 100% {
            transform: translateY(0) scale(1);
        }
        50% {
            transform: translateY(-10px) scale(1.01); /* Légère lévitation */
        }
    }
    
    .animate-car-float {
        animation: carFloat 4s ease-in-out infinite;
    }

    /* Styles pour l'animation d'apparition au scroll (Fade-in and Slide-up) */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease-out, transform 0.8s ease-out;
    }
    
    .animate-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Animation pour les cartes modules */
    .module-item {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 1s ease-out, transform 0.8s ease-out;
    }

    /* Délai d'apparition pour les modules (effet décalé) */
    .animate-on-scroll.is-visible .module-item:nth-child(1) { transition-delay: 0.1s; opacity: 1; transform: translateY(0); }
    .animate-on-scroll.is-visible .module-item:nth-child(2) { transition-delay: 0.3s; opacity: 1; transform: translateY(0); }
    .animate-on-scroll.is-visible .module-item:nth-child(3) { transition-delay: 0.5s; opacity: 1; transform: translateY(0); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Obtenir toutes les sections que vous voulez animer
        const sectionsToAnimate = document.querySelectorAll('.animate-on-scroll');
        
        // Configuration de l'Intersection Observer
        const observerOptions = {
            root: null, // Le viewport comme zone d'observation
            rootMargin: '0px',
            threshold: 0.1 // Déclenche l'animation quand 10% de la section est visible
        };
        
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                // Si la section est visible
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // On arrête d'observer la section une fois qu'elle est apparue
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observer chaque section
        sectionsToAnimate.forEach(section => {
            observer.observe(section);
        });
    });
</script>
@endsection