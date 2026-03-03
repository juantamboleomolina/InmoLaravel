<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(150000, 2500000),
            'rooms' => fake()->numberBetween(2, 7),
            'bathrooms' => fake()->numberBetween(1, 5),
            'area' => fake()->numberBetween(80, 600),
            'location' => fake()->city(),
            'type' => fake()->randomElement(['Venta', 'Alquiler']),

            // TRUCO: Elegimos una foto al azar de esta lista de imágenes que SÍ funcionan
            'image' => fake()->randomElement([
                'https://images.unsplash.com/photo-1600596542815-60089c5e8621?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1600585154340-be6199f7a096?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1580587771525-78b9dba3b91d?q=80&w=800&auto=format&fit=crop'
            ]),

            'user_id' => \App\Models\User::first() ? \App\Models\User::first()->id : \App\Models\User::factory(),
        ];
    }
    }

