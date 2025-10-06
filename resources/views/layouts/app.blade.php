<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Essential for Laravel forms and security --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <title>{{ config('app.name', 'AutoPermis') }} - @yield('title', 'Apprentissage du code de la route')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Vite Assets (compiles Tailwind CSS and Alpine.js via resources/js/app.js) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">

    {{-- Header Section --}}
    <header class="bg-white shadow-sm" x-data="{ open: false }">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/AutoPermis.png') }}" alt="AutoPermis Logo" class="h-10 w-auto">
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex space-x-6">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('dashboard') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Accueil</a>
                    <a href="{{ route('modules.index') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('modules.*') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Cours</a>
                    <a href="{{ route('progression') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('progression') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Ma Progression</a>
                @else
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('home') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Accueil</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('about') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">À propos</a>
                    <a href="{{ route('modules.index') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('modules.*') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Cours</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 {{ Route::is('contact') ? 'text-green-600 font-semibold' : '' }} transition duration-150 ease-in-out">Contact</a>
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
                    <a href="{{ route('pricing') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-gray-50 {{ Route::is('pricing') ? 'text-green-600 bg-gray-50' : '' }}">Tarifs</a>
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
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                {{-- AutoPermis Links --}}
                <div>
                    <h3 class="text-lg font-bold mb-4">AutoPermis</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="{{ route('home') }}" class="hover:text-green-400 transition duration-150 ease-in-out">Accueil</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-green-400 transition duration-150 ease-in-out">À propos</a></li>
                        <li><a href="{{ route('modules.index') }}" class="hover:text-green-400 transition duration-150 ease-in-out">Cours</a></li>
                        <li><a href="{{ route('pricing') }}" class="hover:text-green-400 transition duration-150 ease-in-out">Tarifs</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-green-400 transition duration-150 ease-in-out">Contact</a></li>
                    </ul>
                </div>

                {{-- Support Links --}}
                <div>
                    <h3 class="text-lg font-bold mb-4">Support</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:text-green-400 transition duration-150 ease-in-out">Termes et conditions</a></li>
                        <li><a href="#" class="hover:text-green-400 transition duration-150 ease-in-out">Politique de confidentialité</a></li>
                    </ul>
                </div>

                {{-- Newsletter Form --}}
                <div class="md:col-span-2">
                    <h3 class="text-lg font-bold mb-4">Restons connectés !</h3>
                    <p class="text-gray-300 mb-4">Recevez nos dernières actualités et offres spéciales directement dans votre boîte mail.</p>
                    <form action="#" method="POST" class="flex">
                        @csrf 
                        <input type="email" placeholder="Votre email" class="px-4 py-2 w-full rounded-l-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200">
                        <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-r-lg hover:bg-green-700 transition duration-150 ease-in-out flex items-center justify-center shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Copyright and Social Media --}}
            <div class="mt-10 pt-8 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center text-gray-300 text-sm">
                <p>Copyright © {{ date('Y') }} AutoPermis. Tous droits réservés.</p>
                <div class="flex space-x-5 mt-6 md:mt-0">
                    <a href="#" class="hover:text-green-400 transition duration-150 ease-in-out" aria-label="Instagram">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="hover:text-green-400 transition duration-150 ease-in-out" aria-label="Twitter">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                </div>
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