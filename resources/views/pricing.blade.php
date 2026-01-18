@extends('layouts.app')

@section('title', 'Tarifs - Auto-Permis : Votre Investissement pour le Permis')

@section('content')

<section class="py-12 bg-gradient-to-br from-green-50 to-green-100">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-3">
            Débloquez <span class="text-green-600">Tout le Contenu</span>
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Un seul paiement pour un accès complet et illimité à tous nos modules
        </p>
    </div>
</section>

@if(session('warning'))
<div class="container mx-auto px-4 mb-4 mt-6">
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-yellow-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.755 1.346-.247 3.099-1.742 3.099H4.42c-1.494 0-2.496-1.753-1.742-3.099l5.58-9.92zM10 13a1 1 0 100-2 1 1 0 000 2zm0-5a1 1 0 011 1v2a1 1 0 11-2 0V9a1 1 0 011-1z" clip-rule="evenodd"/>
            </svg>
            <span class="font-semibold">{{ session('warning') }}</span>
        </div>
    </div>
</div>
@endif

@if(session('error'))
<div class="container mx-auto px-4 mb-4 mt-6">
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-red-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <span class="font-semibold">{{ session('error') }}</span>
        </div>
    </div>
</div>
@endif

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 transform transition duration-500 hover:scale-[1.01]">
            <div class="p-8 bg-green-600 text-white text-center">
                <h2 class="text-2xl font-extrabold mb-1">Pass Intégral</h2>
                <p class="text-sm font-light opacity-80">Accès à vie à la plateforme</p>
            </div>
            
            <div class="p-8 text-center">
                <p class="text-5xl font-extrabold text-gray-900 mb-6">
                    <span class="align-top text-2xl font-medium">XOF</span> 5000
                </p>

                @auth
                    @if(auth()->user()->has_paid)
                        <div class="bg-green-100 text-green-700 font-semibold py-3 rounded-lg border border-green-200 shadow-sm">
                            🎉 Accès déjà débloqué !
                        </div>
                        <a href="{{ route('dashboard') }}" class="mt-4 block text-green-600 hover:underline">
                            Aller au Tableau de Bord
                        </a>
                    @else
                        <!-- Bouton FedaPay -->
                        <div id="pay-btn" class="w-full text-center">
                            <!-- FedaPay va injecter son bouton ici -->
                            <button id="fedapay-button" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 shadow-lg transform hover:-translate-y-0.5">
                                Payer 5000 XOF et Débloquer
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-3">Paiement sécurisé par FedaPay (Mobile Money et cartes)</p>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="w-full inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 shadow-lg transform hover:-translate-y-0.5">
                        Connectez-vous pour Payer
                    </a>
                    <p class="text-xs text-gray-500 mt-3">Vous devez être connecté pour procéder au paiement.</p>
                @endauth
            </div>

            <div class="p-8 bg-gray-50 border-t border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Ce qui est inclus :</h3>
                <ul class="space-y-3 text-left text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Accès illimité à tous les modules théoriques
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simulations d'examens illimitées (Modules Pratiques)
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Historique de progression détaillé
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Mises à jour et nouveaux contenus réguliers
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
<script type="text/javascript">
    const callbackUrl = "{{ route('payment.callback') }}";
    const dashboardUrl = "{{ route('dashboard') }}";
    const statusUrl = "{{ route('payment.status') }}";
    
    @auth
        const baseConfig = {
            public_key: 'pk_live_sS08gjuB6IJSytGCizyJE8PK',
            transaction: {
                amount: 5000, // CORRIGÉ: 5000 XOF
                description: 'Formation complète Auto-Permis - Accès total'
            },
            customer: {
                email: '{{ auth()->user()->email }}', 
                firstname: '{{ auth()->user()->name ?? "Etudiant" }}',
                lastname: 'Auto-Permis'
            },
            // AJOUT DU CALLBACK - REMPLACEZ par votre domaine réel
            callback: 'https://auto-permis.com/payment/callback',
            
            onComplete: function(transaction) {
                console.log('Transaction FedaPay terminée:', transaction);
                
                // Démarrer la vérification immédiatement
                startPaymentVerification();
                
                // Redirection de fallback
                if (transaction && transaction.id) {
                    const status = transaction.status ? transaction.status : 'pending';
                    console.log('Transaction ID:', transaction.id, 'Statut:', status);
                    
                    // Optionnel: redirection manuelle en plus du callback automatique
                    setTimeout(() => {
                        window.location.href = callbackUrl + '?status=' + status + '&transaction_id=' + transaction.id + '&email={{ auth()->user()->email }}';
                    }, 2000);
                }
            },
            onClose: function() {
                console.log('Widget FedaPay fermé');
            }
        };

        // Initialiser FedaPay
        if (document.getElementById('pay-btn') && !({{ auth()->user()->has_paid ? 'true' : 'false' }})) {
            FedaPay.init('#pay-btn', baseConfig);
        }

        // Fonction pour mettre à jour l'UI
        function updateUIOnPaymentSuccess() {
            const payButton = document.querySelector('#pay-btn');
            if (payButton) {
                payButton.innerHTML = `
                    <div class="bg-green-100 text-green-700 font-semibold py-3 rounded-lg border border-green-200 shadow-sm animate-pulse">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            🚀 Vérification en cours...
                        </div>
                    </div>
                `;
            }
        }

        // Fonction de vérification améliorée
        let paymentCheckInterval;
        let paymentVerified = false;
        let checkCount = 0;
        const maxChecks = 20;

        function startPaymentVerification() {
            if (paymentVerified) return;
            
            console.log('🚀 Démarrage vérification paiement...');
            updateUIOnPaymentSuccess();
            checkCount = 0;
            
            paymentCheckInterval = setInterval(() => {
                checkCount++;
                console.log(`Vérification #${checkCount}`);
                
                fetch(statusUrl, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'Cache-Control': 'no-cache'
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    console.log('Statut paiement:', data);
                    
                    if (data.success && data.has_paid) {
                        paymentVerified = true;
                        clearInterval(paymentCheckInterval);
                        
                        console.log('✅ Paiement confirmé ! Redirection...');
                        
                        // UI finale
                        const payButton = document.querySelector('#pay-btn');
                        if (payButton) {
                            payButton.innerHTML = `
                                <div class="bg-green-100 text-green-700 font-semibold py-3 rounded-lg border border-green-200">
                                    ✅ Accès débloqué ! Redirection...
                                </div>
                            `;
                        }
                        
                        // Redirection
                        setTimeout(() => {
                            window.location.href = dashboardUrl + '?payment=success&t=' + Date.now();
                        }, 1500);
                    } else if (checkCount >= maxChecks) {
                        clearInterval(paymentCheckInterval);
                        console.log('🛑 Maximum de vérifications atteint');
                    }
                })
                .catch(error => {
                    console.error('Erreur vérification:', error);
                });
            }, 3000);
        }

        // Démarrer automatiquement si retour de paiement
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('payment') || urlParams.has('transaction_id') || urlParams.has('status')) {
            console.log('Paramètres détectés, démarrage vérification...');
            startPaymentVerification();
        }

        @if(auth()->user()->has_paid)
        setTimeout(() => {
            window.location.href = dashboardUrl;
        }, 2000);
        @endif
    @endauth
