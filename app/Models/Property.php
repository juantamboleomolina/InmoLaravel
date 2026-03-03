<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'rooms',
        'bathrooms',
        'area',
        'location',
        'type',
        'image',
        'user_id'
    ];

    // Relación: Una propiedad pertenece a un usuario (agente)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
