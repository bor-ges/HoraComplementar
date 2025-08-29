<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Horas+') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Dark Mode Anti-Flash Script -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">

{{-- A Navbar do Breeze já está aqui por padrão, mas vamos usar a nossa customizada --}}
@include('layouts.navigation')

{{-- Incluindo a nossa nova Sidebar --}}
@include('layouts.sidebar')

<!-- Page Content -->
<main class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        {{ $slot }}
    </div>
</main>

</body>
</html>
