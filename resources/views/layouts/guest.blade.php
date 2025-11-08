<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Auto-Permis'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>
    <script>
        // Le 419 est généralement causé par l'expiration de session (défaut : 2h). 
        // Ce script rafraîchit le jeton dans les formulaires toutes les 10 minutes (600 000 ms).
        setInterval(function() {
            fetch('/csrf-token')
                .then(response => response.json())
                .then(data => {
                    // Met à jour le jeton dans tous les champs cachés (_token) des formulaires
                    document.querySelectorAll('input[name="_token"]').forEach(input => {
                        input.value = data.csrf_token;
                    });
                    console.log('Jeton CSRF rafraîchi.');
                })
                .catch(error => console.error('Erreur lors du rafraîchissement du jeton CSRF:', error));
        }, 600000); // 10 minutes (vous pouvez ajuster cette valeur)
    </script>
</body>
</html>