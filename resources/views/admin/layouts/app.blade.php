<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Essential for Laravel forms and security --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Baraka') }} - @yield('title', 'Administration')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome CDN - This line was removed and needs to be re-added for icons to show --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <header class="bg-white shadow-md"> {{-- Using shadow-md for consistency with public site --}}
        <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0"> {{-- Increased space-y for mobile --}}
            <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                <img src="{{ asset('images/Baraka.png') }}" alt="Baraka Admin Logo" class="h-10 w-auto"> {{-- Adjust height (h-10) as needed --}}
            </a>

            <nav class="flex flex-wrap justify-center md:flex-nowrap space-x-4 md:space-x-6 text-sm font-medium"> {{-- Added flex-wrap for better mobile layout --}}
                <a href="{{ route('admin.dashboard') }}" class="py-2 px-3 rounded-md transition duration-150 ease-in-out {{ Route::is('admin.dashboard') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                    Tableau de bord
                </a>
                <a href="{{ route('admin.modules.index') }}" class="py-2 px-3 rounded-md transition duration-150 ease-in-out {{ Route::is('admin.modules.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                    Modules
                </a>
                <a href="{{ route('admin.courses.index') }}" class="py-2 px-3 rounded-md transition duration-150 ease-in-out {{ Route::is('admin.courses.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                    Cours
                </a>
                <a href="{{ route('admin.quizzes.index') }}" class="py-2 px-3 rounded-md transition duration-150 ease-in-out {{ Route::is('admin.quizzes.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                    Quiz
                </a>
                <a href="{{ route('admin.users') }}" class="py-2 px-3 rounded-md transition duration-150 ease-in-out {{ Route::is('admin.users') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                    Utilisateurs
                </a>
                <a href="{{ route('admin.payments') }}" class="py-2 px-3 rounded-md transition duration-150 ease-in-out {{ Route::is('admin.payments') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                    Paiements
                </a>
                <a href="{{ route('home') }}" target="_blank" class="py-2 px-3 rounded-md text-gray-700 hover:bg-gray-50 hover:text-green-600 transition duration-150 ease-in-out flex items-center space-x-1">
                    <span>Voir le site</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                </a>
            </nav>

            @auth
            <div class="flex items-center space-x-4 mt-4 md:mt-0"> {{-- Adjusted margin-top for mobile --}}
                <div class="flex items-center space-x-2">
                    <span class="text-sm font-medium text-gray-800">
                        {{ auth()->user()->name }}
                    </span>
                    @if(auth()->user()->role === 'admin')
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-semibold">Admin</span>
                    @elseif(auth()->user()->role === 'moderator')
                        <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full font-semibold">Modérateur</span>
                    @endif
                </div>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="text-sm text-red-600 hover:text-red-700 transition duration-150 ease-in-out font-medium">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
            @endauth
        </div>
    </header>

    <main class="flex-1">
        <div class="bg-white shadow-sm px-4 py-4 border-b border-gray-200"> {{-- Increased padding, added border-b --}}
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">@yield('title', 'Administration')</h1> {{-- Larger title --}}
                <span class="text-gray-600 text-sm">{{ now()->format('d/m/Y H:i') }}</span> {{-- Consistent gray color --}}
            </div>
        </div>

        <div class="container mx-auto p-6"> {{-- Added container and more padding --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4" role="alert"> {{-- Rounded-lg for consistency --}}
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4" role="alert"> {{-- Rounded-lg for consistency --}}
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-6"> {{-- Darker gray for consistency --}}
        <div class="container mx-auto text-center text-sm px-4"> {{-- Added px-4 for padding --}}
            © {{ date('Y') }} Baraka - Tous droits réservés.
        </div>
    </footer>
</body>
</html>