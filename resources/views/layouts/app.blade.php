<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TaskBoard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-800">

    <div class="min-h-screen flex flex-col">

        {{-- Navbar --}}
        <div class="bg-white border-b border-slate-200 shadow-sm">
            @include('layouts.navigation')
        </div>

        {{-- Page Heading --}}
        @isset($header)
            <header class="bg-white">
                <div class="max-w-7xl mx-auto py-6 px-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-semibold text-slate-700">
                            {{ $header }}
                        </h2>
                    </div>
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-8">
            {{ $slot }}
        </main>

    </div>

</body>
</html>
