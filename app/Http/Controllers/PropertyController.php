<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\StorePropertyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf; // NUEVO IMPORT PARA EL PDF

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

    public function edit(Property $property)
    {
        Gate::authorize('update', $property);
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        Gate::authorize('update', $property);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'area' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
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

    // --- NUEVO: DESCARGAR PDF DE LA CARTERA ---
    public function downloadPortfolioPdf()
    {
        if (auth()->user()->hasRole('admin')) {
            $properties = Property::latest()->get();
        } else {
            $properties = Property::where('user_id', auth()->id())->latest()->get();
        }

        $title = "Mi Cartera de Inmuebles";

        $pdf = Pdf::loadView('properties.pdf-report', compact('properties', 'title'));
        return $pdf->download('mi_cartera_murcia_re.pdf');
    }

    // --- NUEVO: DESCARGAR PDF DE FAVORITOS ---
    public function downloadFavoritesPdf()
    {
        $properties = auth()->user()->favorites()->latest()->get();
        $title = "Mis Propiedades Favoritas";

        $pdf = Pdf::loadView('properties.pdf-report', compact('properties', 'title'));
        return $pdf->download('mis_favoritos_murcia_re.pdf');
    }
}
