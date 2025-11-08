@extends('layouts.app')

@section('title', 'Contactez-nous - Auto-Permis')

@section('content')

{{-- 🚀 BLOC AJOUTÉ POUR AFFICHER LE MESSAGE DE SUCCÈS (FLASH MESSAGE) --}}
@if (session('success'))
<div class="container mx-auto px-4 max-w-7xl pt-4">
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md" role="alert">
        <div class="flex items-center">
            {{-- Icone de succès --}}
            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="font-bold">Succès !</p>
        </div>
        <p class="mt-1 text-sm">{{ session('success') }}</p>
    </div>
</div>
@endif
{{-- FIN DU BLOC AJOUTÉ --}}

<section class="py-16 bg-gradient-to-br from-green-50 to-green-100 animate-on-scroll">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4">
            Contactez <span class="text-green-600">A</span>uto-Permis
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Nous sommes là pour répondre à toutes vos questions, vous accompagner dans votre parcours ou recueillir vos suggestions.
        </p>
    </div>
</section>

<section class="py-16 bg-gray-50 animate-on-scroll">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden h-full flex flex-col module-item">
                <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-6 text-white">
                    <div class="flex items-center mb-2">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">Auto-Écoles au Bénin</h2>
                            <p class="text-green-100 text-sm">Trouvez une auto-école près de chez vous</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex-1 p-6">
                    <div class="mb-4">
                        <div class="relative">
                            <input type="text" 
                                   id="searchSchools" 
                                   placeholder="Rechercher une ville (ex: Cotonou, Porto-Novo)..."
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="relative h-96 bg-gray-100 rounded-2xl overflow-hidden shadow-inner">
                        <iframe 
                            id="mapFrame"
                            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1012903.2451359655!2d2.0836113499999997!3d6.372825949999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sauto%20ecoles%20benin!5e0!3m2!1sfr!2sbj!4v1719322960655!5m2!1sfr!2sbj" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    
                    <div class="mt-4 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-sm text-blue-700">
                                Utilisez la carte interactive pour trouver les auto-écoles agréées près de votre localisation
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6 module-item">
                
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Plaintes & Suggestions</h3>
                            <p class="text-sm text-gray-500">Votre avis compte pour nous</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Vous avez une suggestion ou une plainte ? Écrivez-nous directement et nous vous répondrons dans les plus brefs délais.
                    </p>
                    <a href="mailto:autopermis@auto-permis.com?subject=Plaintes%20et%20Suggestions&body=Bonjour Auto-Permis,%0D%0A%0D%0AJe souhaite vous faire part de :"
                       class="inline-flex items-center justify-center bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg font-semibold w-full sm:w-auto">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Écrire un email
                    </a>
                </div>

                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Cours Pratique</h3>
                            <p class="text-sm text-gray-500">Réservez votre séance de conduite</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Réservez votre séance de conduite pratique avec un moniteur agréé.
                    </p>
                    
                    @auth
                    <form method="POST" action="{{ route('contact.practical-lesson') }}" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label for="lesson_date" class="block text-sm font-semibold text-gray-700 mb-2">Date souhaitée</label>
                            <input type="date" 
                                   id="lesson_date" 
                                   name="lesson_date" 
                                   required
                                   min="{{ date('Y-m-d') }}"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition">
                        </div>
                        
                        <div>
                            <label for="lesson_time" class="block text-sm font-semibold text-gray-700 mb-2">Heure souhaitée</label>
                            <select id="lesson_time" 
                                    name="lesson_time" 
                                    required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition">
                                <option value="">Choisir une heure</option>
                                <option value="08:00">08:00 - 10:00</option>
                                <option value="10:00">10:00 - 12:00</option>
                                <option value="14:00">14:00 - 16:00</option>
                                <option value="16:00">16:00 - 18:00</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Lieu de rendez-vous</label>
                            <input type="text" 
                                   id="location" 
                                   name="location" 
                                   required
                                   placeholder="Ville ou quartier"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition">
                        </div>
                        
                        <div>
                            <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Notes supplémentaires</label>
                            <textarea id="notes" 
                                      name="notes" 
                                      rows="3"
                                      placeholder="Précisions sur le type de cours souhaité..."
                                      class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition resize-none"></textarea>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-green-600 text-white py-4 rounded-xl hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg font-bold text-lg flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Demander le cours pratique
                        </button>
                    </form>
                    @else
                    <form class="space-y-4">
                        <div>
                            <label for="lesson_date_guest" class="block text-sm font-semibold text-gray-700 mb-2">Date souhaitée</label>
                            <input type="date" 
                                   id="lesson_date_guest" 
                                   disabled
                                   min="{{ date('Y-m-d') }}"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 bg-gray-50 cursor-not-allowed shadow-sm">
                        </div>
                        
                        <div>
                            <label for="lesson_time_guest" class="block text-sm font-semibold text-gray-700 mb-2">Heure souhaitée</label>
                            <select id="lesson_time_guest" 
                                    disabled
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 bg-gray-50 cursor-not-allowed shadow-sm">
                                <option value="">Choisir une heure</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="location_guest" class="block text-sm font-semibold text-gray-700 mb-2">Lieu de rendez-vous</label>
                            <input type="text" 
                                   id="location_guest" 
                                   disabled
                                   placeholder="Ville ou quartier"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 bg-gray-50 cursor-not-allowed shadow-sm">
                        </div>
                        
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-lg mb-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-sm text-yellow-700">
                                    Veuillez vous connecter pour réserver un cours pratique
                                </p>
                            </div>
                        </div>

                        <a href="{{ route('login') }}" 
                           class="w-full inline-flex items-center justify-center bg-green-600 text-white py-4 rounded-xl hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg font-bold text-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Se connecter pour réserver
                        </a>
                    </form>
                    @endauth
                </div>

            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchSchools');
    const mapFrame = document.getElementById('mapFrame');
    
    // Villes principales du Bénin avec leurs coordonnées
    const beninCities = {
        'cotonou': { lat: 6.3654, lng: 2.4183, zoom: 13 },
        'porto-novo': { lat: 6.4969, lng: 2.6289, zoom: 13 },
        'parakou': { lat: 9.3372, lng: 2.6303, zoom: 13 },
        'abomey-calavi': { lat: 6.4489, lng: 2.3551, zoom: 13 },
        'djougou': { lat: 9.7085, lng: 1.6660, zoom: 13 },
        'bohicon': { lat: 7.1781, lng: 2.0667, zoom: 13 },
        'kandi': { lat: 11.1342, lng: 2.9387, zoom: 13 },
        'lokossa': { lat: 6.6389, lng: 1.7167, zoom: 13 },
        'ouidah': { lat: 6.3622, lng: 2.0856, zoom: 13 },
        'abomey': { lat: 7.1828, lng: 1.9914, zoom: 13 },
        'natitingou': { lat: 10.3048, lng: 1.3797, zoom: 13 },
        'save': { lat: 8.0342, lng: 2.4850, zoom: 13 },
        'malanville': { lat: 11.8700, lng: 3.3833, zoom: 13 }
    };
    
    let debounceTimer;
    
    searchInput.addEventListener('input', function(e) {
        clearTimeout(debounceTimer);
        
        debounceTimer = setTimeout(() => {
            const searchTerm = e.target.value.toLowerCase().trim();
            
            if (searchTerm.length < 2) {
                // Réinitialiser à la vue par défaut du Bénin
                updateMap('auto ecoles benin', 6.3729, 2.0836, 8);
                return;
            }
            
            // Chercher dans les villes
            let cityFound = false;
            for (const [cityName, coords] of Object.entries(beninCities)) {
                if (cityName.includes(searchTerm) || searchTerm.includes(cityName)) {
                    updateMap(`auto ecole ${cityName}`, coords.lat, coords.lng, coords.zoom);
                    cityFound = true;
                    break;
                }
            }
            
            // Si aucune ville n'est trouvée, rechercher le terme directement
            if (!cityFound) {
                updateMap(`auto ecole ${searchTerm} benin`, 6.3729, 2.0836, 10);
            }
        }, 500); // Attendre 500ms après la dernière frappe
    });
    
    function updateMap(query, lat, lng, zoom) {
        const baseUrl = 'https://www.google.com/maps/embed/v1/search';
        const apiKey = 'AIzaSyBFw0Qbyq9zTFTd-tUY6dw79nUQ4TZp'; // Note: Utiliser une vraie clé API en production
        
        // Construire l'URL avec les paramètres de recherche
        const newSrc = `https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d${1000000/zoom}!2d${lng}!3d${lat}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f${zoom}!2m1!1s${encodeURIComponent(query)}!5e0!3m2!1sfr!2sbj!4v${Date.now()}!5m2!1sfr!2sbj`;
        
        mapFrame.src = newSrc;
    }
});
</script>


{{-- CODE STYLE ET JAVASCRIPT COPIÉ DE home/about.blade.php pour les animations --}}
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
    /* Appliqué aux deux colonnes de la grille pour l'effet décalé */
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