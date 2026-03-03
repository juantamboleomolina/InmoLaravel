<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Property;

Route::get('/', function () {
    $properties = Property::latest()->take(6)->get(); // Cogemos las últimas 6
    return view('welcome', compact('properties'));
});

Route::get('/catalogo', function () {
    $properties = Property::latest()->get(); // Cogemos todas las casas
    return view('public.catalog', compact('properties'));
})->name('catalogo');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
