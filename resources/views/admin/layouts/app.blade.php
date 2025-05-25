<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Baraka') }} - @yield('title', 'Administration')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center space-y-2 md:space-y-0">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-2xl font-bold flex items-center space-x-1">
                <span class="text-green-500">B</span>
                <span>araka</span>
                <span class="text-green-500">🚗</span>
            </a>

            <!-- Navigation Links -->
            <nav class="flex space-x-4 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-600' }}">
                    Tableau de bord
                </a>
                <a href="{{ route('modules.index') }}" class="{{ Route::is('modules.*') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-600' }}">
                    Modules
                </a>
                <a href="{{ route('courses.index') }}" class="{{ Route::is('admin.courses.*') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-600' }}">
                    Cours
                </a>
                <a href="{{ route('quizzes.index') }}" class="{{ Route::is('admin.quizzes.*') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-600' }}">
                    Quiz
                </a>
                <a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-600' }}">
                    Utilisateurs
                </a>
                <a href="{{ route('admin.payments') }}" class="{{ Route::is('admin.payments') ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-600' }}">
                    Paiements
                </a>
                <a href="{{ route('home') }}" target="_blank" class="text-gray-700 hover:text-green-600">
                    Voir le site
                </a>
            </nav>

            <!-- User Info -->
            @auth
            <div class="flex items-center space-x-4 mt-2 md:mt-0">
                <div class="flex items-center space-x-2">
                    <span class="text-sm font-medium text-gray-800">
                        {{ auth()->user()->name }}
                    </span>
                    @if(auth()->user()->role === 'admin')
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">Admin</span>
                    @elseif(auth()->user()->role === 'moderator')
                        <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">Modérateur</span>
                    @endif
                </div>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="text-sm text-red-500 hover:underline">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Top bar -->
        <div class="bg-white shadow px-6 py-4 border-b">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold">@yield('title', 'Administration')</h1>
                <span class="text-gray-500 text-sm">{{ now()->format('d/m/Y H:i') }}</span>
            </div>
        </div>

        <!-- Page content -->
        <div class="p-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="text-center text-sm">
            © 2025 Baraka - Tous droits réservés.
        </div>
    </footer>
</body>
</html>
