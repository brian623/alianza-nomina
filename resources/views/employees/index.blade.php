@extends('layouts.app')

@section('title', 'Empleados')

@php $activePage='empleados'; @endphp

@section('content')

<div
    x-data="
        {
            openModal: false,
            mode: 'create',
            employee: {
                first_name: '',
                last_name: '',
                identification: '',
                phone: '',
                department_id: '',
                city_id: '',
                address: ''
            }
        }"
    @edit-employee.window="
        mode = 'edit';
        employee = $event.detail;
        console.log(employee);
        openModal = true;
    "
>
    <div
        class="d-flex justify-between mb-4"
    >
        <div class="d-flex justify-between align-items-center gap-4 px-2">
            <form id="bulkDeleteForm" method="POST" action="{{ route('employees.bulkDelete') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="ids" id="selectedIds">
                <button type="button" id="bulkDeleteBtn" class="text-blue-400">
                    <i class="fas fa-trash mr-1"></i> Borrar selección
                </button>
            </form>

            <button class="text-blue-400">
                <i class="fas fa-download mr-2"></i>Descargar datos
            </button>
        </div>

        <div class="px-2">
            <button
                @click="
                    mode = 'create';
                    employee= {
                        first_name: '',
                        last_name: '',
                        identification: '',
                        phone: '',
                        department_id: '',
                        city_id: '',
                        address: ''
                    };
                    openModal = true;
                "
                class="text-blue-400 border rounded-full px-3 py-2"
            >
                <i class="fas fa-user-plus"></i> Agregar
            </button>
        </div>

        <x-create-modal />
    </div>
    <x-floating-table :columns="$columns" :rows="$rows"/>
</div>

@endsection
