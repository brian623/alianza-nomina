@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="flex-1 flex flex-col">

  <!-- Área de Contenido Principal -->
  <main class="flex-1 relative flex items-center justify-center bg-white overflow-hidden">
    
    <!-- Bloque Central -->
    <div class="text-center z-10 px-6">
      <h1 class="text-4xl font-bold text-gray-800">Bienvenida!</h1>
      <h2 class="text-3xl font-semibold text-gray-600 mt-2">Elisa Gómez</h2>
      <p class="text-gray-500 mt-4 text-lg">Añade los datos personales de tus empleados y después agrega su cargo en tu empresa</p>

      <!-- Botón CTA -->
      <button  @click="open = true" class="mt-6 inline-flex flex-col items-center justify-center p-6 bg-blue-100 hover:bg-blue-200 rounded-xl cursor-pointer">
        <i class="fas fa-user-plus text-3xl text-blue-500 mb-2"></i>
        <span class="text-gray-400 text-sm">Empieza aquí</span>
      </button>
    </div>

    <!-- Ilustración Decorativa -->
    <img src="https://via.placeholder.com/250x250?text=Decor+Illustration" 
          alt="Decoración" 
          class="absolute bottom-0 right-0 w-64 h-64 opacity-80 pointer-events-none">
    
    <!-- MODAL -->
    @include('components.create-modal')
  </main>

</div>
@endsection
