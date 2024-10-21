<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AdminController; // Asegúrate de importar el controlador
use App\Http\Controllers\CitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto/{tipo_persona?}', [ContactoController::class, 'formulario']);
Route::post('/contacto-recibe', [ContactoController::class, 'newContact']);
Route::get('lista', [ContactoController::class, 'lista']);

Route::resource('noticia', NoticiaController::class)->parameters([
    'noticia' => 'noticia'
]);

Route::resource('citas', CitasController::class)->parameters([
    'citas' => 'citas'
]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('tema', function () {
    return view('tema');
});

// Ruta protegida para el administrador
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Rutas para las citas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('citas', CitasController::class);
});
