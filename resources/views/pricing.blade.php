@extends('layouts.app')

@section('title', 'Tarifs - Baraka : Votre Investissement pour le Permis')

@section('content')

<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">
            Nos Tarifs : <span class="text-green-600">Investissez dans votre réussite</span>
        </h1>
        <p class="text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
            Chez Baraka, nous vous offrons des formules claires et abordables pour maîtriser le code de la route et la conduite automobile, adaptées à vos besoins et votre rythme.
        </p>
    </div>
</section>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 justify-center">

            <div class="bg-white rounded-lg p-8 shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-center w-16 h-16 bg-green-100 text-green-600 rounded-full mb-6 mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.205 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.795 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.795 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.205 18 16.5 18s-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-2xl font-bold mb-3 text-gray-800 text-center">Cours Théoriques</h2>
                <p class="text-gray-600 mb-6 text-center">Accédez à tous les modules théoriques interactifs pour maîtriser le code de la route, incluant vidéos explicatives et examens blancs.</p>
                <div class="text-5xl font-extrabold text-green-600 mb-2 text-center">5 000 FCFA</div>
                <p class="text-gray-700 text-center mb-6">Paiement unique pour un accès illimité et à vie aux contenus théoriques.</p>
                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition duration-300 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.001 12.001 0 002.928 12c.007 3.659 1.487 7.03 4.305 9.363l.086.06c.642.443 1.348.814 2.115 1.096L12 22.096l2.571-.976c.767-.282 1.473-.653 2.115-1.096l.086-.06c2.818-2.333 4.298-5.704 4.305-9.363a12.001 12.001 0 00-3.092-9.016z"></path></svg>
                        Accéder aux cours théoriques
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-lg p-8 shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-center w-16 h-16 bg-green-100 text-green-600 rounded-full mb-6 mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17.25v-.375m0 0a1.125 1.125 0 110-2.25 1.125 1.125 0 010 2.25zM12.75 11.25H9m3.75 0V9m3.75 0h-3.75m3.75 0V9m-9 3.75h3.75m-3.75 0v3.75m3.75-3.75v3.75m-3.75-3.75m0 0a.75.75 0 100-1.5.75.75 0 000 1.5zM12 21.75c3.732 0 6.75-3.018 6.75-6.75V4.5A2.25 2.25 0 0017.25 2.25H6.75A2.25 2.25 0 004.5 4.5v10.5c0 3.732 3.018 6.75 6.75 6.75z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold mb-3 text-gray-800 text-center">Cours Pratiques</h2>
                <p class="text-gray-600 mb-6 text-center">Accédez aux modules pratiques vidéo pour vous entraîner à la conduite, incluant les manœuvres clés et le circuit d'examen au Bénin.</p>
                <div class="text-5xl font-extrabold text-green-600 mb-2 text-center">10 000 FCFA</div>
                <p class="text-gray-700 text-center mb-6">Paiement unique pour un accès illimité et à vie aux contenus pratiques.</p>
                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition duration-300 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.001 12.001 0 002.928 12c.007 3.659 1.487 7.03 4.305 9.363l.086.06c.642.443 1.348.814 2.115 1.096L12 22.096l2.571-.976c.767-.282 1.473-.653 2.115-1.096l.086-.06c2.818-2.333 4.298-5.704 4.305-9.363a12.001 12.001 0 00-3.092-9.016z"></path></svg>
                        Accéder aux cours pratiques
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Comment accéder aux cours ?</h3>
        <ul class="list-none space-y-4 text-center max-w-2xl mx-auto">
            <li class="flex items-center justify-center text-lg text-gray-700">
                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-green-100 text-green-700 font-bold mr-3">1</span>
                Les cours théoriques sont accessibles après un paiement unique de <span class="font-bold text-green-700 ml-1">5 000 FCFA</span>.
            </li>
            <li class="flex items-center justify-center text-lg text-gray-700">
                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-green-100 text-green-700 font-bold mr-3">2</span>
                Les cours pratiques sont accessibles après un paiement unique de <span class="font-bold text-green-700 ml-1">10 000 FCFA</span>.
            </li>
            <li class="flex items-center justify-center text-lg text-gray-700">
                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-green-100 text-green-700 font-bold mr-3">3</span>
                Effectuez votre paiement en toute sécurité depuis votre espace personnel via Mobile Money (Fedapay, Moov Money et autres).
            </li>
        </ul>
        <div class="text-center mt-12">
            <a href="{{ route('payment') }}" class="inline-flex items-center bg-green-600 text-white px-10 py-5 rounded-lg hover:bg-green-700 transition-all duration-300 shadow-lg transform hover:scale-105 text-xl font-bold">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Accéder aux options de paiement
            </a>
        </div>
    </div>
</section>

{{-- <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Ce qu'ils disent de nous</h2>
        </div>
</section> --}}

@endsection