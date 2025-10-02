@extends('layouts.app')

@section('title', 'Tarifs - AutoPermis : Votre Investissement pour le Permis')

@section('content')

<section class="py-16 bg-gradient-to-br from-green-50 to-green-100">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            Débloquez <span class="text-green-600">Tout le Contenu</span>
        </h1>
        <p class="text-gray-600 mb-8 max-w-3xl mx-auto text-lg leading-relaxed">
            Un seul paiement pour un accès complet et illimité à tous nos modules de formation
        </p>
    </div>
</section>

@if(session('warning'))
<div class="container mx-auto px-4 mb-6">
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-yellow-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Accès restreint</p>
                <p class="text-sm">{{ session('warning') }}</p>
            </div>
        </div>
    </div>
</div>
@endif

@if(session('success'))
<div class="container mx-auto px-4 mb-6">
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM10 11V9h2v6h-2v-4zm0-6h2v2h-2V5z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Paiement réussi !</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
    </div>
</div>
@endif

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="bg-white rounded-2xl p-10 shadow-2xl border-2 border-green-100 hover:shadow-3xl transition-all duration-300 transform hover:-translate-y-2 max-w-2xl w-full">
                <div class="text-center mb-6">
                    <div class="inline-block bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-full text-sm font-bold mb-4 shadow-lg">
                        🎉 OFFRE EXCEPTIONNELLE - ACCÈS TOTAL
                    </div>
                </div>

                <div class="flex items-center justify-center w-24 h-24 bg-gradient-to-br from-green-100 to-green-200 text-green-600 rounded-full mb-6 mx-auto shadow-lg">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.001 12.001 0 002.928 12c.007 3.659 1.487 7.03 4.305 9.363l.086.06c.642.443 1.348.814 2.115 1.096L12 22.096l2.571-.976c.767-.282 1.473-.653 2.115-1.096l.086-.06c2.818-2.333 4.298-5.704 4.305-9.363a12.001 12.001 0 00-3.092-9.016z"/>
                    </svg>
                </div>

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold mb-4 text-gray-800">Formation Complète AutoPermis</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                        Accédez à <strong>TOUS</strong> nos contenus : cours théoriques ET pratiques, vidéos explicatives, examens blancs, et bien plus encore !
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="font-bold text-gray-800 mb-4 text-center">✨ Ce qui est inclus :</h3>
                    <div class="space-y-3">
                        <div class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Accès à l'ensemble des modules (Théorie & Pratique)
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Plus de 1000 questions d'examen blanc
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Suivi de progression en temps réel
                        </div>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <div class="text-gray-400 line-through text-xl mb-2">15 000 FCFA</div>
                    <div class="text-7xl font-extrabold text-green-600 mb-2">5 000</div>
                    <div class="text-2xl text-gray-700 font-semibold mb-2">FCFA</div>
                    <p class="text-gray-600">Paiement unique • Accès illimité et à vie</p>
                    <div class="mt-4 inline-block bg-red-100 text-red-700 px-4 py-1 rounded-full text-base font-semibold border border-red-200">
                        🔥 Économisez 10 000 FCFA
                    </div>
                </div>

                <div class="text-center">
                    <button id="pay-btn"
                        class="w-full bg-green-600 text-white px-8 py-5 rounded-lg hover:bg-green-700 transition-all duration-300 shadow-2xl transform hover:scale-[1.02] text-xl font-bold flex items-center justify-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Commencer maintenant - 5 000 FCFA
                    </button>
                    <p class="text-sm text-gray-500 mt-3">
                        Paiement sécurisé via Mobile Money (MTN, Moov, Celtiis)
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-red-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl md:text-4xl font-bold mb-4">⚡ Offre Limitée dans le Temps !</h3>
            <p class="text-xl mb-8 opacity-90">
                Ce prix exceptionnel de 5 000 FCFA ne durera pas éternellement. 
                Plus de <strong>500 personnes</strong> ont déjà rejoint la formation cette semaine !
            </p>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">500+</div>
                    <div class="text-sm">Étudiants actifs</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">95%</div>
                    <div class="text-sm">Taux de réussite</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">24/7</div>
                    <div class="text-sm">Accès disponible</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">∞</div>
                    <div class="text-sm">Accès à vie</div>
                </div>
            </div>

            <button id="pay-btn-2" 
                class="bg-white text-red-600 px-8 py-4 rounded-lg font-bold text-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                🚀 Ne Ratez Pas Cette Chance - 5 000 FCFA
            </button>
        </div>
    </div>
</section>


<script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
<script type="text/javascript">
    // Déterminer l'URL de redirection après paiement.
    // Si 'intended_url' existe dans la session, on l'utilise. Sinon, on va au tableau de bord.
    const intendedUrl = "{{ session('intended_url', route('dashboard')) }}";

    // Configuration de base de FedaPay
    const baseConfig = {
        public_key: 'pk_live_aKFuT6QVfmRm0H1BXMlQXZAp',
        transaction: {
            amount: 5000,
            description: 'Formation complète AutoPermis - Accès total'
        },
        customer: {
            email: '{{ auth()->user()->email ?? "user@example.com" }}',
            firstname: '{{ auth()->user()->name ?? "Etudiant" }}',
            lastname: 'AutoPermis'
        },
        // L'URL vers laquelle FedaPay doit rediriger après un paiement réussi
        callback_url: intendedUrl
    };

    // Initialiser FedaPay pour le premier bouton
    FedaPay.init('#pay-btn', baseConfig);

    // Initialiser FedaPay pour le second bouton
    FedaPay.init('#pay-btn-2', baseConfig);
    
    // NETTOYAGE : Envoyer une requête après l'initialisation pour supprimer 'intended_url' 
    // de la session côté serveur. Ceci empêche l'URL d'être réutilisée si l'utilisateur
    // revient manuellement sur la page des tarifs.
    @if(session()->has('intended_url'))
    fetch('{{ route('payment.clear_intended') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        // Pas besoin de corps, l'action est simple.
    });
    @endif
</script>

@endsection