<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Psico Alianza')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="h-screen flex overflow-hidden">

    <!-- Sidebar -->
    @php $activePage = $activePage ?? 'dashboard'; @endphp
    <x-sidebar :activePage="$activePage"/>

    <!-- Contenido Principal -->
    <div class="flex-1 flex flex-col">

        <!-- Header -->
        <x-header :username="auth()->user()->name ?? 'Elisa Gómez'" :role="auth()->user()->role ?? 'Administradora'"/>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-6">
            @yield('content')
        </main>

    </div>

    @stack('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
