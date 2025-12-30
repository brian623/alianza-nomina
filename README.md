# 📘 Proyecto Gestión de Empleados – Prueba Backend Grupo Alianza

Este proyecto corresponde a una **aplicación backend + frontend en Laravel** desarrollada como parte de una prueba técnica. El objetivo principal es gestionar empleados y cargos (crear, listar, editar y eliminar) utilizando **buenas prácticas**, componentes reutilizables y una arquitectura clara.

---

## 🧱 Stack Tecnológico

- **Laravel 10+**
- **PHP 8.1+**
- **SQLite** (base de datos local)
- **Blade Components**
- **Alpine.js** (interactividad frontend)
- **TailwindCSS** (estilos)
- **FontAwesome** (iconos)

---

## 🎯 Funcionalidades Implementadas

### 👤 Gestión de Empleados
#### Versión 1
- Crear empleados mediante modal reutilizable
- Editar empleados usando el mismo modal
- Listado dinámico en tabla con componente reutilizable
- Eliminación con confirmación
- Validaciones backend
- Mensajes flash (toast) de éxito y error

### 🧩 Componentes Blade
- `floating-table`: tabla dinámica reutilizable
- `modal`: modal único reutilizado para crear y editar
- Componentes desacoplados y configurables por props

### ⚡ Interactividad
- Manejo de estado con Alpine.js
- Comunicación entre componentes usando `$dispatch`
- Apertura de modal en modo **create** o **edit**
- Carga dinámica de datos en modo edición

---

## 🗂️ Estructura del Proyecto

```
resources/
├── views/
│   ├── employees/
│   │   └── index.blade.php
│   ├── components/
│   │   ├── floating-table.blade.php
│   │   └── modal.blade.php
│   └── layouts/
│       └── app.blade.php

app/
├── Http/Controllers/
│   └── EmployeeController.php
|   └── RoleController.php
├── Models/
│   └── Employee.php
├── Models/User.php

database/
├── migrations/
├── seeders/
│   └── UserSeeder.php
```

---

## 🚀 Instalación y Setup

### 1️⃣ Clonar el repositorio
```bash
git clone <repositorio>
cd alianza-nomina
```

### 2️⃣ Instalar dependencias
```bash
composer install
npm install
npm run build
```

### 3️⃣ Configurar entorno
```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Base de datos (SQLite)

Crear el archivo:
```bash
touch database/database.sqlite
```

Configurar `.env`:
```
DB_CONNECTION=sqlite
DB_DATABASE=/ruta/absoluta/database/database.sqlite
```

---

## 🧬 Migraciones y Seeds

### Ejecutar migraciones
```bash
php artisan migrate
```

### Ejecutar seeders
```bash
php artisan db:seed
```

O específicamente:
```bash
php artisan db:seed --class=UserSeeder
```

---

## 👨‍💻 Seeder de Usuario

Se creó un **usuario inicial** para pruebas:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Pruebadesarrollador',
            'email' => 'prueba@desarrollador.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
```

🔐 **Credenciales**:
- Usuario: `Pruebadesarrollador`
- Password: `12345678`

---

## 🧠 Decisiones Clave de Arquitectura

### ✅ Modal Reutilizable
Se decidió usar **un solo modal** para crear y editar empleados:
- Se controla con una variable `mode` (`create` | `edit`)
- Reduce duplicación de código
- Mejora mantenibilidad

### ✅ Alpine.js sobre Livewire
- Menor complejidad
- Suficiente para interacciones requeridas
- Ideal para pruebas técnicas

### ✅ Componentización de la Tabla
- `floating-table` permite:
  - Reutilización
  - Columnas dinámicas
  - Acciones configurables

### ✅ Validaciones en Backend
- Seguridad y consistencia de datos
- Manejo de errores por sesión

### ✅ SQLite
- Rápida configuración
- Ideal para pruebas técnicas
- Sin dependencias externas

---

## ⚠️ Consideraciones Importantes

### Identificación única (SQLite)
Si un empleado se elimina lógicamente o manualmente, SQLite puede mantener restricciones únicas.

Para limpiar completamente:
```bash
php artisan migrate:fresh --seed
```

---

## 🧪 Flujo de Creación / Edición

1. Click en **Nuevo Empleado** → abre modal en modo `create`
2. Submit → `employees.store`
3. Validación → creación → redirect → toast
4. Click en **Editar** → `$dispatch('edit-employee', data)`
5. Modal se abre en modo `edit` con datos cargados
6. Submit → `employees.update`

---

## 📌 Próximas Mejoras (Opcional)

- Paginación
- Búsqueda backend
- Soft deletes visibles
- Tests unitarios
- Autorización por roles

---

## 👨‍💻 Autor

**Brian Rincon**  
Desarrollador Web / Ingeniero Mecatrónico

---

✅ Proyecto desarrollado cumpliendo los requisitos solicitados en la prueba técnica, aplicando buenas prácticas, claridad en el código y documentación completa.

