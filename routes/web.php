<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Career; // <-- Con esto Laravel ya sabe dónde encontrar la clase Career

// Ruta principal que carga el formulario con las carreras
Route::get('/', function () {
    $careers = Career::all();
    return view('register', compact('careers'));
});

// Rutas complementarias para el controlador de usuarios
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);