@extends('layouts.app')

@section('title', 'Tarifs')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Tarifs Baraka</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div class="bg-green-100 rounded-lg p-6 shadow">
            <h2 class="text-2xl font-semibold mb-2 text-green-700">Cours Théoriques</h2>
            <p class="mb-4">Accédez à tous les modules théoriques pour apprendre le code de la route à votre rythme.</p>
            <div class="text-3xl font-bold text-green-600 mb-2">5 000 FCFA</div>
            <p class="text-gray-600">Paiement unique pour l'accès illimité aux cours théoriques.</p>
        </div>
        <div class="bg-green-50 rounded-lg p-6 shadow">
            <h2 class="text-2xl font-semibold mb-2 text-green-700">Cours Pratiques</h2>
            <p class="mb-4">Accédez aux modules pratiques pour vous entraîner et réussir l’épreuve sur route.</p>
            <div class="text-3xl font-bold text-green-600 mb-2">10 000 FCFA</div>
            <p class="text-gray-600">Paiement unique pour l'accès illimité aux cours pratiques.</p>
        </div>
    </div>
    <div class="mt-8">
        <h3 class="text-xl font-bold mb-2">Comment accéder aux cours ?</h3>
        <ul class="list-disc pl-5 text-gray-700">
            <li>Les cours théoriques sont accessibles après paiement de <span class="font-semibold">5 000 FCFA</span>.</li>
            <li>Les cours pratiques sont accessibles après paiement de <span class="font-semibold">10 000 FCFA</span>.</li>
            <li>Effectuez votre paiement en toute sécurité depuis votre espace personnel.</li>
        </ul>
        <a href="{{ route('payment') }}" class="inline-block mt-6 bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Payer et accéder aux cours</a>
    </div>
</div>
@endsection