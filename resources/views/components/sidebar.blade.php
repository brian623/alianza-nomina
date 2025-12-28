@props(['activePage' => 'dashboard'])

<aside class="w-64 bg-blue-700 text-white flex flex-col">
    <div class="p-6 text-center">
        <i class="fas fa-th-large text-2xl"></i>
    </div>

    <nav class="flex-1 px-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center justify-between px-4 py-2 rounded hover:bg-blue-600 {{ $activePage=='dashboard' ? 'bg-blue-600' : '' }}">
            <span>Home</span>
        </a>

        <!-- Listas Desplegable -->
        <div class="flex flex-col px-0 py-2 rounded hover:bg-blue-600 cursor-pointer">
            <div class="flex items-center justify-between px-4">
                <span>Listas</span>
                <i class="fas fa-chevron-up"></i>
            </div>
            <div class="flex flex-col mt-2 space-y-1">
                <a href="{{ route('empleados.index') }}" class="px-6 py-2 rounded hover:bg-blue-600 {{ $activePage=='empleados' ? 'bg-blue-800' : '' }}">Empleados</a>
                <a href="{{ route('cargos.index') }}" class="px-6 py-2 rounded hover:bg-blue-600 {{ $activePage=='cargos' ? 'bg-blue-800' : '' }}">Cargos</a>
            </div>
        </div>
    </nav>
</aside>
