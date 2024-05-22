<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Alumno::class;

    public function definition()
    {
        return [
            'carrera_id' => \App\Models\Carrera::inRandomOrder()->first()->id ?? \App\Models\Carrera::factory()->create()->id, // Asumiendo que tienes un modelo Carrera y un factory para él
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
        ];
    }
}
