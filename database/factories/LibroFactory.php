<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libro;
use App\Models\Editorial;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3), // Título de libro aleatorio
            'editorial_id' => Editorial::inRandomOrder()->first()->id, // Editorial aleatoria
            'edicion' => $this->faker->numberBetween(1, 10), // Edición aleatoria entre 1 y 10
            'pais' => $this->faker->country(), // País aleatorio
            'precio' => $this->faker->randomFloat(2, 10, 100), // Precio aleatorio entre 10 y 100
        ];
    }
}
