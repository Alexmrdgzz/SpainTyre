<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Spain Tyre' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-900 dark:bg-gray-800 dark:text-gray-100 min-h-screen flex flex-col">

    {{-- Header --}}
    <x-layouts.app.header :title="$title ?? ''" />

    {{-- Contenido principal --}}
    <main class="flex-grow w-full max-w-[190rem] mx-auto px-6 py-6">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-layouts.app.footer />

    @livewireScripts
</body>
</html>
