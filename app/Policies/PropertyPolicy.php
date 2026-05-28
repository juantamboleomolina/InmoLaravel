<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;

class PropertyPolicy
{
    /**
     * El 'before' actúa como un pase VIP. Si eres admin, te aprueba cualquier acción
     * sin tener que leer las reglas de abajo.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return null; // Si no es admin, que siga leyendo las reglas normales.
    }

    /**
     * Regla para editar
     */
    public function update(User $user, Property $property): bool
    {
        return $user->id === $property->user_id;
    }

    /**
     * Regla para borrar
     */
    public function delete(User $user, Property $property): bool
    {
        return $user->id === $property->user_id;
    }
}
