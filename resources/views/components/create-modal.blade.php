<!-- Overlay -->
<div
  x-show="open"
  x-transition.opacity
  class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
>

  <!-- Contenedor -->
  <div
    @click.outside="open = false"
    x-transition
    class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4"
  >

    <!-- Header -->
    <div class="flex items-center justify-between px-6 py-4 bg-gray-50 rounded-t-2xl">
      <h2 class="text-lg font-semibold text-gray-600">Nuevo empleado</h2>

      <button
        @click="open = false"
        class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 hover:bg-gray-300"
      >
        <i class="fas fa-times text-gray-600 text-sm"></i>
      </button>
    </div>

    <!-- Body -->
    <form method="POST" action="{{ route('employees.store') }}">
      @csrf

      <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Nombres -->
        <div>
          <label class="block mb-1 font-semibold text-gray-700">Nombres</label>
          <input
            type="text"
            name="first_name"
            placeholder="Escribe el nombre del empleado"
            class="w-full rounded-full border-gray-300 focus:ring-blue-500 focus:border-blue-500"
            required
          >
        </div>

        <!-- Apellidos -->
        <div>
          <label class="block mb-1 font-semibold text-gray-700">Apellidos</label>
          <input
            type="text"
            name="last_name"
            placeholder="Escribe los apellidos"
            class="w-full rounded-full border-gray-300"
            required
          >
        </div>

        <!-- Identificación -->
        <div>
          <label class="block mb-1 font-semibold text-gray-700">Identificación</label>
          <input
            type="text"
            name="identification"
            placeholder="Número de identificación"
            class="w-full rounded-full border-gray-300"
            required
          >
        </div>

        <!-- Teléfono -->
        <div>
          <label class="block mb-1 font-semibold text-gray-700">Teléfono</label>
          <input
            type="text"
            name="phone"
            placeholder="Número de teléfono"
            class="w-full rounded-full border-gray-300"
          >
        </div>

        <!-- Ciudad -->
        <div class="relative">
          <label class="block mb-1 font-semibold text-gray-700">Ciudad</label>
          <select
            name="city_id"
            class="w-full rounded-full border-gray-300 appearance-none pr-10"
            required
          >
            <option value="">Selecciona ciudad</option>
            {{-- ciudades dinámicas --}}
          </select>
          <i class="fas fa-chevron-down absolute right-4 top-10 text-gray-400"></i>
        </div>

        <!-- Departamento -->
        <div class="relative">
          <label class="block mb-1 font-semibold text-gray-700">Departamento</label>
          <select
            name="department_id"
            class="w-full rounded-full border-gray-300 appearance-none pr-10"
            required
          >
            <option value="">Selecciona departamento</option>
          </select>
          <i class="fas fa-chevron-down absolute right-4 top-10 text-gray-400"></i>
        </div>

      </div>

      <!-- Footer -->
      <div class="px-6 py-4 flex justify-center gap-6">
        <button
          type="button"
          @click="open = false"
          class="px-8 py-2 bg-gray-300 text-gray-700 rounded-full"
        >
          Cancelar
        </button>

        <button
          type="submit"
          class="px-8 py-2 bg-blue-700 text-white font-semibold rounded-full shadow-md hover:bg-blue-800"
        >
          Guardar
        </button>
      </div>

    </form>
  </div>
</div>
