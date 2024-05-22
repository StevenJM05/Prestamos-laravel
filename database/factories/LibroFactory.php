<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Libro::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'autor' => $this->faker->name,
            'editorial' => $this->faker->company,
            'fecha_edicion' => $this->faker->date(),
            'ISBN' => $this->faker->isbn13,
        ];
    }
}
