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
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <div>
                <p class="font-medium text-sm">{{ session('warning') }}</p>
            </div>
        </div>
    </div>
</div>
@endif

@if(session('success'))
<div class="container mx-auto px-4 mb-4 mt-6">
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <div>
                <p class="font-medium text-sm">{{ session('success') }}</p>
            </div>
        </div>
    </div>
</div>
@endif

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-4 text-center">
                    <div class="flex items-center justify-center space-x-2 mb-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-bold text-sm">OFFRE SPÉCIALE</span>
                    </div>
                    <h2 class="text-xl font-bold">Formation Complète Auto-Permis</h2>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Price -->
                    <div class="text-center mb-6">
                        <div class="flex items-center justify-center space-x-2 mb-2">
                            <span class="text-gray-400 line-through text-sm">15 000 FCFA</span>
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold">
                                Économisez 10 000 FCFA
                            </span>
                        </div>
                        <div class="text-4xl font-bold text-green-600 mb-1">5 000</div>
                        <div class="text-gray-600 text-sm">FCFA • Paiement unique</div>
                    </div>

                    <!-- Features -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center text-gray-700 text-sm">
                            <svg class="w-4 h-4 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Tous les modules (Théorie & Pratique)
                        </div>
                        <div class="flex items-center text-gray-700 text-sm">
                            <svg class="w-4 h-4 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            1000+ questions d'examen blanc
                        </div>
                        <div class="flex items-center text-gray-700 text-sm">
                            <svg class="w-4 h-4 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Suivi de progression
                        </div>
                        <div class="flex items-center text-gray-700 text-sm">
                            <svg class="w-4 h-4 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Accès à vie
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <div class="grid grid-cols-3 gap-4 text-center text-xs">
                            <div>
                                <div class="font-bold text-gray-800">500+</div>
                                <div class="text-gray-600">Étudiants</div>
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">95%</div>
                                <div class="text-gray-600">Réussite</div>
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">24/7</div>
                                <div class="text-gray-600">Accès</div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Button -->
                    <div class="space-y-3">
                        <button id="pay-btn"
                            class="w-full bg-green-600 text-white px-6 py-4 rounded-lg hover:bg-green-700 transition-all duration-300 shadow-lg transform hover:scale-[1.02] font-bold flex items-center justify-center text-base">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Payer 5 000 FCFA
                        </button>
                        
                        <p class="text-xs text-gray-500 text-center">
                            Paiement sécurisé via Mobile Money
                        </p>
                    </div>
                </div>

                <!-- Footer Note -->
                <div class="bg-yellow-50 border-t border-yellow-200 p-3">
                    <div class="flex items-center justify-center text-xs text-yellow-700">
                        <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        Offre limitée dans le temps
                    </div>
                </div>
            </div>
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
            description: 'Formation complète Auto-Permis - Accès total'
        },
        customer: {
            email: '{{ auth()->user()->email ?? "user@example.com" }}',
            firstname: '{{ auth()->user()->name ?? "Etudiant" }}',
            lastname: 'Auto-Permis'
        },
        // L'URL vers laquelle FedaPay doit rediriger après un paiement réussi
        callback_url: intendedUrl
    };

    // Initialiser FedaPay pour le bouton
    FedaPay.init('#pay-btn', baseConfig);
    
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