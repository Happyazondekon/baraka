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
    
    <style>
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }
        
        /* Header Glassmorphism Effect */
        .header-glass {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .header-glass.scrolled {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        }
        
        .nav-link {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #16a34a, #22c55e);
            transform: translateX(-50%);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        /* User Avatar Circle */
        .user-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
            color: white;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .user-avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.4);
        }
        
        .dropdown-menu {
            animation: slideDown 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .mobile-menu {
            animation: slideDown 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .logo-container {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .logo-container:hover {
            transform: scale(1.05);
        }
        
        .footer-link {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: #22c55e;
            transition: width 0.3s ease;
        }
        
        .footer-link:hover::after {
            width: 100%;
        }
        
        .social-icon {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .social-icon:hover {
            transform: translateY(-3px) scale(1.1);
        }
        
        .hamburger-line {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        [x-cloak] { 
            display: none !important; 
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">

    {{-- Header Section --}}
    <header class="header-glass bg-white sticky top-0 z-50" x-data="{ open: false, scrolled: false }" 
        @scroll.window="scrolled = window.pageYOffset > 20"
        :class="{ 'scrolled': scrolled }">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="logo-container">
                    <img src="{{ asset('images/Auto-Permis.png') }}" alt="Auto-Permis Logo" class="h-10 w-auto">
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden md:flex space-x-8">
                    @auth
                        <a href="{{ route('dashboard') }}" class="nav-link text-gray-700 hover:text-green-600 {{ Route::is('dashboard') ? 'active text-green-600 font-semibold' : '' }}">
                            Accueil
                        </a>
                        <a href="{{ route('modules.index') }}" class="nav-link text-gray-700 hover:text-green-600 {{ Route::is('modules.*') ? 'active text-green-600 font-semibold' : '' }}">
                            Cours
                        </a>
                        <a href="{{ route('progression') }}" class="nav-link text-gray-700 hover:text-green-600 {{ Route::is('progression') ? 'active text-green-600 font-semibold' : '' }}">
                            Ma Progression
                        </a>
                        <a href="{{ route('contact') }}" class="nav-link text-gray-700 hover:text-green-600 {{ Route::is('contact') ? 'active text-green-600 font-semibold' : '' }}">
                            Contactez-nous
                        </a>
                    @else
                        <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-green-600 {{ Route::is('home') ? 'active text-green-600 font-semibold' : '' }}">
                            Accueil
                        </a>
                        <a href="{{ route('about') }}" class="nav-link text-gray-700 hover:text-green-600 {{ Route::is('about') ? 'active text-green-600 font-semibold' : '' }}">
                            À propos
                        </a>
                        <a href="{{ route('modules.index') }}" class="nav-link text-gray-700 hover:text-green-600 {{ Route::is('modules.*') ? 'active text-green-600 font-semibold' : '' }}">
                            Cours
                        </a>
                        <a href="{{ route('contact') }}" class="nav-link text-gray-700 hover:text-green-600 {{ Route::is('contact') ? 'active text-green-600 font-semibold' : '' }}">
                            Contactez-nous
                        </a>
                    @endauth
                </nav>

                {{-- Auth/Guest Buttons & Mobile Toggle --}}
                <div class="flex items-center space-x-4">
                    @auth
                        {{-- Desktop: Dropdown utilisateur --}}
                        <div class="hidden md:block relative" x-data="{ openDropdown: false }">
                            <button @click="openDropdown = !openDropdown" type="button" class="btn-primary inline-flex justify-center items-center space-x-2 bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-md">
                                <span class="relative z-10">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 relative z-10 transition-transform duration-300" :class="{ 'rotate-180': openDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="openDropdown" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                                 @click.away="openDropdown = false" 
                                 class="dropdown-menu origin-top-right absolute right-0 mt-3 w-56 rounded-xl shadow-xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none overflow-hidden">
                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="group flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200">
                                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-green-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Profil
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="group w-full flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200">
                                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            Déconnexion
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Mobile: Avatar avec première lettre --}}
                        <div class="md:hidden" x-data="{ openDropdown: false }">
                            <button @click="openDropdown = !openDropdown" type="button" class="user-avatar focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </button>

                            <div x-show="openDropdown" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                                 @click.away="openDropdown = false" 
                                 class="dropdown-menu origin-top-right absolute right-4 mt-3 w-56 rounded-xl shadow-xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none overflow-hidden">
                                <div class="py-1">
                                    <div class="px-4 py-3 border-b border-gray-100">
                                        <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ Auth::user()->email }}</p>
                                    </div>
                                    <a href="{{ route('profile.edit') }}" class="group flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200">
                                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-green-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Profil
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="group w-full flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200">
                                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            Déconnexion
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="hidden md:inline-block text-gray-700 mr-2 hover:text-green-600 transition-all duration-300 font-medium">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" class="hidden md:inline-flex items-center btn-primary bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 shadow-md">
                            <span class="relative z-10">Inscrivez-vous</span>
                            <svg class="w-4 h-4 ml-2 relative z-10 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    @endauth

                    {{-- Mobile Menu Button (Hamburger) --}}
                    <div class="md:hidden">
                        <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-lg p-2 transition-all duration-300">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path class="hamburger-line" :class="{'opacity-0': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16" />
                                <path class="hamburger-line" :class="{'rotate-45 translate-y-1.5': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16" />
                                <path class="hamburger-line" :class="{'-rotate-45 -translate-y-1.5': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mobile Navigation --}}
        <div class="md:hidden overflow-hidden" x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 max-h-0"
             x-transition:enter-end="opacity-100 max-h-screen"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 max-h-screen"
             x-transition:leave-end="opacity-0 max-h-0">
            <div class="mobile-menu px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-100 shadow-lg">
                @auth
                    <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200 {{ Route::is('dashboard') ? 'text-green-600 bg-green-50' : '' }}">
                        Accueil
                    </a>
                    <a href="{{ route('modules.index') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200 {{ Route::is('modules.*') ? 'text-green-600 bg-green-50' : '' }}">
                        Cours
                    </a>
                    <a href="{{ route('progression') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200 {{ Route::is('progression') ? 'text-green-600 bg-green-50' : '' }}">
                        Ma Progression
                    </a>
                    <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200 {{ Route::is('contact') ? 'text-green-600 bg-green-50' : '' }}">
                        Contactez-nous
                    </a>
                @else
                    <a href="{{ route('home') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200 {{ Route::is('home') ? 'text-green-600 bg-green-50' : '' }}">
                        Accueil
                    </a>
                    <a href="{{ route('about') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200 {{ Route::is('about') ? 'text-green-600 bg-green-50' : '' }}">
                        À propos
                    </a>
                    <a href="{{ route('modules.index') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200 {{ Route::is('modules.*') ? 'text-green-600 bg-green-50' : '' }}">
                        Cours
                    </a>
                    <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200 {{ Route::is('contact') ? 'text-green-600 bg-green-50' : '' }}">
                        Contact
                    </a>
                    <div class="pt-4 border-t border-gray-200 mt-3 space-y-2">
                        <a href="{{ route('login') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-200">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center justify-center px-4 py-3 rounded-lg text-base font-medium bg-green-600 text-white hover:bg-green-700 transition-all duration-300 shadow-md">
                            Inscrivez-vous
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

   {{-- Footer Section --}}
<footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-16 relative overflow-hidden">
    {{-- Decorative Elements --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-96 h-96 bg-green-500 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-green-500 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            {{-- Auto-Permis Links --}}
            <div class="space-y-4">
                <h3 class="text-xl font-bold mb-6 gradient-text">Auto-Permis</h3>
                <ul class="space-y-3 text-gray-300">
                    <li>
                        <a href="{{ route('home') }}" class="footer-link inline-block hover:text-green-400 transition-all duration-300">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="footer-link inline-block hover:text-green-400 transition-all duration-300">
                            À propos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('modules.index') }}" class="footer-link inline-block hover:text-green-400 transition-all duration-300">
                            Cours
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="footer-link inline-block hover:text-green-400 transition-all duration-300">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Support Links --}}
            <div class="space-y-4">
                <h3 class="text-xl font-bold mb-6 gradient-text">Support</h3>
                <ul class="space-y-3 text-gray-300">
                    <li>
                        <a href="#" class="footer-link inline-block hover:text-green-400 transition-all duration-300">
                            Termes et conditions
                        </a>
                    </li>
                    <li>
                        <a href="#" class="footer-link inline-block hover:text-green-400 transition-all duration-300">
                            Politique de confidentialité
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="footer-link inline-block hover:text-green-400 transition-all duration-300">
                            Support technique
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="space-y-4">
                <h3 class="text-xl font-bold mb-6 gradient-text">Contact</h3>
                <div class="space-y-4 text-gray-300">
                    <div class="flex items-start space-x-3 group">
                        <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="group-hover:text-white transition-colors duration-300">autopermis@auto-permis.com</span>
                    </div>
                    <div class="flex items-start space-x-3 group">
                        <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="group-hover:text-white transition-colors duration-300">Cotonou, Bénin</span>
                    </div>
                </div>
                
                {{-- Social Media --}}
                <div class="mt-8">
                    <h4 class="text-sm font-semibold mb-4 tracking-wider">SUIVEZ-NOUS</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="social-icon p-3 bg-gray-800 rounded-full text-gray-400 hover:text-white hover:bg-[#1877f2] transition-all duration-300" aria-label="Facebook">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://youtube.com/@autopermis-w2v8o?si=B0xkBgJkOJMPh2xs" target="_blank" rel="noopener noreferrer" class="social-icon p-3 bg-gray-800 rounded-full text-gray-400 hover:text-white hover:bg-red-500 transition-all duration-300" aria-label="YouTube">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.498 6.186a2.994 2.994 0 0 0-2.108-2.108C19.63 3.5 12 3.5 12 3.5s-7.63 0-9.39.578A2.994 2.994 0 0 0 .5 6.186C0 7.96 0 12 0 12s0 4.04.5 5.814a2.994 2.994 0 0 0 2.108 2.108C4.37 20.5 12 20.5 12 20.5s7.63 0 9.39-.578a2.994 2.994 0 0 0 2.108-2.108C24 16.04 24 12 24 12s0-4.04-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="mt-12 pt-8 border-t border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-gray-400 text-sm">
                    Copyright © {{ date('Y') }} Auto-Permis. Tous droits réservés.
                </p>
                <a href="https://happyazondekon.github.io/" target="_blank" rel="noopener noreferrer"
                    class="group inline-flex items-center space-x-2 text-gray-400 hover:text-green-400 transition-all duration-300 transform hover:scale-105">
                    <span class="text-sm">Développé par</span>
                    <span class="font-semibold text-green-400 group-hover:text-green-300">HeyHappy</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
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
    function showConfirm(title, text, confirmButtonText = 'Con