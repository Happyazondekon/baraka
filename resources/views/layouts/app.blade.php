<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <title>{{ config('app.name', 'Auto-Permis') }} - @yield('title', 'Apprentissage du code de la route')</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/AP.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">

    {{-- Header Section --}}
    <header class="bg-white shadow-sm" x-data="{ open: false }">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/Auto-Permis.png') }}" alt="Auto-Permis Logo" class="h-10 w-auto">
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex space-x-6">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('dashboard') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Accueil</a>
                    <a href="{{ route('modules.index') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('modules.*') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Cours</a>
                    <a href="{{ route('progression') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('progression') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Ma Progression</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('contact') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Contactez-nous</a>
                @else
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('home') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Accueil</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('about') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">À propos</a>
                    <a href="{{ route('modules.index') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('modules.*') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Cours</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('contact') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Contactez-nous</a>
                @endauth
            </nav>

            {{-- Auth/Guest Buttons & Mobile Toggle --}}
            <div class="flex items-center space-x-4">
                @auth
                    {{-- Dropdown utilisateur --}}
                    <div class="relative" x-data="{ openDropdown: false }">
                        <button @click="openDropdown = !openDropdown" type="button" class="inline-flex justify-center items-center space-x-2 bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-150 ease-in-out shadow-sm">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="openDropdown" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             @click.away="openDropdown = false" 
                             class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
                            <div class="py-1">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out">Profil</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out">
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="hidden md:inline-block text-gray-700 mr-4 hover:text-green-600 transition duration-150 ease-in-out">Connexion</a>
                    <a href="{{ route('register') }}" class="hidden md:inline-flex items-center bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 transition duration-150 ease-in-out shadow-sm">
                        Inscrivez-vous →
                    </a>
                @endauth

                {{-- Mobile Menu Button (Hamburger) --}}
                <div class="md:hidden">
                    <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Navigation --}}
        <div class="md:hidden" x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-100 shadow-md">
                @auth
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('dashboard') ? 'text-green-600 bg-gray-50' : '' }}">Accueil</a>
                    <a href="{{ route('modules.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('modules.*') ? 'text-green-600 bg-gray-50' : '' }}">Cours</a>
                    <a href="{{ route('progression') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('progression') ? 'text-green-600 bg-gray-50' : '' }}">Ma Progression</a>
                    <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('contact') ? 'text-green-600 bg-gray-50' : '' }}">Contactez-nous</a>
                    
                    
                    {{-- User Profile & Logout for mobile --}}
                    <div class="pt-4 pb-3 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div>
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-1">
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50">Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50">Déconnexion</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('home') ? 'text-green-600 bg-gray-50' : '' }}">Accueil</a>
                    <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('about') ? 'text-green-600 bg-gray-50' : '' }}">À propos</a>
                    <a href="{{ route('modules.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('modules.*') ? 'text-green-600 bg-gray-50' : '' }}">Cours</a>
                    <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('contact') ? 'text-green-600 bg-gray-50' : '' }}">Contact</a>
                    <div class="pt-4 border-t border-gray-200">
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50">Connexion</a>
                        <a href="{{ route('register') }}" class="block mt-1 px-3 py-2 rounded-md text-base font-medium bg-green-600 text-white hover:bg-green-700">Inscrivez-vous →</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

   {{-- Footer Section --}}
<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Auto-Permis Links --}}
            <div>
                <h3 class="text-lg font-bold mb-4">Auto-Permis</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="{{ route('home') }}" class="hover:text-green-400 transition duration-150 ease-in-out">Accueil</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-green-400 transition duration-150 ease-in-out">À propos</a></li>
                    <li><a href="{{ route('modules.index') }}" class="hover:text-green-400 transition duration-150 ease-in-out">Cours</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-green-400 transition duration-150 ease-in-out">Contact</a></li>
                </ul>
            </div>

            {{-- Support Links --}}
            <div>
                <h3 class="text-lg font-bold mb-4">Support</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-green-400 transition duration-150 ease-in-out">Termes et conditions</a></li>
                    <li><a href="#" class="hover:text-green-400 transition duration-150 ease-in-out">Politique de confidentialité</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-green-400 transition duration-150 ease-in-out">Support technique</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h3 class="text-lg font-bold mb-4">Contact</h3>
                <div class="space-y-3 text-gray-300">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>autopermis25@gmail.com</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Cotonou, Bénin</span>
                    </div>
                </div>
                
                {{-- Social Media --}}
                <div class="mt-6">
                    <h4 class="text-sm font-semibold mb-3">SUIVEZ-NOUS</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-[#1877f2] transition duration-150 ease-in-out" aria-label="Facebook">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://youtube.com/@autopermis-w2v8o?si=B0xkBgJkOJMPh2xs" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-red-500 transition duration-150 ease-in-out" aria-label="YouTube">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.498 6.186a2.994 2.994 0 0 0-2.108-2.108C19.63 3.5 12 3.5 12 3.5s-7.63 0-9.39.578A2.994 2.994 0 0 0 .5 6.186C0 7.96 0 12 0 12s0 4.04.5 5.814a2.994 2.994 0 0 0 2.108 2.108C4.37 20.5 12 20.5 12 20.5s7.63 0 9.39-.578a2.994 2.994 0 0 0 2.108-2.108C24 16.04 24 12 24 12s0-4.04-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="mt-10 pt-8 border-t border-gray-700 text-center text-gray-300 text-sm">
            <p>Copyright © {{ date('Y') }} Auto-Permis. Tous droits réservés.</p>
            <a href="https://www.facebook.com/HeyyHappy" target="_blank" rel="noopener noreferrer"
                class="inline-block ml-2 underline text-gray-400 text-sm px-2 py-1 rounded opacity-90
                         hover:text-gray-300 transition transform duration-200 ease-in-out hover:-translate-y-1 hover:scale-105 motion-safe:animate-pulse">
                 Développé par HeyHappy
            </a>
        </div>
    </div>
</footer>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Fonctions globales SweetAlert
    function showConfirm(title, text, confirmButtonText = 'Confirmer') {
        return Swal.fire({
            title: title,
            text: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmButtonText,
            cancelButtonText: 'Annuler'
        });
    }

    function showAlert(title, text, icon = 'warning') {
        return Swal.fire({
            title: title,
            text: text,
            icon: icon,
            confirmButtonColor: '#3085d6'
        });
    }

    // Afficher les messages flash avec SweetAlert
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: '{{ session('error') }}',
            timer: 4000
        });
    @endif

    @if (session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Attention',
            text: '{{ session('warning') }}',
            timer: 4000
        });
    @endif
    </script>

    <style>
    [x-cloak] { display: none !important; }
    </style>
</body>
</html>