@props(['columns' => [], 'rows' => [], 'actions' => true])

<div class="mt-4 overflow-x-auto">
    <div class="min-w-[900px] space-y-3">

        <!-- Header Row con filtros -->
        <div class="grid grid-cols-{{ count($columns) + 1 }} gap-2 py-4 bg-gray-100 rounded-lg">
            @foreach($columns as $col)
                @if($col=='checkbox')
                    <div class="d-flex justify-center align-items-center">
                        <span class="mx-2">Todos</span>
                        <input type="checkbox" id="selectAll" class="header-checkbox self-center">
                    </div>
                @else
                    <div class="d-flex flex-col">
                        <button>{{$col}}</button>
                        <input type="text" name="{{$col}}" placeholder="Buscar {{ $col }}" class="p-2 w-100 rounded-full border border-gray-300">
                    </div>
                @endif
            @endforeach
            <div class="d-flex justify-center align-items-center">
                <span> Acciones</span>
            </div>
        </div>

        <!-- Filas de datos -->
        @foreach($rows as $row)
        <div class="grid grid-cols-{{ count($columns) + 1 }} gap-2 p-4 bg-white rounded-lg border-2 shadow-sm items-center">
            @foreach($row as $key => $value)
                @if($key=='actions' && $actions)
                <div class="flex space-x-2 justify-end">
                    <div>
                        <button
                            @click="$dispatch('edit-employee', {{ Js::from($row) }})"
                            class="text-blue-400 hover:text-blue-600"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('employees.destroy', $row['id']) }}" class="inline-block deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="text-blue-400 hover:text-blue-600 deleteBtn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                @elseif($key=='checkbox')
                <input type="checkbox" class="row-checkbox self-center" data-id="{{ $row['id'] ?? '' }}">
                @elseif($key==='Nombre')
                <span class="text-gray-700">{{ $row['Nombre'] }} {{ $row['Apellido'] }}</span>
                @elseif($key!=='id' && $key!=='Apellido')
                <span class="text-gray-700">{{ $value }}</span>
                @endif
            @endforeach
        </div>
        @endforeach

    </div>
</div>

<!-- Script para seleccionar todos los checkboxes y mantener sincronización -->
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const headerCheckbox = document.querySelector('.header-checkbox');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');

    if(headerCheckbox) {
        // Marcar/desmarcar todos
        headerCheckbox.addEventListener('change', function() {
            rowCheckboxes.forEach(cb => cb.checked = this.checked);
        });

        // Sincronizar con los checkboxes de fila
        rowCheckboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                const allChecked = Array.from(rowCheckboxes).every(c => c.checked);
                headerCheckbox.checked = allChecked;
            });
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('.deleteForm');
            if(confirm('¿Seguro que quieres eliminar este empleado?')) {
                form.submit();
            }
        });
    });
});
</script>
@endpush
