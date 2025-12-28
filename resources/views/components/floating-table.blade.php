@props(['columns' => [], 'rows' => [], 'actions' => true])

<div class="mt-4 overflow-x-auto">
    <div class="min-w-[900px] space-y-3">

        <!-- Header Row con filtros -->
        <div class="grid grid-cols-{{ count($columns) }} gap-2 p-4 bg-gray-100 rounded-lg">
            @foreach($columns as $col)
                @if($col=='checkbox')
                    <input type="checkbox" class="self-center">
                @else
                    <input type="text" placeholder="Buscar {{ $col }}" class="p-2 rounded-full border border-gray-300">
                @endif
            @endforeach
        </div>

        <!-- Filas de datos -->
        @foreach($rows as $row)
        <div class="grid grid-cols-{{ count($columns) }} gap-2 p-4 bg-white rounded-lg shadow-sm items-center">
            @foreach($row as $key => $value)
                @if($key=='actions' && $actions)
                <div class="flex space-x-2 justify-end">
                    <button class="text-blue-400 hover:text-blue-600"><i class="fas fa-edit"></i></button>
                    <button class="text-blue-400 hover:text-blue-600"><i class="fas fa-trash"></i></button>
                </div>
                @else
                <span class="text-gray-700">{{ $value }}</span>
                @endif
            @endforeach
        </div>
        @endforeach

    </div>
</div>
