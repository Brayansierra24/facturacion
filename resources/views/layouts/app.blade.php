<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Sistema de Facturación') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Estilos y scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen">
        @include('layouts.navigation') {{-- Menú superior --}}

        <!-- Encabezado opcional -->
        @isset($header)
            <header class="bg-white shadow mb-4">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Mensajes globales -->
        <div class="max-w-7xl mx-auto px-4">
            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-700 bg-red-100 border border-red-300 p-3 rounded">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Contenido principal -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
