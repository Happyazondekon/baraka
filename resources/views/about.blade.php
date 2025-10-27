@extends('layouts.app')

@section('title', 'À propos de Auto-Permis - Votre Permis, Simplifié et Efficace')

@section('content')

{{-- Ajout de la classe animate-on-scroll --}}
<section class="py-16 bg-white animate-on-scroll"> 
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                <span class="text-green-600">A</span>uto-Permis: Votre voie rapide</span> vers le permis de conduire
            </h1>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Auto-Permis révolutionne l'apprentissage du code de la route et de la conduite automobile. Notre plateforme digitale complète est conçue pour les candidats qui n’ont pas le temps de se déplacer, offrant une méthode d’apprentissage efficace, encadrée et flexible.
            </p>
            <a href="{{ route('register') }}" class="inline-flex items-center bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition duration-300 shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                Commencez votre formation
            </a>
        </div>
        <div class="flex justify-center">
            {{-- Replace with an image that represents convenience, online learning, or a digital platform --}}
            <img src="{{ asset('images/driving.png') }}" alt="Apprentissage sans contraintes" class="w-full max-w-md mx-auto">
        </div>
    </div>
</section>

{{-- Ajout de la classe animate-on-scroll --}}
<section class="py-16 bg-gray-100 animate-on-scroll">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="order-2 md:order-1">
            {{-- Replace with an image representing flexibility, learning from anywhere --}}
            <img src="{{ asset('images/car.png') }}" alt="Voiture d'auto-école" class="w-full max-w-md">
        </div>
        <div class="order-1 md:order-2">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">
                Apprenez sans contraintes, réussissez sans limites !
            </h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Notre mission est d'offrir un espace de formation accessible en ligne, disponible en plusieurs langues (français et anglais), pour les candidats qui n'ont pas le temps de se déplacer dans les centres traditionnels. Auto-Permis vous garantit une méthode d'apprentissage efficace et un accompagnement structuré, s'adaptant à votre emploi du temps.
            </p>
            <p class="text-gray-600 font-semibold leading-relaxed">
                Découvrez la flexibilité et l'efficacité d'une formation moderne pensée pour vous.
            </p>
        </div>
    </div>
</section>

{{-- Ajout de la classe animate-on-scroll à la section parente --}}
<section class="py-16 bg-white animate-on-scroll">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">
            Ce que Auto-Permis vous offre pour une réussite garantie
        </h2>
        <p class="text-center text-gray-600 mb-12 max-w-3xl mx-auto">
            Notre plateforme est conçue avec des outils performants et un contenu riche pour optimiser votre apprentissage du code et de la conduite.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Ajout de la classe module-item pour l'effet cascade --}}
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md p-6 border border-gray-200 module-item">
                <div class="flex items-center justify-center w-12 h-12 bg-green-100 text-green-600 rounded-full mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.205 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.795 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.795 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.205 18 16.5 18s-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Formation Théorique et Pratique</h3>
                <p class="text-gray-700">
                    Accédez à des modules interactifs avec cours structurés, vidéos explicatives et tests d'évaluation (examens blancs). La phase pratique inclut des vidéos éducatives sur la connaissance des véhicules, l'installation au poste de conduite, le démarrage en côte, et même le circuit d'examen au Bénin.
                </p>
            </div>

            {{-- Ajout de la classe module-item pour l'effet cascade --}}
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md p-6 border border-gray-200 module-item">
                <div class="flex items-center justify-center w-12 h-12 bg-green-100 text-green-600 rounded-full mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Suivi de Progression Avancé</h3>
                <p class="text-gray-700">
                    Suivez en temps réel les modules effectués et les tests réussis. Nos statistiques de progression vous permettent de visualiser clairement vos acquis et les points à améliorer, garantissant un apprentissage ciblé et efficace.
                </p>
            </div>

            {{-- Ajout de la classe module-item pour l'effet cascade --}}
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md p-6 border border-gray-200 module-item">
                <div class="flex items-center justify-center w-12 h-12 bg-green-100 text-green-600 rounded-full mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v3"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Sécurité et Accès Multilingue</h3>
                <p class="text-gray-700">
                    Votre compte est sécurisé par une authentification à double facteur (2FA). La plateforme est disponible en Français et en Anglais. De plus, les paiements sont simplifiés grâce à l'intégration de Mobile Money (Fedapay, Moov Money et autres).
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Ajout de la classe animate-on-scroll --}}
<section class="py-16 bg-gray-100 animate-on-scroll">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">
            Pour les promoteurs d'auto-écoles
        </h2>
        <p class="text-gray-600 mb-8 max-w-3xl mx-auto">
            Auto-Permis offre également une interface dédiée pour gérer et suivre les performances de vos candidats, vous permettant d'optimiser votre encadrement et d'améliorer vos résultats.
        </p>
        {{-- You might add a link here for promoters if applicable --}}
        {{-- <a href="#" class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300 shadow-md">En savoir plus pour les professionnels</a> --}}
    </div>
</section>

{{-- Ajout de la classe animate-on-scroll --}}
<section class="py-20 bg-green-700 text-white text-center animate-on-scroll">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold mb-6">
            Prêt(e) à prendre la route du succès ?
        </h2>
        <p class="text-xl opacity-90 mb-8 max-w-3xl mx-auto">
            Rejoignez des centaines de candidats satisfaits et commencez votre formation au code de la route dès aujourd'hui avec Auto-Permis.
        </p>
        <a href="{{ route('register') }}" class="inline-flex items-center bg-white text-green-700 px-10 py-5 rounded-lg shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            Je m'inscris maintenant !
        </a>
    </div>
</section>


{{-- CODE STYLE ET JAVASCRIPT COPIÉ DE home.blade.php --}}
<style>
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
    
    /* Animation pour les cartes modules/features */
    .module-item {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 1s ease-out, transform 0.8s ease-out;
    }

    /* Délai d'apparition pour les modules (effet décalé) */
    .animate-on-scroll.is-visible .module-item:nth-child(1) { transition-delay: 0.1s; opacity: 1; transform: translateY(0); }
    .animate-on-scroll.is-visible .module-item:nth-child(2) { transition-delay: 0.3s; opacity: 1; transform: translateY(0); }
    .animate-on-scroll.is-visible .module-item:nth-child(3) { transition-delay: 0.5s; opacity: 1; transform: translateY(0); }

    /* Note: L'animation carFloat est dans home.blade.php et n'est pas nécessaire ici. */
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