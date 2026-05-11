<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\StorePropertyRequest; // <--- IMPORTANTE: Importar tu nuevo Request
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function create()
    {
        return view('properties.create');
    }

    // Fíjate que aquí ya no usamos 'Request $request', sino tu clase personalizada
    public function store(StorePropertyRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
            $validated['image'] = Storage::url($imagePath);
        }

        $validated['user_id'] = Auth::id();
        $validated['type'] = 'Venta'; //

        Property::create($validated);

        return redirect()->route('catalogo')->with('status', '¡Propiedad publicada con éxito!');
    }
}
