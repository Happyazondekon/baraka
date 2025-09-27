@extends('layouts.app')

@section('title', 'Tarifs - AutoPermis : Votre Investissement pour le Permis')

@section('content')

<!-- Hero Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">
            Nos Tarifs : <span class="text-green-600">Investissez dans votre réussite</span>
        </h1>
        <p class="text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
            Chez AutoPermis, nous vous offrons un accès complet et abordable pour maîtriser le code de la route et la conduite automobile. Un paiement unique pour tout débloquer !
        </p>
    </div>
</section>

<!-- Main Pricing Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="bg-white rounded-lg p-8 shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 max-w-2xl w-full">
                <!-- Badge -->
                <div class="text-center mb-6">
                    <div class="inline-block bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        🎉 OFFRE COMPLÈTE - ACCÈS TOTAL
                    </div>
                </div>

                <!-- Icon -->
                <div class="flex items-center justify-center w-20 h-20 bg-green-100 text-green-600 rounded-full mb-6 mx-auto">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.001 12.001 0 002.928 12c.007 3.659 1.487 7.03 4.305 9.363l.086.06c.642.443 1.348.814 2.115 1.096L12 22.096l2.571-.976c.767-.282 1.473-.653 2.115-1.096l.086-.06c2.818-2.333 4.298-5.704 4.305-9.363a12.001 12.001 0 00-3.092-9.016z"/>
                    </svg>
                </div>

                <!-- Titre et description -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold mb-3 text-gray-800">Formation Complète AutoPermis</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Accédez à TOUS nos contenus : cours théoriques ET pratiques, vidéos explicatives, examens blancs, et bien plus encore !
                    </p>
                </div>

                <!-- Prix -->
                <div class="text-center mb-8">
                    <div class="text-gray-400 line-through text-lg mb-2">15 000 FCFA</div>
                    <div class="text-6xl font-extrabold text-green-600 mb-2">5 000</div>
                    <div class="text-xl text-gray-700 font-semibold mb-2">FCFA</div>
                    <p class="text-gray-600">Paiement unique • Accès illimité et à vie</p>
                    <div class="mt-3 inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                        🔥 Économisez 10 000 FCFA
                    </div>
                </div>

                <!-- Bouton CTA -->
                <div class="text-center">
                    <button id="pay-btn"
                        class="w-full bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition-all duration-300 shadow-lg transform hover:scale-105 text-xl font-bold flex items-center justify-center">
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


<!-- Urgency Section -->
<section class="py-16 bg-red-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl md:text-4xl font-bold mb-4">⚡ Offre Limitée dans le Temps !</h3>
            <p class="text-xl mb-8 opacity-90">
                Ce prix exceptionnel de 5 000 FCFA ne durera pas éternellement. 
                Plus de <strong>500 personnes</strong> ont déjà rejoint la formation cette semaine !
            </p>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-2xl font-bold">500+</div>
                    <div class="text-sm">Étudiants actifs</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-2xl font-bold">95%</div>
                    <div class="text-sm">Taux de réussite</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-2xl font-bold">24/7</div>
                    <div class="text-sm">Accès disponible</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-2xl font-bold">∞</div>
                    <div class="text-sm">Accès à vie</div>
                </div>
            </div>

            <button id="pay-btn-2" 
                data-transaction-amount="5000"
                data-transaction-description="Formation complète AutoPermis - Accès total"
                class="bg-white text-red-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                🚀 Ne Ratez Pas Cette Chance - 5 000 FCFA
            </button>
        </div>
    </div>
</section>

<!-- Intégration FedaPay -->
<script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
<script type="text/javascript">
    // Initialiser FedaPay pour le premier bouton
    FedaPay.init('#pay-btn', {
        public_key: '',
        transaction: {
            amount: 5000,
            description: 'Formation complète AutoPermis - Accès total'
        },
        customer: {
            email: '{{ auth()->user()->email ?? "user@example.com" }}',
            firstname: '{{ auth()->user()->name ?? "Etudiant" }}',
            lastname: 'AutoPermis'
        }
    });

    // Initialiser FedaPay pour le second bouton
    FedaPay.init('#pay-btn-2', {
        public_key: '',
        transaction: {
            amount: 5000,
            description: 'Formation complète AutoPermis - Accès total'
        },
        customer: {
            email: '{{ auth()->user()->email ?? "user@example.com" }}',
            firstname: '{{ auth()->user()->name ?? "Etudiant" }}',
            lastname: 'AutoPermis'
        }
    });
</script>

@endsection