</script>
<script>
// Vérification automatique du statut de paiement (comme dans checkout.tsx)
document.addEventListener('DOMContentLoaded', function() {
    let paymentCheckInterval;
    let paymentVerified = false;

    // Démarrer la vérification si l'utilisateur vient de payer
    function startPaymentVerification() {
        if (paymentVerified) return;
        
        console.log('🚀 Démarrage vérification paiement...');
        
        paymentCheckInterval = setInterval(() => {
            fetch('{{ route("payment.status") }}', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Statut paiement:', data);
                
                if (data.success && data.has_paid) {
                    paymentVerified = true;
                    clearInterval(paymentCheckInterval);
                    
                    // Mettre à jour l'UI
                    updateUIOnPaymentSuccess();
                    
                    // Rediriger vers le dashboard
                    setTimeout(() => {
                        window.location.href = '{{ route("dashboard") }}?payment=verified&t=' + Date.now();
                    }, 1500);
                }
            })
            .catch(error => {
                console.error('Erreur vérification paiement:', error);
            });
        }, 2000); // Vérifier toutes les 2 secondes
        
        // Arrêter après 30 secondes
        setTimeout(() => {
            if (paymentCheckInterval) {
                clearInterval(paymentCheckInterval);
                console.log('Arrêt vérification paiement (timeout)');
            }
        }, 30000);
    }

    // Démarrer la vérification si des paramètres de paiement sont détectés
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('payment') || urlParams.has('transaction_id')) {
        startPaymentVerification();
    }

    // Écouter les événements de navigation (SPA-like)
    window.addEventListener('popstate', function() {
        const currentParams = new URLSearchParams(window.location.search);
        if (currentParams.has('payment')) {
            startPaymentVerification();
        }
    });
});
</script>
@endsection
