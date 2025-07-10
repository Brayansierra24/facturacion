<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Sistema de Facturación'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Estilos y scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen">

        <!-- Navegación superior -->
        <nav class="bg-white border-b border-gray-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center">
                <div class="space-x-4">
                    <a href="{{ route('clientes.index') }}" class="text-gray-700 hover:text-blue-600">Clientes</a>
                    <a href="{{ route('productos.index') }}" class="text-gray-700 hover:text-blue-600">Productos</a>
                    <a href="{{ route('facturas.index') }}" class="text-gray-700 hover:text-blue-600">Facturas</a>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-600 hover:underline text-sm">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Encabezado opcional -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Mensajes globales -->
        <div class="max-w-7xl mx-auto px-4 mt-4">
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
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
