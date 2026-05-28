<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\StorePropertyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class PropertyController extends Controller
{
    public function create()
    {
        return view('properties.create');
    }

    public function store(StorePropertyRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
            $validated['image'] = Storage::url($imagePath);
        }

        $validated['user_id'] = Auth::id();
        $validated['type'] = 'Venta';

        Property::create($validated);

        return redirect()->route('catalogo')->with('status', '¡Propiedad publicada con éxito!');
    }

    // --- NUEVO: MOSTRAR FORMULARIO DE EDICIÓN ---
    public function edit(Property $property)
    {
        // Solo el dueño o el admin pueden editar
        Gate::authorize('update', $property);

        return view('properties.edit', compact('property'));
    }

    // --- NUEVO: GUARDAR CAMBIOS ---
    public function update(Request $request, Property $property)
    {
        // Solo el dueño o el admin pueden actualizar
        Gate::authorize('update', $property);

        // Validamos igual que en la creación, pero la imagen ahora es opcional
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'area' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Nullable para que no obligue a subir otra
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
            $validated['image'] = Storage::url($imagePath);
        }

        $property->update($validated);

        return redirect()->route('dashboard')->with('status', '¡Propiedad actualizada con éxito!');
    }

    public function destroy(Property $property)
    {
        Gate::authorize('delete', $property);

        $property->delete();

        return back()->with('status', '¡Propiedad eliminada con éxito!');
    }
}
