<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Property;

// --- ZONA PÚBLICA ---

Route::get('/', function () {
    $properties = Property::latest()->take(6)->get();
    return view('welcome', compact('properties'));
});

Route::get('/catalogo', function (Request $request) {
    $query = Property::latest();

    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('type', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('location')) {
        $query->where('location', $request->location);
    }

    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    $properties = $query->get();

    return view('public.catalog', compact('properties'));
})->name('catalogo');

Route::get('/catalogo/{property}', function (Property $property) {
    return view('public.show', compact('property'));
})->name('catalogo.show');

Route::post('/catalogo/{property}/contactar', function (Property $property) {
    if (!auth()->check()) {
        return back()->with('error_login', 'Inicie sesión para poder contactar con el agente.');
    }
    return back()->with('mensaje_enviado', '¡Mensaje enviado con éxito! El agente se pondrá en contacto contigo lo antes posible.');
})->name('catalogo.contact');


// --- ZONA PRIVADA (REQUIERE INICIAR SESIÓN) ---
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. Dashboard principal
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            $properties = Property::latest()->get();
        } else {
            $properties = Property::where('user_id', auth()->id())->latest()->get();
        }
        $title = 'Panel Principal';
        return view('dashboard', compact('properties', 'title'));
    })->name('dashboard');

    // NUEVO: DESCARGAR CARTERA EN PDF
    Route::get('/dashboard/cartera/pdf', [PropertyController::class, 'downloadPortfolioPdf'])->name('properties.portfolio.pdf');

    // --- GESTIÓN DE USUARIOS (ADMIN) ---
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/usuarios/pdf', [UserController::class, 'downloadPdf'])->name('admin.users.pdf');
    Route::get('/admin/usuarios/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/usuarios/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/usuarios/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // 2. Mis propiedades favoritas
    Route::get('/mis-favoritos', function () {
        $properties = auth()->user()->favorites()->latest()->get();
        $title = 'Mis Propiedades Favoritas';
        return view('dashboard', compact('properties', 'title'));
    })->name('favoritos');

    // NUEVO: DESCARGAR FAVORITOS EN PDF
    Route::get('/dashboard/favoritos/pdf', [PropertyController::class, 'downloadFavoritesPdf'])->name('properties.favorites.pdf');

    // 3. Añadir/Quitar de favoritos (Toggle)
    Route::post('/properties/{property}/favorite', function (Property $property) {
        auth()->user()->favorites()->toggle($property->id);
        return back();
    })->name('properties.favorite');

    // --- RUTAS DE PERFIL ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- RUTAS DE PROPIEDADES (GESTIÓN) ---
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

});

require __DIR__.'/auth.php';
