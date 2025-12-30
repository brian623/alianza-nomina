<!-- Overlay -->
<div
    x-show="openModal"
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
>

    <div
        @click.outside="openModal = false"
        class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4"
        x-data="{
            departments: {
                Cundinamarca: ['Bogotá', 'Soacha', 'Chía'],
                Antioquia: ['Medellín', 'Envigado', 'Itagüí'],
                Valle: ['Cali', 'Palmira', 'Jamundí']
            },
            get cities() {
                return this.departments[employee.Departamento] || [];
            }
        }"
    >

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-gray-50 rounded-t-2xl">
            <h2
                class="text-lg font-semibold text-gray-600"
                x-text="mode === 'edit' ? 'Editar empleado' : 'Nuevo empleado'"
            ></h2>

            <button
                @click="openModal = false"
                class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 hover:bg-gray-300"
            >
                <i class="fas fa-times text-gray-600 text-sm"></i>
            </button>
        </div>

        <!-- FORM -->
        <form
            method="POST"
            :action="mode === 'edit'
                ? '{{ url('employees') }}/' + employee.id
                : '{{ route('employees.store') }}'"
        >
            @csrf

            <template x-if="mode === 'edit'">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Nombres -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Nombres</label>
                    <input
                        type="text"
                        name="first_name"
                        x-model="employee.Nombre"
                        class="w-full rounded-full border-2 px-3"
                        required
                    >
                </div>

                <!-- Apellidos -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Apellidos</label>
                    <input
                        type="text"
                        name="last_name"
                        x-model="employee.Apellido"
                        class="w-full rounded-full border-2 px-3"
                        required
                    >
                </div>

                <!-- Identificación -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Identificación</label>
                    <input
                        type="text"
                        name="identification"
                        x-model="employee.Identificación"
                        class="w-full rounded-full border-2 px-3"
                        required
                    >
                </div>

                <!-- Teléfono -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Teléfono</label>
                    <input
                        type="text"
                        name="phone"
                        x-model="employee.Teléfono"
                        class="w-full rounded-full border-2 px-3"
                    >
                </div>

                <!-- Departamento -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Departamento</label>
                    <select
                        name="department_id"
                        x-model="employee.Departamento"
                        @change="employee.city_id = ''"
                        class="w-full rounded-full border-2 px-3"
                        required
                    >
                        <option value="">Seleccione departamento</option>
                        <template x-for="(cities, dep) in departments" :key="dep">
                            <option :value="dep" x-text="dep"></option>
                        </template>
                    </select>
                </div>

                <!-- Ciudad -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Ciudad</label>
                    <select
                        name="city_id"
                        x-model="employee.Ciudad"
                        :disabled="!employee.Departamento"
                        class="w-full rounded-full border-2 px-3"
                        required
                    >
                        <option value="">Seleccione ciudad</option>
                        <template x-for="city in cities" :key="city">
                            <option :value="city" x-text="city"></option>
                        </template>
                    </select>
                </div>

                <!-- Dirección -->
                <div class="md:col-span-2">
                    <label class="block mb-1 font-semibold text-gray-700">Dirección</label>
                    <input
                        type="text"
                        name="address"
                        x-model="employee.Dirección"
                        class="w-full rounded-full border-2 px-3"
                    >
                </div>

            </div>

            <!-- Footer -->
            <div class="px-6 py-4 flex justify-center gap-6">
                <button
                    type="button"
                    @click="openModal = false"
                    class="px-8 py-2 bg-gray-300 rounded-full"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="px-8 py-2 bg-blue-700 text-white rounded-full"
                >
                    <span x-text="mode === 'edit' ? 'Actualizar' : 'Guardar'"></span>
                </button>
            </div>
        </form>
    </div>
</div>
