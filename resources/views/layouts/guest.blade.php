<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center 
                pt-6 sm:pt-0 
                bg-gradient-to-br from-indigo-100 via-blue-100 to-purple-100
                dark:from-gray-900 dark:via-gray-900 dark:to-gray-800">

        <!-- Logo & Title -->
        <div class="mb-8 text-center">
            <a href="/" class="flex justify-center">
                <svg class="w-20 h-20 text-indigo-600 dark:text-indigo-400"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     
                    <!-- Board -->
                    <rect x="3" y="3" width="18" height="18" rx="3" ry="3" stroke-width="2"/>
                    
                    <!-- Check items -->
                    <path stroke-width="2" d="M7 8h6M7 12h6M7 16h6"/>
                    <path stroke-width="2" d="M15 8l1 1 2-2M15 12l1 1 2-2M15 16l1 1 2-2"/>
                </svg>
            </a>

            <h1 class="mt-4 text-3xl font-extrabold text-indigo-700 dark:text-indigo-400">
                TaskBoard
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Organisez vos tâches efficacement
            </p>
        </div>

        <!-- Card -->
<div class="w-full sm:max-w-md px-6 py-6 bg-white dark:bg-gray-800
            shadow-xl rounded-3xl border border-gray-200 dark:border-gray-700">
    {{ $slot }}
</div> 

    </div>
</body>

</html>
