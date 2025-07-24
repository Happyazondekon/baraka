<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baraka') }} - @yield('title', 'Apprentissage du code de la route')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold">
            <span class="text-green-500">B</span>araka <span class="text-green-500">🚗</span>
        </a>

        <nav class="hidden md:flex space-x-6">
    @auth
        <a href="{{ route('dashboard') }}" class="hover:text-green-500 {{ Route::is('dashboard') ? 'text-green-500' : '' }}">Accueil</a>
        <a href="{{ route('modules.index') }}" class="hover:text-green-500 {{ Route::is('modules.*') ? 'text-green-500' : '' }}">Cours</a>
        <a href="{{ route('progression') }}" class="hover:text-green-500 {{ Route::is('progression') ? 'text-green-500' : '' }}">Ma Progression</a>
    @else
        <a href="{{ route('home') }}" class="hover:text-green-500 {{ Route::is('home') ? 'text-green-500' : '' }}">Accueil</a>
        <a href="{{ route('about') }}" class="hover:text-green-500 {{ Route::is('about') ? 'text-green-500' : '' }}">À propos</a>
        <a href="{{ route('modules.index') }}" class="hover:text-green-500 {{ Route::is('modules.*') ? 'text-green-500' : '' }}">Cours</a>
        <a href="{{ route('pricing') }}" class="hover:text-green-500 {{ Route::is('pricing') ? 'text-green-500' : '' }}">Tarifs</a>
        <a href="{{ route('contact') }}" class="hover:text-green-500 {{ Route::is('contact') ? 'text-green-500' : '' }}">Contact</a>
    @endauth
</nav>

        <div>
            @auth
            <!-- Dropdown utilisateur -->
                <div class="relative inline-block text-left" x-data="{ open: false }">
        <button @click="open = !open" type="button" class="inline-flex justify-center items-center space-x-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none">
            <span>{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
            <div class="py-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>

            @else
                <a href="{{ route('login') }}" class="text-gray-700 mr-4 hover:text-green-500">Connexion</a>
                <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Inscrivez-vous →</a>
            @endauth
        </div>
    </div>
</header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">BARAKA</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-green-400">Accueil</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-green-400">À propos</a></li>
                        <li><a href="{{ route('modules.index') }}" class="hover:text-green-400">Cours</a></li>
                        <li><a href="{{ route('pricing') }}" class="hover:text-green-400">Tarifs</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-green-400">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-green-400">Termes et conditions</a></li>
                    </ul>
                </div>

                <div class="md:col-span-2">
                    <h3 class="text-lg font-bold mb-4">Gardons contact</h3>
                    <form action="#" method="POST" class="flex">
                        <input type="email" placeholder="Votre email" class="px-4 py-2 w-full rounded-l text-gray-800">
                        <button type="submit" class="bg-green-500 px-4 py-2 rounded-r hover:bg-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center">
                <p>Copyright © 2025 HeyHappy. Tous droits réservés.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-green-400">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="hover:text-green-400">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<!-- N'oublie pas d'ajouter Alpine.js dans ton layout pour gérer ce dropdown : -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

