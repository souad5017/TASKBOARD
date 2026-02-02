<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskBoard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <div class="min-h-screen flex flex-col items-center justify-center px-6">

        <!-- Logo / Title -->
        <div class="text-center mb-10">
            <div class="mx-auto mb-4 w-20 h-20 rounded-2xl bg-indigo-600 flex items-center justify-center shadow-lg">
                <span class="text-white text-3xl font-bold">TB</span>
            </div>

            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                TaskBoard
            </h1>

            <p class="mt-3 text-gray-600 dark:text-gray-400 max-w-xl">
                Gérez vos tâches, organisez vos projets et boostez votre productivité
                avec une interface simple et efficace.
            </p>
        </div>

        <!-- Actions -->
        <div class="flex gap-4">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-medium
                          hover:bg-indigo-700 transition shadow">
                    Accéder au tableau de bord
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-medium
                          hover:bg-indigo-700 transition shadow">
                    Se connecter
                </a>

                <a href="{{ route('register') }}"
                   class="px-6 py-3 rounded-xl bg-white text-indigo-600 font-medium
                          border border-indigo-600 hover:bg-indigo-50 transition shadow">
                    Créer un compte
                </a>
            @endauth
        </div>

        <!-- Footer -->
        <p class="mt-16 text-sm text-gray-500 dark:text-gray-500">
            © {{ date('Y') }} TaskBoard. Tous droits réservés.
        </p>
    </div>

</body>
</html>
