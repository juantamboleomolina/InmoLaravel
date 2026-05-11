<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Lo ponemos en true porque la ruta ya está protegida por el middleware 'auth'
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'location'    => 'required|string|max:255',
            'rooms'       => 'required|integer|min:1',
            'bathrooms'   => 'required|integer|min:1',
            'area'        => 'required|integer|min:10',
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Max 2MB
        ];
    }

    // Opcional: Puedes personalizar los mensajes de error si quieres
    public function messages(): array
    {
        return [
            'title.required' => 'El título del anuncio es obligatorio.',
            'price.numeric'  => 'El precio debe ser un número válido.',
            'image.max'      => 'La imagen no puede pesar más de 2MB.',
        ];
    }
}
