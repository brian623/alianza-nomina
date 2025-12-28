@props(['username' => 'Elisa Gómez', 'role' => 'Administradora'])

<header class="flex justify-between items-center bg-gray-50 px-6 py-4 shadow-sm">
    <div>
        <img src="https://via.placeholder.com/120x40?text=Psico+Alianza" alt="Logo" class="h-10">
    </div>

    <div class="flex items-center space-x-3">
        <img src="https://via.placeholder.com/40x40?text=👩" alt="Avatar" class="w-10 h-10 rounded-full">
        <div class="text-right">
            <div class="font-bold text-blue-700">{{ $username }}</div>
            <div class="text-sm text-gray-400">{{ $role }}</div>
        </div>
    </div>
</header>
