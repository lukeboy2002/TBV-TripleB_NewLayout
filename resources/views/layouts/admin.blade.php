@props(['title' => ''])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} - {{ config('app.name', '') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.bunny.net/css?family=montserrat:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet"/>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @stack('styles')
    @livewireStyles
</head>
<body class="font-sans antialiased bg-light dark:bg-dark text-dark dark:text-light">
<div class="antialiased bg-light dark:bg-dark">
    <x-admin.navigation-menu/>

    <!-- Sidebar -->
    <x-admin.sidebar/>

    <main class="p-4 md:ml-64 h-auto pt-20">
        {{ $slot }}
    </main>
</div>
@stack('modals')
@livewireScripts
@stack('scripts')
</body>
</html>
