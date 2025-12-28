<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Psico Alianza</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .field-icon { cursor: pointer; }
        
        /* Fade-in efecto */
        .login-hero, .login-form {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Botón hover */
        .btn-primary:hover {
            background-color: #004080;
            border-color: #004080;
        }

        /* Scroll en móviles si la altura es menor */
        @media (max-height: 700px) {
            .vh-100 {
                height: auto;
                min-height: 100vh;
            }
        }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid vh-100">
  <div class="row h-100">

    <!-- Hero Section -->
    <div class="col-md-7 d-none d-md-block p-0 position-relative login-hero">
      <div class="h-100" style="background-image: url('{{ asset('Media/login-background.png') }}'); background-size: cover; background-position: center;">
        <!-- Texto sobre overlay -->
        <div class="position-absolute bottom-0 start-0 text-white text-start p-4">
          <h2 class="display-6">Bienvenido a la mejor plataforma</h2>
          <h2 class="display-6 fw-bold">organizacional online</h2>
          <h3 class="display-7">Gestión efectiva del talento humano</h3>
        </div>
      </div>
    </div>

    <!-- Formulario -->
    <div class="col-md-5 d-flex align-items-center justify-content-center bg-white login-form">
      <div class="w-75">

        <!-- Logo -->
        <div class="text-center mb-4">
          <img src="{{ asset('Media/isologo.png') }}" alt="Logo Psico Alianza" class="img-fluid">
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label for="user" class="form-label">Usuario</label>
            <input id="usuario" type="text" class="form-control rounded-pill" name="user" value="" required autofocus>
          </div>

          <div class="mb-3 position-relative">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" type="password" class="form-control rounded-pill" name="password" required>
            <span toggle="#password" class="fa fa-fw fa-eye field-icon position-absolute" style="top:50%; right:15px; transform: translateY(40%)"></span>
          </div>

          <div class="mb-3 form-check d-flex justify-content-center">
            <input type="checkbox" class="form-check-input mx-1 border border-secondary rounded" id="remember" name="remember">
            <label class="form-check-label" for="remember">Recordar cuenta</label>
          </div>

          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-lg text-white rounded-pill">Iniciar sesión</button>
          </div>

          <div class="d-flex justify-content-between small text-muted">
            <a href="#">¿Olvidaste tu usuario?</a>
            <a href="#">¿Olvidaste tu contraseña?</a>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Scripts -->
<script>
document.querySelectorAll('.field-icon').forEach(function(el){
    el.addEventListener('click', function(){
        const input = document.querySelector(this.getAttribute('toggle'));
        if(input.type === 'password'){
            input.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
});
</script>

</body>
</html>
