<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Prestamo::class;

    public function definition()
    {
        return [
            'alumno_id' => Alumno::inRandomOrder()->first()->id,
            'libro_id' => Libro::inRandomOrder()->first()->id,
            'fecha_prestamo' => $this->faker->date(),
            'fecha_devolucion' => $this->faker->date(),
            'estado' => $this->faker->randomElement([1,0]),
        ];
    }
}
