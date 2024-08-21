<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpleadoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas para usuarios
Route::post('usuarios/crear', [UsuarioController::class, 'create']);
// Route::get('usuarios/buscar', [UsuarioController::class, 'buscarUsuario']);

// Rutas para empleados
Route::post('empleados/registrar', [EmpleadoController::class, 'registrarEmpleado']);

Route::get('empleados/buscar', [EmpleadoController::class, 'buscarEmpleado']);
Route::get('empleados/{id}/ubicacion', [EmpleadoController::class, 'mostrarUbicacion']);
