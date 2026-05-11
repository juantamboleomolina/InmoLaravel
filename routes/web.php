<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController; // <--- Importante: No olvides esto
use Illuminate\Support\Facades\Route;
use App\Models\Property;

// --- ZONA PÚBLICA ---

Route::get('/', function () {
    // Cogemos las últimas 6 para la portada
    $properties = Property::latest()->take(6)->get();
    return view('welcome', compact('properties'));
});

// Nota: Asegúrate de que la vista existe en resources/views/public/catalogo.blade.php
Route::get('/catalogo', function () {
    $properties = Property::latest()->get();
    return view('public.catalog', compact('properties'));
})->name('catalogo');


// --- ZONA PRIVADA (DASHBOARD) ---

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas que requieren estar logueado
Route::middleware('auth')->group(function () {

    // Rutas de Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- RUTAS DE PROPIEDADES (GESTIÓN) ---

    // 1. Mostrar el formulario de crear (GET)
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');

    // 2. Guardar la propiedad en la base de datos (POST)
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

    // Más adelante añadiremos aquí las de editar (edit/update) y borrar (destroy)
});

require __DIR__.'/auth.php';
