<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\LoginController;

// ------------------------
// Login Routes
// ------------------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ------------------------
// Protected Routes (auth middleware)
// ------------------------
Route::middleware(['auth'])->group(function () {

    // Dashboard = Home 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Empleados
    Route::get('/employees', [EmployeeController::class, 'index'])
        ->name('employees.index');

    Route::post('/employees', [EmployeeController::class, 'store'])
        ->name('employees.store');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])
        ->name('employees.update');
    Route::delete('/employees/bulk-delete', [EmployeeController::class, 'bulkDelete'])
        ->name('employees.bulkDelete');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])
        ->name('employees.destroy');

    // Cargos
    Route::get('/cargos', [RoleController::class, 'index'])->name('roles.index');
});
